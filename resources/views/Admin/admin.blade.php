<!-- Bootstrap 4 CSS -->
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery (FULL version — only once) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Bootstrap 4 JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}"></script>

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
                  <form method="POST"
      action="{{ route('detail.createAdmin') }}" enctype="multipart/form-data" name="FormAddAdminAdmin" id="FormAddAdminAdmin">
                  @csrf
                    <table class="table">
                  <thead>
                    <tr>
                      <th>Salutation</th>
                      <td>
                      <select name="salutation">
                           <option value="Mr./Ms." selected>Mr./Ms.</option>
                           <option value="Mr">Mr.</option>
                           <option value="Mrs">Mrs.</option>
                           <option value="Ms">Ms.</option>
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
                      <th>Age</th>{{Form::hidden('password',(\App\Models\ConstantController::where('constantId',1)->select('constantValue')->first())->constantValue)}}
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
                      <button type="button" id="addAdminButton" class="btn btn-primary form-control form-control">Save</button>

                                        {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

 <div class="py-12" id="updateTheBatches">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
              @if(count($batches = \App\Models\Batch::all())>0)
               Update Batch Details / Delete Batch
               <table class="table">
               <thead>
               <th>Batch Name</th>
               <th>View</th>
               </thead>
               <tbody>
               @foreach(($batches = \App\Models\Batch::all()) as $batch)
                  @if($batch->status!=1)
                     <tr>{{Form::hidden('currentBatchId',$batch->batchId,array('id'=>'batchId'))}}
                       <td>{{$batch->batchName}}</td>
                   <td><button type="button"
    class="btn btn-primary form-control"
    data-toggle="modal"
    data-target="#myModalUpdateBatches"
    data-batchid="{{$batch->batchId}}"
    data-batch-name="{{$batch->batchName}}"
    data-batch-starting-year="{{$batch->batchStartingYear}}"
    data-batch-ending-year="{{$batch->batchEndingYear}}"
  data-batch-status="{{$batch->status}}">
    View
</button></td>
                   </tr>
                @else
                 <tr style="background:green;color:white;">
                   <td>{{$batch->batchName}}</td>
                   <td><button type="button"
    class="btn btn-primary form-control"
    data-toggle="modal"
    data-target="#myModalUpdateBatches"
    data-batchid="{{$batch->batchId}}"
    data-batch-name="{{$batch->batchName}}"
    data-batch-starting-year="{{$batch->batchStartingYear}}"
    data-batch-ending-year="{{$batch->batchEndingYear}}"
  data-batch-status="{{$batch->status}}">
    View
</button></td>
                  </tr>
                @endif


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

 <script>
 $(document).ready(function () {

   $('#myModalUpdateBatches').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);

   var bookId = button.data('batchid');
var bookBatchName = button.data('batchName');
var bookBatchStartingYear = button.data('batchStartingYear');
var bookBatchEndingYear = button.data('batchEndingYear');
var bookBatchStatus = button.data('batchStatus');


   var modal = $(this);

   modal.find('#ModalForUpdateBatchbatchId').val(bookId);
   modal.find('#ModalForCurrentBatchbatchId').val(bookId);
   modal.find('#ModalBatchbatchName').val(bookBatchName);
   modal.find('#ModalBatchbatchStartingYear').val(bookBatchStartingYear);
   modal.find('#ModalBatchbatchEndingYear').val(bookBatchEndingYear);
   modal.find('#ModalBatchstatus').val(bookBatchStatus);
});

 });
 </script>

  <div class="modal fade" id="myModalUpdateBatches">
     <div class="modal-dialog modal-sm">
       <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
           <h4 class="modal-title">Modal Heading</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
           <form action="{{ route('batch.updatebatch') }}"
       method="POST"
       enctype="multipart/form-data"
       id="updateBatches">
           {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('batchId',null,array('id'=>'ModalForUpdateBatchbatchId'))}}
           {{Form::label('batchName','Batch Name : ')}}{{Form::text('batchName',null,array('class'=>'form-control','id'=>'ModalBatchbatchName'))}}
           {{Form::label('startingYear','Starting Year : ')}}{{Form::text('batchStartingYear',null,array('class'=>'form-control','id'=>'ModalBatchbatchStartingYear'))}}
           {{Form::hidden('status',null,array('id'=>'ModalBatchstatus'))}}
           {{Form::label('endingYear','Ending Year : ')}}{{Form::text('batchEndingYear',null,array('class'=>'form-control','id'=>'ModalBatchbatchEndingYear'))}}
         <button type="button" id="updateBatch" class="btn btn-primary form-control">Update</button>{{Form::close()}}
           <hr>  <hr>
           <form action="{{ route('batch.currentBatch') }}" method="POST" enctype="multipart/form-data" name="currentBatch" id="currentBatch">
             {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('batchId',null,array('id'=>'ModalForCurrentBatchbatchId'))}}
           <button type="button" id="assignCurrentBatch" class="btn btn-primary form-control">Assign this as current batch</button>{{Form::close()}}

         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    <div><button type="button" id="createBatchButton" class="btn btn-primary form-control">Create</button></div></div>
                    {{Form::close()}}
          </div>
      </div>
  </div>
 </div>


    <!--


   -->

    <script>
    $(document).ready(function () {

      $('#myModalUpdateDepartment').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget);

      var departmentId = button.data('departmentid');
   var departmentName = button.data('departmentName');


      var modal = $(this);

      modal.find('#editDepartmentId').val(departmentId);
      modal.find('#editDepartmentName').val(departmentName);
      modal.find('#deleteDepartmentId').val(departmentId);
   });

    });
    </script>
