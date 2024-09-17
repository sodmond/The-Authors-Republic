<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AddressBook;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id());
        $wishlist = DB::table('wishlist')->where('user_id', auth()->id());
        $addressBook = AddressBook::where('user_id', auth()->id());
        return view('user.index', compact('orders', 'wishlist', 'addressBook'));
    }
}
