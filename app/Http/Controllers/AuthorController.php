<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::paginate(18);
        return view('authors', compact('authors'));
    }

    public function get($id)
    {
        $author = Author::find($id);
        $books = Book::where('author_id', $author->id)->paginate(8);
        return view('author', compact('author', 'books'));
    }
}
