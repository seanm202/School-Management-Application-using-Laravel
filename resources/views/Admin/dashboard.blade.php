<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/errorStyle.css') }}" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('js/Admin/dashboard.js') }}" defer></script>
<script src="{{ asset('js/Admin/commonContent.js') }}" defer></script>
  <style>
.setup-steps {
    list-style-type: decimal !important;
    padding-left: 30px !important;
    margin-left: 20px;
}

.setup-steps li {
    display: list-item !important;
}
    </style>
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
           {{ __('Dashboard') }}
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
      <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
        <div class="sidebar-heading">MySchool </div>
      <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
          <ul>
            <li>
            <a href="#markAttendanceLocation" class="list-group-item list-group-item-action bg-light">Mark attendance</a>
          </li>
            </ul>
        </div>
      </div>
    <!-- Sidebar -->
    <div>



  </div>

</div>

    @if ( Auth::user()->role != 1)

      <script type="text/javascript">
      window.location = "{{url('logout')}}";//here double curly bracket
      </script>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You'red logged in") }} {{ Auth::user()->name}}!

                </div>
            </div>
        </div>
    </div>
    <!--

   -->


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <u>Instructions</u><br> <br>
                    <h3>Order of flow :</h3> <br>
                    <ol type="1" class="setup-steps">
                      <li>Add the details regarding admins,batches,grades,etc in the Admin section</li>
                      <li>Add Grade and Section details in their respective sections</li>
                      <li>Create classroom in the Classroom section</li>
                      <li>Add subjects in the Subjects section</li>
                      <li>Assign  students to classes in the Students section</li>
                      <li>Assign subject teachers to the necessary classrooms in the Subject Teachers section</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">

 $(document).ready(function () {
   getAllData();
});
 function getAllData()
    {
getRowsForAttendenceButton();
}

function getRowsForAttendenceButton(){
    $.ajax({
        url: "{{ route('getCurrentAttendanceDataId') }}",
        method: "GET",
        dataType: "json",
        success: function(attendanceDataId) {
if(attendanceDataId==0)
{
let rowsForStudentDetails = `<h3>Attendence submitted.</h3>`;
$("#forMarkingTodaysAttendence").html(rowsForStudentDetails);
}
else
    {
    let rowsForStudentDetails = `
        <form action="{{ route('markTodaysAttendance') }}" method="POST" id="markAttendance">
            @csrf

            <label>
                <input type="radio" name="inOrOut" value="1">
                Present
            </label>
            <br>

            <label>
                <input type="radio" name="inOrOut" value="0" checked>
                Absent
            </label>

            <input type="hidden" name="userRole" value="1">
            <input type="hidden" name="attendanceDataId" value="${attendanceDataId}">

            <br>

            <button type="submit" class="btn btn-primary form-control">
                Submit
            </button>
        </form>
    `;

    $("#forMarkingTodaysAttendence").html(rowsForStudentDetails);
 }
}
                ,

                

            });

        }
</script>


        <div class="py-12" id="markAttendanceLocation">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                  <div>
                          </div>
                      <h2>Mark Attendence</h2>
                            <div id="forMarkingTodaysAttendence">

                            </div>
                      </div>
                </div>
            </div>
        </div>

        <div class="py-12" id="generateAttendanceListForStudents">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      <h2>Generate Attendence List For Students</h2>
                            <form action="{{route('createStudentsAttendanceList') }}" method="POST" enctype="multipart/form-data" id="createStudentsAttendanceList">
                              {{ csrf_field() }}{{ method_field('POST') }}
                              <button type="submit" class="btn btn-primary form-control">Generate</button>
                            </form>
                      </div>
                </div>
            </div>
        </div>

</x-app-layout>
