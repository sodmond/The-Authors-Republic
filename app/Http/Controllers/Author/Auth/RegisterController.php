<?php

namespace App\Http\Controllers\Author\Auth;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\AuthorParent;
use App\Models\Shipping;
use App\Notifications\EmailVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        $locations = Shipping::all();
        return view('author.auth.register', compact('locations'));
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'title' => ['nullable', 'max:20'],
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:authors'],
            'phone' => ['required', 'numeric', 'unique:authors'],
            'password' => ['required', 'confirmed', 'min:8'],
            'dob' => ['required', 'date'],
            'city' => ['required', 'max:20'],
            'state' => ['required', 'max:20'],
            'zip' => ['required', 'max:10'],

        ]);
        $data = $request->all();
        $author = Author::create([
            'title' => $data['title'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'dob' => $data['dob'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'approval' => true
        ]);
        AuthorParent::create(['author_id' => $author->id]);
        Auth::guard('author')->login($author);
        auth('author')->user()->notify(new EmailVerify);
        return redirect()->route('author.profile');
    }
}
