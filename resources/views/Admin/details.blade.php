<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/Admin/admin.css') }}" rel="stylesheet">

<script src="{{ asset('js/sidebar.js') }}"></script>

                  <script src="{{ asset('js/Admin/details.js') }}"></script>
       <script src="{{ asset('js/Admin/commonContent.js') }}" defer></script>
<style>

/*

For showing error

*/

    .errorshow-box {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #B01D1A;
    color: #fff;
    padding: 15px 20px;
    border-radius: 6px;
    font-family: Arial, sans-serif;
    display: none;
    align-items: center;
    justify-content: space-between;
    min-width: 250px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    animation: slideIn 0.4s ease;
}

/* Flex layout */
.errorshow-box.show {
    display: flex;
}

/* Close button */
.close-btn {
    margin-left: 15px;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
}

/* Hover effect */
.close-btn:hover {
    opacity: 0.7;
}

/* Animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
    /*

    For Success

    */
    .success-box {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #28a745;
    color: #fff;
    padding: 15px 20px;
    border-radius: 6px;
    font-family: Arial, sans-serif;
    display: none;
    align-items: center;
    justify-content: space-between;
    min-width: 250px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    animation: slideIn 0.4s ease;
}

/* Flex layout */
.success-box.show {
    display: flex;
}

/* Close button */
.close-btn {
    margin-left: 15px;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
}

/* Hover effect */
.close-btn:hover {
    opacity: 0.7;
}

/* Animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
    /*

    For Delete

    */
     .delete-box {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #AD1F34;
    color: #fff;
    padding: 15px 20px;
    border-radius: 6px;
    font-family: Arial, sans-serif;
    display: none;
    align-items: center;
    justify-content: space-between;
    min-width: 250px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    animation: slideIn 0.4s ease;
}

/* Flex layout */
.delete-box.show {
    display: flex;
}

/* 
For table
*/

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #D6EEEE;
}
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Details') }}
           <br>
           <button class="btn btn-primary" id="menu-toggle" style="position:fixed;background-color: white;color:white;">Menu</button>
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
    
    <script type="text/javascript">

function getRoles(callback) {

    $.ajax({
        url: "/getRoles",
        method: "GET",
        dataType: "json",
        success: function(data) {

            let options = '';

            data.forEach(function(roleList) {
                options += `
                    <option value="${roleList.roleId}">
                        ${roleList.roleName}
                    </option>`;
            });
            callback(options);
        }
    });

}

// 

// 

