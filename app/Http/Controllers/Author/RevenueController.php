<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\BasicSetting;
use App\Models\Earning;
use App\Models\Order;
use App\Models\Payout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RevenueController extends Controller
{
    public function __construct()
    {
        $this->middleware('author.approval');
    }
    
    public function earnings()
    {
        $earnings = Earning::where('author_id', auth('author')->id())->orderByDesc('created_at')->paginate(10);
        $orders = Order::all()->keyBy('id');
        return view('author.revenue.earnings', compact('earnings', 'orders'));
    }

    public function earning($id)
    {
        $earning = Earning::find($id);
        if ($earning->author_id != auth('author')->id()) {
            return redirect()->route('author.earnings');
        }
        return view('author.revenue.earning', compact('earning'));
    }

    public function payouts()
    {
        $basic_setting = BasicSetting::find(1);
        $payouts = Payout::where('author_id', auth('author')->id())->orderByDesc('created_at')->paginate(10);
        return view('author.revenue.payout_list', compact('payouts', 'basic_setting'));
    }

    public function payout($id)
    {
        $payout = Payout::find($id);
        if ($payout->author_id != auth('author')->id()) {
            return redirect()->route('author.payouts');
        }
        return view('author.revenue.payout', compact('payout'));
    }

    public function payoutNew(Request $request)
    {
        $this->validate($request, [
            'amount' => ['required', 'numeric', 'min:5000'],
            'bank_name' => ['required', 'string', 'max:255'],
            'account_number' => ['required', 'numeric'],
            'account_name' => ['required', 'string', 'max:255']
        ]);
        if (auth('author')->user()->balance < $request->amount) {
            return back()->withErrors(['err_msg' => 'Insufficient balance.']);
        }
        $paymentDetails = $request->except(['_token', 'amount']);
        $basic_setting = BasicSetting::find(1);
        $commission_amount = ($request->amount * $basic_setting->payout_commission) / 100;
        DB::beginTransaction();
        try{
            Payout::create([
                'author_id' => auth('author')->id(),
                'amount' => $request->amount,
                'method' => 'bank transfer',
                'details' => json_encode($paymentDetails),
                'commission' => $basic_setting->payout_commission,
                'org_amount' => $commission_amount,
                'received_amount' => $request->amount - $commission_amount
            ]);
            $author = Author::find(auth('author')->id());
            $author->balance -= $request->amount;
            $author->save();
            DB::commit();
            return back()->with('success', 'New payout request submitted.');
        } catch(\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered, pls try again.']);
        }
    }

    public function payoutTrash(Request $request)
    {
        $this->validate($request, []);
    }
}
