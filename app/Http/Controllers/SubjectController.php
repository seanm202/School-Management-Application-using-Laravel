<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Subject;
use App\Models\Batch;
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
        ->select('subjectName','torlab','subjectCode','subjectMaxMarks')
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
        $subjects = DB::table('batches')
        ->where('status','=',1)
    ->first()
    ->batchId;
    }

    public function storeSubject(Request $request)
    {

      //Add A Subject
          $validated = $request->validate([

              'semesterId' => ['required'],
              'departmentId' => ['required'],
              'subjectName' => ['required'],
              'torLab' => ['required'],
              'subjectGrade' => ['required'],
              'subjectMaxMarks' => ['required'],
         [
          'semesterId.required'=> 'Semester must be seleted',
          'departmentId.required'=> 'Department must be seleted',
          'subjectName.required'=> 'Subject name must be filled in',
          'subjectGrade.required'=> 'Subject grade must be entered.',
          'subjectMaxMarks.required'=> 'Subject maximum marks must be filled in.',
          'subjectPriority.required'=> 'Default priority is 3 out of 6.'
         ]
          ]);

              $subject = new Subject;
                   $subject->semesterId = $request->semesterId;
                   $subject->departmentId = $request->departmentId;
         $subject->subjectName = $request->subjectName;
         $subject->subjectGrade = $request->subjectGrade;
         $subject->subjectMaxMarks = $request->subjectMaxMarks;
         $subject->subjectTextName = $request->subjectTextName;
         $subject->subjectCode = $request->subjectCode;
         $subject->torlab = $request->torLab;
         $subject->priority = $request->subjectPriority;
         $subject->status = 1;
         $subject->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
         $subject->save();
        $lastInsertedId = $subject->subjectId; 
        
    $classRooms = ClassRoom::where('departmentId', $request->departmentId)
    ->where('semesterId', $request->semesterId)
    ->where('grades', $request->subjectGrade)
    ->get();

foreach ($classRooms as $classRoom) {

    SubjectTeacherForEachSections::updateOrCreate(
        [
            'semesterId'  => $request->semesterId,
            'departmentId'=> $request->departmentId,
            'subjectId'   => $lastInsertedId,
            'classRoomId' => $classRoom->classRoomId,
        ],
        [
            'teacherId' => 1,
            'status'    => 5,
            'batchId'   => 1,
        ]
    );

}



foreach ($classRooms as $classRoom) {

    $students=Student::where('students.studentClassroom','=',$classRoom->classroomDetailId)
        ->where('students.batchId','=',getCurrentBatchId())
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
            'batchId'       => getCurrentBatchId(),
        ]
        );

        }

}

         return response()->json([
         'status' => true,
         'message' => 'Subject created successfully.'
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
    'message' => 'Data Submitted!'
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
      $subject = Subject::where('subjectId', $request->subjectId)->first();
       $subject->delete();
       return redirect()->route('AdminSubject',['id'=>'updateSubject']);
     }
}
