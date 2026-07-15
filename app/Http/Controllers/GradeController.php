<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Batch;
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
    
    public function getGradeDetailsByAJAX() 
    {
           $grades = \App\Models\Grade::all();
          return response()->json($grades);
    }

    public function getGradeDetails()
    {
      $grades = \App\Models\Grade::all();
      return view("/Admin/details")->with('grades',$grades);
    }
    
    public function getGradeForSubject()
    {
      $batches= Batch::where('status','=',40)->first();
      $grades = \App\Models\Grade::where('batchId','=',$batches->batchId)->get();
      return response()->json($grades);
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
$grade->status=70;
$grade->batchId=Batch::where('status',40)->select('batchId')->first()->batchId;
$grade->save();
           //Add An Entity

           return response()->json([
           'status' => true,
           'message' => 'Data added to the database successfully!'
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
    public function updateGrade(Request $request)
    {
      $grade= Grade::where('gradeId','=',$request->gradeId)->first();
      $grade->grade = $request->gradeName;
      $grade->save();
    
      return response()->json([
      'status' => true,
      'message' => 'Data Updated!'
      ]);
    }
//     public function updateGrade(Request $request)
// {
//     $grade = Grade::where('gradeId','=', $request->gradeId)->first();

//     // if (!$grade) {
//     //     return response()->json([
//     //         'status' => false,
//     //         'message' => 'Grade not found'
//     //     ]);
//     // }

//     $grade->grade = $request->gradeName;
//     $grade->save();

//     return response()->json([
//         'status' => true,
//         'message' => 'Data Updated!'
//     ]);
// }

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
      if($request->gradeId!=1 || $request->gradeId!=2 || $request->gradeId!=3)
      {
        $grade= Grade::where('gradeId','=',$request->gradeId)->first();
      $grade->delete();
      return response()->json([
      'status' => true,
      'message' => 'Grade details has been deleted!'
      ]);
    }
    else
      {
         return response()->json([
        'status' => true,
        'message' => 'This cannot be deleted.'
        ]);
      }
    }


    // To check whether the entity ,here grades, is still being used in the system.
    public function checkGradeIdForLink($gradeId)
    {
      $messages=[];
      $grade = Grade::where('gradeId','=', $gradeId)->first();

      $checkInClassRoom = ClassRoom::where('gradeId','=', $gradeId)->first();
      if($checkInClassRoom)
        {
            $messages[]='Grade\'s Id is still in the Class Room table.Please check the details.';
        }


      return response()->json([
    'status' => true,
    'message' => $messages,
]);
    }

    
    
    public function getGradesList()
    {
        $subjectGradesForEachClassRooms = \App\Models\Grade::all();

        return response()->json($subjectGradesForEachClassRooms);
    }
}
