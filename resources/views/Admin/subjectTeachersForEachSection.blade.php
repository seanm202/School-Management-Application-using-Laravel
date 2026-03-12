<!-- Bootstrap 5.2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- jQuery (FULL version for plugins like jquery.form) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Form Plugin -->
<script src="https://malsup.github.io/jquery.form.js"></script>

<!-- Bootstrap 5 Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Your Custom Files -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}"></script>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
   {{ __('Assign classes') }}
  <br>
  <button class="btn btn-primary" id="menu-toggle" style="position:fixed;background-color: white;color:black;">Menu</button> @if(Session::has('success'))
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
          <a href="#createsTeacherForSubjects" class="list-group-item list-group-item-action bg-light">Allot subjects to teachers</a>
          <a href="#editTeacherForSubjects" class="list-group-item list-group-item-action bg-light">Edit/Change subject allotted to teachers's</a>
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

<!--



 -->
 <script>
 $(document).ready(function () {

   $('#createTeachersForSubjects').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);

   var classRoomDetailId = button.attr('data-bs-class-room-detailid');
   var gradeForAllotting = button.attr('data-bs-grade-for-allotting');
   var sectionForAllotting = button.attr('data-bs-section-for-allotting');
   var capacityForAllotting = button.attr('data-bs-capacity-for-allotting');
   var departmentForAllotting = button.attr('data-bs-department-for-allotting');


   var modal = $(this);

   modal.find('#classRoomDetailId').val(classRoomDetailId);
   modal.find('#gradeForAllotting').html("<h3>Grade : " + gradeForAllotting+"</h3>");
   modal.find('#sectionForAllotting').html("<h3>Section : " + sectionForAllotting+"</h3>");
   modal.find('#capacityForAllotting').html("<h3>Capacity : " + capacityForAllotting+"</h3>");
   modal.find('#departmentForAllotting').html("<h3>Department : " + departmentForAllotting+"</h3>");

 });

 });
 </script>
<!--

 -->
 <div class="modal fade" id="createTeachersForSubjects">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

         <form action="{{route('SubjectTeacherForEachSections.TeacherForClassSubject')}}" enctype="multipart/form-data" method="POST" name="createTeacherForSubject" id="createTeacherForSubject">
         @csrf
            <div id="gradeForAllotting"></div>
            <div id="sectionForAllotting"></div>
            <div id="capacityForAllotting"></div>
            <div id="departmentForAllotting"></div>
        @if(count($departments=\App\Models\Department::all())>0)
             <select name="departmentId" id="departmentId" class="form-control">
              @foreach($departments=\App\Models\Department::all() as $department)
                <option value="{{$department->departmentId}}">{{$department->departmentName}}</option>
              @endforeach
            </select>
        @else
          <h3 style="color:red;">List is empty</h3>
        @endif<br>
            <h3 id="semesterForAllotting"></h3>{{Form::label('semester','Semester : ')}}
           @if(count($semesters = \App\Models\semester::all())>0)
               <select name="semesterId" id="semesterId" class="form-control">
                @foreach(($semesters = \App\Models\semester::all()) as  $semester)
                <option value={{$semester->semesterId}}>{{$semester->semesterName}}</option>
                @endforeach
               </select>
           @else
             <h3 style="color:red;">List is empty</h3>
           @endif
            <br>
              <h3 id="subjectForAllotting"></h3>{{Form::label('subject','Subject : ')}}
        @if(count($subjects=\App\Models\subject::all())>0)
              <select name="subjectId" id="subjectId" class="form-control">
              @foreach($subjects=\App\Models\subject::all() as $subject)
                <option value="{{$subject->subjectId}}">{{$subject->subjectName}}</option>
              @endforeach
            </select>
        @else
          <h3 style="color:red;">List is empty</h3>
        @endif
        <br>
            <h3 id="teacherForAllotting"></h3>{{Form::label('teacher','Teacher : ')}}
        @if(count($teachers=\App\Models\teacher::all())>0)
             <select name="teacherId" id="teacherId" class="form-control">
              @foreach(
              $teachers = \App\Models\Teacher::join('details', 'details.userId', '=', 'teachers.userId')
              ->select(
              'details.lastname as lastName',
              'details.firstname as firstName',
              'teachers.teacherId as teacherId'
              )
              ->get()
              as $teacher
              )
                <option value="{{$teacher->teacherId}}">{{$teacher->firstName}} {{$teacher->lastName}}</option>
              @endforeach
            </select>
        @else
          <h3 style="color:red;">List is empty</h3>
        @endif
            <br>{{Form::hidden('classRoomId',null,array('id'=>'classRoomDetailId'))}}
            <br><button type="button" id="buttonForCreateTeacherForSubject" class="btn btn-primary form-control">Submit</button>
              {{Form::close()}}<br>


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
    <div class="py-12" id="createsTeacherForSubjects">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Assign teachers to each class according to subject
                  @if(count(\App\Models\classRoom::join('sections','sections.sectionId','=','class_rooms.section')
                      ->join('grades','grades.gradeId','=','class_rooms.grade')
                      ->select('class_rooms.classroomDetailId AS classroomDetailId',
                      'class_rooms.capacity AS Capacity',
                      'grades.grade AS grade',
                      'sections.sectionName AS sectionName')->get()
                      )>0)
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Grade</th>
                            <th>View</th>
                          </tr>
                          @foreach(($classRoomss=\App\Models\classRoom::join('sections','sections.sectionId','=','class_rooms.section')
                          ->join('grades','grades.gradeId','=','class_rooms.grade')
                          ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                          ->select('class_rooms.classroomDetailId AS classroomDetailId',
                          'class_rooms.capacity AS Capacity',
                          'grades.grade AS grade',
                          'departments.departmentId AS departmentId',
                          'sections.sectionName AS sectionName')->get()
                          ) as $classRoom)
                             <tr><td>{{$classRoom->grade}}</td>
                              <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                 data-bs-class-room-detailid="{{$classRoom->classroomDetailId}}"
                                 data-bs-grade-for-allotting="{{$classRoom->grade}}"
                                 data-bs-section-for-allotting="{{$classRoom->sectionName}}"
                                 data-bs-capacity-for-allotting="{{$classRoom->Capacity}}"
                                 data-bs-department-for-allotting="{{$classRoom->departmentId}}"
                                data-bs-target="#createTeachersForSubjects">View</button></td>
                            </tr>

                          @endforeach
                          </thead>
                        </table>
         @else
            <h3 style="color:red;">List is empty!</h3>
         @endif

