<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Batch;
use App\Models\Role;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
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
    public function getDetails()
    {
      $sections = \App\Models\Section::all();
      return view("/Admin/section")->with('sections',$sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function createSection(Request $request)
     {

               $validated = $request->validate([
                 'sectionName' => ['required'],
             [
             'sectionName.required'=> 'A name must be specified for the section/division.',
             ]
             ]);
           //Add An Entity
           $batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
           $section=new Section;
         $section->sectionName=$request->sectionName;
       $section->status=1;
     $section->batchId=$batchId;
   $section->save();

   return response()->json([
   'status' => true,
   'message' => 'Data Submitted!'
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
        //Add An Entity
                       $validated = $request->validate([
                         'sectionName' => ['required'],
                     [
                     'sectionName.required'=> 'A name must be specified for the section/division.',
                     ]
                     ]);
        $sections = new Section;
        $sections->batchId=Batch::where('status',1)->select('batchId')->first()->batchId;
       $sections->secionName = $request->secionName;
       $details->save();

       return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
      //
      $sections=Section::all();
      return $sections;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function updateSection(Request $request, Section $section)
    {
    //Updating classroom details
                   $validated = $request->validate([
                     'sectionName' => ['required'],
                 [
                 'sectionName.required'=> 'A name must be specified for the section/division.',
                 ]
                 ]);
      $section=Section::where('sections.sectionId','=',$request->sectionId)->first();
      $section->sectionName=$request->sectionName;
      $section->save();
    return redirect()->route('AdminSection',['id'=>'updateSectionByAdmin']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroySection(Request $request)
    {
      //Delete self - details
      $section = Section::where('sections.sectionId','=',$request->sectionId)->first();
      $section->delete();

      return redirect()->route('AdminSection',['id'=>'updateSectionByAdmin']);
    }
}
