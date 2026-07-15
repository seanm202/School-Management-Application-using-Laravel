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


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function getStatusDetailsByAJAX()
  {
    $statuses = \App\Models\Status::join('roles', 'roles.roleId', '=', 'statuses.statusForEntity')->get();
    return response()->json($statuses);
  }


  public function createStatus(Request $request)
  {

    $validated = $request->validate([
      'statusName' => ['required'],
      'roleForStatus' => ['required'],
      [
        'statusName.required' => 'A name for the status is required',
        'roleForStatus.required' => 'Choose a user/objective role for the hour.',
      ]
    ]);
    $statuses = new Status;
    $statuses->statusName = $request->statusName;
    $statuses->statusForEntity = $request->roleForStatus;
    $statuses->save();
    return response()->json([
      'status' => true,
      'message' => 'Status Created!'
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
    $validated = $request->validate([
      'statusName' => ['required'],
      'roleForStatus' => ['required'],
      [
        'statusName.required' => 'A name for the status is required',
        'roleForStatus.required' => 'Choose a user/objective role for the hour.',
      ]
    ]);
    $status = Status::where('statusId', '=', $request->statusId)->first();
    $status->statusName = $request->statusName;
    $status->statusForEntity = $request->roleForStatus;
    $status->save();
    return response()->json([
      'status' => true,
      'message' => 'Data Updated!'
    ]);
  }


  // To check whether the entity ,here student, is still being used in the system.
  public function checkStatusIdForLink($statusId)
  {
    $messages = [];
    $status = Status::where('statusId', '=', $statusId)->first();

    $checkInStudentMarks = \App\Models\StudentMarks::where('status', '=', $statusId)->first();
    if ($checkInStudentMarks) {
      $messages[] = 'Status\'s Id is still in the Student Marks table.Please check the details.';
    }

    $checkInStatusSubjectTeacherForEachSections = \App\Models\SubjectTeacherForEachSections::where('status', '=', $statusId)->first();
    if ($checkInStatusSubjectTeacherForEachSections) {
      $messages[] = 'Status\'s Id is still in the Subject Teacher For Each Sections table.Please check the details.';
    }

    $checkInUsers = \App\Models\User::where('status', '=', $statusId)->first();
    if ($checkInUsers) {
      $messages[] = 'Status\'s Id is still in the Users table.Please check the details.';
    }

    $checkInDetails = \App\Models\Detail::where('status', '=', $statusId)->first();
    if ($checkInDetails) {
      $messages[] = 'Status\'s Id is still in the Details table.Please check the details.';
    }

    $checkInTeacher = \App\Models\Teacher::where('status', '=', $statusId)->first();
    if ($checkInTeacher) {
      $messages[] = 'Status\'s Id is still in the Teachers table.Please check the details.';
    }

    $checkInStudent = \App\Models\Student::where('status', '=', $statusId)->first();
    if ($checkInStudent) {
      $messages[] = 'Status\'s Id is still in the Students table.Please check the details.';
    }

    $checkInSubject = \App\Models\Subject::where('status', '=', $statusId)->first();
    if ($checkInSubject) {
      $messages[] = 'Status\'s Id is still in the Subjects table.Please check the details.';
    }

    $checkInBatch = \App\Models\Batch::where('status', '=', $statusId)->first();
    if ($checkInBatch) {
      $messages[] = 'Status\'s Id is still in the Batchs table.Please check the details.';
    }

    $checkInClassRoom = \App\Models\ClassRoom::where('status', '=', $statusId)->first();
    if ($checkInClassRoom) {
      $messages[] = 'Status\'s Id is still in the Class Rooms table.Please check the details.';
    }


    return response()->json([
      'status' => true,
      'message' => $messages,
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

    $statuses = Status::where('statusId', '=', $request->statusId)->first();
    $statuses->delete();
    return response()->json([
      'status' => true,
      'message' => 'Status Record Deleted Successfuly.'
    ]);
  }
}
