<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\account;
use App\Models\Expense;
use App\Models\invoice;
use App\Models\transfer;
use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Console;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index()
    {
        $userId = Auth::user()->id;


        $user = User::with('accounts.transactions', 'accounts.expenses')->find($userId);

        $userAccounts = $user->accounts;



        $userAccountIds = $userAccounts->pluck('id')->toArray();


        $transferIds = Transaction::whereIn('acc_id', $userAccountIds)
            ->where('reference_type', 0)
            ->pluck('reference_id');



        $transfers = Transfer::with(['fromAccount', 'toAccount'])
            ->whereIn('id', $transferIds)
            ->get();


        $expenseIds = Transaction::whereIn('acc_id', $userAccountIds)
            ->where('reference_type', 1)
            ->pluck('reference_id');



            $expenses = Expense::with('account')
            ->whereIn('id', $expenseIds)
            ->get();

            $invoiceIds = Transaction::whereIn('acc_id', $userAccountIds)
            ->where('reference_type', 2)
            ->pluck('reference_id');

        $invoices = Invoice::with('customer')
            ->whereIn('id', $invoiceIds)
            ->get();

        $transactions = Transaction::with('createdByUser')
            ->whereIn('acc_id', $userAccountIds)->orderBy('id','desc')
            ->get();






        $data = [];
        foreach ($transactions as $transaction) {
            $rowData = [
                'type' => $transaction->reference_type == 0 ? 'Transfer' : ($transaction->reference_type == 1 ? 'Expense' : 'Invoice'),
                'from' => '-',
                'to' => '-',
                'accountName' => 'N/A',
                'transaction'=>0,
                'amount' => $transaction->amount,
                'created_at' => $transaction->created_at->toDateString(),
                'description' => $transaction->description,
            ];

            if ($transaction->reference_type == 0) {
                // For Transfers
                $transfer = $transfers->firstWhere('id', $transaction->reference_id);

                if ($transfer) {
                    $rowData['from'] = optional($transfer->fromAccount)->name ?? 'N/A';
                    $rowData['to'] = optional($transfer->toAccount)->name ?? 'N/A';
                    $rowData['accountName'] = $rowData['from'];
                    if($transaction->type==0)
                    {
                        $rowData['transaction']=0;
                    }
                    else{
                        $rowData['transaction']=1;
                    }
                }
            } elseif ($transaction->reference_type == 1) {
                // For Expenses
                $expense = $expenses->firstWhere('id', $transaction->reference_id);

                if ($expense) {
                    $rowData['from'] = optional($expense->account)->name ?? 'N/A';
                }
            }elseif ($transaction->reference_type == 2) {
                // For Invoices
                $invoice = $invoices->where('id', $transaction->reference_id)->first();

                if ($invoice) {
                    $rowData['to'] = Account::find($transaction->acc_id)->name ?? 'N/A';
                    $rowData['transaction']=1;
                }
            }


            $data[] = $rowData;
        }

        $userNames = [];
        foreach ($transactions as $transaction) {
            $userId = $transaction->created_by;
            $user = User::find($userId);

            if ($user) {
                $userNames[] = $user->name;
            } else {
                $userNames[] = 'N/A';
            }
        }


        return view('transaction.transaction', compact('data','userNames'));
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

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = transaction::where('id', 'like', '%' . $request->search . '%')
                ->orWhere('type', 'like', '%' . $request->search . '%')
                ->orWhere('acc_id', 'like', '%' . $request->search . '%')
                ->orWhere('amount', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->get();
        }

        $output = '';
        if ($data->count() > 0) {


            foreach ($data as $row) {
                $output .= '<tr>
                                <td  style="font-size: 17px;">' . $row->id . '</td>
                                <td style="font-size: 17px;">' . $row->type. '</td>
                                <td style="font-size: 17px;">' . $row->description . '</td>
                                <td style="font-size: 17px;">' . $row->acc_id . '</td>
                                <td style="font-size: 17px;">' . $row->acc_id . '</td>
                                <td style="font-size: 17px;">' . $row->created_by . '</td>
                                <td style="font-size: 17px;">' . $row->amount . '</td>
                                <td style="font-size: 17px;">' . $row->created_at . '</td>
                            </tr>';
            }

        } else {
            $output = 'No Result';
        }

        return $output;
    }

//     public function search(Request $request)
// {
//     if ($request->ajax()) {
//         $searchTerm = $request->search;

//         // Check if the search term is numeric
//         if (is_numeric($searchTerm)) {
//             $data = transaction::where('id', 'like', '%' . $searchTerm . '%')
//                 ->orWhere('type', 'like', '%' . $searchTerm . '%')
//                 ->orWhere('acc_id', 'like', '%' . $searchTerm . '%')
//                 ->orWhere('amount', 'like', '%' . $searchTerm . '%')
//                 ->orWhereHas('user', function ($query) use ($searchTerm) {
//                     $query->where('name', 'like', '%' . $searchTerm . '%');
//                 })
//                 ->get();
//         } else {
//             // Reverse mapping for 'type' field
//             $typeMapping = [
//                 'transfer' => 0,
//                 'expense' => 1,
//                 'invoice' => 2,
//             ];

//             // Check if the user entered a human-readable type and convert it to the corresponding numeric value
//             $typeSearch = array_search(strtolower($searchTerm), $typeMapping);
//             $typeSearch = $typeSearch !== false ? $typeSearch : $searchTerm;

//             $data = transaction::where('id', 'like', '%' . $searchTerm . '%')
//                 ->orWhere('type', 'like', '%' . $typeSearch . '%')
//                 ->orWhere('acc_id', 'like', '%' . $searchTerm . '%')
//                 ->orWhere('amount', 'like', '%' . $searchTerm . '%')
//                 ->orWhereHas('user', function ($query) use ($searchTerm) {
//                     $query->where('name', 'like', '%' . $searchTerm . '%');
//                 })
//                 ->get();
//         }
//     }

//     $output = '';
//     if ($data->count() > 0) {


//         foreach ($data as $row) {
//             $output .= '<tr>
//                             <td>' . $row->id . '</td>
//                             <td>' . $this->getTypeLabel($row->type) . '</td>
//                             <td>' . $row->description . '</td>
//                             <td>' . $row->acc_id . '</td>
//                             <td>' . $row->amount . '</td>
//                         </tr>';
//         }


//     } else {
//         $output = 'No Result';
//     }

//     return $output;
// }

// // Add this method to your controller to get the human-readable type labels
// private function getTypeLabel($type)
// {
//     $typeLabels = [
//         0 => 'Transfer',
//         1 => 'Expense',
//         2 => 'Invoice',
//     ];

//     return $typeLabels[$type] ?? $type;
// }




}
