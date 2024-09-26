<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Earning;
use App\Models\Order;
use App\Models\Payout;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function earnings()
    {
        $earnings = Earning::orderByDesc('created_at')->paginate(10);
        $orders = Order::all()->keyBy('id');
        return view('admin.revenue.earnings', compact('earnings', 'orders'));
    }

    public function earning($id)
    {
        $earning = Earning::find($id);
        return view('admin.revenue.earning', compact('earning'));
    }

    public function payouts()
    {
        $payouts = Payout::orderByDesc('created_at')->paginate(10);
        return view('admin.revenue.payout_list', compact('payouts'));
    }

    public function payout($id)
    {
        $payout = Payout::find($id);
        return view('admin.revenue.payout', compact('payout'));
    }

    public function payoutApprove($id, Request $request)
    {
        $this->validate($request, [
            'status' => ['required']
        ]);
        $payout = Payout::find($id);
        if ($request->status == 1) {
            $payout->update(['status' => 'completed']);
            return back()->with('success', 'Payout request has been approved');
        }
        $payout->update(['status' => 'cancelled']);
        return back()->with('success', 'Payout request has been declined');
    }
}
