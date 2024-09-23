<?php

namespace App\Http\Controllers;

use App\Mail\ServiceApplication;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Unicodeveloper\Paystack\Facades\Paystack;

class ServiceController extends Controller
{
    public function editingFeedback(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('services.editing_feedback');
        }
        $this->validate($request, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'phone' => ['required', 'numeric'],
            'title' => ['required', 'string', 'max:255'],
            'file' => ['required', 'mimes:pdf', 'max:2048'],
        ]);
        $service_category = ServiceCategory::find(1);
        try {
            $uploadedFile = Str::random(32) . '.' . $request->file('file')->extension();
            Storage::putFileAs('manuscripts/', $request->file('file'), $uploadedFile);
            $data = [
                'amount'    => ($service_category->price * 100),
                'email'     => $request->email,
                'currency'  => 'NGN',
                'reference' => Paystack::genTranxRef(),
                'metadata' => [
                    'service_category_id' => $service_category->id, 
                    'name' => $request->firstname.' '.$request->lastname,
                    'email' => $request->email,
                    'amount' => $service_category->price,
                    'data' => json_encode($request->except(['_token', 'file'])),
                    'file' => $uploadedFile
                ],
                'callback_url' => route('services.payment.verify')
            ];
            $paymentUrl = Paystack::getAuthorizationUrl($data);
            return $paymentUrl->redirectNow();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return back()->withErrors(['err_msg' => 'Problem encountered, pls try again']);
        }
    }

    public function handleGatewayCallback()
    {
        $payment = Paystack::getPaymentData();
        $paymentData = $payment['data']; #dd($paymentData);
        $paymentMeta = $payment['data']['metadata'];
        if ($payment['status'] == true) {
            if ($paymentMeta['service_category_id'] == 1) {
                Service::create($paymentMeta);
                $name = explode(' ', $paymentMeta['name']);
                Mail::to($paymentData['customer']['email'])->cc('admin@theauthorsrepublic.com')->send(new ServiceApplication($name[0]));
                return redirect()->route('services.editingfeedback')
                    ->with('success', 'Form has been submitted and payment is completed, we will get back to you soon.');
            }
            #return back()->with('success', 'Form has been submitted and payment is completed, we will get back to you soon.');
        }
    }
}
