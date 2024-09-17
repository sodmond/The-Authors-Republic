<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function update(ProfileRequest $request)
    {
        auth('web')->user()->update($request->all());
        return back()->with('success', 'Profile successfully updated.');
    }
}