<!--



 -->
                    </div>
                </div>
            </div>
        </div>
<!--

 -->


 <script>
 $(document).ready(function () {

   $('#classRoomAssigned').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);

   var classRoomDetailId = button.attr('data-bs-class-room-detailid');
   var assignedTeacherFname = button.attr('data-bs-assigned-teacher-fname');
   var assignedTeacher = button.attr('data-bs-assigned-teacher-lname');
   var assignedGrade = button.attr('data-bs-assigned-grade');
   var assignedSection = button.attr('data-bs-assigned-section');
   var assignedRoomNo = button.attr('data-bs-assigned-room-no');
   var assignedDepartment = button.attr('data-bs-assigned-department');
   var assignedSemester = button.attr('data-bs-assigned-semester');
   var assignedSubjectCode = button.attr('data-bs-assigned-subject-code');


   var modal = $(this);

   modal.find('#classRoomDetailId').val(classRoomDetailId);
   modal.find('#assignedTeacher').html("<h3>Teacher : " + assignedTeacher+"</h3>");
   modal.find('#assignedGrade').html("<h3>Grade : " + assignedGrade+"</h3>");
   modal.find('#assignedSection').html("<h3>Section : " + assignedSection+"</h3>");
   modal.find('#assignedRoomNo').html("<h3>Room No : " + assignedRoomNo+"</h3>");
   modal.find('#assignedDepartment').html("<h3>Department : " + assignedDepartment+"</h3>");
   modal.find('#assignedSemester').html("<h3>Semester : " + assignedSemester+"</h3>");
   modal.find('#assignedSubjectCode').html("<h3>Subject Code : " + assignedSubjectCode+"</h3>");

 });

 });
 </script>
 <div class="modal fade" id="classRoomAssigned">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div id="assignedTeacher"></div>
          <div id="assignedGrade"></div>
          <div id="assignedSection"></div>
          <div id="assignedRoomNo"></div>
          <div id="assignedDepartment"></div>
          <div id="assignedSemester"></div>
          <div id="assignedSubjectCode"></div>
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
    <div class="py-12" id="editTeacherForSubjects">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        View/Edit Teachers assignments
                        <br>

                        Subjects<br>
                        @if(count(\App\Models\SubjectTeacherForEachSections::all())>0)
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Department</th>
                                <th>Semester</th>
                                <th>Class Teacher</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Subject Code</th>
                                <th>Update</th>
                                <th>Delete</th>
                              </tr>
                                @foreach((\App\Models\SubjectTeacherForEachSections::where('subject_teacher_for_each_sections.status','=',1)
                                                                            ->join('class_rooms','class_rooms.classroomDetailId','=','subject_teacher_for_each_sections.classRoomId')
                                                                            ->join('sections','sections.sectionId','=','class_rooms.section')
                                                                            ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                                            ->join('subjects','subjects.subjectId','=','subject_teacher_for_each_sections.subjectId')
                                                                            ->join('teachers','teachers.teacherId','=','class_rooms.classTeacher')
                                                                            ->join('details','details.userId','=','teachers.userId')
                                                                            ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                                                            ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                                                            ->select('details.firstname AS firstName',
                                                                            'details.lastname AS lastName',
                                                                            'subjects.subjectId AS subjectId',
                                                                            'subjects.subjectName AS subjectName',
                                                                            'grades.grade AS grade',
                                                                            'departments.departmentName AS departmentName',
                                                                            'semesters.semesterName AS semesterName',
                                                                            'sections.sectionName AS sectionName',
                                                                            'class_rooms.classroomDetailId AS classroomId',
                                                                            'class_rooms.roomNo AS roomNo',
                                                                            'departments.departmentName AS departmentName',
                                                                            'subject_teacher_for_each_sections.subjectForSectionId AS subjectForSectionId',
                                                                            'semesters.semesterName AS semesterName',
                                                                            'subjects.subjectCode AS subjectCode')
                                                                            ->get()) as $SubjectTeacherForEachSection)
                                    <tr>
                                      <td>{{$SubjectTeacherForEachSection->departmentName}}</td>
                                        <td>{{$SubjectTeacherForEachSection->semesterName}}</td>
                                      <td>{{$SubjectTeacherForEachSection->firstName}} {{$SubjectTeacherForEachSection->lastName}}</td>

                                      <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                         data-bs-class-room-detailid="{{$SubjectTeacherForEachSection->classroomId}}"
                                         data-bs-assigned-teacher-fname="{{$SubjectTeacherForEachSection->firstName}}"
                                         data-bs-assigned-teacher-lname="{{$SubjectTeacherForEachSection->lastName}}"
                                         data-bs-assigned-grade="{{$SubjectTeacherForEachSection->grade}}"
                                         data-bs-assigned-section="{{$SubjectTeacherForEachSection->sectionName}}"
                                         data-bs-assigned-room-no="{{$SubjectTeacherForEachSection->roomNo}}"
                                         data-bs-assigned-department="{{$SubjectTeacherForEachSection->departmentName}}"
                                         data-bs-assigned-semester="{{$SubjectTeacherForEachSection->semesterName}}"
                                         data-bs-assigned-subject-code="{{$SubjectTeacherForEachSection->subjectCode}}"
                                        data-bs-target="#classRoomAssigned">View</button></td>

                                      <td>{{$SubjectTeacherForEachSection->subjectName}}</td>
                                      <td>{{$SubjectTeacherForEachSection->subjectCode}}</td>
                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateTeacherForSubject{{$classRoom->classroomDetailId}}">Update</button></td>


                                      <div class="modal fade" id="updateTeacherForSubject{{$classRoom->classroomDetailId}}">
                                         <div class="modal-dialog modal-sm">
                                           <div class="modal-content">

                                             <!-- Modal Header -->
                                             <div class="modal-header">
                                               <h4 class="modal-title">Details</h4>
                                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             </div>

                                             <!-- Modal body -->
                                             <div class="modal-body">

                                                 <form action="{{route('SubjectTeacherForEachSections.updateTeacherForClassSubject')}}" enctype="multipart/form-data" method="POST" name="editTeacherForSubject" id="editTeacherForSubject">
                                                 {{ csrf_field() }}{{ method_field('POST') }}
                                                 {{Form::label('teacher','Teacher : ')}}
                                                 <input type="hidden" name="subjectForSectionId" value="{{$SubjectTeacherForEachSection->subjectForSectionId}}"></input>
                                                 <select name="teacherId" id="teacherId" class="form-control">
                                                   <option value="0" selected>Select Teacher</option>
                                                   @foreach(($teachers=\App\Models\teacher::join('details','details.userId','=','teachers.userId')
                                                     ->select('details.lastname AS lastName','details.firstname AS firstName','teachers.teacherId AS teacherId','teachers.userId AS teacherUserId')->get())
                                                     as $teacher)
                                                     <option value="{{$teacher->teacherId}}" selected>{{$teacher->firstName}} {{$teacher->lastName}}</option>
                                                   @endforeach
                                                 </select><br>
                                                 {{Form::hidden('subjectId',$SubjectTeacherForEachSection->subjectId)}}
                                                 {{Form::hidden('classroomId',$SubjectTeacherForEachSection->classroomId)}}{{Form::hidden('subjectForSectionId',$SubjectTeacherForEachSection->subjectForSectionId,array('id'=>'subjectForSectionId'))}}
                                                 <br><button type="submit" class="btn btn-primary form-control">Update</button>
                                                   {{Form::close()}}<br>


                                             </div>

                                             <!-- Modal footer -->
                                             <div class="modal-footer">
                                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                             </div>

                                           </div>
                                         </div>
                                        </div>
                                        <form action="{{route('SubjectTeacherForEachSections.deleteEntryTeacher')}}" method="POST" enctype="multipart/form-data" name="deleteEntryTeacher" id="deleteEntryTeacher">
                                          @csrf
                                          {{Form::hidden('subjectForSectionId',$SubjectTeacherForEachSection->subjectForSectionId,array('id'=>'subjectForSectionId'))}}

                                        <td><button type="submit" class="btn btn-primary form-control">Delete</button></td>{{Form::close()}}
                                        </tr>
                              @endforeach
                            </thead>
                          </table>
        @else
          <h3 style="color:red;">List is empty!<h3>
        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

        <!--

       -->

       <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
       <script src="{{ asset('js/Admin/subjectTeachersForEachSection.js') }}" defer></script>

</x-app-layout>
