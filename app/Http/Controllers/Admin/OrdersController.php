<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = null;
        return view('admin.orders', compact('orders'));
    }

    public function get($id)
    {
        $order = null;
        return view('admin.order', compact('order'));
    }
}