// 


 $(document).ready(function () {

   $('#exampleModalLongNewUserUserId').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);
   var newUserId = button.attr('data-user-id');
$.ajax({
                url: "{{ route('getDataForAddingDetailsOfNewUser') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                data:{
                  newUserId:newUserId
                },
                dataType: "json", // Expect a JSON response
                success: function(newUserData) { 



    let rowsGetNewUserDetail = "";
        rowsGetNewUserDetail += `
        <form action="{{route('storeDetails')}}" method="POST" name="addDetails" id="addDetails">
                                    {{ csrf_field() }}{{ method_field('POST') }}
                                      <table class="table">
                                        <tr>
                                          <th>Salutation</th>
                                          <td>
                                        <select name="salutation" id="forSalutationId">
                                           <option value="Mr./Ms." selected>Mr./Ms.</option>
                                             <option value="Mr.">Mr.</option>
                                             <option value="Ms.">Ms.</option>
                                        </select>
                                      </td>
                                    </tr>
                                        <tr><th>First name</th>
                                      <td><input type="text" name="firstName" id="firstName" placeholder="Enter first name" class="form-control"/> </td>
                                      </tr>
                                      <tr>
                                        <th>Last name</th>
                                      <td><input type="text" name="lastName" id="lastName" placeholder="Enter last name" class="form-control"/> </td></tr>
                                        <tr>
                                        <th>Age</th>
                                      <td><input type="number" name="age" id="ageId" placeholder="Enter your age" class="form-control"/></td></tr>
                                        <tr>
                                        <th>Date of birth</th>
                                      <td><input type="date" name="dob" id="dobId" placeholder="Enter your date of birth" class="form-control"/></td></tr>
                                        <tr><input type="hidden" name="userId" id="userId" value="1" class="form-control"/>
                                          
                                          <th>Contact Number</th>
                                          <td><input type="tel+" name="contactNumber" id="contactNumber" placeholder="Enter Your Contact Number" class="form-control"/>
	</td></tr>
                                          <tr>
                                            <th>Alternate Contact Number</th>
                                            <td><input type="tel:" name="alternateContactNumber" id="alternateContactNumber" placeholder="Enter Your Alternate Contact Number" class="form-control"/></td></tr>
                                            <tr>
                                        <th>Assign Role : </th>
                                      <td><select name="roleId" id="roleForId" class="form-control">
                                                                                </select></td></tr>
                                      <tr>
                                          <th>Address</th>
                                          <td><input type="text" name="address" id="address" placeholder="Enter Address" class="form-control"/></td></tr>
                                          <tr>
                                            <th>Blood group</th>
                                            <td><input type="text" name="bloodGroup" id="bloodGroup" placeholder="Enter Blood Group" class="form-control"/></td></tr>
                                            <tr>
                                              <th>Identification Mark</th>
                                              <td><input type="text" name="identificationMark" id="identificationMark" placeholder="Enter identification mark" class="form-control"/>
</td></tr>
                                              <tr>
                                                <th>Parent's Number</th>
                                                  <td><input type="text" name="parentNumber" id="parentNumber" placeholder="Enter parent's number" class="form-control"/></td></tr>
                                                  <tr>
                                                    <th>Home Phone Number</th>
                                                    <td><input type="text" name="homePhoneNumber" id="homePhoneNumber" placeholder="Enter Home Phone Number" class="form-control"/>
</td></tr>
                                                    <tr>
                                                      <th>Father's/Spouse's Name</th>
                                                      <td><input type="text" name="fatherSpouseName" id="fatherSpouseName" placeholder="Enter Father's/Spouse's Name" class="form-control"/>
</td></tr>
                                                      <tr>
                                                        <th>Mother's Name</th>
                                                        <td><input type="text" name="motherName" id="motherName" placeholder="Enter mother's name" class="form-control"/></td></tr>
                                                        <tr>
                                                          <th>Guardian's Name</th>
                                                          <td><input type="text" name="guardianName" id="guardianName" placeholder="Enter Guardian's Name" class="form-control"/></td></tr>
                            <input type="hidden" id="userIdFor" name="userId" value=""/>
                                                        </table>
                                                      </div>  <button type="submit" class="btn btn-primary form-control form-control">Save</button>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" id="addNewDetailsToUser" data-dismiss="modal">Close</button>


</form>`;


    $('#forAddingNewDetailsOfUser').html(rowsGetNewUserDetail);

    var firstname=newUserData.firstname;
    document.getElementById("firstName").value =firstname;
    var lastname=newUserData.lastname;
    document.getElementById("lastName").value =lastname;
    var salutation=newUserData.sal;

$('#forSalutationId').val(salutation);
   
    var age=newUserData.age;
    document.getElementById("ageId").value=age;
 
    var dob=newUserData.dob;
    document.getElementById("dobId").value =dob;
    var contactNumber=newUserData.contactNumber;
    document.getElementById("contactNumber").value=contactNumber;
    var alternateContactNumber=newUserData.alternateContactNumber;
    document.getElementById("alternateContactNumber").value =alternateContactNumber;
    var address=newUserData.address;
    document.getElementById("address").value =address;

    document.getElementById("exampleModalFullName").innerHTML  ="Name :  "+firstname+" "+lastname;
    document.getElementById("exampleModalPhone").innerHTML  = "Phone  : "+contactNumber;

    var bloodGroup=newUserData.bloodGroup;
    document.getElementById("bloodGroup").value =bloodGroup;
    var identificationMark=newUserData.identificationMark;
    document.getElementById("identificationMark").value=identificationMark;
    var parentNumber=newUserData.parentNumber;
    document.getElementById("parentNumber").value=parentNumber;
    var homePhoneNumber=newUserData.homePhoneNumber;
    document.getElementById("homePhoneNumber").value=homePhoneNumber;

    var fatherSpouseName=newUserData.fatherSpouseName;
    document.getElementById("fatherSpouseName").value =fatherSpouseName;
    var motherName=newUserData.motherName;
    document.getElementById("motherName").value=motherName;
    var guardianName=newUserData.guardianName;
    document.getElementById("guardianName").value=guardianName;
//     getRoles(function(options) {
//     $('#roleForId').html(options);
// });         
    var detailIdFor=newUserData.detailId;
   $("#detailIdFor").val(detailIdFor);
    var userIdFor=newUserData.userId;
   $("#userIdFor").val(userIdFor);
   var roleForId = newUserData.roleId;

getRoles(function(options) {
    $('#roleForId').html(options);
    $('#roleForId').val(roleForId);
});
  //   var roleForId=newUserData.roleId;
  //  $("#roleForId").val(roleForId);
        },
                   error: function (xhr) {
  console.log(xhr.responseText);
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);

      }
            });

 });
  });


