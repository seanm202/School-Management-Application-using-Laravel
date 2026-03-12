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
        $batchId=Batch::where('status',1)->select('batchId')->first();
      $students = student::where('students.batchId','=',$batchId->batchId)->get();
      $i=1;
    foreach($students as $student)
        {
          $subjects = Subject::where('subjects.semesterId','=',$student->studentSemester)
                              ->where('subjects.departmentId','=',$student->studentDepartmentId)
                              ->where('subjects.subjectGrade','=',$student->studentGrade)
                              ->where('subjects.batchId','=',$student->batchId)->get();

          foreach($subjects as $subject)
          {
            $studentMark= new StudentMarks;
            $studentMark->userId = $student->userId;
              $studentMark->studentId = $student->studentId;
              $studentMark->classRoomId = $student->studentClassroom;
              $studentMark->subjectId = $subject->subjectId;
              $studentMark->marks = 0;
              $studentMark->status = 3;
              $studentMark->batchId = $batchId->batchId;
              $studentMark->save();
          }
              }
            return redirect()->route('AdminStudent',['id'=>'createMarkEntry']);
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
      $studentMarks->status = 2;
      $studentMarks->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
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
