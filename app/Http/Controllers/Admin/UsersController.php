<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Post;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function index() 
    {
        if (isset($_GET['search'])) {
            $searchVal = $_GET['search'];
            $searchArr = explode(' ', $searchVal);
            $users = User::whereIn('firstname', $searchArr)->orWhereIn('lastname', $searchArr)->orderByDesc('created_at')->paginate(10);
            return view('admin.users.index', compact('users'));
        }
        $users = User::orderByDesc('created_at')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function get($id) 
    {
        $user = User::find($id);
        $orders = Order::where('user_id', $user->id)->orderByDesc('created_at')->take(10)->get();
        return view('admin.users.single', compact('user', 'orders'));
    }

    /*public function search() 
    {
        if (! isset($_GET['search'])) {
            redirect()->route('admin.users');
        }
        $val = $_GET['search'];
        $users = User::where('email', 'LIKE', "%$val%")->take(10)->paginate(10);
        return view('backend.users', compact('users'));
    }*/

    public function orders($id) 
    {
        $user = User::find($id);
        $orders = Order::where('user_id', $user->id)->orderByDesc('created_at')->paginate(10);
        return view('admin.users.orders', compact('user', 'orders'));
    }

    public function posts($id) 
    {
        $user = User::find($id);
        $posts = Post::where('user_type', 'user')->where('user_id', $user->id)->orderByDesc('created_at')->paginate(10);
        return view('admin.users.posts', compact('user', 'posts'));
    }

    public function comments($id) 
    {
        $user = User::find($id);
        $comments = Comment::where('user_type', 'user')->where('user_id', $user->id)->orderByDesc('created_at')->paginate(10);
        return view('admin.users.comments', compact('user', 'comments'));
    }

    public function export()
    {
        if (isset($_GET['month']) && isset($_GET['year'])) {
            $month = $_GET['month'];
            $year = $_GET['year'];
            $dateObj = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F');
            $fileName = 'users-'.$monthName.$year.'.xlsx';
            return Excel::download(new UsersExport($month, $year), $fileName);
        }
        return redirect()->back();
    }

    public function ban($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->ban_status == false) {
                $user->ban_status = true;
                $user->save();
                return back()->with('success', 'User has been banned');
            }
            $user->ban_status = false;
            $user->save();
            return back()->with('success', 'User ban has been lifted');
        }
    }
}
