<!-- Bootstrap 5.2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- jQuery (FULL version for plugins like jquery.form) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Form Plugin -->
<script src="https://malsup.github.io/jquery.form.js"></script>

<!-- Bootstrap 5 Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Your Custom Files -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}"></script>

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
   {{ __('Assign classes') }}
  <br>
  <button class="btn btn-primary" id="menu-toggle" style="position:fixed;background-color: white;color:white;">Menu</button> @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-bs-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
        </h2>
        @if ($errors->any())
           <div class="alert alert-danger">
             <a href="#" class="close" data-bs-dismiss="alert" aria-label="close">&times;</a>
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
          <a href="#createsTeacherForSubjects" class="list-group-item list-group-item-action bg-light">Allot subjects to teachers</a>
          <a href="#editTeacherForSubjects" class="list-group-item list-group-item-action bg-light">Edit/Change subject allotted to teachers's</a>
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

<!--



 -->
 <script type="text/javascript">


function getTeachersList(callback) {

    $.ajax({
        url: "{{ route('getListOfTeachers') }}",
        method: "GET",
        dataType: "json",
        success: function(data) {

            let html = '<select name="teacherId" class="form-select">';

            data.forEach(function(teacher) {
                html += `
                    <option value="${teacher.teacherId}">
                        ${teacher.firstName} ${teacher.lastName}
                    </option>`;
            });

            html += '</select>';

            callback(html);
        },
        error: function(jqXHR) {
            alert("AJAX error");
            console.log(jqXHR.responseText);
        }
    });
}

 $(document).ready(function () {

   $('#createTeachersForSubjects').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);

   var classRoomDetailId = button.attr('data-bs-class-room-id');
$.ajax({
                url: "{{ route('getSubjectsForClassroomForAssigningTeachers') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                data:{
                  classRoomDetailId:classRoomDetailId
                },
                dataType: "json", // Expect a JSON response
                success: function(data) { 
                    // console.log(data); // You can view the data in the browser console
getTeachersList(function(selectTeacherHtml) {

    let rowsGetTeacherDetail = "";

    data.forEach(function(classRoomsForAssigningTeacher){

        rowsGetTeacherDetail += `
        <tr>
            <td>${classRoomsForAssigningTeacher.gradeName}</td>
            <td>${classRoomsForAssigningTeacher.sectionName}</td>
            <td>${classRoomsForAssigningTeacher.subjectName}</td>
            <td>${classRoomsForAssigningTeacher.subjectCode}</td>

            <td colspan="2">
                <form action="{{ route('assignTeacher') }}" method="POST" class="formForAssigningTeachers d-flex gap-2">
                    @csrf

                    <input type="hidden" name="subjectId" value="${classRoomsForAssigningTeacher.subjectId}">
                    <input type="hidden" name="gradeId" value="${classRoomsForAssigningTeacher.gradeId}">
                    <input type="hidden" name="classRoomId" value="${classRoomsForAssigningTeacher.classRoomId}">
                    <input type="hidden" name="semesterId" value="${classRoomsForAssigningTeacher.semesterId}">
                    <input type="hidden" name="departmentId" value="${classRoomsForAssigningTeacher.departmentId}">

                    ${selectTeacherHtml}

                    <button type="submit" class="buttonForAssigningTeachers btn btn-primary" data-bs-dismiss="modal">
                        Assign
                    </button>
                </form>
            </td>
        </tr>`;
    });

    $('#inTheModalClassRoomsForTeacherAssignment tbody').html(rowsGetTeacherDetail);

});            
        },
                   error: function (xhr) {
  console.log(xhr.responseText);
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);
    
      }
            });

 });

 });
 </script>
<!--

 -->
<script type="text/javascript">
  
 
      $(document).ready(function () {
   getAllData();
});
    
     
function getAllData()
    {
        listAssignClassRoomTeacherDetails();
        listAssignedClassRoomTeacherDetails();
    }
    

