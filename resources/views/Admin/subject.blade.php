<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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

<!--




 -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Subjects') }}
           <br>
           <button class="btn btn-primary" id="menu-toggle" style="position:fixed;background-color: white;color:black;">Menu</button>@if(Session::has('success'))
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
          <a href="#createASubject" class="list-group-item list-group-item-action bg-light">Add Subjects</a>
          <a href="#updateSubject" class="list-group-item list-group-item-action bg-light">Update Subjects</a>
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

<!--

 -->

    <div class="py-12" id="createASubject">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Add Subject
                        <br>

 <form action="{{route('subject.storeSubject')}}" method="POST"  enctype="multipart/form-data" name="createSubject" id="createSubject">
 @csrf

   <table class="table">
 <thead>
<tr>
<th>Grade : </th>
<td><select name="subjectGrade" id="subjectGrade" class="form-control">
    <option value="0" selected>Select Grade : </option>
@if(count($grades = \App\Models\grade::where('grades.batchId','=',$currentBatchId)->get())>0)
 @foreach(($grades = \App\Models\grade::where('grades.batchId','=',$currentBatchId)->get()) as  $grade)
     <option value="{{$grade->gradeId}}">{{$grade->grade}}</option>
 @endforeach
@endif
</select></td></tr>
   <tr>
<th>Department : </th>
<td><select name="departmentId" id="departmentId" class="form-control">
    <option value="0" selected>Select Department : </option>
@if(count($departments = \App\Models\Department::where('departments.batchId','=',$currentBatchId)->get())>0)
 @foreach(($departments = \App\Models\Department::where('departments.batchId','=',$currentBatchId)->get()) as  $department)
    <option value="{{$department->departmentId}}">{{$department->departmentName}}</option>
 @endforeach
@endif
</select></td></tr>

         <tr>
     <th>Semester : </th>
   <td><select name="semesterId" id="semesterId" class="form-control">
      <option value="0" selected>Select Semester : </option>
     @if(count($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get())>0)
       @foreach(($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get()) as  $semester)
        <option value="{{$semester->semesterId}}">{{$semester->semesterName}}</option>
       @endforeach
     @endif
     </select></td></tr>
   <tr>
       <th>Subject Name : </th>
       <td>{{Form::text('subjectName',NULL,array('placeholder'=>'Enter Subject Name ','class'=>'form-control','id'=>'subjectName'))}}</td></tr>
       <tr>
         <th>Subject Maximum Marks : </th>
         <td>{{Form::text('subjectMaxMarks',NULL,array('placeholder'=>'Subject Maximum Marks','class'=>'form-control','id'=>'subjectMaxMarks'))}}</td></tr>
         <tr>
           <th>Subject Text Name : </th>
           <td>{{Form::text('subjectTextName',NULL,array('placeholder'=>'Textbook Name','class'=>'form-control','id'=>'subjectTextName'))}}</td></tr>
           <tr>
             <th>Subject Code : </th>
             <td>{{Form::text('subjectCode',NULL,array('placeholder'=>'Subject Code','class'=>'form-control','id'=>'subjectCode'))}}</td></tr>
             <tr>
               <th>Theory Or Lab : </th>
               <td>
               <select name="torLab">
                 <option value="Theory">Theory</option>
                   <option value="Lab">Lab</option>')
                </select></td></tr>
           <tr>
             <th>Subject Priority : </th>
             <td><select name="subjectPriority" class="form-control">
             @foreach(($priorities = \App\Models\Priority::all()) as $priority)
               <option value="{{$priority->priorityId}}">{{$priority->priorityName}} ( {{$priority->priorityValue}} ) </option>
             @endforeach
           </select></td></tr>
           <tr>
             <th>Submit</th>
             <td><button type="submit" class="btn btn-primary form-control">Save</button>{{Form::close()}}</td></tr>




         </thead>
         </table>


