<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Response;
use App\Models\batch;
use App\Models\hours;
use Illuminate\Http\Request;

class HoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            $validated = $request->validate([
              'hourName' => ['required'],
          [
          'hourName.required'=> 'A name must be specified for the hour.',
          ]
          ]);
      $hours = new hours;

     $hours->hourName = $request->hourName;

     $hours->save();

     return redirect()->route('Admindashboard');
    }


    public static function setCurrentHour()
    {
      $currentHour= Carbon::now();
      $crhour=$currentHour->toTimeString();
$currentDBHourId=0;
            $hours =  hours::orderBy('hourStartingTime','asc')->where('hourStartingTime','>',$crhour)->first();

              $hours->status=1;
              $currentDBHourId=$hours->hourId;
              $hours->save();

              $hoursOthers =  hours::where('hourId','!=',$currentDBHourId)->get();
              foreach($hoursOthers as $hoursOther)
              {
                $hoursOther->status=0;
                $hoursOther->save();
              }

     return ;
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
     * @param  \App\Models\hours  $hours
     * @return \Illuminate\Http\Response
     */
    public function show(hours $hours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hours  $hours
     * @return \Illuminate\Http\Response
     */
    public function edit(hours $hours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hours  $hours
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, hours $hours)
     {
             $validated = $request->validate([
               'hourName' => ['required'],
           [
           'hourName.required'=> 'A name must be specified for the hour.',
           ]
           ]);
       $hour=\App\Models\hours::where('hourId','=',$request->dayId)->first();
       $hour->hourName=$request->hourName;
       $hour->save();
       return redirect()->route('\Admindashboard');
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hours  $hours
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $deleted = DB::table('hours')->where('hourId', '=', $request->hourId)->delete();
    }
}
