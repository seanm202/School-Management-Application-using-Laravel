<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src = "https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity = "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin = "anonymous">
  </script>
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom CSS -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<!-- Custom JS -->
<script src="{{ asset('js/sidebar.js') }}"></script>


<style>
  
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
</style>

  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Student') }}
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
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div>


    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
      <div class="sidebar-heading">MySchool </div>
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#adminStudentAddStudent" class="list-group-item list-group-item-action bg-light">Add Student</a>
          <a href="#createMarksEntry" class="list-group-item list-group-item-action bg-light">Create Mark Entry</a>
          <a href="#assignClassRoomsToStudents" class="list-group-item list-group-item-action bg-light">Assign classroom to students</a>
          <a href="#adminStudentAddStudentMarks" class="list-group-item list-group-item-action bg-light">Add students's Marks</a>
        </li>
          </ul>
      </div>
    </div>
  </div>

</div>
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

   -->  @if ( Auth::user()->role != 1)

       <script type="text/javascript">
       window.location = "{{url('logout')}}";
       </script>
     @endif


 <script type="text/javascript">
  
      $(document).ready(function () {
   getAllData();
});
    
     
function getAllData()
    {
         getStudents();
    }
      //getStudentDetailsToReassignClassroomByAJAX  
    function getStudents(){
            $.ajax({
                url: "{{ route('getStudentDetailsByAJAX') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                dataType: "json", // Expect a JSON response
                success: function(data) {
                    console.log(data); // You can view the data in the browser console
let rowsGetStudent = "";
           data.forEach(function(student){
// let roleupdateurl = "/updateRole";
               rowsGetStudent += `
                    <tr>
    <td>${student.studentId} </td>
      <td>${student.studentFirstName}  ${student.studentLastName}</td>
    <td>${student.email} </td>
    <td>${student.phone}</td>
             
    <td><button type="button" class="btn btn-primary form-control selectForAssignClassRoomAStudent" data-bs-toggle="modal" data-bs-studentid="${student.studentId}"
        data-bs-first-name="${student.studentFirstName}"
        data-bs-last-name="${student.studentLastName}"
        data-bs-email="${student.email}"
        data-bs-phone="${student.phone}" data-bs-target="#assignStudentsToClasses">
                                              Select classroom
                                            </button></td>
            </tr>
               `;
           });

           $('#tableForAssignClassRoom tbody').html(rowsGetStudent);                },
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
    
//
    //
    //
// 

// 

// 

</script>
    <div class="py-12" id="adminStudentAddStudent">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="overflow-x:scroll;">
                  Add Students

                  <form action="{{route('createStudentAdmin')}}" method="POST" enctype="multipart/form-data" id="addStudentAdmin">
                  {{ csrf_field() }}{{ method_field('POST') }}
                    <table class="table">
                  <thead>
                    <tr>
                      <th>Salutation</th>
                      <td>
                      <select name="salutation">
                           <option value="Mr./Ms." selected>Mr./Ms.</option>
                           <option value="Mr">Mr.</option>
                           <option value="Ms">Ms.</option>
                           <option value="Mrs">Mrs.</option>
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
                  <button type="button" id="buttonForAddStudentAdmin" class="btn btn-primary form-control">Add</button>

                                       </form>
                </div>
            </div>
        </div>
    </div>
<!--
Add students to class_rooms

 -->
 <div class="py-12" id="createMarksEntry">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Create mark entry for all the students

               <form action="{{route('createMarkEntry')}}" method="POST" enctype="multipart/form-data" name="createMarkEntry" id="createMarkEntry">
               @csrf
                <button type="submit" id="buttonForMarkEntryCreation" class="btn btn-primary form-control">Submit</button>
                                     </form>
             </div>
         </div>
     </div>
 </div>

<!--
Create Mark table for all the students

 -->



<!--



 -->
 <div class="py-12" id="assignClassRoomsToStudents">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
                 Assign students to classes
                 <br>
                 New Users<br>
                                <table class="table" id="tableForAssignClassRoom">
                                  <thead>
                                          <tr>
                                            <th>User ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
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
       
       
       <div class="modal fade" id="assignStudentsToClasses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalStudentFullName"></h5>
                                   <h5 class="modal-title" id="exampleModalStudentEmail"></h5>
                                 <h5 class="modal-title" id="exampleModalStudentPhone"></h5>
                                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                 </button>
                               </div>
                               <div class="modal-body" style="overflow-y:scroll;">
                                 <table class="table" id="tableForModalForAssignClassRoom">
                                   <thead><tr>
                                     <th>Grade</th>
                                       <th>Section</th>
                                       <th>Room Number</th>
                                       <th>Department</th>
                                         <th>Semester</th>
                                           <th>Class Teacher</th>
                                             <th>Capacity</th>
                                                <th>Select</th></tr>
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
     <div class="py-12" id="adminStudentAddStudentMarks">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <h2>Add student Marks</h2>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-target="#showFilters">
                    Filter
                  </button>

 <div class="modal fade" id="editDeleteMarksDetailsPrint" id="editDeleteMarksDetailsPrint"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add marks of : Student Name</h5>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body" id="subjectsList">


                            </tbody>
                          </table>
                            <h3>Link to download the pdf</h3>
                                                                          </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         </div>

                                            </div>
                                          </div>
                                        </div>

                   <div class="modal fade" id="submitMarkDetailsCreation" id="adminStudentStudentMarksCreation"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add marks of (Student Name))</h5>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body" id="subjectsList">

                            </tbody>
                          </table>
                            <button type="submit" class="btn btn-primary form-control">Submit</button></form>
                                                                          </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         </div>

                                            </div>
                                          </div>
                                        </div>
                
                </div>
            </div>
        </div>
    </div>


    <!--
Marks Creation
   -->

  <script src="{{ asset('js/filter.js') }}" defer></script>
                     <script src="{{ asset('js/Admin/student.js') }}" defer></script>
       <script src="{{ asset('js/Admin/commonContent.js') }}" defer></script>
</x-app-layout>
