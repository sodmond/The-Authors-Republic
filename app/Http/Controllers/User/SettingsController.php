<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Mail\SendPasswordChange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SettingsController extends Controller
{
    public function index()
    {
        return view('user.settings');
    }

    public function passwordUpdate(PasswordRequest $request)
    {
        auth('admin')->user()->update(['password' => Hash::make($request->get('password'))]);
        Mail::to(auth('admin')->user()->email)->send(new SendPasswordChange(auth('web')->user()->firstname));
        return back()->with('success', 'Password successfully updated.');
    }
}
