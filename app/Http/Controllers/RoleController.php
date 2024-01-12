<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data=Role::all();
        return view('roles.allrole',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data=Permission::all();
         return view('roles.addrole',['data'=>$data]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'permissions' => 'array', // Assuming 'permissions' is an array in your form
            ]);






            $role = Role::create([
                'name' => $request->input('name'),
                'created_by'=>auth()->id()

            ]);


            $roleId = $role->id;


            if ($request->has('permissions')) {

                $permissions = $request['permissions'];
                $role->permissions()->attach($permissions);
            }

            session()->flash('created', 'Role Created successfully.');

            app(AuditController::class)->log( auth()->id(),'Role Created', 'Role '. $role->name .' Has been Created');


            return redirect()->route('role.index');
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
        $role = Role::find($id);
         $permissions = Permission::all();


    return view('roles.editrole', ['role' => $role, 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'array', // Assuming 'permissions' is an array in your form
        ]);

        $role = Role::find($id);

        $role->update([
            'name' => $request['name'],
        ]);

        $permissions = $request->input('permissions', []);

        $role->permissions()->sync($permissions);

        session()->flash('updated', 'Role Updated successfully.');
        app(AuditController::class)->log( auth()->id(),'Role Created', 'Role '. $role->name .' Has been Edited');

        return redirect()->route('role.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $role=Role::find($id);

            // Detach permissions associated with the role
            $role->permissions()->detach();

            // Delete the role
            $role->delete();

            session()->flash('deleted', 'Role Deleted successfully.');

            app(AuditController::class)->log( auth()->id(),'Role Created', 'Role '. $role->name .' Has been Deleted');

            return redirect()->route('role.index');

    }
}
