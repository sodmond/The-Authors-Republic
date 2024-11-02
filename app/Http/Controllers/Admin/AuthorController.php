<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AuthorsExport;
use App\Http\Controllers\Controller;
use App\Mail\ApprovalStatus;
use App\Models\Author;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class AuthorController extends Controller
{
    public function index()
    {
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
}
