<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\account;
use App\Models\Expense;
use App\Models\transfer;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user=User::all();
        $id=Auth::user()->id;
        $user_acc = User::with('accounts')->find($id);
        $all_accounts=account::all();

        return view('transfer.transfer',['users'=>$user,'user_acc'=>$user_acc,'all_accounts'=>$all_accounts]);
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





        $inputs=$request->validate([
            'from' => 'required',
            'to' => 'required',
            'date' => 'required|date',
            'description' => 'required',
            'amount' => ['required', 'numeric', function ($attribute, $value, $fail) {
                // Custom validation rule: amount should not be zero
                if ($value == 0) {
                    $fail($attribute . ' must not be zero.');
                }
            }],
        ]);
        $from=Auth::user()->id;
        $to_user_id = $request['to'];
        // $to_acc = Account::where('user_id', $to_user_id)->where('is_primary', 1)->get()->pluck('id')->first();
        // $from_account=Account::where('user_id',$from)->where('is_primary', 1)->get()->pluck('id')->first();

        // $from_name= Account::where('user_id',$from)->where('is_primary', 1)->get()->pluck('name')->first();
        // $to_name = Account::where('user_id', $to_user_id)->where('is_primary', 1)->get()->pluck('name')->first();

          $from_acc=Account::find($inputs['from']);
          $to_acc=Account::find($inputs['to']);


            $acc_id=$request['from'];

        $exp_amt=Expense::where('account_id',$acc_id)->get()->sum('amount');

       $transfer_money=transfer::where('to_acc_id',$acc_id)->get()->sum('amount');

       $transfer_money_to=transfer::where('from_acc_id',$acc_id)->get()->sum('amount');

       $balance=$transfer_money_to-$transfer_money;

       $inv=transaction::where('acc_id',$acc_id)->get();

       $invoice_amount=transaction::where('reference_type',2)->get()->sum('amount')+abs($balance);


        $actual_Amt=$invoice_amount-$exp_amt;








          if($actual_Amt>$request['amount']){
          $transfer=  transfer::create([
            'from_acc_id'=>$inputs['from'],
            'to_acc_id'=>$inputs['to'],
            'amount'=>$inputs['amount'],
            'date'=>$inputs['date'],
            'description'=>$inputs['description'],
            'created_by'=>auth()->id(),
        ]);

        // /Debit/
        transaction::create([
           'reference_type' => 0,
            'reference_id' => $transfer->id,
            'acc_id' => $inputs['from'],
             'amount' => $inputs['amount'],
           'type' => 0,
           'description'=>$inputs['description'],
           'created_by'=>auth()->id(),
            ]);

        // credit
        transaction::create([
            'reference_type' => 0,
            'reference_id' => $transfer->id,
            'acc_id' => $inputs['to'],
            'amount' => $inputs['amount'],
            'type' => 1,
            'description'=>$inputs['description'],
            'created_by'=>auth()->id(),
        ]);

        app(AuditController::class)->log( auth()->id(),'Transfer', $inputs['amount'].' has been transfered from '.$from_acc->name.' to '.$to_acc->name.' by '.Auth::user()->name);
        return redirect()->route('transaction.index')->with('success', 'Money Transfered Successfully');
        }
        else{

            return redirect()->route('transfer.index')->with('danger', 'Insufficient balance Available balance '.$actual_Amt.'');
        }


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
