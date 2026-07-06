<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Detail;
use App\Models\Role;
use App\Models\Student;
use App\Models\Batch;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    public function search(Request $request)
    {

    }

    public function getStudentDetailsByAJAX()
{
    $students = \App\Models\Student::join(
            'details',
            'details.detailId',
            '=',
            'students.studentDetailsId'
        )
        ->join(
            'users',
            'users.userId',
            '=',
            'details.userId'
        )
        ->join(
            'class_rooms',
            'class_rooms.classroomDetailId',
            '=',
            'students.studentClassroom'
        )
        ->join(
            'grades',
            'grades.gradeId',
            '=',
            'class_rooms.grade'
        )
        ->join(
            'sections',
            'sections.sectionId',
            '=',
            'class_rooms.section'
        )
        ->join(
            'departments',
            'departments.departmentId',
            '=',
            'class_rooms.departmentId'
        )
        ->join(
            'semesters',
            'semesters.semesterId',
            '=',
            'class_rooms.semester'
        )
        ->where(
            'students.status',
            '=',
            5
        )
        ->select(
            'students.studentId AS studentId',
            'details.firstName AS studentFirstName',
            'details.lastName AS studentLastName',
            'users.email AS email',
            'users.phone AS phone',
            'class_rooms.*',
            'grades.*',
            'sections.*',
            'departments.*',
            'semesters.*'
        )
        ->get();

    return response()->json($students);
}

public function getStudentDetailsToReassignClassroomByAJAX()
{
    $students = \App\Models\Student::join(
            'details',
            'details.detailId',
            '=',
            'students.studentDetailsId'
        )
        ->join(
            'users',
            'users.userId',
            '=',
            'details.userId'
        )
        // ->join(
        //     'class_rooms',
        //     'class_rooms.classroomDetailId',
        //     '=',
        //     'students.studentClassroom'
        // )
        // ->join(
        //     'grades',
        //     'grades.gradeId',
        //     '=',
        //     'class_rooms.grade'
        // )
        // ->join(
        //     'sections',
        //     'sections.sectionId',
        //     '=',
        //     'class_rooms.section'
        // )
        // ->join(
        //     'departments',
        //     'departments.departmentId',
        //     '=',
        //     'class_rooms.departmentId'
        // )
        // ->join(
        //     'semesters',
        //     'semesters.semesterId',
        //     '=',
        //     'class_rooms.semester'
        // )
        ->where(
            'students.status',
            '=',
            6   // 'Already assigned'
        )
        ->select(
            'students.*',
            'details.*',
            'users.*'//,
            // 'class_rooms.*',
            // 'grades.*',
            // 'sections.*',
            // 'departments.*',
            // 'semesters.*'
        )
        ->get();

    return response()->json($students);
}


    public function assignClassRoomForStudent(Request $request)
    {
      //Store or add admin
                     $validated = $request->validate([
                       'studentClassroom' => ['required'],
                   [
                   'studentClassroom.required'=> 'A classroom must be selected for the student.',
                   ]
                   ]);
      $student = Students::where('studentId','=',$studentId);

     $details->userId = $request->userId;
     $details->studentDetailsId = $request->studentDetailsId;
     $details->studentClassroom = $request->studentClassroom;
     $details->studentGrade = $request->studentGrade;
     $details->studentSection = $request->studentSection;
     $details->studentSemester = $request->studentSemester;
     $details->studentDepartmentId = $request->studentDepartmentId;
     $details->save();

      return response()->json([
          'status' => true,
          'message' => 'The student has been assigned to a class successfuly!'
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles=Role::where('roleName', 'student')
             ->get();
      return 1;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  $validated = $request->validate([

        'firstName' => ['required', 'confirmed'],
        'lastName' => ['required', 'confirmed'],
        'age' => ['required', 'numeric', 'confirmed'],
        'dob' => ['required', 'date', 'confirmed'],
        'contactNumber' => ['required', 'numeric', 'confirmed'],
        'alternateContactNumber' => ['required','numeric', 'confirmed'],
        'address' => ['required',  'confirmed'],
        'bloodGroup' => ['required',  'confirmed'],
        'identificationMark' => ['required', Password::defaults(), 'confirmed'],
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
      //Store or add admin
      $details = new Detail;

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
     $details->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
     $details->save();

      return response()->json([
          'status' => true,
          'message' => 'User has been added to the database!'
          ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
      return view('student.profile', [
         'student' => Student::findOrFail($id)
     ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
      // get old values
      $student = Student::where('userId', $student->userId)
             ->get();
             return 1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
      //Update admin details  $validated = $request->validate([
      $validated = $request->validate([

         'firstName' => ['required', 'confirmed'],
         'lastName' => ['required', 'confirmed'],
         'age' => ['required', 'numeric', 'confirmed'],
         'dob' => ['required', 'date', 'confirmed'],
         'contactNumber' => ['required', 'numeric', 'confirmed'],
         'alternateContactNumber' => ['required','numeric', 'confirmed'],
         'address' => ['required',  'confirmed'],
         'bloodGroup' => ['required',  'confirmed'],
         'identificationMark' => ['required', 'confirmed'],
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
      
    
      return response()->json([
          'status' => true,
          'message' => 'Record has been updated successfuly!'
          ]);
    }

    // To check whether the entity ,here student, is still being used in the system.
    public function checkStudentIdForLink($studentId)
    {
      $messages=[];
      $student = Student::where('studentId','=', $studentId)->first();

      $checkInUsers = User::where('userId','=', $student->userId)->first();
      if($checkInUsers)
        {
            $messages[]='Student\'s Id is still in the user_info table.Please check the details.';
        }

      $checkInDetails = Details::where('userId','=', $student->userId)->first();
      if($checkInDetails)
        {
            $messages[]='Student\'s Id is still in the user details table.Please check the details.';
        }

      $checkIfStudentMarks=StudentMarks::where('studentId','=', $studentId)->first();
      if($checkIfStudentMarks)
        {
          $messages[]='Student\'s Id is still in the subject marks table.Please check the details.';
        }
      
        

      return response()->json([
    'status' => true,
    'message' => $messages,
]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
      //Delete self - admin
      $students = Student::where('adminId','=', $student->userId);
      $students->delete();
      $detail = Detail::where('userId','=',$student->userId);
      $detail->delete();
      
      return response()->json([
          'status' => true,
          'message' => 'Student record has been deleted successfuly.'
          ]);
    }
}