<!-- Edit / Delete Departments -->
<div class="modal fade" id="myModalUpdateDepartment">
   <div class="modal-dialog modal-sm">
     <div class="modal-content">

       <!-- Modal Header -->
       <div class="modal-header">
         <h4 class="modal-title">Modal Heading</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>

       <!-- Modal body -->
       <div class="modal-body">
         <form action="{{route('Department.editDepartment')}}" method="POST" enctype="multipart/form-data" name="updateDepartment" id="updateDepartment">
               {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('departmentId',null,array('id'=>'editDepartmentId'))}}
               {{Form::label('departmentId','Department Name : ')}} {{Form::text('departmentName',null,array('placeholder'=>'Enter Department Name : ','class'=>'form-control','id'=>'editDepartmentName'))}}
               <button type="button" id="saveEditDepartment" class="btn btn-primary form-control">Update</button>{{Form::close()}}
               <form action="{{route('Department.destroyDepartment')}}" method="POST" name="deleteDepartment" id="deleteDepartment">
                   {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('departmentId',null,array('id'=>'deleteDepartmentId'))}}
                   <button type="button" id="removeDepartment" class="btn btn-primary form-control">Delete</button>{{Form::close()}}

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
    <div class="py-12" id="deleteTheDepartments">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                      Edit / Delete Departments
                  @if(count($departments = (\App\Models\Department::get()))>0)
                       <table class="table">
                         <thead>
                           <tr>
                             <th>Department Name</th>
                             <th>View</th>
                           </tr>
                         </thead>
                         <tbody>
                        @foreach(($departments = (\App\Models\Department::get())) as $department)
                          <tr><td>{{$department->departmentName}}</td>
                            <td><button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#myModalUpdateDepartment" data-department-name="{{$department->departmentName}}"
                              data-departmentid="{{$department->departmentId}}">View</button></td>
                          </tr>

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
                              <button type="button" id="createDepartmentButton" class="btn btn-primary form-control">Create</button>
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

                   @if(count(\App\Models\Semester::where('semesters.batchId','=',$currentBatchId)->get())>0)
                   <table class="table">
     <thead>
         <tr>
             <th>Semester Name</th>
             <th>Update</th>
         </tr>
     </thead>

     <tbody>
         @foreach(\App\Models\Semester::all() as $semester)
         <tr>
             <td colspan="2">
                 <form action="{{ route('semester.updatesemester',['semester'=>$semester->semesterId]) }}"
                       method="POST"
                       class="updateSemesterForm d-flex align-items-center gap-2">
                     @csrf

                     <input type="hidden"
                            name="semesterId"
                            value="{{ $semester->semesterId }}">

                     <input type="text"
                            name="semesterName"
                            value="{{ $semester->semesterName }}"
                            class="form-control semester-input">

                     <button type="button"
                             class="btn btn-primary saveSemesterDetails">
                         Update
                     </button>
                 </form>
             </td>
         </tr>
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
                              <button type="button" id="addSemester" class="btn btn-primary form-control">Create</button>
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
            <th>Day Name</th>
            <th>Update</th>
        </tr>
    </thead>

    <tbody>
        @foreach(\App\Models\Days::all() as $day)
        <tr>
            <td colspan="2">
                <form action="{{ route('admin.updateDayName') }}"
                      method="POST"
                      class="updateDayDetails d-flex align-items-center gap-2">
                    @csrf

                    <input type="hidden"
                           name="dayId"
                           value="{{ $day->dayId }}">

                    <input type="text"
                           name="dayName"
                           value="{{ $day->dayName }}"
                           class="form-control day-input">

                    <button type="button"
                            class="saveDayDetails btn btn-primary">
                        Update
                    </button>
                </form>
            </td>
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
                   <button type="button" id="addDay" class="btn btn-primary form-control">Submit</button>
                     {{Form::close()}}
                   </div>
               </div>
           </div>
       </div>
   </div>

   <!--
