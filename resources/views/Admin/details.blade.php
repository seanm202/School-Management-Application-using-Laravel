<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/errorStyle.css') }}" rel="stylesheet" />
<link href="{{ asset('css/Admin/admin.css') }}" rel="stylesheet">

<script src="{{ asset('js/sidebar.js') }}"></script>

                  <script src="{{ asset('js/Admin/details.js') }}"></script>
       <script src="{{ asset('js/Admin/commonContent.js') }}" defer></script>
<style>
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


function allotValues(newUserData,firstNameIdName,lastNameIdName,salutationIdName,ageIdName,dobIdName,contactNumberIdName,
alternateContactNumberIdName,addressIdName,exampleModalFullNameIdName,exampleModalPhoneIdName,
bloodGroupIdName,identificationMarkIdName,parentNumberIdName,homePhoneNumberIdName,fatherSpouseNameIdName,
motherNameIdName,guardianNameIdName,detailIdFor,userIdFor,idforroleForId)
{
  var firstname=newUserData.firstname;
    document.getElementById(firstNameIdName).value =firstname;
    var lastname=newUserData.lastname;
    document.getElementById(lastNameIdName).value =lastname;
    var salutation=newUserData.sal;

$('#'+salutationIdName).val(salutation);

    var age=newUserData.age;
    document.getElementById(ageIdName).value=age;
 
    var dob=newUserData.dob;
    document.getElementById(dobIdName).value =dob;
    var tcontactNumber=newUserData.contactNumber;
    document.getElementById(contactNumberIdName).value=tcontactNumber;
    var talternateContactNumber=newUserData.alternateContactNumber;
    document.getElementById(alternateContactNumberIdName).value =talternateContactNumber;
    var address=newUserData.address;
    document.getElementById(addressIdName).value =address;

    document.getElementById(exampleModalFullNameIdName).value  ="Name :  "+firstname+" "+lastname;
    document.getElementById(exampleModalPhoneIdName).value  = "Phone  : "+tcontactNumber;

    var bloodGroup=newUserData.bloodGroup;
    document.getElementById(bloodGroupIdName).value =bloodGroup;
    var identificationMark=newUserData.identificationMark;
    document.getElementById(identificationMarkIdName).value=identificationMark;
    var parentNumber=newUserData.parentNumber;
    document.getElementById(parentNumberIdName).value=parentNumber;
    var homePhoneNumber=newUserData.homePhoneNumber;
    document.getElementById(homePhoneNumberIdName).value=homePhoneNumber;

    var fatherSpouseName=newUserData.fatherSpouseName;
    document.getElementById(fatherSpouseNameIdName).value =fatherSpouseName;
    var motherName=newUserData.motherName;
    document.getElementById(motherNameIdName).value=motherName;
    var guardianName=newUserData.guardianName;
    document.getElementById(guardianNameIdName).value=guardianName;
 
    var detailIdFor=newUserData.detailId;
   $(detailIdFor).val(detailIdFor);
    var userIdFord=newUserData.userId;
   $('#'+userIdFor).val(userIdFord);
   var roleForId = newUserData.roleId;
getRoles(function(options) {
    $("#"+idforroleForId).html(options);
    $("#"+idforroleForId).val(roleForId);
});
}

// 

// 

// 

