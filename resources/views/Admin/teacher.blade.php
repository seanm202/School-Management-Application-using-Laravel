<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
  <script src="https://malsup.github.io/jquery.form.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/errorStyle.css') }}" rel="stylesheet" />
<script src="{{ asset('js/sidebar.js') }}"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <script src = "https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity = "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin = "anonymous">
  </script>
 
<style>

/*

For showing error

*/

.my-close {
    border: none;
    background: transparent;
    color: inherit;
    font-size: 22px;
    font-weight: bold;
    cursor: pointer;
    margin-left: 10px;
    line-height: 1;
    padding: 0;
}

.my-close:hover {
    color: red;
}

.errorshow-box {
    position: fixed;
    top: 20px;
    right: 20px;
    width: 420px;
    max-width: 90vw;
    max-height: 80vh;

    background: #fff;
    color: #000;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0,0,0,.25);

    display: none;
    flex-direction: column;

    z-index: 9999;
    animation: slideIn .4s ease;
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
#contentOfErrorShowBox {
    overflow-y: auto;
    max-height: 65vh;
    padding: 15px;
}
.errorshow-box .close-btn {
    align-self: flex-end;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 22px;
    font-weight: bold;
}
#contentOfErrorShowBox .alert {
    margin-bottom: 10px;
    word-break: break-word;
    white-space: normal;
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
    background-color: #00000000;
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
      <button class="btn btn-primary" id="menu-toggle" style="position:fixed;background-color: white;color:white;">Menu</button>  @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Teacher') }}</h2>
    </x-slot>
               <br>
               
        
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
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div>


    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
      <div class="sidebar-heading">MySchool </div>
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#addTeachersAdmin" class="list-group-item list-group-item-action bg-light">Add a teacher</a>
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

<div id="successBox" class="success-box">
    <span id="successMessage" class="message">✅ Data saved successfully!</span>
    <span class="close-btn" onclick="closeSuccess()">&times;</span>
</div>
<!-- <div id="errorShowBox" class="errorshow-box">
    <div id="contentOfErrorShowBox"></div>
    <span class="close-btn" onclick="closeError()">&times;</span>
</div> -->
<div id="errorShowBox" class="errorshow-box">
    <div class="p-3 border-bottom">
        <strong>Validation Errors</strong>
        <span class="close-btn" onclick="closeError()">&times;</span>
    </div>

    <div id="contentOfErrorShowBox"></div>
</div>


 <script type="text/javascript">
    const teacherSubjectListModal = document.getElementById('teacherDetailModal');
// console.log(document.getElementById('subjectListModal'));
if (teacherSubjectListModal) {
  teacherSubjectListModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    const button = event.relatedTarget;
    // Extract info from data-* attributes
    const teacherId = button.getAttribute('data-bs-teacher-id');
    alert(teacherId);
    
$.ajax({



                url: "{{ route('getTeacherSubjectsList') }}",
                method: "GET", 
                data:{
                            gradeId:gradeId,
                            departmentId:departmentId,
                            semesterId:semesterId

                        },
                dataType: "json", 
                success: function(data) {
                    console.log(data); 
let rowsGetTeacherSubjects = "";
           data.forEach(function(teacherAssignedSubjectsDetail){
// let roleupdateurl = "/updateRole";
               rowsGetTeacherSubjects += `
                    <tr>
    <td>${teacherAssignedSubjectsDetail.gradeName} </td>
    <td>${teacherAssignedSubjectsDetail.departmentName}</td>
    <td>${teacherAssignedSubjectsDetail.semesterName}</td>
    <td>${teacherAssignedSubjectsDetail.subjectName} </td>
            </tr>
               `;
           });

           $('#teacherSubjectsList tbody').html(rowsGetTeacherSubjects);                
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

-->
<div class="modal fade" id="teacherDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                   <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Subject List</h5>

                                     <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                     </button>
                                   </div>
                                   <div class="modal-body">
                                        <div>
                                            <table class="table" id="teacherSubjectsList">
                                                <thead>
                                                    <tr>
                                                        <th>Class</th>
                                                        <th>Department</th>
                                                        <th>Semester</th>
                                                        <th>Subject Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>

                                    <hr><hr>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    </div>

                                        </div>
    </div>
                 </div>
</div>

<!-- 

-->

<div class="py-12" id="viewTeacherDetailsAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  View Teacher Details
                    <table class="table" id="viewTeachersDetails">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>View Details</th>
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
<!-- 

-->
    <script type="text/javascript">

// 

//

// 

 
      $(document).ready(function () {
   getAllData();
});
    
     
function getAllData()
    {
        listTeacherDetails();
    }
    
    function listTeacherDetails()
    {
        $.ajax({
                url: "{{ route('getTeacherDetails') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                dataType: "json", // Expect a JSON response
                success: function(data) { 
                    console.log(data); // You can view the data in the browser console
let rowsGetTeacherDetail = "";
    
           data.forEach(function(teacherDetail){
               rowsGetTeacherDetail += `
                    <tr>
    <td>${teacherDetail.firstName} ${teacherDetail.lastName}</td>
    <td>${teacherDetail.emailId}</td>
    <td>${teacherDetail.address}</td>
    <td>${teacherDetail.contactNumber}</td>
    <td><button type="button" class="btn btn-primary form-control"  id="viewTeacherList"
            data-bs-teacher-id="${teacherDetail.teacherId}"
            data-bs-toggle="modal"
data-bs-target="#teacherDetailModal">
            View
        </button></td>
            </tr>
               `; 
           });

           $('#viewTeachersDetails tbody').html(rowsGetTeacherDetail);                
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

    </script>
    <div class="py-12" id="addTeachersAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Add Teachers

                  <form action="{{route('createTeacher')}}" method="POST"  enctype="multipart/form-data" name="addTeacherAdmin" id="addTeacherAdmin">
                  @csrf
                    <table class="table">
                  <tbody>
                      <tr>
                        <th>Salutation</th>
                        <td>
                        <select name="salutation">
                             <option value="Mr./Ms." selected>Mr./Ms.</option>
                             <option value="Mr.">Mr.</option>
                             <option value="Ms.">Ms.</option>
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
                    </tbody>
                  </table>
                      <button type="button" id="buttonForAddTeacherAdmin" class="btn btn-primary form-control">Save</button>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



<script src="{{ asset('js/Admin/commonContent.js') }}" defer></script>
<script src="{{ asset('js/Admin/teacher.js') }}" defer></script>
</x-app-layout>
