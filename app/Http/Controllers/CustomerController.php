<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers=customer::all();
        return view('customer.allcustomer',['customers'=>$customers]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('customer.addcustomer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $inputs=request()->validate([
            'name' => 'required|alpha|max:100',
            'email' => 'required|email|unique:users,email',
           'mobile' => 'required|digits:10|unique:users,phone',
           'address' => 'required'

        ]);


      $customer= customer::create([
        'name'=>$inputs['name'],
        'email'=>$inputs['email'],
        'mobile'=>$inputs['mobile'],
        'address'=>$inputs['address'],
        'created_by'=>auth()->id()
       ]);
       session()->flash('created', 'Customer created successfully.');
       app(AuditController::class)->log( auth()->id(),'Customer Created', 'New Customer '. $customer->name .' Has been Created');
        return redirect('/customer');

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
        $customer=customer::find($id);
        return view('customer.editcustomer',['customers'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $customer=customer::find($id);
        $inputs=request()->validate([
            'name' => 'required|alpha|max:100',
            'email' => ['required',Rule::unique('customers')->ignore($customer->id)],
           'mobile' => ['required','digits:10',Rule::unique('customers')->ignore($customer->id)],
           'address' => 'required'

        ]);
        $customer->update($inputs);
        session()->flash('updated', 'Customer Updated successfully.');
        app(AuditController::class)->log( auth()->id(),'Customer Edited', $customer->name.'  Has been Edited');
        return redirect('/customer');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $customer=customer::find($id);
        app(AuditController::class)->log( auth()->id(),'Customer Deleted', $user->name.'  Has been Deleted');
        $customer->delete();
        session()->flash('deleted', 'Customer deleted successfully.');
        return redirect('/customer');
    }
}
