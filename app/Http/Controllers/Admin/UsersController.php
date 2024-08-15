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
        return view('admin.users.index', compact('users'));
    }

    public function get($id) {
        $user = User::find($id);
        if ($user) {
            #$orders = Order::where('user_id', $user->id)->get();
            return view('admin.users.single', compact('user', 'orders'));
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
