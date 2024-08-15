<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = null;
        return view('author.orders', compact('orders'));
    }

    public function get($id)
    {
        $order = null;
        return view('author.order', compact('order'));
    }
}
