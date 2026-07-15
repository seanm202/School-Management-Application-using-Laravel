<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Hours;
use App\Models\Admin;
use App\Models\Batch;
use App\Models\Days;
use App\Models\DailyTeacherAllocation;
use App\Models\SubjectTeacherForEachSections;
use Illuminate\Http\Request;
use DB;

class DailyTeacherAllocationController extends Controller
{

  //

  public function createDailyAttendanceForAllTeachers(Request $request)
  {
    //Store or add admin
    $teacherCount = 0;
    $adminCount = 0;
    $SubjectTeacherForEachSections = SubjectTeacherForEachSections::all();
    $days = Days::where('dayName', '=', date('l'))->where('status', 63)->select('dayId')->first(); //63 -> Status : Day Active
    $batchId = Batch::where('status', 40)->select('batchId')->first();
    foreach ($SubjectTeacherForEachSections as $SubjectTeacherForEachSection) {

      foreach ($days as $day) {
        $hours = Hours::where('status', '=', 64)->get();
        foreach ($hours as $hour) {
          $dailyTeacherAllocation = DailyTeacherAllocation::updateOrCreate(
            [
              'classRoomId' => $SubjectTeacherForEachSection->classRoomId,
              'teacherId' => $SubjectTeacherForEachSection->teacherId,
              'subjectId' => $SubjectTeacherForEachSection->subjectId,
              'dayId' => $days->dayId,
              'hourId' => $hour->hourId,
              'date' => $request->dateSelected,
              'subjectForSectionId' => $SubjectTeacherForEachSection->subjectId,
              'batchId' => $batchId->batchId,
            ],
            [
              'classRoomId' => $SubjectTeacherForEachSection->classRoomId,
              'teacherId' => $SubjectTeacherForEachSection->teacherId,
              'subjectId' => $SubjectTeacherForEachSection->subjectId,
              'dayId' => $days->dayId,
              'hourId' => $hour->hourId,
              'date' => $request->dateSelected,
              'subjectForSectionId' => $SubjectTeacherForEachSection->subjectId,
              'batchId' => $batchId->batchId,
              'status' => 68,
            ]
          );
          $teacherCount = $teacherCount + 1;
        }
      }
    }

    $admins = Admin::all();
    $days = Days::where('dayName', '=', date('l'))->where('status', 63)->select('dayId')->first();
    $batchId = Batch::where('status', 40)->select('batchId')->first();
    foreach ($admins as $admin) {
      foreach ($days as $day) {
        $hours = Hours::where('status', '=', 64)->get();
        foreach ($hours as $hour) {
          $dailyTeacherAllocation = DailyTeacherAllocation::updateOrCreate(
            [
              'classRoomId' => 0,
              'teacherId' => 2,
              'subjectId' => 0,
              'dayId' => $days->dayId,
              'hourId' => $hour->hourId,
              'date' => $request->dateSelected,
              'subjectForSectionId' => 0,
              'batchId' => $batchId->batchId,
            ],
            [
              'classRoomId' => 0,
              'teacherId' => 2,
              'subjectId' => 0,
              'dayId' => $days->dayId,
              'hourId' => $hour->hourId,
              'date' => $request->dateSelected,
              'subjectForSectionId' => 0,
              'batchId' => $batchId->batchId,
              'status' => 80,
            ]
          );
          $adminCount = $adminCount + 1;
        }
      }
    }

    return response()->json([
      'status' => true,
      'message' => 'Data generated successfully! Teachers : ' . $teacherCount . ' and Admins : ' . $adminCount,
    ]);
  }

  public function createStudentsAttendanceList(Request $request)
  {
    $studentCount = 0;
    $newCount = 0;
    $oldCount = 0;
    $currentDayName = now()->format('l');
    $batchId = Batch::where('status', 40)->select('batchId')->first();
    // StudentSubjectAttendance
    $createdAttendanceLists = DailyTeacherAllocation::join('subject_teacher_for_each_sections', 'subject_teacher_for_each_sections.teacherId', '=', 'daily_Teacher_Allocation.teacherId')
      ->join('teachers', 'teachers.teacherId', '=', 'subject_teacher_for_each_sections.teacherId')
      ->join('hours', 'hours.hourId', '=', 'daily_Teacher_Allocation.hourId')
      ->join('days', 'days.dayId', '=', 'daily_Teacher_Allocation.dayId')
      ->join('class_rooms', 'class_rooms.classroomDetailId', '=', 'daily_Teacher_Allocation.classRoomId')
      ->join('students', 'students.studentClassRoom', '=', 'daily_Teacher_Allocation.classRoomId')
      ->where('days.dayName', '=', $currentDayName)
      ->select('subject_teacher_for_each_sections.*', 'teachers.*', 'hours.*', 'days.*', 'class_rooms.*', 'students.*', 'daily_Teacher_Allocation.*')
      ->get();

    foreach ($createdAttendanceLists as $createdAttendanceList) {
      $attendance = \App\Models\StudentSubjectAttendance::updateOrCreate(
        [
          'classRoomId' => $createdAttendanceList->classroomDetailId,
          'studentId' => $createdAttendanceList->studentId,
          'date' => today(),
          'teacherId' => $createdAttendanceList->teacherId,
          'subjectId' => $createdAttendanceList->subjectId,
          'dayId' => $createdAttendanceList->dayId,
          'hourId' => $createdAttendanceList->hourId,
          'daily_Teacher_AllocationId' => $createdAttendanceList->daily_Teacher_AllocationId,
          'status' => 56,
          'batchId' => $batchId->batchId,
        ],
        [
          'classRoomId' => $createdAttendanceList->classroomDetailId,
          'studentId' => $createdAttendanceList->studentId,
          'date' => today(),
          'teacherId' => $createdAttendanceList->teacherId,
          'subjectId' => $createdAttendanceList->subjectId,
          'dayId' => $createdAttendanceList->dayId,
          'hourId' => $createdAttendanceList->hourId,
          'presentOrAbsent' => 0,
          'daily_Teacher_AllocationId' => $createdAttendanceList->daily_Teacher_AllocationId,
          'status' => 56,
          'batchId' => $batchId->batchId,
        ]
      );
      if ($attendance->wasRecentlyCreated) {
        $newCount = $newCount + 1;
      } else {
        $oldCount = $oldCount + 1;
      }

      $studentCount = $studentCount + 1;
    }
    if ($newCount == 0) {
      return response()->json([
        'status' => true,
        'message' => 'Data already exists!',
      ]);
    }

    return response()->json([
      'status' => true,
      'message' => 'Data generated successfully! Students Total : ' . $studentCount . '. Already existed record count :  ' . $oldCount . ' and newly created record count : ' . $newCount,
    ]);
  }
}