$(document).ready(function () {

   $('#exampleModalLongTeacherUserId').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);
   var newTeacherUserId = button.attr('data-user-id');
$.ajax({
                url: "{{ route('getDataForAddingDetailsOfTeacher') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                data:{
                  newTeacherUserId:newTeacherUserId
                },
                dataType: "json", // Expect a JSON response
                success: function(newTeacherUserData) { 



    let rowsGetTeacherDetail = "";
        rowsGetTeacherDetail += `
        <form action="{{route('storeDetails')}}" method="POST" name="teacheraddDetails" id="teacheraddDetails">
                                    {{ csrf_field() }}{{ method_field('POST') }}
                                      <table class="table">
                                        <tr>
                                          <th>Salutation</th>
                                          <td>
                                        <select name="salutation" id="teacherforSalutationId">
                                           <option value="Mr./Ms." selected>Mr./Ms.</option>
                                             <option value="Mr.">Mr.</option>
                                             <option value="Ms.">Ms.</option>
                                        </select>
                                      </td>
                                    </tr>
                                        <tr><th>First name</th>
                                      <td><input type="text" name="firstName" id="teacherfirstName" placeholder="Enter first name" class="form-control"/> </td>
                                      </tr>
                                      <tr>
                                        <th>Last name</th>
                                      <td><input type="text" name="lastName" id="teacherlastName" placeholder="Enter last name" class="form-control"/> </td></tr>
                                        <tr>
                                        <th>Age</th>
                                      <td><input type="number" name="age" id="teacherageId" placeholder="Enter your age" class="form-control"/></td></tr>
                                        <tr>
                                        <th>Date of birth</th>
                                      <td><input type="date" name="dob" id="teacherdobId" placeholder="Enter your date of birth" class="form-control"/></td></tr>
                                        <tr>
                                          
                                          <th>Contact Number</th>
                                          <td><input type="tel+" name="contactNumber" id="teachercontactNumber" placeholder="Enter Your Contact Number" class="form-control"/>
	</td></tr>
                                          <tr>
                                            <th>Alternate Contact Number</th>
                                            <td><input type="tel:" name="alternateContactNumber" id="teacheralternateContactNumber" placeholder="Enter Your Alternate Contact Number" class="form-control"/></td></tr>
                                            <tr>
                                        <th>Assign Role : </th>
                                      <td><select name="roleId" id="teacherroleForId" class="form-control">
                                                                                </select></td></tr>
                                      <tr>
                                          <th>Address</th>
                                          <td><input type="text" name="address" id="teacheraddress" placeholder="Enter Address" class="form-control"/></td></tr>
                                          <tr>
                                            <th>Blood group</th>
                                            <td><input type="text" name="bloodGroup" id="teacherbloodGroup" placeholder="Enter Blood Group" class="form-control"/></td></tr>
                                            <tr>
                                              <th>Identification Mark</th>
                                              <td><input type="text" name="identificationMark" id="teacheridentificationMark" placeholder="Enter identification mark" class="form-control"/>
</td></tr>
                                              <tr>
                                                <th>Parent's Number</th>
                                                  <td><input type="text" name="parentNumber" id="teacherparentNumber" placeholder="Enter parent's number" class="form-control"/></td></tr>
                                                  <tr>
                                                    <th>Home Phone Number</th>
                                                    <td><input type="text" name="homePhoneNumber" id="teacherhomePhoneNumber" placeholder="Enter Home Phone Number" class="form-control"/>
</td></tr>
                                                    <tr>
                                                      <th>Father's/Spouse's Name</th>
                                                      <td><input type="text" name="fatherSpouseName" id="teacherfatherSpouseName" placeholder="Enter Father's/Spouse's Name" class="form-control"/>
</td></tr>
                                                      <tr>
                                                        <th>Mother's Name</th>
                                                        <td><input type="text" name="motherName" id="teachermotherName" placeholder="Enter mother's name" class="form-control"/></td></tr>
                                                        <tr>
                                                          <th>Guardian's Name</th>
                                                          <td><input type="text" name="guardianName" id="teacherguardianName" placeholder="Enter Guardian's Name" class="form-control"/></td></tr>
                            <input type="hidden" id="teacheruserIdFor" name="userId" value=""/>
                                                        </table>
                                                      </div>  <button type="submit" class="btn btn-primary form-control">Save</button>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" id="addNewDetailsToteacher" data-dismiss="modal">Close</button>


</form>`;
// console.log(rowsGetTeacherDetail);
    $('#forAddingNewDetailsOfTeacherUser').html(rowsGetTeacherDetail);

allotValues(newTeacherUserData,"teacherfirstName","teacherlastName","teacherforSalutationId","teacherageId","teacherdobId","teachercontactNumber",
"teacheralternateContactNumber","teacheraddress","teacherexampleModalFullName","teacherexampleModalPhone",
"teacherbloodGroup","teacheridentificationMark","teacherparentNumber","teacherhomePhoneNumber","teacherfatherSpouseName",
"teachermotherName","teacherguardianName","teacherdetailIdFor","teacheruserIdFor","teacherroleForId");


        },

error: function(xhr) {
    var errors = xhr.responseJSON.errors;

    // Flatten all error arrays into one array
    var messages = Object.values(errors).flat();

    showError(messages);
}
            });

 });
  });


