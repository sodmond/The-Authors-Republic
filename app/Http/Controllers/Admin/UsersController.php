<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $users = User::paginate(15);
        return view('backend.users', compact('users'));
    }

    public function view($id) {
        $user = User::find($id);
        if ($user) {
            $orders = Order::where('user_id', $user->id)->get();
            return view('backend.user', compact('user', 'orders'));
        }
        return redirect()->route('admin.home');
    }
    
    public function search() {
        if (! isset($_GET['search'])) {
            redirect()->route('admin.users');
        }
        $val = $_GET['search'];
        $users = User::where('email', 'LIKE', "%$val%")->take(10)->paginate(10);
        return view('backend.users', compact('users'));
    }
}
