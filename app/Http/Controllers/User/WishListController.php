<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function index()
    {
        $savedItems = DB::table('wishlist')->where('user_id', auth('web')->id())->pluck('book_id');
        $books = Book::whereIn('id', $savedItems)->paginate(10);
        return view('user.wishlist', compact('books'));
    }

    public function addItem(Request $request)
    { #dd($request->all());
        $this->validate($request, [
            'book_id' => ['required', 'integer']
        ]);
        $wishlist = DB::table('wishlist')->where('book_id', $request->book_id)->get();
        if ($wishlist->count() < 1) {
            DB::table('wishlist')->insert([
                'user_id' => auth('web')->id(),
                'book_id' => $request->book_id,
                'created_at' => now()
            ]);
        }
        return back();
    }
}
