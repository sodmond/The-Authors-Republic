<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\BookReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $searchArr = explode(' ', $search);
            $books = Book::join('authors', 'books.author_id', '=', 'authors.id')
                        ->where('books.title', 'LIKE', "%$search%")
                        ->orWhereIn('authors.firstname', $searchArr)
                        ->orWhereIn('authors.lastname', $searchArr)
                        ->select('books.*', 'authors.firstname')
                        ->paginate(12);
            return view('books', compact('books'));
        }
        $books = Book::where('status', true)->orderByDesc('created_at')->paginate(12);
        return view('books', compact('books'));
    }

    public function category($id, $title)
    {
        $category = BookCategory::find($id);
        if($category) {
            $books = Book::where('category_id', $category->id)->paginate(12);
            return view('books', compact('books', 'category'));
        }
        return redirect()->route('books');
    }

    public function get($id, $slug)
    {
        $book = Book::find($id);
        $author = Author::find($book->author_id);
        if ($author->ban_status == true) {
            return back();
        }
        return view('book', compact('book', 'author'));
    }

    public function review($id, Request $request)
    {
        $this->validate($request, [
            'comment' => ['required', 'string', 'max:1500'],
            'rating' => ['required', 'integer', 'max:5']
        ],[
            'rating.required' => 'You need to give a star rating'
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