// 

// 

// 
function getNewUsers(){
    $.ajax({
        url: "{{ route('getNewUsers') }}",
        method: "GET",
        dataType: "json",
        success: function(data) {
          console.log(data);
        let rowsForNewUserDetails="";
data.forEach(function(newUser) {
                    rowsForNewUserDetails += `
                        <tr>
                            <td>${newUser.name}</td>
                            <td>${newUser.age}</td>
                            <td>${newUser.email}</td>
                            <td>
                                
                                    <button type="button"
                                class="btn btn-primary form-control"
                                data-toggle="modal"
                                data-target="#exampleModalLongNewUserUserId"
                                data-user-id="${newUser.userId}">
                                View
                            </button>
                            </td>
                        </tr>`;
                });
                $('#addNewDetailsToNewUser tbody').html(rowsForNewUserDetails);
                },

                

            });

        }
        function getAdmins(){
    $.ajax({
        url: "{{ route('getAdmins') }}",
        method: "GET",
        dataType: "json",
        success: function(data) {
        let rowsForAdminDetails="";
data.forEach(function(adminUser) {
                    rowsForAdminDetails += `
                        <tr>
                            <td>${adminUser.name}</td>
                            <td>${adminUser.age}</td>
                            <td>${adminUser.email}</td>
                            <td>
                                
                                    <button type="button"
                                class="btn btn-primary form-control"
                                data-toggle="modal"
                                data-target="#exampleModalLongAdminUserId"
                                data-user-id="${adminUser.userId}">
                                View
                            </button>
                            </td>
                        </tr>`;
                });
                $('#addNewDetailsToAdmins tbody').html(rowsForAdminDetails);
                },

                

            });

        }
  
 $(document).ready(function () {
   getAllData();
});
 function getAllData()
    {
getNewUsers();
}
</script>
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div>
      
<div id="successBox" class="success-box">
    <span class="message">✅ Data saved successfully!</span>
    <span class="close-btn" onclick="closeSuccess()">&times;</span>
</div> 


<div id="deleteSuccessBox" class="delete-box">
    <span class="message">✅ Data deleted successfully!</span>
    <span class="close-btn" onclick="closeDeleteSuccess()">&times;</span>
</div>

<div id="errorShowBox" class="errorshow-box">
    <span class="message"><h3 id="contentOfErrorShowBox"></h3></span>
    <span class="close-btn" onclick="closeError()">&times;</span>
</div>



    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
      <div class="sidebar-heading">MySchool </div>
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#detailsToNewUser" class="list-group-item list-group-item-action bg-light">Add details to new user</a>
          <a href="#createOrUpdateAdminDetails" class="list-group-item list-group-item-action bg-light">Create/Update admins's details</a>
          <a href="#createOrUpdateTeacherDetailsSection" class="list-group-item list-group-item-action bg-light">Create/Update teachers's details</a>
          <a href="#createOrUpdateStudentDetails" class="list-group-item list-group-item-action bg-light">Create/Update students's details</a>
        </li>
          </ul>
      </div>
    </div>
  </div>
