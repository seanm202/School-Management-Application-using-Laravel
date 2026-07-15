    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://malsup.github.io/jquery.form.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/errorStyle.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/Teacher/attendance.js') }}" defer></script>
    <script src="{{ asset('js/Teacher/commonContent.js') }}" defer></script>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance') }} @if ($errors->any())
               <div class="alert alert-danger">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
            @endif
        </h2>
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
         @if ( Auth::user()->role != 2)

                <script type="text/javascript">
                window.location = "{{url('logout')}}";//here double curly bracket
                </script>
              @endif

<!--


-->

<script type="text/javascript">


$(document).ready(function() {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   $(document).on('change', '.attendanceCheckBox', function () {
        // 1. Extract the unique database ID from the clicked checkbox
        var recordId =$(this).data('id');
        
        // 2. Determine the status value based on the checked state
        var statusValue = this.checked ? '1' : '0';
//         alert(statusValue);
        if (statusValue == 1) {
    $(this).prop('checked', true);
} else {
    $(this).prop('checked', false);
}
        // 3. Send an isolated request for this specific checkbox
        $.ajax({
            url: '/markStudentEachAttendance', // Your backend endpoint
            type: 'POST',
            data: {
                id: recordId,
                status: statusValue
            },
            success: function(response) {
                 showSuccess(response.message);
                getAllData();
                console.log('Successfully updated record ' + recordId + ' to status ' + statusValue);
            },
            error: function(xhr, status, error) {
                console.error('Failed to update record ' + recordId, error);
            }
        });
    });
});


function getAttendanceList(){

    $.ajax({
        url: "{{ route('getStudentsAttendanceList') }}",
        method: "GET",
        dataType: "json",

        success: function(data) {
            console.log(data);

            let rowsForAttendanceData = ``;

            data.forEach(function(currentHourClasswiseAttendanceList){
                rowsForAttendanceData += `
                    <tr>
                        <td>${currentHourClasswiseAttendanceList.atid}</td>
                        <td>${currentHourClasswiseAttendanceList.studentId}</td>
                        <td>${currentHourClasswiseAttendanceList.sal}${currentHourClasswiseAttendanceList.firstName} ${currentHourClasswiseAttendanceList.lastName}</td>
                        <td>${currentHourClasswiseAttendanceList.date}</td>
                        <td>${currentHourClasswiseAttendanceList.dayName}</td>
                        <td>${currentHourClasswiseAttendanceList.hourStartingTime}</td>
                        <td>${currentHourClasswiseAttendanceList.hourEndingTime}</td>
                        <td>
    <input type="checkbox" name="presentOrAbsent" data-id="${currentHourClasswiseAttendanceList.atid}" value="1" class="attendanceCheckBox" ${currentHourClasswiseAttendanceList.presentOrAbsent == 0 ? '' : 'checked'} />${currentHourClasswiseAttendanceList.presentOrAbsent == 0 ? ' Absent' : ' Present'}
</td>
                        <td>${currentHourClasswiseAttendanceList.status}</td>
                    </tr>
                `;
            });

            $('#forSubmittingClasswiseStudentsAttendance tbody').html(rowsForAttendanceData);
        },

        error: function(jqXHR, ajaxOptions, thrownError) {
            alert('Error fetching data');
            console.log(thrownError);
        }
    });
}
    $(document).ready(function () {
   getAllData();
});

 function getAllData()
    {
        getAttendanceList();
        getRowsForTeacherAttendenceButton();
    }
    
function getRowsForTeacherAttendenceButton(){
    $.ajax({
        url: "{{ route('getCurrentTeacherAttendanceDataId') }}",
        method: "GET",
        dataType: "json",
        success: function(attendanceDataId) {
            
if(attendanceDataId==0)
{
let rowsForTeacherAttendaneMarkDetails = `<h3>Attendence submitted.</h3>`;
$("#forMarkingTeacherThisHoursAttendence").html(rowsForTeacherAttendaneMarkDetails);
}
else
    {
    let rowsForTeacherAttendaneMarkDetails = `
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

    $("#forMarkingTeacherThisHoursAttendence").html(rowsForTeacherAttendaneMarkDetails);
 }
}
                ,

                

            });

        }
</script>
    <div class="py-12" id="createTeachersTimetableForTheParticularHour">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Create attendance table for allotted classes   
                    @if(Session::has('success'))
                      <div class="alert alert-success" style="position: fixed;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                      </div>
                    @endif
                    
                  <table class="table" id="forSubmittingClasswiseStudentsAttendance">
                    <thead>
                      <tr>
                        <th>Subject Name</th>
                        <th>Student Id</th>
                        <th>Student Name</th>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Hour Starting Time</th>
                        <th>Hour Ending Time</th>
                        <th>Present/Absent</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>

                   
                    </tbody>   
</table>                                
                </div>
            </div>
        </div>
    </div>

    <div class="py-12" id="markTeacherAttendence">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                            <div id="forMarkingTeacherThisHoursAttendence">

                            </div>
                    
              
                                                  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
