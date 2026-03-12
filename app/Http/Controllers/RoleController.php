<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Role;
use App\Models\batch;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }
    public function getRoleDetails()
    {
      $roles = \App\Models\Role::all();
      return view("/Admin/role")->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRole(Request $request)
    {

          //Add An Entity
        $roleNameNew=$request->roleName;
         Role::updateOrCreate(['roleName'=> $roleNameNew]);
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
     $roles->save();
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
    // public function updateRole(Request $request)
    // {
    //     //Updating classroom details
    //       $roles= Role::where('roleId','=',$request->roleId)->first();
    //       $roles->roleName=$request->roleName;
    //       $roles->save();
    //       return response()->json([
    //       'status' => true,
    //       'message' => 'Role Details Updated!'
    //       ]);
    // }
    public function updateRole(Request $request)
{
    $role = Role::where('roleId', $request->roleId)->first();

    if (!$role) {
        return response()->json([
            'status' => false,
            'message' => 'Role not found',
            'received_id' => $request->roleId
        ]);
    }

    $role->roleName = $request->roleName;
    $role->save();

    return response()->json([
        'status' => true,
        'message' => 'Role Details Updated!'
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


      $role = Role::where('roleId','=',$request->roleId)->delete();
          return view("/Admin/role");
    }
}
