<?php

namespace App\Http\Controllers;

use Response;
use App\Models\batch;
use Illuminate\Http\Request;
use Redirect;

class BatchController extends Controller
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
    public function getBatchDetails()
    {
      $batchs = \App\Models\batch::all();
      return view("/Admin/admin")->with('batchs',$batchs);
    }
    public function getDetailsOfAdmins()
    {
      $admin = \App\Models\admin::all();
      return redirect()->route('Admin')->with(compact($admin));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createbatch(Request $request)
    {
          $batches= new batch;
          $batches->batchName=$request->batchName;
          $batches->batchStartingYear=$request->batchStartingYear;
          $batches->batchEndingYear=$request->batchEndingYear;
          $batches->status=0;
          $batches->save();
        // return Redirect::back();
        return response()->json([
        'status' => true,
        'message' => 'Class created successfully.'
        ]);
        }
       public function currentBatch(Request $request)
       {

             $batches= batch::where('status','=',1)->first();
             $batches->status=0;
             $batches->save();

                 $batches= batch::where('batchId','=',$request->batchId)->first();
                 $batches->status=1;
                 $batches->save();
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
     * @param  \App\Models\batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(batch $batch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function updatebatch(Request $request)
    {
      $validated = $request->validate(
[
    'batchName' => ['required'],
    'batchStartingYear' => ['required'],
    'batchEndingYear' => ['required'],
],
[
    'batchName.required'=> 'A name must be specified for the batch.',
    'batchStartingYear.required'=> 'Year of beginning of the batch should be specified',
    'batchEndingYear.required'=> 'Year of end of the batch should be specified',
]
);
      $batches = batch::where('batchId','=',$request->batchId)->first();
      $batches->batchName=$request->batchName;
      $batches->batchStartingYear=$request->batchStartingYear;
      $batches->batchEndingYear=$request->batchEndingYear;
      $batches->status=0;
      $batches->save();
      // return redirect()->route('Admin',['id'=>'createTheAdmin'])->with('success', 'Admin created successfully.');
      return response()->json([
      'status' => true,
      'message' => 'Class created successfully.'
      ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroybatch(Request $request)
    {
      $batches = batch::where('batchId','=',$request->batchId)->first();
      $batches->delete();
      return redirect()->route('Admin',['id'=>'createTheAdmin'])->with('success', 'Admin created successfully.');
    }
}
