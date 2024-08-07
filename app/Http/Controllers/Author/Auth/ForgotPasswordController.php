<?php

namespace App\Http\Controllers\Author\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Controllers\Auth\ForgotPasswordController as DefaultForgotPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends DefaultForgotPasswordController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    public function __construct()
    {
        $this->middleware('guest:author')->except('logout');
    }

    public function showLinkRequestForm()
    {
        return view('author.auth.passwords.email');
    }

    // Password Broker for Admin Model
    public function broker()
    {
        return Password::broker('authors');
    }
}
