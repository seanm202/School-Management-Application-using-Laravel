<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }} @if ($errors->any())
               <div class="alert alert-danger">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
            @endif
        </h2>
    </x-slot>

    @if ( Auth::user()->role != 2)

        <script type="text/javascript">
        window.location = "{{url('logout')}}";//here double curly bracket
        </script>
      @endif


<!--

Add students
 -->


 <div class="py-12" id="teacherStudentAddStudent">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Add Students

        @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

               <form data-action="{{route('detail.createStudentTeacher')}}" method="POST" name="formIdNow" id="formIdNow">
              {{ csrf_field() }}{{ method_field('POST') }}
                 <table class="table">
               <thead>

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
                 <td>{{Form::text('phone',NULL,array('placeholder'=>'Enter Phone Number','class'=>'form-control','id'=>'phone'))}} </td></tr>{{Form::hidden('password',"abcd1234")}}
                   <tr>
                   <th>Age</th>
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
                     <td>{{Form::text('bloodGroup',NULL,array('placeholder'=>'Enter bloodGroup','class'=>'form-control','id'=>'bloodGroup'))}}</td></tr>
               <tr>
                 <th>Identification Mark</th>
                 <td>{{Form::text('identificationMark',NULL,array('placeholder'=>'Enter Identification Mark','class'=>'form-control','id'=>'identificationMark'))}}</td></tr>
           <tr>
             <th>Parent Number</th>
             <td>{{Form::text('parentNumber',NULL,array('placeholder'=>'Enter Parent Number','class'=>'form-control','id'=>'parentNumber'))}}</td></tr>
       <tr>
         <th>Home Phone Number</th>
         <td>{{Form::text('homePhoneNumber',NULL,array('placeholder'=>'Home Phone Number','class'=>'form-control','id'=>'homePhoneNumber'))}}</td></tr>
   <tr>
     <th>Father/Spouse Name</th>
     <td>{{Form::text('fatherSpouseName',NULL,array('placeholder'=>'Enter Father/Spouse Name','class'=>'form-control','id'=>'fatherSpouseName'))}}</td></tr>
<tr>
  <th>Mother Name</th>
  <td>{{Form::text('motherName',NULL,array('placeholder'=>'Enter Mother Name','class'=>'form-control','id'=>'motherName'))}}</td></tr>
<tr>
  <th>Guardian Name</th>
  <td>{{Form::text('guardianName',NULL,array('placeholder'=>'Enter Guardian Name','class'=>'form-control','id'=>'guardianName'))}}</td></tr>
  <tr>
      <th>Status</th>
      <td><select name="statusId" class="form-control">
        @foreach($statuses=\App\Models\Status::where('statusForRoles','=',3) as $status)
        {{$status->statusName}}
      @endforeach
    </select>
      </td>
    </tr>
                 </thead>
               </table>
               <!-- {{Form::submit('Save',array('class'=>'btn btn-primary'))}} -->
  <button type="submit" class="btn btn-primary form-control" >Submit</button>
                                     {{Form::close()}}
             </div>
         </div>
     </div>
 </div>

<!--
Edit student details
 -->

 <div class="py-12" id="teacherStudentAddStudent">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Edit student details

             </div>
         </div>
     </div>
 </div>

