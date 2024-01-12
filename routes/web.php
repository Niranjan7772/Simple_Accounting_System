<?php

use App\Models\User;
use App\Models\account;
use App\Models\Expense;
use App\Models\transfer;
use App\Models\transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('register', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/d2', function () {


        $user=User::all();
        $id=Auth::user()->id;
        $user_acc = User::with('accounts')->first();

        $acc_id= $user_acc->accounts->pluck('id')->first();


        $user_accounts= $user_acc->accounts;
        $all_accounts=account::all();

        // $acc_id=Auth::user()->id;

        $exp_amt=Expense::where('account_id',$acc_id)->get()->sum('amount');

        $transfer_money=transfer::where('to_acc_id',$acc_id)->get()->sum('amount');

        $transfer_money_to=transfer::where('from_acc_id',$acc_id)->get()->sum('amount');

        $balance=$transfer_money_to-$transfer_money;

        $income_amt=transaction::where('acc_id',$acc_id)->where('reference_type',2)->get()->sum('amount');

        $inv_amount=transaction::where('acc_id',$acc_id)->where('reference_type',2)->get()->sum('amount')+abs($balance);

        $actual_amt=$inv_amount-$exp_amt;

        $transactions = Transaction::where('acc_id', $acc_id)
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();

        return view('dashboard-v2',['users'=>$user,'user_acc'=>$user_acc,'all_accounts'=>$all_accounts,'inv_amount'=>$actual_amt,'user_accounts'=>$user_accounts,'actual_amt'=>$actual_amt
                      ,'expense'=>$exp_amt,'income_amt'=>$income_amt,'transfer_money'=>$transfer_money,'transfer_money_to'=>$transfer_money_to,'transactions'=>$transactions]);
    });

    Route::resource('/users',UserController::class)->middleware('role:view_user');

    Route::resource('/accounts',AccountController::class)->middleware('role:view_account');;

    Route::resource('/expense',ExpenseController::class)->middleware('role:view_expense');;

    Route::resource('/customer',CustomerController::class)->middleware('role:view_customer');;

    Route::resource('/invoice',InvoiceController::class)->middleware('role:view_invoice');;

    Route::resource('/transfer',TransferController::class);

    Route::resource('/transaction',TransactionController::class);

    Route::resource('/budget',BudgetController::class)->middleware('role:view_budget');;

    Route::resource('/audit',AuditController::class)->middleware('role:view_audit');;

     Route::resource('/role',RoleController::class)->middleware('role:view_roles');;




    Route::resource('/dashboard',DashboardController::class);


});
Route::patch('/paid/{id}',[InvoiceController::class,'paid'])->name('invoice.paid');

Route::get('search',[TransactionController::class,'search']);

Route::get('invoice/print/{id}', [InvoiceController::class,'print'])->name('invoice.print');

Route::get('pagination/fetch_data',[AccountController::class,'fetch_data']);

// Route::get('/show/{id}', InvoiceController::class,'show')->name('invoice.show');


// Route::get('/transaction', function () {
//     return view('transaction');
// });

Route::get('/statistics', function () {
    return view('statistics');
});

Route::get('/notification', function () {
    return view('notification');
});


Route::get('/wallets', function () {
    return view('wallets');
});

Route::get('/settings', function () {
    return view('settings');
});




// Route::get('/alluser', function () {
//     return view('alluser');
// });

Route::get('/addaccount', function () {
    return view('addaccount');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__.'/auth.php';
