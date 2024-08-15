<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Book;
use App\Models\Order;
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
        $booksCount = Book::count();
        $ordersCount = 10;
        $ordersTotal = 10;
        return view('admin.home', compact('booksCount', 'ordersCount', 'ordersTotal'));
    }
}
