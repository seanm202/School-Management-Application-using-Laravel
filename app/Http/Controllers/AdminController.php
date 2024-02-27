<?php

namespace App\Http\Controllers;

use Response;
use App\Models\User;
use App\Models\student;
use App\Models\teacher;
use App\Models\subject;
use App\Models\admin;
use App\Models\detail;
use App\Models\role;
use App\Models\grade;
use App\Models\classRoom;
use App\Models\batch;
use App\Models\hours;
use App\Models\days;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('/Admin/admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Create an add admin form
        $roles=role::where('roleName', 'admin')
               ->get();
        return back()->with('success', 'Role created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Store or add admin  $validated = $request->validate([
        $validated = $request->validate([

           'firstName' => ['required', 'confirmed'],
           'lastName' => ['required', 'confirmed'],
           'age' => ['required', 'numeric', 'confirmed'],
           'dob' => ['required', 'date', 'confirmed'],
           'contactNumber' => ['required', 'numeric', 'confirmed'],
           'alternateContactNumber' => ['required','numeric', 'confirmed'],
           'address' => ['required',  'confirmed'],
           'bloodGroup' => ['required',  'confirmed'],
           'identificationMark' => ['required',  'confirmed'],
           'parentNumber' => ['required', 'numeric', 'confirmed'],
           'homePhoneNumber' => ['required', 'numeric', 'confirmed'],
           'fatherSpouseName' => ['required', 'confirmed'],
           'motherName' => ['required',  'confirmed'],
           'guardianName' => ['required', 'confirmed'],
       [
       'firstName.required'=> 'Your First Name is Required',
       'lastName.required'=> 'Your Last Name is Required',
       'age.numeric'=> 'Age should be numeric',
       'dob.required'=> 'Your date of birth is Required',
       'contactNumber.required'=> 'Your Contact Number is Required',
       'contactNumber.numeric'=> 'Contact Number Should be numeric',
       'alternateContactNumber.required'=> 'An Alternate Contact Number is Required',
       'alternateContactNumber.numeric'=> 'Alternate Contact Number Should be numeric',
       'address.required'=> 'Address is required',
       'bloodGroup.required'=> 'Your blood group is Required',
       'identificationMark.required'=> 'Please provide an identification mark',
       'parentNumber.required'=> 'Parent\'s contact number is required',
       'homePhoneNumber.required'=> 'Home phone number is required',
       'fatherSpouseName.required'=> 'Your Father\'s / Spouse\'s name is Required',
       'motherName.required'=> 'Your Mother\'s name is Required',
       'guardianName.required'=> 'Your Guardian\'s name is Required',
       ]
       ]);
        $details = new detail;

       $details->firstname = $request->firstname;
       $details->lastname = $request->lastname;
       $details->age = $request->age;
       $details->dob = $request->dob;
       $details->contactNumber = $request->contactNumber;
       $details->alternateContactNumber = $request->alternateContactNumber;
       $details->roleId = $request->roleId;
       $details->userId = $request->userId;
       $details->address = $request->address;
       $details->bloodGroup = $request->bloodGroup;
       $details->identificationMark = $request->identificationMark;
       $details->parentNumber = $request->parentNumber;
       $details->homePhoneNumber = $request->homePhoneNumber;
       $details->fatherSpouseName = $request->fatherSpouseName;
       $details->motherName = $request->motherName;
       $details->guardianName = $request->guardianName;
       $details->batchId = batch::where('status',1)->select('batchId')->first()->batchId;
       $details->save();

       return back()->with('success', 'Added successfully.');
    }

    public function addDayName(Request $request)
    {
        //Store or add admin
          $validated = $request->validate([
            'dayName' => ['required'],
       [
        'dayName.required'=> 'A name for the day is required',
       ]
        ]);
        $days = new days;

       $days->dayName = $request->dayName;
       $days->status = 1;
       $days->save();

      return redirect()->route('Admin',['id'=>'addTheDay'])
->with('success', 'Day added successfully.');
    }

        public function deleteDay(Request $request)
        {
            //Store or add admin
            $days = days::where('dayId',$request->dayId)->first();
           $days->delete();



          return redirect()->route('Admin',['id'=>'editDayName'])
    ->with('success', 'Day added successfully.');
        }



    public function updateDayName(Request $request)
    {
        //Store or add admin
        $days = days::where('dayId','=',$request->dayId)->first();
        $days->dayName = $request->dayName;
        $days->status = 1;
        $days->save();

            return redirect()->route('Admin',['id'=>'editDayName']);
    }



    public function addHourName(Request $request)
    {
        //Store or add admin
          $validated = $request->validate([
            'hourName' => ['required'],
       [
        'hourName.required'=> 'A name for the hour is required',
       ]
        ]);
        $hours = new hours;

       $hours->hourName = $request->hourName;
       $hours->hourStartingTime = $request->hourStartingTime;
       $hours->hourEndingTime = $request->hourEndingTime;
       $hours->status = 1;
       $hours->save();

       return redirect()->route('Admin',['id'=>'addTheHour']);
    }



    public function updateHourName(Request $request)
    {
        //Store or add admin
        $hours = hours::where('hourId','=',$request->hourId)->first();
        $hours->hourName = $request->hourName;
        $hours->hourStartingTime = $request->hourStartingTime;
        $hours->hourEndingTime = $request->hourEndingTime;
        $hours->status = 1;
        $hours->save();

        return redirect()->route('Admin',['id'=>'editTheHourName']);

    }

    public function deleteHour(Request $request)
    {
        //Store or add admin
        $hours =hours::where('hourId','=',$request->hourId)->first();

        $hours->delete();

        return redirect()->route('Admin',['id'=>'editTheHourName']);

    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
      return view('user.profile', [
         'user' => admin::findOrFail($id)
     ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        // get old values
        $admins = admin::where('userId', $admin->userId)
               ->get();
               return 1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //Update admin details

return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      //Delete self - admin
      $admins = admin::where('adminId',$request->userId)->first();
      $admins->delete();
      $detail = detail::where('userId',$request->userId)->first();
      $detail->delete();
      return 1;
    }

    //////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    public function getAdminDetails(Request $request)
    {
      $admin = admin::where('adminId', '==',$request->adminId)->firstOrFail();
      return 1;
    }
    public function getUserRoleDetails(Request $request)
      {
        $userDetail = DB::table('users')->select('userRole', 'name')->where('userId','==',$request->userId)->get();
        return $userDetail;
      }
    // public function getAdminAttendance_Yes_Or_No()
    // {
    //
    // }
    public function getDailyRegister()
    {
      $dailyRegister = attendence::where('dailyReg', '==',$request->todayDate)->get();
      return $dailyRegister;
    }
    public function getClassRoomDetails(Request $request)
    {
      $classRoom = classRoom::where('classroomDetailId', '==',$request->classroomDetailId)->firstOrFail();
      return $classRoom;
    }
    public function getUserDetails(Request $request)
    {
      $users = User::where('userId', '==',$request->userId)->firstOrFail();
      return 1;
    }
    // public function searchUser()
    // {
    //
    // }
    public function getGradeDetails(Request $request)
    {
      $grades= grade::where('gradeId', '==',$request->gradeId)->firstOrFail();
      return 1;
    }
    public function getRoleDetails(Request $request)
    {
      $roles = role::where('roleId', '==',$request->roleId)->firstOrFail();
      return 1;
    }
    public function assignOrChangeRole(Request $request)
    {
      $affected = DB::table('users')
                    ->where('userId', $request->userId)
                    ->update(['roleId' => $request->roleId]);
                    return back()->with('success', 'Assigned successfully.');
    }
    public function getSectionDetails(Request $request)
    {
        $affected = DB::table('users')
                      ->where('userId', $request->userId)
                      ->update(['roleId' => $request->roleId]);
                      return 1;
    }
    // public function getSecurityDetails()
    // {
    //
    // }
    public function getStudentDetails(Request $request)
    {
      $affected = student::where('studentId', '==',$request->studentId)->firstOrFail();
      return $affected;
    }
    public function searchStudent()
    {

    }
    public function getSubjectDetails(Request $request)
    {
      $affected = subject::where('subjectId', '==',$request->subjectId)->firstOrFail();
      return $affected;
    }
    public function getTeacherAttendance(Request $request)
    {
      $affected = subject::where('subjectId', '==',$request->subjectId)->firstOrFail();
      return $affected;
    }
    public function getCurrentDayUserRoleAbsentDetails(Request $request)
    {
      $dailyRegister = attendence::where('dailyReg','==',$request->todayDate)
      ->where('userRole','==',$request->userRole)->get();
      return $dailyRegister;
    }
    public function getCurrentDayTeacherAbsentDetails(Request $request)
    {
      $dailyRegister = attendence::where('dailyReg','==',$request->todayDate)
      ->where('userRole','==',2)->get();
      return $dailyRegister;
    }
    public function getCurrentDayStudentAbsentDetails()
    {
      $dailyRegister = attendence::where('dailyReg','==',$request->todayDate)
      ->where('userRole','==',3)->get();
      return $dailyRegister;
    }
}
