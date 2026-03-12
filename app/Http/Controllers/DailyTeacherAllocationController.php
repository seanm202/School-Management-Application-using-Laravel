<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Hours;
use App\Models\Admin;
use App\Models\Batch;
use App\Models\Days;
use App\Models\DailyTeacherAllocation;
use App\Models\SubjectTeacherForEachSections;
use Illuminate\Http\Request;

class DailyTeacherAllocationController extends Controller
{

      //

      public function createDailyAttendanceForAllTeachers(Request $request)
      {
          //Store or add admin
          $SubjectTeacherForEachSections = SubjectTeacherForEachSections::all();
          $days=Days::where('dayName','=',date('l'))->select('dayId')->first();
          $batchId=Batch::where('status',1)->select('batchId')->first();
          foreach($SubjectTeacherForEachSections as $SubjectTeacherForEachSection)
          {
            $hours=Hours::all();
            foreach($hours as $hour)
            {
            $dailyTeacherAllocation= new DailyTeacherAllocation;
            $dailyTeacherAllocation->classRoomId=$SubjectTeacherForEachSection->classRoomId;
            $dailyTeacherAllocation->teacherId=$SubjectTeacherForEachSection->teacherId;
            $dailyTeacherAllocation->subjectId=$SubjectTeacherForEachSection->subjectId;
            $dailyTeacherAllocation->dayId=$days->dayId;
            $dailyTeacherAllocation->hourId=$hour->hourId;
            $dailyTeacherAllocation->date=$request->dateSelected;
            $dailyTeacherAllocation->subjectForSectionId=$SubjectTeacherForEachSection->subjectId;
            $dailyTeacherAllocation->batchId=$batchId->batchId;
            $dailyTeacherAllocation->status=1;
            $dailyTeacherAllocation->save();
          }
          }

          $admins = Admin::all();
          $days=Days::where('dayName','=',date('l'))->select('dayId')->first();
          $batchId=Batch::where('status',1)->select('batchId')->first();
          foreach($admins as $admin)
          {
            $hours=Hours::all();
            foreach($hours as $hour)
            {
            $dailyTeacherAllocation=new DailyTeacherAllocation;
            $dailyTeacherAllocation->classRoomId=0;
            $dailyTeacherAllocation->teacherId=$admin->adminId;
            $dailyTeacherAllocation->subjectId=0;
            $dailyTeacherAllocation->dayId=$days->dayId;
            $dailyTeacherAllocation->hourId=$hour->hourId;
            $dailyTeacherAllocation->date=$request->dateSelected;
            $dailyTeacherAllocation->subjectForSectionId=0;
            $dailyTeacherAllocation->batchId=$batchId->batchId;
            $dailyTeacherAllocation->status=1;
            $dailyTeacherAllocation->save();
          }
          }

          return response()->json([
          'status' => true,
          'message' => 'Updated Successfully!'
          ]);
      }

  }
