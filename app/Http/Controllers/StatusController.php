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

    public function getStatusDetailsByAJAX()
    {
      $statuses = \App\Models\Status::join('roles', 'statuses.statusForRoles', '=', 'roles.roleId')->get();
      return response()->json($statuses);
    }
    
    public function createStatus(Request $request)
    {
        
        $validated = $request->validate([
            'statusName' => ['required'],
            'roleForStatus' => ['required'],
       [
        'statusName.required'=> 'A name for the status is required',
        'roleForStatus.required'=> 'Choose a user/objective role for the hour.',
       ]
        ]);
        $statuses=new Status;
        $statuses->statusName=$request->statusName;
        $statuses->statusForRoles=$request->roleForStatus;
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
        'statusName.required'=> 'A name for the status is required',
        'roleForStatus.required'=> 'Choose a user/objective role for the hour.',
       ]
        ]);
          $status=Status::where('statusId','=',$request->statusId)->first();
          $status->statusName=$request->statusName;
          $status->statusForRoles=$request->roleForStatus;
          $status->save();
          return response()->json([
          'status' => true,
          'message' => 'Data Updated!'
          ]);
    }


    // To check whether the entity ,here student, is still being used in the system.
    public function checkStatusIdForLink($statusId)
    {
      $messages=[];
      $status = Status::where('statusId','=', $statusId)->first();

      $checkInStudentMarks = StudentMarks::where('status','=', $statusId)->first();
      if($checkInStudentMarks)
        {
            $messages[]='Status\'s Id is still in the Student Marks table.Please check the details.';
        }

      $checkInStatusSubjectTeacherForEachSections = SubjectTeacherForEachSections::where('status','=', $statusId)->first();
      if($checkInStatusSubjectTeacherForEachSections)
        {
            $messages[]='Status\'s Id is still in the Subject Teacher For Each Sections table.Please check the details.';
        }
        
      $checkInUsers = User::where('status','=', $statusId)->first();
      if($checkInUsers)
        {
            $messages[]='Status\'s Id is still in the Users table.Please check the details.';
        }
        
      $checkInDetails = Details::where('status','=', $statusId)->first();
      if($checkInDetails)
        {
            $messages[]='Status\'s Id is still in the Details table.Please check the details.';
        }
        
      $checkInTeacher = Teacher::where('status','=', $statusId)->first();
      if($checkInTeacher)
        {
            $messages[]='Status\'s Id is still in the Teachers table.Please check the details.';
        }
        
      $checkInStudent = Student::where('status','=', $statusId)->first();
      if($checkInStudent)
        {
            $messages[]='Status\'s Id is still in the Students table.Please check the details.';
        }
        
      $checkInSubject = Subject::where('status','=', $statusId)->first();
      if($checkInSubject)
        {
            $messages[]='Status\'s Id is still in the Subjects table.Please check the details.';
        }
        
      $checkInBatch = Batch::where('status','=', $statusId)->first();
      if($checkInBatch)
        {
            $messages[]='Status\'s Id is still in the Batchs table.Please check the details.';
        }
        
      $checkInClassRoom = ClassRoom::where('status','=', $statusId)->first();
      if($checkInClassRoom)
        {
            $messages[]='Status\'s Id is still in the Class Rooms table.Please check the details.';
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

      $statuses=Status::where('statusId','=',$request->statusId)->first();
      $statuses->delete();
      return response()->json([
          'status' => true,
          'message' => 'Status Record Deleted Successfuly.'
          ]);
    }
}
