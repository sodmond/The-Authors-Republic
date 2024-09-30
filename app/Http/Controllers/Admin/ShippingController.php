<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {
        $shipping_locations = Shipping::orderBy('state')->paginate(10);
        return view('admin.shipping_states', compact('shipping_locations'));
    }

    public function edit($id)
    {
        $shipping_location = Shipping::find($id);
        return view('admin.shipping_location', compact('shipping_location'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'state' => ['required', 'string', 'max:50'],
            'fee' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'numeric', 'max:10']
        ]);
        Shipping::where('id', $id)->update($request->except(['_token']));
        return back()->with('success', 'Shipping location details has been updated.');
    }
}
