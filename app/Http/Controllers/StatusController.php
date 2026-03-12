<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDetailsOfStatus()
    {
      $statuses = Status::all();
      return view('/Admin/admin');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStatus(Request $request)
    {
        $statuses=new Status;
        $statuses->statusName=$request->statusName;
        $statuses->statusForRoles=$request->roleForStatus;
        $statuses->save();
        return response()->json([
        'status' => true,
        'message' => 'Added!'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {

          $status=Status::where('statusId','=',$request->statusId)->first();
          $status->statusName=$request->statusName;
          $status->statusForRoles=$request->roleForStatus;
          $status->save();
          return response()->json([
          'status' => true,
          'message' => 'Data Submitted!'
          ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroyStatus(Request $request)
    {

      $statuses=Status::where('statusId','=',$request->statusId)->first();
      $statuses->delete();
      return redirect()->route('Admin',['id'=>'editDayName'])
->with('success', 'Details updated successfully.');
    }
}