Hour creation
  -->


      <script>
      $(document).ready(function () {

        $('#myModalUpdateHour').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget);

        var getHourid = button.data('hourid');
        var getHourName = button.data('hourName');
        var getHourStartingTime = button.data('hourStartingTime');


        var modal = $(this);

        modal.find('#thisEditHourId').val(getHourid);
        modal.find('#thisDeleteHourId').val(getHourid);
        modal.find('#thisEditHourName').val(getHourName);
        modal.find('#thisHourStartingTime').val(getHourStartingTime);
     });

      });
      </script>
  <div class="modal fade" id="myModalUpdateHour">
     <div class="modal-dialog modal-sm">
       <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
           <h4 class="modal-title">Edit Hour Details</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
           <form action="{{route('admin.updateHourName')}}" method="POST" name="updateHourDetails" id="updateHourDetails">
           {{ csrf_field() }}{{ method_field('POST') }}
           {{Form::label('hourName',"Hour Name")}}{{Form::hidden('hourId',null,array('id'=>'thisEditHourId'))}}
           {{Form::text('hourName',null,array('placeholder'=>'Hour Name','class'=>'form-control','id'=>'thisEditHourName'))}}
           {{Form::label('startingTime','Starting Time')}}
           {{Form::time('hourStartingTime',null,array('class'=>'form-control','id'=>'thisHourStartingTime'))}}
             <button type="button" id="saveHourDetails" class="btn btn-primary form-control">Save</button>{{Form::close()}}
         <form action="{{route('admin.deleteHour')}}" method="POST" name="deleteHour" id="deleteHour">
           {{ csrf_field() }}{{ method_field('POST') }}{{Form::hidden('hourId',null,array('id' => 'thisDeleteHourId'))}}
        <button type="button" class="btn btn-primary form-control">Delete</button>
               {{Form::close()}}

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

