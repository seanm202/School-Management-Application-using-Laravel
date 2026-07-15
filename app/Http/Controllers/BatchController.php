<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Batch;
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
      $batchs = \App\Models\Batch::all();
      return view("/Admin/admin")->with('batchs',$batchs);
    }
    public function getDetailsOfAdmins()
    {
      $admin = \App\Models\Admin::all();
      return redirect()->route('Admin')->with(compact($admin));
    }
    public function getBatchDetailsByAJAX()
    {
      $batches = \App\Models\Batch::all();
      return response()->json($batches);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createbatch(Request $request)
    {
          $batch= new Batch;
          $batch->batchName=$request->batchName;
          $batch->batchStartingYear=$request->batchStartingYear;
          $batch->batchEndingYear=$request->batchEndingYear;
          $batch->status=67;
          $batch->save();
        // return Redirect::back();
        return response()->json([
        'status' => true,
        'message' => 'Batch created successfully.'
        ]);
        }
       public function currentBatch(Request $request)
       {
            $oldActiveBatchId=0;
             $batches= Batch::where('status','=',40)->first();
             $batches->status=41;
             $batches->save();
              $oldActiveBatchId=$batches->batchId;

                 $batches= Batch::where('batchId','=',$request->batchId)->first();
                 $batches->status=40;
                 $batches->save();

                 $batches= Batch::where('batchId','=',$oldActiveBatchId)->first();
             $batches->status=67;
             $batches->save();
            return response()->json([
            'status' => true,
            'message' => 'Current batch assigned successfully.'
            ]);

           }
    
    public function getCurrentBatch()
    {
      $batches= Batch::where('status','=',40)->first();
      $currentBatchId= $batches->batchId;
      return response()->json($currentBatchId);
    }



    // To check whether the entity ,here batch, is still being used in the system.
    public function checkBatchIdForLink($batchId)
    {
      $messages=[];
      $batch = Batch::where('batchId','=', $batchId)->first();

      $checkInClassRoom = ClassRoom::where('batchId','=', $batchId)->first();
      if($checkInClassRoom)
        {
            $messages[]='Batch\'s Id is still in the ClassRoom table.Please check the details.';
        }

      

      return response()->json([
    'status' => true,
    'message' => $messages,
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
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
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
      $batches = Batch::where('batchId','=',$request->batchId)->first();
      $batches->batchName=$request->batchName;
      $batches->batchStartingYear=$request->batchStartingYear;
      $batches->batchEndingYear=$request->batchEndingYear;
      $batches->status=67;
      $batches->save();
      // return redirect()->route('Admin',['id'=>'createTheAdmin'])->with('success', 'Admin created successfully.');
      return response()->json([
      'status' => true,
      'message' => 'Batch data updated successfully.'
      ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroybatch(Request $request)
    {
      if($request->batchId!=1)
      {
        $batches = Batch::where('batchId','=',$request->batchId)->first();
      $batches->delete();
       return response()->json([
        'status' => true,
        'message' => 'Deleted successfully!'
        ]);
      }
      else
        {
           return response()->json([
        'status' => true,
        'message' => 'This cannot be deleted.'
        ]);
        }
       }
}
