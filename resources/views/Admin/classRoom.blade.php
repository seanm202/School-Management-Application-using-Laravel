<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://malsup.github.io/jquery.form.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  <!--


 -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


 <!--


 -->
  <style>

  /* Media Query for Mobile Devices */
         @media (max-width: 480px) {
              #withoutModal {
       display:none;
     }
     #withModal {
       display:block;
     }
         }

         /* Media Query for low resolution  Tablets, Ipads */
         @media (min-width: 481px) and (max-width: 767px) {
               #withoutModal {
       display:block;
     }
     #withModal {
       display:none;
     }
         }

         /* Media Query for Tablets Ipads portrait mode */
         @media (min-width: 768px) and (max-width: 1024px){
                   #withoutModal {
       display:block;
     }
     #withModal {
       display:none;
     }
         }

         /* Media Query for Laptops and Desktops */
         @media (min-width: 1025px) and (max-width: 1280px){
           #withoutModal {
display:block;
}
#withModal {
display:none;
}
         }

         /* Media Query for Large screens */
         @media (min-width: 1281px) {
                    #withoutModal {
       display:block;
     }
     #withModal {
       display:none;
     }
         }

          @media (max-width: 480px) {
               #generateTimetable {
        width:auto;
      }
          }

          /* Media Query for low resolution  Tablets, Ipads */
          @media (min-width: 481px) and (max-width: 767px) {
                #generateTimetable {
        display:block;
      }
          }

          /* Media Query for Tablets Ipads portrait mode */
          @media (min-width: 768px) and (max-width: 1024px){
                    #generateTimetable {
        display:block;
      }
          }

          /* Media Query for Laptops and Desktops */
          @media (min-width: 1025px) and (max-width: 1280px){
            #generateTimetable {
 
 display:block;
 }
          }
                  /* Media Query for Large screens */
                  @media (min-width: 1281px) {
                             #generateTimetable {
                display:block;
              }
                  }

  </style>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Class Room') }}
           <br>
           <button class="btn btn-primary" id="menu-toggle" style="position:fixed;background-color: white;color:black;">Menu</button>
              @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
        </h2>
        @if ($errors->any())
           <div class="alert alert-danger">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
        @endif
    </x-slot>
    <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div>


    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
      <div class="sidebar-heading">MySchool </div>
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#generateTimetablesection" class="list-group-item list-group-item-action bg-light">Generate Timetable</a>
          <a href="#viewEditClassrooms" class="list-group-item list-group-item-action bg-light">View classrooms</a>
          <a href="#createClassRoom" class="list-group-item list-group-item-action bg-light">Create Classrooms</a>
        </li>
          </ul>
      </div>
    </div>
  </div>
</div>




    @if ( Auth::user()->role != 3)

      <script type="text/javascript">
      window.location = "{{url('logout')}}";//here double curly bracket
      </script>
    @endif

    <div class="py-12" id="generateTimetablesection">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      Generate Timetable


                                             <form action="{{route('generateTimetable')}}" method="POST" name="generateTimetable" id="generateTimetable">
                                               {{ csrf_field() }}{{ method_field('POST') }}
    					<label for="oddOrEven">Choose odd or even semester</label><br>
                                               <input type="radio" name="oddOrEven" value="1">Odd</input><br><input type="radio" name="oddOrEven" value="2">Even</input>
                                               <td><button type="submit" class="btn btn-primary form-control">Generate Timetable</button>
                                             {{ Form::close()}}

                    </div>
                </div>
            </div>
        </div>
<!--

 -->

 <script>
 $(document).ready(function () {

   $('#viewClasses').on('show.bs.modal', function (event) {

          var button = $(event.relatedTarget);
          var classRoomId = button.data('classRoomid');
          var classRoomGrade = button.data('classRoomGrade');
          var classRoomNumber = button.data('classRoomNumber');
          var classRoomSection = button.data('classRoomSection');
          var classRoomDepartment = button.data('classRoomDepartment');
          var classRoomSemester = button.data('classRoomSemester');


   var modal = $(this);

   modal.find('#classroomIdForModalForm').val(classRoomId);
   modal.find('#classroomIdForDeleteClassRoom').val(classRoomId);
   modal.find('#classRoomGrade').val(classRoomGrade);
   modal.find('#classRoomNumber').val(classRoomNumber);
   modal.find('#classRoomSection').val(classRoomSection);
   modal.find('#classRoomDepartment').val(classRoomDepartment);
   modal.find('#classRoomSemester').val(classRoomSemester);
});

 });
 </script>

