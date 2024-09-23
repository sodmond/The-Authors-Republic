<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $books = Book::where('title', 'LIKE', "%$search%")->paginate(12);
            return view('books', compact('books'));
        }
        $books = Book::paginate(12);
        return view('books', compact('books'));
    }

    public function get($id, $slug)
    {
        $book = Book::find($id);
        $author = Author::find($book->author_id);
        return view('book', compact('book', 'author'));
    }

    public function review($id, Request $request)
    {
        $this->validate($request, [
            'comment' => ['required', 'string', 'max:1500'],
            'rating' => ['required', 'integer', 'max:5']
        ]);
        try {
            BookReview::create([
                'book_id' => $id,
                'user_id' => auth('web')->id(),
                'comment' => $request->comment,
                'rating' => $request->rating,
            ]);
            return back();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back();
        }
    }
}
