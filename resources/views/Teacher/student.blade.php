<script src="{{ asset('js/Teacher/commonContent.js') }}" defer></script>
  <script src="{{ asset('js/Teacher/student.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

       

  
<!-- Custom CSS -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">



<link href="{{ asset('css/errorStyle.css') }}" rel="stylesheet" />

  <x-app-layout>
    
<div id="successBox" class="success-box">
    <span id="successMessage" class="message">✅ Data saved successfully!</span>
    <span class="close-btn" onclick="closeSuccess()">&times;</span>
</div>
<div id="errorShowBox" class="errorshow-box">
    <div id="contentOfErrorShowBox"></div>
    <span class="close-btn" onclick="closeError()">&times;</span>
</div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }} @if ($errors->any())
               <div class="alert alert-danger">
                 <a href="#" class="close" data-bs-dismiss="alert" aria-label="close">&times;</a>
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
@if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-bs-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

 <div class="py-12" id="teacherStudentAddStudent">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="overflow-x:scroll;">
                  Add Students

                  <form action="{{route('createStudentTeacher')}}" method="POST" enctype="multipart/form-data" id="addStudentTeacher">
                  {{ csrf_field() }}{{ method_field('POST') }}
                    <table class="table">
                  <thead>
                    <tr>
                      <th>Salutation</th>
                      <td>
                      <select name="salutation">
                           <option value="Mr./Ms." selected>Mr./Ms.</option>
                           <option value="Mr.">Mr.</option>
                           <option value="Ms.">Ms.</option>
                           <option value="Mrs.">Mrs.</option>
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
                  <button type="submit" id="buttonForAddStudentAdmin" class="btn btn-primary form-control">Add</button>

                                       </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="saveMarkDetailsCreation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                              <div class="modal-dialog modal-xl" role="document" style="max-width:90%;">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Enter marks of Student</h5>

                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body" id="subjectsList">
                                                    <table id="tableForDisplayingSubjectList">
                                                      <thead>
                                                        <tr>
                                                          <th>Subject ID</th>
                                                          <th>Subject Name</th>
                                                          <th>Subject Code</th>
                                                          <th>Maximum Marks</th>
                                                          <th>Marks</th>
                                                          <th>Submit</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <!-- Rows will be populated here -->
                                                      </tbody>
                                                    </table>
                          </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         </div>

                                            </div>
                                          </div>
                                        </div>
                                        
<!--
Edit student details
 -->
<script type="text/javascript">
    
      $(document).ready(function () {
   getAllData();
});
    
function getAllData()
    {
         getStudents();
         getStudentsForMarksEntry();
    }
        
        function getStudents(){
    $.ajax({
        url: "{{ route('getStudentsAccordingToSubjectTeacher') }}",
        method: "GET",
        dataType: "json",
        success: function(data) {
        let rowsForStudentDetails="";
        console.log(data);
data.forEach(function(studentUser) {
                    rowsForStudentDetails += `
                        <tr>
                            <td>${studentUser.name}</td>
                            <td>${studentUser.phone}</td>
                            <td>${studentUser.email}</td>
                            <td>
                                
                                    <button type="button"
                                class="btn btn-primary form-control"
                                data-bs-toggle="modal"
                                data-bs-target="#teacherModalLongStudentUserId"
                                data-bs-user-id="${studentUser.userId}">
                                View
                            </button>

                          
                            </td>
                        </tr>`;
                });
                // console.log(rowsForAdminDetails);
                $('#idForViewingStudentDetailsByTeacherInAModal tbody').html(rowsForStudentDetails);
                },

                

            });

        }

        
// 

// 

// 

// function getRoles(callback) {

//     $.ajax({
//         url: "/getRoles",
//         method: "GET",
//         dataType: "json",
//         success: function(data) {

//             let options = '';

//             data.forEach(function(roleList) {
//                 options += `
//                     <option value="${roleList.roleId}">
//                         ${roleList.roleName}
//                     </option>`;
//             });
//             callback(options);
//         }
//     });

// }

// 

// 

// 


