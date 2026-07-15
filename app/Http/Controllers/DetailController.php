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
use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Department;
use App\Models\Attendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules;
use Redirect;
// use DB;

use Illuminate\Support\Facades\DB;

DB::enableQueryLog();

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

public function getAdminAllDetails()
    {
      $userDetails=Detail::all();
      return view("Admin.details")->with('userDetails',$userDetails);
    }

  public function updateRoleInUsers($userId, $roleId)
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

  function updateUserDetailsId($detailsId, $userId)
  {
    $user = User::where('userId', '=', $userId)->first();

    $user->detailsId = $detailsId;

    $user->save();
    return;
  }
  public function storeDetails(Request $request)
  {
    $validated = $request->validate([
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
      [
        'firstName.required' => 'Your First Name is Required',
        'lastName.required' => 'Your Last Name is Required',
        'age.numeric' => 'Age should be numeric',
        'dob.required' => 'Your date of birth is Required',
        'contactNumber.required' => 'Your Contact Number is Required',
        'contactNumber.numeric' => 'Contact Number Should be numeric',
        'alternateContactNumber.required' => 'An Alternate Contact Number is Required',
        'alternateContactNumber.numeric' => 'Alternate Contact Number Should be numeric',
        'address.required' => 'Address is required',
        'bloodGroup.required' => 'Your blood group is Required',
        'identificationMark.required' => 'Please provide an identification mark',
        'parentNumber.required' => 'Parent\'s contact number is required',
        'homePhoneNumber.required' => 'Home phone number is required',
        'fatherSpouseName.required' => 'Your Father\'s / Spouse\'s name is Required',
        'motherName.required' => 'Your Mother\'s name is Required',
        'guardianName.required' => 'Your Guardian\'s name is Required',
      ]
    ]);
    $batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    //Add An Entity
    $detailIds = Detail::updateOrCreate(
      [
        'userId' => $request->userId,
      ],
      [
        'userId' => $request->userId,
        'sal' => $request->salutation,
        'firstname' => $request->firstName,
        'lastname' => $request->lastName,
        'age' => $request->age,
        'dob' => $request->dob,
        'contactNumber' => $request->contactNumber,
        'alternateContactNumber' => $request->alternateContactNumber,
        'userId' => $request->userId,
        'roleId' => $request->roleId,
        'address' => $request->address,
        'bloodGroup' => $request->bloodGroup,
        'identificationMark' => $request->identificationMark,
        'parentNumber' => $request->parentNumber,
        'homePhoneNumber' => $request->homePhoneNumber,
        'fatherSpouseName' => $request->fatherSpouseName,
        'motherName' => $request->motherName,
        'guardianName' => $request->guardianName,
        'status' => 8,
        'batchId' => $batchId
      ]
    );
    $role = $request->roleId;
    $userId = $request->userId;
    $detailsId = $detailIds->detailId;
    $userTableUpdated = User::updateOrCreate(
      [
        'userId' => $request->userId,
        'detailsId' => $detailsId,
      ],
      [
        'name' => $request->firstName . " " . $request->lastName,
        'phone' => $request->contactNumber,
      ]
    );
    $roleIdForRoleDetailIdUpdation = $request->roleId;

    $currentBatchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    if ($role == 1) {
      //Created
      Admin::updateOrCreate(
        [
          'userId' => $userId,
          'batchId' => $currentBatchId,
        ],
        [
          'userId' => $userId,
          'notifications_Posted' => 0,
          'adminDetailId' => $detailsId,
          'batchId' => $currentBatchId,
          'status' => 9
        ]
      );
      //Active


      Admin::updateOrCreate(
        [
          'userId' => $userId,
          'batchId' => $currentBatchId,
        ],
        [
          'userId' => $userId,
          'notifications_Posted' => 0,
          'adminDetailId' => $detailsId,
          'batchId' => $currentBatchId,
          'status' => 10
        ]
      );
    } else if ($role == 2) {
      //Created
      Teacher::updateOrCreate(
        [
          'userId' => $userId,
          'batchId' => $currentBatchId,
        ],
        [
          'userId' => $userId,
          'teacherDetailId' => $detailsId,
          'batchId' => $currentBatchId,
          'status' => 16
        ]
      );
      //Active
      Teacher::updateOrCreate(
        [
          'userId' => $userId,
          'batchId' => $currentBatchId,
        ],
        [
          'userId' => $userId,
          'teacherDetailId' => $detailsId,
          'batchId' => $currentBatchId,
          'status' => 17
        ]
      );
    } else if ($role == 3) {
      //Created
      Student::updateOrCreate(
        [
          'userId' => $userId,
          'batchId' => $currentBatchId,
        ],
        [
          'userId' => $userId,
          'studentDetailsId' => $detailsId,
          'studentClassroom' => 0,
          'studentGrade' => 0,
          'studentSection' => 0,
          'studentSemester' => 0,
          'studentSemstudentDepartmentIdester' => 0,
          'batchId' => $currentBatchId,
          'status' => 23
        ]
      );
      //Active
      Student::updateOrCreate(
        [
          'userId' => $userId,
          'batchId' => $currentBatchId,
        ],
        [
          'userId' => $userId,
          'studentDetailsId' => $detailsId,
          'studentClassroom' => 0,
          'studentGrade' => 0,
          'studentSection' => 0,
          'studentSemester' => 0,
          'studentSemstudentDepartmentIdester' => 0,
          'batchId' => $currentBatchId,
          'status' => 24
        ]
      );
    } else {
      response()->json([
        'status' => true,
        'message' => 'User data updated successfully.'
      ]);
    }

    $detailObject = Detail::where('detailId', '=', $detailsId)->first();
    $detailObject->status = 3;
    $detailObject->save();

    \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId, $request->userId);
    \App\Http\Controllers\DetailController::updateRoleInUsers($request->userId, $request->roleId);

    return response()->json([
      'status' => true,
      'message' => 'User data updated successfully.'
    ]);
  }

  // 

  // 

  // 
  public function storeDetailsByTeacher(Request $request)
  {
    $validated = $request->validate([
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
      [
        'firstName.required' => 'Your First Name is Required',
        'lastName.required' => 'Your Last Name is Required',
        'age.numeric' => 'Age should be numeric',
        'dob.required' => 'Your date of birth is Required',
        'contactNumber.required' => 'Your Contact Number is Required',
        'contactNumber.numeric' => 'Contact Number Should be numeric',
        'alternateContactNumber.required' => 'An Alternate Contact Number is Required',
        'alternateContactNumber.numeric' => 'Alternate Contact Number Should be numeric',
        'address.required' => 'Address is required',
        'bloodGroup.required' => 'Your blood group is Required',
        'identificationMark.required' => 'Please provide an identification mark',
        'parentNumber.required' => 'Parent\'s contact number is required',
        'homePhoneNumber.required' => 'Home phone number is required',
        'fatherSpouseName.required' => 'Your Father\'s / Spouse\'s name is Required',
        'motherName.required' => 'Your Mother\'s name is Required',
        'guardianName.required' => 'Your Guardian\'s name is Required',
      ]
    ]);
    $batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    //Add An Entity
    $detailIds = Detail::updateOrCreate(
      [
        'userId' => $request->userId,
      ],
      [
        'userId' => $request->userId,
        'sal' => $request->salutation,
        'firstname' => $request->firstName,
        'lastname' => $request->lastName,
        'age' => $request->age,
        'dob' => $request->dob,
        'contactNumber' => $request->contactNumber,
        'alternateContactNumber' => $request->alternateContactNumber,
        'userId' => $request->userId,
        'roleId' => $request->roleId,
        'address' => $request->address,
        'bloodGroup' => $request->bloodGroup,
        'identificationMark' => $request->identificationMark,
        'parentNumber' => $request->parentNumber,
        'homePhoneNumber' => $request->homePhoneNumber,
        'fatherSpouseName' => $request->fatherSpouseName,
        'motherName' => $request->motherName,
        'guardianName' => $request->guardianName,
        'status' => 8,
        'batchId' => $batchId
      ]
    );
    $role = $request->roleId;
    $userId = $request->userId;
    $detailsId = $detailIds->detailId;
    $userTableUpdated = User::updateOrCreate(
      [
        'userId' => $request->userId,
        'detailsId' => $detailsId,
      ],
      [
        'name' => $request->firstName . " " . $request->lastName,
        'phone' => $request->contactNumber,
      ]
    );
    $roleIdForRoleDetailIdUpdation = $request->roleId;

    $detailObject = Detail::where('detailId', '=', $detailsId)->first();
    $detailObject->status = 3;
    $detailObject->save();


    return response()->json([
      'status' => true,
      'message' => 'User data updated successfully.'
    ]);
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
    $details = Detail::all();
    return $details;
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

  public function addToAdminTable($userId, $adminDetailId)
  {
    $admin = new Admin;
    $admin->userId = $userId;
    $admin->notifications_Posted = "";
    $admin->adminDetailId = $adminDetailId;
    $admin->batchId = Batch::where('status', '=', 1)->select('batchId')->first()->batchId;
    $admin->save();
    return;
  }


  public function addToTeacherTable($userId, $detailId)
  {
    $batchIds = Batch::where('status', 40)->select('batchId')->first();
    $teacher = Teacher::where('userId', '=', $userId)->where('batchId', '=', $batchIds->batchId)->first();
    $teacher->teacherDetailId = $detailId;
    $teacher->batchId = $batchIds->batchId;
    $teacher->save();
    return;
  }


  public function addToStudentTable($userId, $studentDetailId)
  {
    $student = new Student;
    $student->userId = $userId;
    $student->studentDetailsId = $studentDetailId;
    $student->batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    $student->save();
    return;
  }


  public function createTeacher(Request $request)
  {

    $validated = $request->validate([
      'password' => ['required', Password::defaults()],
      'email' => ['email', 'unique:users,email'],
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
      [
        'phone.required' => 'Your Phone Number is Required',
        'phone.numeric' => 'Phone number must be numeric',
        'firstName.required' => 'Your First Name is Required',
        'lastName.required' => 'Your Last Name is Required',
        'age.numeric' => 'Age should be numeric',
        'dob.required' => 'Your date of birth is Required',
        'contactNumber.required' => 'Your Contact Number is Required',
        'contactNumber.numeric' => 'Contact Number Should be numeric',
        'alternateContactNumber.required' => 'An Alternate Contact Number is Required',
        'alternateContactNumber.numeric' => 'Alternate Contact Number Should be numeric',
        'address.required' => 'Address is required',
        'bloodGroup.required' => 'Your blood group is Required',
        'identificationMark.required' => 'Please provide an identification mark',
        'parentNumber.required' => 'Contact number of your parents is required',
        'homePhoneNumber.required' => 'Home phone number is required',
        'fatherSpouseName.required' => 'Contact number of your father or spouse is Required',
        'motherName.required' => 'Name of your mother is Required',
        'guardianName.required' => 'Name of your guardian is Required',
      ]
    ]);

    $fullName = $request->firstName . " " . $request->lastName;
    $passwords = DB::table('constant_controllers')
      ->where('constantName', '=', 'defaultPassword')
      ->select('constantValue')
      ->first();
    $user = new User;
    $user->name = $fullName;
    $user->email = $request->email;
    $user->password = Hash::make($passwords->constantValue);
    $user->phone = $request->phone;
    $user->role = 2;
    $user->batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    $user->save();
    $userId = $user->userId;
    event(new Registered($user));
    //Add An Entity
    $details = new Detail;

    $details->sal = $request->salutation;
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
    $details->status = 16;
    $details->batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    $details->guardianName = $request->guardianName;
    $details->save();
    $detailsId = $details->detailId;
    $roleIdForRoleDetailIdUpdation = 2;
    $teachers = new Teacher;
    $teachers->userId = $userId;
    $teachers->teacherDetailId = $detailsId;
    $teachers->status = 16;
    $teachers->batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    $teachers->save();
    $lastTeachersId = $teachers->teacherId;
    \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId, $userId);
    \App\Http\Controllers\DetailController::updateRoleInUsers($userId, 2);

    $detailsNow = Detail::where('detailId', '=', $detailsId)->first();
    $detailsNow->status = 17;
    $detailsNow->save();
    $teachers = Teacher::where('teacherId', '=', $lastTeachersId)->first();
    $teachers->status = 17;
    $teachers->save();

    return response()->json([
      'status' => true,
      'message' => 'Teacher created successfully.'
    ]);
  }

  public function getDataForAddingDetailsOfAdmin(Request $request)
  {
    $newAdminUserId = $request->input('newAdminUserId');
    $newAdminUserDatas = Detail::where('userId', '=', $newAdminUserId)
      ->where('roleId', '=', 1)->first();
    return response()->json($newAdminUserDatas);
  }
  public function getDataForAddingDetailsOfTeacher(Request $request)
  {
    $newTeacherUserId = $request->input('newTeacherUserId');
    $newTeacherUserDatas = Detail::where('userId', '=', $newTeacherUserId)
      ->where('roleId', '=', 2)->first();
    return response()->json($newTeacherUserDatas);
  }

  public function getDataForAddingDetailsOfStudent(Request $request)
  {
    $newStudentUserId = $request->input('newStudentUserId');
    $newStudentUserDatas = Detail::where('userId', '=', $newStudentUserId)
      ->where('roleId', '=', 3)->first();
    return response()->json($newStudentUserDatas);
  }

  public function getDataForAddingDetailsOfStudentByTeacher(Request $request)
  {
    $newStudentUserId = $request->input('newStudentUserId');
    $newStudentUserDatas = Detail::where('userId', '=', $newStudentUserId)->first();
    return response()->json($newStudentUserDatas);
  }

  public function getDataForAddingDetailsOfNewUser(Request $request)
  {
    $newUserId = $request->input('newUserId');
    $newUserDatas = Detail::where('userId', '=', $newUserId)->first();
    return response()->json($newUserDatas);
  }

  public function getNewUsers()
  {
    $newUsers = User::whereIn('role', [4, 5])->get();
    return response()->json($newUsers);
  }

  public function getAdmins()
  {
    $adminUsers = User::where('role', 1)->get();
    return response()->json($adminUsers);
  }

  public function getTeachers()
  {
    $teacherUsers = User::where('role', 2)->get();
    return response()->json($teacherUsers);
  }

  public function getStudents()
  {
    $studentUsers = User::where('role', 3)->get();
    return response()->json($studentUsers);
  }

  public function getStudentsAccordingToSubjectTeacher()
  {
    $currentUserId = Auth::id();
    $teacherUsers = User::where('userId', '=', $currentUserId)->first();
    $studentUsers = User::join('students', 'students.userId', '=', 'users.userId')
      ->join('class_rooms', 'class_rooms.classroomDetailId', '=', 'students.studentClassroom')
      ->join('subject_teacher_for_each_sections', 'subject_teacher_for_each_sections.classRoomId', '=', 'class_rooms.classroomDetailId')
      ->join('teachers', 'teachers.teacherId', '=', 'subject_teacher_for_each_sections.teacherId')
      ->where('teachers.userId', '=', $currentUserId)
      ->select('users.name as name', 'users.phone as phone', 'users.email as email', 'users.userId as userId')
      ->get();
    return response()->json($studentUsers);
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
        'phone.required' => 'Your Phone Number is Required',
        'phone.numeric' => 'Phone number must be numeric',
        'firstName.required' => 'Your First Name is Required',
        'lastName.required' => 'Your Last Name is Required',
        'age.numeric' => 'Age should be numeric',
        'dob.required' => 'Your date of birth is Required',
        'contactNumber.required' => 'Your Contact Number is Required',
        'contactNumber.numeric' => 'Contact Number Should be numeric',
        'alternateContactNumber.required' => 'An Alternate Contact Number is Required',
        'alternateContactNumber.numeric' => 'Alternate Contact Number Should be numeric',
        'address.required' => 'Address is required',
        'bloodGroup.required' => 'Your blood group is Required',
        'identificationMark.required' => 'Please provide an identification mark',
        'parentNumber.required' => 'Contact number of your parents is required',
        'homePhoneNumber.required' => 'Home phone number is required',
        'fatherSpouseName.required' => 'Contact number of your father or spouse is Required',
        'motherName.required' => 'Name of your mother is Required',
        'guardianName.required' => 'Name of your guardian is Required',
      ]
    );
    $fullName = $request->firstName . $request->lastName;

    $passwords = DB::table('constant_controllers')
      ->where('constantName', '=', 'defaultPassword')
      ->select('constantValue')
      ->first();
    $user = new User;
    $user->name = $fullName;
    $user->email = $request->email;
    $user->password = Hash::make($passwords->constantValue);
    $user->phone = $request->phone;
    $user->role = 1;
    $user->batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    $user->save();
    $userId = $user->userId;
    event(new Registered($user));
    //Add An Entity
    $details = new Detail;

    $details->sal = $request->salutation;
    $details->firstname = $request->firstName;
    $details->lastname = $request->lastName;
    $details->age = $request->age;
    $details->dob = $request->dob;
    $details->contactNumber = $request->contactNumber;
    $details->alternateContactNumber = $request->alternateContactNumber;
    $details->userId = $userId;
    $details->roleId = 1;
    $details->address = $request->address;
    $details->bloodGroup = $request->bloodGroup;
    $details->identificationMark = $request->identificationMark;
    $details->parentNumber = $request->parentNumber;
    $details->homePhoneNumber = $request->homePhoneNumber;
    $details->fatherSpouseName = $request->fatherSpouseName;
    $details->motherName = $request->motherName;
    $details->status = 9;
    $details->batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    $details->guardianName = $request->guardianName;
    $details->save();
    $detailsId = $details->detailId;
    $roleIdForRoleDetailIdUpdation = 1;
    $admin = new Admin;
    $admin->userId = $userId;
    $admin->notifications_Posted = 0;
    $admin->adminDetailId = $detailsId;
    $admin->batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    $admin->status = 9;
    $admin->save();
    $newAdminId = $admin->adminId;
    \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId, $userId);
    \App\Http\Controllers\DetailController::updateRoleInUsers($userId, 1);

    $theadmin = Admin::where('adminId', '=', $newAdminId)->first();
    $theadmin->status = 10;
    $theadmin->save();

    $theNewDetail = Detail::where('detailId', '=', $detailsId)->first();
    $theNewDetail->status = 10;
    $theNewDetail->save();
    return response()->json([
      'status' => true,
      'message' => 'Admin account created successfully.'
    ]);
  }


  public function createStudentTeacher(Request $request)
  {
    $validated = $request->validate(
      [
        'firstName' => ['required'],
        'lastName' => ['required'],
        'email' => ['required', 'email', 'unique:users,email'],
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
        'firstName.required' => 'Your First Name is Required',
        'lastName.required' => 'Your Last Name is Required',
        'email.required' => 'Email address is required',
        'email.email' => 'Please enter a valid email address',
        'email.unique' => 'This email address is already registered',
        'age.required' => 'Age is required',
        'age.numeric' => 'Age should be numeric',
        'dob.required' => 'Your date of birth is Required',
        'dob.date' => 'Please enter a valid date',
        'contactNumber.required' => 'Your Contact Number is Required',
        'contactNumber.numeric' => 'Contact Number should be numeric',
        'alternateContactNumber.required' => 'An Alternate Contact Number is Required',
        'alternateContactNumber.numeric' => 'Alternate Contact Number should be numeric',
        'address.required' => 'Address is required',
        'bloodGroup.required' => 'Your blood group is Required',
        'identificationMark.required' => 'Please provide an identification mark',
        'parentNumber.required' => 'Parent\'s contact number is required',
        'parentNumber.numeric' => 'Parent\'s contact number should be numeric',
        'homePhoneNumber.required' => 'Home phone number is required',
        'homePhoneNumber.numeric' => 'Home phone number should be numeric',
        'fatherSpouseName.required' => 'Your Father\'s / Spouse\'s name is Required',
        'motherName.required' => 'Your Mother\'s name is Required',
        'guardianName.required' => 'Your Guardian\'s name is Required',
      ]
    );
    $batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    //Add An Entity
    $user = new User;
    $usersName = $request->firstName . " " . $request->lastName;
    $user->name = $usersName;
    $user->email = $request->email;
    $user->password = Hash::make('abcd1234'); // Default Password='abcd1234'
    $user->detailsId = 0;
    $user->phone = $request->contactNumber;
    $user->role = 3;
    $user->batchId = $batchId;
    $user->save();
    $userId = $user->userId;
    $detailIds = Detail::updateOrCreate(
      [
        'userId' => $userId,
      ],
      [
        'sal' => $request->salutation,
        'firstname' => $request->firstName,
        'lastname' => $request->lastName,
        'age' => $request->age,
        'dob' => $request->dob,
        'contactNumber' => $request->contactNumber,
        'alternateContactNumber' => $request->alternateContactNumber,
        'userId' => $userId,
        'roleId' => 3,
        'address' => $request->address,
        'bloodGroup' => $request->bloodGroup,
        'identificationMark' => $request->identificationMark,
        'parentNumber' => $request->parentNumber,
        'homePhoneNumber' => $request->homePhoneNumber,
        'fatherSpouseName' => $request->fatherSpouseName,
        'motherName' => $request->motherName,
        'guardianName' => $request->guardianName,
        'status' => 23, // Status : Active
        'batchId' => $batchId
      ]
    );
    $role = 3;
    $detailsId = $detailIds->detailId;
    $userTableUpdated = User::updateOrCreate(
      [
        'userId' => $userId,
      ],
      [
        'name' => $request->firstName . " " . $request->lastName,
        'phone' => $request->contactNumber,
      ]
    );
    $roleIdForRoleDetailIdUpdation = 3;

    $currentBatchId = Batch::where('status', 40)->select('batchId')->first()->batchId;

    //Created

    $studentIdLatest = Student::updateOrCreate(
      [
        'userId' => $userId,
      ],
      [
        'userId' => $userId,
        'studentDetailsId' => $detailsId,
        'studentClassroom' => 1,
        'studentGrade' => 1,
        'studentSection' => 1,
        'studentSemester' => 1,
        'studentDepartmentId' => 1,
        'status' => 23,
        'batchId' => $currentBatchId,
      ]
    );
    //Active
    $studentHere = $studentIdLatest;
    $studentHere->status = 24;
    $studentHere->save();


    $detailObject = Detail::where('detailId', '=', $detailsId)->first();
    $detailObject->status = 24;
    $detailObject->save();

    \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId, $userId);
    \App\Http\Controllers\DetailController::updateRoleInUsers($userId, 3);

    return response()->json([
      'status' => true,
      'message' => 'User data updated successfully.'
    ]);
  }
  public function createStudentAdmin(Request $request)
  {
    $validated = $request->validate([
      'password' => ['required', Password::defaults()],
      'email' => ['required', 'email', 'unique:users,email'],
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
      [
        'email.unique' => 'Email already exists!',
        'phone.required' => 'Your Phone Number is Required',
        'phone.numeric' => 'Phone number must be numeric',
        'firstName.required' => 'Your First Name is Required',
        'lastName.required' => 'Your Last Name is Required',
        'age.numeric' => 'Age should be numeric',
        'dob.required' => 'Your date of birth is Required',
        'contactNumber.required' => 'Your Contact Number is Required',
        'contactNumber.numeric' => 'Contact Number Should be numeric',
        'alternateContactNumber.required' => 'An Alternate Contact Number is Required',
        'alternateContactNumber.numeric' => 'Alternate Contact Number Should be numeric',
        'address.required' => 'Address is required',
        'bloodGroup.required' => 'Your blood group is Required',
        'identificationMark.required' => 'Please provide an identification mark',
        'parentNumber.required' => 'Contact number of your parents is required',
        'homePhoneNumber.required' => 'Home phone number is required',
        'fatherSpouseName.required' => 'Contact number of your father or spouse is Required',
        'motherName.required' => 'Name of your mother is Required',
        'guardianName.required' => 'Name of your guardian is Required',
      ]
    ]);
    $usersName = $request->firstName . ' ' . $request->lastName;
    $user = new User;
    $user->name = $usersName;
    $user->email = $request->email;
    // $user->email_verified_at='';
    $user->password = Hash::make($request->password);
    $user->detailsId = 0;
    $user->phone = $request->phone;
    $user->role = 3;
    $user->batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    $user->save();
    $userId = $user->userId;
    event(new Registered($user));
    //Add An Entity
    $details = new Detail;

    $details->sal = $request->salutation;
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
    $details->guardianName = $request->guardianName;
    $details->status = 23;
    $details->batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    $details->save();
    $detailsId = $details->detailId;
    $roleIdForRoleDetailIdUpdation = 3;

    $student = new Student;
    $student->userId = $userId;
    $student->studentDetailsId = $detailsId;

    $registeredGradeId = Grade::where('grade', '=', "Registered")->select('gradeId')->first()->gradeId; //'Registered'

    $student->studentClassroom = 1; //'Registered'
    $student->studentGrade = 1; //'Registered'
    $student->studentSection = 1; //'Registered'
    $student->studentSemester = 1; //'Registered'
    $student->studentDepartmentId = 1; //'Registered'
    $student->status = 23;
    $student->batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
    $student->save();
    $newStudentId = $student->studentId;
    \App\Http\Controllers\DetailController::updateUserDetailsId($detailsId, $userId);
    \App\Http\Controllers\DetailController::updateRoleInUsers($userId, 3);


    $latStudent = Student::where('studentId', '=', $newStudentId)->first();
    $latStudent->status = 24;
    $latStudent->save();

    $latdetails = Detail::where('detailId', '=', $detailsId)->first();
    $latdetails->status = 24;
    $latdetails->save();
    return response()->json([
      'status' => true,
      'message' => 'Student details submitted successfully!',
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Detail  $Detail
   * @return \Illuminate\Http\Response
   */



  public function deleteAdmin($userId)
  {
    //Delete self - details

    if ($userId == 1) {
      $details = Detail::where('userId', '=', $userId);
      $details->status = 0;
      return response()->json([
        'status' => false,
        'message' => 'This record cannot be deleted.'
      ]);
    }

    $admin = Admin::where('userId', '=', $userId);
    $admin->delete();
    return;
  }


  public function deleteStudent($userId)
  {       //Delete self - details

    if ($userId == 3) {
      $student = Student::where('userId', '=', $userId)->first();
      $student->status = 0;
      $details = Detail::where('userId', '=', $userId);
      $details->status = 0;
      return response()->json([
        'status' => true,
        'message' => 'This cannot be deleted.'
      ]);
    }

    $student = Student::where('userId', '=', $userId);
    $student->delete();
    return back()->with('success', 'Deleted successfully.');
  }

  public function deleteTeacher($userId)
  {
    //Delete self - details
    if ($userId == 2) {
      $teacher = Teacher::where('userId', '=', $userId)->first();
      $teacher->status = 0;
      $details = Detail::where('userId', '=', $userId);
      $details->status = 0;
      return response()->json([
        'status' => true,
        'message' => 'This cannot be deleted.'
      ]);
    }
    $teacher = Teacher::where('userId', '=', $userId);
    $teacher->delete();
    return back()->with('success', 'Deleted successfully.');
  }

  public function destroyAdmin(Request $request)
  {
    //Delete self - details
    if ($request->userId == 1) {
      $details = Detail::where('userId', '=', $request->userId);
      $details->status = 0;
      return response()->json([
        'status' => false,
        'message' => 'This record cannot be deleted.'
      ]);
    }
    $user = User::where('userId', '=', $request->userId)->first();
    $user->delete();
    $details = Detail::where('userId', '=', $request->userId);
    $details->delete();
    $this->deleteAdmin($details->userId);

    return back()->with('success', 'Deleted successfully.');
  }

  public function destroyStudent(Request $request)
  {
    //Delete self - details

    if ($request->userId == 3) {
      $student = Student::where('userId', '=', $request->userId)->first();
      $student->status = 0;

      $details = Detail::where('userId', '=', $request->userId);
      $details->status = 0;
      return response()->json([
        'status' => true,
        'message' => 'This cannot be deleted.'
      ]);
    }
    $user = User::where('userId', '=', $request->userId)->first();
    $user->delete();
    $details = Detail::where('userId', '=', $request->userId);
    $details->delete();
    $this->deleteStudent($details->userId);

    return back()->with('success', 'Deleted successfully.');
  }
  public function destroyTeacher(Request $request)
  {
    //Delete self - details
    $userId = $request->userId;
    if ($request->userId == 2) {
      $teacher = Teacher::where('userId', '=', $request->userId)->first();
      $teacher->status = 0;

      $details = Detail::where('userId', '=', $request->userId);
      $details->status = 0;
      return response()->json([
        'status' => true,
        'message' => 'This cannot be deleted.'
      ]);
    }

    $teacher = Teacher::where('userId', '=', $userId);
    $teacher->delete();
    $user = User::where('userId', $request->userId)->first();
    $user->delete();
    $details = Detail::where('userId', '=', $request->userId);
    $details->delete();
    $this->deleteTeacher($details->userId);

    return back()->with('success', 'Deleted successfully.');
  }

  public function getStaffContactDetails()
  {
    $contactDetails = Detail::join('users', 'users.detailsId', '=', 'details.detailId')
      ->join('roles', 'roles.roleId', '=', 'users.role')
      ->where('roles.roleId', '=', [2, 3])
      ->select('roles.*', 'details.*', 'users.*')
      ->get();
    return response()->json($contactDetails);
  }

  public function getDetailsAboutId()
  {
    //Retrieve  details
    $infoDetails = Detail::all();
    return $infoDetails;
  }

  public function getStudentFullDetailsByAJAX()
  {
    $userId = Auth::id();
    $studentUserDetails = Detail::join('users', 'users.detailsId', '=', 'details.detailId')
      ->join('students', 'students.userId', '=', 'users.userId')
      ->join('departments', 'departments.departmentId', '=', 'students.studentDepartmentId')
      ->join('semesters', 'semesters.semesterId', '=', 'students.studentSemester')
      ->join('grades', 'grades.gradeId', '=', 'students.studentGrade')
      ->join('sections', 'sections.sectionId', '=', 'students.studentSection')
      ->join('batches', 'batches.batchId', '=', 'students.batchId')
      ->where('users.userId', '=', $userId)
      ->where('users.role', '=', 3)
      ->select('details.*', 'sections.*', 'semesters.*', 'departments.*', 'grades.*', 'batches.*', 'students.*', 'users.*')
      ->get();


    return response()->json($studentUserDetails);
  }


  public function getTeacherFullDetailsByAJAX()
  {
    $userId = Auth::id();
    $studentUserDetails = Detail::join('users', 'users.detailsId', '=', 'details.detailId')
      ->join('teachers', 'teachers.userId', '=', 'users.userId')
      ->join('batches', 'batches.batchId', '=', 'teachers.batchId')
      ->where('users.userId', '=', $userId)
      ->where('users.role', '=', 2)
      ->select('details.*', 'batches.*', 'teachers.*', 'users.*')
      ->get();


    return response()->json($studentUserDetails);
  }
}
