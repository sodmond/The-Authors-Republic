<?php

namespace App\Http\Controllers\Author\Auth;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('author.auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:authors'],
            'phone' => ['required', 'numeric', 'unique:authors'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
        $data = $request->all();
        $author = Author::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        Auth::guard('author')->login($author);
    }
}
