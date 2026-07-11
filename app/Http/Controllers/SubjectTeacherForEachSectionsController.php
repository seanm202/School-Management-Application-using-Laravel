<?php

namespace App\Http\Controllers;

use Response;
use DB;
use App\Models\SubjectTeacherForEachSections;
use App\Models\Batch;
use App\Models\Role;
use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Redirect;

class SubjectTeacherForEachSectionsController extends Controller
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
    public function getDetailsOfSubjectTeacherForEachSections()
    {
      $SubjectTeacherForEachSections = \App\Models\SubjectTeacherForEachSections::all();
      return view("/Admin/subjectTeachersForEachSection")->with('SubjectTeacherForEachSections',$SubjectTeacherForEachSections);
    }
    
    public function getListOfTeachers()
    {
        $subjectTeacherForEachSections = \App\Models\Teacher::join('details','details.detailId','=','teachers.teacherDetailId')
        ->select('teachers.teacherId AS teacherId','details.firstName AS firstName',
            'details.lastName AS lastName')
        ->get();

        return response()->json($subjectTeacherForEachSections);
    }
    
public function reAssignTeacher(Request $request)
{
   $subjectTeacherForEachSection = SubjectTeacherForEachSections::where(
    'subjectForSectionId','=',
    $request->subjectForSectionId
)->first(); 

    $subjectTeacherForEachSection->teacherId = $request->teacherId;
    $subjectTeacherForEachSection->save();

       return response()->json([
        'status' => true,
        'message' => 'Teacher has been re-assigned!'
    ]);

}