<!--

 -->

 <div class="modal fade" id="viewClasses">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Classroom Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{route('updateClassroomTeacherAndDescription')}}" method="POST"  enctype="multipart/form-data"  name="updateClassRoomInModalForm" id="updateClassRoomInModalForm">
              {{ csrf_field() }}
            <div style="display:flex;"><h3 id="classRoomGrade"></h3><h3 id="classRoomNumber"></h3><h3 id="classRoomSection"></h3></div>
            <div style="display:flex;"><h3 id="classRoomDepartment"></h3><h3 id="classRoomSemester"></h3></div>
            <div style="display:flex;"><h3>Class Teacher : </h3>
              <select name="teacherId" class="form-control" id="teacherIdForFormView">
          @foreach($teachers=\App\Models\Teacher::where('teachers.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)
                                                      ->join('details','details.detailId','=','teachers.teacherDetailId')
                                                      ->select('details.lastname AS lastName',
                                                      'details.firstname AS firstName',
                                                      'teachers.teacherId AS teacherId')
                                                      ->get() as $teacher)
                                              <option value="{{$teacher->teacherId}}">{{$teacher->firstName}} {{$teacher->lastName}}</option>
          @endforeach
        </select>
      </div>{{Form::hidden('classroomId',null,array('id'=>'classroomIdForModalForm'))}}
            <div style="display:flex;"><h3 id="classDescriptionId"></h3><h3 id="classCapacityIdForModalForm"></h3></div>
            <button type="button" id="updateClassRoomForView" class="btn btn-primary form-control">Update</button>{{Form::close()}}
           <!-- <form action="{{route('destroyclassRoom')}}" method="POST" enctype="multipart/form-data" name="currentBatch" id="deleteClassRoomInModalForm">
            {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('classroomId',null,array('id'=>'classroomIdForDeleteClassRoom'))}}
           <button type="button" id="deleteClassroomForView" class="btn btn-primary form-control">Assign</button>{{Form::close()}} -->

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
   </div>
 <!--

 -->
    <div class="py-12" id="viewEditClassrooms">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  View Classroom details<br>

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showFilters">Filter</button>
          @if(count($classRooms=\App\Models\classRoom::join('grades','grades.gradeId','=','class_rooms.grade')
                                ->join('sections','sections.sectionId','=','class_rooms.section')
                                ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                ->join('teachers','teachers.teacherId','=','class_rooms.classTeacher')
                                ->join('details','details.detailId','=','teachers.teacherDetailId')
                                ->select('grades.grade AS grade',
                                'class_rooms.roomNo AS roomNo',
                                'sections.sectionName AS sectionName',
                                'departments.departmentName AS departmentName',
                                'semesters.semesterName as semesterName',
                                'details.firstname AS firstName',
                                'details.lastname AS lastName',
                                'class_rooms.capacity AS capacity',
                                'class_rooms.roomNo AS roomNo',
                                'class_rooms.description AS description',
                                'class_rooms.classTimeTableId AS classTimeTableId',
                                'class_rooms.classroomDetailId AS classroomDetailId',
                                'class_rooms.batchId AS batchId'
                                )->where('class_rooms.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)
                                ->get())>0)


                                <div id="withoutModal">
                                   <table>
                                     <thead>
                                      <tr>
                                       <th>Grade</th>
                                       <th>Room No</th>
                                       <th>Section</th>
                                       <th>Department</th>
                                       <th>Semester</th>
                                       <th>Class Teacher</th>
                                       <th>Description</th>
                                       <th>Capacity</th>
                                       <th>Update Class Room</th>
                                       <th>Delete Class Room</th>
                                       <th>View Class Room</th>
                                       <th>View Class Timetable</th>
                                      </tr>
                                     </thead>
                                   <tbody>
                                     @foreach(($classRooms=\App\Models\classRoom::join('grades','grades.gradeId','=','class_rooms.grade')
                                                         ->join('sections','sections.sectionId','=','class_rooms.section')
                                                         ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                                         ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                                         ->join('teachers','teachers.teacherId','=','class_rooms.classTeacher')
                                                         ->join('details','details.detailId','=','teachers.teacherDetailId')
                                                         ->select('grades.grade AS grade',
                                                         'class_rooms.roomNo AS roomNo',
                                                         'sections.sectionName AS sectionName',
                                                         'departments.departmentName AS departmentName',
                                                         'semesters.semesterName as semesterName',
                                                         'details.firstname AS firstName',
                                                         'details.lastname AS lastName',
                                                         'class_rooms.capacity AS capacity',
                                                         'class_rooms.roomNo AS roomNo',
                                                         'class_rooms.description AS description',
                                                         'class_rooms.classTimeTableId AS classTimeTableId',
                                                         'class_rooms.classroomDetailId AS classroomDetailId',
                                                         'class_rooms.batchId AS batchId',
                                                         'class_rooms.classTeacher AS classTeacher'
                                                         )->where('class_rooms.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)
                                                         ->get()) as $classRoom)









                                                           
                                                          <tr>
                                                          <td><form action="{{route('updateClassroomTeacherAndDescription')}}" method="POST" name="updateClassRoom" id="updateClassRoom">
                                                          {{ csrf_field() }}{{ method_field('POST') }}
                                                          {{Form::hidden('classroomId',$classRoom->classroomDetailId,array('id'=>'classroomId'))}}{{$classRoom->grade}} </td>
                                                          <td>{{$classRoom->roomNo}} </td>
                                                          <td>{{$classRoom->sectionName}} </td>
                                                          <td>{{$classRoom->departmentName}} </td>
                                                          <td>{{$classRoom->semesterName}} </td>
                                                          <td><select name="teacherId" class="form-control" id="teacherId">
                                                                               @foreach($teachers=\App\Models\Teacher::where('teachers.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)
                                                                                   ->join('details','details.detailId','=','teachers.teacherDetailId')
                                                                                   ->select('details.lastname AS lastName',
                                                                                   'details.firstname AS firstName',
                                                                                   'teachers.teacherId AS teacherId')
                                                                                   ->get() as $teacher)
                                                                                   @if($classRoom->classTeacher==$teacher->teacherId)
                                                                                     <option value="{{$teacher->teacherId}}" selected>{{$teacher->firstName}} {{$teacher->lastName}}</option>
                                                                                   @else
                                                                                   <option value="{{$teacher->teacherId}}">{{$teacher->firstName}} {{$teacher->lastName}}</option>
                                                                                   @endif
                                                                               @endforeach</td>
                                                          <td>{{Form::text('description',$classRoom->description)}}</td>
                                                          <td>{{$classRoom->capacity}}</td>
                                                          <td><button type="button" id="updateClassRoomNotInModal" class="btn btn-primary form-control">Submit</button>
                                                          {{ Form::close()}}</td>
                                                          <form action="{{route('destroyclassRoom')}}" method="POST" name="deleteClassRoom" id="deleteClassRoom">
                                                          {{ csrf_field() }}{{ method_field('POST') }}

                                                          {{Form::hidden('classroomId',$classRoom->classroomDetailId,array('id'=>'classroomId'))}}
                                                          <td><button type="button" class="btn btn-primary form-control">Delete</button>
                                                          {{ Form::close()}}</td>
                                                          <td><button type="button" class="btn btn-primary form-control" data-class-roomid ="{{$classRoom->classroomDetailId }}" data-class-room-grade="{{$classRoom->grade}}" data-class-room-number="{{$classRoom->roomNo}}" data-class-room-section="{{$classRoom->section}}" data-class-room-department="{{$classRoom->departmentId}}" data-class-room-semester="{{$classRoom->semester}}" data-toggle="modal" data-target="#viewClasses">View</button></td>
                                                          <td><button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#viewTimetable{{$classRoom->classTimeTableId}}">View</button></td>
                                                          </tr>
                                                          </tbody>
                                                          </table>
                                                          <div class="modal fade" id="viewTimetable{{$classRoom->classTimeTableId}}">
                                                             <div class="modal-dialog modal-lg">
                                                               <div class="modal-content">

                                                                 <!-- Modal Header -->
                                                                 <div class="modal-header">
                                                                   <h4 class="modal-title">Class Timetable</h4>
                                                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                 </div>

                                                                 <!-- Modal body -->
                                                                 <div class="modal-body">
                                                                   <div style="display:flex;">

                                                                                </div>
                                                                                  @foreach(($days=\App\Models\Days::all()) as $day)
                                                                                  <div style="display:flex;">
                                                                                     <div class="dayNames">{{$day->dayName}}</div>
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
                                                                                                                               'subjects.subjectName AS subjectName',
                                                                                                                               'details.firstName AS firstName',
                                                                                                                               'details.lastName AS lastName')
                                                                                                                               ->where('timetables.classroomId','=',$classRoom->classroomDetailId)
                                                                                                                               ->where('timetables.dayId','=',$day->dayId)
                                                                                                                                 ->get()) as $classTimetable)
                                                                                                           @foreach(($hours=\App\Models\hours::all()) as $hour)
                                                                                                             @if($day->dayId==$classTimetable->dayId)

                                                                                                                 @if($hour->hourId==$classTimetable->hourId)
                                                                                                                   <div  class="timeTablesNames">
                                                                                                                     <div>{{$classTimetable->hourName}} <br>{{$classTimetable->subjectName}}<br>
                                                                                                                     {{$classTimetable->firstName}}{{$classTimetable->lastName}}<br>
                                                                                                                    </div>
                                                                                                                 </div>
                                                                                                                  @endif
                                                                                                             @endif
                                                                                                           @endforeach
                                                                                    @endforeach
                                                                                 </div>
                                                                                 @endforeach

                                                                 </div>
                                                                 <!-- Modal footer -->
                                                                 <div class="modal-footer">
                                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                 </div>

                                                               </div>
                                                             </div>
                                                            </div>
                                                          @endforeach
                                                          </div>
                                                          @else
                                                          <h3 style="color:red;">List is empty</h3>
                                                          @endif

                                                          </div>
                                                          </div>
                                                          </div>
                                                          </div>








                                                          <script type="text/javascript">
                                                            $(function () {

                                                                $.ajaxSetup({
                                                                    headers: {
                                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                    }
                                                              });


                                                              $('#addClassroom').click(function (e) {
      e.preventDefault();

      $.ajax({
          data: $('#FormToCreateClassRoom').serialize(),
          url: "{{ route('createclassRoom') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              alert('Success');
          },
          error: function (xhr) {
              console.log(xhr.responseText); // 🔥 very useful
              alert('Error');
          }
      });
  });

                                                            });
                                                          </script>

    <!--

   -->

    <div class="py-12" id="createClassRoom">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Create classroom
                  <form method="POST" name="createClassRoom" id="FormToCreateClassRoom">
                  {{ csrf_field() }}{{ method_field('POST') }}
                  {{Form::label('departments','Department')}}
                  <select name="departmentId" class="form-control">
                    @if(count($departments = \App\Models\Department::all())>0)
                      @foreach(($departments = \App\Models\Department::all()) as $department)
                        <option value="{{$department->departmentId}}">{{$department->departmentName}}</option>
                      @endforeach
                    @endif
                  </select>
                  <br>
                  <br>
                  {{Form::label('semesters','Semester')}}
                  <select name="semesterId" class="form-control">
                    @if(count($semesters = \App\Models\semester::where('semesters.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->get())>0)
                      @foreach($semesters = \App\Models\semester::where('semesters.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->get() as $semester)
                        <option value="{{$semester->semesterId}}">{{$semester->semesterName}}</option>
                      @endforeach
                    @endif
                  </select>
                  <br>
                  <br>
                  {{Form::label('classTeacher','Class Teacher')}}
                  <select name="classTeacher" class="form-control">
                    @if(count($teachers = \App\Models\Teacher::where('teachers.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->get())>0)
                      @foreach(($teachers = \App\Models\Teacher::join('details','details.userId','=','teachers.userId')
                                          ->select('details.firstname AS firstName','details.lastname AS lastName','teachers.teacherId AS teacherId')
                                                              ->where('teachers.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)
                                          ->get()) as $teacher)
                        <option value="{{$teacher->teacherId}}">{{$teacher->firstName}} {{$teacher->lastName}}</option>
                      @endforeach
                    @endif
                  </select>
                  <br>
                  <br>
                  {{Form::label('grade','Grade : ')}}
                  <select name="grade" class="form-control">
                    @if(count($grades = \App\Models\grade::where('grades.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->get())>0)
                      @foreach(($grades = \App\Models\grade::where('grades.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->get()) as $graded)
                        <option value="{{$graded->gradeId}}">{{$graded->grade}}</option>
                        @endforeach
                    @endif
                  </select>
                  <br>
                  {{Form::label('roomNo','Room Number : ')}}
                  {{Form::text('roomNo',null,array('placeholder'=>'Enter Room Number','class'=>'form-control'))}}
                  <br>
                  {{Form::label('sectionName','Section Name : ')}}
                  <select name="section" class="form-control">
                    @if(count($sections = \App\Models\section::where('sections.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->get())>0)
                      @foreach(($sections = \App\Models\section::where('sections.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->get()) as $section)
                        <option value="{{$section->sectionId}}">{{$section->sectionName}}</option>
                      @endforeach
                    @endif
                  </select>
                  <br>
                  {{Form::label('description','Class Description')}}
                  {{Form::text('classDescription',null,array('placeholder'=>'Class description','class'=>'form-control'))}}
                  <br>
                  {{Form::label('Capacity','Class Capacity')}}
                  {{Form::number('classCapacity',null,array('placeholder'=>'Class Capacity','class'=>'form-control'))}}
                  <br>
                  @isset($classTimeTables)
                    {{Form::label('classTimeTableId','Class TimeTable Id')}}
                    <select name="classTimeTableId" class="form-control">
                      @foreach($classTimeTables as $classTimeTable)
                        <option value="{{$classTimeTable->classTimeTableId}}">{{$classTimeTable->classTimeTableName}}</option>
                      @endforeach
                    </select>
                  @endisset
                  <br><button type="button" id="addClassroom" class="btn btn-primary form-control">Create Classroom</button>
                  {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>



            <script src="{{ asset('js/Admin/classRoom.js') }}" defer></script>
</x-app-layout>