</div>


            @if ( Auth::user()->role != 1)

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
                          <table class="table" id="addNewDetailsToNewUser">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Edit Details</th>
                              </tr>
                            </thead>
                            <tbody>
                         </tbody>
                      </table>


                            <div class="modal fade" id="exampleModalLongNewUserUserId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 style="margin-bottom:15px;" id="exampleModalFullName">Name :</h5>
                                    <h5 id="exampleModalPhone">Phone : </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div id="forAddingNewDetailsOfUser">

                                    </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>

                            

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
            @if(count($admins = (\App\Models\Detail::join('admins','admins.adminDetailId','=','details.detailId')
            ->join('users','users.detailsId','=','details.detailId')
            ->where('details.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',3))->get())>0)
              @foreach(($admins = (\App\Models\Detail::join('admins','admins.adminDetailId','=','details.detailId')
              ->join('users','users.detailsId','=','details.detailId')
              ->select('details.*','admins.*')
              ->where('details.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',3))->get()) as $admin)
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


                                       <form action="{{route('updateAdminDetails')}}" method="POST" name="createOrUpdateAdminDetails" id="createOrUpdateAdminDetails">
                                       {{ csrf_field() }}{{ method_field('POST') }}
                                       {{Form::hidden('detailId',$admin->detailId)}}{{Form::hidden('userId',$admin->userId)}}
                                       <!-- <tr>
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
                                       <tr> -->
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
                             </button></form></td>
                             <td><form action="{{route('deleteAdminDetails')}}" method="POST" name="deleteAdminDetails" id="deleteAdminDetails">
                             {{ csrf_field() }}{{ method_field('POST') }}
                             {{Form::hidden('detailId',$admin->detailId)}}{{Form::hidden('userId',$admin->userId)}}
                             <input type="submit" name="Delete" style="color:white;background-color:red;" class="btn btn-primary form-control" value="Delete"></input>
                           {{Form::hidden('userRole',3)}}
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
 <script>
  
 $(document).ready(function () {

   $('#exampleModalLongTeacherTeacherUserId').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);

   var inModalDetailId = button.data('inModalDetailId');
 var inModalUserId = button.data('inModalUserId');
var inModalSal = button.data('inModalSal');
 var inModalFirstName = button.data('inModalFirstName');
 var inModalLastName = button.data('inModalLastName');
 var inModalAge = button.data('inModalAge');
alert(inModalFirstName+inModalLastName);
    var inModalDOB = button.data('inModalDob');
  var inModalContactNumber = button.data('inModalContactNumber');
  var inModalAlternateContactNumber = button.data('inModalAlternateContactNumber');
  var inModalAddress = button.data('inModalAddress');
  var inModalBloodGroup = button.data('inModalBloodGroup');
     var inModalIDMark = button.data('inModalIdMark');
   var inModalParentNumber = button.data('inModalParentNumber');
   var inModalHomePhoneNumber = button.data('inModalHomePhoneNumber');
   var inModalFSName = button.data('inModalFsName');
   var inModalMothersName = button.data('inModalMothersName');
   var inModalGuardianName = button.data('inModalGuardianName');


   var modal = $(this);
     modal.find('#inModalDetailId').val(inModalDetailId);
     modal.find('#inModalUserId').val(inModalUserId);
     modal.find('#inModalSal').val(inModalSal);
     modal.find('#exampleModalNameLongTitle').val("Name : "+inModalSal+inModalFirstName+" "+inModalLastName);
     modal.find('#inModalFirstName').val(inModalFirstName);
     modal.find('#inModalLastName').val(inModalLastName);
     modal.find('#inModalAge').val(inModalAge);
     modal.find('#inModalDOB').val(inModalDOB);
       modal.find('#inModalContactNumber').val(inModalContactNumber);
       modal.find('#inModalAlternateContactNumber').val(inModalAlternateContactNumber);
       modal.find('#inModalAddress').val(inModalAddress);
       modal.find('#inModalBloodGroup').val(inModalBloodGroup);
       modal.find('#inModalIDMark').val(inModalIDMark);
       modal.find('#inModalParentNumber').val(inModalParentNumber);
         modal.find('#inModalHomePhoneNumber').val(inModalHomePhoneNumber);
         modal.find('#inModalFSName').val(inModalFSName);
         modal.find('#inModalMothersName').val(inModalMothersName);
         modal.find('#inModalGuardianName').val(inModalGuardianName);
 });

 });
 </script>

 <div class="modal fade" id="exampleModalLongTeacherTeacherUserId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalNameLongTitle"></h5>
            <h5 class="modal-title" id="exampleModalLongTitle">Role : Teacher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('updateTeacherDetails')}}" method="POST" name="createOrUpdateTeacherDetails" id="createOrUpdateTeacherDetails">
          {{ csrf_field() }}{{ method_field('POST') }}
          {{Form::hidden('detailId',null,array('id'=>'inModalDetailId'))}}
          {{Form::hidden('userId',null,array('id'=>'inModalUserId'))}}
          <table>
                          <thead>

                            <!-- <tr>
                              <th>Salutation</th>
                              <td>
                              <select name="salutation" id="inModalSal">
                                   <option value="Mr./Ms." selected>Mr./Ms.</option>;
                                   <option value="Mr.">Mr.</option>
                                   <option value="Ms.">Ms.</option>
                              </select></td>
                            </tr> -->
                            <tr><th>First name</th>
                            <td>{{Form::text('firstName',null,array('placeholder'=>'Enter first name','id'=>'inModalFirstName','class'=>'form-control'))}} </td>
                          </tr>
                          <tr>
                              <th>Last name</th>
                            <td>{{Form::text('lastName',null,array('placeholder'=>'Enter last name','id'=>'inModalLastName','class'=>'form-control'))}} </td></tr>
                            <tr>
                              <th>Age</th>
                            <td>{{Form::text('age',null,array('placeholder'=>'Enter age','id'=>'inModalAge','class'=>'form-control'))}}</td></tr>
                            <tr>
                              <th>Date of birth :</th>
                            <td>{{Form::date('dob',null,array('placeholder'=>'Enter date of birth','id'=>'inModalDOB','class'=>'form-control'))}}</td></tr>
                            <tr>
                              <th>Contact Number</th>
                            <td>{{Form::text('contactNumber',null,array('placeholder'=>'Enter contact Number','id'=>'inModalContactNumber','class'=>'form-control'))}}</td></tr>
                            <tr>
                              <th>Alternate Contact Number</th>
                            <td>{{Form::text('alternateContactNumber',null,array('placeholder'=>'Enter Alternate Contact Number','id'=>'inModalAlternateContactNumber','class'=>'form-control'))}}</td></tr>
                            <tr>
                              <th>Current Role</th>
                            <td>Teacher</td></tr>
                              <tr>
                              <th>Address</th>
                            <td>{{Form::text('address',null,array('placeholder'=>'Enter Address','id'=>'inModalAddress','class'=>'form-control'))}}</td></tr>
                              <tr>
                              <th>Blood group</th>
                            <td>{{Form::text('bloodGroup',null,array('placeholder'=>'Enter Blood Group','id'=>'inModalBloodGroup','class'=>'form-control'))}}</td></tr>
                              <tr>
                              <th>Identification Mark</th>
                            <td>{{Form::text('identificationMark',null,array('placeholder'=>'Enter identification mark','id'=>'inModalIDMark','class'=>'form-control'))}}</td></tr>
                              <tr>
                              <th>Parent's Number</th>
                            <td>{{Form::text('parentNumber',null,array('placeholder'=>"Enter parent's number",'id'=>'inModalParentNumber','class'=>'form-control'))}}</td></tr>
                              <tr>
                              <th>Home Phone Number</th>
                            <td>{{Form::text('homePhoneNumber',null,array('placeholder'=>'Enter Home Phone Number','id'=>'inModalHomePhoneNumber','class'=>'form-control'))}}</td></tr>
                              <tr>
                              <th>Father's/Spouse's Name</th>
                            <td>{{Form::text('fatherSpouseName',null,array('placeholder'=>"Enter Father's/Spouse's Name",'id'=>'inModalFSName','class'=>'form-control'))}}</td></tr>
                              <tr>
                                  <th>Mother's Name</th>
                                  <td>{{Form::text('motherName',null,array('placeholder'=>"Enter mother's name",'id'=>'inModalMothersName','class'=>'form-control'))}}</td></tr>
                                  <tr>
                                    <th>Guardian's Name</th>
                                    <td>{{Form::text('guardianName',null,array('placeholder'=>"Enter Guardian's Name",'id'=>'inModalGuardianName','class'=>'form-control'))}}</td></tr>
                                    <tr>
                                    </tr>
                                  </table>   <button type="button" id="closeModalForUpdateTeacher" class="btn btn-primary form-control">Submit</button>{{Form::close()}}</div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                  </div>
                                </div>
                              </div>
                            </div>

