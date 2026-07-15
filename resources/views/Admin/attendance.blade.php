<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>



        <script src="{{ asset('js/Admin/attendance.js') }}" defer></script>
       <script src="{{ asset('js/Admin/commonContent.js') }}" defer></script>
  <script src="https://malsup.github.io/jquery.form.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/errorStyle.css') }}" rel="stylesheet" />
<script src="{{ asset('js/sidebar.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Attendance') }}
          <br>
          <button class="btn btn-primary" id="menu-toggle" style="position:fixed;background-color: white;color:white;">Menu</button>

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
        </h2>
    </x-slot>
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div>


    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
      <div class="sidebar-heading">MySchool </div>
      <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#todaysAbsentees" class="list-group-item list-group-item-action bg-light">Today's absentees</a>
          <a href="#daysAbsentees" class="list-group-item list-group-item-action bg-light">Absent on a specific day</a>
          <a href="#showAbsenteesBetween" class="list-group-item list-group-item-action bg-light">Absentees betweentwo days</a>
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

    <div class="modal fade" id="dailyAbsentees" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="absenteeToday">
        <table class="table responsive" id="forShowingAbsentees">
                        <thead>
                          <tr>
                            <th>Student Id</th>
                            <th>Student Name</th>
                            <th>SubjectName</th>
                            <th>Day</th>
                            <th>Hour</th>
                          </tr>
                        </thead>  
                        <tbody>
                        </tbody>    
                    </table>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- 

Absentees on a date

-->
<div class="modal fade" id="dateAbsentees" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="absenteeDate">
        <table class="table responsive" id="forShowingDateAbsentees">
                        <thead>
                          <tr>
                            <th>Student Id</th>
                            <th>Student Name</th>
                            <th>SubjectName</th>
                            <th>Day</th>
                            <th>Hour</th>
                          </tr>
                        </thead>  
                        <tbody>
                        </tbody>    
                    </table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- 


