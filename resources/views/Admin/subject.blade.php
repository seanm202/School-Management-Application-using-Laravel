
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/errorStyle.css') }}" rel="stylesheet" />
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
  </script>
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>


<!--




 -->

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
           {{ __('Subjects') }}
           <br>
           <button class="btn btn-primary" id="menu-toggle" style="position:fixed;background-color: white;color:white;">Menu</button>@if(Session::has('success'))
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


<div id="successBox" class="success-box">
    <span id="successMessage" class="message">✅ Data saved successfully!</span>
    <span class="close-btn" onclick="closeSuccess()">&times;</span>
</div>
<div id="errorShowBox" class="errorshow-box">
    <div id="contentOfErrorShowBox"></div>
    <span class="close-btn" onclick="closeError()">&times;</span>
</div>

<!-- 

-->
<div class="modal fade" id="subjectListModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Subject Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
        <!-- Data will be placed inside these elements -->
        <table id="tableForDisplayingSubjectList">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Subject Type</th>
                    <th>Subject Code</th>
                    <th>Subject Max. Marks</th>
                    <th>Update Subject</th>
                    <th>Delete Subject</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
      </div>
        <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         </div>
      </div>
    </div>
  </div>
</div>

<!-- 

-->
<script type="text/javascript">
  
      $(document).ready(function () {
   getAllData();
});
    
     
function getAllData()
    {
        listSubjectCategories();
        toDisplayPriorityValues();
        getGrades(function(options) {
    $("#subjectGradeToAddSubject").html(options);
});
getDepartments(function(options) {
    $("#departmentIdForAddingSubject").html(options);
});
getPriorities(function(options) {
    $("#priorityIdForAddingSubject").html(options);
});
getSemesters(function(options) {
    $("#semesterIdToAddSubject").html(options);
});
    }
    
    function listSubjectCategories()
    {
        $.ajax({
                url: "{{ route('getSubjectCategoriesByAJAX') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                dataType: "json", // Expect a JSON response
                success: function(data) { 
                    console.log(data); // You can view the data in the browser console
let rowsGetSubjectCategory = "";
    
           data.forEach(function(subjectCategory){
// let roleupdateurl = "/updateRole";
               rowsGetSubjectCategory += `
                    <tr>
    <td>${subjectCategory.grade} </td>
    <td>${subjectCategory.departmentName}</td>
    <td>${subjectCategory.semesterName}</td>
    <td><button type="button" class="btn btn-primary form-control"  id="viewSubjectListModal"
            data-bs-grade-id="${subjectCategory.gradeId}"
            data-bs-department-id="${subjectCategory.departmentId}"
            data-bs-semester-id="${subjectCategory.semesterId}"
            data-bs-torlab="${subjectCategory.torlab}"
            data-bs-toggle="modal"
data-bs-target="#subjectListModal">
            View
        </button></td>
            </tr>
               `;
           });

           $('#getSubjectsList tbody').html(rowsGetSubjectCategory);                
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

        function toDisplayPriorityValues()
    {
        $.ajax({
                url: "{{ route('toDisplayPriorityValues') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                dataType: "json", // Expect a JSON response
                success: function(data) { 
                    console.log(data); // You can view the data in the browser console
let rowsGetToDisplayPriorityValues = "";
    
           data.forEach(function(priority){
               rowsGetToDisplayPriorityValues += `
<tr>
        <input type="hidden" name="priorityId" class="priorityId" value="${priority.priorityId}">

        <td>${priority.priorityId}</td>

        <td>
            <input type="text"
                   name="priorityName"
                   value="${priority.priorityName}"
                   class="priorityName form-control">
        </td>

        <td>
            <input type="text"
                   name="priorityValue"
                   value="${priority.priorityValue}"
                   class="priorityValue form-control">
        </td>

        <td>
            <button type="button"
                class="buttonForUpdatePriority btn btn-primary form-control"
                data-url="editPriority">
            Update
        </button>
        </td>
</tr>
`;
           });

           $('#toDisplayPriorityValues tbody').html(rowsGetToDisplayPriorityValues);                
        },
  
error: function(xhr) {
    var errors = xhr.responseJSON.errors;

    // Flatten all error arrays into one array
    var messages = Object.values(errors).flat();

    showError(messages);
}
            });
        }

        // 
        // 
        //

        

const subjectListModal = document.getElementById('subjectListModal');
// console.log(document.getElementById('subjectListModal'));
if (subjectListModal) {
  subjectListModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-* attributes
    const gradeId = button.getAttribute('data-bs-grade-id');
    const departmentId = button.getAttribute('data-bs-department-id');
    const semesterId = button.getAttribute('data-bs-semester-id');
    
$.ajax({



                url: "{{ route('getSubjectsList') }}",
                method: "GET", 
                data:{
                            gradeId:gradeId,
                            departmentId:departmentId,
                            semesterId:semesterId

                        },
                dataType: "json", 
                success: function(data) {
                    console.log(data); 
let rowsGetSubjects = "";
           data.forEach(function(subjectsLists){
// let roleupdateurl = "/updateRole";
               rowsGetSubjects += `
                    <tr>
    <td>
    @csrf
    <input type="hidden" name="subjectId" class="subjectId" value="${subjectsLists.subjectId}">
    @csrf
    <input type="text" name="subjectName" class="subjectName" value="${subjectsLists.subjectName}"></td>
   <td>
    <select name="torLab" class="torLab">
        <option value="Theory" ${subjectsLists.torlab === 'Theory' ? 'selected' : ''}>
            Theory
        </option>
        <option value="Lab" ${subjectsLists.torlab === 'Lab' ? 'selected' : ''}>
            Lab
        </option>
    </select>
</td>
    <td><input type="text" name="subjectCode" class="subjectCode" value="${subjectsLists.subjectCode}"></td>
    <td><input type="text" name="subjectMaxMarks" class="subjectMaxMarks" value="${subjectsLists.subjectMaxMarks}"></td>
    
                <td><button type="submit" class="btn btn-danger buttonForUpdateSubject" data-url="updateSubjectDetails">Update</button>
    </td>
    <td><form method="post" action="{{ route('destroysubject') }}" class="deleteSubject">
    @csrf
    <input type="hidden" name="subjectId" value="${subjectsLists.subjectId}">
    <button type="submit" class="btn btn-danger form-control" id="buttonForDeleteSubject">Delete</button>
    </form></td>
            </tr>
               `;
           });

           $('#tableForDisplayingSubjectList tbody').html(rowsGetSubjects);                
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
    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
      <div class="sidebar-heading">MySchool </div>
      <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#createASubject" class="list-group-item list-group-item-action bg-light">Add Subjects</a>
          <a href="#updateForSubject" class="list-group-item list-group-item-action bg-light">Update Subjects</a>
          <a href="#createAPriorityValue" class="list-group-item list-group-item-action bg-light">Add Pririty Level</a>
          <a href="#updateAPriorityValue" class="list-group-item list-group-item-action bg-light">Update Pririty Level</a>
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

<!--

 -->
<script type="text/javascript">

function getGrades(callback){

  $.ajax({
        url: "/getGrades",
        method: "GET",
        dataType: "json",
        success: function(data) {

            let options = '';

            data.forEach(function(grade) {
                options += `
                    <option value="${grade.gradeId}">
                        ${grade.grade}
                    </option>`;
            });
            callback(options);
        }
    });



}

function getDepartments(callback){

  $.ajax({
        url: "/getDepartments",
        method: "GET",
        dataType: "json",
        success: function(data) {

            let options = '';

            data.forEach(function(department) {
                options += `
                    <option value="${department.departmentId}">
                        ${department.departmentName}
                    </option>`;
            });
            callback(options);
        }
    });



}

function getSemesters(callback){

  $.ajax({
        url: "/getSemesters",
        method: "GET",
        dataType: "json",
        success: function(data) {

            let options = '';

            data.forEach(function(semester) {
                options += `
                    <option value="${semester.semesterId}">
                        ${semester.semesterName}
                    </option>`;
            });
            callback(options);
        }
    });



}


function getPriorities(callback){

  $.ajax({
        url: "/getPriorities",
        method: "GET",
        dataType: "json",
        success: function(data) {

            let options = '';

            data.forEach(function(priority) {
                options += `
                    <option value="${priority.priorityId}">
                        ${priority.priorityName}
                    </option>`;
            });
            callback(options);
        }
    });



}

  </script>
    <div class="py-12" id="createASubject">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Add Subject
                        <br>

 <form action="{{route('storeSubject')}}" method="POST"  enctype="multipart/form-data" name="createSubject" id="addSubjectAdmin">
 @csrf

   <table class="table">
 <thead>
<tr>
<th>Grade : </th>
<td><select name="subjectGrade" id="subjectGradeToAddSubject" class="form-control">
    <option value="0">Select Grade : </option>
</select></td></tr>
   <tr>
<th>Department : </th>
<td><select name="departmentId" id="departmentIdForAddingSubject" class="form-control">
    <option value="0">Select Department : </option>

</select></td></tr>

         <tr>
     <th>Semester : </th>
   <td><select name="semesterId" id="semesterIdToAddSubject" class="form-control">
      <option value="0">Select Semester : </option>
     
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
                 <option value="Theory" selected>Theory</option>
                   <option value="Lab">Lab</option>
                </select></td></tr>
           <tr>
             <th>Subject Priority : </th>
             <td><select name="subjectPriority" id="priorityIdForAddingSubject" class="form-control">
            
           </select></td></tr>
           <tr>
             <th>Submit</th>
             <td><button type="submit" id="buttonForAddSubjectAdmin" class="btn btn-primary form-control">Save</button></form></td></tr>




         </thead>
         </table>


<!--



 -->
                    </div>
                </div>
            </div>
        </div>




    <div class="py-12" id="updateForSubject">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        View/Edit Subjects
                        <br>

                        Subjects<br>
              <table class="table" id="getSubjectsList">
                  <thead>
                    <tr>
                      <th>Grade : </th>
                      <th>Department : </th>
                      <th>Semester : </th>
                      <th>View List</th>
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


 <!--

 -->

 
<!--

 -->


<div class="py-12" id="createAPriorityValue">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <h2>Add priority</h2>
<form action="{{route('createPriority')}}" method="POST" name="createPriority" id="createPriority">
                                                  {{ csrf_field() }}{{ method_field('POST') }}
    <h2>Priority name  : </h2>{{Form::text('priorityName','',array('placeholder'=>'Enter Priority Name ','class'=>'form-control'))}}<br><hr>
<h2 for="priorityValue">Priority Value : </h2>
{{Form::text('priorityValue','',array('placeholder'=>'Enter Priority Value ','class'=>'form-control'))}}<br><hr>
<button type="button" id="buttonForAddPriority" class="btn btn-primary form-control">Save</button>{{Form::close()}}

</div>
              </div>
            </div>
          </div>


          <div class="py-12" id="updateAPriorityValue">
                  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                          <div class="p-6 text-gray-900">
                            <h3>Edit Priority Data</h3>
                            <table class="table" id="toDisplayPriorityValues">
                              <thead>
                                  <tr>
                                      <th>Priority Id</th>
                                      <th>Priority Name</th>
                                      <th>Priority Value</th>
                                      <th>Update</th>
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


<script src="{{ asset('js/Admin/commonContent.js') }}"></script>
<script src="{{ asset('js/Admin/subject.js') }}"></script>
</x-app-layout>
