<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Role;
use App\Models\StudentMarks;
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Http\Controllers\DomPdfController;

class StudentMarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMarkEntry(Request $request)
    {
        $batchId=Batch::where('status','=',40)->select('batchId')->first();
      $students = student::where('students.batchId','=',$batchId->batchId)
      ->where('students.studentId','!=',1)  
      ->get();
      $i=1;
      $createdCount=0;
      $existingCount=0;
    foreach($students as $student)
        {
          $subjects = Subject::where('subjects.semesterId','=',$student->studentSemester)
                              ->where('subjects.departmentId','=',$student->studentDepartmentId)
                              ->where('subjects.subjectGrade','=',$student->studentGrade)
                              ->where('subjects.batchId','=',$student->batchId)->get();

          foreach($subjects as $subject)
          {
              $studentMark=StudentMarks::updateOrCreate(
            [
            'studentId'  => $student->studentId,
            'subjectId'   => $subject->subjectId,
            'classRoomId' => $student->studentClassroom,
        ],
        [
            'userId' => $student->userId,
            'studentId' => $student->studentId,
            'subjectId'    => $subject->subjectId,
            'classRoomId'   => $student->studentClassroom,
            'marks' => 0,
            'status'    => 8,
            'batchId'   => $batchId->batchId
        ]
        );
        if ($studentMark->wasRecentlyCreated) {
                $createdCount++;
            } else {
                $existingCount++;
            }
          }
              }
          $message='Updated entries : '.$existingCount.' A count of : '.$createdCount.' marklists has been created successfully!';
            return response()->json([
         'status' => true,
         'message' =>  $message
         ]);
    }

    public function getCurrentBatch()
    {
      $batches= Batch::where('status','=',40)->first();
      $currentBatchId= $batches->batchId;
      return $currentBatchId;
    }
    public function getSubjectsListForAddingStudentMarks(Request $request)
    {
      $batches= Batch::where('status','=',40)->first();
      $currentBatchId= $batches->batchId;
        $subjectsLists=StudentMarks::join('subjects','subjects.subjectId','=','student_marks.subjectId')
        ->where('student_marks.batchId','=',$currentBatchId)
        ->where('student_marks.studentId','=',$request->studentId)
        ->select('subjects.subjectName AS subjectName',
        'subjects.subjectCode AS subjectCode',
        'student_marks.subjectId AS subjectId',
        'subjects.subjectMaxMarks AS MaxMarks',
        'student_marks.studentId AS studentId',
        'student_marks.student_marksId AS student_marksId',
        'student_marks.marks AS marks')
        ->get();
        
      return response()->json($subjectsLists);
    }
    public function getStudentsListToAddMarks()
    {
      $currentBatchId=$this->getCurrentBatch();
      $studentsMarks = StudentMarks::join('students','students.studentId','=','student_marks.studentId')
                      ->join('class_rooms','class_rooms.classroomDetailId','=','student_marks.classRoomId')
                      ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                      ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                      ->join('sections','sections.sectionId','=','class_rooms.section')
                      ->join('grades','grades.gradeId','=','class_rooms.grade')
                      ->join('details','details.userId','=','student_marks.userId')
                      ->select(
                        'student_marks.student_marksId AS student_marksId',
                        'students.studentId AS studentId',
                        'details.userId AS userId',
                        'details.sal AS sal',
                        'details.firstName AS firstName',
                        'details.lastName AS lastName',
                        'semesters.semesterName AS semesterName',
                        'semesters.semesterId AS semesterId',
                        'departments.departmentName AS departmentName',
                        'departments.departmentId AS departmentId',
                        'grades.grade AS gradeName',
                        'grades.gradeId AS gradeId',
                        'sections.sectionName AS sectionName',
                        'sections.sectionId AS sectionId'
                      )
                    ->where('student_marks.batchId','=',$currentBatchId)
                    ->get();
      return response()->json($studentsMarks);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $studentMarks = new StudentMarks;

      $studentMarks->userId = $request->userId;
      $studentMarks->studentId = $request->studentId;
      $studentMarks->classRoomId = $request->classroomDetailId;
      $studentMarks->subjectId =  $request->subjectId;
      $studentMarks->marks = $request->subjectMarks;
      $studentMarks->status = 9;
      $studentMarks->batchId=Batch::where('status',40)->select('batchId')->first()->batchId;
      $studentMarks->save();
      return redirect()->route('AdminStudent');
    }

   public function printMarksheetStudentByAdmin(Request $request)
   {
     $studentId=$request->studentId;
     \App\Http\Controllers\DomPdfController::getPdf($studentId);
     return redirect()->route('AdminStudent');
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
     * @param  \App\Models\StudentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function show(StudentMarks $studentMarks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentMarks $studentMarks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

      $inputs = $request->input('student_marksId');


          foreach($inputs as $key => $value) {
        $studentMarks = StudentMarks::where('student_marksId','=',$request->student_marksId[$key])->first();
          $studentMarks->marks=$request->input('subjectMark')[$key];
          $studentMarks->save();
          }

      return redirect()->route('AdminStudent',['id'=>'adminStudentAddStudentMarks']);
    }

   public function deleteMarkEntry(Request $request)
   {

     $studentMarks = StudentMarks::where('student_marksId','=',$request->subjectMarkIdDelete)->first();
         $studentMarks->delete();
      return redirect()->route('AdminStudent',['id'=>'adminStudentAddStudentMarks']);
   }

    public function updateMarksTeacher(Request $request, studentMarks $studentMarks)
    {

      $inputs = $request->input('student_marksId');


          foreach($inputs as $key => $value) {
        $studentMarks = StudentMarks::where('student_marksId','=',$request->student_marksId[$key])->first();
          $studentMarks->marks=$request->input('subjectMark')[$key];
          $studentMarks->save();
          }

      return redirect()->route('TeacherStudent',['id'=>'teacherStudentAddStudentMarks']);
    }

    public function submitSubjectMarks(Request $request)
    {
      $studentMarkDetails=StudentMarks::where('student_marksId','=',$request->student_marksId)->first();
      $studentMarkDetails->marks=$request->marksObtained;
      $studentMarkDetails->save();
       
      return response()->json([
    'status' => true,
    'message' => "Mark Updated",
]);

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentMarks  $studentMarks
     * @return \Illuminate\Http\Response
     */
     public function destroy(StudentMarks $studentMark)
     {
       //Delete self - admin
       $studentMark = StudentMarks::where('student_marksId','=',$studentMark->student_marksId);
       $studentMark->delete();
       return redirect()->route('AdminStudent');
     }
}
