<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $cookieId = Cart::getCookie();
        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials, $request->get('remember'))) {
            if (auth('web')->user()->ban_status == true) {
                Auth::guard('web')->logout();
                return redirect()->route('login');
            }
            Cart::where('cookie_id', $cookieId)->update(['user_id' => auth('web')->id()]);
            return redirect()->intended();
        }
        return redirect()->back()->withErrors(['err_msg' => 'Opps! You have entered invalid credentials']);
    }
}
