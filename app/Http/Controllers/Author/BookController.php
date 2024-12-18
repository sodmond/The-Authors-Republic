<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function __construct()
    {
        #$this->middleware('author.approval');
    }

    public function index()
    {
        $books = Book::where('author_id', auth('author')->id())->orderByDesc('created_at')->paginate(10);
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
        #$imgPath = $request->file('image')->store('books', 'public');
        $bookFile = '';
        if ($request->hasFile('book_file')) {
            $bookFile = Str::random(32) . '.' . $request->file('book_file')->extension();
            Storage::putFileAs('public/books/files/', $request->file('book_file'), $bookFile);
        }
        $description = Str::random() . '.txt';
        Storage::put('books/contents/'.$description, $request->description);
        $book = new Book();
        $book->author_id = auth('author')->id();
        $book->category_id = $request->category;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->soft_copy = $request->soft_copy;
        $book->hard_copy = $request->hard_copy;
        #$book->stock = $request->stock ?? 0;
        $book->description = $description;
        $book->price = $request->price ?? 0;
        $book->price2 = $request->price2 ?? 0;
        $book->published_at = $request->published_at;
        $book->pages_number = $request->pages_number;
        #$book->image = $imgPath;
        $book->book_file = $bookFile;
        if ($book->save()) {
            return redirect()->route('author.book.edit', ['id' => $book->id])->with('success', 'Your book has been saved, please upload book image to publish it.');
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
            'hard_copy' => ['required', 'integer', 'max:1', 'accepted_if:soft_copy,0'],
            #'stock' => ['nullable', 'integer'],
            'description' => ['nullable', 'max:5000'],
            'price' => ['nullable', 'required_if:soft_copy,1', 'numeric', function (string $attribute, mixed $value, Closure $fail) use($request) {
                if ($value < 1 && $request->soft_copy == 1) {
                    $fail("The price for soft copy should be greater than 0.");
                }
            }],
            'price2' => ['nullable', 'required_if:hard_copy,1', 'numeric', function (string $attribute, mixed $value, Closure $fail) use($request) {
                if ($value < 1 && $request->hard_copy == 1) {
                    $fail("The price for hard copy should be greater than 0.");
                }
            }],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:512', Rule::dimensions()->minWidth(370)->ratio(1 / 1)],
            'book_file' => ['required_if_accepted:soft_copy', 'mimes:pdf', 'max:10240'],
            'pages_number' => ['required', 'integer'],
            'published_at' => ['required', 'date'],
        ],[
            'hard_copy.accepted_if' => 'Hard copy must be YES, if you are not providing a soft copy',
            'price.required_if' => 'Price for soft copy is required',
            'price2.required_if' => 'Price for hard copy is required',
            'book_file.required_if_accepted' => 'A book file should be uploaded if you are providing a soft copy',
            #'stock.required_if' => 'Stock is required if you are selling hard copy'
        ]);
        $book = Book::find($id);
        /*if ($request->hasFile('image')) {
            if (Storage::exists('public/'.$book->image)) {
                Storage::delete('public/'.$book->image);
            }
            $imgPath = $request->file('image')->store("books", 'public');
            $book->image = $imgPath;
        }*/
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
        #$book->stock = $request->stock ?? 0;
        $book->price = $request->price ?? 0;
        $book->price2 = $request->price2 ?? 0;
        $book->published_at = $request->published_at;
        $book->pages_number = $request->pages_number;
        if ($book->save()) {
            return back()->with('success', 'Book has been updated');
        }
        return back()->withErrors(['err_msg' => 'Error updating book, pls try again']);
    }

    public function updateImage($id, Request $request)
    {
        $this->validate($request, [
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:512', Rule::dimensions()->width(370)->height(500)],
        ]);
        $book = Book::find($id);
        $suc_msg = empty($book->image) ? 'Book has been published' : 'Book cover image has been updated';
        if (Storage::exists('public/'.$book->image)) {
            Storage::delete('public/'.$book->image);
        }
        $imgPath = $request->file('image')->store("books", 'public');
        $book->image = $imgPath;
        $book->status = true;
        $book->save();
        return back()->with('success', $suc_msg);
    }
    
    
    public function download($book_file)
    {
        $book_file_path = 'books/'.$book_file;
        return Storage::download($book_file_path);
    }

    public function trash($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('author.books')->with('success', 'Book has been deleted');
    }
}
