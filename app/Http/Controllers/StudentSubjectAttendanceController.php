<?php

namespace App\Http\Controllers;

use Response;
use App\Models\StudentSubjectAttendance;
use App\Models\Student;
use App\Models\Batch;
use App\Models\Days;
use App\Models\Detail;
use App\Models\DailyTeacherAllocation;
use App\Models\Hours;
use Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentSubjectAttendanceController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function markStudentEachAttendance(Request $reqeust)
  {
    $userId = 0;
    $StudentSubjectAttendance = StudentSubjectAttendance::where('id', '=', $reqeust->id)->first();
    $StudentSubjectAttendance->presentOrAbsent = $reqeust->status;
    $StudentSubjectAttendance->created_at = now();
    // $StudentSubjectAttendance->status=66;
    $StudentSubjectAttendance->updated_at = now();
    $StudentSubjectAttendance->save();

    $StudentSubjectAttendance = StudentSubjectAttendance::where('id', '=', $reqeust->id)->first();
    $studentId = $StudentSubjectAttendance->studentId;
    $students = Student::where('studentId', '=', $studentId)->first();
    $userId = $students->userId;
    $studentDetails = Detail::where('userId', '=', $userId)->first();
    $fullName = $studentDetails->sal . " " . $studentDetails->firstname . " " . $studentDetails->lastname;

    if ($reqeust->status == 0) {
      return response()->json([
        'status' => true,
        'message' => $fullName . ' Marked Absent.'
      ]);
    } else {
      return response()->json([
        'status' => true,
        'message' => $fullName . ' Marked Present.'
      ]);
    }
  }

  public function storestudentSubjectAttendance(Request $request)
  {
    $dailyTeacherAllocations = DailyTeacherAllocation::where('daily_Teacher_AllocationId', '=', $request->dailyTeacherAllocationId)->first();
    $dailyTeacherAllocations->status = 2;
    $dailyTeacherAllocations->save();

    $students = Student::all();
    $dateId = $request->dateId;

    $hoursId = $request->hourId;

    $subjectId = $request->subjectId;
    $classRoomId = $request->classRoomId;
    $teacherId = $request->teacherId;
    foreach ($students as $student) {
      $StudentSubjectAttendanceController = new StudentSubjectAttendance;
      $StudentSubjectAttendanceController->studentId = $student->studentId;
      $StudentSubjectAttendanceController->dayId = $request->dayId;
      $StudentSubjectAttendanceController->hourId = $hoursId;
      $StudentSubjectAttendanceController->subjectId = $subjectId;
      $StudentSubjectAttendanceController->classRoomId = $classRoomId;
      $StudentSubjectAttendanceController->teacherId = $teacherId;
      $StudentSubjectAttendanceController->presentOrAbsent = 0;
      $StudentSubjectAttendanceController->submitted = 0;
      $StudentSubjectAttendanceController->status = 0;
      $StudentSubjectAttendanceController->dailyTeacherAllocationId = $request->dailyTeacherAllocationId;
      $StudentSubjectAttendanceController->batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
      $StudentSubjectAttendanceController->save();
      // $StudentSubjectAttendanceController->insertOrIgnore();
    }
    return redirect()->route('TeacherAttendance', ['id' => 'createTeacherTimetableForTheParticularHour']);
  }

  public function getStudentsAttendanceList()
  {
    $userId = Auth::id();

    $currentHourClasswiseAttendanceLists = StudentSubjectAttendance::join('teachers', 'teachers.teacherId', '=', 'student_subject_attendances.teacherId')
      ->join('subject_teacher_for_each_sections', 'subject_teacher_for_each_sections.teacherId', '=', 'student_subject_attendances.teacherId')
      ->join('students', 'students.studentId', '=', 'student_subject_attendances.studentId')
      ->join('class_rooms', 'class_rooms.classroomDetailId', '=', 'student_subject_attendances.classRoomId')
      ->join('hours', 'hours.hourId', '=', 'student_subject_attendances.hourId')
      ->join('days', 'days.dayId', '=', 'student_subject_attendances.dayId')
      ->join('details', 'details.userId', '=', 'students.userId')
      ->join('subjects', 'subjects.subjectId', '=', 'student_subject_attendances.subjectId')
      ->where('teachers.userId', '=', $userId)
      ->where('student_subject_attendances.status', '=', 56)
      ->whereDate('student_subject_attendances.date', '=', today())
      ->whereRaw("CURRENT_TIME() >= hourStartingTime")
      ->whereRaw("CURRENT_TIME() <= hourEndingTime")
      ->select(
        'days.dayName AS dayName',
        'student_subject_attendances.id AS atid',
        'student_subject_attendances.date AS date',
        'student_subject_attendances.status AS status',
        'student_subject_attendances.presentOrAbsent AS presentOrAbsent',
        'class_rooms.classroomDetailId AS classroomDetailId',
        'students.studentId AS studentId',
        'hours.hourStartingTime AS hourStartingTime',
        'hours.hourEndingTime AS hourEndingTime',
        'subjects.subjectName AS subjectName',
        'details.sal AS sal',
        'details.firstName AS firstName',
        'details.lastName AS lastName',
      )
      ->get();

    return response()->json($currentHourClasswiseAttendanceLists);
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


  public function getDataForOfTodaysAbsentees()
  {
    $todaysAbsentees = StudentSubjectAttendance::join('students', 'students.studentId', '=', 'student_subject_attendances.studentId')
      ->join('details', 'details.userId', '=', 'students.userId')
      ->join('days', 'days.dayId', '=', 'student_subject_attendances.dayId')
      ->join('hours', 'hours.hourId', '=', 'student_subject_attendances.hourId')
      ->join('subjects', 'subjects.subjectId', '=', 'student_subject_attendances.subjectId')
      ->where('student_subject_attendances.presentOrAbsent', '=', 0)
      ->where('student_subject_attendances.date', date('Y-m-d'))
      ->select('students.*', 'details.*', 'days.*', 'hours.*', 'subjects.*', 'student_subject_attendances.*')
      ->get();
    return response()->json($todaysAbsentees);
  }

  public function getDataForOfAbsenteesOnDate(Request $request)
  {
    $todaysAbsentees = StudentSubjectAttendance::join('students', 'students.studentId', '=', 'student_subject_attendances.studentId')
      ->join('details', 'details.userId', '=', 'students.userId')
      ->join('days', 'days.dayId', '=', 'student_subject_attendances.dayId')
      ->join('hours', 'hours.hourId', '=', 'student_subject_attendances.hourId')
      ->join('subjects', 'subjects.subjectId', '=', 'student_subject_attendances.subjectId')
      ->where('student_subject_attendances.presentOrAbsent', '=', 0)
      ->where('student_subject_attendances.date', $request->dateOfAbsent)
      ->select('students.*', 'details.*', 'days.*', 'hours.*', 'subjects.*', 'student_subject_attendances.*')
      ->get();
    return response()->json($todaysAbsentees);
  }


  public function getDataForOfAbsenteesOnBetweenDates(Request $request)
  {
    $betweenDateAbsentees = StudentSubjectAttendance::join('students', 'students.studentId', '=', 'student_subject_attendances.studentId')
      ->join('details', 'details.userId', '=', 'students.userId')
      ->join('days', 'days.dayId', '=', 'student_subject_attendances.dayId')
      ->join('hours', 'hours.hourId', '=', 'student_subject_attendances.hourId')
      ->join('subjects', 'subjects.subjectId', '=', 'student_subject_attendances.subjectId')
      ->where('student_subject_attendances.presentOrAbsent', '=', 0)
      ->whereBetween('student_subject_attendances.date', [
        $request->firstDateOfAbsent,
        $request->lastDateOfAbsent
      ])
      ->select('students.*', 'details.*', 'days.*', 'hours.*', 'subjects.*', 'student_subject_attendances.*')
      ->get();
    return response()->json($betweenDateAbsentees);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\StudentSubjectAttendance  $studentSubjectAttendance
   * @return \Illuminate\Http\Response
   */
  public function show(StudentSubjectAttendance $studentSubjectAttendance)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\StudentSubjectAttendance  $studentSubjectAttendance
   * @return \Illuminate\Http\Response
   */
  public function edit(StudentSubjectAttendance $studentSubjectAttendance)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\StudentSubjectAttendance  $studentSubjectAttendance
   * @return \Illuminate\Http\Response
   */

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\StudentSubjectAttendance  $studentSubjectAttendance
   * @return \Illuminate\Http\Response
   */
  public function destroy(StudentSubjectAttendance $studentSubjectAttendance)
  {
    //
  }
}
