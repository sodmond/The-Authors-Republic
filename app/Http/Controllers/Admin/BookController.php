<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index()
    {
        if (isset($_GET['search'])) {
            $searchVal = $_GET['search'];
            $books = Book::where('title', 'LIKE', "%$searchVal%")->orderByDesc('created_at')->paginate(10);
            return view('admin.books.index', compact('books'));
        }
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
        $authors = Author::orderBy('firstname')->get();
        return view('admin.books.new', compact('book_categories', 'authors'));
    }

    public function addNew(BookRequest $request)
    {
        $imgPath = $request->file('image')->store('books', 'public');
        $bookFile = '';
        if ($request->hasFile('book_file')) {
            $bookFile = Str::random(32) . '.' . $request->file('book_file')->extension();
            Storage::putFileAs('public/books/files/', $request->file('book_file'), $bookFile);
        }
        $description = Str::random() . '.txt';
        Storage::put('books/contents/'.$description, $request->description);
        $book = new Book();
        $book->author_id = $request->author;
        $book->category_id = $request->category;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->soft_copy = $request->soft_copy;
        $book->hard_copy = $request->hard_copy;
        $book->stock = $request->stock ?? 0;
        $book->description = $description;
        $book->price = $request->price ?? 0;
        $book->price2 = $request->price2 ?? 0;
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
            'stock' => ['nullable', 'integer', 'required_if:hard_copy,1'],
            'description' => ['nullable', 'max:5000'],
            'price' => ['nullable', 'required_if:soft_copy,1', 'numeric', function (string $attribute, mixed $value, Closure $fail) use($request) {
                if ($value == 0 && $request->soft_copy == 1) {
                    $fail("The price for soft copy should be greater than 0.");
                }
            }],
            'price2' => ['nullable', 'required_if:hard_copy,1', 'numeric', function (string $attribute, mixed $value, Closure $fail) use($request) {
                if ($value == 0 && $request->hard_copy == 1) {
                    $fail("The price for hard copy should be greater than 0.");
                }
            }],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:512', Rule::dimensions()->width(370)->height(500)],
            'book_file' => ['nullable', 'mimes:pdf', 'max:10240'],
            'pages_number' => ['required', 'integer'],
            'published_at' => ['required', 'date'],
            'featured' => ['nullable', 'integer', 'max:1']
        ],[
            'hard_copy.accepted_if' => 'Hard copy must be YES, if you are not providing a soft copy',
            'price.required_if' => 'Price for soft copy is required',
            'price2.required_if' => 'Price for hard copy is required',
            'book_file.required_if_accepted' => 'A book file should be uploaded if you are providing a soft copy',
            'stock.required_if' => 'Stock is required if you are selling hard copy'
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
            if (Storage::exists('public/books/files/'.$book->book_file)) {
                Storage::delete('public/books/files/'.$book->book_file);
            }
            $bookFile = Str::random(32) . '.' . $request->file('book_file')->extension();
            Storage::putFileAs('public/books/files/', $request->file('book_file'), $bookFile);
            $book->book_file = $bookFile;
        }
        Storage::put('books/contents/'.$book->description, $request->description);
        $book->category_id = $request->category;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->soft_copy = $request->soft_copy;
        $book->hard_copy = $request->hard_copy;
        $book->stock = $request->stock ?? 0;
        $book->price = $request->price ?? 0;
        $book->price2 = $request->price2 ?? 0;
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
