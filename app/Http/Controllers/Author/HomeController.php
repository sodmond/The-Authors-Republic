<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return redirect()->route('author.home');
    }

    public function index()
    {
        $booksCount = Book::count();
        $ordersCount = 10;
        $ordersTotal = 10;
        return view('author.home', compact('booksCount', 'ordersCount', 'ordersTotal'));
    }
}
