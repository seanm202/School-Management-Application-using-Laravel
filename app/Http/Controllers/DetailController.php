<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Batch;
use App\Models\Detail;
use App\Models\User;
use App\Models\Admin;
use App\Models\ConstantController;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Role;
use App\Models\Attendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules;
use Redirect;
use DB;

class DetailController extends Controller
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
        //
    }



    public function updateRoleInUsers($userId,$roleId)
    {

        User::where('userId', $userId)
      ->update(['role' => $roleId]);
    return;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     function updateUserDetailsId($detailsId,$userId)
     {
       $user = User::where('userId','=',$userId)->first();

$user->detailsId =$detailsId;

$user->save();
return;
     }
    public function store(Request $request)
    {  $validated = $request->validate([

              'salutation' => ['required'],
              'firstName' => ['required'],
              'lastName' => ['required'],
              'age' => ['required', 'numeric'],
              'dob' => ['required', 'date'],
              'contactNumber' => ['required', 'numeric'],
              'alternateContactNumber' => ['required','numeric'],
              'address' => ['required'],
              'bloodGroup' => ['required'],
              'identificationMark' => ['required'],
              'parentNumber' => ['required', 'numeric'],
              'homePhoneNumber' => ['required', 'numeric'],
              'fatherSpouseName' => ['required'],
              'motherName' => ['required'],
              'guardianName' => ['required'],
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
        //Add An Entity
        $details = new Detail;
$role=$request->roleId;
$userId=$request->userId;
       $details->sal = $request->salutation;
       $details->firstname = $request->firstName;
       $details->lastname = $request->lastName;
       $details->age = $request->age;
       $details->dob = $request->dob;
       $details->contactNumber = $request->contactNumber;
       $details->alternateContactNumber = $request->alternateContactNumber;
       $details->userId = $request->userId;
       $details->roleId = $role;
       $details->address = $request->address;
       $details->bloodGroup = $request->bloodGroup;
       $details->identificationMark = $request->identificationMark;
       $details->parentNumber = $request->parentNumber;
       $details->homePhoneNumber = $request->homePhoneNumber;
       $details->fatherSpouseName = $request->fatherSpouseName;
       $details->motherName = $request->motherName;
       $details->guardianName = $request->guardianName;
       $details->batchId = Batch::where('status',1)->select('batchId')->first()->batchId;
       $details->save();
       $detailsId=$details->detailId;
       $roleIdForRoleDetailIdUpdation=$request->roleId;

       if($role==1)
       {

       }
       else if($role==2)
       {
         $teacher =new Teacher;
         $teacher->userId	=$userId;
         $teacher->teacherDetailId=$detailsId;
         $teacher->status=1;
         $teacher->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
         $teacher->save();
       }
       else if($role==3)
       {
         $admin=new Admin;
         $admin->userId=$userId;
         $admin->notifications_Posted=0;
         $admin->adminDetailId=$detailsId;
         $admin->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
         $admin->status = 1;
         $admin->save();
       }
       else {
         $student=new Student;
         $student->userId=$userId;
         $student->studentDetailsId=$detailsId;
         $student->studentClassroom=0;
         $student->studentGrade=0;
         $student->studentSection=0;
         $student->studentSemester=0;
         $student->studentDepartmentId=0;
         $student->status=3;
         $student->batchId= Batch::where('status',1)->select('batchId')->first()->batchId;
         $student->save();
       }

       \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId,$request->userId);
       \App\Http\Controllers\DetailController::updateRoleInUsers($request->userId,$request->roleId);
      // return redirect()->route('getAdminAllDetails');
      // return Redirect::back();
      return redirect()->route('AdminDetails',['id'=>'detailsToNewUser'])->with('success', 'User details updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail  $Detail
     * @return \Illuminate\Http\Response
     */
    public function show(detail $detail)
    {
        //
        $details=Detail::all();
        return $details;
    }

    public function getAdminAllDetails()
    {
      $userDetails=Detail::all();
      return view("Admin.details")->with('userDetails',$userDetails);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $Detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $Detail
     * @return \Illuminate\Http\Response
     */


    public function getDetails()
    {
      $users = \App\Models\User::all();
      return view("Admin.details")->with('users',$users);
    }
        public function getDetailsToTeacher()
        {
          $users = \App\Models\User::all();
          return view("Admin.teacher")->with('users',$users);
        }

    public function addToAdminTable($userId,$adminDetailId)
    {
      $admin= new Admin;
      $admin->userId=$userId;
      $admin->notifications_Posted="";
      $admin->adminDetailId=$adminDetailId;
      $admin->batchId=Batch::where('status','=',1)->select('batchId')->first()->batchId;
      $admin->save();
      return;
    }


    public function addToTeacherTable($userId,$detailId)
    {
      $batchIds=Batch::where('status',1)->select('batchId')->first();
      $teacher= Teacher::where('userId','=',$userId)->where('batchId','=',$batchIds->batchId)->first();
      $teacher->teacherDetailId=$detailId;
      $teacher->batchId=$batchIds->batchId;
      $teacher->save();
      return;

    }


    public function addToStudentTable($userId,$studentDetailId)
    {
      $student = new Student;
      $student->userId=$userId;
      $student->studentDetailsId=$studentDetailId;
      $student->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
      $student->save();
      return;
    }

    public function updateAdminDetails(Request $request)
    {
        //Updating classroom details
        $validated = $request->validate([

                  'salutation' => ['required'],
                  'firstName' => ['required'],
                  'lastName' => ['required'],
                  'age' => ['required', 'numeric'],
                  'dob' => ['required', 'date'],
                  'contactNumber' => ['required', 'numeric'],
                  'alternateContactNumber' => ['required','numeric'],
                  'address' => ['required'],
                  'bloodGroup' => ['required'],
                  'identificationMark' => ['required'],
                  'parentNumber' => ['required', 'numeric'],
                  'homePhoneNumber' => ['required', 'numeric'],
                  'fatherSpouseName' => ['required'],
                  'motherName' => ['required'],
                  'guardianName' => ['required'],
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
        $detail = Detail::where('detailId', $request->detailId)->first();
        $detail->sal=$request->salutation;
        $detail->firstname = $request->firstName;
        $detail->lastname = $request->lastName;
        $detail->age = $request->age;
        $detail->dob = $request->dob;
        $detail->contactNumber = $request->contactNumber;
        $detail->alternateContactNumber = $request->alternateContactNumber;
        $detail->userId = $request->userId;
        $detail->roleId = 3;
        $detail->address = $request->address;
        $detail->bloodGroup = $request->bloodGroup;
        $detail->identificationMark = $request->identificationMark;
        $detail->parentNumber = $request->parentNumber;
        $detail->homePhoneNumber = $request->homePhoneNumber;
        $detail->fatherSpouseName = $request->fatherSpouseName;
        $detail->motherName = $request->motherName;
        $detail->guardianName = $request->guardianName;
        $detail->save();
        $detailsId=$detail->detailId;
        $userId=$request->userId;
        \App\Http\Controllers\DetailController::addToAdminTable($userId,$detailsId);
 \App\Http\Controllers\DetailController::updateRoleInUsers($request->userId,$request->roleId);

  // return Redirect::back();
    return redirect()->route('AdminDetails',['id'=>'createOrUpdateAdminDetails'])->with('success', 'User details updated successfully.');
    }

    public function updateTeacherDetails(Request $request)
    {
        //Updating classroom details
        $validated = $request->validate([

                  'firstName' => ['required'],
                  'lastName' => ['required'],
                  'age' => ['required', 'numeric'],
                  'dob' => ['required', 'date'],
                  'contactNumber' => ['required', 'numeric'],
                  'alternateContactNumber' => ['required','numeric'],
                  'address' => ['required'],
                  'bloodGroup' => ['required'],
                  'identificationMark' => ['required'],
                  'parentNumber' => ['required', 'numeric'],
                  'homePhoneNumber' => ['required', 'numeric'],
                  'fatherSpouseName' => ['required'],
                  'motherName' => ['required'],
                  'guardianName' => ['required'],
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
        $detail = Detail::where('detailId', $request->detailId)->first();
        $detail->sal=$request->salutation;
        $detail->firstname = $request->firstName;
        $detail->lastname = $request->lastName;
        $detail->age = $request->age;
        $detail->dob = $request->dob;
        $detail->contactNumber = $request->contactNumber;
        $detail->alternateContactNumber = $request->alternateContactNumber;
        $detail->userId = $request->userId;
        $detail->roleId = 2;
        $detail->address = $request->address;
        $detail->bloodGroup = $request->bloodGroup;
        $detail->identificationMark = $request->identificationMark;
        $detail->parentNumber = $request->parentNumber;
        $detail->homePhoneNumber = $request->homePhoneNumber;
        $detail->fatherSpouseName = $request->fatherSpouseName;
        $detail->motherName = $request->motherName;
        $detail->guardianName = $request->guardianName;
        $detail->status = 1;
        $detail->save();
        \App\Http\Controllers\DetailController::addToTeacherTable($request->userId,$request->detailId);

     \App\Http\Controllers\DetailController::updateRoleInUsers($request->userId,$request->roleId);

      return redirect()->route('AdminDetails',['id'=>'createOrUpdateTeacherDetails'])->with('success', 'User details updated successfully.');
    }

    public function updateStudentDetails(Request $request)
    {
        //Updating classroom details
         $validated = $request->validate([

        'firstName' => ['required'],
        'lastName' => ['required'],
        'age' => ['required', 'numeric'],
        'dob' => ['required', 'date'],
        'contactNumber' => ['required', 'numeric'],
        'alternateContactNumber' => ['required','numeric'],
        'address' => ['required'],
        'bloodGroup' => ['required'],
        'identificationMark' => ['required'],
        'parentNumber' => ['required', 'numeric'],
        'homePhoneNumber' => ['required', 'numeric'],
        'fatherSpouseName' => ['required'],
        'motherName' => ['required'],
        'guardianName' => ['required'],
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
        $detail = Detail::where('detailId',$request->detailId)->first();
        $detail->sal=$request->salutation;
        $detail->firstname = $request->firstName;
        $detail->lastname = $request->lastName;
        $detail->age = $request->age;
        $detail->dob = $request->dob;
        $detail->contactNumber = $request->contactNumber;
        $detail->alternateContactNumber = $request->alternateContactNumber;
        $detail->userId = $request->userId;
        $detail->roleId = 4;
        $detail->address = $request->address;
        $detail->bloodGroup = $request->bloodGroup;
        $detail->identificationMark = $request->identificationMark;
        $detail->parentNumber = $request->parentNumber;
        $detail->homePhoneNumber = $request->homePhoneNumber;
        $detail->fatherSpouseName = $request->fatherSpouseName;
        $detail->motherName = $request->motherName;
        $detail->guardianName = $request->guardianName;
        $detail->save();
        $detailsId=$detail->detailId;
        \App\Http\Controllers\DetailController::addToStudentTable($request->userId,$detailsId);
    \App\Http\Controllers\DetailController::updateRoleInUsers($request->userId,$request->roleId);

      return redirect()->route('AdminDetails',['id'=>'createOrUpdateTeacherDetails'])->with('success', 'Student details updated successfully.');
    }


    public function createTeacher(Request $request)
    {
        $validated = $request->validate([
          'password' => ['required', Password::defaults()],
          'email' => ['email' => 'email'],
          'phone' => ['required', 'numeric'],
          'firstName' => ['required'],
          'lastName' => ['required'],
          'age' => ['required', 'numeric'],
          'dob' => ['required', 'date'],
          'contactNumber' => ['required', 'numeric'],
          'alternateContactNumber' => ['required','numeric'],
          'address' => ['required'],
          'bloodGroup' => ['required'],
          'identificationMark' => ['required'],
          'parentNumber' => ['required', 'numeric'],
          'homePhoneNumber' => ['required', 'numeric'],
          'fatherSpouseName' => ['required'],
          'motherName' => ['required'],
          'guardianName' => ['required'],
     [
      'phone.required'=> 'Your Phone Number is Required',
      'phone.numeric'=> 'Phone number must be numeric',
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
      'parentNumber.required'=> 'Contact number of your parents is required',
      'homePhoneNumber.required'=> 'Home phone number is required',
      'fatherSpouseName.required'=> 'Contact number of your father or spouse is Required',
      'motherName.required'=> 'Name of your mother is Required',
      'guardianName.required'=> 'Name of your guardian is Required',
     ]
      ]);

      $passwords = DB::table('constant_controllers')
            ->where('constantName','=','defaultPassword')
            ->select('constantValue')
            ->first();
      $user=new User;
      $user->email=$request->email;
      $user->password=Hash::make($passwords->constantValue);
      $user->phone=$request->phone;
      $user->role=2;
      $user->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
      $user->save();
      $userId=$user->userId;
      event(new Registered($user));
        //Add An Entity
        $details = new Detail;

        $details->sal=$request->salutation;
       $details->firstname = $request->firstName;
       $details->lastname = $request->lastName;
       $details->age = $request->age;
       $details->dob = $request->dob;
       $details->contactNumber = $request->contactNumber;
       $details->alternateContactNumber = $request->alternateContactNumber;
       $details->userId = $userId;
       $details->roleId = 2;
       $details->address = $request->address;
       $details->bloodGroup = $request->bloodGroup;
       $details->identificationMark = $request->identificationMark;
       $details->parentNumber = $request->parentNumber;
       $details->homePhoneNumber = $request->homePhoneNumber;
       $details->fatherSpouseName = $request->fatherSpouseName;
       $details->motherName = $request->motherName;
       $details->status = 1;
       $details->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
       $details->guardianName = $request->guardianName;
       $details->save();
       $detailsId=$details->detailId;
       $roleIdForRoleDetailIdUpdation=3;
       $teachers=new Teacher;
       $teachers->userId=$userId;
       $teachers->teacherDetailId=$detailsId;
       $teachers->status = 1;
       $teachers->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
       $teachers->save();
       \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId,$userId);
       \App\Http\Controllers\DetailController::updateRoleInUsers($userId,2);
       return response()->json([
       'status' => true,
       'message' => 'Teacher created successfully.'
       ]);
    }


    public function createAdmin(Request $request)
    {

      $validated = $request->validate(
[
  'password' => ['required', Password::defaults()],
  'email' => ['required', 'email'],
  'phone' => ['required', 'numeric'],
  'firstName' => ['required'],
  'lastName' => ['required'],
  'age' => ['required', 'numeric'],
  'dob' => ['required', 'date'],
  'contactNumber' => ['required', 'numeric'],
  'alternateContactNumber' => ['required', 'numeric'],
  'address' => ['required'],
  'bloodGroup' => ['required'],
  'identificationMark' => ['required'],
  'parentNumber' => ['required', 'numeric'],
  'homePhoneNumber' => ['required', 'numeric'],
  'fatherSpouseName' => ['required'],
  'motherName' => ['required'],
  'guardianName' => ['required'],
],
[
  'phone.required'=> 'Your Phone Number is Required',
  'phone.numeric'=> 'Phone number must be numeric',
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
  'parentNumber.required'=> 'Contact number of your parents is required',
  'homePhoneNumber.required'=> 'Home phone number is required',
  'fatherSpouseName.required'=> 'Contact number of your father or spouse is Required',
  'motherName.required'=> 'Name of your mother is Required',
  'guardianName.required'=> 'Name of your guardian is Required',
]
);

      $passwords = DB::table('constant_controllers')
            ->where('constantName','=','defaultPassword')
            ->select('constantValue')
            ->first();
      $user=new User;
      $user->email=$request->email;
      $user->password=Hash::make($passwords->constantValue);
      $user->phone=$request->phone;
      $user->role=3;
      $user->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
      $user->save();
      $userId=$user->userId;
      event(new Registered($user));
        //Add An Entity
        $details = new Detail;

        $details->sal=$request->salutation;
       $details->firstname = $request->firstName;
       $details->lastname = $request->lastName;
       $details->age = $request->age;
       $details->dob = $request->dob;
       $details->contactNumber = $request->contactNumber;
       $details->alternateContactNumber = $request->alternateContactNumber;
       $details->userId = $userId;
       $details->roleId = 3;
       $details->address = $request->address;
       $details->bloodGroup = $request->bloodGroup;
       $details->identificationMark = $request->identificationMark;
       $details->parentNumber = $request->parentNumber;
       $details->homePhoneNumber = $request->homePhoneNumber;
       $details->fatherSpouseName = $request->fatherSpouseName;
       $details->motherName = $request->motherName;
       $details->status = 1;
       $details->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
       $details->guardianName = $request->guardianName;
       $details->save();
       $detailsId=$details->detailId;
       $roleIdForRoleDetailIdUpdation=3;
       $admin=new Admin;
       $admin->userId=$userId;
       $admin->notifications_Posted=0;
       $admin->adminDetailId=$detailsId;
       $admin->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
       $admin->status = 1;
       $admin->save();
       \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId,$userId);
       \App\Http\Controllers\DetailController::updateRoleInUsers($userId,3);
        // return redirect()->route('Admin',['id'=>'createTheAdmin'])->with('success', 'Admin created successfully.');
        return response()->json([
      'status' => true,
      'message' => 'Class created successfully.'
  ]);
    }

    public function createStudentTeacher(Request $request)
    {

        $validated = $request->validate([
          'password' => ['required', Password::defaults()],
          'email' => ['email' => 'email'],
          'phone' => ['required', 'numeric'],
          'firstName' => ['required'],
          'lastName' => ['required'],
          'age' => ['required', 'numeric'],
          'dob' => ['required', 'date'],
          'contactNumber' => ['required', 'numeric'],
          'alternateContactNumber' => ['required','numeric'],
          'address' => ['required'],
          'bloodGroup' => ['required'],
          'identificationMark' => ['required'],
          'parentNumber' => ['required', 'numeric'],
          'homePhoneNumber' => ['required', 'numeric'],
          'fatherSpouseName' => ['required'],
          'motherName' => ['required'],
          'guardianName' => ['required'],
      [
      'phone.required'=> 'Your Phone Number is Required',
      'phone.numeric'=> 'Phone number must be numeric',
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
      'parentNumber.required'=> 'Contact number of your parents is required',
      'homePhoneNumber.required'=> 'Home phone number is required',
      'fatherSpouseName.required'=> 'Contact number of your father or spouse is Required',
      'motherName.required'=> 'Name of your mother is Required',
      'guardianName.required'=> 'Name of your guardian is Required',
      ]
      ]);

      $usersName=$request->firstName.' '.$request->lastName;
        $user=new User;
        $user->name=$usersName;
        $user->email=$request->email;
        $user->email_verified_at='';
        $user->password=Hash::make($request->password);
        $user->detailsId=0;
        $user->phone=$request->phone;
        $user->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
        $user->role=4;
        $user->save();
        $userId=$user->userId;
        event(new Registered($user));
          //Add An Entity
          $details = new Detail;

          $details->sal=$request->salutation;
         $details->firstname = $request->firstName;
         $details->lastname = $request->lastName;
         $details->age = $request->age;
         $details->dob = $request->dob;
         $details->contactNumber = $request->contactNumber;
         $details->alternateContactNumber = $request->alternateContactNumber;
         $details->userId = $userId;
         $details->roleId = 4;
         $details->address = $request->address;
         $details->bloodGroup = $request->bloodGroup;
         $details->identificationMark = $request->identificationMark;
         $details->parentNumber = $request->parentNumber;
         $details->homePhoneNumber = $request->homePhoneNumber;
         $details->fatherSpouseName = $request->fatherSpouseName;
         $details->motherName = $request->motherName;
         $details->guardianName = $request->guardianName;
         $details->status = 1;
         $details->batchId = Batch::where('status',1)->select('batchId')->first()->batchId;
         $details->save();
         $detailsId=$details->detailId;
         $roleIdForRoleDetailIdUpdation=4;
         $student=new Student;
         $student->userId=$userId;
         $student->studentDetailsId=$detailsId;
         $student->studentClassroom=0;
         $student->studentGrade=0;
         $student->studentSection=0;
         $student->studentSemester=0;
         $student->studentDepartmentId=0;
         $student->status=3;
         $student->batchId= Batch::where('status',1)->select('batchId')->first()->batchId;
         $student->save();
         \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId,$userId);
         \App\Http\Controllers\DetailController::updateRoleInUsers($userId,4);
         return redirect()->route('TeacherStudent',['id'=>'teacherStudentAddStudent'])->with('success', 'Student added successfully.');

    }
        public function createStudentAdmin(Request $request)
        {
            $validated = $request->validate([
              'password' => ['required', Password::defaults()],
              'email' => ['email' => 'email'],
              'phone' => ['required', 'numeric'],
              'firstName' => ['required'],
              'lastName' => ['required'],
              'age' => ['required', 'numeric'],
              'dob' => ['required', 'date'],
              'contactNumber' => ['required', 'numeric'],
              'alternateContactNumber' => ['required','numeric'],
              'address' => ['required'],
              'bloodGroup' => ['required'],
              'identificationMark' => ['required'],
              'parentNumber' => ['required', 'numeric'],
              'homePhoneNumber' => ['required', 'numeric'],
              'fatherSpouseName' => ['required'],
              'motherName' => ['required'],
              'guardianName' => ['required'],
          [
          'phone.required'=> 'Your Phone Number is Required',
          'phone.numeric'=> 'Phone number must be numeric',
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
          'parentNumber.required'=> 'Contact number of your parents is required',
          'homePhoneNumber.required'=> 'Home phone number is required',
          'fatherSpouseName.required'=> 'Contact number of your father or spouse is Required',
          'motherName.required'=> 'Name of your mother is Required',
          'guardianName.required'=> 'Name of your guardian is Required',
          ]
          ]);
        $usersName=$request->firstName.' '.$request->lastName;
          $user=new User;
          $user->name=$usersName;
          $user->email=$request->email;
          $user->email_verified_at='';
          $user->password=Hash::make($request->password);
          $user->detailsId=0;
          $user->phone=$request->phone;
          $user->role=4;
          $user->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
          $user->save();
          $userId=$user->userId;
          event(new Registered($user));
            //Add An Entity
            $details = new Detail;

            $details->sal=$request->salutation;
           $details->firstname = $request->firstName;
           $details->lastname = $request->lastName;
           $details->age = $request->age;
           $details->dob = $request->dob;
           $details->contactNumber = $request->contactNumber;
           $details->alternateContactNumber = $request->alternateContactNumber;
           $details->userId = $userId;
           $details->roleId = 4;
           $details->address = $request->address;
           $details->bloodGroup = $request->bloodGroup;
           $details->identificationMark = $request->identificationMark;
           $details->parentNumber = $request->parentNumber;
           $details->homePhoneNumber = $request->homePhoneNumber;
           $details->fatherSpouseName = $request->fatherSpouseName;
           $details->motherName = $request->motherName;
           $details->guardianName = $request->guardianName;
           $details->status = 1;
           $details->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
           $details->save();
           $detailsId=$details->detailId;
           $roleIdForRoleDetailIdUpdation=4;

           $student=new Student;
           $student->userId=$userId;
           $student->studentDetailsId=$detailsId;
           $student->studentClassroom=0;
           $student->studentGrade=0;
           $student->studentSection=0;
           $student->studentSemester=0;
           $student->studentDepartmentId=0;
           $student->status=3;
           $student->batchId= Batch::where('status',1)->select('batchId')->first()->batchId;
           $student->save();
           \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId,$userId);
           \App\Http\Controllers\DetailController::updateRoleInUsers($userId,4);
           return response()->json([
           'status' => true,
           'message' => 'Data Submitted!'
           ]);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $Detail
     * @return \Illuminate\Http\Response
     */



             public function deleteAdmin($request)
             {
                 //Delete self - details
                 $admin = Admin::where('userId','=',$request->userId);
                 $admin->delete();
                  return ;
             }


              public function deleteStudent($request)
              {       //Delete self - details
                  $student = Student::where('userId','=',$request->userId);
                  $student->delete();
                  return back()->with('success', 'Deleted successfully.');
              }

        public function deleteTeacher($userId)
        {
                                      //Delete self - details
        $teacher = Teacher::where('userId','=',$userId);
        $teacher->delete();
        return back()->with('success', 'Deleted successfully.');
        }

        public function destroyAdmin(Request $request)
        {
            //Delete self - details
            $user=User::where('userId','=',$request->userId)->first();
            $user->delete();
            $details = Detail::where('userId','=',$request->userId);
            $details->delete();
            deleteAdmin($details->userId);

             return back()->with('success', 'Deleted successfully.');
        }

        public function destroyStudent(Request $request)
          {
              //Delete self - details
              $user=User::where('userId','=',$request->userId)->first();
              $user->delete();
              $details = Detail::where('userId','=',$request->userId);
              $details->delete();
              deleteStudent($details->userId);

               return back()->with('success', 'Deleted successfully.');
          }
    public function destroyTeacher(Request $request)
    {
        //Delete self - details
        $user=User::where('userId',$request->userId)->first();
        $user->delete();
        $details = Detail::where('userId','=',$request->userId);
        $details->delete();
        deleteTeacher($details->userId);

         return back()->with('success', 'Deleted successfully.');
    }


   public function getDetailsAboutId()
   {
         //Retrieve  details
         $infoDetails = Detail::all();
         return $infoDetails;
   }
}
