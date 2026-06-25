
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet">
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

<!-- 

-->
<div class="modal fade" id="subjectListModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Subject Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Data will be placed inside these elements -->
        <table id="tableForDisplayingSubjectList">
            <thead>
                <tr>
                    <th>Subject Name</th>
                    <th>Subject Type</th>
                    <th>Subject Code</th>
                    <th>Subject Max. Marks</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        
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
        //  getSubjects();
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
                error: function(jqXHR, ajaxOptions, thrownError) {
                    // alert('Error fetching data');
                    // console.log(thrownError);
                    console.log("Status:", jqXHR.status);
    var errors = jqXHR.responseJSON.errors;
jsdisplaycustomerrors(errors);
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
    <td>${subjectsLists.subjectName} </td>
    <td>${subjectsLists.torlab}</td>
    <td>${subjectsLists.subjectCode}</td>
    <td>${subjectsLists.subjectMaxMarks} </td>
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
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#createASubject" class="list-group-item list-group-item-action bg-light">Add Subjects</a>
          <a href="#updateForSubject" class="list-group-item list-group-item-action bg-light">Update Subjects</a>
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
<td><select name="subjectGrade" id="subjectGrade" class="form-control">
    <option value="0" selected>Select Grade : </option>
@if(count($grades = \App\Models\Grade::where('grades.batchId','=',1)->get())>0)
 @foreach(($grades = \App\Models\Grade::where('grades.batchId','=',1)->get()) as  $grade)
     <option value="{{$grade->gradeId}}">{{$grade->grade}}</option>
 @endforeach
@endif
</select></td></tr>
   <tr>
<th>Department : </th>
<td><select name="departmentId" id="departmentId" class="form-control">
    <option value="0" selected>Select Department : </option>
@if(count($departments = \App\Models\Department::all())>0)
 @foreach(($departments = \App\Models\Department::all()) as  $department)
    <option value="{{$department->departmentId}}">{{$department->departmentName}}</option>
 @endforeach
@endif
</select></td></tr>

         <tr>
     <th>Semester : </th>
   <td><select name="semesterId" id="semesterId" class="form-control">
      <option value="0" selected>Select Semester : </option>
     @if(count($semesters = \App\Models\Semester::where('semesters.batchId','=',1)->get())>0)
       @foreach(($semesters = \App\Models\Semester::where('semesters.batchId','=',1)->get()) as  $semester)
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
                   <option value="Lab">Lab</option>
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
             <td><button type="button" id="buttonForAddSubjectAdmin" class="btn btn-primary form-control">Save</button></form></td></tr>




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
              @if(count($subjects = \App\Models\Subject::where('subjects.batchId','=',1)->get())>0)
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

   $('#myModalUpdateSubjects').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);

   var subjectid = button.data('subjectid');
   var subjectName = button.data('subjectName');
   var subjectGradeid = button.data('subjectGradeid');
   var departmentid = button.data('departmentid');
   var semesterid = button.data('semesterid');
   var maxMarks = button.data('maxMarks');
   var subjectTextName = button.data('subjectTextName');
   var subjectCode = button.data('subjectCode');
   var theoryLab = button.data('theoryLab');
   var priority = button.data('priority');

   var modal = $(this);

   modal.find('#updateSubjectId').val(subjectid);
   modal.find('#updateSubjectName').val(subjectName);
   modal.find('#subjectGradeUpdate').val(subjectGradeid).trigger('change');
   modal.find('#subjectDepartmentUpdate').val(departmentid).trigger('change');
   modal.find('#subjectSemesterUpdate').val(semesterid).trigger('change');
   modal.find('#subjectMaxMarksUpdate').val(maxMarks);
   modal.find('#subjectTextBookNameUpdate').val(subjectTextName);
   modal.find('#subjectCodeUpdate').val(subjectCode);
   modal.find('#subjectTypeUpdate').val(theoryLab);
   modal.find('#subjectPriorityUpdate').val(priority);

   modal.find('#deleteSubjectId').val(subjectid);
});

 });
 </script>

 <!--

 -->

 <div class="modal fade" id="myModalUpdateSubjects" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                   <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Subject List</h5>

                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                     </button>
                                   </div>
                                   <div class="modal-body" id="subjectsList">

                                     <form action="{{route('updatesubject')}}" method="POST" name="updateSubject" id="updateSubject">
                                     {{ csrf_field() }}{{ method_field('POST') }}
           {{Form::hidden('subjectId',null,array('id' => 'updateSubjectId'))}}
              <h2>Subject Name : </h2>
           {{Form::text('subjectName',null,array('placeholder'=>'Enter Subject Name ','id' =>'updateSubjectName'))}}
           <h2>Subject Grade : </h2>
           <select name="subjectGrade" class="form-control" id="subjectGradeUpdate">
             <option value="0">Select Grade : </option class="form-control">
             @foreach(($grades = \App\Models\Grade::where('grades.batchId','=',1)->get()) as  $grade)
               <option value={{$grade->gradeId}}>{{$grade->grade}}</option>
             @endforeach
           </select>
           <h2>Department : </h2>
           <select name="departmentId" id="subjectDepartmentUpdate">
               <option value="0">Select Department : </option class="form-control">
           @if(count($departments = \App\Models\Department::all())>0)
            @foreach(($departments = \App\Models\Department::all()) as  $department)
             <option value={{$department->departmentId}}>{{$department->departmentName}}</option>
            @endforeach
           @endif
           </select>
           <h2>Semester : </h2><select name="semesterId" class="form-control" id="subjectSemesterUpdate">
              <option value="0">Select Semester : </option>
             @if(count($semesters = \App\Models\Semester::where('semesters.batchId','=',1)->get())>0)
               @foreach(($semesters = \App\Models\Semester::where('semesters.batchId','=',1)->get()) as  $semester)
                <option value={{$semester->semesterId}}>{{$semester->semesterName}}</option>
               @endforeach
             @endif
             </select><br>
          <h2>Subject Maximum Marks : </h2>
           {{Form::number('subjectMaxMarks',null,array('placeholder'=>'Subject Maximum Marks','class'=>'form-control','id'=>'subjectMaxMarksUpdate'))}}<br>
          <h2>Subject Textbook Name : </h2>
          {{Form::text('subjectTextName',null,array('placeholder'=>'Textbook Name','class'=>'form-control','id'=>'subjectTextBookNameUpdate'))}}<br>
         <h2>Subject Code : </h2>
         {{Form::text('subjectCode',null,array('placeholder'=>'Subject Code','class'=>'form-control','id' =>'subjectCodeUpdate'))}}<br>
        <h2>Choose Theory/Lab : </h2>
        <select name="theoryOrlab" id="subjectTypeUpdate">
          <option value="Theory">Theory</option>
            <option value="Lab">Lab</option>')
         </select>
            <br>
         <h2>Subject Priority : </h2>
         <select name="subjectPriority" class="form-control" id="subjectPriorityUpdate">
         @foreach(($priorities = \App\Models\Priority::all()) as $priority)
           <option value="{{$priority->priorityId}}">{{$priority->priorityName}} ( {{$priority->priorityValue}} ) </option>
         @endforeach
       </select> <br>
         <h2>Update Subject : </h2><button type="button" id="updateSubjectDetails" class="btn btn-primary form-control">Save</button><br>
             {{Form::close()}}<br>
          <h2>Delete</h2>
           <form action="{{route('destroysubject')}}" method="POST" name="deleteSubject" id="deleteSubject">
           {{ csrf_field() }}{{ method_field('POST') }}
 {{Form::hidden('subjectId',null,array('id' => 'deleteSubjectId'))}}  <button type="button" id="buttonForSubjectDelete" class="btn btn-primary form-control">Delete</button>
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
<div class="py-12" id="createASubject">
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


          <div class="py-12" id="createASubject">
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
