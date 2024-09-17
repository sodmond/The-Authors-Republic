<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(12);
        return view('books', compact('books'));
    }

    public function get($id, $slug)
    {
        $book = Book::find($id);
        $author = Author::find($book->author_id);
        return view('book', compact('book', 'author'));
    }
}
