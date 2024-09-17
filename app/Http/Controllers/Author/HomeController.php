<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Book;
use App\Models\Earning;
use App\Models\Order;
use App\Models\Payout;
use App\Notifications\ApprovalRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return redirect()->route('author.home');
    }

    public function index()
    {
        $books = Book::where('author_id', auth('author')->id())->pluck('id');
        $orders = Order::with('orderContent')->whereHas('orderContent', function($q) use($books) {
            $q->whereIn('book_id', $books);
        })->orderByDesc('created_at')->get();
        $ordersCount = $orders->count();
        $ordersTotal = $orders->sum('total_cost'); #dd($orders[0]->user);
        $earnings = Earning::where('author_id', auth('author')->id())->get();
        $payouts = Payout::where('author_id', auth('author')->id())->get();
        return view('author.home', compact('books', 'orders', 'ordersCount', 'ordersTotal', 'earnings', 'payouts'));
    }

    public function requestApproval(Request $request)
    {
        $admin = Admin::find(1);
        $admin->notify(new ApprovalRequest(auth('author')->id()));
        return back()->with('success', 'Approval request has been sent.');
    }
}