// 

// 

// 


$(document).ready(function () {

   $('#exampleModalLongAdminUserId').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);
   var newAdminUserId = button.attr('data-user-id');
$.ajax({
                url: "{{ route('getDataForAddingDetailsOfAdmin') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                data:{
                  newAdminUserId:newAdminUserId
                },
                dataType: "json", // Expect a JSON response
                success: function(newUserData) { 



    let rowsGetAdminDetail = "";
        rowsGetAdminDetail += `
        <form action="{{route('storeDetails')}}" method="POST" name="adminaddDetails" id="adminaddDetails">
                                    {{ csrf_field() }}
                                      <table class="table">
                                        <tr>
                                          <th>Salutation</th>
                                          <td>
                                        <select name="salutation" id="adminforSalutationId">
                                           <option value="Mr./Ms." selected>Mr./Ms.</option>
                                             <option value="Mr.">Mr.</option>
                                             <option value="Ms.">Ms.</option>
                                        </select>
                                      </td>
                                    </tr>
                                        <tr><th>First name</th>
                                      <td><input type="text" name="firstName" id="adminfirstName" placeholder="Enter first name" class="form-control"/> </td>
                                      </tr>
                                      <tr>
                                        <th>Last name</th>
                                      <td><input type="text" name="lastName" id="adminlastName" placeholder="Enter last name" class="form-control"/> </td></tr>
                                        <tr>
                                        <th>Age</th>
                                      <td><input type="number" name="age" id="adminageId" placeholder="Enter your age" class="form-control"/></td></tr>
                                        <tr>
                                        <th>Date of birth</th>
                                      <td><input type="date" name="dob" id="admindobId" placeholder="Enter your date of birth" class="form-control"/></td></tr>
                                        <tr>
                                          
                                          <th>Contact Number</th>
                                          <td><input type="tel+" name="contactNumber" id="admincontactNumber" placeholder="Enter Your Contact Number" class="form-control"/>
	</td></tr>
                                          <tr>
                                            <th>Alternate Contact Number</th>
                                            <td><input type="tel:" name="alternateContactNumber" id="adminalternateContactNumber" placeholder="Enter Your Alternate Contact Number" class="form-control"/></td></tr>
                                            <tr>
                                        <th>Assign Role : </th>
                                      <td><select name="roleId" id="adminroleForId" class="form-control">
                                                                                </select></td></tr>
                                      <tr>
                                          <th>Address</th>
                                          <td><input type="text" name="address" id="adminaddress" placeholder="Enter Address" class="form-control"/></td></tr>
                                          <tr>
                                            <th>Blood group</th>
                                            <td><input type="text" name="bloodGroup" id="adminbloodGroup" placeholder="Enter Blood Group" class="form-control"/></td></tr>
                                            <tr>
                                              <th>Identification Mark</th>
                                              <td><input type="text" name="identificationMark" id="adminidentificationMark" placeholder="Enter identification mark" class="form-control"/>
</td></tr>
                                              <tr>
                                                <th>Parent's Number</th>
                                                  <td><input type="text" name="parentNumber" id="adminparentNumber" placeholder="Enter parent's number" class="form-control"/></td></tr>
                                                  <tr>
                                                    <th>Home Phone Number</th>
                                                    <td><input type="text" name="homePhoneNumber" id="adminhomePhoneNumber" placeholder="Enter Home Phone Number" class="form-control"/>
</td></tr>
                                                    <tr>
                                                      <th>Father's/Spouse's Name</th>
                                                      <td><input type="text" name="fatherSpouseName" id="adminfatherSpouseName" placeholder="Enter Father's/Spouse's Name" class="form-control"/>
</td></tr>
                                                      <tr>
                                                        <th>Mother's Name</th>
                                                        <td><input type="text" name="motherName" id="adminmotherName" placeholder="Enter mother's name" class="form-control"/></td></tr>
                                                        <tr>
                                                          <th>Guardian's Name</th>
                                                          <td><input type="text" name="guardianName" id="adminguardianName" placeholder="Enter Guardian's Name" class="form-control"/></td></tr>
                            <input type="hidden" id="adminuserIdFor" name="userId" value=""/>
                                                        </table>
                                                      </div>  <button type="submit" class="btn btn-primary form-control">Save</button>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" id="addNewDetailsToAdmin" data-dismiss="modal">Close</button>


</form>`;
    $('#forAddingNewDetailsOfAdminUser').html(rowsGetAdminDetail);

allotValues(newUserData,"adminfirstName","adminlastName","adminforSalutationId","adminageId","admindobId","admincontactNumber",
"adminalternateContactNumber","adminaddress","adminexampleModalFullName","adminexampleModalPhone",
"adminbloodGroup","adminidentificationMark","adminparentNumber","adminhomePhoneNumber","adminfatherSpouseName",
"adminmotherName","adminguardianName","admindetailIdFor","adminuserIdFor","adminroleForId");


        },

error: function(xhr) {
    var errors = xhr.responseJSON.errors;

    // Flatten all error arrays into one array
    var messages = Object.values(errors).flat();

    showError(messages);
}
            });

 });
  });

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