<!--
  -->


     <div class="py-12" id="createOrUpdateTeacherDetailsSection">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                     View/Edit details
                     <br>
                     Teachers<br>
                     @if(count($teachers = (\App\Models\Detail::join('teachers','teachers.teacherDetailId','=','details.detailId')
                     ->join('users','users.detailsId','=','details.detailId')
                     ->where('details.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',2))->get())>0)
                       @foreach(($teachers = (\App\Models\Detail::join('teachers','teachers.teacherDetailId','=','details.detailId')
                       ->join('users','users.detailsId','=','details.detailId')
                       ->select('details.*','teachers.*')
                                            ->where('details.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',2))->get()) as $teacher)

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
                           <td><button type="button" class="btn btn-primary form-control"
 data-in-modal-detail-id="{{$teacher->teacherDetailId}}"
 data-in-modal-sal="{{$teacher->sal}}"
 data-in-modal-user-id="{{$teacher->userId}}"
 data-in-modal-first-name="{{$teacher->firstname}}"
 data-in-modal-last-name="{{$teacher->lastname}}"
 data-in-modal-age="{{$teacher->age}}"
 data-in-modal-dob="{{$teacher->dob}}"
 data-in-modal-contact-number="{{$teacher->contactNumber}}"
 data-in-modal-alternate-contact-number="{{$teacher->alternateContactNumber}}"
 data-in-modal-address="{{$teacher->address}}"
 data-in-modal-blood-group="{{$teacher->bloodGroup}}"
 data-in-modal-id-mark="{{$teacher->identificationMark}}"
 data-in-modal-parent-number="{{$teacher->parentNumber}}"
 data-in-modal-home-phone-number="{{$teacher->homePhoneNumber}}"
 data-in-modal-fs-name="{{$teacher->fatherSpouseName}}"
 data-in-modal-mothers-name="{{$teacher->motherName}}"
 data-in-modal-guardian-name="{{$teacher->guardianName}}"
 data-toggle="modal"
 data-target="#exampleModalLongTeacherTeacherUserId">
 View/Edit Details
