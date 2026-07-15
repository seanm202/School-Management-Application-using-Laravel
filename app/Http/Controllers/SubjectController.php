<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Response;
use App\Models\ClassRoom;
use App\Models\Subject;
use App\Models\Batch;
use App\Models\Student;
use App\Models\StudentMarks;
use App\Models\SubjectTeacherForEachSections;
use App\Models\Role;
use Illuminate\Http\Request;
use Session;
use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $subjects = \App\Models\Subject::all();
      return view("/Admin/subject")->with('subjects',$subjects);
    }
    // public function getSubjects()
    // {
    //   $subjects=subject::all();
    //   return view('Admin/subject')->with(['subjects'=>$subjects]);
    // }
    public function getDepartmentFromGradeForSubject(Request $request)
    {
      $gradeId=$request->gradeId;
      $departmentId=$request->departmentId;
      $semesterId=$request->semesterId;
      $subjectWithSelectedConditions=Subject::where('subjectGrade','=',$gradeId)
                       ->where('subjectDepartment','=',$departmentId)
                       ->where('subjectSemester','=',$semesterId)->get();
Session::put('subjectWithSelectedConditions', $subjectWithSelectedConditions);
      return view('/Admin/subject');
    }

// //////////////////////////////////////////////////////////////////////////////////

    public function getSubCategories($id)
{
        $subjects = DB::table("sub_categories")->where("category_id",$id)->pluck("name","id");
        return json_encode($subcategories);
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

    
    public function getSubjectCategoriesByAJAX()
    {
        //
        $subjectCategorys = DB::table('subjects')
    ->join('departments', 'departments.departmentId', '=', 'subjects.departmentId')
    ->join('semesters', 'semesters.semesterId', '=', 'subjects.semesterId')
    ->join('grades', 'grades.gradeId', '=', 'subjects.subjectGrade')
    ->select(
        'subjects.departmentId',
        'subjects.semesterId',
        'subjects.torlab',
        'grades.grade',
        'grades.gradeId',
        'departments.departmentName',
        'semesters.semesterName'
    )
    ->groupBy(
        'grades.gradeId',
        'subjects.departmentId',
        'subjects.semesterId',
        'subjects.torlab',
        'departments.departmentName',
        'semesters.semesterName'
    )
    ->get();
    return response()->json($subjectCategorys);
    }


    public function getSubjectsList(Request $request)
    {
        //
        $subjectsLists = DB::table('subjects')
        ->select('subjectId','subjectName','torlab','subjectCode','subjectMaxMarks')
    ->where('subjects.subjectGrade','=',$request->gradeId)
    ->where('subjects.departmentId','=',$request->departmentId)
    ->where('subjects.semesterId','=',$request->semesterId)
    ->get();
    return response()->json($subjectsLists);
    }

    public function getSubjectDetailsByAJAX()
    {
        //
        $subjects = DB::table('subjects')
        ->select('subjectName','departmentId','semesterId','subjectMaxMarks')
    ->groupBy('subjects.departmentId','subjects.semesterId','subjects.torlab')
    ->get();
    return response()->json($subjects);
    }

    public function getCurrentBatchId()
    {
        $batch = Batch::where('status',40)->select('batchId')->first()->batchId;
    return $batch;
    }

    public function storeSubject(Request $request)
    {

      //Add A Subject
          $validated = $request->validate([

              'semesterId' => 'required',
              'departmentId' => 'required',
              'subjectName' => 'required',
              'subjectCode' => 'required|unique:subjects,subjectCode',
              'torLab' => 'required',
              'subjectGrade' => 'required',
              'subjectMaxMarks' => 'required',
              'subjectPriority' => 'required',
         ],[
          'semesterId.required'=> 'Semester must be seleted.',
          'departmentId.required'=> 'Department must be seleted.',
          'subjectName.required'=> 'Subject name must be filled in.',
          'subjectCode.required'=> 'Subject code not present.',
          'subjectCode.unique' => 'This subject code already exists.',
          'torLab.required'=> 'Subject type must be selected.',
          'subjectGrade.required'=> 'Subject grade must be entered.',
          'subjectMaxMarks.required'=> 'Subject maximum marks must be filled in.',
          'subjectPriority.required'=> 'Default priority is 3 out of 6.',
         ]
          );

              $subject = Subject::updateOrCreate(
                 [
            'semesterId' => $request->semesterId,
            'departmentId' => $request->departmentId,
            'subjectName' => $request->subjectName,
            'subjectGrade' => $request->subjectGrade,
            'subjectCode' => $request->subjectCode,
        ],
        [

            'semesterId' => $request->semesterId,
            'departmentId' => $request->departmentId,
            'subjectName' => $request->subjectName,
            'subjectGrade' => $request->subjectGrade,
            'subjectCode' => $request->subjectCode,
            'subjectMaxMarks' => $request->subjectMaxMarks,
            'subjectTextName' => $request->subjectTextName,
            'torlab' => $request->torLab,
            'priority' => $request->subjectPriority,
            'status' => 1,
            'batchId' => Batch::where('status',40)->select('batchId')->first()->batchId,
        ]);
        
        $message=[];
        $message[]='Subject has been created successfully.';
        $lastInsertedId = $subject->subjectId; 
        
    $classRooms = ClassRoom::where('departmentId','=', $request->departmentId)
    ->where('semester','=',$request->semesterId)
    ->where('grade', '=', $request->subjectGrade)
    ->get();

foreach ($classRooms as $classRoom) {

    SubjectTeacherForEachSections::updateOrCreate(
        [
            'semesterId'  => $classRoom->semester,
            'departmentId'=> $classRoom->departmentId,
            'subjectId'   => $lastInsertedId,
            'classRoomId' => $classRoom->classroomDetailId,
        ],
        [
            'teacherId' => 1,
            'status'    => 59, // Teacher NOT assigned to this classroom
            'batchId'   => 1,
        ]
    );

}


$batchId=$this->getCurrentBatchId();
foreach ($classRooms as $classRoom) {

    $students=Student::where('students.studentClassroom','=',$classRoom->classroomDetailId)
        ->where('students.batchId','=',$batchId)
        ->get();
        foreach ($students as $student) {

            StudentMarks::updateOrCreate(
            [
            'studentId'     => $student->studentId,
            'classRoomId'   => $classRoom->classroomDetailId,
            'subjectId'     => $lastInsertedId,
        ],
        [
            'studentId'     => $student->studentId,
            'classRoomId'   => $classRoom->classroomDetailId,
            'subjectId'     => $lastInsertedId,
            'userId'        => $student->userId,
            'marks'         =>   0,
            'status'        => 5,
            'batchId'       => $this->getCurrentBatchId(),
        ]
        );

        }

}
        $this->generateSubjectsDataForClassroom();
        $message[]='Subject data has been created successfully.';

         return response()->json([
         'status' => true,
         'message' => $message
         ]);
    }

    
    public function generateSubjectsDataForClassroom()
        {
            $batchId = \App\Models\Batch::where('status','=',40)->first()->batchId;
            $classRooms=\App\Models\ClassRoom::all();
            foreach($classRooms as $classRoom)
                {
                    $classRoomId=$classRoom->classroomDetailId;
                    $grade=$classRoom->grade;
                    $section=$classRoom->section;
                    $department=$classRoom->departmentId;
                    $semester=$classRoom->semester;
                    $subjects=Subject::where('subjectGrade','=',$grade)
                        ->where('semesterId','=',$semester)
                        ->where('departmentId','=',$department)
                        ->where('batchId','=',$batchId)
                        ->get();

                    foreach($subjects as $subject)
                        {
                            \App\Models\SubjectTeacherForEachSections::updateOrCreate(
        [   
           'teacherId' => 1,
            'classRoomId' => $classRoomId,
            'subjectId' => $subject->subjectId,
            'departmentId' => $department,
            'semesterId' => $semester,
        ],
        [
           'teacherId' => 1,
            'classRoomId' => $classRoomId,
            'subjectId' => $subject->subjectId,
            'departmentId' => $department,
            'semesterId' => $semester,
            'status' => 77,
            'batchId' => $batchId,
        ]
        );
                        }


                }


             return response()->json([
        'status' => true,
        'message' => 'Subject Data has been generated.'
    ]);   
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
      ////
      $subjects=Subject::all();
      return $subjects;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
      //get old values
      $subject = Subject::where('subjectId', $subject->subjectId)
             ->get();
             return 1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function updatesubject(Request $request)
    {
      $validated = $request->validate([

        'semesterId' => ['required'],
        'departmentId' => ['required'],
        'subjectName' => ['required'],
        'subjectGrade' => ['required'],
        'theoryOrlab' => ['required'],
        'subjectMaxMarks' => ['required', 'numeric'],
        'subjectPriority.required'=> 'Default priority is 3 out of 6.',
   [
    'semesterId.required'=> 'Semester must be seleted',
    'departmentId.required'=> 'Department must be seleted',
    'subjectName.required'=> 'Subject name must be filled in',
    'subjectGrade.required'=> 'Subject grade must be entered.',
    'subjectMaxMarks.required'=> 'Subject maximum marks must be filled in.',
    'subjectMaxMarks.numeric'=> 'Subject maximum marks should be numeric',
    'subjectPriority.required'=> 'Default priority is 3 out of 6.'
   ]
    ]);
      $subject = Subject::where('subjectId',$request->subjectId)->first();
    $subject->semesterId =$request->semesterId;
    $subject->departmentId = $request->departmentId;
    $subject->subjectName = $request->subjectName;
    $subject->subjectGrade = $request->subjectGrade;
    $subject->subjectMaxMarks = $request->subjectMaxMarks;
    $subject->subjectTextName = $request->subjectTextName;
    $subject->torlab = $request->theoryOrlab;
    $subject->priority = $request->subjectPriority;
    $subject->save();
    return response()->json([
    'status' => true,
    'message' => 'Subject data has been updated succesfully!'
    ]);
    }


    // To check whether the entity ,here student, is still being used in the system.
    public function checkSubjectIdForLink($subjectId)
    {
      $messages=[];
      $subject = Subject::where('subjectId','=', $subjectId)->first();

      $checkInStudentMarks = StudentMarks::where('subjectId','=', $subjectId)->first();
      if($checkInStudentMarks)
        {
            $messages[]='Subject\'s Id is still in the Student Marks table.Please check the details.';
        }

      $checkInSubjectTeacherForEachSections = SubjectTeacherForEachSections::where('subjectId','=', $subjectId)->first();
      if($checkInSubjectTeacherForEachSections)
        {
            $messages[]='Subject\'s Id is still in the Subject Teacher For Each Sections table.Please check the details.';
        }


      return response()->json([
    'status' => true,
    'message' => $messages,
]);

    }

    public function updateSubjectName(Request $request)
    {
      $subject = Subject::where('subjectId','=',$request->subjectId)->first();
      $subject->subjectName = $request->subjectName;
      $subject->save();
      return response()->json([
        'status' => true,
        'message' => "Subject Name updated successfully to ".$request->subjectName,
    ]);
    }
    
    public function updateSubjectDetails(Request $request)
    {
      $subject = Subject::where('subjectId','=',$request->subjectId)->first();
      $subject->subjectName = $request->subjectName;
      $subject->subjectCode = $request->subjectCode;
      $subject->torlab = $request->torLab;
      $subject->subjectMaxMarks = $request->subjectMaxMarks;
      $subject->save();
      return response()->json([
        'status' => true,
        'message' => "Subject Name updated successfully".$request->subjectName,
    ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
     public function destroysubject(Request $request)
     {
       //Delete Subject
        if($request->subjectId!=1)
       {$subject = Subject::where('subjectId','=',$request->subjectId)->first();
       $subject->delete();
       
    return response()->json([
    'status' => true,
    'message' => 'Subject has been deleted succesfully!'
    ]);
     }
     else
        {
             return response()->json([
            'status' => true,
            'message' => 'This cannot be deleted.'
            ]);
        }
     }
}
