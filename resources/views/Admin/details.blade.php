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
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/Admin/admin.css') }}" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}"></script>
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
           {{ __('Details') }}
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
          <a href="#detailsToNewUser" class="list-group-item list-group-item-action bg-light">Add details to new user</a>
          <a href="#createOrUpdateAdminDetails" class="list-group-item list-group-item-action bg-light">Create/Update admins's details</a>
          <a href="#createOrUpdateTeacherDetails" class="list-group-item list-group-item-action bg-light">Create/Update teachers's details</a>
          <a href="#createOrUpdateStudentDetails" class="list-group-item list-group-item-action bg-light">Create/Update students's details</a>
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

    <div class="py-12" id="detailsToNewUser">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Add details to new user
                    <br>
                    New Users<br>
                    @if(count($users=\App\Models\User::where('users.batchId','=',$currentBatchId)->where('role','=',1)->get())>0)
                      @foreach(($users=\App\Models\User::where('role','=',1)->get()) as $user)
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Salutation</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Edit Details</th>
                              </tr>
                            </thead>
                            <tbody>
                          <tr>
                            <td>{{$user->sal}}</td>
                          <td>{{$user->name}} </td>
                          <td>{{$user->age}} </td>
                          <td>{{$user->email}}</td>
                          <td><button type="button" class="btn btn-primary form-control form-control" data-toggle="modal" data-target="#exampleModalLongNewUserUserId{{$user->userId}}">
                              Add Details
                            </button></td>

                        </tr>


                      </tbody>
                      </table>


                            <div class="modal fade" id="exampleModalLongNewUserUserId{{$user->userId}}" id="addDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exasmpleModalLongTitle">Name : {{$user->name}}</h5>
                                      <h5 class="modal-title" id="exampleModalLonsgTitle">Email : {{$user->email}}</h5>
                                    <h5 class="modal-title" id="exampleModaslLongTitle">Phone : {{$user->phone}}</h5>
                                    <h5 class="modal-title" id="exampleModalLsongTitle">New users</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="{{route('detail.store')}}" method="POST" name="addDetailsToNewUser" id="addDetailsToNewUser">
                                    {{ csrf_field() }}{{ method_field('POST') }}
                                      <table class="table">
                                        <tr>
                                          <th>Salutation</th>
                                          <td>
                                        <select name="salutation">
                                           <option value="Mr./Ms." selected>Mr./Ms.</option>
                                             <option value="Mr.">Mr.</option>
                                             <option value="Ms.">Ms.</option>
                                        </select>
                                      </td>
                                    </tr>
                                        <tr></th>First name</th>{{Form::hidden('userId',$user->userId)}}
                                      <td>{{Form::text('firstName',NULL,array('placeholder'=>'Enter first name','class'=>'form-control'))}} </td>
                                      </tr>
                                      <tr>
                                        <th>Last name</th>
                                      <td>{{Form::text('lastName',NULL,array('placeholder'=>'Enter last name','class'=>'form-control'))}} </td></tr>
                                        <tr>
                                        <th>Age</th>
                                      <td>{{Form::text('age',NULL,array('placeholder'=>'Enter age','class'=>'form-control'))}}</td></tr>
                                        <tr>
                                        <th>Date of birth</th>
                                      <td>{{Form::date('dob',NULL,array('placeholder'=>'Enter date of birth','class'=>'form-control'))}}</td></tr>
                                        <tr>
                                          {{Form::hidden('userId',$user->userId)}}
                                          <th>Contact Number</th>
                                          <td>{{Form::text('contactNumber',NULL,array('placeholder'=>'Enter contact Number','class'=>'form-control'))}}</td></tr>
                                          <tr>
                                            <th>Alternate Contact Number</th>
                                            <td>{{Form::text('alternateContactNumber',NULL,array('placeholder'=>'Enter Alternate Contact Number','class'=>'form-control'))}}</td></tr>
                                            <tr>
                                        <th>Current Role</th>
                                      <td><select name="roleId" class="form-control">
                                        @if(count($roles = \App\Models\role::all())>0)
                                          @foreach(($roles = \App\Models\role::all()) as  $role)
                                            @if($role->roleId==1)
                                              <option value={{$role->roleId}} selected>{{$role->roleName}}</option>
                                            @else
                                              <option value={{$role->roleId}}>{{$role->roleName}}</option>
                                            @endif
                                          @endforeach
                                        @endif
                                        </select></td></tr>
                                      <tr>
                                          <th>Address</th>
                                          <td>{{Form::text('address',NULL,array('placeholder'=>'Enter Address','class'=>'form-control'))}}</td></tr>
                                          <tr>
                                            <th>Blood group</th>
                                            <td>{{Form::text('bloodGroup',NULL,array('placeholder'=>'Enter Blood Group','class'=>'form-control'))}}</td></tr>
                                            <tr>
                                              <th>Identification Mark</th>
                                              <td>{{Form::text('identificationMark',NULL,array('placeholder'=>'Enter identification mark','class'=>'form-control'))}}</td></tr>
                                              <tr>
                                                <th>Parent's Number</th>
                                                  <td>{{Form::text('parentNumber',NULL,array('placeholder'=>"Enter parent's number",'class'=>'form-control'))}}</td></tr>
                                                  <tr>
                                                    <th>Home Phone Number</th>
                                                    <td>{{Form::text('homePhoneNumber',NULL,array('placeholder'=>'Enter Home Phone Number','class'=>'form-control'))}}</td></tr>
                                                    <tr>
                                                      <th>Father's/Spouse's Name</th>
                                                      <td>{{Form::text('fatherSpouseName',NULL,array('placeholder'=>"Enter Father's/Spouse's Name",'class'=>'form-control'))}}</td></tr>
                                                      <tr>
                                                        <th>Mother's Name</th>
                                                        <td>{{Form::text('motherName',NULL,array('placeholder'=>"Enter mother's name",'class'=>'form-control'))}}</td></tr>
                                                        <tr>
                                                          <th>Guardian's Name</th>
                                                          <td>{{Form::text('guardianName',NULL,array('placeholder'=>"Enter Guardian's Name",'class'=>'form-control'))}}</td></tr>

                                                        </table>
                                                      </div>  <button type="submit" class="btn btn-primary form-control form-control">Save</button>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


                                                          {{Form::close()}}
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


 <div class="py-12" id="createOrUpdateAdminDetails">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                     View/Edit details
                     <br>
                     Admins<br>
            @if(count($admins = (\App\Models\detail::join('admins','admins.adminDetailId','=','details.detailId')
            ->join('users','users.detailsId','=','details.detailId')
            ->where('details.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',3))->get())>0)
              @foreach(($admins = (\App\Models\detail::join('admins','admins.adminDetailId','=','details.detailId')
              ->join('users','users.detailsId','=','details.detailId')
              ->select('details.*','admins.*')
              ->where('details.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',3))->get()) as $admin)
                       <div class="modal fade" id="exampleModalLongAdminAdminUserId{{$admin->userId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Name : {{$admin->firstname}} {{$admin->lastname}}</h5>
                       <h5 class="modal-title" id="exampleModalLongTitle">Role : Admin</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <div class="modal-body">
                                   <table class="table">
                                     <thead>


                                       <form action="{{route('detail.updateAdminDetails')}}" method="POST" name="createOrUpdateAdminDetails" id="createOrUpdateAdminDetails">
                                       {{ csrf_field() }}{{ method_field('POST') }}
                                       {{Form::hidden('detailId',$admin->detailId)}}{{Form::hidden('userId',$admin->userId)}}
                                       <tr>
                                         <th>Salutation</th>
                                       <td>
                                       <select name="salutation">
                                          @if($admin->sal=="Mr.")
                                            <option value="Mr." selected>Mr.</option>;
                                            <option value="Ms.">Ms.</option>
                                          @elseif($admin->sal=="Ms.")
                                            <option value="Ms." selected>Ms.</option>;
                                            <option value="Mr.">Mr.</option>
                                          @else
                                            <option value="Mr./Ms." selected>Mr./Ms.</option>;
                                            <option value="Mr.">Mr.</option>
                                            <option value="Ms.">Ms.</option>
                                          @endif
                                       </select></td></tr>
                                       <tr>
                                         <th>First Name</th>
                                         <td>{{Form::text('firstName',$admin->firstname,array('placeholder'=>'Enter first name','class'=>'form-control'))}} </td>
                                              </tr>
                                              <tr>
                                         <th>Last name</th>
                                                  <td>{{Form::text('lastName',$admin->lastname,array('placeholder'=>'Enter last name','class'=>'form-control'))}} </td></tr>
                                                  <tr>
                                         <th>Age</th>
                                       <td>{{Form::text('age',$admin->age,array('placeholder'=>'Enter age','class'=>'form-control'))}}</td></tr>
                                                <tr>
                                         <th>Date of birth : {{$admin->dob}}</th>
                                       <td>{{Form::date('dob',$admin->dob,array('placeholder'=>'Enter date of birth','class'=>'form-control'))}}</td></tr>
                                                <tr>
                                      {{Form::hidden('userId',$admin->userId)}}
                                         <th>Contact Number</th>
                                       <td>{{Form::text('contactNumber',$admin->contactNumber,array('placeholder'=>'Enter contact Number','class'=>'form-control'))}}</td></tr>
                                                <tr>
                                         <th>Alternate Contact Number</th>
                                       <td>{{Form::text('alternateContactNumber',$admin->alternateContactNumber,array('placeholder'=>'Enter Alternate Contact Number','class'=>'form-control'))}}</td></tr>
                                                <tr>
                                         <th>Current Role</th>
                                       <td>Admin</td></tr>
                                        <tr>
                                         <th>Address</th>
                                       <td>{{Form::text('address',$admin->address,array('placeholder'=>'Enter Address','class'=>'form-control'))}}</td></tr>
                                        <tr>
                                         <th>Blood group</th>
                                       <td>{{Form::text('bloodGroup',$admin->bloodGroup,array('placeholder'=>'Enter Blood Group','class'=>'form-control'))}}</td></tr>
                                        <tr>
                                         <th>Identification Mark</th>
                                       <td>{{Form::text('identificationMark',$admin->identificationMark,array('placeholder'=>'Enter identification mark','class'=>'form-control'))}}</td></tr>
                                        <tr>
                                         <th>Parent's Number</th>
                                       <td>{{Form::text('parentNumber',$admin->parentNumber,array('placeholder'=>"Enter parent's number",'class'=>'form-control'))}}</td></tr>
                                        <tr>
                                         <th>Home Phone Number</th>
                                       <td>{{Form::text('homePhoneNumber',$admin->homePhoneNumber,array('placeholder'=>'Enter Home Phone Number','class'=>'form-control'))}}</td></tr>
                                        <tr>
                                         <th>Father's/Spouse's Name</th>
                                       <td>{{Form::text('fatherSpouseName',$admin->fatherSpouseName,array('placeholder'=>"Enter Father's/Spouse's Name",'class'=>'form-control'))}}</td></tr>
                                        <tr>
                                         <th>Mother's Name</th>
                                       <td>{{Form::text('motherName',$admin->motherName,array('placeholder'=>"Enter mother's name",'class'=>'form-control'))}}</td></tr>
                                        <tr>
                                         <th>Guardian's Name</th>
                                       <td>{{Form::text('guardianName',$admin->guardianName,array('placeholder'=>"Enter Guardian's Name",'class'=>'form-control'))}}</td></tr>
                                        <tr>
                                          </tr>
                                        </thead>
                                      </table></div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                           <button type="submit" class="btn btn-primary form-control">Submit</button>{{Form::close()}}
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <table class="table">
                         <thead>
                           <tr>
                             <th>First name</th>
                             <th>Last name</th>
                             <th>Age</th>
                             <th>Edit Details</th>
                             <th>Delete</th>
                           </tr>
                         </thead>
                         <tbody>
                           <tr>
                           <td>{{$admin->sal}}{{$admin->firstname}} </td>
                           <td>{{$admin->lastname}} </td>
                           <td>{{$admin->age}}</td>
                           <td><button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#exampleModalLongAdminAdminUserId{{$admin->userId}}">
                               View/Edit Details
                             </button></td>
                             <td><form action="{{route('detail.deleteAdminDetails')}}" method="POST" name="deleteAdminDetails" id="deleteAdminDetails">
                             {{ csrf_field() }}{{ method_field('POST') }}
                             {{Form::hidden('detailId',$admin->detailId)}}{{Form::hidden('userId',$admin->userId)}}
                             <input type="submit" name="Delete" style="color:white;background-color:red;" class="btn btn-primary form-control" value="Delete"></input>
                           {{Form::hidden('userRole',3)}}</form>
                               </button>
                           </td>
                           </form>
                                                    </tr>



                       </tbody>
                       </table>
                    @endforeach
              @else
                <h3 style="color:red;">List is empty</h3>
              @endif

                 </div>
             </div>
         </div>
     </div>
 <!--





  -->


     <div class="py-12" id="createOrUpdateTeacherDetails">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                     View/Edit details
                     <br>
                     Teachers<br>
                     @if(count($teachers = (\App\Models\detail::join('teachers','teachers.teacherDetailId','=','details.detailId')
                     ->join('users','users.detailsId','=','details.detailId')
                     ->where('details.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',2))->get())>0)
                       @foreach(($teachers = (\App\Models\detail::join('teachers','teachers.teacherDetailId','=','details.detailId')
                       ->join('users','users.detailsId','=','details.detailId')
                       ->select('details.*','teachers.*')
                                            ->where('details.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',2))->get()) as $teacher)
                       <div class="modal fade" id="exampleModalLongTeacherTeacherUserId{{$teacher->userId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Name : {{$teacher->firstname}} {{$teacher->lastname}}</h5>
                                  <h5 class="modal-title" id="exampleModalLongTitle">Role : Teacher</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                              <table>
                                                <thead>

                                                  <form action="{{route('detail.updateTeacherDetails')}}" method="POST" name="createOrUpdateTeacherDetails" id="createOrUpdateTeacherDetails">
                                                  {{ csrf_field() }}{{ method_field('POST') }}
                                                  {{Form::hidden('detailId',$teacher->detailId,array('id'=>'detailId'))}}
                                                  {{Form::hidden('userId',$teacher->userId,array('id'=>'userId'))}}
                                                  <tr>
                                                    <th>Salutation</th>
                                                    <td>
                                                    <select name="salutation">
                                                       @if($teacher->sal=="Mr.")
                                                         <option value="Mr." selected>Mr.</option>;
                                                         <option value="Ms.">Ms.</option>
                                                       @elseif($teacher->sal=="Ms.")
                                                         <option value="Ms." selected>Ms.</option>;
                                                         <option value="Mr.">Mr.</option>
                                                       @else
                                                         <option value="Mr./Ms." selected>Mr./Ms.</option>;
                                                         <option value="Mr.">Mr.</option>
                                                         <option value="Ms.">Ms.</option>
                                                       @endif
                                                    </select></td>
                                                  </tr>
                                                  <tr><th>First name</th>
                                                  <td>{{Form::text('firstName',$teacher->firstname,array('placeholder'=>'Enter first name','class'=>'form-control'))}} </td>
                                                </tr>
                                                <tr>
                                                    <th>Last name</th>
                                                  <td>{{Form::text('lastName',$teacher->lastname,array('placeholder'=>'Enter last name','class'=>'form-control'))}} </td></tr>
                                                  <tr>
                                                    <th>Age</th>
                                                  <td>{{Form::text('age',$teacher->age,array('placeholder'=>'Enter age','class'=>'form-control'))}}</td></tr>
                                                  <tr>
                                                    <th>Date of birth : {{$teacher->dob}}</th>
                                                  <td>{{Form::date('dob',$teacher->dob,array('placeholder'=>'Enter date of birth','class'=>'form-control'))}}</td></tr>
                                                  <tr>
                                                      {{Form::hidden('userId',$teacher->userId)}}
                                                    <th>Contact Number</th>
                                                  <td>{{Form::text('contactNumber',$teacher->contactNumber,array('placeholder'=>'Enter contact Number','class'=>'form-control'))}}</td></tr>
                                                  <tr>
                                                    <th>Alternate Contact Number</th>
                                                  <td>{{Form::text('alternateContactNumber',$teacher->alternateContactNumber,array('placeholder'=>'Enter Alternate Contact Number','class'=>'form-control'))}}</td></tr>
                                                  <tr>
                                                    <th>Current Role</th>
                                                  <td>Teacher</td></tr>
                                                    <tr>
                                                    <th>Address</th>
                                                  <td>{{Form::text('address',$teacher->address,array('placeholder'=>'Enter Address','class'=>'form-control'))}}</td></tr>
                                                    <tr>
                                                    <th>Blood group</th>
                                                  <td>{{Form::text('bloodGroup',$teacher->bloodGroup,array('placeholder'=>'Enter Blood Group','class'=>'form-control'))}}</td></tr>
                                                    <tr>
                                                    <th>Identification Mark</th>
                                                  <td>{{Form::text('identificationMark',$teacher->identificationMark,array('placeholder'=>'Enter identification mark','class'=>'form-control'))}}</td></tr>
                                                    <tr>
                                                    <th>Parent's Number</th>
                                                  <td>{{Form::text('parentNumber',$teacher->parentNumber,array('placeholder'=>"Enter parent's number",'class'=>'form-control'))}}</td></tr>
                                                    <tr>
                                                    <th>Home Phone Number</th>
                                                  <td>{{Form::text('homePhoneNumber',$teacher->homePhoneNumber,array('placeholder'=>'Enter Home Phone Number','class'=>'form-control'))}}</td></tr>
                                                    <tr>
                                                    <th>Father's/Spouse's Name</th>
                                                  <td>{{Form::text('fatherSpouseName',$teacher->fatherSpouseName,array('placeholder'=>"Enter Father's/Spouse's Name",'class'=>'form-control'))}}</td></tr>
                                                    <tr>
                                                        <th>Mother's Name</th>
                                                        <td>{{Form::text('motherName',$teacher->motherName,array('placeholder'=>"Enter mother's name",'class'=>'form-control'))}}</td></tr>
                                                        <tr>
                                                          <th>Guardian's Name</th>
                                                          <td>{{Form::text('guardianName',$teacher->guardianName,array('placeholder'=>"Enter Guardian's Name",'class'=>'form-control'))}}</td></tr>
                                                          <tr>
                                                          </tr>
                                                        </table>   <button type="submit" class="btn btn-primary form-control">Submit</button>{{Form::close()}}</div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                       <table class="table">
                         <thead>
                           <tr>
                             <th>First name</th>
                             <th>Last name</th>
                             <th>Age</th>
                             <th>Edit Details</th>
                             <th>Delete</th>
                           </tr>
                         </thead>
                         <tbody>
                           <tr>
                           <td>{{$teacher->sal}}{{$teacher->firstname}} </td>
                           <td>{{$teacher->lastname}} </td>
                           <td>{{$teacher->age}}</td>
                           <td><button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#exampleModalLongTeacherTeacherUserId{{$teacher->userId}}">
                               View/Edit Details
                             </button></td>
                             <td><form action="{{route('detail.deleteTeacherDetails')}}" method="POST" name="deleteTeacherDetails" id="deleteTeacherDetails">
                             {{ csrf_field() }}{{ method_field('POST') }}
                             {{Form::hidden('detailId',$teacher->detailId)}}{{Form::hidden('userId',$teacher->userId)}}
                             {{Form::hidden('userRole',2)}}{{Form::hidden('userId',$teacher->userId)}}
                             <input type="submit" name="Delete" style="color:white;background-color:red;" class="btn btn-primary form-control" value="Delete"></input>
                           </form>
                               </button>
                           </td>

                         </tr>


                       </tbody>
                       </table>


                         {{Form::close()}}
                       @endforeach
                    @else
                       <h3 style="color:red">List is empty</h3>
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

                  <div class="py-12" id="createOrUpdateStudentDetails">
                      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                      View/Edit details
                      <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#showFilters">
                        Filter
                      </button>

                      <br>
                      Students<br>
                    @if(count($students = (\App\Models\detail::where('details.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',4)
                                                                                  ->join('users','users.detailsId','=','details.detailId')
                                                                                  ->join('students','students.studentDetailsId','=','details.detailId')
                                                                                  ->join('class_rooms','class_rooms.classroomDetailId','=','students.studentClassroom')
                                                                                  ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                                                  ->join('sections','sections.sectionId','=','class_rooms.section')
                                                                                  ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                                                                  ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                                                                  ->select('details.firstname AS firstName',
                                                                                  'details.lastname AS lastName',
                                                                                  'details.age as age',
                                                                                  'details.dob AS dob',
                                                                                  'details.userId AS userId',
                                                                                  'details.contactNumber AS contactNumber',
                                                                                  'details.alternateContactNumber AS alternateContactNumber',
                                                                                  'details.address AS address',
                                                                                  'details.identificationMark AS identificationMark',
                                                                                  'details.bloodGroup AS bloodGroup',
                                                                                  'details.parentNumber AS parentNumber',
                                                                                  'details.homePhoneNumber AS homePhoneNumber',
                                                                                  'details.fatherSpouseName AS fatherSpouseName',
                                                                                  'details.guardianName AS guardianName',
                                                                                  'details.motherName AS motherName',
                                                                                  'sections.sectionName AS sectionName',
                                                                                  'grades.grade AS grade',
                                                                                  'departments.departmentName AS departmentName',
                                                                                  'semesters.semesterName AS semesterName',
                                                                                  'sections.sectionId AS sectionId',
                                                                                  'grades.gradeId AS gradeId',
                                                                                  'departments.departmentId AS departmentId',
                                                                                  'semesters.semesterId AS semesterId')
                                                                                  )->get())>0)
                        @foreach(($students = (\App\Models\detail::where('details.batchId','=',(\App\Models\batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',4)
                                                                                      ->join('users','users.detailsId','=','details.detailId')
                                                                                      ->join('students','students.studentDetailsId','=','details.detailId')
                                                                                      ->join('class_rooms','class_rooms.classroomDetailId','=','students.studentClassroom')
                                                                                      ->join('grades','grades.gradeId','=','class_rooms.grade')
                                                                                      ->join('sections','sections.sectionId','=','class_rooms.section')
                                                                                      ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                                                                                      ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                                                                                      ->select('details.firstname AS firstName',
                                                                                      'details.lastname AS lastName',
                                                                                      'details.age as age',
                                                                                      'details.dob AS dob',
                                                                                      'details.userId AS userId',
                                                                                      'details.contactNumber AS contactNumber',
                                                                                      'details.alternateContactNumber AS alternateContactNumber',
                                                                                      'details.address AS address',
                                                                                      'details.identificationMark AS identificationMark',
                                                                                      'details.bloodGroup AS bloodGroup',
                                                                                      'details.parentNumber AS parentNumber',
                                                                                      'details.homePhoneNumber AS homePhoneNumber',
                                                                                      'details.fatherSpouseName AS fatherSpouseName',
                                                                                      'details.guardianName AS guardianName',
                                                                                      'details.motherName AS motherName',
                                                                                      'details.sal AS sal',
                                                                                      'sections.sectionName AS sectionName',
                                                                                      'grades.grade AS grade',
                                                                                      'departments.departmentName AS departmentName',
                                                                                      'semesters.semesterName AS semesterName',
                                                                                      'sections.sectionId AS sectionId',
                                                                                      'grades.gradeId AS gradeId',
                                                                                      'departments.departmentId AS departmentId',
                                                                                      'semesters.semesterId AS semesterId')
                                                                                      )->get()) as $student)
                        <div class="modal fade" id="exampleModalLongStudentStudentUserId{{$student->userId}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Name : {{$student->firstName}} {{$student->lastName}}</h5>
                        <h5 class="modal-title" id="exampleModalLongTitle">Role : Student</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{route('detail.updateStudentDetails')}}" method="POST" name="createOrUpdateStudentDetails" id="createOrUpdateStudentDetails">
                      {{ csrf_field() }}{{ method_field('POST') }}

                                    <table class="table">
                                      <thead>

                                        <tr>
                                          <th>Salutation</th>
                                          <td>
                                          <select name="salutation">
                                             @if($student->sal=="Mr.")
                                               <option value="Mr." selected>Mr.</option>;
                                               <option value="Ms.">Ms.</option>
                                             @elseif($student->sal=="Ms.")
                                               <option value="Ms." selected>Ms.</option>;
                                               <option value="Mr.">Mr.</option>
                                             @else
                                               <option value="Mr./Ms." selected>Mr./Ms.</option>;
                                               <option value="Mr.">Mr.</option>
                                               <option value="Ms.">Ms.</option>
                                             @endif
                                          </select></td></tr>
                                          <tr><th>First Name</th>
                                        <td>{{Form::text('firstName',$student->firstName,array('placeholder'=>'Enter first name','class'=>'form-control','id'=>'firstName'))}}
                                        {{Form::hidden('detailId',$student->detailId)}} </td>{{Form::hidden('userId',$student->userId,array('id'=>'userId'))}}
                                        </tr>
                                        <tr>
                                          <th>Last name</th>
                                        <td>{{Form::text('lastName',$student->lastName,array('placeholder'=>'Enter last name','class'=>'form-control'))}} </td></tr>
                                          <tr>
                                          <th>Age</th>
                                        <td>{{Form::text('age',$student->age,array('placeholder'=>'Enter age','class'=>'form-control'))}}</td></tr>
                                          <tr>
                                          <th>Date of birth : {{$student->dob}}</th>
                                        <td>{{Form::date('dob',$student->dob,array('placeholder'=>'Enter date of birth','class'=>'form-control'))}}</td></tr>
                                          <tr>
                                            {{Form::hidden('userId',$student->userId)}}
                                          <th>Contact Number</th>
                                        <td>{{Form::text('contactNumber',$student->contactNumber,array('placeholder'=>'Enter contact Number','class'=>'form-control'))}}</td></tr>
                                          <tr>
                                          <th>Alternate Contact Number</th>
                                        <td>{{Form::text('alternateContactNumber',$student->alternateContactNumber,array('placeholder'=>'Enter Alternate Contact Number','class'=>'form-control'))}}</td></tr>
                                          <tr>
                                          <th>Current Role</th>
                                        <td>Student</td></tr>
                                          <tr>
                                          <th>Address</th>
                                        <td>{{Form::text('address',$student->address,array('placeholder'=>'Enter Address','class'=>'form-control'))}}</td></tr>
                                          <tr>
                                          <th>Blood group</th>
                                        <td>{{Form::text('bloodGroup',$student->bloodGroup,array('placeholder'=>'Enter Blood Group','class'=>'form-control'))}}</td></tr>
                                          <tr>
                                          <th>Identification Mark</th>
                                        <td>{{Form::text('identificationMark',$student->identificationMark,array('placeholder'=>'Enter identification mark','class'=>'form-control'))}}</td></tr>
                                          <tr>
                                          <th>Parent's Number</th>
                                        <td>{{Form::text('parentNumber',$student->parentNumber,array('placeholder'=>"Enter parent's number",'class'=>'form-control'))}}</td></tr>
                                          <tr>
                                          <th>Home Phone Number</th>
                                        <td>{{Form::text('homePhoneNumber',$student->homePhoneNumber,array('placeholder'=>'Enter Home Phone Number','class'=>'form-control'))}}</td></tr>
                                          <tr>
                                          <th>Father's/Spouse's Name</th>
                                        <td>{{Form::text('fatherSpouseName',$student->fatherSpouseName,array('placeholder'=>"Enter Father's/Spouse's Name",'class'=>'form-control'))}}</td></tr>
                                          <tr>
                                          <th>Mother's Name</th>
                                            <td>{{Form::text('motherName',$student->motherName,array('placeholder'=>"Enter mother's name",'class'=>'form-control'))}}</td></tr>
                                            <tr>
                                              <th>Guardian's Name</th>
                                              <td>{{Form::text('guardianName',$student->guardianName,array('placeholder'=>"Enter Guardian's Name",'class'=>'form-control'))}}</td></tr>
                                              <tr>
                                              </tr>
                                            </table>

                                          </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               <button type="submit" class="btn btn-primary form-control">Submit</button>
                                 {{Form::close()}}
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                          {{Form::hidden('detailId',$student->detailId)}}
                        <table class="table department{{$student->departmentId}}department semester{{$student->semesterId}}semester section{{$student->sectionId}}section grade{{$student->gradeId}}grade">
                          <thead>
                            <tr>
                              <th>First name</th>
                              <th>Last name</th>
                              <th>Age</th>
                              <th>Edit Details</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                            <td>{{$student->sal}}{{$student->firstName}} </td>
                            <td>{{$student->lastName}} </td>
                            <td>{{$student->age}}</td>
                            <td><button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#exampleModalLongStudentStudentUserId{{$student->userId}}">
                                View/Edit Details
                                </button></td>
                                <td><form action="{{route('detail.deleteStudentDetails')}}" method="POST" name="deleteStudentDetails" id="deleteStudentDetails">
                                {{ csrf_field() }}{{ method_field('POST') }}
                                {{Form::hidden('detailId',$student->detailId)}}{{Form::hidden('userId',$student->userId)}}
                                {{Form::hidden('userRole',4)}}<input type="submit" name="Delete" style="color:white;background-color:red;" class="btn btn-primary form-control" value="Delete"></input>
                              </form>
                                  </button>
                              </td>

                          </tr>


                        </tbody>
                        </table>



                        @endforeach
                     @else
                        <h3 style="color:red;">List is empty</h3>
                     @endif

                  </div>
              </div>
          </div>
      </div>


      </div>
      </div>





      <script src="{{ asset('js/filter.js') }}" defer></script>
                  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
                  <script src="{{ asset('js/Admin/details.js') }}" defer></script>


</x-app-layout>
