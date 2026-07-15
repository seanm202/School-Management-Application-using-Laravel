<?php

namespace App\Http\Controllers;

use Response;
use App\Models\ClassRoom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Batch;
use App\Models\Student;
use App\Models\Role;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
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

    public function toGetAStudentClassRoomByAJAX()
    {
        $classrooms = \App\Models\ClassRoom::join('grades', 'grades.gradeId', '=', 'class_rooms.grade')
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
            ->join(
                'teachers',
                'teachers.teacherId',
                '=',
                'class_rooms.classTeacher'
            )
            ->join(
                'users',
                'users.userId',
                '=',
                'teachers.userId'
            )
            ->join(
                'details',
                'details.detailId',
                '=',
                'users.detailsId'
            )
            ->join(
                'batches',
                'batches.batchId',
                '=',
                'class_rooms.batchId'
            )
            ->select(
                'class_rooms.classroomDetailId AS classroomDetailId',
                'class_rooms.roomNo AS roomNo',
                'class_rooms.capacity AS capacity',
                'details.firstname AS teacherFirstName',
                'details.lastname AS teacherLastName',
                'grades.*',
                'sections.*',
                'departments.*',
                'semesters.*',
                'teachers.*',
                'users.*',
                'details.*',
                'batches.*'
            )
            ->where('class_rooms.batchId', '=', (\App\Models\Batch::where('batches.status', '=', 40)->first())->batchId)
            ->get();
        return response()->json($classrooms);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createclassRoom(Request $request)
    {
        $request->validate(
            [
                'grade' => 'required',
                'section' => 'required',
                'classTeacher' => 'required',
                'roomNo' => 'required',
                'departmentId' => 'required',
                'semesterId' => 'required',
                'classCapacity' => 'required',
            ],
            [
                'grade.required' => 'A name must be specified for the grade.',
                'roomNo.required' => 'Please enter the room number.',
                'section.required' => 'A section must be selected.',
                'departmentId.required' => 'A department must be selected.',
                'semesterId.required' => 'A semester must be selected.',
                'classTeacher.required' => 'Class teacher must be selected.',
                'classCapacity.required' => 'Enter current class capacity.',
            ]
        );

        //createClassRoom

        $classRoom = new ClassRoom;
        $classRoom->grade =  $request->grade;
        $classRoom->roomNo =   $request->roomNo;
        $classRoom->section =  $request->section;
        $classRoom->departmentId =   $request->departmentId;
        $classRoom->semester =  $request->semesterId;
        $classRoom->classTeacher =    $request->classTeacher;
        $classRoom->description = $request->classDescription;
        $classRoom->capacity = $request->classCapacity;
        $classRoom->status = 76;
        $classRoom->classTimeTableId = 1; //$request->classTimeTableId ? $request->classTimeTableId;
        $classRoom->batchId = Batch::where('status', 40)->select('batchId')->first()->batchId;
        $classRoom->save();

        return response()->json([
            'status' => true,
            'message' => 'Class created successfully.'
        ]);
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
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show($classroomDetailId)
    {
        //Retrieve details
        $classRoom = ClassRoom::find($classroomDetailId);
        return $classRoom;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */



    public function updateClassroomTeacherAndDescription(Request $request)
    {
        //Update A Classroom
        $classRooms = ClassRoom::where('classroomDetailId', '=', $request->classroomId)->first();
        $classRooms->classTeacher = $request->teacherId;
        $classRooms->description = $request->description;
        $classRooms->save();
        //return redirect()->route('AdminStudent');
        return response()->json([
            'status' => true,
            'message' => 'Data has been updated successfully!'
        ]);
    }


    public function assignClassroomStudent(Request $request)
    {

        //Update A Classroom
        $batch = Batch::where('status', 40)->select('batchId')->first();
        $student = Student::where('students.studentId', '=', $request->studentIdForAssignClassRoom)
            ->where('students.batchId', $batch->batchId)->first();
        $student->studentClassroom = $request->classRoomId;
        $student->status = 29;
        $student->save();
        //return redirect()->route('AdminStudent');
        return response()->json([
            'status' => true,
            'message' => 'Data has been updated successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroyclassRoom(Request $request)
    {
        if ($request->classroomId != 1) {
            $classRoom = ClassRoom::where('classroomDetailId', '=', $request->classroomId)->first();
            $classRoom->delete();
            return response()->json([
                'status' => true,
                'message' => 'ClassRoom Deleted!'
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'This cannot be deleted.'
            ]);
        }
    }
}
