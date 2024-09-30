<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderByDesc('created_at')->paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function get($id)
    {
        $book = Book::find($id);
        return view('admin.books.single', compact('book'));
    }

    public function new()
    {
        $book_categories = DB::table('book_categories')->get();
        $authors = Author::all();
        return view('admin.books.new', compact('book_categories', 'authors'));
    }

    public function addNew(BookRequest $request)
    {
        $imgPath = $request->file('image')->store('books', 'public');
        $bookFile = Str::random(32) . '.' . $request->file('book_file')->extension();
        Storage::putFileAs('books/', $request->file('book_file'), $bookFile);
        $description = Str::random() . '.txt';
        Storage::put('books/contents/'.$description, $request->description);
        $book = new Book();
        $book->author_id = $request->author;
        $book->category_id = $request->category;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->description = $description;
        $book->price = $request->price;
        $book->image = $imgPath;
        $book->book_file = $bookFile;
        $book->published_at = $request->published_at;
        $book->pages_number = $request->pages_number;
        $book->featured = $request->featured;
        if ($book->save()) {
            return back()->with('success', 'New book has been added');
        }
        return back()->withErrors(['err_msg' => 'Error adding new book, pls try again']);
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $book_categories = DB::table('book_categories')->get();
        return view('admin.books.edit', compact('book', 'book_categories'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'category' => ['required', 'integer'],
            'isbn' => ['nullable', 'max:255'],
            'soft_copy' => ['required', 'integer', 'max:1'],
            'hard_copy' => ['required', 'integer', 'max:1', 'accepted_if:soft_copy,0'],
            'description' => ['nullable', 'max:5000'],
            'price' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:512', Rule::dimensions()->minWidth(370)->ratio(1 / 1)],
            'book_file' => ['nullable', 'mimes:pdf', 'max:2048'],
            'pages_number' => ['required', 'integer'],
            'published_at' => ['required', 'date'],
            'featured' => ['nullable', 'integer', 'max:1']
        ],[
            'hard_copy.accepted_if' => 'Hard copy must be YES, if you are not providing a soft copy',
        ]);
        $book = Book::find($id);
        if ($request->hasFile('image')) {
            if (Storage::exists('public/'.$book->image)) {
                Storage::delete('public/'.$book->image);
            }
            $imgPath = $request->file('image')->store("books", 'public');
            $book->image = $imgPath;
        }
        if ($request->hasFile('book_file')) {
            if (Storage::exists('books/'.$book->book_file)) {
                Storage::delete('books/'.$book->book_file);
            }
            $bookFile = Str::random(32) . '.' . $request->file('book_file')->extension();
            Storage::putFileAs('books/', $request->file('book_file'), $bookFile);
            $book->book_file = $bookFile;
        }
        Storage::put('books/contents/'.$book->description, $request->description);
        $book->category_id = $request->category;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->price = $request->price;
        $book->published_at = $request->published_at;
        $book->pages_number = $request->pages_number;
        $book->featured = $request->featured;
        if ($book->save()) {
            return back()->with('success', 'Book has been updated');
        }
        return back()->withErrors(['err_msg' => 'Error updating book, pls try again']);
    }

    public function download($book_file)
    {
        $book_file_path = 'books/'.$book_file;
        return Storage::download($book_file_path);
    }
}