<!--
Edit student details
 -->


     <div class="py-12" id="teacherStudentAddStudentMarks">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                   <h2>Add student Marks</h2>
                   @if(count(($studentDetails = \App\Models\student::where('students.batchId','=',$currentBatchId)
                                 ->join('details','details.detailId','=','students.studentDetailsId')
                                 ->join('semesters','semesters.semesterId','=','students.studentSemester')
                                 ->join('class_rooms','class_rooms.classroomDetailId','=','students.studentClassroom')
                                 ->join('student_marks','student_marks.studentId','=','students.studentId')
                                 ->join('subjects','subjects.subjectId','=','student_marks.subjectId')
                                 ->join('departments','departments.departmentId','=','students.studentDepartmentId')
                                 ->join('grades','grades.gradeId','=','class_rooms.grade')
                                 ->join('sections','sections.sectionId','=','class_rooms.section')
                                 ->join('subject_teacher_for_each_sections','subject_teacher_for_each_sections.classRoomId','=','class_rooms.classroomDetailId')
                                 ->join('teachers','teachers.teacherId','=','subject_teacher_for_each_sections.teacherId')
                                 ->where('teachers.teacherId','=',(\App\Models\teacher::where('teachers.userId','=',Auth::user()->userId)->select('teacherId')->first())->teacherId)
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
                                 <table class="table">
                     <thead>
                       <tr>
                         <th>Name</th>
                         <th>Grade</th>
                         <th>Section</th>
                         <th>Semester</th>
                         <th>Add Marks</th>
                         <th>View Details</th>
                       </tr>

               @foreach(($studentDetails = \App\Models\student::where('students.batchId','=',$currentBatchId)
                             ->join('details','details.detailId','=','students.studentDetailsId')
                             ->join('semesters','semesters.semesterId','=','students.studentSemester')
                             ->join('class_rooms','class_rooms.classroomDetailId','=','students.studentClassroom')
                             ->join('student_marks','student_marks.studentId','=','students.studentId')
                             ->join('departments','departments.departmentId','=','students.studentDepartmentId')
                             ->join('grades','grades.gradeId','=','class_rooms.grade')
                             ->join('sections','sections.sectionId','=','class_rooms.section')
                             ->join('subject_teacher_for_each_sections','subject_teacher_for_each_sections.classRoomId','=','class_rooms.classroomDetailId')
                             ->join('teachers','teachers.teacherId','=','subject_teacher_for_each_sections.teacherId')
                             ->where('teachers.teacherId','=',(\App\Models\teacher::where('teachers.userId','=',Auth::user()->userId)->select('teacherId')->first())->teacherId)
                             ->select('semesters.semesterName AS semesterName',
                             'details.firstname AS firstName',
                             'students.studentDepartmentId AS studentDepartmentId',
                             'students.studentId AS studentId',
                             'details.lastname AS lastName',
                             'class_rooms.grade AS gradeName',
                             'sections.sectionName AS sectionName',
                             'semesters.semesterId AS semesterId',
                             'grades.grade AS gradeName',
                             'grades.gradeId AS gradeId',
                             'teachers.teacherId AS teacherId',
                             'student_marks.marks AS studentMarks',
                             'class_rooms.classroomDetailId AS classroomDetailId'
                             )
                             ->groupBy('students.studentId')
                             ->get()
                             ) as  $studentDetail)
                     <tr>
                       <td>{{$studentDetail->firstName}} {{$studentDetail->lastName}}</td>
                       <td>{{$studentDetail->gradeName}}</td>
                       <td>{{$studentDetail->sectionName}}</td>
                       <td>{{$studentDetail->semesterName}}</td>
                       <td><button type="button" name="submitMarkDetailsCreation{{$studentDetail->studentId}}" class="btn btn-primary form-control" data-toggle="modal" data-target="#submitMarkDetailsCreation{{$studentDetail->studentId}}">Add</button></td>
                       <!-- <td><button type="button" name="editDeleteMarksDetailsUpdation{{$studentDetail->studentId}}" id="editDeleteMarksDetailsUpdation{{$studentDetail->studentId}}" class="btn btn-primary" data-toggle="modal" data-target="#editDeleteMarksDetailsUpdation{{$studentDetail->studentId}}">View</button></td> -->
                     </tr>
                           </thead>
                         </table>

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


                             <table class="table">
                               <thead>
                                 <tr>
                                   <th>Subject Name</th>
                                   <th>Mark</th>
                                   <th>Subject Maximum Mark</th>
                                 </tr>
                               </thead>
                                 <tbody>
                                   <form data-action="{{route('studentMarks.updateMarksTeacher',['studentMarks'=>$studentDetail->student_marksId])}}" method="POST" name="updateMarksTeacher" id="updateMarksTeacher">
                                   {{ csrf_field() }}{{ method_field('POST')}}
                               @foreach(($studentMarks = \App\Models\studentMarks::join('subjects','subjects.subjectId','=','student_marks.subjectId')
                                                 ->join('subject_teacher_for_each_sections','subject_teacher_for_each_sections.classRoomId','=','student_marks.classRoomId')
                                                 ->join('teachers','teachers.teacherId','=','subject_teacher_for_each_sections.teacherId')
                                                 ->where('teachers.teacherId','=',$studentDetail->teacherId)
                                                 ->where('student_marks.batchId','=',$currentBatchId)
                                                 ->where('student_marks.studentId','=',$studentDetail->studentId)
                                                 ->where('subjects.semesterId','=',$studentDetail->semesterId)
                                                 ->where('subjects.departmentId','=',$studentDetail->studentDepartmentId)
                                                 ->select('subjects.subjectName AS subjectName','subjects.subjectMaxMarks as subjectMaxMarks','student_marks.marks AS marks','student_marks.student_marksId  AS student_marksId')
                                                 ->get()) as  $subject)

                                                   <tr>
                                                     <td>{{$subject->subjectName}}</td>
                                                     <td><input type="hidden" name="student_marksId[]" value="{{$subject->student_marksId}}"></input>
                                                     <input type="number" class="form-control" name="subjectMark[]" value="{{$subject->marks}}"></input></td>
                                                     <td>{{$subject->subjectMaxMarks}}</td>
                                                   </tr>
                               @endforeach
                             </tbody>
                           </table>
                             <button type="submit" class="btn btn-primary form-control" >Submit</button>{{Form::close()}}
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



   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/Teacher/student.js') }}" defer></script>
</x-app-layout>
