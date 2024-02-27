<?php

namespace App\Http\Controllers;

use Response;
use Carbon\Carbon;
use App\Models\User;
use App\Models\batch;
use App\Models\attendence;
use Illuminate\Http\Request;
use App\Models\dailyTeacherAllocation;
use App\Models\studentSubjectAttendance;
use Illuminate\Support\Facades\DB;
use Auth;
use Redirect;

class AttendenceController extends Controller
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

     public static function CreateAttendance()
     {
       if(count($att = \App\Models\attendence::where('userRole','=',2)->where('todaysDate','=',date('Y-m-d'))->get())==0)
       {
         $users = User::where('role', '=', 2)
                    ->orWhere('role', '=', 3)->get();

       foreach ($users as $userd) {

         $attendence = new attendence;

        $attendence->yes_or_no =  0;
        $attendence->userId =  $userd->userId;
        $attendence->userRole = $userd->role;
        $attendence->status = 1;
        // $attendence->dailyReg =  0;
        $attendence->todaysDate=date('Y-m-d');
        $attendence->batchId=batch::where('status',1)->select('batchId')->first()->batchId;
        $attendence->save();
       }
              $attendence = new attendence;
              $attendence->yes_or_no =  1;
              $attendence->userId =  1;
              $attendence->userRole = $userd->role;
              $attendence->status = 1;
              // $attendence->dailyReg =  0;
              $attendence->batchId=batch::where('status',1)->select('batchId')->first()->batchId;
              $attendence->todaysDate=date('Y-m-d');
              $attendence->save();
            }
      return view("/Admin/admin");
     }

