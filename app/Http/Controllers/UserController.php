<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use DataTables;
use App\Models\Audit_trail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuditController;
use App\Models\account;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users=User::all();
        return view('user.alluser',['users'=>$users]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        //

        $roles=Role::all();
        $accounts=account::all();
        return view('user.adduser',['roles'=>$roles,'accounts'=>$accounts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //
         $selectedAccounts = $request->input('accounts', []);


             $inputs=$request->all();
        $inputs=request()->validate([
            'name' => 'required|alpha|max:100',
            'email' => 'required|email|unique:users,email',
             'password'=>'required|min:6',
            'cpassword' => 'required|same:password',
          'phone'=>'required',
          'role'=>'required',
          'status'=>'required'
        ]);

          $user=User::create([
            'role_id'=>$inputs['role'],
            'name' =>$inputs['name'],
            'email' => $inputs['email'],
            'status'=>$inputs['status'],
            'password'=>$inputs['password'],
            'phone' => $inputs['phone'],
            'created_by'=>auth()->id()
          ]);

            if($selectedAccounts)
            {
          foreach ($selectedAccounts as $accountId) {
            $account = Account::find($accountId);
            if ($account) {
                $user->accounts()->attach($account->id);
            }
        }
    }

          $new=User::find($user->id);

          app(AuditController::class)->log( auth()->id(),'User Created', 'New User '. $new->name .' Has been Created');
          return redirect()->route('users.index')->with('success', 'User Added Successfully');
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
        $user = User::with('accounts')->find($id);

    $allAccounts = Account::all();

    $roles=role::all();

        return view('user.edituser',['users'=>$user,'roles'=>$roles,'allAccounts'=>$allAccounts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //
        $selectedAccounts = $request->input('accounts', []);


        $user=User::find($id);

        $inputs=request()->validate([
            'name' => 'required|alpha|max:100',
            'email' => ['required',Rule::unique('users')->ignore($user->id)],
            'phone' => ['required','digits:10',Rule::unique('users')->ignore($user->id)],
            'status'=>'required',

        ]);
         if($request['password']==null)
         {
              $inputs['password']=$user->password;
         }
         $user->update([
            'name'=>$inputs['name'],
            'email'=>$inputs['email'],
            'phone'=>$inputs['phone'],
            'role_id'=>$request['role'],
            'status'=>$inputs['status']
         ]);



         $currentAccounts = $user->accounts->pluck('id')->toArray();


         $user->accounts()->sync($request->input('accounts', []));


         $detachAccounts = array_diff($currentAccounts, $request->input('accounts', []));

         if (!empty($detachAccounts)) {
             $user->accounts()->detach($detachAccounts);
         }




         app(AuditController::class)->log( auth()->id(),'User Edited', $user->name.'  Has been Edited');
         return redirect()->route('users.index')->with('success', 'User Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user=User::find($id);

        $auditTrailEntries = Audit_trail::where('user_id', $user->id)->get();

        if ($auditTrailEntries->isNotEmpty()) {
            return redirect()->route('users.index')->with('danger', 'Cannot delete user with audit trail entries.');
        }
        app(AuditController::class)->log( auth()->id(),'User Deleted', $user->name.'  Has been Deleted');

        $user->delete();



        return redirect()->route('users.index')->with('danger', 'User deleted Successfully');

    }



}
