<?php

namespace App\Http\Controllers;

use Response;
use App\Models\subjectTeacherForEachSections;
use App\Models\batch;
use App\Models\role;
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
      $SubjectTeacherForEachSections = \App\Models\subjectTeacherForEachSections::all();
      return view("/Admin/subjectTeachersForEachSection")->with('SubjectTeacherForEachSections',$SubjectTeacherForEachSections);
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
       $role = new role;
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
         $subjectTeacherForEachSections = new subjectTeacherForEachSections;
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
  $role= new role;
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