-->
<div class="modal fade" id="betweenDateAbsentees" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="absenteeBetweenDate">
        <table class="table responsive" id="forShowingBetweenDateAbsentees">
                        <thead>
                          <tr>
                            <th>Student Id</th>
                            <th>Student Name</th>
                            <th>SubjectName</th>
                            <th>Day</th>
                            <th>Hour</th>
                          </tr>
                        </thead>  
                        <tbody>
                        </tbody>    
                    </table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <!-- 
    
    
    -->
  <script type="text/javascript">
 $(document).ready(function () {

   $('#dailyAbsentees').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);
   var newUserId = button.attr('data-user-id');
$.ajax({
                url: "{{ route('getDataForOfTodaysAbsentees') }}", // Use the named route
                method: "GET", 
                dataType: "json", // Expect a JSON response
                success: function(data) { 
                if (data.length === 0) {
                  $('#absenteeToday').html("<h2 style='color:red;'>No record found!</h2>");
    }
                else
                  {
        let rowsOfDailyAbsenteesDetail="";
data.forEach(function(todaysAbsentee) {
                    rowsOfDailyAbsenteesDetail += `
                        <tr>
                            <td>${todaysAbsentee.studentId}</td>
                            <td>${todaysAbsentee.sal} ${todaysAbsentee.firstName} ${todaysAbsentee.lastName}</td>
                            <td>${todaysAbsentee.subjectName}</td>
                            <td>${todaysAbsentee.dayName}</td>
                            <td>${todaysAbsentee.hourName}</td>
                        </tr>`;
                });
        
       

    $('#forShowingAbsentees tbody').html(rowsOfDailyAbsenteesDetail);
                }
        },
                   error: function (xhr) {
  console.log(xhr.responseText);
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);

      }
            });

 });
  });

  
 $(document).ready(function () {

   $('#dateAbsentees').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);
  const absentDate = document.getElementById("dateOfAbsent").value;
$.ajax({
                url: "{{ route('getDataForOfAbsenteesOnDate') }}", // Use the named route
                method: "GET", 
                data:
                {
                  dateOfAbsent:absentDate,
                },
                dataType: "json", // Expect a JSON response
                success: function(data) { 
                if (data.length === 0) {
                  $('#absenteeDate').html("<h2 style='color:red;'>No record found!</h2>");
    }
                else
                  {
        let rowsOfDateAbsenteesDetail="";
data.forEach(function(dateAbsentee) {
                    rowsOfDateAbsenteesDetail += `
                        <tr>
                            <td>${dateAbsentee.studentId}</td>
                            <td>${dateAbsentee.sal} ${dateAbsentee.firstName} ${dateAbsentee.lastName}</td>
                            <td>${dateAbsentee.subjectName}</td>
                            <td>${dateAbsentee.dayName}</td>
                            <td>${dateAbsentee.hourName}</td>
                        </tr>`;
                });
        
       

    $('#forShowingDateAbsentees tbody').html(rowsOfDateAbsenteesDetail);
                  }
        },
                   error: function (xhr) {
  console.log(xhr.responseText);
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);

      }
            });

 });
  });

  
 $(document).ready(function () {

   $('#betweenDateAbsentees').on('show.bs.modal', function (event) {

   var button = $(event.relatedTarget);
  const absentFirstDate = document.getElementById("startingDateOfAbsent").value;
  const absentLastDate = document.getElementById("endingDateOfAbsent").value;
$.ajax({
                url: "{{ route('getDataForOfAbsenteesOnBetweenDates') }}", // Use the named route
                method: "GET", 
                data:
                {
                  firstDateOfAbsent:absentFirstDate,
                  lastDateOfAbsent:absentLastDate,
                },
                dataType: "json", // Expect a JSON response
                success: function(data) { 
          
                if (data.length === 0) {
                  $('#absenteeBetweenDate').html("<h2 style='color:red;'>No record found!</h2>");
    }
                else
                  {
        let rowsOfBetweenDateAbsenteesDetail="";
data.forEach(function(betweenDateAbsentee) {
                    rowsOfBetweenDateAbsenteesDetail += `
                        <tr>
                            <td>${betweenDateAbsentee.studentId}</td>
                            <td>${betweenDateAbsentee.sal} ${betweenDateAbsentee.firstName} ${betweenDateAbsentee.lastName}</td>
                            <td>${betweenDateAbsentee.subjectName}</td>
                            <td>${betweenDateAbsentee.dayName}</td>
                            <td>${betweenDateAbsentee.hourName}</td>
                        </tr>`;
                });
        
       

    $('#forShowingBetweenDateAbsentees tbody').html(rowsOfBetweenDateAbsenteesDetail);
                  }
        },
                   error: function (xhr) {
  console.log(xhr.responseText);
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);

      }
            });

 });
  });

  
 $(document).ready(function () {
   getAllData();
});
 function getAllData()
    {
// getNewUsers();
}

</script>
 @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
    <div class="py-12" id="todaysAbsentees">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Show today's absentees  
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dailyAbsentees">
                                View
                            </button>
                    

                </div>
            </div>
        </div>
    </div>

    <!--

   -->


    <div class="py-12" id="daysAbsentees">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Show absentees on :
                    <label for="selectDateAbsent">Select date : </label>
                    <input type="date" name="selectDateAbsent" id="dateOfAbsent" />
                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dateAbsentees">
                                View
                            </button>

                    
                  </div>
            </div>
        </div>
    </div>
    <!--

   -->



    <div class="py-12" id="showAbsenteesBetween">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Show absentees between two dates :

                  <label for="selectFirstDateAbsent">Select starting date : </label>
                    <input type="date" name="selectFirstDateAbsent" id="startingDateOfAbsent" />
                  <label for="selectLastDateAbsent">Select starting date : </label>
                    <input type="date" name="selectLastDateAbsent" id="endingDateOfAbsent" />
                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#betweenDateAbsentees">
                                View
                            </button>

                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       
</x-app-layout>
