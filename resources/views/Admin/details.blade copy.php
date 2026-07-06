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
                            <td>${newUser.phone}</td>
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
                            <td>${adminUser.phone}</td>
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
                $('#idForViewingAdminDetailsInAModal tbody').html(rowsForAdminDetails);
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
                                <th>Phone</th>
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
            <!-- @if(count($admins = (\App\Models\Detail::join('admins','admins.adminDetailId','=','details.detailId')
            ->join('users','users.detailsId','=','details.detailId')
            ->where('details.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',3))->get())>0) -->
              @foreach(($admins = (\App\Models\Detail::join('admins','admins.adminDetailId','=','details.detailId')
              ->join('users','users.detailsId','=','details.detailId')
              ->select('details.*','admins.*')
              ->where('details.batchId','=',(\App\Models\Batch::where('batches.status','=',1)->first())->batchId)->where('roleId','=',3))->get()) as $admin)
                       
                                  <table class="table" id="idForViewingAdminDetailsInAModal">
                         <thead>
                           <tr>
                             <th>Name</th>
                             <th>Phone</th>
                             <th>Email</th>
                             <th>View</th>
                           </tr>
                         </thead>
                         <tbody>
                           

                       </tbody>
                       </table>
                 

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
                    
                          
                        <table class="table department">
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
                          
                        </tbody>
                        </table>



                        @endforeach
                    

                  </div>
              </div>
          </div>
      </div>


      </div>
      </div>





      <script src="{{ asset('js/filter.js') }}"></script>



</x-app-layout>
