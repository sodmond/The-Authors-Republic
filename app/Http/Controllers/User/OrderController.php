<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth('web')->id())->orderByDesc('created_at')->paginate(10);
        return view('user.orders', compact('orders'));
    }

    public function view($id, $code)
    {
        $order = Order::find($id);
        $order_address = DB::table('order_address')->where('order_id', $order->id)->first();
        $order_content = $order->orderContent;
        $books = Book::whereIn('id', json_decode($order->products, true))->get()->keyBy('id'); #dd(($books));
        return view('user.order', compact('order', 'books', 'order_address', 'order_content'));
    }

    public function downloadBook(Request $request)
    {
        $this->validate($request, [
            'book_id' => ['required', 'integer'],
            'order_id' => ['required', 'integer']
        ]);
        $book = Book::find($request->book_id); #dd($book);
        $order = Order::where('id', $request->order_id)->where('status', 'completed')->first();
        if ($order) {
            if (in_array($book->id, json_decode($order->products))) {
                $book_file_path = 'books/'.$book->book_file;
                return Storage::download($book_file_path);
            }
        }
        return redirect('/');
        
    }
}