console.log(newUserData);

    let rowsGetNewUserDetail = "";
        rowsGetNewUserDetail += `
        <form action="{{route('storeDetails')}}" method="POST" name="newUserAddDetails" id="newUserAddDetails">
                                    {{ csrf_field() }}{{ method_field('POST') }}
                                      <table class="table">
                                        <tr>
                                          <th>Salutation</th>
                                          <td>
                                        <select name="salutation" id="newforSalutationId">
                                           <option value="Mr./Ms." selected>Mr./Ms.</option>
                                             <option value="Mr.">Mr.</option>
                                             <option value="Ms.">Ms.</option>
                                        </select>
                                      </td>
                                    </tr>
                                        <tr><th>First name</th>
                                      <td><input type="text" name="firstName" id="newfirstName" placeholder="Enter first name" class="form-control"/> </td>
                                      </tr>
                                      <tr>
                                        <th>Last name</th>
                                      <td><input type="text" name="lastName" id="newlastName" placeholder="Enter last name" class="form-control"/> </td></tr>
                                        <tr>
                                        <th>Age</th>
                                      <td><input type="number" name="age" id="newageId" placeholder="Enter your age" class="form-control"/></td></tr>
                                        <tr>
                                        <th>Date of birth</th>
                                      <td><input type="date" name="dob" id="newdobId" placeholder="Enter your date of birth" class="form-control"/></td></tr>
                                        <tr><input type="hidden" name="userId" id="newuserIdFor" value="" class="form-control"/>
                                          
                                          <th>Contact Number</th>
                                          <td><input type="tel+" name="contactNumber" id="newcontactNumber" placeholder="Enter Your Contact Number" class="form-control"/>
	</td></tr>
                                          <tr>
                                            <th>Alternate Contact Number</th>
                                            <td><input type="tel:" name="alternateContactNumber" id="newalternateContactNumber" placeholder="Enter Your Alternate Contact Number" class="form-control"/></td></tr>
                                            <tr>
                                        <th>Assign Role : </th>
                                      <td><select name="roleId" id="newroleForId" class="form-control">
                                                                                </select></td></tr>
                                      <tr>
                                          <th>Address</th>
                                          <td><input type="text" name="address" id="newaddress" placeholder="Enter Address" class="form-control"/></td></tr>
                                          <tr>
                                            <th>Blood group</th>
                                            <td><input type="text" name="bloodGroup" id="newbloodGroup" placeholder="Enter Blood Group" class="form-control"/></td></tr>
                                            <tr>
                                              <th>Identification Mark</th>
                                              <td><input type="text" name="identificationMark" id="newidentificationMark" placeholder="Enter identification mark" class="form-control"/>
</td></tr>
                                              <tr>
                                                <th>Parent's Number</th>
                                                  <td><input type="text" name="parentNumber" id="newparentNumber" placeholder="Enter parent's number" class="form-control"/></td></tr>
                                                  <tr>
                                                    <th>Home Phone Number</th>
                                                    <td><input type="text" name="homePhoneNumber" id="newhomePhoneNumber" placeholder="Enter Home Phone Number" class="form-control"/>
</td></tr>
                                                    <tr>
                                                      <th>Father's/Spouse's Name</th>
                                                      <td><input type="text" name="fatherSpouseName" id="newfatherSpouseName" placeholder="Enter Father's/Spouse's Name" class="form-control"/>
</td></tr>
                                                      <tr>
                                                        <th>Mother's Name</th>
                                                        <td><input type="text" name="motherName" id="newmotherName" placeholder="Enter mother's name" class="form-control"/></td></tr>
                                                        <tr>
                                                          <th>Guardian's Name</th>
                                                          <td><input type="text" name="guardianName" id="newguardianName" placeholder="Enter Guardian's Name" class="form-control"/></td></tr>
                   
                                                        </table>
                                                      </div>  <button type="submit" id="newaddNewDetailsToUser" class="btn btn-primary form-control">Save</button>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


</form>`;
    $('#forAddingNewDetailsOfUser').html(rowsGetNewUserDetail); 

