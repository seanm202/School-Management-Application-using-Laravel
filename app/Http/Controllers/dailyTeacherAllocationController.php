<?php

namespace App\Http\Controllers;

use Response;
use App\Models\hours;
use App\Models\admin;
use App\Models\batch;
use App\Models\days;
use App\Models\dailyTeacherAllocation;
use App\Models\SubjectTeacherForEachSections;
use Illuminate\Http\Request;

class dailyTeacherAllocationController extends Controller
{

      //

      public function createDailyAttendanceForAllTeachers(Request $request)
      {
          //Store or add admin
          $SubjectTeacherForEachSections = SubjectTeacherForEachSections::all();
          $days=days::where('dayName','=',date('l'))->select('dayId')->first();
          $batchId=batch::where('status',1)->select('batchId')->first();
          foreach($SubjectTeacherForEachSections as $SubjectTeacherForEachSection)
          {
            $hours=hours::all();
            foreach($hours as $hour)
            {
            $dailyTeacherAllocation= new dailyTeacherAllocation;
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

          $admins = admin::all();
          $days=days::where('dayName','=',date('l'))->select('dayId')->first();
          $batchId=batch::where('status',1)->select('batchId')->first();
          foreach($admins as $admin)
          {
            $hours=hours::all();
            foreach($hours as $hour)
            {
            $dailyTeacherAllocation=new dailyTeacherAllocation;
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

         return redirect()->route('Admin',['id'=>'generateAttendanceForTeachers'])->with('success', 'Updated successfully.');
      }

  }
