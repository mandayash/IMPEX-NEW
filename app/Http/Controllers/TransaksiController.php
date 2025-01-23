<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transactions = Transaksi::where('user_id',Auth::user()->id)->get();

        return view('transaction.transaction-list',compact('transactions'));
    }

    public function acceptPayment(Transaksi $transaction)
    {
        $transaction->update([
            'status' => 'Success'
        ]);

        return redirect()->back();
    }
}
