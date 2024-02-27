<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
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

    public function getPriorityList()
    {
      $subjectPriority=Priority::all();
      return view('/Admin/subject');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function show(Priority $priority)
    {
        //
    }

    public function createPriority(Request $request)
    {
    $validated = $request->validate([

        'priorityValue' => ['required'],
        'priorityName' => ['required'],
   [
    'priorityValue.required'=> 'Priority Value must be filled in',
    'priorityName.required'=> 'priorityName must be seleted',
   ]
    ]);

        $priority = new Priority;
             $priority->priorityValue = $request->priorityValue;
             $priority->priorityName = $request->priorityName;
   $priority->save();

return redirect()->route('AdminSubject',['id'=>'createAPriority'])->with('success', 'Priority added successfully.');
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function edit(Priority $priority)
    {
        //
    }


    public function updatePriority(Request $request)
    {$validated = $request->validate([

        'priorityValue' => ['required'],
        'priorityName' => ['required'],
    [
    'priorityValue.required'=> 'Priority Value must be filled in.',
    'priorityName.required'=> 'Priority Name must be filled in',
    ]
    ]);
      $priority = Priority::where('priorityId',$request->priorityId)->first();
      $priority->priorityValue = $request->priorityValue;
      $priority->priorityName = $request->priorityName;
    $priority->save();
    return redirect()->route('AdminSubject',['id'=>'prioritySubject']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Priority $priority)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function destroy(Priority $priority)
    {
        //
    }
}
