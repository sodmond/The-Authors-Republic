<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::orderByDesc('created_at')->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function get($id)
    {
        $order = Order::find($id);
        $order_content = $order->orderContent;
        $order_address = DB::table('order_address')->where('order_id', $order->id)->first();
        $books = Book::whereIn('id', json_decode($order->products, true))->get()->keyBy('id');
        return view('admin.order', compact('order', 'order_content', 'order_address', 'books'));
    }
}
