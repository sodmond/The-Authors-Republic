<?php

namespace App\Http\Controllers\Author\Auth;

use App\Http\Controllers\Auth\LoginController as DefaultLoginController;
use App\Models\Admin;
use App\Notifications\LoginAlert;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends DefaultLoginController
{
    protected $redirectTo = RouteServiceProvider::AUTHORHOME;

    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 30; // Default is 1

    public function __construct()
    {
        $this->middleware('guest:author')->except('logout');
    }

    public function showLoginForm()
    {
        return view('author.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::guard('author')->attempt($credentials, $request->get('remember'))) {
            return redirect()->route('author.home');
        }
        return redirect()->route('author.login')->withErrors(['err_msg' => 'Opps! You have entered invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('author')->logout();
        return redirect()->route('author.login');
    }
    
    /*public function username()
    {
        return 'username';
    }
    
    protected function guard()
    {
        return Auth::guard('admin');
    }*/
}
