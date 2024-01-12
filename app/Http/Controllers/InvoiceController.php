<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\account;
use App\Models\invoice;
use App\Models\customer;
use App\Models\transaction;
use App\Models\invoice_item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $invoices=invoice::orderBy('id','desc')->get();


        $id=Auth::user()->id;

        $user = User::with('accounts')->find($id);
        $accounts= $user->accounts;

        $customer=customer::find(1);

        $invoice=invoice::find(1);

        $invoice_item=invoice_item::where('invoice_id',1)->get();


        return view('invoice.allinvoice',['invoices'=>$invoices,'accounts'=>$accounts,'customer'=>$customer,'invoice'=>$invoice,'invoice_item'=>$invoice_item]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $customers=customer::all();



        return view('invoice.addinvoice',['customers'=>$customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $totalAmount = $request->input('totalAmount');
    $request->validate([
             'name'=>'required',
             'date'=>'required',
             'ddate'=>'required',
             'description'=>'required',
             'quantity'=>'required',
             'item_name'=>'required',
             'unit'=>'required',
             'line'=>'required',
    ]);



    $invoice = Invoice::create([
        'customer_id' => $request['name'],
        'date' => $request['date'],
        'due_date' => $request['ddate'],
        'amount' => $totalAmount,
        'created_by' => auth()->id(),
    ]);

     $invoiceItems = $request->input('invoiceItems');

     // Convert JSON string to array
     if($invoiceItems!=null)
     {
     $invoiceItemsArray = json_decode($invoiceItems, true);
    //  session(['invoiceItems' => $invoiceItemsArray]);
    foreach ($invoiceItemsArray as $item) {
          print_r($item);

        invoice_item::create([
            'invoice_id' => $invoice->id,
            'name'=>$item['item_name'],
            'description' => $item['description'],
            'quantity' => $item['quantity'],
            'unit_price' => $item['unit'],
            'line_total' => $item['line'],
        ]);
    }
}

    invoice_item::create([
        'invoice_id' => $invoice->id,
            'name'=>$request['item_name'],
           // Make sure 'name' is present in your array
            'description' => $request['description'],
            'quantity' => $request['quantity'],
            'unit_price' =>$request['unit'],
            'line_total' => $request['line'],
    ]);

    session()->forget('invoiceItems');


    app(AuditController::class)->log( auth()->id(),'Invoice Created', 'Invoice Has been Created to Customer Id '.$request['name']);
    return redirect()->route('invoice.index')->with('success','Invoice has been Created Successfully');


}




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = customer::find($id);
        $invoice = invoice::find($id);
        $invoice_item = invoice_item::where('invoice_id', $invoice->id)->get();

        $data = [
            'invoiceId' => $invoice->id,
            'fullName' => $customer->name,
            'issueDate' => $invoice->date,
            'emailId' => $customer->email,
            'dueDate' => $invoice->due_date,
            'phone' => $customer->mobile,
            'status' => $invoice->status == 0 ? 'Paid' : 'Outstanding',
            'address' => $customer->address,
            'orderItems' => $invoice_item->toArray(),
            'totalAmount' => $invoice->amount,
        ];

        return response()->json($data);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $invoice=invoice::find($id);

        $invoice_item=invoice_item::where('invoice_id',$invoice->id)->get();
        $customer=customer::all();
        return view('invoice.editinvoice',['invoice'=>$invoice,'invoice_items'=>$invoice_item,'customers'=>$customer]);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $totalAmount = $request->input('totalAmount');
        $invoice = invoice::findOrFail($id);
        $invoice->update([
            'customer_id' => $request['name'],
            'date' => $request['date'],
            'due_date' => $request['ddate'],
            // Update other fields as needed
        ]);

        // Update or create invoice items
        $invoiceItems = $request->input('items');

        foreach ($invoiceItems as $index => $itemData) {
            invoice_item::update(
                ['invoice_id' => $invoice->id, 'id' => $index],
                [
                    'name' => $itemData['item_name'],
                    'description' => $itemData['description'],
                    'quantity' => $request->input("quantity.$index.quantity"),
                    'unit_price' => $request->input("unit.$index.unit"),
                    'line_total' => $request->input("line.$index.line"),
                ]
            );
        }

        // Additional logic if needed

        app(AuditController::class)->log(auth()->id(), 'Invoice Updated', 'Invoice has been updated for Customer ID ' . $request['name']);
        return redirect()->route('invoice.index')->with('success', 'Invoice updated successfully');


    }

    public function print($id)
    {
        $invoice = invoice::find($id);
        $c_id=$invoice->customer_id;
        $customer = customer::find($c_id);
        $invoiceItems = invoice_item::where('invoice_id', $invoice->id)->get();


        $data = [
            'invoiceId' => $invoice->id,
            'fullName' => $customer->name,
            'issueDate' => $invoice->date,
            'emailId' => $customer->email,
            'dueDate' => $invoice->due_date,
            'phone' => $customer->mobile,
            'status' => $invoice->status,
            'address' => $customer->address,
            'orderItems' => $invoiceItems,
            'totalAmount' => $invoice->amount,
        ];

        return response()->json($data);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //


    }

    public function paid(Request $request, string $id)
    {
        $invoice=invoice::find($id);

        $cid=$invoice->customer_id;

        // $admin_acc = Account::where('user_id', $admin)->where('is_primary', 1)->pluck('id')->first();

        $invoice->update([
                  'status'=>0
        ]);
        $amount=$invoice->amount;

        $customer=customer::find($cid);

        transaction::create([
               'reference_type'=>2,
               'reference_id'=>$invoice->id,
               'acc_id'=>$request['acc_id'],
               'amount'=>  $amount,
               'type'=>1,
               'created_by'=>auth()->id(),
               'description'=>'Invoice has been paid By '.$customer->name
        ]);
        app(AuditController::class)->log( auth()->id(),'Invoice Paid', 'Invoice Has been Paid By Customer Id '.$customer->id);

        return redirect()->route('invoice.index')->with('success', 'Invoice has been Paid Successfully ');
    }

// public function getInvoiceDetails($id)
// {
//     // Fetch details from the database based on $id
//     try {
//         // Fetch details from the database based on $id
//         $invoice = Invoice::with('customer', 'items')->find($id);

//         // Organize the data as needed
//         $data = [
//             'invoiceId' => $invoice->id,
//             'fullName' => $invoice->customer->name,
//             // ... add other fields and relationships ...
//             'orderItems' => $invoice->items,
//             'totalAmount' => $invoice->amount,
//         ];

//         return response()->json($data);
//     } catch (\Exception $e) {
//         // Handle exceptions and return an error response
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// }



}
