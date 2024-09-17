<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AddressBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AddressBookController extends Controller
{
    public function index()
    {
        $addressBook = AddressBook::where('user_id', auth()->id())->paginate(10);
        return view('user.address_book.index', compact('addressBook'));
    }

    public function new()
    {
        return view('user.address_book.new');
    }

    public function saveNew(Request $request)
    {
        $this->validate($request, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'integer'],
            'default' => ['required', 'integer', 'max:1'],
        ]);
        DB::beginTransaction();
        try {
            if ($request->default == 1) {
                AddressBook::where('user_id', auth()->id())->update(['default' => 0]);
            }
            AddressBook::create(
                array_merge(
                    ['user_id' => auth()->id()], 
                    $request->except('_token')
                )
            );
            DB::commit();
            return back()->with('success', 'New address has been added');
        } catch(\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered, pls try again.']);
        }
    }

    public function edit($id)
    {
        $address = AddressBook::find($id);
        if ($address->user_id != auth()->id()) {
            return redirect()->back();
        }
        return view('user.address_book.edit', compact('address'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'integer'],
            'default' => ['required', 'integer', 'max:1'],
        ]);
        $address = AddressBook::find($id);
        if ($address->user_id != auth()->id()) {
            return redirect()->back();
        }
        DB::beginTransaction();
        try {
            if ($request->default == 1) {
                AddressBook::where('user_id', auth()->id())->update(['default' => 0]);
            }
            $address->update($request->except('_token'));
            DB::commit();
            return back()->with('success', 'Address has been updated');
        } catch(\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered, pls try again.']);
        }
    }
}
