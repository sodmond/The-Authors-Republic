<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Earning;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\Payout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        return redirect()->route('admin.home');
    }

    public function index()
    {
        $authors = Author::all();
        $users = User::all();
        $books = Book::all();
        $allOrders = Order::orderByDesc('created_at')->get();
        $orders = Order::all();
        $ordersCount = $orders->count();
        $ordersTotal = $orders->sum('total_cost');
        $ordersTotal = $orders->sum('total_cost');
        $earnings = DB::table('transactions')->get();
        $payouts = Payout::all();
        return view('admin.home', compact('authors', 'users', 'books', 'allOrders', 'orders', 'ordersCount', 'earnings', 'payouts'));
    }

    public function newsletter()
    {
        $newsletter = Newsletter::orderByDesc('created_at')->paginate(10);
        return view('admin.newsletter', compact('newsletter'));
    }
}
