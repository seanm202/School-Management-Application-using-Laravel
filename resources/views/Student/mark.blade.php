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
            {{ __('Marks') }}
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
        </h2>
    </x-slot>


        @if ( Auth::user()->role != 4)

            <script type="text/javascript">
            window.location = "{{url('logout')}}";//here double curly bracket
            </script>
          @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    View Marks for the current academic year   @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
                @if(count(($subjectMarks=\App\Models\studentMarks::where('student_marks.studentId','=',(\App\Models\student::where('userId','=',Auth::user()->userId)->select('studentId')->first())->studentId)
                                                          ->where('student_marks.batchId','=',$currentBatchId)
                                                          ->where('users.userId','=',Auth::user()->userId)
                                                          ->where('students.status','=',1)
                                                          ->join('class_rooms','class_rooms.classroomDetailId','=','student_marks.classRoomId')
                                                          ->join('students','students.studentId','=','student_marks.studentId')
                                                          ->join('users','users.userId','=','students.userId')
                                                          ->join('details','details.userId','=','users.userId')
                                                          ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                          ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                                          ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                                          ->join('subjects','subjects.subjectId','=','student_marks.subjectId')
                                                          ->join('sections','sections.sectionId','=','class_rooms.section')
                                                          ->select('grades.grade AS grade',
                                                          'sections.sectionName AS sectionName',
                                                          'semesters.semesterName AS semesterName',
                                                          'departments.departmentName AS departmentName',
                                                          'departments.departmentId AS departmentId',
                                                          'sections.sectionId AS sectionId',
                                                          'grades.gradeId AS gradeId',
                                                          'semesters.semesterId AS semesterId',
                                                          'students.studentId AS studentId',
                                                          'student_marks.marks AS subjectMarkCurrent',
                                                          'subjects.subjectName AS subjectName',
                                                          'student_marks.student_marksId AS student_marksId',
                                                          'details.lastname AS lastName',
                                                          'details.firstname AS firstName'
                                                          )->get()
                                                          ))>0)
                                                          @foreach(($subjectMarks=\App\Models\studentMarks::where('student_marks.studentId','=',(\App\Models\student::where('userId','=',Auth::user()->userId)->select('studentId')->first())->studentId)
                                                              ->where('student_marks.batchId','=',$currentBatchId)
                                                              ->where('users.userId','=',Auth::user()->userId)
                                                              ->where('students.status','=',1)
                                                              ->join('class_rooms','class_rooms.classroomDetailId','=','student_marks.classRoomId')
                                                              ->join('students','students.studentId','=','student_marks.studentId')
                                                              ->join('users','users.userId','=','students.userId')
                                                              ->join('details','details.userId','=','users.userId')
                                                              ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                              ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                                              ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                                              ->join('subjects','subjects.subjectId','=','student_marks.subjectId')
                                                              ->join('sections','sections.sectionId','=','class_rooms.section')
                                                              ->select('grades.grade AS grade',
                                                              'sections.sectionName AS sectionName',
                                                              'semesters.semesterName AS semesterName',
                                                              'departments.departmentName AS departmentName',
                                                              'departments.departmentId AS departmentId',
                                                              'sections.sectionId AS sectionId',
                                                              'grades.gradeId AS gradeId',
                                                              'semesters.semesterId AS semesterId',
                                                              'students.studentId AS studentId',
                                                              'student_marks.marks AS subjectMarkCurrent',
                                                              'subjects.subjectName AS subjectName',
                                                              'student_marks.student_marksId AS student_marksId',
                                                              'details.lastname AS lastName',
                                                              'details.firstname AS firstName'
                                                              )->get()
                                                              ) as $subjectMark)
                                                              <div style="display:flex;">
                                                                <div>
                                                                  <h2>SubjectName : {{$subjectMark->subjectName}}</h2>
                                                                </div> <div style="padding:20px;"></div>
                                                                <div>
                                                                  <h2>SubjectMarks : {{$subjectMark->subjectMarkCurrent}}</h2>
                                                                  </div> <div style="padding:20px;"></div>
                                                                  <div><h2>Subject Maximum Marks {{$subjectMark->subjectMaxMarks}}</h2></div>
                                                                  </div>
                                                      @endforeach

                  @else
                    <h3 style="color:red;">List is empty!</h3>
                  @endif
              </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    View Marks of the previous academic years
                @if(count(($studentMarks=\App\Models\studentMarks::where('student_marks.studentId','=',(\App\Models\student::where('userId','=',Auth::user()->userId)->select('studentId')->first())->studentId)
                                                          ->where('student_marks.batchId','=',$currentBatchId)
                                                          ->where('users.userId','=',Auth::user()->userId)
                                                          ->join('class_rooms','class_rooms.classroomDetailId','=','student_marks.classRoomId')
                                                          ->join('students','students.studentId','=','student_marks.studentId')
                                                          ->join('users','users.userId','=','students.userId')
                                                          ->join('details','details.userId','=','users.userId')
                                                          ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                          ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                                          ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                                          ->join('subjects','subjects.subjectId','=','student_marks.subjectId')
                                                          ->join('sections','sections.sectionId','=','class_rooms.section')
                                                          ->join('batches','batches.batchId','=','student_marks.batchId')
                                                          ->select('grades.grade AS grade',
                                                          'sections.sectionName AS sectionName',
                                                          'semesters.semesterName AS semesterName',
                                                          'departments.departmentName AS departmentName',
                                                          'departments.departmentId AS departmentId',
                                                          'sections.sectionId AS sectionId',
                                                          'grades.gradeId AS gradeId',
                                                          'semesters.semesterId AS semesterId',
                                                          'students.studentId AS studentId',
                                                          'student_marks.marks AS subjectMarkCurrent',
                                                          'subjects.subjectName AS subjectName',
                                                          'student_marks.student_marksId AS student_marksId',
                                                          'details.lastname AS lastName',
                                                          'details.firstname AS firstName',
                                                          'batches.batchName AS batchName '
                                                          )->get()
                                                          ))>0)
                    @foreach(($studentMarks=\App\Models\studentMarks::where('student_marks.studentId','=',(\App\Models\student::where('userId','=',Auth::user()->userId)->select('studentId')->first())->studentId)
                                                              ->where('student_marks.batchId','=',$currentBatchId)
                                                              ->where('users.userId','=',Auth::user()->userId)
                                                              ->join('class_rooms','class_rooms.classroomDetailId','=','student_marks.classRoomId')
                                                              ->join('students','students.studentId','=','student_marks.studentId')
                                                              ->join('users','users.userId','=','students.userId')
                                                              ->join('details','details.userId','=','users.userId')
                                                              ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                              ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                                              ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                                              ->join('subjects','subjects.subjectId','=','student_marks.subjectId')
                                                              ->join('sections','sections.sectionId','=','class_rooms.section')
                                                              ->join('batches','batches.batchId','=','student_marks.batchId')
                                                              ->select('grades.grade AS grade',
                                                              'sections.sectionName AS sectionName',
                                                              'semesters.semesterName AS semesterName',
                                                              'departments.departmentName AS departmentName',
                                                              'departments.departmentId AS departmentId',
                                                              'sections.sectionId AS sectionId',
                                                              'grades.gradeId AS gradeId',
                                                              'semesters.semesterId AS semesterId',
                                                              'students.studentId AS studentId',
                                                              'student_marks.marks AS subjectMarkCurrent',
                                                              'subjects.subjectName AS subjectName',
                                                              'student_marks.student_marksId AS student_marksId',
                                                              'details.lastname AS lastName',
                                                              'details.firstname AS firstName',
                                                              'batches.batchId AS batchId',
                                                              'batches.batchName AS batchName',
                                                              'class_rooms.classroomDetailId AS classRoomId'
                                                              )->get()
                                                              ) as $studentMark)
                                                              <div style="display:flex;">
                                                                <div>
                                                                  <h2>Batch Name : {{$studentMark->batchName}}</h2>
                                                                </div> <div style="padding:20px;"></div>
                                                                <div>
                                                                  <h2>View : </h2>
                                                                  </div> <div style="padding:20px;"></div>
                                                                  <div><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#getSelectedClassStudentList{{$studentMark->classRoomId}}">
                                                                      View
                                                                    </button></div>
                                                                  </div>
