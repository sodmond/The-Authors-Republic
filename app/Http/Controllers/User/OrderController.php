<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
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
                return redirect()->route('user.book.reader', ['book_id' => $book->id, 'order_id' => $order->code]);
            }
        }
        return redirect('/');
    }

    public function readBook($book_id, $order_id)
    {
        $book = Book::find($book_id); #dd($book);
        $order = Order::where('user_id', auth('web')->id())->where('code', $order_id)->where('status', 'completed')->first();
        if ($order) {
            $books = json_decode($order->products);
            if (!in_array($book->id, $books)) {
                return redirect()->back();
            }
            return view('user.book_reader', compact('book'));
        }
        return redirect()->back();
        /*if (session('book_file_path')) {
            $path = session('book_file_path');
            #dd($path);
            return response()->file($path);
        }
        return redirect()->route('user.orders');*/
    }

    public function getbookPDF($book_id)
    {
        $book = Book::find($book_id); #dd($book);
        $book_file_path = Storage::path('books/'.$book->book_file);  #dd($book_file_path);
        return response()->file($book_file_path, ['Content-Disposition' => 'inline']);
        /*return Response::make($book_file_path, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="book.pdf"'
        ]);*/
    }
}
