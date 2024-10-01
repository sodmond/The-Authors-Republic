<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentController;
use App\Models\Admin;
use App\Models\Author;
use App\Models\BasicSetting;
use App\Models\Book;
use App\Models\Earning;
use App\Models\Order;
use App\Models\Payout;
use App\Notifications\ApprovalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Calculation\Database\DMax;
use Unicodeveloper\Paystack\Facades\Paystack;

class HomeController extends Controller
{
    public function home()
    {
        return redirect()->route('author.home');
    }

    public function index()
    {
        $books = Book::where('author_id', auth('author')->id())->pluck('id');
        $orders = Order::with('orderContent')->whereHas('orderContent', function($q) use($books) {
            $q->whereIn('book_id', $books);
        })->orderByDesc('created_at')->get();
        $ordersCount = $orders->count();
        $ordersTotal = $orders->sum('total_cost'); #dd($orders[0]->user);
        $earnings = Earning::where('author_id', auth('author')->id())->get();
        $payouts = Payout::where('author_id', auth('author')->id())->get();
        return view('author.home', compact('books', 'orders', 'ordersCount', 'ordersTotal', 'earnings', 'payouts'));
    }

    public function requestApproval(Request $request)
    {
        $admin = Admin::find(1);
        $admin->notify(new ApprovalRequest(auth('author')->id()));
        return back()->with('success', 'Approval request has been sent.');
    }

    public function premiumPayment(Request $request)
    {
        $basic_settings = BasicSetting::find(1);
        if ($request->method() == 'GET') {
            return view('author.premium_payment', compact('basic_settings'));
        }
        $data = [
            'amount'    => ($basic_settings->author_premium_fee * 100),
            'email'     => auth('author')->user()->email,
            'currency'  => 'NGN',
            'reference' => Paystack::genTranxRef(),
            'metadata' => [
                'author_id' => auth('author')->id(),
                'author_premium' => true
            ],
            'callback_url' => route('payment.verify')
        ];
        try {
            $paymentUrl = Paystack::getAuthorizationUrl($data);
            return $paymentUrl->redirectNow();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered, pls try again']);
        }
    }

    public static function setAuthorPro($paymentData)
    {
        $paymentMeta = $paymentData['metadata'];
        DB::beginTransaction();
        try {
            $transactions = DB::table('transactions')->where('reference', $paymentData['reference'])->get();
            if ($transactions->count() < 1) {
                $transaction = DB::table('transactions')->insertGetId([
                    'type' => 'purchase',
                    'method' => 'Paystack',
                    'amount' => $paymentData['amount']/100,
                    'reference' => $paymentData['reference'],
                    'memo' => '',
                    'status' => 'completed',
                    'created_at' => now()
                ]);
                $author = Author::find($paymentMeta['author_id']);
                $author->level = 'pro';
                $author->payment_id = $transaction;
                $author->save();
            }
            DB::commit();
            return redirect()->route('author.blog');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return redirect()->route('author.blog')->withErrors(['err_msg' => 'Problem encountered with payment, pls contact administrator.']);
        }
    }
}