///////////Manual version of above function
    public function adminCreateAttendance(Request $request)
    {
      if(count($att = \App\Models\attendence::where('userRole','=',2)->where('todaysDate','=',date('Y-m-d'))->get())==0)
      {
        $users = User::all();

      foreach ($users as $userd) {

        $attendence = new attendence;

       $attendence->yes_or_no =  0;
       $attendence->userId =  $userd->userId;
       $attendence->userRole =  Auth()->user()->role;
       $attendence->dailyReg =  0;
       $attendence->todaysDate=date('Y-m-d');
       $attendence->batchId=batch::where('status',1)->select('batchId')->first()->batchId;
       $attendence->save();
      }
             $attendence = new attendence;
             $attendence->yes_or_no =  1;
             $attendence->userId =  1;
             $attendence->userRole = 2;
             $attendence->dailyReg =  0;
             $attendence->batchId=batch::where('status',1)->select('batchId')->first()->batchId;
             $attendence->todaysDate=date('Y-m-d');
             $attendence->save();
           }
     return view("/Admin/admin");
    }



          public function adminSubmitTodaysAttendance(Request $request)
          {

              $attendence = new attendence;

              attendence::where('todaysDate', '=',date('Y-m-d'))
              ->update([
             'dailyReg' => 1
          ]);

            return Redirect::back();
          }



                    public function deleteTodaysAttendenceForAllTeachers(Request $request)
                    {

                        $attendences = attendence::where('todaysDate', '=', $request->dateSelected)->where('userRole', '=', 2)->get();

                        $attendences->each->delete();

                      return Redirect::back();
                    }



                              public function deleteTodaysAttendenceForAllAdmins(Request $request)
                              {

                                      $attendences = attendence::where('todaysDate', '=', $request->dateSelected)->where('userRole', '=', 3)->get();

                                      $attendences->each->delete();

                                    return Redirect::back();
                              }

                              public function deleteTodaysAttendenceForAllStudents(Request $request)
                              {

                                      $studentSubjectAttendances = studentSubjectAttendance::where('date', '=', $request->dateSelected)->get();

                                      $studentSubjectAttendances->each->delete();

                                    return Redirect::back();
                              }

                              public function deleteTodaysAttendenceForAllStudentsByTeacher(Request $request)
                              {
                                $daily_teacher_allocationId=dailyTeacherAllocation::where('daily_Teacher_AllocationId','=',$request->daily_teacher_allocationIdThis)->first();
                                $daily_teacher_allocationId->status=1;
                                $daily_teacher_allocationId->save();
                                      $studentSubjectAttendances = studentSubjectAttendance::where('date', '=', $request->dateSelected)->get();

                                      $studentSubjectAttendances->each->delete();

                                    return Redirect::back();
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
      $attendences = new attendence;

     $attendences->yes_or_no = $request->yes_or_no;
     $attendences->userId = $request->userId;
     $attendences->dailyReg = $request->dailyReg;

     $attendences->save();
     return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function show(attendence $attendence)
    {
      //View attendence details
      $attendences=attendence::all();
      return $attendences;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function edit(attendence $attendence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attendence $attendence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendence $attendence)
    {
        //
    }

   public function showTodaysAbsentees(Request $request)
   {
     //View attendence details
     $todaysAttendences = DB::table('attendences')
            ->join('users', 'users.userId', '=', 'attendences.userId')
            ->join('roles', 'users.role', '=', 'roles.roleId')
            ->select('users.name as Name','roles.roleName as roleName','users.email as Email','attendences.yes_or_no as yes_or_no','attendences.todaysDate as todaysDate')
            ->where('yes_or_no', '=', 0)
            ->where('yes_or_no', '=', 0)
            ->where('todaysDate','=', date('Y-m-d'))
            ->get();

      return view("/Admin/attendance")->with('todaysAttendences',$todaysAttendences);
   }

   public function showDaysAbsentees(Request $request)
   {
     //View attendence detailsdayName
       $validated = $request->validate([
         'selectedDate' => ['required'],
    [
     'selectedDate.required'=> 'A date should be selected',
    ]
     ]);
     $attendences = DB::table('attendences')
            ->join('users', 'users.userId', '=', 'attendences.userId')
            ->join('roles', 'users.role', '=', 'roles.roleId')
            ->select('users.name as Name','roles.roleName as roleName','users.email as Email','attendences.yes_or_no as yes_or_no','attendences.todaysDate as todaysDate')
            ->where('yes_or_no', '=', 0)
            ->where('todaysDate','=', $request->selectedDate)
            ->get();

      return view("/Admin/attendance")->with('attendences',$attendences);
   }


public function markTodaysAttendance(Request $request)
{
  //View attendence details
  $att = attendence::where('attendanceDataId','=',$request->attendanceDataId)
                     ->first();
  $att->yes_or_no = $request->inOrOut;
  $att->save();
return back()->with('success', 'Updated successfully.');
  // return Redirect::back();
}
public function markTodaysAttendanceStudent(Request $request)
   {
     //View attendence details
     $att = studentSubjectAttendance::where('id','=',$request->attendanceDataId)
                        ->first();
     $att->yes_or_no = $request->inOrOut;
     $att->save();
return back()->with('success', 'Updated successfully.');
     // return Redirect::back();
   }
function resetTodaysAttendance(Request $request)
{

 $attendence = attendence::where('todaysDate','=',date('Y-m-d'))->get();

 $attendence->each->delete();
 return back()->with('success', 'Deleted successfully.');
}
      public function showAbsenteesBetweenDays(Request $request)
      {
        //View attendence details
          $validated = $request->validate([
            'fromDate' => ['required'],
              'tillDate' => ['required'],
       [
        'fromDate.required'=> 'A starting date should be selected',
         'tillDate.required'=> 'An ending date should be selected',
       ]
        ]);
        $attendencesBetweens = DB::table('attendences')
               ->join('users', 'users.userId', '=', 'attendences.userId')
               ->join('roles', 'users.role', '=', 'roles.roleId')
               ->select('users.name as Name','attendences.todaysDate as todaysDate','roles.roleName as roleName','users.email as Email','attendences.yes_or_no as yes_or_no','attendences.todaysDate as todaysDate')
               ->orderBy('roleName','desc')
               ->orderBy('todaysDate','asc')
               ->where('attendences.yes_or_no', '=', 0)
               ->whereBetween('todaysDate', [$request->fromDate, $request->tillDate])
               ->get();

         return view("/Admin/attendance")->with('attendencesBetweens',$attendencesBetweens);
      }

}
