<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Role;
use App\Models\Batch;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {}
    public function getRoleDetails()
    {
        $roles = \App\Models\Role::all();
        return response()->json($roles);
    }

    public function getRolesForFilter()
    {
        $roles = \App\Models\Role::all();
        return response()->json($roles);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRole(Request $request)
    {

        //Add An Entity
        $roleNameNew = $request->roleName;
        Role::updateOrCreate(['roleName' => $roleNameNew, 'status' => 71]);
        return view("/Admin/role");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Add An Entity
        $roles = new Role;

        $roles->roleName = $request->roleName;
        $roles->status = 71;
        $roles->save();

        return response()->json([
            'status' => true,
            'message' => 'Role has been added to the database successfuly!'
        ]);
    }

    public function getRoles()
    {
        $roleLists = Role::whereIn('roleId', [1, 2, 3, 4, 5])->get();
        return response()->json($roleLists);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */

    public function updateRole(Request $request)
    {
        $role = Role::where('roleId', '=', $request->roleId)->first();
        $role->status = 71;
        $role->save();

        return response()->json([
            'status' => true,
            'message' => 'Role data has been updated successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroyRole(Request $request)
    {

        if ($request->roleId != 1 || $request->roleId != 2 || $request->roleId != 3 || $request->roleId != 4 || $request->roleId != 5) {
            $role = Role::where('roleId', '=', $request->roleId)->delete();

            return response()->json([
                'status' => true,
                'message' => 'Role has been Deleted!'
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'This cannot be deleted.'
            ]);
        }
    }
}
