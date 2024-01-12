<?php

namespace App\Http\Controllers;



use App\Models\User;
use App\Models\Budget;
use App\Models\account;
use App\Models\Expense;
use App\Models\transaction;
use App\Models\transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $expenses=expense::all();
        return view('expense.allexpense',['expenses'=>$expenses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
      


        $id=Auth::user()->id;
        $accounts = User::with('accounts')->find($id);
        return view('expense.addexpense',['accounts'=>$accounts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $inputs=request()->validate([
                 'date'=>'required',
               'description'=>'required',
                'amount'=>'required',
                'acc_id'=>'required',
                'receipt'=>'required',
         ]);


        if ($file = $request->file('receipt')) {
            $name = time() .'_'. $file->getClientOriginalName();
            $file->move('images', $name);
            $inputs['receipt'] = $name;
        }

        $acc_id=$inputs['acc_id'];

        $exp_amt=expense::where('account_id',$acc_id)->get()->sum('amount')+$request['amount'];

       $transfer_money=transfer::where('to_acc_id',$acc_id)->get()->sum('amount');

       $transfer_money_to=transfer::where('from_acc_id',$acc_id)->get()->sum('amount');

       $balance=$transfer_money_to-$transfer_money;

       $inv=transaction::where('acc_id',$acc_id)->get();

       $invoice_amount=transaction::where('reference_type',2)->get()->sum('amount')+abs($balance);


        $actual_Amt=$invoice_amount-$exp_amt;

        // return $actual_Amt;


        $request->session()->flash('actual_amt', $actual_Amt);



        if($exp_amt<$invoice_amount)
        {
       $expense=expense::create([
        'date'=>$inputs['date'],
        'description'=>$inputs['description'],
        'amount'=>$inputs['amount'],
        'account_id'=>$inputs['acc_id'],
        'receipt'=>$inputs['receipt'],
        'created_by'=>auth()->id(),
       ]);


       transaction::create([
              'reference_type'=>1,
              'reference_id'=>$expense->id,
              'acc_id'=>$inputs['acc_id'],
              'amount'=>$inputs['amount'],
              'type'=>0,
              'description'=>$inputs['description'],
              'created_by'=>auth()->id()
       ]);

       $budget = Budget::where('account_id', $inputs['acc_id'])->where('start_date', '<=', $inputs['date'])->where('end_date', '>=', $inputs['date'])->first();

   if ($budget) {
       // Calculate total expenses for the account between budget start and end dates
       $totalExpenses = Expense::where('account_id', $inputs['acc_id'])
           ->whereBetween('date', [$budget->start_date, $budget->end_date])
           ->sum('amount');

       // Compare total expenses with budget amount
       if ($totalExpenses > $budget->amount) {
           $alert = 1;
       } else {
           $alert = 0;
       }
   } else {
       $alert = 0; // No matching budget found
   }

   app(AuditController::class)->log( auth()->id(),'Expense', 'Expense Of '.$inputs['amount'].' Has been Spent By '.Auth::user()->name.' from Account id '.$inputs['acc_id']);

   return redirect('/expense')->with('alert', $alert ? 'Budget Overrun' : null);
}
else{
    return redirect('/expense')->with('alert', 'Cannot Add Expense ');
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
