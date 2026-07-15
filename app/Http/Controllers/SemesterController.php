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
    $semester->status = 73;
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
    $subjects = Semester::all();
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
        'semesterName.required' => 'A name must be specified for the semester.',
      ]
    ]);
    $semester = Semester::where('semesterId', $request->semesterId)->first();
    $semester->semesterName = $request->semesterName;
    $semester->status = 73;
    $semester->save();


    return response()->json([
      'status' => true,
      'message' => 'Semester data has been updated successfully.'
    ]);
  }


  public function getSemesterForSubject()
  {
    $batches = Batch::where('status', '=', 40)->first();
    $semesters = \App\Models\Semester::where('batchId', '=', $batches->batchId)->get();
    return response()->json($semesters);
  }

  // To check whether the entity ,here semester, is still being used in the system.
  public function checkSemesterIdForLink($semesterId)
  {
    $messages = [];
    $semester = Semester::where('semesterId', '=', $semesterId)->first();

    $checkInStudentMarks = \App\Models\StudentMarks::where('semester', '=', $semesterId)->first();
    if ($checkInStudentMarks) {
      $messages[] = 'Semester\'s Id is still in the Student Marks table.Please check the details.';
    }

    $checkInStatusSubjectTeacherForEachSections = \App\Models\SubjectTeacherForEachSections::where('semesterId', '=', $semesterId)->first();
    if ($checkInStatusSubjectTeacherForEachSections) {
      $messages[] = 'Semester\'s Id is still in the Subject Teacher For Each Sections table.Please check the details.';
    }

    $checkInStudent = \App\Models\Student::where('studentSemester', '=', $semesterId)->first();
    if ($checkInStudent) {
      $messages[] = 'Semester\'s Id is still in the Students table.Please check the details.';
    }

    $checkInSubject = \App\Models\Subject::where('semesterId', '=', $semesterId)->first();
    if ($checkInSubject) {
      $messages[] = 'Semester\'s Id is still in the Subjects table.Please check the details.';
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
    if ($request->semesterId != 1 || $request->semesterId != 2 || $request->semesterId != 3) {
      //Delete Subject
      $semester = Semester::where('semesterId', $request->semesterId)->first();
      $semester->delete();
      return redirect()->route('Admin');
    } else {
      return response()->json([
        'status' => true,
        'message' => 'This cannot be deleted.'
      ]);
    }
  }
}
