<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendOrderConfirmation;
use App\Mail\SendPaymentConfirmation;
use App\Models\Author;
use App\Models\Book;
use App\Models\Earning;
use App\Models\Order;
use App\Models\Package;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function redirectToGateway($data)
    {
        try {
            $paymentUrl = Paystack::getAuthorizationUrl($data); #dd($paymentUrl->url);
            Order::where('id', $data['metadata']['order_id'])->update(['payment_link' => $paymentUrl->url]);
            return $paymentUrl->redirectNow();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->with(['paystack_err' => 'The paystack token has expired. Please refresh the page and try again.']);
        }
    }

    public function handleGatewayCallback()
    {
        $payment = Paystack::getPaymentData();
        $paymentData = $payment['data'];
        $paymentMeta = $payment['data']['metadata'];
        if ($payment['status'] == true) {
            $transactions = DB::table('transactions')->where('reference', $paymentData['reference'])->get();
            $user = User::find($paymentMeta['user_id']);
            $order = Order::find($paymentMeta['order_id']);
            DB::beginTransaction();
            if ($transactions->count() < 1) {
                $orderItems = $order->orderContent;
                $transaction = DB::table('transactions')->insertGetId([
                    'type' => 'purchase',
                    'method' => 'Paystack',
                    'amount' => $paymentData['amount']/100,
                    'reference' => $paymentData['reference'],
                    'memo' => '',
                    'status' => 'completed',
                    'created_at' => now()
                ]); #dd($transaction);
                $order->update(['status' => 'completed', 'transaction_id' => $transaction]);
                $earningsData = [];
                for ($i=0; $i < count($orderItems); $i++) {
                    $book = Book::find($orderItems[$i]->book_id);
                    $author = Author::find($book->author_id);
                    $amountEach = ($orderItems[$i]->amount * $orderItems[$i]->quantity);
                    $after_balance = ($author->balance + $amountEach);
                    $earningsData[] = [
                        'author_id'     => $author->id,
                        'order_id'      => $paymentMeta['order_id'],
                        'pre_balance'   => $author->balance,
                        'amount'        => $amountEach,
                        'after_balance' => $after_balance,
                        'created_at'    => now()
                    ];
                    $author->update(['balance' => $after_balance]);
                }
                Earning::insert($earningsData);
                DB::commit();
                Mail::to($user->email)->queue(new SendOrderConfirmation($order->id, $order->code));
            }
            DB::rollBack();
            #return redirect()->route('user.home')->with('success', 'Your order is being processed');
            return redirect()->route('user.order', ['id' => $order->id, 'code' => $order->code])->with('success', 'Your order is being processed');
        }
        return redirect()->route('checkout')->withErrors(['payment_err', "Payment couldn't be completed, pls try again."]);
    }

    public function status()
    {
        $status = $_GET['status'];
        if ($status == 'success' || $status == 'error') {
            $token = $_GET['token'];
            $user_id = $_GET['filter'];
            $subscription = Subscription::where('user_id', $user_id)->where('token', $token)->first();
            $package = Package::find($subscription->package_id);
            $form_link = route('signup', ['token' => $token, 'filter' => $user_id]);
            return view('payment_status', compact('status', 'package', 'form_link'));
        }
        return redirect()->route('home');
    }
}
