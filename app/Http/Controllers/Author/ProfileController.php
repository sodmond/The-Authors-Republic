<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Mail\SendPasswordChange;
use App\Models\Author;
use App\Models\AuthorParent;
use App\Models\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $author_parent = AuthorParent::where('author_id', auth('author')->id())->first();
        $age = Carbon::now()->diff(auth('author')->user()->dob);
        if (!$author_parent) {
            $author_parent = AuthorParent::create(['author_id' => auth('author')->id()]);
        }
        $locations = Shipping::all();
        return view('author.profile', compact('author_parent', 'age', 'locations'));
    }

    public function update(ProfileRequest $request)
    {
        auth('author')->user()->update($request->all());
        return back()->with('success', 'Profile successfully updated.');
    }

    public function updateImage(Request $request)
    {
        $this->validate($request, [
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:512', Rule::dimensions()->minWidth(370)->ratio(1 / 1)]
        ]);
        if (Storage::exists('public/'.auth('author')->user()->image)) {
            Storage::delete('public/'.auth('author')->user()->image);
        }
        $imgPath = $request->file('image')->store("author/image", 'public');
        Author::where('id', auth('author')->id())->update(['image' => $imgPath]);
        return back()->with('success', 'Profile picture successfully updated.');
    }

    public function updateParent(ProfileRequest $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'phone' => ['required', 'numeric'],
            'dob' => ['required', 'date'],
            'relationship' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'state' => ['required', 'max:255'],
            'zip' => ['required', 'numeric']
        ]);
        AuthorParent::where('author_id', auth('author')->id())->update($request->except(['_token']));
        return back()->with('success', 'Parent profile successfully updated.');
    }

    public function password()
    {
        return view('author.change_password');
    }

    public function passwordUpdate(PasswordRequest $request)
    {
        auth('author')->user()->update(['password' => Hash::make($request->get('password'))]);
        #Mail::to(auth('author')->user()->email)->send(new SendPasswordChange(auth('author')->user()->firstname));
        return back()->with('success', 'Password successfully updated.');
    }
}