<div class="py-12" id="editTheHourName">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
           <div class="p-6 text-gray-900">
             Edit Hour Name

          @if(count($hours=(\App\Models\Hours::all()))>0)
               <table class="table">
             <thead>

               <tr>
                 <th>Hour Name </th>
                 <th>View</th>
               </tr>
             </thead>
           <tbody>
               @foreach(($hours=(\App\Models\Hours::orderBy('hourStartingTime','asc')->get())) as $hour)
                  <tr><td>{{$hour->hourName}}</td>
                   <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalUpdateHour" data-hourid="{{$hour->hourId}}" data-hour-name="{{$hour->hourName}}" data-hour-starting-time="{{$hour->hourStartingTime}}">View</button></td>
                 </tr>

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
                <button type="button" id="addHourButton" class="btn btn-primary form-control">Add</button>{{Form::close()}}
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
                <button type="button" id="buttonForCreateDailyAttendance" class="btn btn-primary form-control">Generate</button>{{Form::close()}}

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
                <button type="button" id="buttonFordDeleteTodaysAttendenceForAllTeachers" class="btn btn-primary form-control">Delete</button>{{Form::close()}}

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
                <button type="button" id="buttonForDeleteTodaysAttendanceForAllAdmins" class="btn btn-primary form-control">Delete</button>{{Form::close()}}

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
                <button type="button" id="buttonForDeleteTodaysAttendenceForAllStudents" class="btn btn-primary form-control">Delete</button>{{Form::close()}}

             </div>
         </div>
     </div>
 </div>

 <div class="modal fade" id="myModalUpdateStatus">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{route('Status.updateStatus')}}" method="POST" id="updateStatusDetails">
          @csrf
       {{Form::hidden('statusId',null,array('id'=>'updateStatusId'))}}
           {{Form::text('statusName',null,array('placeholder'=>'Enter Status Name','class'=>'form-control','id'=>'statusName'))}}
            <select name="roleForStatus" id="roleForStatus" class="form-control">
            @foreach(($roles=\App\Models\Role::all()) as $role)
                <option value="{{$role->roleId}}">{{$role->roleName}}</option>
             @endforeach
            </select>
            <button type="button" id="buttonForUpdateStatus" class="btn btn-primary form-control">Update</button>
           {{Form::close()}}
            <form action="{{route('Status.destroyStatus')}}" method="POST" id="deleteStatusDetails">
            <button type="button" id="buttonForStatusDelete" class="btn btn-primary form-control">Delete</button>
              {{ csrf_field() }}{{ method_field('POST') }}
           {{Form::hidden('statusId',null,array('id'=>'deleteStatusId'))}}
            {{Form::close()}}

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
  <script>
  $(document).ready(function () {

    $('#myModalUpdateStatus').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget);

    var statusId = button.data('statusid');
  var statusName = button.data('statusName');
  var statusForRoles = button.data('statusForRoles');


    var modal = $(this);

    $('#updateStatusId').val(statusId);
    $('#deleteStatusId').val(statusId);
    modal.find('#statusName').val(statusName);
    modal.find('#roleForStatus').val(statusForRoles);
  });

  });
  </script>
<!--


 -->
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
                          <td><button type="button"
           class="btn btn-primary form-control"
           data-toggle="modal"
           data-target="#myModalUpdateStatus"
           data-statusid="{{$status->statusId}}"
           data-status-name="{{$status->statusName}}"
           data-status-for-roles="{{$status->statusForRoles}}">
           View
       </button></td></td>
                        </tr>


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
                       @foreach(($roles=\App\Models\Role::all()) as $role)
                        <option value="{{$role->roleId}}">{{$role->roleName}}</option>
                         @endforeach
                       </select>
                      </td></tr>
                     </thead>
                   </table><button type="button" id="addStatus" class="btn btn-primary">Submit</button>{{Form::close()}}
                 </div>
             </div>
         </div>
     </div>
   </div>

     <!-- /#sidebar-wrapper -->

         <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
         <script src="{{ asset('js/Admin/admin.js') }}" defer></script>
         <!-- jQuery (FULL version — REQUIRED for AJAX) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper (required for Bootstrap 4 modals) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Bootstrap 4 JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- jQuery Form plugin (you use it) -->
<script src="https://malsup.github.io/jquery.form.js"></script>

<!-- Your custom JS -->
<script src="{{ asset('js/sidebar.js') }}"></script>
</x-app-layout>
