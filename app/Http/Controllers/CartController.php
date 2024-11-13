<?php

namespace App\Http\Controllers;

use App\Models\AddressBook;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderContent;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Unicodeveloper\Paystack\Facades\Paystack;

class CartController extends Controller
{
    public $cookieId;

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $cookie = Cart::getCookie();
        $cart = Cart::where($cookie[0], $cookie[1])->get();
        $allBooks = Book::all()->keyBy('id');
        return view('cart', compact('cart', 'allBooks'));
    }

    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'book_id' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'copy' => ['required', 'string', 'in:soft,hard'],
        ]);
        $quantity = $request->quantity;
        $book = Book::find($request->book_id); #dd($book);
        if ($request->copy == 'hard' && $book->stock < $quantity) {
            return back();
        }
        $cookie = Cart::getCookie();
        $cartItem = DB::table('carts')->where($cookie[0], $cookie[1])->where('book_id', $request->book_id)->where('copy', $request->copy);
        $user_id = auth('web')->id() ?? '';
        if ($cartItem->first()) {
            $cartItem->increment('quantity', $quantity, ['user_id' => $user_id, 'copy' => $request->copy]);
            return back()->with('cart_suc', 'Book has been added to cart');
        }
        $cart = new Cart();
        $cart->cookie_id = isset($cookie[2]) ? $cookie[2] : $cookie[1];
        $cart->book_id = $request->book_id;
        $cart->quantity = $quantity;
        $cart->user_id = $user_id;
        $cart->copy = $request->copy;
        $cart->save();
        return back()->with('cart_suc', 'Book has been added to cart');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'book_ids' => ['required', 'array'],
            'book_ids.*' => ['required', 'numeric'],
            'quantities' => ['required', 'array'],
            'quantities.*' => ['required', 'numeric', 'min:1'],
            'copies' => ['required', 'array'],
            'copies.*' => ['required', 'string', 'in:soft,hard'],
        ]);
        $cookie = Cart::getCookie();
        $books = Book::whereIn('id', $request->book_ids)->get()->keyBy('id');
        Cart::where($cookie[0], $cookie[1])->whereIn('book_id', $request->book_ids)->lazyById()->each(function ($task) use ($request, $books) {
            $bookIndex = array_search($task->book_id, $request->book_ids);
            $book = $books[$task->book_id];
            if (($task->copy == 'hard' && $task->quantity > $book->stock) || ($task->copy == 'hard' && $request->quantities[$bookIndex] > $book->stock)) {
                $cart = Cart::find($task->id);
                $cart->delete();
            } elseif ($task->quantity != $request->quantities[$bookIndex] && $task->copy == $request->copies[$bookIndex]) {
                $cart = Cart::find($task->id);
                $cart->quantity = $request->quantities[$bookIndex];
                $cart->save();
            }
        });
        if (isset($request->checkout)) {
            return redirect()->route('checkout');
        }
        return back()->with('success', 'Cart has been updated');
    }

    public function removeItem(Request $request)
    {
        /*$this->validate($request, [
            'book_id' => ['required', 'integer']
        ]);*/
        if(isset($_GET['book_id'])) {
            $book_id = $_GET['book_id'];
            $cookie = Cart::getCookie();
            $cart = Cart::where($cookie[0], $cookie[1])->where('book_id', $book_id)->first();
            $cart->delete();
            return back();
        }
        return back();
    }

    public function checkout()
    {
        $cookie = Cart::getCookie();
        $cart = Cart::where($cookie[0], $cookie[1])->get();
        if ($cart->count() < 1) {
            return redirect()->route('cart');
        }
        $address = AddressBook::where('user_id', auth()->id())->where('default', true)->first();
        $allBooks = Book::all()->keyBy('id');
        $shipping_location = Shipping::where('status', true)->orderBy('state')->get();
        return view('checkout', compact('cart', 'allBooks', 'address', 'shipping_location'));
    }

    public function checkoutSubmit(Request $request)
    {
        $this->validate($request, [
            'billing_fname' => ['required', 'max:255'],
            'billing_lname' => ['required', 'max:255'],
            'billing_address' => ['required', 'max:255'],
            'billing_city' => ['required', 'max:255'],
            'billing_zip' => ['required', 'max:255'],
            'billing_state' => ['required', 'max:255'],
            'shipping_fname' => ['nullable', 'max:255'],
            'shipping_lname' => ['nullable', 'max:255'],
            'shipping_address' => ['nullable', 'max:255'],
            'shipping_city' => ['nullable', 'max:255'],
            'shipping_zip' => ['nullable', 'max:255'],
            'shipping_state' => ['nullable', 'max:255'],
            'note' => ['nullable', 'max:500'],
            'shipping_fee' => ['required', 'numeric']
        ],[
            'billing_fname.required' => 'The billing firstname field is required.',
            'billing_fname.max' => 'The billing firstname max charaters is 255.',
            'billing_lname.required' => 'The billing lastname field is required.',
            'billing_lname.max' => 'The billing lastname max charaters is 255.',
            'shipping_fname.max' => 'The shipping firstname max charaters is 255.',
            'shipping_lname.max' => 'The shipping lastname max charaters is 255.',
        ]);
        $cookie = Cart::getCookie();
        $cart = Cart::where($cookie[0], $cookie[1]);
        #dd($cart->pluck('book_id'), $cart->pluck('quantity'), $cart->pluck('copy'));
        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => auth('web')->id(),
                'products' => json_encode($cart->pluck('book_id')),
                'quantities' => json_encode($cart->pluck('quantity')),
                'code' => Order::createOrderCode(), 
                'note' => $request->note,
                'subtotal' => 0,
                'shipping_fee' => $request->shipping_fee,
                'total_cost' => 0,
            ]);
            $cost = Order::getTotal($order->id, $cart->pluck('book_id'), $cart->pluck('quantity'), $cart->pluck('copy'), 0);
            $order->products = json_encode($cost['book_ids']);
            $order->quantities = json_encode($cost['quantities']);
            $order->subtotal = $cost['subtotal'];
            $order->total_cost = ($cost['total_cost'] + $request->shipping_fee);
            $order->save();
            DB::table('order_address')->insert([
                'order_id' => $order->id,
                'billing_fname' => $request->billing_fname,
                'billing_lname' => $request->billing_lname,
                'billing_address' => $request->billing_address,
                'billing_city' => $request->billing_city,
                'billing_zip' => $request->billing_zip,
                'billing_state' => $request->billing_state,
                'shipping_fname' => $request->shipping_fname ?? $request->billing_fname,
                'shipping_lname' => $request->shipping_lastname ?? $request->billing_lname,
                'shipping_address' => $request->shipping_address ?? $request->billing_address,
                'shipping_city' => $request->shipping_city ?? $request->billing_city,
                'shipping_zip' => $request->shipping_city ?? $request->billing_zip,
                'shipping_state' => $request->shipping_state ?? $request->billing_state,
            ]); #dd($order);
            Cart::where('user_id', auth('web')->id())->delete();
            $data = [
                'amount'    => ($order->total_cost * 100),
                'email'     => auth('web')->user()->email,
                'currency'  => 'NGN',
                'reference' => Paystack::genTranxRef(),
                'metadata' => [
                    'user_id' => auth('web')->id(),
                    'order_id' => $order->id
                ],
                'callback_url' => route('payment.verify')
            ]; #dd($data['amount']);
            DB::commit();
            $payment = new PaymentController;
            return $payment->redirectToGateway($data);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered while submitting your order, pls try again.']);
        }
    }

    public function calShipping()
    {
        $state_id = $_GET['state_id'];
        $state = Shipping::find($state_id);
        if (!$state) {
            return response()->json(['error' => 'Not found'], 404);
        }
        return response()->json(['amount' => $state->fee], 200);
    }
}
