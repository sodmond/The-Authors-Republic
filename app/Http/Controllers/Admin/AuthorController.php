<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AuthorsExport;
use App\Http\Controllers\Controller;
use App\Mail\ApprovalStatus;
use App\Models\Author;
use App\Models\Book;
use App\Models\Earning;
use App\Models\Order;
use App\Models\Payout;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class AuthorController extends Controller
{
    public function index()
    {
        if (isset($_GET['search'])) {
            $searchVal = $_GET['search'];
            $searchArr = explode(' ', $searchVal);
            $authors = Author::whereIn('firstname', $searchArr)->orWhereIn('lastname', $searchArr)->orderByDesc('created_at')->paginate(10);
            return view('admin.authors.index', compact('authors'));
        }
        $authors = Author::orderByDesc('created_at')->paginate(10);
        $authors_pending = Author::where('approval', false);
        return view('admin.authors.index', compact('authors', 'authors_pending'));
    }

    public function pending()
    {
        $authors = Author::where('approval', false)->paginate(10);
        return view('admin.authors.pending', compact('authors'));
    }

    public function get($id)
    {
        $author = Author::find($id);
        return view('admin.authors.single', compact('author'));
    }

    public function approval($id, Request $request)
    {
        $this->validate($request, [
            'status' => 'required|integer'
        ]);
        $author = Author::find($id);
        if ($request->status == 1) {
            $author->update(['approval' => 1]);
            Mail::to($author->email)->send(new ApprovalStatus(1));
            return back()->with('success', 'Author has been notified of profile approval.');
        }
        if ($request->status == 0) {
            Mail::to($author->email)->send(new ApprovalStatus(0));
            return back()->with('success', 'Author has been notified of profile decline.');
        }
    }

    public function export()
    {
        if (isset($_GET['month']) && isset($_GET['year'])) {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $dateObj = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F');
            $fileName = 'authors-'.$monthName.$year.'.xlsx';
            return Excel::download(new AuthorsExport($month, $year), $fileName);
        }
        return redirect()->back();
    }

    public function books($id)
    {
        $author = Author::find($id);
        $books = Book::where('author_id', $id)->orderByDesc('created_at')->paginate(10);
        return view('admin.books.index', compact('books', 'author'));
    }

    public function sales($id)
    {
        $author = Author::find($id);
        $earnings = Earning::where('author_id', $id)->orderByDesc('created_at')->paginate(10);
        $orders = Order::all()->keyBy('id');
        return view('admin.revenue.earnings', compact('earnings', 'orders', 'author'));
    }

    public function payouts($id)
    {
        $author = Author::find($id);
        $payouts = Payout::where('author_id', $id)->orderByDesc('created_at')->paginate(10);
        return view('admin.revenue.payout_list', compact('payouts', 'author'));
    }

    public function ban($id)
    {
        $author = Author::find($id);
        if ($author) {
            if ($author->ban_status == false) {
                $author->ban_status = true;
                $author->save();
                return back()->with('success', 'Author has been banned');
            }
            $author->ban_status = false;
            $author->save();
            return back()->with('success', 'Author ban has been lifted');
        }
    }
}
