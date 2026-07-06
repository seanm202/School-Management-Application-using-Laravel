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

public function getSemesterDetailsByAJAX()
      {
        $semesters = \App\Models\Semester::all();
        return response()->json($semesters);
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
    // Validation
    $validated = $request->validate(
        [
            'semesterName' => ['required'],
        ],
        [
            'semesterName.required' => 'A name must be specified for the semester.',
        ]
    );

    // Add Semester
    $semester = new \App\Models\Semester;
    $semester->semesterName = $request->semesterName;
    $semester->status = 1;
    $semester->batchId = 1; // You can later make this dynamic
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

      
    public function getListOfSemesters()
    {
        $subjectSemestersForEachClassRooms = \App\Models\Semester::all();

        return response()->json($subjectSemestersForEachClassRooms);
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
      'message' => 'Semester data has been updated successfully.'
      ]);
      }


    // To check whether the entity ,here semester, is still being used in the system.
    public function checkSemesterIdForLink($semesterId)
    {
      $messages=[];
      $semester = Semester::where('semesterId','=', $semesterId)->first();

      $checkInStudentMarks = StudentMarks::where('semester','=', $semesterId)->first();
      if($checkInStudentMarks)
        {
            $messages[]='Semester\'s Id is still in the Student Marks table.Please check the details.';
        }

      $checkInStatusSubjectTeacherForEachSections = SubjectTeacherForEachSections::where('semesterId','=', $semesterId)->first();
      if($checkInStatusSubjectTeacherForEachSections)
        {
            $messages[]='Semester\'s Id is still in the Subject Teacher For Each Sections table.Please check the details.';
        }
        
      $checkInStudent= Student::where('studentSemester','=', $semesterId)->first();
      if($checkInStudent)
        {
            $messages[]='Semester\'s Id is still in the Students table.Please check the details.';
        }
        
      $checkInSubject = Subject::where('semesterId','=', $semesterId)->first();
      if($checkInSubject)
        {
            $messages[]='Semester\'s Id is still in the Subjects table.Please check the details.';
        }

      return response()->json([
    'status' => true,
    'message' => $messages,
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
