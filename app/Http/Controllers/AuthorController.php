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
        if (isset($_GET['search'])) {
            $search = explode(' ', $_GET['search']);
            $authors = Author::whereIn('firstname', $search)
                        ->orWhereIn('lastname', $search)
                        ->paginate(12);
            return view('authors', compact('authors'));
        }
        $authors = Author::where('email_verified_at', '<>', NULL)->where('ban_status', false)->paginate(18);
        return view('authors', compact('authors'));
    }

    public function get($id)
    {
        $author = Author::find($id);
        if ($author->ban_status == true) {
            return back();
        }
        $books = Book::where('author_id', $author->id)->where('status', true)->orderByDesc('created_at')->paginate(8);
        return view('author', compact('author', 'books'));
    }

    public function blog()
    {
        if (isset($_GET['author'])) {
            $author = Author::find($_GET['author']);
            if ($author->ban_status == true) {
                return back();
            }
            $authorsBlog = AuthorsBlog::where('author_id', $author->id)->orderByDesc('published_at')->paginate(18);
            return view('authors_blog', compact('authorsBlog', 'author'));
        }
        $authorsBlog = AuthorsBlog::orderByDesc('published_at')->paginate(18);
        return view('authors_blog', compact('authorsBlog'));
    }

    public function singleBlog($id, $slug)
    {
        $article = AuthorsBlog::find($id);
        if ($article->author->ban_status == true) {
            return back();
        }
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