<!--



 -->
                    </div>
                </div>
            </div>
        </div>




    <div class="py-12" id="updateSubject">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        View/Edit Subjects
                        <br>

                        Subjects<br>
              @if(count($subjects = \App\Models\subject::where('subjects.batchId','=',$currentBatchId)->get())>0)
                <table class="table">
                  <thead>
                    <tr>
                      <th>Grade : </th>
                      <th>Department : </th>
                      <th>Semester : </th>
                      <th>View List</th>
                    </tr>
                  @foreach(($subjects = \App\Models\subject::where('subjects.batchId','=',$currentBatchId)
                    ->join('semesters','semesters.semesterId','=','subjects.semesterId')
                    ->join('grades','grades.gradeId','=','subjects.subjectGrade')
                    ->join('departments','departments.departmentId','=','subjects.departmentId')
                    ->orderBy('gradeId','DESC')
                    ->orderBy('semesters.semesterId','ASC')
                    ->groupBy('departmentId')
                    ->select('semesters.semesterId AS semesterId',
                    'semesters.semesterName AS semesterName',
                    'departments.departmentId AS departmentId',
                    'departments.departmentName as departmentName',
                    'grades.gradeId AS gradeId',
                    'grades.grade AS gradeName',
                    'subjects.subjectId AS subjectId',
                    'subjects.subjectName AS subjectName',
                    'subjects.subjectMaxMarks AS subjectMaxMarks',
                    'subjects.subjectTextName AS subjectTextName',
                    'subjects.subjectCode AS subjectCode',
                    'subjects.torlab AS torlab'
                    )->get()) as  $subject)

                         <tr style="padding:5px;padding-left:20px;padding-right:20px;">
                          <td style="padding:5px;padding-left:20px;padding-right:20px;">{{$subject->gradeName}}
                          </td>
                            <td style="padding:5px;padding-left:20px;padding-right:20px;">{{$subject->departmentName}}
                           </td>
                      <td style="padding:5px;padding-left:20px;padding-right:20px;">{{$subject->semesterName}}
                         </td>
                         <td style="padding:5px;padding-left:20px;padding-right:20px;"><button type="button" name="submitSelectedSubjectDetails{{$subject->subjectId}}" id="submitSelectedSubjectDetail{{$subject->subjectId}}" class="btn btn-primary" data-toggle="modal" data-target="#submitSelectedSubjectDetails{{$subject->subjectId}}">View</button></td>
                    </tr>
                            <!--

                            -->
                            <div class="modal fade" id="submitSelectedSubjectDetails{{$subject->subjectId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                          <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Subject List</h5>

                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body" id="subjectsList">

                                                                <form action="{{route('subject.updatesubject',['subject'=>$subject->subjectId])}}" method="POST" name="updateSubject" id="updateSubject">
                                                                {{ csrf_field() }}{{ method_field('POST') }}
                                      {{Form::hidden('subjectId',$subject->subjectId)}}
                                         <h2>Subject Name : </h2>
                                      {{Form::text('subjectName',$subject->subjectName,array('placeholder'=>'Enter Subject Name '))}}
                                      <h2>Subject Grade : </h2>
                                      <select name="subjectGrade" class="form-control">
                                        <option value="0">Select Grade : </option class="form-control">
                                        @foreach(($grades = \App\Models\grade::where('grades.batchId','=',1)->get()) as  $grade)
                                         @if($grade->gradeId==$subject->gradeId)
                                          <option value={{$grade->gradeId}} selected>{{$grade->grade}}</option>
                                         @else
                                          <option value={{$grade->gradeId}}>{{$grade->grade}}</option>
                                         @endif
                                        @endforeach
                                      </select>
                                      <h2>Department : </h2>
                                      <select name="departmentId">
                                          <option value="0">Select Department : </option class="form-control">
                                      @if(count($departments = \App\Models\Department::where('departments.batchId','=',$currentBatchId)->get())>0)
                                       @foreach(($departments = \App\Models\Department::where('departments.batchId','=',$currentBatchId)->get()) as  $department)
                                        @if($department->departmentId==$subject->departmentId)
                                          <option value={{$department->departmentId}} selected>{{$department->departmentName}}</option>
                                         @else
                                          <option value="{{$department->departmentId}}">{{$department->departmentName}}</option>
                                         @endif
                                       @endforeach
                                      @endif
                                      </select>
                                      <h2>Semester : </h2><select name="semesterId" class="form-control">
                                         <option value="0">Select Semester : </option>
                                        @if(count($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get())>0)
                                          @foreach(($semesters = \App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get()) as  $semester)
                                            @if($semester->semesterId==$subject->semesterId)
                                              <option value={{$semester->semesterId}} selected>{{$semester->semesterName}}</option>
                                              @else
                                              <option value={{$semester->semesterId}}>{{$semester->semesterName}}</option>
                                              @endif
                                          @endforeach
                                        @endif
                                        </select><br>
                                     <h2>Subject Maximum Marks : </h2>
                                      {{Form::number('subjectMaxMarks',$subject->subjectMaxMarks,array('placeholder'=>'Subject Maximum Marks','class'=>'form-control'))}}<br>
                                     <h2>Subject Textbook Name : </h2>
                                     {{Form::text('subjectTextName',$subject->subjectTextName,array('placeholder'=>'Textbook Name','class'=>'form-control'))}}<br>
                                    <h2>Subject Code : </h2>
                                    {{Form::text('subjectCode',$subject->subjectCode,array('placeholder'=>'Subject Code','class'=>'form-control'))}}<br>
                                   <h2>Choose Theory/Lab : </h2>
                                   <select name="theoryOrlab">
                                     <option value="Theory">Theory</option>
                                       <option value="Lab">Lab</option>')
                                    </select>
                                       <br>
                                    <h2>Subject Priority : </h2>
                                    <select name="subjectPriority" class="form-control">
                                    @foreach(($priorities = \App\Models\Priority::all()) as $priority)
                                      <option value="{{$priority->priorityId}}">{{$priority->priorityName}} ( {{$priority->priorityValue}} ) </option>
                                    @endforeach
                                  </select> <br>
                                    <h2>Update Subject : </h2><button type="submit" class="btn btn-primary form-control">Save</button><br>
                                        {{Form::close()}}<br>
                                     <h2>Delete</h2>
                                      <form action="{{route('subject.destroysubject',['subject'=>$subject->subjectId])}}" method="POST" name="deleteSubject" id="deleteSubject">
                                      {{ csrf_field() }}{{ method_field('POST') }}
           {{Form::hidden('subjectId',$subject->subjectId)}}  <button type="submit" class="btn btn-primary form-control">Delete</button>
               {{Form::close()}}<br>
            <hr><hr>
                                     <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                     </div>

                                                                                    </div>
                                                                                  </div>
                                                                                </div>
                                                                              </div>


                            <!--

                           -->
                   @endforeach
                    </thead>
                    </table>
                @else
                   <h3 style="color:red;">List is empty</h3>
                @endif
                    </div>
                </div>
            </div>
        </div>

