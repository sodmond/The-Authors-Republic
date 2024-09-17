<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() 
    {
        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function get($id) 
    {
        $user = User::find($id);
        $orders = Order::where('user_id', $user->id)->orderByDesc('created_at')->take(10)->get();
        return view('admin.users.single', compact('user', 'orders'));
    }

    public function search() 
    {
        if (! isset($_GET['search'])) {
            redirect()->route('admin.users');
        }
        $val = $_GET['search'];
        $users = User::where('email', 'LIKE', "%$val%")->take(10)->paginate(10);
        return view('backend.users', compact('users'));
    }

    public function orders($id) 
    {
        $user = User::find($id);
        $orders = Order::where('user_id', $user->id)->orderByDesc('created_at')->paginate(10);
        return view('admin.users.orders', compact('user', 'orders'));
    }

    public function posts($id) 
    {
        $user = User::find($id);
        $posts = Post::where('user_id', $user->id)->orderByDesc('created_at')->paginate(10);
        return view('admin.users.posts', compact('user', 'posts'));
    }

    public function comments($id) 
    {
        $user = User::find($id);
        $comments = Comment::where('user_id', $user->id)->orderByDesc('created_at')->paginate(10);
        return view('admin.users.comments', compact('user', 'comments'));
    }
}
