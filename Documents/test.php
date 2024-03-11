<div class="modal fade" id="viewTimetable{{$classRoom->classTimeTableId}}">
   <div class="modal-dialog modal-sm">
     <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">Class Timetable</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>

       <!-- Modal body -->
       <div class="modal-body">

           <div style="display:flex;"><h3>Grade : {{$classRoom->grade}}</h3><h3>Room No : {{$classRoom->grade}}</h3><h3>Section : {{$classRoom->grade}}</h3></div>
           <div style="display:flex;"><h3>Department : {{$classRoom->grade}}</h3><h3>Semester : {{$classRoom->grade}}</h3></div>



              <table>
                  @foreach(($days=\App\Models\days::all()) as $day)
                       <tr>
                         <th>Day</th>
                      @foreach(($hours=\App\Models\hours::all()) as $hour)
                        <th>{{$hour->hourName}}</th>
                      @endforeach
                      </tr>
                      @foreach(($timetables=\App\Models\Timetable::join('hours','hours.hourId','=','timetables.hourId')
                                                                ->join('days','days.dayId','=','timetables.dayId')
                                                                ->join('subjects','subjects.subjectId','=','timetables.subjectId')
                                                                ->join('teachers','teachers.teacherId','=','timetables.teacherId')
                                                                ->join('details','details.detailId','=','teachers.teacherDetailId')
                                                                ->select('days.dayName AS dayName',
                                                                'days.dayId AS dayId',
                                                                'hours.hourId AS hourId',
                                                                'hours.hourName AS hourName',
                                                                'hours.hourStartingTime AS hourStartingTime',
                                                                'hours.hourEndingTime AS hourEndingTime',
                                                                'subjects.subjectName AS subjectName',
                                                                'details.sal AS sal',
                                                                'details.firstName AS firstName',
                                                                'details.lastName AS lastName')
                                                                ->where('timetables.classroomId','=',$classRoom->classroomDetailId)
                                                                  ->get()) as $classTimetable)


                                   @if($day->dayId==$classTimetable->dayId)
                                     <tr>
                                       <td>{{$classTimetable->dayName}}</td>
                                      @foreach(($hours=\App\Models\hours::all()) as $hour)
                                         @if($hour->hourId==$classTimetable->hourId)
                                           <td>{{$classTimetable->hourName}}<br>
                                             {{$classTimetable->subjectName}}<br>
                                               {{$classTimetable->sal}}{{$classTimetable->firstName}}{{$classTimetable->lastName}}<br>
                                               {{$classTimetable->hourStartingTime}} - {{$classTimetable->hourEndingTime}}<br>
                                             </td>
                                         @endif
                                       @endforeach
                                     </tr>
                                   @endif
                      @endforeach
                  @endforeach
                </table>
       </div>
       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>

     </div>
   </div>
  </div>
