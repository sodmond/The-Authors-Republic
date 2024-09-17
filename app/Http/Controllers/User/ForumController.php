<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ForumController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->take('15')->get();
        return view('user.forum.index', compact('posts'));
    }

    public function posts()
    {
        $posts = Post::orderByDesc('created_at')->paginate('15');
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $posts = Post::where('title', 'LIKE', "%$search%")->orderByDesc('created_at')->paginate('25');
        }
        return view('user.forum.index', compact('posts'));
    }

    public function newPost(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'body'  => ['required']
        ]);
        try {
            Post::create([
                'user_id'   => auth('web')->id(),
                'title'     => strip_tags($request->title),
                'body'      => strip_tags($request->body),
            ]);
            return back()->with('success', 'Post has been submitted');
        } catch(\Exception $e) {
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered, pls try again.']);
        }
    }

    public function thread($id, $slug)
    {
        $post = Post::find($id);
        $comments = $post->comments()->orderByDesc('created_at')->paginate(10);
        return view('user.forum.thread', compact('post', 'comments'));
    }

    public function comment($post_id, Request $request)
    {
        $this->validate($request, [
            'body'  => ['required']
        ]);
        try {
            Comment::create([
                'user_id'   => auth('web')->id(),
                'post_id'   => $post_id,
                'body'      => $request->body
            ]);
            return back()->with('success', 'Comment has been posted.');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered, pls try again.']);
        }
    }
}