</button></td>
                             <td><form action="{{route('deleteTeacherDetails')}}" method="POST" name="deleteTeacherDetails" id="deleteTeacherDetails">
                             {{ csrf_field() }}{{ method_field('POST') }}
                             {{Form::hidden('detailId',$teacher->detailId)}}{{Form::hidden('userId',$teacher->userId)}}
                             {{Form::hidden('userRole',2)}}{{Form::hidden('userId',$teacher->userId)}}
                             <button type="submit" id="buttonForDeleteTeacherDetails" name="Delete" style="color:white;background-color:red;" class="btn btn-primary form-control" >Delete</button>
                          </form>
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
                                   @foreach($departments=\App\Models\Department::all() as $department)
                                    <button class="button-value form-control" onclick="myDepartment({{$department->departmentId}})" style="background-color: #1A1515;color:white;border-radius: 8px;border: 2px solid #4CAF50;">{{$department->departmentName}}</button>
                                   @endforeach
                                   </div>
                                   <hr>
                                   <hr>
                                   Semester<br>
                                     <div style="display:flex;padding:30px;">
                                     @foreach($semesters=\App\Models\Semester::all() as $semester)
                                      <button class="button-value form-control" onclick="mySemester({{$semester->semesterId}})" style="background-color: #1A1515;color:white;border-radius: 8px;border: 2px solid #3A4BDC;">{{$semester->semesterName}}</button>
                                     @endforeach
                                     </div>
                                     <hr>
                                     <hr>
                                     Grade<br>
                                       <div style="display:flex;padding:30px;">
                                       @foreach($grades=\App\Models\Grade::all() as $grade)
                                        <button class="button-value form-control" onclick="myGrade({{$grade->gradeId}})" style="background-color: #1A1515;color:white;border-radius: 8px;border: 2px solid #EA3D1A;">{{$grade->grade}}</button>
                                       @endforeach
                                       </div>
                                       <hr>
                                       <hr>
                                       Section<br>
                                         <div style="display:flex;padding:30px;">
                                         @foreach($sections=\App\Models\Section::all() as $section)
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
                    @if(count($students = (\App\Models\Detail::where('details.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',4)
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
                        @foreach(($students = (\App\Models\Detail::where('details.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',4)
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
                      <form action="{{route('updateStudentDetails')}}" method="POST" name="createOrUpdateStudentDetails" id="createOrUpdateStudentDetails">
                      {{ csrf_field() }}{{ method_field('POST') }}

                                    <table class="table">
                                      <thead>

                                        <!-- <tr>
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
                                          </select></td></tr> -->
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
                                <td><form action="{{route('deleteStudentDetails')}}" method="POST" name="deleteStudentDetails" id="deleteStudentDetails">
                                {{ csrf_field() }}{{ method_field('POST') }}
                                {{Form::hidden('detailId',$student->detailId)}}{{Form::hidden('userId',$student->userId)}}
                                {{Form::hidden('userRole',4)}}<input type="submit" name="Delete" style="color:white;background-color:red;" class="btn btn-primary form-control" value="Delete"></input>
                                
                              </form>
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





      <script src="{{ asset('js/filter.js') }}"></script>



</x-app-layout>
