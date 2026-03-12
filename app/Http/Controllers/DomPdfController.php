<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Student;
use App\Models\StudentMarks;
use Illuminate\Http\Request;

class DomPdfController extends Controller
{
    public static function getPdf($studentId)
    {
      $studentDetails=\App\Models\Student::join('details','details.detailId','=','students.studentDetailsId')
                              ->where('studentId','=',$studentId)
                              ->select('details.sal AS sal',
                              'details.firstname AS firstName',
                              'details.lastname AS lastName',
                              'details.age AS age',
                              'details.dob AS dob')
                              ->first();
      $studentId=4;
      $getStudentMarkData=\App\Models\StudentMarks::join('subjects','subjects.subjectId','=','student_marks.subjectId')
                      ->join('students','students.studentId','=','student_marks.studentId')
                      ->join('class_rooms','class_rooms.classroomDetailId','=','student_marks.classroomId')
                      ->join('sections','sections.sectionId','=','class_rooms.section')
                      ->join('details','details.detailId','=','students.studentDetailsId')
                      ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                      ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                      ->join('grades','grades.gradeId','=','class_rooms.grade')
                      ->where('student_marks.studentId','=',$studentId)
                      ->select('subjects.subjectName AS subjectName',
                      'departments.departmentName AS departmentName',
                      'details.sal AS sal',
                      'details.firstname AS firstName',
                      'details.lastname AS lastName',
                      'details.age AS age',
                      'details.dob AS dob',
                      'semesters.semesterName AS semesterName',
                      'sections.sectionName AS sectionName',
                      'subjects.subjectName AS subjectName',
                      'subjects.subjectCode AS subjectCode',
                      'subjects.subjectMaxMarks AS subjectMaxMarks',
                      'student_marks.marks AS marks',
                      'grades.grade AS gradeName')
                      ->get();
      $data=[
        'studentDetails' => $studentDetails,
        'studentMarks' => $getStudentMarkData
                      ];

      $pdf=PDF::loadView('Admin.printMarksheetPDF',$data)->setOptions(['defaultFont' => 'sans-serif']);
      return $pdf->download('Magecomp.pdf');
    }

}
