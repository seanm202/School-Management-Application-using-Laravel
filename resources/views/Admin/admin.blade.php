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

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          <h2>{{ __('Admin') }}</h2>
          <br>
          <button class="btn btn-primary" id="menu-toggle" style="position:fixed;background-color: white;color:black;">Menu</button>
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
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div>


    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
      <div class="sidebar-heading">MySchool </div>
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#createTheAdmin" class="list-group-item list-group-item-action bg-light">Add Admin</a>
          <a href="#updateTheBatches" class="list-group-item list-group-item-action bg-light">Update Batches</a>
          <a href="#createTheBatches" class="list-group-item list-group-item-action bg-light">Add Batches</a>
          <a href="#deleteTheDepartments" class="list-group-item list-group-item-action bg-light">Edit/Delete Departments</a>
          <a href="#addTheDepartments" class="list-group-item list-group-item-action bg-light">Add Departments</a>
          <a href="#editTheSemesters" class="list-group-item list-group-item-action bg-light">Edit Delete Semesters</a>
          <a href="#addTheSemesters" class="list-group-item list-group-item-action bg-light">Add Semester</a>
          <a href="#editDayName" class="list-group-item list-group-item-action bg-light">Edit Day Name</a>
          <a href="#addTheDay" class="list-group-item list-group-item-action bg-light">Add Day Name</a>
          <a href="#editTheHourName" class="list-group-item list-group-item-action bg-light">Edit Hour</a>
          <a href="#addTheHour" class="list-group-item list-group-item-action bg-light">Add Hour</a>
          <a href="#generateAttendanceForTeachers" class="list-group-item list-group-item-action bg-light">Generate Timetable</a>
          <a href="#deleteTodaysAttendence" class="list-group-item list-group-item-action bg-light">Delete Attendance</a>
          <a href="#updateTheStatus" class="list-group-item list-group-item-action bg-light">Edit Status</a>
          <a href="#createTheStatus" class="list-group-item list-group-item-action bg-light">Add Status</a>
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



    <div class="py-12" id="createTheAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900"  style="overflow-x:scroll;">
                  Add Admin   @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
                  <form action="{{route('detail.createAdmin')}}" method="POST"  enctype="multipart/form-data" name="addAdminAdmin" id="addAdminAdmin">
                  @csrf
                    <table class="table">
                  <thead>
                    <tr>
                      <th>Salutation</th>
                      <td>
                      <select name="salutation">
                           <option value="Mr./Ms." selected>Mr./Ms.</option>
                           <option value="Mr">Mr.</option>
                           <option value="Mr">Mr.</option>
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
                      <th>Age</th>{{Form::hidden('password',(\App\Models\ConstantController::where('constantName','defaultPassword')->select('constantValue')->first()))}}
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
                      <button type="submit" class="btn btn-primary form-control form-control">Save</button>

                                        {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

 <div class="py-12" id="updateTheBatches">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
              @if(count($batches = \App\Models\batch::all())>0)
               Update Batch Details / Delete Batch
               <table class="table">
               <thead>
               <th>Batch Name</th>
               <th>View</th>
               </thead>
               <tbody>
               @foreach(($batches = \App\Models\batch::all()) as $batch)
                  @if($batch->status!=1)
                     <tr>{{Form::hidden('currentBatchId',$batch->batchId,array('id'=>'batchId'))}}
                       <td>{{$batch->batchName}}</td>
                   <td><button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModalUpdateBatches{{$batch->batchId}}">View</button></td>
                   </tr>
                @else
                 <tr style="background:green;color:white;">
                   <td>{{$batch->batchName}}</td>
                   <td><button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModalUpdateBatches{{$batch->batchId}}">View</button></td>
                  </tr>
                @endif
                 <div class="modal fade" id="myModalUpdateBatches{{$batch->batchId}}">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Modal Heading</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <form action="{{route('batch.updatebatch',['batch'=>$batch->batchId])}}" method="POST"  enctype="multipart/form-data"  name="updateBatches" id="updateBatches">
                          {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('batchId',$batch->batchId,array('id'=>'batchId'))}}
                          {{Form::label('batchName','Batch Name : ')}}{{Form::text('batchName',$batch->batchName,array('class'=>'form-control','id'=>'batchName'))}}
                          {{Form::label('startingYear','Starting Year : ')}}{{Form::text('batchStartingYear',$batch->batchStartingYear,array('class'=>'form-control','id'=>'batchStartingYear'))}}
                          {{Form::hidden('status',$batch->status,array('id'=>'status'))}}
                          {{Form::label('endingYear','Ending Year : ')}}{{Form::text('batchEndingYear',$batch->batchEndingYear,array('class'=>'form-control','id'=>'batchEndingYear'))}}
                        <button type="submit" class="btn btn-primary form-control">Update</button>{{Form::close()}}
                          <form action="{{route('batch.currentBatch',['batch'=>$batch->batchId])}}" method="POST"   enctype="multipart/form-data" name="currentBatch" id="currentBatch">
                            {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('batchId',$batch->batchId)}}
                          <button type="submit" class="btn btn-primary form-control">Assign</button>{{Form::close()}}

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                   </div>
              @endforeach
             </tbody>
              </table>
          @else
            <h3 style="color:red;">List is empty<h3>
          @endif
             </div>
         </div>
     </div>
 </div>


 <!-- Add batches

 -->


 <div class="py-12" id="createTheBatches">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            Add Batches
            <form action="{{route('batch.createbatch')}}" method="post" enctype="multipart/form-data" name="createBatches" id="createBatches">
            {{ csrf_field() }}

                    <div>
                      <div>{{Form::label('Batch Name','Batch Name')}}</div>
                    <div>{{Form::text('batchName',NULL,array('placeholder'=>'Enter Batch Name : ','class'=>'form-control','id'=>'batchName'))}}</div><div style="padding:20px;"></div>
                    <div>{{Form::label('Batch StartingYear','Batch Starting Year')}}</div>
                    <div>{{Form::text('batchStartingYear',NULL,array('placeholder'=>'Enter Starting Year','class'=>'form-control','id'=>'batchStartingYear'))}}</div><div style="padding:20px;"></div>
                   <div> {{Form::label('Batch Ending Year','Batch Ending Year')}}</div>
                    <div>{{Form::text('batchEndingYear',NULL,array('placeholder'=>'Enter Ending Year','class'=>'form-control','id'=>'batchEndingYear'))}}</div><div style="padding:20px;"></div>
                    <div><button type="submit" class="btn btn-primary form-control">Create</button></div></div>
                    {{Form::close()}}
          </div>
      </div>
  </div>
 </div>


    <!--


   -->

    <!--

   -->
    <div class="py-12" id="deleteTheDepartments">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                      Edit / Delete Departments
                  @if(count($departments = (\App\Models\Department::where('departments.batchId','=',(\App\Models\batch::where('status',1)->select('batchId')->first())->batchId)->get()))>0)
                       <table class="table">
                         <thead>
                           <tr>
                             <th>Department Name</th>
                             <th>View</th>
                           </tr>
                         </thead>
                         <tbody>
                        @foreach(($departments = (\App\Models\Department::where('departments.batchId','=',$currentBatchId)->get())) as $department)
                          <tr><td>{{$department->departmentName}}</td>
                            <td><button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModalUpdateDepartment{{$department->departmentId}}">View</button></td>
                          </tr>
                          <div class="modal fade" id="myModalUpdateDepartment{{$department->departmentId}}">
                             <div class="modal-dialog modal-sm">
                               <div class="modal-content">

                                 <!-- Modal Header -->
                                 <div class="modal-header">
                                   <h4 class="modal-title">Modal Heading</h4>
                                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 </div>

                                 <!-- Modal body -->
                                 <div class="modal-body">
                                   <form action="{{route('Department.editDepartment',['Department'=>$department->departmentId])}}" method="POST" enctype="multipart/form-data" name="updateDepartment" id="updateDepartment">
                                         {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('departmentId',$department->departmentId)}}
                                         {{Form::label('departmentId','Department Name : ')}} {{Form::text('departmentName',$department->departmentName,array('placeholder'=>'Enter Department Name : ','class'=>'form-control'))}}
                                         <button type="submit" class="btn btn-primary form-control">Update</button>{{Form::close()}}
                                         <form action="{{route('Department.destroyDepartment',['Department'=>$department->departmentId])}}" method="POST" name="deleteDepartment" id="deleteDepartment">
                                             {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('departmentId',$department->departmentId)}}
                                             <button type="submit" class="btn btn-primary form-control">Delete</button>{{Form::close()}}

                                 </div>

                                 <!-- Modal footer -->
                                 <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 </div>

                               </div>
                             </div>
                            </div>
                        @endforeach
                         </tbody>
                       </table>
                  @else
                     <h3 style="color:red;">List is empty<h3>
                  @endif
                </div>
            </div>
        </div>
    </div>


        <div class="py-12" id="addTheDepartments">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      Add Departments
                      <form action="{{route('Department.storeDepartment')}}" method="POST" name="createDepartment" id="createDepartment">
                      {{ csrf_field() }}{{ method_field('POST') }}
                        {{Form::label('departmentName','Department Name : ')}}
                              {{Form::text('departmentName',NULL,array('placeholder'=>'Enter Department Name : ','class'=>'form-control'))}}<br><br><hr><br>
                              <button type="submit" class="btn btn-primary form-control">Create</button>
                              {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>

<!--

 -->


    <div class="py-12"  id="editTheSemesters">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                      Edit Semesters

                   @if(count(\App\Models\semester::where('semesters.batchId','=',$currentBatchId)->get())>0)
                    <table class="table">
                      <thead>
                      <tr>
                        <th>Semester Name</th>
                        <th>Semester Number</th>
                        <th>Update</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach(($semesters = (\App\Models\semester::all())) as $semester)
                          <form action="{{route('semester.updatesemester',['semester'=>$semester->semesterId])}}" method="POST" name="updateSemester" id="updateSemester">
                            {{ csrf_field() }}{{ method_field('POST') }}

                            {{Form::hidden('semesterId',$semester->semesterId)}}
                            <tr><td>{{Form::text('semesterName',$semester->semesterName,array('placeholder'=>'Enter Semester Name : ','class'=>'form-control'))}}</td><td>{{$semester->semesterNumber}}</td>
                              <td><button type="submit" class="btn btn-primary form-control">Update</button></td></tr>
                          {{Form::close()}}
                        @endforeach
                      </tbody>
                        </table>
                    @else
                      <h3 style="color:red;">List is empty<h3>
                    @endif
                </div>
            </div>
        </div>
    </div>



        <div class="py-12" id="addTheSemesters">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Add Semester

                        <form action="{{route('semester.storesemester')}}" method="POST" name="createSemester" id="createSemester">
                        {{ csrf_field() }}{{ method_field('POST') }}
                              {{Form::label('semesterName','Semester Name : ')}}
                              {{Form::text('semesterName',NULL,array('placeholder'=>'Enter Semester Name','class'=>'form-control'))}}<br><br><hr><br>
                              <button type="submit" class="btn btn-primary form-control">Create</button>
                              {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
<!--
Day creation and updation
 -->



 <div class="py-12" id="editDayName">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Edit Day Name
               <table class="daysTable table" id="daysTable">
               <thead>
                 <tr>
                   <th>Day Name </th>
                   <th>Update</th>
                 </tr>
               </thead>
             <tbody>
            @foreach(($days=(\App\Models\days::all())) as $day)
                 <tr>
                 <form action="{{route('admin.updateDayName',['day'=>$day->dayId])}}" method="POST" name="updateDayDetails" id="updateDayDetails">
                   {{ csrf_field() }}{{ method_field('POST') }}
                  {{Form::hidden('dayId',$day->dayId,array('id'=>'dayId'))}}
                 <td>{{Form::text('dayName',$day->dayName,array('placeholder'=>'Enter Day Name','class'=>'form-control','id'=>'dayName'))}} </td>
                 <td><button type="submit" class="btn btn-primary form-control">Update</button>
                   {{Form::close()}}</td>
               </tr>
           @endforeach
             </tbody>
               </table>
             </div>
         </div>
     </div>
 </div>

    <!--


   -->


   <div class="py-12" id="addTheDay">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
                 Add Day
                   <div>Day Name : <form action="{{route('admin.addDayName')}}" method="POST" name="createDay" id="createDay">
                     {{ csrf_field() }}{{ method_field('POST') }}
                   {{Form::text('dayName',NULL,array('placeholder'=>'Enter day name','class'=>'form-control'))}}<br><br><hr><br>
                   <button type="submit" class="btn btn-primary form-control">Submit</button>
                     {{Form::close()}}
                   </div>
               </div>
           </div>
       </div>
   </div>

   <!--
Hour creation
  -->

<!--

-->

<div class="py-12" id="editTheHourName">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
           <div class="p-6 text-gray-900">
             Edit Hour Name

          @if(count($hours=(\App\Models\hours::all()))>0)
               <table class="table">
             <thead>

               <tr>
                 <th>Hour Name </th>
                 <th>View</th>
               </tr>
             </thead>
           <tbody>
               @foreach(($hours=(\App\Models\hours::orderBy('hourStartingTime','asc')->get())) as $hour)
                  <tr><td>{{$hour->hourName}}</td>
                   <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalUpdateHour{{$hour->hourId}}">View</button></td>
                 </tr>
                 <div class="modal fade" id="myModalUpdateHour{{$hour->hourId}}">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Modal Heading</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <form action="{{route('admin.updateHourName',['hour'=>$hour->hourId])}}" method="POST" name="updateHourDetails" id="updateHourDetails">
                          {{ csrf_field() }}{{ method_field('POST') }}
                          {{Form::label('hourName',"Hour Name")}}{{Form::hidden('hourId',$hour->hourId)}}
                          {{Form::text('hourName',$hour->hourName,array('placeholder'=>'Hour Name','class'=>'form-control','id'=>'hourName'))}}
                          {{Form::label('startingTime','Starting Time')}}{{Form::time('hourStartingTime',$hour->hourStartingTime,array('class'=>'form-control','id'=>'hourStartingTime'))}}
                          {{Form::label('endingTime','Ending Time')}}{{Form::time('hourEndingTime',$hour->hourEndingTime,array('class'=>'form-control','id'=>'hourEndingTime'))}}
                           <button type="submit" class="btn btn-primary form-control">Save</button>{{Form::close()}}
                        <form action="{{route('admin.deleteHour',['hour'=>$hour->hourId])}}" method="POST" name="deleteHour" id="deleteHour">
                          {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('hourId',$hour->hourId)}}
                       <button type="submit" class="btn btn-primary form-control">Delete</button>
                              {{Form::close()}}

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                   </div>
               @endforeach
           </tbody>
             </table>
        @else
          <h3 style="color:red;">List is empty</h3>
        @endif
           </div>
       </div>
   </div>
</div>

  <!--


 -->



 <div class="py-12" id="addTheHour">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Add Hour
                 <div><form action="{{route('admin.addHourName')}}" method="POST" name="createHour" id="createHour">
                   {{ csrf_field() }}{{ method_field('POST') }}{{Form::label('Hour Name : ','Hour Name : ')}} {{Form::text('hourName',NULL,array('placeholder'=>'Enter first name','class'=>'form-control',))}}<br><br>
                 {{Form::label('Pick Hour Starting Time : ','Pick Hour Starting Time : ')}}{{Form::time('hourStartingTime',NULL,array('class'=>'form-control'))}}<br><br>
               {{Form::label('Pick Hour Ending Time : ','Pick Hour ending Time : ')}}{{Form::time('hourEndingTime',NULL,array('class'=>'form-control'))}}<br><br>
                 <button type="submit" class="btn btn-primary form-control">Add</button>{{Form::close()}}
                </div>
             </div>
         </div>
     </div>
 </div>


 <div class="py-12" id="generateAttendanceForTeachers">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Generate students teacher enabled daily attendance
               <form action="{{route('dailyTeacherAllocation.createDailyAttendanceForAllTeachers')}}" method="POST" name="createDailyAttendance" id="createDailyAttendance">
               {{ csrf_field() }}{{ method_field('POST') }}
                {{Form::label('Select date to generate attendance : ') }}
                {{Form::date('dateSelected',NULL,array('class'=>'form-control')) }}<br><br><hr><br>
                <button type="submit" class="btn btn-primary form-control">Generate</button>{{Form::close()}}

             </div>
         </div>
     </div>
 </div>

 <div class="py-12" id="deleteTodaysAttendence">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
              Delete attendance for teachers
               <form action="{{route('attendence.deleteTodaysAttendenceForAllTeachers')}}" method="POST" name="deleteTodaysAttendenceForAllTeachers" id="deleteTodaysAttendenceForAllTeachers">
               {{ csrf_field() }}{{ method_field('POST') }}
                {{Form::label('Select date to delete attendance : ') }}
                {{Form::date('dateSelected',NULL,array('class'=>'form-control')) }}<br><br><hr><br>
                <button type="submit" class="btn btn-primary form-control">Delete</button>{{Form::close()}}

             </div>
         </div>
     </div>
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
              Delete attendance for today for admins
               <form action="{{route('attendence.deleteTodaysAttendenceForAllAdmins')}}" method="POST" name="deleteTodaysAttendenceForAllAdmins" id="deleteTodaysAttendanceForAllAdmins">
               {{ csrf_field() }}{{ method_field('POST') }}
                {{Form::label('Select date to delete attendance : ') }}
                {{Form::date('dateSelected',NULL,array('class'=>'form-control')) }}<br><br><hr><br>
                <button type="submit" class="btn btn-primary form-control">Delete</button>{{Form::close()}}

             </div>
         </div>
     </div>
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
              Delete attendance for today for students
               <form action="{{route('attendence.deleteTodaysAttendenceForAllStudents')}}" method="POST" name="deleteTodaysAttendenceForAllStudents" id="deleteTodaysAttendenceForAllStudents">
               {{ csrf_field() }}{{ method_field('POST') }}
                {{Form::label('Select date to delete attendance : ') }}
                {{Form::date('dateSelected',NULL,array('class'=>'form-control')) }}<br><br><hr><br>
                <button type="submit" class="btn btn-primary form-control">Delete</button>{{Form::close()}}

             </div>
         </div>
     </div>
 </div>



      <div class="py-12" id="updateTheStatus">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900">
                    View Status
                    <table class="statusTable table" id="statusTable">
                      <thead><tr>
                        <th>Status Name</th>
                        <th>View </th>
                      </thead>
                      <tbody>
                    @foreach($statuse=\App\Models\Status::all() as $status)
                      <tr><td>{{$status->statusName}}</td>
                          <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalUpdateStatus{{$status->statusId}}">View</button></td>
                        </tr>

                        <div class="modal fade" id="myModalUpdateStatus{{$status->statusId}}">
                           <div class="modal-dialog modal-sm">
                             <div class="modal-content">

                               <!-- Modal Header -->
                               <div class="modal-header">
                                 <h4 class="modal-title">Modal Heading</h4>
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                               </div>

                               <!-- Modal body -->
                               <div class="modal-body">
                                 <form action="{{route('Status.updateStatus',['Status'=>$status->statusId])}}" method="POST" id="updateStatusDetails">
                                 @csrf
                              {{Form::hidden('statusId',$status->statusId,array('id'=>'statusId'))}}
                                  {{Form::text('statusName',$status->statusName,array('placeholder'=>'Enter Status Name','class'=>'form-control','id'=>'statusName'))}}
                                   <select name="roleForStatus" id="roleForStatus" class="form-control">
                                   @foreach(($roles=\App\Models\role::all()) as $role)
                                    <option value="{{$role->roleId}}">{{$role->roleName}}</option>
                                     @endforeach
                                   </select>
                                   <button type="submit" class="btn btn-primary form-control">Update</button>
                                  {{Form::hidden('statusId',$status->statusId)}}
                                   {{Form::close()}}
                                   <form action="{{route('Status.destroyStatus',['Status'=>$status->statusId])}}" method="POST" id="deleteStatusDetails">
                                   <button type="submit" class="btn btn-primary form-control">Delete</button>
                                     {{ csrf_field() }}{{ method_field('POST') }}
                                  {{Form::hidden('statusId',$status->statusId,array('id'=>'statusId'))}}
                                   {{Form::close()}}

                               </div>

                               <!-- Modal footer -->
                               <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                               </div>

                             </div>
                           </div>
                          </div>
                    @endforeach
                    </tbody>
                  </table>
                  </div>
              </div>
          </div>
      </div>


      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

     <div class="py-12" id="createTheStatus">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                   Add Status
                   <form action="{{route('Status.createStatus')}}" method="POST" name="statusAddAdmin" id="statusAddAdmin">
                     {{ csrf_field() }}{{ method_field('POST') }}
                     <table class="table">
                   <thead>
                     <tr>
                       <th>Status Name</th>
                     <td>{{Form::text('statusName',NULL,array('placeholder'=>'Enter Status Name','class'=>'form-control','id'=>'statusName'))}} </td>
                     </tr>
                     <tr>
                       <th>Status for role </th>
                     <td>
                       <select name="roleForStatus" id="roleForStatus" class="form-control">
                       @foreach(($roles=\App\Models\role::all()) as $role)
                        <option value="{{$role->roleId}}">{{$role->roleName}}</option>
                         @endforeach
                       </select>
                      </td></tr>
                     </thead>
                   </table><button type="submit" class="btn btn-primary">Submit</button>{{Form::close()}}
                 </div>
             </div>
         </div>
     </div>
   </div>

     <!-- /#sidebar-wrapper -->

         <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
         <script src="{{ asset('js/Admin/admin.js') }}" defer></script>
</x-app-layout>
