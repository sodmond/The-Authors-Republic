<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::orderBydesc('created_at')->paginate(15);
        return view('backend.orders', compact('orders'));
    }

    public function view($id) {
        $order = Order::find($id);
        $payment = DB::table('transactions')->where('order_id', $order->id)->first();
        return view('backend.order', compact('order', 'payment'));
    }
}