<!--

Select marks of chosen year

 -->
 <div class="modal fade" id="getSelectedClassStudentList{{$studentMark->classRoomId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         Student Marks
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

         @foreach(($subjectMarks=\App\Models\studentMarks::where('student_marks.studentId','=',(\App\Models\student::where('userId','=',Auth::user()->userId)->select('studentId')->first())->studentId)
                                                  ->where('student_marks.batchId','=',$currentBatchId)
                                                   ->where('users.userId','=',Auth::user()->userId)
                                                   ->where('students.status','=',1)
                                                   ->where('students.batchId','=',$studentMark->batchId)
                                                   ->join('class_rooms','class_rooms.classroomDetailId','=','student_marks.classRoomId')
                                                   ->join('students','students.studentId','=','student_marks.studentId')
                                                   ->join('users','users.userId','=','students.userId')
                                                   ->join('details','details.userId','=','users.userId')
                                                   ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                   ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                                   ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                                   ->join('subjects','subjects.subjectId','=','student_marks.subjectId')
                                                   ->join('sections','sections.sectionId','=','class_rooms.section')
                                                   ->select('grades.grade AS grade',
                                                   'sections.sectionName AS sectionName',
                                                   'semesters.semesterName AS semesterName',
                                                   'departments.departmentName AS departmentName',
                                                   'departments.departmentId AS departmentId',
                                                   'sections.sectionId AS sectionId',
                                                   'grades.gradeId AS gradeId',
                                                   'semesters.semesterId AS semesterId',
                                                   'students.studentId AS studentId',
                                                   'student_marks.marks AS subjectMarkCurrent',
                                                   'subjects.subjectName AS subjectName',
                                                   'student_marks.student_marksId AS student_marksId',
                                                   'details.lastname AS lastName',
                                                   'details.firstname AS firstName'
                                                   )->get()
                                                   ) as $subjectMark)
                                                   <div style="display:flex;">
                                                     <div>
                                                       <h2>SubjectName : {{$subjectMark->subjectName}}</h2>
                                                     </div> <div style="padding:20px;"></div>
                                                     <div>
                                                       <h2>SubjectMarks : {{$subjectMark->subjectMarkCurrent}}</h2>
                                                       </div> <div style="padding:20px;"></div>
                                                       <div><h2>Subject Maximum Marks {{$subjectMark->subjectMaxMarks}}</h2></div>
                                                       </div>
                                           @endforeach
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
</x-app-layout>