public function assignTeacher(Request $request)
     {

        SubjectTeacherForEachSections::updateOrCreate(
        [   
            'teacherId' => $request->teacherId,
            'semesterId' => $request->semesterId,
            'departmentId' => $request->departmentId,
            'subjectId' => $request->subjectId,
            'classRoomId' => $request->classRoomId,
        ],
        [
           'teacherId' => $request->teacherId,
            'semesterId' => $request->semesterId,
            'departmentId' => $request->departmentId,
            'subjectId' => $request->subjectId,
            'classRoomId' => $request->classRoomId,
            'status' => 3,
            'batchId' => Batch::where('status',40)->select('batchId')->first()->batchId,
        ]
        );


                return response()->json([
        'status' => true,
        'message' => 'Teacher has been assigned!'
    ]);
     }

    public function getSubjectsForClassroomForAssigningTeachers(Request $request)
    {

        $classRoomDetailId = $request->classRoomDetailId;
        // $classRoomDetailId = $request->classRoomDetailId;
        // $classRoomDetailId = $request->classRoomDetailId;
        $classRoomSubjectsForAssigningTeachers = \App\Models\SubjectTeacherForEachSections::join('subjects','subjects.subjectId','=','subject_teacher_for_each_sections.subjectId')
        ->join('class_rooms','class_rooms.classroomDetailId','=','subject_teacher_for_each_sections.classRoomId')
        ->join('teachers','teachers.teacherId','=','subject_teacher_for_each_sections.teacherId')
        ->join('details','details.userId','=','teachers.userId')
        ->join('grades','grades.gradeId','=','class_rooms.grade')
        ->join('semesters','semesters.semesterId','=','class_rooms.semester')
        ->join('departments','departments.departmentId','=','class_rooms.departmentId')
        ->join('sections','sections.sectionId','=','class_rooms.section')
        ->where('subject_teacher_for_each_sections.classRoomId', $classRoomDetailId)
        ->select('class_rooms.classroomDetailId AS classRoomId','semesters.semesterId AS semesterId','departments.departmentId AS departmentId',
        'subjects.subjectName AS subjectName','subjects.subjectCode AS subjectCode','subjects.subjectId AS subjectId',
        'details.firstName AS teacherFirstName','details.lastName AS teacherLastName',
        'grades.gradeId AS gradeId','grades.grade AS gradeName','sections.sectionName AS sectionName'
        )
        ->get();
    //     $classRoomSubjectsForAssigningTeachers = \App\Models\Subject::join(
    //     'grades',
    //     'grades.gradeId',
    //     '=',
    //     'subjects.subjectGrade'
    // )
    // ->join(
    //     'departments',
    //     'departments.departmentId',
    //     '=',
    //     'subjects.departmentId'
    // )
    // ->join(
    //     'subject_teacher_for_each_sections',
    //     'subject_teacher_for_each_sections.subjectId',
    //     '=',
    //     'subjects.subjectId'
    // )
    // ->join(
    //     'semesters',
    //     'semesters.semesterId',
    //     '=',
    //     'subjects.semesterId'
    // )
    // ->join(
    //     'teachers',
    //     'teachers.teacherId',
    //     '=',
    //     'subject_teacher_for_each_sections.teacherId'
    // )
    // ->join(
    //     'details',
    //     'details.userId',
    //     '=',
    //     'teachers.userId'
    // )
    // ->join(
    //     'class_rooms',
    //     'class_rooms.grade',
    //     '=',
    //     'grades.gradeId'
    // )
    // ->join(
    //     'sections',
    //     'sections.sectionId',
    //     '=',
    //     'class_rooms.section'
    // )
    // ->where('subject_teacher_for_each_sections.teacherId','=','teachers.teacherId')
    // ->where('class_rooms.classroomDetailId', $classRoomDetailId)
    // ->select(
    //     'grades.grade AS gradeName',
    //     'grades.gradeId AS gradeId',
    //     'sections.sectionName AS sectionName',
    //     'subjects.subjectName AS subjectName',
    //     'subjects.subjectId AS subjectId',
    //     'subjects.subjectCode AS subjectCode',
    //     'class_rooms.classroomDetailId AS classRoomId',
    //     'semesters.semesterId AS semesterId',
    //     'departments.departmentId AS departmentId',
    //     'details.firstName AS firstName',
    //     'details.lastName AS lastName'
    // )
    // ->get();
        return response()->json($classRoomSubjectsForAssigningTeachers);
    }

    
    public function getSubjectsForClassroomForAssignedTeachers(Request $request)
    {
        $classRoomDetailId = $request->input('classRoomDetailId');
        $classRoomsForAssignedTeachers = \App\Models\SubjectTeacherForEachSections::join('class_rooms','class_rooms.classroomDetailId','=','subject_teacher_for_each_sections.classRoomId')
        ->join('subjects','subjects.subjectId','=','subject_teacher_for_each_sections.subjectId')
        ->join('teachers','teachers.teacherId','=','subject_teacher_for_each_sections.teacherId')
        ->join('details','details.userId','=','teachers.userId')
        ->join('grades','grades.gradeId','=','class_rooms.grade')
        ->join('sections','sections.sectionId','=','class_rooms.section')
        ->join('departments','departments.departmentId','=','class_rooms.departmentId') 
        ->join('semesters','semesters.semesterId','=','class_rooms.semester')
        ->select('subject_teacher_for_each_sections.subjectForSectionId AS subjectForSectionId',
        'subjects.subjectName AS subjectName','subjects.subjectCode AS subjectCode',
        'details.sal AS salutation','details.firstName AS teacherFirstName','details.lastName AS teacherLastName',
        'class_rooms.classroomDetailId AS classRoomId','semesters.semesterName AS semesterName',
        'grades.grade AS gradeName','sections.sectionName AS sectionName')
        ->where('subject_teacher_for_each_sections.classRoomId','=',$classRoomDetailId)
        // ->where('subject_teacher_for_each_sections.teacherId','!=',1)
        ->get();
        return response()->json($classRoomsForAssignedTeachers);
    }

    public function getClassroomForAssigningTeachers()
    {

        $classRoomsForAssigningTeachers = \App\Models\SubjectTeacherForEachSections::join('class_rooms','class_rooms.classroomDetailId','=','subject_teacher_for_each_sections.classRoomId')
        ->join('grades','grades.gradeId','=','class_rooms.grade')
        ->join('sections','sections.sectionId','=','class_rooms.section')
        ->join('departments','departments.departmentId','=','class_rooms.departmentId')
        ->join('semesters','semesters.semesterId','=','class_rooms.semester')
        ->join('teachers','teachers.teacherId','=','subject_teacher_for_each_sections.teacherId')
        ->select(
        'class_rooms.classroomDetailId AS classRoomId',
        'semesters.semesterName AS semesterName',
        'grades.grade AS gradeName','sections.sectionName AS sectionName',
        'departments.departmentName AS departmentName')
        ->groupBy(
    'class_rooms.classroomDetailId',
    'semesters.semesterName',
    'grades.grade',
    'sections.sectionName',
    'departments.departmentName'
    )
    ->where('teachers.teacherId','!=',1)
    ->orderBy('class_rooms.classroomDetailId', 'ASC')
    ->get();
        return response()->json($classRoomsForAssigningTeachers);
    }

    public function getTeacherSubjectsList(Request $request)
    {
       $teacherAssignedSubjectsDetails = SubjectTeacherForEachSections::join('teachers','teachers.teacherId','=','subject_teacher_for_each_sections.teacherId')
       ->join('class_rooms','class_rooms.classroomDetailId','=','subject_teacher_for_each_sections.classRoomId')
       ->join('grades','grades.gradeId','=','subject_teacher_for_each_sections.subjectId')
       ->join('subjects','subjects.subjectId','=','subject_teacher_for_each_sections.subjectId')
       ->join('departments','departments.departmentId','=','subject_teacher_for_each_sections.departmentId')
       ->join('semesters','semesters.semesterId','=','subject_teacher_for_each_sections.semesterId')
       ->select('grades.grade AS gradeName','subjects.subjectName AS subjectName','departments.departmentName AS departmentName','semesters.semesterName AS semesterName')
       ->where('teachers.teacherId','=',$request->teacherId)
       ->get();
        return response()->json($teacherAssignedSubjectsDetails);
    }

    public function getClassroomAssignedTeachers()
    {
        // $classRoomsForAssignedTeachers = \App\Models\SubjectTeacherForEachSections::join('class_rooms','class_rooms.classroomDetailId','=','subject_teacher_for_each_sections.classRoomId')
        // ->join('grades','grades.gradeId','=','class_rooms.grade')
        // ->join('sections','sections.sectionId','=','class_rooms.section')
        // ->join('departments','departments.departmentId','=','class_rooms.departmentId')
        // ->join('semesters','semesters.semesterId','=','class_rooms.semester')
        // ->join('teachers','teachers.teacherId','=','subject_teacher_for_each_sections.teacherId')
        // ->join('details','details.userId','=','teachers.userId')
        // ->select('subject_teacher_for_each_sections.subjectId as subjectId','details.firstName as classTeacherFirstName','details.lastName as classTeacherLastName','class_rooms.classroomDetailId AS classRoomId','semesters.semesterName AS semesterName','grades.grade AS gradeName','sections.sectionName AS sectionName','departments.departmentName AS departmentName')
        // // ->where('subject_teacher_for_each_sections.teacherId','!=',1)
        // ->get();
        $classRoomsForAssignedTeachers = \App\Models\SubjectTeacherForEachSections::join('class_rooms','class_rooms.classroomDetailId','=','subject_teacher_for_each_sections.classRoomId')
    ->join('grades','grades.gradeId','=','class_rooms.grade')
    ->join('sections','sections.sectionId','=','class_rooms.section')
    ->join('departments','departments.departmentId','=','class_rooms.departmentId')
    ->join('semesters','semesters.semesterId','=','class_rooms.semester')
    ->join('teachers','teachers.teacherId','=','subject_teacher_for_each_sections.teacherId')
    ->join('details','details.userId','=','teachers.userId')
    ->select(
        'subject_teacher_for_each_sections.classRoomId',
        'details.firstName as classTeacherFirstName',
        'details.lastName as classTeacherLastName',
        'class_rooms.classroomDetailId',
        'semesters.semesterName',
        'grades.grade as gradeName',
        'sections.sectionName',
        'departments.departmentName'
    )
    ->groupBy(
        'subject_teacher_for_each_sections.classRoomId',
        'details.firstName',
        'details.lastName',
        'class_rooms.classroomDetailId',
        'semesters.semesterName',
        'grades.grade',
        'sections.sectionName',
        'departments.departmentName'
    )
    ->where('subject_teacher_for_each_sections.teacherId','!=',1)
    ->get();

        return response()->json($classRoomsForAssignedTeachers);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function TeacherForClassSubject(Request $request)
     {
       $role = new Role;
       $role->roleName="Test";
       $role->status=1;
       $role->save();
        //Add An Entity
         $validated = $request->validate([
             'classRoomId' => ['required'],
             'teacherId' => ['required'],
        [
         'classRoomId.required'=> 'A cass room must be seleted',
         'teacherId.required'=> 'A subject must be seleted',
        ]
         ]);
         $subjectTeacherForEachSections = new SubjectTeacherForEachSections;
           $subjectTeacherForEachSections->teacherId = $request->teacherId;
           $subjectTeacherForEachSections->classRoomId =  $request->classRoomId;
           $subjectTeacherForEachSections->subjectId =  $request->subjectId;
           $subjectTeacherForEachSections->departmentId = $request->departmentId;
           $subjectTeacherForEachSections->semesterId =  $request->semesterId;
           $subjectTeacherForEachSections->status= 1;
           $subjectTeacherForEachSections->batchId= 1;
           $subjectTeacherForEachSections->save();

                 return redirect()->route('AdminSubjectTeachersForEachSection',['id'=>'createTeacherForSubject']);
     }


public function deleteEntryTeacher(Request $request)
{
  $role= new Role;
  $role->roleName="Test";
  $role->status=1;
  $role->save();
  $SubjectTeacherForEachSections=SubjectTeacherForEachSections::where('subjectForSectionId',$request->subjectForSectionId)->first();
  $SubjectTeacherForEachSections->delete();
  return redirect()->route('AdminSubjectTeachersForEachSection');
}
         public function updateTeacherForClassSubject(Request $request)
         {

             //Updating classroom details
             $validated = $request->validate([

                 'teacherId' => ['required'],
            [
             'teacherId.required'=> 'A teacher must be selected',
            ]
             ]);
             $subjectTeacherForEachSections = SubjectTeacherForEachSections::where('subjectForSectionId', $request->subjectForSectionId)->first();
             $subjectTeacherForEachSections->teacherId =  $request->teacherId;
             $subjectTeacherForEachSections->save();


           return redirect()->route('AdminSubjectTeachersForEachSection',['id'=>'editTeacherForSubject']);
         }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubjectTeacherForEachSections  $subjectTeacherForEachSections
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectTeacherForEachSections $subjectTeacherForEachSections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubjectTeacherForEachSections  $subjectTeacherForEachSections
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectTeacherForEachSections $subjectTeacherForEachSections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubjectTeacherForEachSections  $subjectTeacherForEachSections
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request,SubjectTeacherForEachSections $subjectTeacherForEachSections)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectTeacherForEachSections  $subjectTeacherForEachSections
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectTeacherForEachSections $subjectTeacherForEachSections)
    {
        //
    }
}
