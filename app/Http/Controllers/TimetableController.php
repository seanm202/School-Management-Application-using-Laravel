<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use App\Models\Hours;
use App\Models\Hays;
use App\Models\Hubject;
use App\Models\Heacher;
use App\Models\Hlassrooms;
use App\Models\Hection;
use App\Models\Priority;
use App\Models\SubjectTeacherForEachSections;
use Illuminate\Http\Request;

class TimetableController extends Controller
{


  public function repeatingPossibilities($teacherId,$oddOrEven)
  {
    $oddOrEvenSemesters=$oddOrEven;
    $days=Days::all();
    $hours=Hours::all();
    foreach($days as $day)
    {
      $dayIdOne=$day->dayId;
      foreach($hours as $hour)
      {
        $hourIdOne=$hour->hourId;
    if($oddOrEvenSemesters==1)
    {
        $teacherRandomCount=Timetable::where('dayId','=',$dayIdOne)
                                              ->where('hourId','=',$hourIdOne)
                                              ->where('teacherId','=',$teacherId)
                                              ->whereIn('semesterId', [1,3,5,7])
                                              ->get();
    }
    else {

          $teacherRandomCount=Timetable::where('dayId','=',$dayIdOne)
                                                ->where('hourId','=',$hourIdOne)
                                                ->where('teacherId','=',$teacherId)
                                                ->whereIn('semesterId', [2,4,6,8])
                                                ->get();
    }
  }

      $teacherRandomnessCount=count($teacherRandomCount);
      if($teacherRandomnessCount>1)
      {
        return 1;
      }
      else {
        return 0;
      }
}
return;

  }


  public function distinctTeacherId()
  {
    $distinctTeacherIds=SubjectTeacherForEachSections::distinct('teacherId')
                                              ->get();
    return $distinctTeacherIds;
  }
  public function distinctClassroomIdOfATeacher($teacherId)
  {
    $distinctClassroomIdOfThisTeacher=SubjectTeacherForEachSections::where('teacherId','=',$teacherId)
                                                  ->distinct('classRoomId')
                                                  ->select('classRoomId')
                                                  ->get();
    return $distinctClassroomIdOfThisTeacher;
  }
  public function distinctSemesterIdOfATeacher($teacherId,$oddOrEvenSemesters)
  {
    if($oddOrEvenSemesters==1)
    {
        $distinctSemesterIdOfATeacher=SubjectTeacherForEachSections::where('teacherId','=',$teacherId)
                                                      ->distinct('semesterId')
                                                      ->select('semesterId')
                                                      ->whereIn('semesterId', [1,3,5,7])
                                                      ->get();
    }
    else {

          $distinctSemesterIdOfATeacher=SubjectTeacherForEachSections::where('teacherId','=',$teacherId)
                                                        ->distinct('semesterId')
                                                        ->select('semesterId')
                                                        ->whereIn('semesterId', [2,4,6,8])
                                                        ->get();
    }

    return $distinctSemesterIdOfATeacher;
  }
  public function distinctSubjectIdOfATeacher($teacherId)
  {
    $distinctSubjectIdOfATeacher=SubjectTeacherForEachSections::where('teacherId','=',$teacherId)
                                                  ->distinct('subjectId')
                                                  ->select('subjectId')
                                                  ->get();
    return $distinctSubjectIdOfATeacher;
  }





    public function perSubjectMoreThanOneClassChecks()
    {
      $perSubjectMoreThanOneClassChecks=Timetable::join('teachers','teachers.teacherId','=','timetables.teacherId')
                            ->join('hours','hours.classroomDetailId','=','timetables.hourId')
                            ->join('days','days.dayId','=','timetables.dayId')
                            ->join('class_rooms','class_rooms.classroomDetailId','=','timetables.classroomId')
                            ->groupBy('timetables.dayId')
                            ->groupBy('timetables.hourId')
                            ->select('count(timetables.timetableId) AS perSubjectMoreThanOneClassCheck')
                            ->get();

      foreach($perSubjectMoreThanOneClassChecks as $perSubjectMoreThanOneClassCheck)
      {
        if($perSubjectMoreThanOneClassCheck->perSubjectMoreThanOneClassCheck>1)
        {
          return 1;
        }
        else {
          return 0;
        }
      }
      return 0;
    }