function listAssignClassRoomTeacherDetails()
    {
        $.ajax({
                url: "{{ route('getClassroomForAssigningTeachers') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                dataType: "json", // Expect a JSON response
                success: function(data) { 
                    console.log(data); // You can view the data in the browser console
let rowsGetTeacherDetail = "";
    
           data.forEach(function(classRoomsForAssigningTeacher){
               rowsGetTeacherDetail += `
                    <tr>
    <td>${classRoomsForAssigningTeacher.classRoomId}</td>
    <td>${classRoomsForAssigningTeacher.departmentName}</td>
    <td>${classRoomsForAssigningTeacher.semesterName}</td>
    <td>${classRoomsForAssigningTeacher.gradeName}</td>
    <td>${classRoomsForAssigningTeacher.sectionName}</td>
    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                 data-bs-class-room-id="${classRoomsForAssigningTeacher.classRoomId}"
                                 data-bs-target="#createTeachersForSubjects">View</button></td>
            </tr>
               `; 
           });

           $('#classRoomsForTeacherAssignment tbody').html(rowsGetTeacherDetail);                
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


 $(document).ready(function () {

   $('#createTeachersForAssignedTeachers').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);

   var classRoomDetailId = button.attr('data-bs-class-room-id');
   var classRoomDepartmentName = button.attr('data-bs-department-name');
   var classRoomSemesterName = button.attr('data-bs-semester-name');
   var classRoomGradeName = button.attr('data-bs-grade-name');
   var classRoomSectionName = button.attr('data-bs-section-name');
$.ajax({
                url: "{{ route('getSubjectsForClassroomForAssignedTeachers') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                data:{
                  classRoomDetailId:classRoomDetailId
                },
                dataType: "json", // Expect a JSON response
                success: function(data) { 
                    console.log(data);

                   document.getElementById('reassignGrade').innerHTML =
    `<br><hr><h3>${classRoomGradeName}</h3><br><hr>`;

document.getElementById('reassignSection').innerHTML =
    `<h3>${classRoomSectionName}</h3><br><hr>`;

document.getElementById('reassignDepartment').innerHTML =
    `<h3>${classRoomDepartmentName}</h3><br><hr>`;

document.getElementById('reassignSemester').innerHTML =
    `<h3>${classRoomSemesterName}</h3><br><hr>`;
                     
getTeachersList(function(selectTeacherHtml) {

    let rowsGetTeacherDetails = "";

    data.forEach(function(classRoomsForAssignedTeacher){

        rowsGetTeacherDetails += `
        <tr>
            <td>${classRoomsForAssignedTeacher.gradeName}</td>
            <td>${classRoomsForAssignedTeacher.sectionName}</td>
            <td>${classRoomsForAssignedTeacher.subjectName}</td>
            <td>${classRoomsForAssignedTeacher.subjectCode}</td> 
            <td>${classRoomsForAssignedTeacher.salutation} ${classRoomsForAssignedTeacher.teacherFirstName} ${classRoomsForAssignedTeacher.teacherLastName}</td>

            <td colspan="2">
                <form action="{{ route('reAssignTeacher') }}" method="POST" class="formForReAssigningTeachers d-flex gap-2">
                    @csrf

                    <input type="hidden" name="subjectForSectionId" value="${classRoomsForAssignedTeacher.subjectForSectionId}"> 
                    ${selectTeacherHtml}

                    <button type="submit" class="buttonForReAssigningTeachers btn btn-primary" data-bs-dismiss="modal">
                        Assign
                    </button>
                </form>
            </td>
        </tr>`;
    });
// console.log(rowsGetTeacherDetails);
    $('#tableForViewingClasswiseSubjectTeachers tbody').html(rowsGetTeacherDetails);

});            
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

function listAssignedClassRoomTeacherDetails()
    {
        $.ajax({
                url: "{{ route('getClassroomAssignedTeachers') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                dataType: "json", // Expect a JSON response
                success: function(data) { 
                    console.log(data); // You can view the data in the browser console
let rowsGetClassRoomDetail = "";
    
           data.forEach(function(classRoomsForAssignedTeacher){
               rowsGetClassRoomDetail += `
                    <tr>
    <td>${classRoomsForAssignedTeacher.classRoomId}</td>
    <td>${classRoomsForAssignedTeacher.departmentName}</td>
    <td>${classRoomsForAssignedTeacher.semesterName}</td>
    <td>${classRoomsForAssignedTeacher.gradeName}</td>
    <td>${classRoomsForAssignedTeacher.sectionName}</td>
    <td>${classRoomsForAssignedTeacher.classTeacherFirstName}   ${classRoomsForAssignedTeacher.classTeacherLastName}</td>
    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                 data-bs-class-room-id="${classRoomsForAssignedTeacher.classRoomId}"
                                 data-bs-department-name="${classRoomsForAssignedTeacher.departmentName}"
                                 data-bs-semester-name="${classRoomsForAssignedTeacher.semesterName}"
                                 data-bs-grade-name="${classRoomsForAssignedTeacher.gradeName}"
                                 data-bs-section-name="${classRoomsForAssignedTeacher.sectionName}"
                                 data-bs-target="#createTeachersForAssignedTeachers">View</button></td>
            </tr>
               `; 
           });
           $('#tableShowingAlreadyAssignedSubjects tbody').html(rowsGetClassRoomDetail);                
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

</script>
 <!-- 
 
 -->
 <div class="modal fade" id="createTeachersForSubjects" tabindex="-1">
    <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Details</h4>
          <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body" id="modalForListingClassRoomsForTeacherAssignment">
<div class="table-responsive">

            <table class="table table-bordered table-hover" id="inTheModalClassRoomsForTeacherAssignment">
                        <thead>
                          <tr>
                            <th>Grade</th>
                            <th>Section</th>
                            <th>Subject Name</th>
                            <th>Subject Code</th>
                            <th>Select Teacher</th>
                          </tr>
                        </thead>
                        <tbody>

                          </tbody>
                        </table>

        </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
   </div>
<!--

 -->
    <div class="py-12" id="createsTeacherForSubjects">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3>To be assigned</h3>
                    <table class="table" id="classRoomsForTeacherAssignment">
                        <thead>
                          <tr>
                            <th>ClassRoom Id</th>
                            <th>Department Name</th>
                            <th>Semester</th>
                            <th>Grade</th>
                            <th>Section</th>
                            <th>Select</th>
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

 <div class="modal fade" id="createTeachersForAssignedTeachers" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Details</h4>
          <h4 id="reassignGrade"></h4>
          <h4 id="reassignSection"></h4>
          <h4 id="reassignDepartment"></h4>
          <h4 id="reassignSemester"></h4>
          <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="table-responsive">
                    <table class="table" id="tableForViewingClasswiseSubjectTeachers">
                        <thead>
                          <tr>
                            <th>Grade</th>
                            <th>Section</th>
                            <th>Subject Name</th>
                            <th>Subject Code</th>
                            <th>Selected Teacher</th>
                            <th>Select Teacher</th>
                          </tr>
                        </thead>
                        <tbody>

                          </tbody>
                    </table>
        </div>
    </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
   </div>

 <!--

 -->
    <div class="py-12" id="editTeacherForSubjects">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        View/Edit Teachers assignments
                        <br>

                        Subjects<br>
                       <div class="table-responsive">
                          <table class="table" id="tableShowingAlreadyAssignedSubjects">
                            <thead>
                              <tr>
                                <th>Class Id</th>
                                <th>Department</th>
                                <th>Semester</th>
                                <th>Grade</th>
                                <th>Section</th>
                                <th>Class Teacher</th>
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
        </div>
    </div>
</div>
</div>

        <!--

       -->

       <script src="{{ asset('js/Admin/subjectTeachersForEachSection.js') }}" defer></script>
       <script src="{{ asset('js/Admin/commonContent.js') }}" defer></script>

</x-app-layout>
