<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Department;
use App\Models\batch;
use Illuminate\Http\Request;
use Redirect;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getDepartmentDetails()
     {
       $departments = \App\Models\Department::all();
       return view("/Admin/admin")->with('departments',$departments);
     }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function storeDepartment(Request $request)
     {
             $validated = $request->validate([
               'departmentName' => ['required'],
           [
           'departmentName.required'=> 'A name must be specified for the department.',
           ]
           ]);
       //Add A Subject
          $department = new Department;
          $department->departmentName = $request->departmentName;
          $department->status = 1;
          $department->save();

          return response()->json([
          'status' => true,
          'message' => 'Class created successfully.'
          ]);
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function editDepartment(Request $request)
    {
            $validated = $request->validate([
              'departmentName' => ['required'],
          [
          'departmentName.required'=> 'A name must be specified for the department.',
          ]
          ]);
      $department = Department::where('departmentId','=',$request->departmentId)->first();
      $department->departmentName = $request->departmentName;
      $department->save();

      return response()->json([
      'status' => true,
      'message' => 'Department updated successfully.'
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroyDepartment(Request $request)
    {
        //
        $department = Department::where('departmentId', $request->departmentId)->first();
         $department->delete();

         return response()->json([
         'status' => true,
         'message' => 'Department deleted successfully.'
         ]);
    }
}