allotValues(newUserData,"newfirstName","newlastName",'newforSalutationId',"newageId","newdobId","newcontactNumber",
"newalternateContactNumber","newaddress","newexampleModalFullName","newexampleModalPhone",
"newbloodGroup","newidentificationMark","newparentNumber","newhomePhoneNumber","newfatherSpouseName",
"newmotherName","newguardianName","newdetailIdFor","newuserIdFor","newroleForId");


        },

error: function(xhr) {
    var errors = xhr.responseJSON.errors;

    // Flatten all error arrays into one array
    var messages = Object.values(errors).flat();

    showError(messages);
}
            });

 });
  });

// 

// 

// 

$(document).ready(function () {

   $('#exampleModalLongStudentUserId').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);
   var newStudentUserId = button.attr('data-user-id');
$.ajax({
                url: "{{ route('getDataForAddingDetailsOfStudent') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                data:{
                  newStudentUserId:newStudentUserId
                },
                dataType: "json", // Expect a JSON response
                success: function(studentUserData) { 



    let rowsGetStudentUserDetail = "";
        rowsGetStudentUserDetail += `
        <form action="{{route('storeDetails')}}" method="POST" name="studentAddDetails" id="studentAddDetails">
                                    {{ csrf_field() }}{{ method_field('POST') }}
                                      <table class="table">
                                        <tr>
                                          <th>Salutation</th>
                                          <td>
                                        <select name="salutation" id="studentforSalutationId">
                                           <option value="Mr./Ms." selected>Mr./Ms.</option>
                                             <option value="Mr.">Mr.</option>
                                             <option value="Ms.">Ms.</option>
                                        </select>
                                      </td>
                                    </tr>
                                        <tr><th>First name</th>
                                      <td><input type="text" name="firstName" id="studentfirstName" placeholder="Enter first name" class="form-control"/> </td>
                                      </tr>
                                      <tr>
                                        <th>Last name</th>
                                      <td><input type="text" name="lastName" id="studentlastName" placeholder="Enter last name" class="form-control"/> </td></tr>
                                        <tr>
                                        <th>Age</th>
                                      <td><input type="number" name="age" id="studentageId" placeholder="Enter your age" class="form-control"/></td></tr>
                                        <tr>
                                        <th>Date of birth</th>
                                      <td><input type="date" name="dob" id="studentdobId" placeholder="Enter your date of birth" class="form-control"/></td></tr>
                                        <tr>
                                          
                                          <th>Contact Number</th>
                                          <td><input type="tel+" name="contactNumber" id="studentcontactNumber" placeholder="Enter Your Contact Number" class="form-control"/>
	</td></tr>
                                          <tr>
                                            <th>Alternate Contact Number</th>
                                            <td><input type="tel:" name="alternateContactNumber" id="studentalternateContactNumber" placeholder="Enter Your Alternate Contact Number" class="form-control"/></td></tr>
                                            <tr>
                                        <th>Assign Role : </th>
                                      <td><select name="roleId" id="studentroleForId" class="form-control">
                                                                                </select></td></tr>
                                      <tr>
                                          <th>Address</th>
                                          <td><input type="text" name="address" id="studentaddress" placeholder="Enter Address" class="form-control"/></td></tr>
                                          <tr>
                                            <th>Blood group</th>
                                            <td><input type="text" name="bloodGroup" id="studentbloodGroup" placeholder="Enter Blood Group" class="form-control"/></td></tr>
                                            <tr>
                                              <th>Identification Mark</th>
                                              <td><input type="text" name="identificationMark" id="studentidentificationMark" placeholder="Enter identification mark" class="form-control"/>
</td></tr>
                                              <tr>
                                                <th>Parent's Number</th>
                                                  <td><input type="text" name="parentNumber" id="studentparentNumber" placeholder="Enter parent's number" class="form-control"/></td></tr>
                                                  <tr>
                                                    <th>Home Phone Number</th>
                                                    <td><input type="text" name="homePhoneNumber" id="studenthomePhoneNumber" placeholder="Enter Home Phone Number" class="form-control"/>
</td></tr>
                                                    <tr>
                                                      <th>Father's/Spouse's Name</th>
                                                      <td><input type="text" name="fatherSpouseName" id="studentfatherSpouseName" placeholder="Enter Father's/Spouse's Name" class="form-control"/>
</td></tr>
                                                      <tr>
                                                        <th>Mother's Name</th>
                                                        <td><input type="text" name="motherName" id="studentmotherName" placeholder="Enter mother's name" class="form-control"/></td></tr>
                                                        <tr>
                                                          <th>Guardian's Name</th>
                                                          <td><input type="text" name="guardianName" id="studentguardianName" placeholder="Enter Guardian's Name" class="form-control"/></td></tr>
                            <input type="hidden" id="studentuserIdFor" name="userId" value=""/>
                                                        </table>
                                                      </div>  <button type="submit" class="btn btn-primary form-control">Save</button>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" id="addNewDetailsToStudentUser" data-dismiss="modal">Close</button>


</form>`;
    $('#forAddingNewDetailsOfStudentUser').html(rowsGetStudentUserDetail);

allotValues(studentUserData,"studentfirstName","studentlastName","studentforSalutationId","studentageId","studentdobId","studentcontactNumber",
"studentalternateContactNumber","studentaddress","studentexampleModalFullName","studentexampleModalPhone",
"studentbloodGroup","studentidentificationMark","studentparentNumber","studenthomePhoneNumber","studentfatherSpouseName",
"studentmotherName","studentguardianName","studentdetailIdFor","studentuserIdFor","studentroleForId");


        },

error: function(xhr) {
    var errors = xhr.responseJSON.errors;

    // Flatten all error arrays into one array
    var messages = Object.values(errors).flat();

    showError(messages);
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
          // console.log(data);
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
                // console.log(rowsForAdminDetails);
                $('#idForViewingAdminDetailsInAModal tbody').html(rowsForAdminDetails);
                },

                

            });

        }
  function getTeachers(){
    $.ajax({
        url: "{{ route('getTeachers') }}",
        method: "GET",
        dataType: "json",
        success: function(data) {
        let rowsForTeacherDetails="";
data.forEach(function(teacherUser) {
                    rowsForTeacherDetails += `
                        <tr>
                            <td>${teacherUser.name}</td>
                            <td>${teacherUser.phone}</td>
                            <td>${teacherUser.email}</td>
                            <td>
                                
                                    <button type="button"
                                class="btn btn-primary form-control"
                                data-toggle="modal"
                                data-target="#exampleModalLongTeacherUserId"
                                data-user-id="${teacherUser.userId}">
                                View
                            </button>

                          
                            </td>
                        </tr>`;
                });
                // console.log(rowsForAdminDetails);
                $('#idForViewingTeacherDetailsInAModal tbody').html(rowsForTeacherDetails);
                },

                

            });

        }
        function getStudents(){
    $.ajax({
        url: "{{ route('getStudents') }}",
        method: "GET",
        dataType: "json",
        success: function(data) {
        let rowsForStudentDetails="";
data.forEach(function(studentUser) {
                    rowsForStudentDetails += `
                        <tr>
                            <td>${studentUser.name}</td>
                            <td>${studentUser.phone}</td>
                            <td>${studentUser.email}</td>
                            <td>
                                
                                    <button type="button"
                                class="btn btn-primary form-control"
                                data-toggle="modal"
                                data-target="#exampleModalLongStudentUserId"
                                data-user-id="${studentUser.userId}">
                                View
                            </button>

                          
                            </td>
                        </tr>`;
                });
                // console.log(rowsForAdminDetails);
                $('#idForViewingStudentDetailsInAModal tbody').html(rowsForStudentDetails);
                },

                

            });

        }
 $(document).ready(function () {
   getAllData();
});
 function getAllData()
    {
getNewUsers();
getAdmins();
getTeachers();
getStudents();
}
</script>
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div>
      