$(document).ready(function () {

   $('#teacherModalLongStudentUserId').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);
   var studentUserId = button.attr('data-bs-user-id');
$.ajax({
                url: "{{ route('getDataForAddingDetailsOfStudentByTeacher') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                data:{
                  newStudentUserId:studentUserId
                },
                dataType: "json", // Expect a JSON response
                success: function(studentUserData) { 


console.log(studentUserData);
    let rowsGetStudentUserDetailForTeacher = "";
        rowsGetStudentUserDetailForTeacher += `
        <form action="{{route('storeDetailsByTeacher')}}" method="POST" name="teacherUpdateStudentDetails" id="teacherUpdateStudentDetails">
                                    {{ csrf_field() }}{{ method_field('POST') }}
                                      <table class="table">
                                        <tr>
                                          <th>Salutation</th>
                                          <td>
                                        <select name="salutation" id="studentforSalutationId">
                                           <option value="Mr./Ms." selected>Mr./Ms.</option>
                                             <option value="Mr.">Mr.</option>
                                             <option value="Ms.">Ms.</option>
                                             <option value="Mrs.">Mrs.</option>
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
                                        <th>Role : </th>
                                      <td><input type="text" name="roleId" id="studentroleForId" class="form-control" readonly/></td></tr>
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
                                                          <button type="submit" class="btn btn-secondary" id="addNewDetailsToStudentUser" data-bs-dismiss="modal">Close</button>


</form>`;
    $('#forTeacherEditingNewDetailsOfStudentUser').html(rowsGetStudentUserDetailForTeacher);

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

$('#studentforSalutationId').val(salutation);

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
// getRoles(function(options) {
    // $("#"+idforroleForId).html(options);
    $("#"+idforroleForId).val("Student");
// });
}


// 

// 

// 
</script>
<div class="modal fade" id="teacherModalLongStudentUserId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
          <div class="modal-header">
              <h5 style="margin-bottom:15px;" id="studentexampleModalFullName"></h5>
               <h5 id="studentexampleModalPhone"></h5>
               <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
               <div id="forTeacherEditingNewDetailsOfStudentUser">

               </div>
               </div>
       </div>
     </div>
   </div>





 <div class="py-12" id="teacherStudentAddStudent">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               View/Edit details
                     <br>
                     Students<br>
           <table class="table" id="idForViewingStudentDetailsByTeacherInAModal">
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
<script type="text/javascript">

function getStudentsForMarksEntry(){
$.ajax({
url: "{{ route('getStudentsListToAddMarksForTeacher') }}",
                method: "GET", 
                dataType: "json", 
                success: function(data) {

                    console.log(data);
let rowsGetStudentsToEnterMarks = "";

           data.forEach(function(studentsMark){
// let roleupdateurl = "/updateRole";
               rowsGetStudentsToEnterMarks += `
                    <tr class="studentId${studentsMark.studentId}studentId
                    departmentId${studentsMark.departmentId}departmentId 
                    semesterId${studentsMark.semesterId}semesterId
                    gradeId${studentsMark.gradeId}gradeId
                    sectionId${studentsMark.sectionId}sectionId
                    ">
    <td>${studentsMark.studentId} </td>
    <td>${studentsMark.sal}${studentsMark.firstName} ${studentsMark.lastName}</td>
    <td>${studentsMark.departmentName} </td>
    <td>${studentsMark.semesterName}</td>
    <td>${studentsMark.gradeName} </td>
    <td>${studentsMark.sectionName} </td>
    <td><button type="button" class="btn btn-primary form-control" data-bs-toggle="modal"
        data-bs-student-id="${studentsMark.studentId}"
        data-bs-department-id="${studentsMark.departmentId}"
        data-bs-semester-id="${studentsMark.semesterId}"
        data-bs-grade-id="${studentsMark.gradeId}"
        data-bs-section-id="${studentsMark.sectionId}"
         data-bs-target="#saveMarkDetailsCreation">
                                              Add Marks
                                            </button></td>
            </tr>
               `;
           });

           $('#tableForAddStudentMarks tbody').html(rowsGetStudentsToEnterMarks);                
        },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    // alert('Error fetching data');
                    // console.log(thrownError);
                    console.log("Status:", jqXHR.status);
    console.log("Response:", jqXHR.responseText);
    console.log("Error:", thrownError);
                }
            });


}


// 

// 

// 
   

const studentAddMarksListModal = document.getElementById('saveMarkDetailsCreation');

if (studentAddMarksListModal) {
  studentAddMarksListModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-* attributes
    const studentId = button.getAttribute('data-bs-student-id');
    const gradeId = button.getAttribute('data-bs-grade-id');
    const sectionId = button.getAttribute('data-bs-section-id');
    const departmentId = button.getAttribute('data-bs-department-id');
    const semesterId = button.getAttribute('data-bs-semester-id');
$.ajax({



                url: "{{ route('getListForAddingStudentMarksByATeacher') }}",
                method: "GET", 
                data:{
                            studentId:studentId,
                            gradeId:gradeId,
                            departmentId:departmentId,
                            semesterId:semesterId

                        },
                dataType: "json", 
                success: function(data) {
                    console.log(data); 
let rowsGetSubjectsMarks = "";

           data.forEach(function(subjectsList){
// let roleupdateurl = "/updateRole";
               rowsGetSubjectsMarks += `
                    <tr>
    <td>${subjectsList.subjectId} </td>
    <td>${subjectsList.subjectName} </td>
    <td>${subjectsList.subjectCode}</td>
    <td>${subjectsList.MaxMarks} </td>
    <td>
    <input type="hidden" name="studentId" value="${subjectsList.studentId}">
    <input type="hidden" name="subjectId" value="${subjectsList.subjectId}">
    <input type="hidden" name="student_marksId" class="student_marksId" value="${subjectsList.student_marksId}">
    <input type="number" name="marksObtained" class="marksObtained" value="${subjectsList.marks}" class="form-control" placeholder="Enter marks obtained">
    
    </td>
    <td><button type="submit" class="btn btn-primary form-control submitSubjectMarksButton" data-bs-dismiss="modal" data-url="submitSubjectMarks">Submit</button></td>
    </form>
            </tr>
               `;
           });
           
           $('#tableForDisplayingSubjectList tbody').html(rowsGetSubjectsMarks);                
        },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    // alert('Error fetching data');
                    // console.log(thrownError);
                    console.log("Status:", jqXHR.status);
    console.log("Response:", jqXHR.responseText);
    console.log("Error:", thrownError);
                }
            });

  });
}    
  </script>
<!--
Edit student details teacherStudentAddStudentMarks
 -->


     <div class="py-12" id="teacherStudentAddStudentMarks">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <h2>Add student Marks</h2>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-target="#showFilters">
                    Filter
                  </button>
                  <table id="tableForAddStudentMarks" class="table">
                    <thead>
                      <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Department</th>
                        <th>Semester</th>
                        <th>Grade</th>
                        <th>Section</th>
                        <th>Add Marks</th>
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
Marks Creation
   -->



</x-app-layout>
