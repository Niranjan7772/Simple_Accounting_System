<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Audit_trail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $audits=Audit_trail::orderBy('id','desc')->get();

        $userNames = [];
        foreach ($audits as $transaction) {
            $userId = $transaction->user_id;
            $user = User::find($userId);

            if ($user) {
                $userNames[] = $user->name;
            } else {
                $userNames[] = 'N/A';
            }
        }
       

        return view('audit.audit',['audits'=>$audits,'userNames'=>$userNames]);
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
    public function log($user,$action , $details){
        Audit_trail::create([
           'user_id'=>$user,
            'action'=>$action,
            'details'=>$details
        ]);

   }
}
