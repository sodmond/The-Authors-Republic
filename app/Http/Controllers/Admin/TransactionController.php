<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $transactions = DB::table('transactions')->where('reference', $search)->orWhere('memo', 'LIKE', "%$search%")
                ->take(10)->paginate(10);
            return view('backend.payments', compact('payments'));
        }
        $transactions = DB::table('transactions')->orderBydesc('created_at')->paginate(10);
        return view('backend.transactions', compact('transactions'));
    }
    
    public function view($id)
    {
        $payment = DB::table('transactions')->find($id);
        return view('backend.transaction', compact('payment'));
    }
}
