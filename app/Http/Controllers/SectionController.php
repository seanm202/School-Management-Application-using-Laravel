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

     
    public function getSectionDetailsByAJAX()
    {
           $sections = \App\Models\Section::all();
          return response()->json($sections);
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
           $batchId=Batch::where('status',40)->select('batchId')->first()->batchId;
           $section=new Section;
         $section->sectionName=$request->sectionName;
       $section->status=72;
     $section->batchId=$batchId;
   $section->save();

   return response()->json([
   'status' => true,
   'message' => 'Section has been created successfully!'
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
        $sections->batchId=Batch::where('status',40)->select('batchId')->first()->batchId;
       $sections->secionName = $request->secionName;
       $sections->status = 72;
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
       $section->status = 72;
      $section->save();
    return redirect()->route('AdminSection',['id'=>'updateSectionByAdmin']);
    }

    
    // public function updateAJAXSection(Request $request, Section $section)
    
    public function updateAJAXSection(Request $request)
    {
    //Updating classroom details
                   $validated = $request->validate([
                     'sectionName' => ['required'],
                 [
                 'sectionName.required'=> 'A name must be specified for the section/division.',
                 ]
                 ]);
      $section=Section::where('sectionId','=',$request->sectionId)->first();
      $section->sectionName=$request->sectionName;
       $section->status = 72;
      $section->save();
    
   return response()->json([
   'status' => true,
   'message' => 'Section data has been updated successfully!'
   ]);
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

      return response()->json([
   'status' => true,
   'message' => 'Section data has been deleted successfully!'
   ]);
    }


    // To check whether the entity ,here section, is still being used in the system.
    public function checkSectionIdForLink($sectionId)
    {
      $messages=[];
      $section = Section::where('sectionId','=', $sectionId)->first();

      $checkInClassRoom = ClassRoom::where('section','=', $sectionId)->first();
      if($checkInClassRoom)
        {
            $messages[]='Section\'s Id is still in the ClassRoom table.Please check the details.';
        }


      return response()->json([
    'status' => true,
    'message' => $messages,
]);
    }

    
    public function getSectionsList()
    {
        $subjectSectionsForEachClassRooms = \App\Models\Section::all();

        return response()->json($subjectSectionsForEachClassRooms);
    }
}
