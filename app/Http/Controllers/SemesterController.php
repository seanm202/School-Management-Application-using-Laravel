<?php

namespace App\Http\Controllers;
use Response;
use App\Models\Semester;
use App\Models\Batch;
use Illuminate\Http\Request;

class SemesterController extends Controller
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


      public function getSemesterDetails()
      {
        $semesters = \App\Models\Semester::all();
        return view("/Admin/admin")->with('semesters',$semesters);
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
      public function storesemester(Request $request)
      {
        //Add A Subject
                       $validated = $request->validate([
                         'semesterName' => ['required'],
                     [
                     'semesterName.required'=> 'A name must be specified for the semester.',
                     ]
                     ]);
            $semester = new Semester;
            $semester->semesterName = $request->semesterName;
            $semester->batchId = Batch::where('status',1)->select('batchId')->first()->batchId;
           $semester->save();

           return response()->json([
           'status' => true,
           'message' => 'Semester created successfully.'
           ]);
      }

      /**
       * Display the specified resource.
       *
       * @param  \App\Models\Semester  $subject
       * @return \Illuminate\Http\Response
       */
      public function show(Semester $subject)
      {
        ////
        $subjects=Semester::all();
        return $subjects;
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Models\Semester  $subject
       * @return \Illuminate\Http\Response
       */
      public function edit(Semester $semester)
      {
        //get old values
        $semester = Semester::where('semesterId', $semester->semesterId)
               ->get();
               return 1;
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \App\Models\Semester  $subject
       * @return \Illuminate\Http\Response
       */
      public function updatesemester(Request $request, Semester $semester)
      {
                     $validated = $request->validate([
                       'semesterName' => ['required'],
                   [
                   'semesterName.required'=> 'A name must be specified for the semester.',
                   ]
                   ]);
        $semester = Semester::where('semesterId',$request->semesterId)->first();
      $semester->semesterName = $request->semesterName;
      $semester->save();


      return response()->json([
      'status' => true,
      'message' => 'Semester updated successfully.'
      ]);
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\Models\Semester  $subject
       * @return \Illuminate\Http\Response
       */
       public function destroy(Request $request)
       {
         //Delete Subject
        $semester = Semester::where('semesterId', $request->semesterId)->first();
         $semester->delete();
         return redirect()->route('Admin');
       }
}
