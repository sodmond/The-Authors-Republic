<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Mail\SendPasswordChange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function index()
    {
        return view('author.profile');
    }

    public function update(ProfileRequest $request)
    {
        auth('author')->user()->update($request->all());
        return back()->with('success', 'Profile successfully updated.');
    }

    public function password()
    {
        return view('author.change_password');
    }

    public function passwordUpdate(PasswordRequest $request)
    {
        auth('author')->user()->update(['password' => Hash::make($request->get('password'))]);
        Mail::to(auth('author')->user()->email)->send(new SendPasswordChange(auth('author')->user()->firstname));
        return back()->with('success', 'Password successfully updated.');
    }
}
