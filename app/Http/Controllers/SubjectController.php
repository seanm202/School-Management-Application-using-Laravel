<?php

namespace App\Http\Controllers;

use Response;
use App\Models\subject;
use App\Models\batch;
use App\Models\role;
use Illuminate\Http\Request;
use Session;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $subjects = \App\Models\subject::all();
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
      $subjectWithSelectedConditions=subject::where('subjectGrade','=',$gradeId)
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


    public function storeSubject(Request $request)
    {
  //     $role = new role;
  //          $role->roleName = "Test";
  //          $role->status = 1;
  // $role->save();

      //Add A Subject
          $validated = $request->validate([

              'semesterId' => ['required'],
              'departmentId' => ['required'],
              'subjectName' => ['required'],
              'torlab' => ['required'],
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

              $subject = new subject;
                   $subject->semesterId = $request->semesterId;
                   $subject->departmentId = $request->departmentId;
         $subject->subjectName = $request->subjectName;
         $subject->subjectGrade = $request->subjectGrade;
         $subject->subjectMaxMarks = $request->subjectMaxMarks;
         $subject->subjectTextName = $request->subjectTextName;
         $subject->torlab = $request->torlab;
         $subject->priority = $request->subjectPriority;
         $subject->status = 1;
         $subject->batchId=batch::where('status',1)->select('batchId')->first()->batchId;
         $subject->save();

      return redirect()->route('AdminSubject',['id'=>'createASubject'])->with('success', 'Subject created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(subject $subject)
    {
      ////
      $subjects=subject::all();
      return $subjects;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(subject $subject)
    {
      //get old values
      $subject = subject::where('subjectId', $subject->subjectId)
             ->get();
             return 1;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function updatesubject(Request $request)
    {$validated = $request->validate([

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
      $subject = subject::where('subjectId',$request->subjectId)->first();
    $subject->semesterId =$request->semesterId;
    $subject->departmentId = $request->departmentId;
    $subject->subjectName = $request->subjectName;
    $subject->subjectGrade = $request->subjectGrade;
    $subject->subjectMaxMarks = $request->subjectMaxMarks;
    $subject->subjectTextName = $request->subjectTextName;
    $subject->torlab = $request->theoryOrlab;
    $subject->priority = $request->subjectPriority;
    $subject->save();
    return redirect()->route('AdminSubject',['id'=>'updateSubject']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subject  $subject
     * @return \Illuminate\Http\Response
     */
     public function destroysubject(Request $request)
     {
       //Delete Subject
      $subject = subject::where('subjectId', $request->subjectId)->first();
       $subject->delete();
       return redirect()->route('AdminSubject',['id'=>'updateSubject']);
     }
}
