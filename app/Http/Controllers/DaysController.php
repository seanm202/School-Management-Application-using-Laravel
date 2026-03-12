<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Days;
use App\Models\Batch;
use Illuminate\Http\Request;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $validated = $request->validate([
              'dayName' => ['required'],
          [
          'dayName.required'=> 'A name must be specified for the day.',
          ]
          ]);
      $days = new Days;

     $days->dayDate = $request->dayDate;

     $days->save();

     return redirect()->route('Admindashboard')->with('success', 'Created successfully.');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function show(Days $days)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function edit(Days $days)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Days $days)
    {
            $validated = $request->validate([
              'dayName' => ['required'],
          [
          'dayName.required'=> 'A name must be specified for the day.',
          ]
          ]);
      $day=\App\Models\Days::where('dayId','=',$request->dayId)->first();
      $day->dayName=$request->dayName;
      $day->save();
      return redirect()->route('\Admindashboard')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deleted = DB::table('days')->where('dayId', '=', $request->dayId)->delete();
        return redirect()->route('\Admindashboard')->with('success', 'Deleted successfully.');
    }
}
