<?php

namespace App\Http\Controllers\Admin;

use App\Exports\NewsletterExport;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Earning;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\Payout;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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

    public function search(Request $request)
    {
        $this->validate($request, [
            'type' => ['required', 'string', 'max:6'],
            'value' => ['required', 'string', 'max:255']
        ]);
        #dd('search worked');
        if ($request->type == 'author') {
            return redirect()->route('admin.authors', ['search' => $request->value]);
        }
        if ($request->type == 'book') {
            return redirect()->route('admin.books', ['search' => $request->value]);
        }
        if ($request->type == 'user') {
            return redirect()->route('admin.users', ['search' => $request->value]);
        }
        if ($request->type == 'blog') {
            return redirect()->route('admin.blog', ['search' => $request->value]);
        }
        return redirect()->route('admin.home');
    }

    public function newsletter()
    {
        $newsletter = Newsletter::orderByDesc('created_at')->paginate(10);
        return view('admin.newsletter', compact('newsletter'));
    }

    public function newsletterExport()
    {
        if (isset($_GET['month']) && isset($_GET['year'])) {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $dateObj = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F');
            $fileName = 'newsletter-'.$monthName.$year.'.xlsx';
            return Excel::download(new NewsletterExport($month, $year), $fileName);
        }
        return redirect()->back();
    }
}