<div id="successBox" class="success-box">
    <span id="successMessage" class="message">✅ Data saved successfully!</span>
    <span class="close-btn" onclick="closeSuccess()">&times;</span>
</div>
<div id="errorShowBox" class="errorshow-box">
    <div id="contentOfErrorShowBox"></div>
    <span class="close-btn" onclick="closeError()">&times;</span>
</div>



    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
      <div class="sidebar-heading">MySchool </div>
      <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
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

<div class="modal fade" id="exampleModalLongNewUserUserId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 style="margin-bottom:15px;" id="newexampleModalFullName"></h5>
                                    <h5 id="newexampleModalPhone"></h5>
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

                                                  <!-- 
                                                  
                                                  
                                                  -->
<div class="modal fade" id="exampleModalLongTeacherUserId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 style="margin-bottom:15px;" id="teacherexampleModalFullName"></h5>
                                    <h5 id="teacherexampleModalPhone"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div id="forAddingNewDetailsOfTeacherUser">

                                    </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <!-- 
                                                  
                                                  -->

<div class="modal fade" id="exampleModalLongStudentUserId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 style="margin-bottom:15px;" id="studentexampleModalFullName"></h5>
                                    <h5 id="studentexampleModalPhone"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div id="forAddingNewDetailsOfStudentUser">

                                    </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <!-- 
                                                  
                                                  
                                                  -->

              <div class="modal fade" id="exampleModalLongAdminUserId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 style="margin-bottom:15px;" id="adminexampleModalFullName"></h5>
                                    <h5 id="adminexampleModalPhone"></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div id="forAddingNewDetailsOfAdminUser">

                                    </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>


                                                  <!-- 
                                                  
                                                  
                                                  -->

            @if ( Auth::user()->role!= 1)

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
                     Admins<br>
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
     <div class="py-12" id="createOrUpdateTeacherDetails">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                     View/Edit details
                     <br>
                     Teachers<br>
           <table class="table" id="idForViewingTeacherDetailsInAModal">
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
     <!-- 
     
     -->
     <div class="py-12" id="createOrUpdateStudentDetails">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                     View/Edit details
                     <br>
                     Students<br>
           <table class="table" id="idForViewingStudentDetailsInAModal">
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
     





      <script src="{{ asset('js/filter.js') }}"></script>



</x-app-layout>
