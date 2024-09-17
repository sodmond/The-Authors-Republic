<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('author.approval');
    }

    public function index()
    {
        $books = Book::where('author_id', auth('author')->id())->paginate(10);
        return view('author.books.index', compact('books'));
    }

    public function get($id)
    {
        $book = Book::find($id);
        return view('author.books.single', compact('book'));
    }

    public function new()
    {
        $book_categories = DB::table('book_categories')->get();
        return view('author.books.new', compact('book_categories'));
    }

    public function addNew(BookRequest $request)
    {
        if ($request->soft_copy == false && $request->soft_copy == $request->hard_copy) {
            return back()->withErrors(['err_msg' => 'The book needs at least a copy, select Yes on either soft or hard copy.']);
        }
        $imgPath = $request->file('image')->store('books', 'public');
        $bookFile = Str::random(32) . '.' . $request->file('book_file')->extension();
        Storage::putFileAs('books/', $request->file('book_file'), $bookFile);
        $description = Str::random() . '.txt';
        Storage::put('books/contents/'.$description, $request->description);
        $book = new Book();
        $book->author_id = auth('author')->id();
        $book->category_id = $request->category;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->description = $description;
        $book->price = $request->price;
        $book->image = $imgPath;
        $book->book_file = $bookFile;
        if ($book->save()) {
            return back()->with('success', 'New book has been added');
        }
        return back()->withErrors(['err_msg' => 'Error adding new book, pls try again']);
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $book_categories = DB::table('book_categories')->get();
        return view('author.books.edit', compact('book', 'book_categories'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'category' => ['required', 'integer'],
            'isbn' => ['nullable', 'max:255'],
            'soft_copy' => ['required', 'integer', 'max:1'],
            'hard_copy' => ['required', 'integer', 'max:1'],
            'description' => ['nullable', 'max:1024'],
            'price' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg'],
            'book_file' => ['nullable', 'mimes:pdf'],
        ]);
        if ($request->soft_copy == false && $request->soft_copy == $request->hard_copy) {
            return back()->withErrors(['err_msg' => 'The book needs at least a copy, select Yes on either soft or hard copy.']);
        }
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
