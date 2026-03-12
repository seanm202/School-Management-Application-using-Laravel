<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!--  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
  <script src="https://malsup.github.io/jquery.form.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src = "https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity = "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin = "anonymous">
  </script>
  <script src =
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity =
"sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin = "anonymous">
  </script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>





  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Student') }}
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
          <a href="#adminStudentAddStudent" class="list-group-item list-group-item-action bg-light">Add Student</a>
          <a href="#createMarksEntry" class="list-group-item list-group-item-action bg-light">Create Mark Entry</a>
          <a href="#assignClassRoomsToStudents" class="list-group-item list-group-item-action bg-light">Assign classroom to students</a>
          <a href="#adminStudentAddStudentMarks" class="list-group-item list-group-item-action bg-light">Add students's Marks</a>
        </li>
          </ul>
      </div>
    </div>
  </div>

</div>

    <!--

   -->  @if ( Auth::user()->role != 3)

       <script type="text/javascript">
       window.location = "{{url('logout')}}";
       </script>
     @endif

    <div class="py-12" id="adminStudentAddStudent">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="overflow-x:scroll;">
                  Add Students

                  <form action="{{route('detail.createStudentAdmin')}}" method="POST" enctype="multipart/form-data" name="addStudentAdmin" id="addStudentAdmin">
                  {{ csrf_field() }}{{ method_field('POST') }}
                    <table class="table">
                  <thead>
                    <tr>
                      <th>Salutation</th>
                      <td>
                      <select name="salutation">
                           <option value="Mr./Ms." selected>Mr./Ms.</option>
                           <option value="Mr">Mr.</option>
                           <option value="Ms">Ms.</option>
                           <option value="Mrs">Mrs.</option>
                      </select></td>
                    </tr>
                    <tr>
                      <th>First Name</th>
                    <td>{{Form::text('firstName',NULL,array('placeholder'=>'Enter first name','class'=>'form-control','id'=>'firstName'))}} </td>
                    </tr>
                    <tr>
                      <th>Last name</th>
                    <td>{{Form::text('lastName',NULL,array('placeholder'=>'Enter last name','class'=>'form-control','id'=>'lastName'))}} </td></tr>
                    <tr>
                      <th>Email</th>
                    <td>{{Form::text('email',NULL,array('placeholder'=>'Enter Email Id','class'=>'form-control','id'=>'email'))}} </td></tr>
                    <tr>
                      <th>Phone</th>
                    <td>{{Form::text('phone',NULL,array('placeholder'=>'Enter Phone Number','class'=>'form-control','id'=>'phone'))}} </td></tr>
                      <tr>
                      <th>Age</th>{{Form::hidden('password','abcd1234',array('id'=>'password'))}}
                    <td>{{Form::text('age',NULL,array('placeholder'=>'Enter age','class'=>'form-control','id'=>'age'))}}</td></tr>
                      <tr>
                      <th>Date of birth</th>
                    <td>{{Form::date('dob',NULL,array('placeholder'=>'Enter date of birth','class'=>'form-control','id'=>'dob'))}}</td></tr>
                      <tr>
                        <th>Contact Number</th>
                        <td>{{Form::text('contactNumber',NULL,array('placeholder'=>'Enter contact Number','class'=>'form-control','id'=>'contactNumber'))}}</td></tr>
                        <tr>
                          <th>Alternate Contact Number</th>
                          <td>{{Form::text('alternateContactNumber',NULL,array('placeholder'=>'Enter Alternate Contact Number','class'=>'form-control','id'=>'alternateContactNumber'))}}</td></tr>
                    <tr>
                        <th>Address</th>
                        <td>{{Form::text('address',NULL,array('placeholder'=>'Enter Address','class'=>'form-control','id'=>'address'))}}</td>
                      </tr>

                    <tr>
                    <th>Blood Group</th>
                    <td>{{Form::text('bloodGroup',NULL,array('placeholder'=>'Enter Blood Group','class'=>'form-control','id'=>'bloodGroup'))}}</td>
                    </tr>


                    <tr>
                    <th>Identification Mark</th>
                    <td>{{Form::text('identificationMark',NULL,array('placeholder'=>'Enter Identification Mark','class'=>'form-control','id'=>'identificationMark'))}}</td>
                    </tr>
                    <tr>
                    <th>Parent's Number</th>
                    <td>{{Form::text('parentNumber',NULL,array('placeholder'=>'Enter Parent\'s Number','class'=>'form-control','id'=>'parentNumber'))}}</td>
                    </tr>
                    <tr>
                    <th>Home Phone Number</th>
                    <td>{{Form::text('homePhoneNumber',NULL,array('placeholder'=>'Home Phone Number','class'=>'form-control','id'=>'homePhoneNumber'))}}</td>
                    </tr>
                    <tr>
                    <th>Father's / Spouse's Name</th>
                    <td>{{Form::text('fatherSpouseName',NULL,array('placeholder'=>'Father\'s/Spouse\'s Name','class'=>'form-control','id'=>'fatherSpouseName'))}}</td>
                    </tr>
                    <tr>
                    <th>Mother's Name</th>
                    <td>{{Form::text('motherName',NULL,array('placeholder'=>'Mother\'s Name','class'=>'form-control','id'=>'motherName'))}}</td>
                    </tr>
                    <tr>
                    <th>Guardian Name</th>
                    <td>{{Form::text('guardianName',NULL,array('placeholder'=>'Guardian Name','class'=>'form-control','id'=>'guardianName'))}}</td>
                    </tr>
                    </thead>
                  </table>
                  <button type="button" id="buttonForAddStudentAdmin" class="btn btn-primary form-control">Add</button>

                                        {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
<!--
Add students to class_rooms

 -->
 <div class="py-12" id="createMarksEntry">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Create mark entry for all the students

               <form action="{{route('studentMarks.createMarkEntry')}}" method="POST" enctype="multipart/form-data" name="createMarkEntry" id="createMarkEntry">
               @csrf
                <button type="submit" class="btn btn-primary form-control">Submit</button>
                                     {{Form::close()}}
             </div>
         </div>
     </div>
 </div>

<!--
Create Mark table for all the students

 -->



<!--



 -->
 <div class="py-12" id="assignClassRoomsToStudents">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
                 Assign students to classes
                 <br>
                 New Users<br>
                 @if(count($studentsNotAssignedToClasses=\App\Models\student::where('students.status','=',3)->join('details','details.userId','=','students.userId')->join('users','users.userId','=','students.userId')
                                ->select('details.firstname AS firstName','details.lastname AS lastName','users.email AS Email','users.phone AS Phone','students.studentId AS studentId')
                                ->get())>0)
                                @foreach(($studentsNotAssignedToClasses=\App\Models\student::where('students.status','=',3)->join('details','details.userId','=','students.userId')->join('users','users.userId','=','students.userId')
                                ->select('details.firstname AS firstName','details.lastname AS lastName','users.email AS Email','users.phone AS Phone','students.studentId AS studentId')
                                ->get()) as $studentsNotAssignedToClass)
                                <table class="table">
                                  <thead>
                                          <tr>
                                            <th>First name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Select</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>{{$studentsNotAssignedToClass->firstName}} </td>
                                            <td>{{$studentsNotAssignedToClass->lastName}} </td>
                                            <td>{{$studentsNotAssignedToClass->Email}}</td>
                                            <td>{{$studentsNotAssignedToClass->Phone}}</td>
                                            <td><button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#assignStudentsToClasses{{$studentsNotAssignedToClass->studentId}}">
                                              Select classroom
                                            </button></td>

                                          </tr>


                                        </tbody>
                                      </table>



                         <div class="modal fade" id="assignStudentsToClasses{{$studentsNotAssignedToClass->studentId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Name : {{$studentsNotAssignedToClass->firstName}} {{$studentsNotAssignedToClass->lastName}}</h5>
                                   <h5 class="modal-title" id="exampleModalLongTitle">Email : {{$studentsNotAssignedToClass->Email}}</h5>
                                 <h5 class="modal-title" id="exampleModalLongTitle">Phone : {{$studentsNotAssignedToClass->Phone}}</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                 </button>
                               </div>
                               <div class="modal-body">
                                 <table class="table">
                                   <thead><tr>
                                     <th>Grade</th>
                                       <th>Section</th>
                                       <th>Room Number</th>
                                       <th>Department</th>
                                         <th>Semester</th>
                                           <th>Class Teacher</th>
                                             <th>Capacity</th>
                                                <th>Select</th></tr>
                                     </thead>
                                       <tbody>
                              @foreach($classRooms=\App\Models\classRoom::join('teachers','teachers.teacherId','=','class_rooms.classTeacher')
                                 ->join('details','details.userId','=','teachers.userId')
                                 ->join('grades','grades.gradeId','=','class_rooms.grade')
                                 ->join('sections','sections.sectionId','=','class_rooms.section')
                                 ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                 ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                 ->select('details.firstname AS firstName',
                                 'details.lastname AS lastName',
                                 'grades.grade AS grade',
                                 'sections.sectionName AS sectionName',
                                 'departments.departmentName AS departmentName',
                                 'semesters.semesterName AS semesterName',
                                 'class_rooms.capacity AS Capacity',
                                 'class_rooms.roomNo AS roomNo',
                                 'class_rooms.classroomDetailId  AS classroomDetailId ')
                                 ->orderBy('class_rooms.classroomDetailId')
                                 ->get() as $classRoom)
<!--



 -->


 <!--




 -->
                                 <tr>
                                 <form action="{{route('classRoom.assignClassroomStudent',['classRoom'=>$classRoom->classroomDetailId])}}" method="POST"  enctype="multipart/form-data" name="assignClassRoomToStudentss" id="assignClassRoomToStudentss.{{$classRoom->classroomDetailId}}">
                                 @csrf
                                    <td>{{$classRoom->grade}}</td>
                                      <td>{{$classRoom->sectionName}}</td>
                                   <td>{{$classRoom->roomNo}}</td>
                                   <td>{{$classRoom->departmentName}}</td>
                                   <td>{{$classRoom->semesterName}}</td>
                                   <td>{{$classRoom->firstName}} {{$classRoom->lastName}}</td>
                                   {{Form::hidden('studentId',$studentsNotAssignedToClass->studentId,array('id'=>'studentId'))}}
                                   <td>{{$classRoom->Capacity}}</td>{{Form::hidden('classroomDetailId',$classRoom->classroomDetailId,array('id'=>'classroomDetailId'))}}
                                   <td><button type="submit" class="btn btn-primary form-control form-control">Select</button>{{Form::close()}}</td></tr>
                              @endforeach
                                                       </tbody>
                                                     </table>
                                                   </div>
                                                     <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                     </div>
                                                   </div>
                                                 </div>
                                               </div>
                      @endforeach
                @else
                    <h3 style="color:red;">List is empty!</h3>
                @endif

             </div>
           </div>
         </div>
       </div>
<!--




 -->


 <div class="modal fade" id="showFilters" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Select filter</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                <div>
                                <hr>
                                <hr>
                                  Department<br>
                                  <div style="display:flex;padding:30px;">
                                  @foreach($departments=\App\Models\department::all() as $department)
                                   <button class="button-value form-control" onclick="myDepartment({{$department->departmentId}})" style="background-color: #1A1515;color:white;border-radius: 8px;border: 2px solid #4CAF50;">{{$department->departmentName}}</button>
                                  @endforeach
                                  </div>
                                  <hr>
                                  <hr>
                                  Semester<br>
                                    <div style="display:flex;padding:30px;">
                                    @foreach($semesters=\App\Models\semester::all() as $semester)
                                     <button class="button-value form-control" onclick="mySemester({{$semester->semesterId}})" style="background-color: #1A1515;color:white;border-radius: 8px;border: 2px solid #3A4BDC;">{{$semester->semesterName}}</button>
                                    @endforeach
                                    </div>
                                    <hr>
                                    <hr>
                                    Grade<br>
                                      <div style="display:flex;padding:30px;">
                                      @foreach($grades=\App\Models\grade::all() as $grade)
                                       <button class="button-value form-control" onclick="myGrade({{$grade->gradeId}})" style="background-color: #1A1515;color:white;border-radius: 8px;border: 2px solid #EA3D1A;">{{$grade->grade}}</button>
                                      @endforeach
                                      </div>
                                      <hr>
                                      <hr>
                                      Section<br>
                                        <div style="display:flex;padding:30px;">
                                        @foreach($sections=\App\Models\section::all() as $section)
                                         <button class="button-value form-control" onclick="mySection({{$section->sectionId}})" style="background-color: #1A1515;color:white;border-radius: 8px;border: 2px solid #130401;">{{$section->sectionName}}</button>
                                        @endforeach
                                        </div>
                                 </div>

                                                    </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      </div>
                                                    </div>
                                                  </div>
  </div>
    <div class="py-12" id="adminStudentAddStudentMarks">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <h2>Add student Marks</h2>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showFilters">
                    Filter
                  </button>

                  @if(count(($studentDetails = \App\Models\student::where('students.batchId','=',$currentBatchId)
                                ->join('details','details.detailId','=','students.studentDetailsId')
                                ->join('semesters','semesters.semesterId','=','students.studentSemester')
                                ->join('class_rooms','class_rooms.classroomDetailId','=','students.studentClassroom')
                                ->join('student_marks','student_marks.studentId','=','students.studentId')
                                ->join('subjects','subjects.subjectId','=','student_marks.subjectId')
                                ->join('departments','departments.departmentId','=','students.studentDepartmentId')
                                ->join('grades','grades.gradeId','=','class_rooms.grade')
                                ->join('sections','sections.sectionId','=','class_rooms.section')
                                ->select('student_marks.marks AS marks',
                                'semesters.semesterName AS semesterName',
                                'details.firstname AS firstName',
                                'students.studentDepartmentId AS studentDepartmentId',
                                'students.studentId AS studentId',
                                'details.lastname AS lastName',
                                'class_rooms.grade AS gradeName',
                                'sections.sectionName AS sectionName',
                                'subjects.subjectName AS subjectName',
                                'semesters.semesterId AS semesterId',
                                'grades.grade AS gradeName',
                                )->get()
                                ))>0)

              @foreach(($studentDetails = \App\Models\student::where('students.batchId','=',$currentBatchId)
                            ->join('details','details.detailId','=','students.studentDetailsId')
                            ->join('semesters','semesters.semesterId','=','students.studentSemester')
                            ->join('class_rooms','class_rooms.classroomDetailId','=','students.studentClassroom')
                            ->join('student_marks','student_marks.studentId','=','students.studentId')
                            ->join('departments','departments.departmentId','=','students.studentDepartmentId')
                            ->join('grades','grades.gradeId','=','class_rooms.grade')
                            ->join('sections','sections.sectionId','=','class_rooms.section')
                            ->select('semesters.semesterName AS semesterName',
                            'details.firstname AS firstName',
                            'students.studentDepartmentId AS studentDepartmentId',
                            'students.studentId AS studentId',
                            'details.lastname AS lastName',
                            'student_marks.student_marksId AS student_marksId',
                            'class_rooms.grade AS gradeName',
                            'sections.sectionName AS sectionName',
                            'sections.sectionId AS sectionId',
                            'semesters.semesterId AS semesterId',
                            'grades.grade AS gradeName',
                            'grades.gradeId AS gradeId',
                            'class_rooms.classroomDetailId AS classroomDetailId'
                            )
                            ->groupBy('students.studentId')
                            ->get()
                            ) as  $studentDetail)

                            <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Grade</th>
                    <th>Section</th>
                    <th>Semester</th>
                    <th>Add Marks</th>
                    <th>View Details</th>
                  </tr><tr class="department{{$studentDetail->studentDepartmentId}}department semester{{$studentDetail->semesterId}}semester section{{$studentDetail->sectionId}}section grade{{$studentDetail->gradeId}}grade">
                      <td>{{$studentDetail->firstName}} {{$studentDetail->lastName}}</td>
                      <td>{{$studentDetail->gradeName}}</td>
                      <td>{{$studentDetail->sectionName}}</td>
                      <td>{{$studentDetail->semesterName}}</td>
                      <td><button type="button" name="submitMarkDetailsCreation{{$studentDetail->studentId}}" class="btn btn-primary form-control" data-toggle="modal" data-target="#submitMarkDetailsCreation{{$studentDetail->studentId}}">Add</button></td>
                      <td><button type="button" name="editDeleteMarksDetailsPrint{{$studentDetail->studentId}}" class="btn btn-primary" data-toggle="modal" data-target="#editDeleteMarksDetailsPrint{{$studentDetail->studentId}}">View</button></td>
                    </tr>
                          </thead>
                        </table>
<!--
Print marksheet
 -->
 <div class="modal fade" id="editDeleteMarksDetailsPrint{{$studentDetail->studentId}}" id="editDeleteMarksDetailsPrint"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add marks of {{$studentDetail->firstName}} {{$studentDetail->lastName}}</h5>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body" id="subjectsList">


                            <h2>Grade : {{$studentDetail->gradeName}}</h2>
                            <h2>Subject Name : </h2>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Subject Name</th>
                                  <th>Marks </th>
                                  <th>Total Marks</th>
                                </tr>
                              </thead>
                                <tbody>

                              @foreach(($studentMarks = \App\Models\studentMarks::join('subjects','subjects.subjectId','=','student_marks.subjectId')
                                                ->where('student_marks.batchId','=',$currentBatchId)
                                                ->where('student_marks.studentId','=',$studentDetail->studentId)
                                                ->where('subjects.semesterId','=',$studentDetail->semesterId)
                                                ->where('subjects.departmentId','=',$studentDetail->studentDepartmentId)
                                                ->select('subjects.subjectName AS subjectName','subjects.subjectMaxMarks as subjectMaxMarks','student_marks.marks AS marks','student_marks.student_marksId  AS student_marksId')
                                                ->get()) as  $subject)

                                                  <tr>
                                                    <td>{{$subject->subjectName}}</td>
						                                        <td>{{$subject->marks}}</td>
                                                    <td>{{$subject->subjectMaxMarks}}</td>
                                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                            <a href="{{ action('\App\Http\Controllers\DomPdfController@getPdf',['studentId'=>$studentDetail->studentId]) }}">Print</a>
                                                                          </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         </div>

                                            </div>
                                          </div>
                                        </div>
                    <!--
Create Marks
                   -->

                   <!--

                   For creation
                   -->
                   <div class="modal fade" id="submitMarkDetailsCreation{{$studentDetail->studentId}}" id="adminStudentStudentMarksCreation"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add marks of {{$studentDetail->firstName}} {{$studentDetail->lastName}}</h5>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body" id="subjectsList">


                            <h2>Grade : {{$studentDetail->gradeName}}</h2>
                            <h2>Subject Name : </h2>
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Delete</th>
                                  <th>Subject Name</th>
                                  <th>Mark</th>
                                  <th>Subject Maximum Mark</th>
                                </tr>
                              </thead>
                                <tbody>

                              @foreach(($studentMarks = \App\Models\studentMarks::join('subjects','subjects.subjectId','=','student_marks.subjectId')
                                                ->where('student_marks.batchId','=',$currentBatchId)
                                                ->where('student_marks.studentId','=',$studentDetail->studentId)
                                                ->where('subjects.semesterId','=',$studentDetail->semesterId)
                                                ->where('subjects.departmentId','=',$studentDetail->studentDepartmentId)
                                                ->select('subjects.subjectName AS subjectName','subjects.subjectMaxMarks as subjectMaxMarks','student_marks.marks AS marks','student_marks.student_marksId  AS student_marksId')
                                                ->get()) as  $subject)

                                                  <tr><form action="{{route('studentMarks.deleteMarksEntryAdmin',['studentMark'=>$studentDetail->student_marksId])}}" method="POST" name="deleteStudentSubjectMarks" id="deleteStudentSubjectMarks">
                                                    {{ csrf_field() }}{{ method_field('POST')}}<input type="hidden" name="subjectMarkIdDelete" value="{{$subject->student_marksId}}"></input>
                                                    <td><input type="hidden" name="subjectMarkIdDelete[]" value="{{$subject->student_marksId}}"></input><button type="submit" class="btn btn-primary form-control">Delete</button>{{Form::close()}}</td>
                                                    <form action="{{route('studentMarks.updateMarksTeacher',['studentMark'=>$studentDetail->student_marksId])}}" method="POST" name="createStudentSubjectMarks" id="createStudentSubjectMarks">
                                                    {{ csrf_field() }}{{ method_field('POST')}}
                                                    <td>{{$subject->subjectName}}</td>
                                                    <td><input type="hidden" name="student_marksId[]" value="{{$subject->student_marksId}}"></input>
                                                    <input type="number" class='form-control' name="subjectMark[]" value="{{$subject->marks}}"></input></td>
                                                    <td>{{$subject->subjectMaxMarks}}</td>
                                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                            <button type="submit" class="btn btn-primary form-control">Submit</button>{{Form::close()}}
                                                                          </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         </div>

                                            </div>
                                          </div>
                                        </div>
                  @endforeach
              @else
                <h2 style="color:red;">List is empty</h2>
              @endif
                </div>
            </div>
        </div>
    </div>


    <!--
Marks Creation
   -->

  <script src="{{ asset('js/filter.js') }}" defer></script>
                     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
                     <script src="{{ asset('js/Admin/student.js') }}" defer></script>
</x-app-layout>