  public function regenerateTimetable()
  {
    $priorityOfSubjects = Subjects::join('priority','priority.priorityId','=','subjects.priority')
                          ->select('priority.priorityValue AS priorityValue')
                          ->select('subjects.subjectId AS subjectId')->get();
    $timetables=Timetable::join('subjects','subjects.priority','=','timetables.subjectId')
                          ->join('class_rooms','class_rooms.classroomDetailId','=','timetables.classRoomId')
                          ->groupBy('timetables.classRoomId')
                          ->groupBy('timetables.subjectId')
                          ->select('count(timetables.timetableId) AS perSubjectPerClassCount')
                          ->select('subjects.subjectId AS subjectId')
                          ->get();
    foreach($priorityOfSubjects as $priorityOfSubject)
    {
      if($priorityOfSubject->subjectId==$timetables->subjectId)
      {
        if($priorityOfSubject->priorityValue>$timetables->perSubjectPerClassCount)
        {
          return 1;
        }
        else {
          continue;
        }
      }
    }
    return 0;
  }





  public function generateTimetable(Request $request)
  {
    $timetableToDelete=TimeTable::where('oddOrEven','=',$request->oddOrEven);
    $timetableToDelete->delete();
    $days=Days::all();
    $hours=Hours::all();
    for($i=0;$i<7;$i++)
    {
      $l=1;
    foreach($days as $day)
    {
        foreach($hours as $hour)
        {
          foreach(($teachers=TimetableController::distinctTeacherId()) as $teacher)
          {
            foreach(($classrooms=TimetableController::distinctClassroomIdOfATeacher($teacher->teacherId)) as $classroom)
            {
              foreach(($distinctSemesterIdOfATeachers=TimetableController::distinctSemesterIdOfATeacher($teacher->teacherId,$request->oddOrEven)) as $distinctSemesterIdOfATeacher)
              {
                foreach(($distinctSubjectsOfTeachers = TimetableController::distinctSubjectIdOfATeacher($teacher->teacherId)) as $distinctSubjectsOfTeacher)
                {
                $timetables =    new Timetable;
                $timetables->dayId =   $day->dayId;
                $timetables->hourId =   $hour->hourId;
                $timetables->classroomId =   $classroom->classRoomId;
                $timetables->oddOrEven =   $request->oddOrEven;
                $timetables->semesterId =    $distinctSemesterIdOfATeacher->semesterId;
                $timetables->teacherId =   $teacher->teacherId;
                $timetables->subjectId =   $distinctSubjectsOfTeacher->subjectId;
                $timetables->save();
              }
            }
            }
            if(TimetableController::repeatingPossibilities($teacher->teacherId,$request->oddOrEven)==1)
            {
              $l=0;
              $timetables=\App\Models\Timetable::all();
              foreach($timetables as $timetable)
              {
                $timetable->delete();
              }
              break;
            }
        }
        if((regenerateTimetable()==1)||(perSubjectMoreThanOneClassChecks()==1))
        {
          $i=$i-2;
        }
        else {
          continue;
        }
        if($l==0)
        {
          break;
        }
        }

        if($l==0)
        {
          break;
        }
    }

    if($l==0)
    {
      $i=0;
    }

  }
  }


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
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function show(Timetable $timetable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function edit(Timetable $timetable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timetable $timetable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timetable  $timetable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timetable $timetable)
    {
        //
        $timetable = Timetable::where('timetableId','=',$timetable->timetableId);
        $timetable->delete();
    }
}
