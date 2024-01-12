<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\account;
use App\Models\Expense;
use App\Models\transfer;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $acc_id=$id;
        $account=account::find($id);
        $exp_amt=Expense::where('account_id',$acc_id)->get()->sum('amount');


        $transfer_money=transfer::where('to_acc_id',$acc_id)->get()->sum('amount');

        $transfer_money_to=transfer::where('from_acc_id',$acc_id)->get()->sum('amount');

        $balance=$transfer_money_to-$transfer_money;


        $invoice_amount=transaction::where('acc_id',$acc_id)->where('reference_type',2)->get()->sum('amount')+abs($balance);


        $actual_Amt=$invoice_amount-$exp_amt;

        $inc_amt=transaction::where('acc_id',$acc_id)->where('reference_type',2)->get()->sum('amount');

        $transactions = Transaction::where('acc_id', $acc_id)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

   

        $user_accounts = User::with('accounts')->get();

        $user=User::all();
        $id=Auth::user()->id;
        $user_acc = User::with('accounts')->first();

        $acc_id= $user_acc->accounts->pluck('id')->first();
        $all_accounts=account::all();


        $user_accounts= $user_acc->accounts;


        session()->flash('exp_amt', $exp_amt);

        session()->flash('inc_amt', $inc_amt);
        session()->flash('trans_money', $transfer_money);
        session()->flash('trans_money_to', $transfer_money_to);


        session()->flash('actual_amt', $actual_Amt);



return view('dashboard-v2',['transactions'=>$transactions,'user_accounts'=>$user_accounts,'user_acc'=>$user_acc,'all_accounts'=>$all_accounts]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
