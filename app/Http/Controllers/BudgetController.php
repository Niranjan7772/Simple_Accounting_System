<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Budget;
use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuditController;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $budgets=Budget::all();
        return view('budget.allbudget',['budgets'=>$budgets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //


        $id=Auth::user()->id;
        $accounts = User::with('accounts')->find($id);
        return view('budget.addbudget',['accounts'=>$accounts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $inputs=request()->validate([
             'account'=>'required',
             'start_date'=>'required',
             'end_date'=>'required',
             'amount'=>'required'
        ]);

        $existingBudget = Budget::where('account_id', $inputs['account'])
        ->whereBetween('created_at', [$inputs['start_date'], $inputs['end_date']])
        ->first();

    if ($existingBudget) {
        // A budget already exists for the specified account and date range
        return redirect()->route('budget.index')->with('danger' , 'Budget already exists for the specified date range.');
    }

        $budget=Budget::create([
                'account_id'=>$inputs['account'],
                'start_date'=>$inputs['start_date'],
                'end_date'=>$inputs['end_date'],
                'amount'=>$inputs['amount'],
                'created_by'=>auth()->id()
        ]);
        app(AuditController::class)->log( auth()->id(),'Budget Created', Auth::user()->name.' Has Created a Budget of '.$budget->amount);
        session()->flash('created','budget has been created');
        return redirect('/budget');
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
        $budget=Budget::find($id);
        $accounts=account::all();
        return view('budget.editbudget',['budget'=>$budget,'accounts'=>$accounts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $inputs=request()->validate([
            'account'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'amount'=>'required'
       ]);

      $budget=Budget::find($id);
       $budget->update([
               'account_id'=>$inputs['account'],
               'start_date'=>$inputs['start_date'],
               'end_date'=>$inputs['end_date'],
               'amount'=>$inputs['amount'],
               'created_by'=>auth()->id()
       ]);
       app(AuditController::class)->log( auth()->id(),'Budget Updated', Auth::user()->name.' Has Updated a Budget of '.$budget->amount);

       return redirect()->route('budget.index')->with('success','Budget Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $budget=Budget::find($id);
        $budget->delete();
        app(AuditController::class)->log( auth()->id(),'Budget deleted', Auth::user()->name.' Has Deleted a Budget of id '. $budget->id);
        return redirect()->route('budget.index')->with('danger','Budget deleted Successfully');
    }
}