<div class="py-12" id="createASubject">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <h2>Add priority</h2>
<form action="{{route('priority.createPriority')}}" method="POST" name="createPriority" id="createPriority">
                                                  {{ csrf_field() }}{{ method_field('POST') }}
    <h2>Priority name  : </h2>{{Form::text('priorityName','',array('placeholder'=>'Enter Priority Name ','class'=>'form-control'))}}<br><hr>
<h2 for="priorityValue">Priority Value : </h2>
{{Form::text('priorityValue','',array('placeholder'=>'Enter Priority Value ','class'=>'form-control'))}}<br><hr>
<button type="submit" class="btn btn-primary form-control">Save</button>{{Form::close()}}

</div>
              </div>
            </div>
          </div>


          <div class="py-12" id="createASubject">
                  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                          <div class="p-6 text-gray-900">
            @if(count($priorities = \App\Models\Priority::all())>0)
                <table>
                  <tr>
                    <th>Priority Id</th>
                    <th>Priority Name</th>
                    <th>Priority Value</th>
                    <th>Update</th>
                  </tr>
                  @foreach(($priorities = \App\Models\Priority::all()) as  $priority)

                <tr>
                  <td>{{$priority->priorityId}}</td>
                  <form action="{{route('priority.editPriority')}}" method="POST" name="editPriority" id="editPriority">
                                              {{Form::hidden('priorityId',$priority->priorityId)}}              {{ csrf_field() }}{{ method_field('POST') }}
                                              <td>{{Form::text('priorityName',$priority->priorityName,array('placeholder'=>'Enter Priority Name :','class'=>'form-control'))}}</td>
                          <td>{{Form::text('priorityValue',$priority->priorityValue,array('placeholder'=>'Enter Priority Value:','class'=>'form-control'))}}</td>
                          <td><button type="submit" class="btn btn-primary form-control">Save</button>{{Form::close()}}</td>
                  </tr>
                 @endforeach

               </table>
            @endif

          </div>
                        </div>
                      </div>
                    </div>
        <!--

       -->
       <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
       <script src="{{ asset('js/Admin/subject.js') }}" defer></script>

</x-app-layout>
