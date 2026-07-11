

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- Custom CSS -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<!-- Custom JS -->
<script src="{{ asset('js/sidebar.js') }}"></script>

<link href="{{ asset('css/errorStyle.css') }}" rel="stylesheet" />

 <script type="text/javascript">
  
      $(document).ready(function () {
   getAllData();
});
    
     
function getAllData()
    {
         getStudentFullDetails();
    }

  </script>

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
        
    </x-slot>
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
</div>

<div id="successBox" class="success-box">
    <span id="successMessage" class="message">✅ Data saved successfully!</span>
    <span class="close-btn" onclick="closeSuccess()">&times;</span>
</div>
<div id="errorShowBox" class="errorshow-box">
    <div id="contentOfErrorShowBox"></div>
    <span class="close-btn" onclick="closeError()">&times;</span>
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
<div class="container-fluid py-4">

    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="card shadow-sm border-0 rounded-4">

                <div class="card-header bg-primary text-white rounded-top-4 py-4">
                    <div class="d-flex flex-column flex-sm-row align-items-center gap-3">
                        <!-- <img src="{{ $student->photo_url ?? asset('images/default-avatar.png') }}"
                             alt="Student Photo"
                             class="rounded-circle border border-3 border-white"
                             style="width: 90px; height: 90px; object-fit: cover;"> -->
                        <div class="text-center text-sm-start">
                            <h3 class="mb-0" id="fullName"></h3>
                            <p class="mb-0 opacity-75" id="studentId">Student ID:</p>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">

                  function getStudentFullDetails(){
            $.ajax({
                url: "{{ route('getStudentFullDetailsByAJAX') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                dataType: "json", // Expect a JSON response
                success: function(data) {
// alert(JSON.stringify(data));
document.getElementById("fullName").textContent = data[0].sal+" "+data[0].firstname+" "+data[0].lastname;
document.getElementById("studentId").textContent = data[0].studentId;
document.getElementById("personalFullName").textContent =  data[0].sal+" "+data[0].firstname+" "+data[0].lastname;
document.getElementById("personalStudentId").textContent = data[0].studentId;
document.getElementById("personalDob").textContent = data[0].dob;
document.getElementById("personalBloodGroup").textContent = data[0].bloodGroup;
document.getElementById("personalContactNumber").textContent = data[0].contactNumber;
document.getElementById("personalAlternateContactNumber").textContent = data[0].alternateContactNumber;
document.getElementById("contactContactNumber").textContent = data[0].contactNumber;
document.getElementById("contactalternateContactNumber").textContent = data[0].alternateContactNumber;
document.getElementById("contactEmail").textContent = data[0].email;
document.getElementById("contactAddress").textContent = data[0].address;
document.getElementById("contactHomePhoneNumber").textContent = data[0].homePhoneNumber;
document.getElementById("contactParentNumber").textContent = data[0].parentNumber;
document.getElementById("academicDepartment").textContent = data[0].departmentName;
document.getElementById("academicSemester").textContent = data[0].semesterName;
document.getElementById("academicStudentId").textContent = data[0].studentId;
document.getElementById("academicBatch").textContent = data[0].batchName;
document.getElementById("academicClassroom").textContent = data[0].grade + " " + data[0].sectionName;
document.getElementById("fatherSpouseName").textContent = data[0].fatherSpouseName;
document.getElementById("motherName").textContent = data[0].motherName;
document.getElementById("guardianName").textContent = data[0].guardianName;

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

                </script>
                <div class="card-body p-4">

                    <h5 class="text-primary border-bottom pb-2 mb-3">
                        <i class="bi bi-person-fill me-1"></i> Personal Information
                    </h5>
                    <div class="row g-3 mb-4">

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Full Name</label>
                            <p class="fw-semibold mb-0" id="personalFullName"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Student ID</label>
                            <p class="fw-semibold mb-0" id="personalStudentId"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Date of Birth</label>
                            <p class="fw-semibold mb-0" id="personalDob">
                                
                            </p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">bloodGroup</label>
                            <p class="fw-semibold mb-0" id="personalBloodGroup"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">contactNumber</label>
                            <p class="fw-semibold mb-0" id="personalContactNumber"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">alternateContactNumber</label>
                            <p class="fw-semibold mb-0" id="personalAlternateContactNumber"></p>
                        </div>

                    </div>

                    <h5 class="text-primary border-bottom pb-2 mb-3">
                        <i class="bi bi-telephone-fill me-1"></i> Contact Information
                    </h5>
                    <div class="row g-3 mb-4">

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Contact Number</label>
                            <p class="fw-semibold mb-0 text-break" id="contactContactNumber"></p>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Alternate Contact Number</label>
                            <p class="fw-semibold mb-0 text-break" id="contactalternateContactNumber"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Email ID</label>
                            <p class="fw-semibold mb-0" id="contactEmail"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Address</label>
                            <p class="fw-semibold mb-0" id="contactAddress"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">homePhoneNumber</label>
                            <p class="fw-semibold mb-0" id="contactHomePhoneNumber"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">parentNumber</label>
                            <p class="fw-semibold mb-0" id="contactParentNumber"></p>
                        </div>

                    </div>

                    <h5 class="text-primary border-bottom pb-2 mb-3">
                        <i class="bi bi-mortarboard-fill me-1"></i> Academic Information
                    </h5>
                    <div class="row g-3 mb-4">

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Course / Program</label>
                            <p class="fw-semibold mb-0" id="academicCourse"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Department</label>
                            <p class="fw-semibold mb-0" id="academicDepartment"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Batch / Year</label>
                            <p class="fw-semibold mb-0" id="academicBatch"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Current Semester</label>
                            <p class="fw-semibold mb-0" id="academicSemester"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Roll Number</label>
                            <p class="fw-semibold mb-0" id="academicStudentId"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Classroom</label>
                            <p class="fw-semibold mb-0" id="academicClassroom">
                                
                            </p>
                        </div>

                    </div>

                    
                    <h5 class="text-primary border-bottom pb-2 mb-3">
                        <i class="bi bi-people-fill me-1"></i> Guardian Information
                    </h5>
                    <div class="row g-3">

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Father's Name</label>
                            <p class="fw-semibold mb-0" id="fatherSpouseName"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Mother's Name</label>
                            <p class="fw-semibold mb-0" id="motherName"></p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label class="text-muted small mb-1">Guardian's Name</label>
                            <p class="fw-semibold mb-0" id="guardianName"></p>
                        </div>

                    </div>

                </div>

                
            </div>

        </div>
    </div>
</div>
</x-app-layout>
