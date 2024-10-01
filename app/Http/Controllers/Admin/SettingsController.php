<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Mail\SendPasswordChange;
use App\Models\Admin;
use App\Models\BasicSetting;
use App\Models\BookCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SettingsController extends Controller
{
    public function index()
    {
        $adminRoles = DB::table('admin_roles')->get();
        $admins = Admin::all();
        $basic_setting = BasicSetting::find(1);
        return view('admin.settings', compact('adminRoles', 'admins', 'basic_setting'));
    }

    public function newAdmin(Request $request)
    {
        if (auth('admin')->user()->role != 1) {
            return redirect()->route('backend.settings');
        }
        $this->validate($request, [
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:admins'],
            'role' => ['required', 'integer', 'exists:admin_roles,id'],
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'min:6'],
        ]);
        if (auth('admin')->id() != 1 && $request->role == 1) {
            return back()->withErrors(['err_msg' => 'Only the system administrator can create a user with super admin role']);
        }
        $admin = new Admin;
        $admin->firstname = $request->firstname;
        $admin->lastname = $request->lastname;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return back()->with('success', 'New administrator has been added.');
    }

    public function editAdmin($id)
    {
        $admin = Admin::find($id);
        $adminRoles = DB::table('admin_roles')->get();
        return view('admin.edit_admin', compact('admin', 'adminRoles'));
    }

    public function updateAdmin($id, Request $request)
    {
        $this->validate($request, [
            'firstname' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'email' => ['required', 'email', Rule::unique((new Admin)->getTable())->ignore($id)],
            'role' => ['required', 'integer', 'exists:admin_roles,id'],
        ]);
        $admin = Admin::find($id);
        $admin->update($request->except('_token'));
        return back()->with('success', 'Admin profile has been updated.');
    }

    public function updateAdminPassword($id, Request $request)
    {
        $this->validate($request, [
            'password' => ['required', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'min:6'],
        ]);
        $admin = Admin::find($id);
        $admin->update(['password' => Hash::make($request->get('password'))]);
        Mail::to(auth('admin')->user()->email)->send(new SendPasswordChange($admin->firstname));
        return back()->with('success', 'Password successfully updated.');
    }

    public function deleteAdmin($id)
    {
        if ($id == 1 || $id == auth('admin')->id() || auth('admin')->user()->role != 1) {
            return back()->withErrors(['adm_err' => 'Administrator cannot be deleted']);
        }
        $admin = Admin::find($id);
        if ($admin->role == 1 && auth('admin')->id() != 1) {
            return back()->withErrors(['adm_err' => 'Only the system administrator can delete a super admin.']);
        }
        $admin->delete();
        return back()->with('success', 'Administrator has been deleted');
    }

    public function bookCat()
    {
        $book_cats = BookCategory::all()->keyBy('id'); #dd(count($book_cats[1]->books));
        return view('admin.book_categories', compact('book_cats'));
    }

    public function newBookCat(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'parent_id' => ['nullable', 'integer'],
            'status' => ['required', 'integer'],
        ]);
        try {
            BookCategory::create(
                array_merge(
                    $request->except('_token'), [
                        'created_at' => now()
                    ]
                )
            );
            return back()->with('success', 'New book category has been added');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered, pls try again']);
        }
    }

    public function editBookCat($id)
    {
        $book_cat = BookCategory::find($id);
        $parent_cats = BookCategory::where('parent_id', null)->get();
        return view('admin.book_category', compact('book_cat', 'parent_cats'));
    }

    public function updateBookCat($id, Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'parent_id' => ['nullable', 'integer'],
            'status' => ['required', 'integer'],
        ]);
        try {
            BookCategory::where('id', $id)->update(
                array_merge(
                    $request->except('_token'), [
                        'updated_at' => now()
                    ]
                )
            );
            return back()->with('success', 'Book category has been updated');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered, pls try again']);
        }
    }

    public function trashBookCat($id)
    {
        $book_cat = BookCategory::find($id);
        if (count($book_cat->books) > 0) {
            return back()->withErrors(['adm_err' => 'Book category cannot be deleted']);
        }
        $book_cat->delete();
        return back()->with('success', 'Book category has been deleted');
    }

    public function commRate(Request $request)
    {
        $this->validate($request, [
            'payout_commission' => ['required', 'numeric', 'min:0'],
            'author_premium_fee' => ['required', 'numeric', 'min:0']
        ]);
        $basic_setting = BasicSetting::find(1);
        $basic_setting->payout_commission = $request->payout_commission;
        $basic_setting->author_premium_fee = $request->author_premium_fee;
        $basic_setting->save();
        return back()->with('success', 'Commission rate has been updated');
    }
}
