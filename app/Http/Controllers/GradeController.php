<?php

namespace App\Http\Controllers;

use Response;
use App\Models\batch;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
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
    public function getGradeDetails()
    {
      $grades = \App\Models\Grade::all();
      return view("/Admin/details")->with('grades',$grades);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function createGrade(Request $request)
     {
$grade= new Grade;
$grade->grade=$request->gradeName;
$grade->status=1;
$grade->batchId=batch::where('status',1)->select('batchId')->first()->batchId;
$grade->save();
           //Add An Entity

           return response()->json([
           'status' => true,
           'message' => 'Data Submitted!'
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
      //Create a record
      $grades = new Grade;

     $grades->yes_or_no = $request->yes_or_no;
     $grades->userId = $request->userId;
     $grades->dailyReg = $request->dailyReg;

     $grades->save();
     return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {

          //
          $grades=Grade::all();
          return $grades;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    // public function updategrade(Request $request)
    // {
    //   $grades = Grade::where('gradeId',$request->gradeId)->first();
    //   $grades->grade = $request->gradeName;
    //   $grades->save();
    //
    //   return response()->json([
    //   'status' => true,
    //   'message' => 'Data Updated!'
    //   ]);
    // }
    public function updateGrade(Request $request)
{
    $grade = Grade::where('gradeId', $request->gradeId)->first();

    if (!$grade) {
        return response()->json([
            'status' => false,
            'message' => 'Grade not found'
        ]);
    }

    $grade->grade = $request->gradeName;
    $grade->save();

    return response()->json([
        'status' => true,
        'message' => 'Data Updated!'
    ]);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroyGrade(Request $request)
    {
      //Retrieve  details about grade
      $grade= Grade::where('gradeId','=',$request->gradeId)->first();
      $grade->delete();
      return response()->json([
      'status' => true,
      'message' => 'Grade Deleted!'
      ]);
    }
}
