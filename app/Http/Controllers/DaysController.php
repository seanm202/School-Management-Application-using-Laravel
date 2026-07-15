<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Days;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {}
    public function getDayDetailsByAJAX()
    {
        // $days = \App\Models\Days::all();
        // return response()->json($days);
        try {
            $days = \App\Models\Days::all();
            return response()->json($days);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
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
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function show(Days $days)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function edit(Days $days)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Days $days) {}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->dayId != 1 || $request->dayId != 2 || $request->dayId != 3 || $request->dayId != 4 || $request->dayId != 5 || $request->dayId != 6 || $request->dayId != 7) {
            $deleted = DB::table('days')->where('dayId', '=', $request->dayId)->delete();
            return response()->json([
                'status' => true,
                'message' => 'Deleted successfully!'
            ]);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'This cannot be deleted.'
            ]);
        }
        return redirect()->route('\Admindashboard')->with('success', 'Deleted successfully.');
    }
}
