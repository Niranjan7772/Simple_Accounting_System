<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\account;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $accounts=Account::all();


        return view('accounts.allaccount',['accounts'=>$accounts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('accounts.addaccount');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
      $inputs=request()->validate([
        'name' => 'required|regex:/^[a-zA-Z\s]+$/',
                   'type'=>'required'
      ]);

        $account=Account::create([
             'name'=>$inputs['name'],
             'type'=>$inputs['type'],
             'created_by'=>auth()->id()

        ]);
        app(AuditController::class)->log( auth()->id(),'Account Created', 'Account id '. $account->id .' Has been Created');
        session()->flash('created', 'Account created  successfully');
        return redirect('/accounts');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $account = Account::find($id);

        if ($request->ajax()) {
            return view('accounts.single', ['account' => $account])->renderSections()['content'];
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $accounts=Account::find($id);
        return view('accounts.editaccount',['accounts'=>$accounts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $inputs = $request->all();

        $account = Account::find($id);

        Account::where('id', $id)->update([

            'name' => $inputs['name'],
            'type' => $inputs['type'],
        ]);

        session()->flash('updated', 'Account updated  successfully');
        app(AuditController::class)->log( auth()->id(),'Account Edited', 'Account id '. $account->id .' Has been Edited');
        return redirect('/accounts');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $account=Account::find($id);
       $transaction=transaction::where('acc_id',$account->id)->get();

       if ($transaction->isNotEmpty()) {
        return redirect()->route('accounts.index')->with('danger', 'Cannot delete Account.');
    }


        Account::find($id)->delete();
        app(AuditController::class)->log( auth()->id(),'Account Deleted', 'Account id '. $account->id .' Has been Deleted');

        session()->flash('deleted', 'Account deleted successfully.');

        return redirect('/accounts');
    }
    public function fetch_data(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = DB::table('account')->paginate(3);
                return view('pagination_data', compact('data'))->render();
            }
        } catch (\Exception $e) {
            \Log::error('Error in fetch_data: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
