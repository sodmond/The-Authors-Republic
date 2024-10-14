<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function __construct()
    {
        #$this->middleware('author.approval');
    }
    
    public function index()
    {
        $authorBooks = Book::where('author_id', auth('author')->id())->pluck('id');
        $orders = Order::with('orderContent')->whereHas('orderContent', function($q) use($authorBooks) {
            $q->whereIn('book_id', $authorBooks);
        })->get();
        return view('author.orders', compact('orders'));
    }

    public function get($id)
    {
        $order = Order::find($id);
        $order_content = $order->orderContent;
        $order_address = DB::table('order_address')->where('order_id', $order->id)->first();
        $books = Book::whereIn('id', json_decode($order->products, true))->get()->keyBy('id');
        return view('author.order', compact('order', 'order_content', 'order_address', 'books'));
    }
}
