<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\AuthorsBlog;
use App\Models\AuthorsBlogComment;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::where('approval', true)->paginate(18);
        return view('authors', compact('authors'));
    }

    public function get($id)
    {
        $author = Author::find($id);
        $books = Book::where('author_id', $author->id)->paginate(8);
        return view('author', compact('author', 'books'));
    }

    public function blog()
    {
        if (isset($_GET['author'])) {
            $author = Author::find($_GET['author']);
            $authorsBlog = AuthorsBlog::where('author_id', $author->id)->orderByDesc('published_at')->paginate(18);
            return view('authors_blog', compact('authorsBlog', 'author'));
        }
        $authorsBlog = AuthorsBlog::orderByDesc('published_at')->paginate(18);
        return view('authors_blog', compact('authorsBlog'));
    }

    public function singleBlog($id, $slug)
    {
        $article = AuthorsBlog::find($id);
        return view('authors_blog_details', compact('article'));
    }

    public function blogComment($id, Request $request)
    {
        $this->validate($request, [
            'body' => ['required', 'string', 'max:5000']
        ]);
        DB::beginTransaction();
        try {
            AuthorsBlogComment::create([
                'authors_blog_id' => $id,
                'user_type' => auth('author')->check() ? 'author' : 'user',
                'user_id' => auth('author')->check() ? auth('author')->id() : auth('web')->id(),
                'body' => $request->body
            ]);
            DB::commit();
            return back()->with('success', 'Comment has been posted');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => '']);
        }
    }
}
