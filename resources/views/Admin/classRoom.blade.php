<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://malsup.github.io/jquery.form.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/errorStyle.css') }}" rel="stylesheet" />
<script src="{{ asset('js/sidebar.js') }}"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

            <script src="{{ asset('js/Admin/classRoom.js') }}" defer></script>
  
  <!--


 -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


 <!--


 -->
  <style>

/*

For showing error

*/
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

/* 


*/
  /* Media Query for Mobile Devices */
         @media (max-width: 480px) {
              #withoutModal {
       display:none;
     }
     #withModal {
       display:block;
     }
         }

         /* Media Query for low resolution  Tablets, Ipads */
         @media (min-width: 481px) and (max-width: 767px) {
               #withoutModal {
       display:block;
     }
     #withModal {
       display:none;
     }
         }

         /* Media Query for Tablets Ipads portrait mode */
         @media (min-width: 768px) and (max-width: 1024px){
                   #withoutModal {
       display:block;
     }
     #withModal {
       display:none;
     }
         }

         /* Media Query for Laptops and Desktops */
         @media (min-width: 1025px) and (max-width: 1280px){
           #withoutModal {
display:block;
}
#withModal {
display:none;
}
         }

         /* Media Query for Large screens */
         @media (min-width: 1281px) {
                    #withoutModal {
       display:block;
     }
     #withModal {
       display:none;
     }
         }

          @media (max-width: 480px) {
               #generateTimetable {
        width:auto;
      }
          }

          /* Media Query for low resolution  Tablets, Ipads */
          @media (min-width: 481px) and (max-width: 767px) {
                #generateTimetable {
        display:block;
      }
          }

          /* Media Query for Tablets Ipads portrait mode */
          @media (min-width: 768px) and (max-width: 1024px){
                    #generateTimetable {
        display:block;
      }
          }

          /* Media Query for Laptops and Desktops */
          @media (min-width: 1025px) and (max-width: 1280px){
            #generateTimetable {
 
 display:block;
 }
          }
                  /* Media Query for Large screens */
                  @media (min-width: 1281px) {
                             #generateTimetable {
                display:block;
              }
                  }

   
  </style>
  <x-app-layout>
<script type="text/javascript">
  
 $(document).ready(function () {
   getAllData();
});
</script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Class Room') }}
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


<div id="successBox" class="success-box">
    <span id="successMessage" class="message">✅ Data saved successfully!</span>
    <span class="close-btn" onclick="closeSuccess()">&times;</span>
</div>
<div id="errorShowBox" class="errorshow-box">
    <div id="contentOfErrorShowBox"></div>
    <span class="close-btn" onclick="closeError()">&times;</span>
</div>

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
          <a href="#generateTimetablesection" class="list-group-item list-group-item-action bg-light">Generate Timetable</a>
          <a href="#viewEditClassrooms" class="list-group-item list-group-item-action bg-light">View classrooms</a>
          <a href="#createClassRoom" class="list-group-item list-group-item-action bg-light">Create Classrooms</a>
        </li>
          </ul>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
   function getAllData()
    {
         getClassRooms();
      getSemestersList(function(options) {
    $('#semesterId').html(options);
});
    getGradesList(function(options) {
    $('#gradeId').html(options);
});

    getSectionsList(function(options) {
    $('#sectionId').html(options);
});
getDepartmentsList(function(options) {
    $('#departmentId').html(options);
});
getTeachersList(function(options) {
    $('#teacherId').html(options);
});
    }

//     $(document).ready(function () {
//    getAllData();
// });
  </script>


    @if ( Auth::user()->role != 1)

      <script type="text/javascript">
      window.location = "{{url('logout')}}";//here double curly bracket
      </script>
    @endif

    <div class="py-12" id="generateTimetablesection">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      Generate Timetable


                                             <form action="{{route('generateTimetable')}}" method="POST" name="generateTimetable" id="generateTimetable">
                                               {{ csrf_field() }}{{ method_field('POST') }}
    					<label for="oddOrEven">Choose odd or even semester</label><br>
                                               <input type="radio" name="oddOrEven" value="1">Odd</input><br><input type="radio" name="oddOrEven" value="2">Even</input>
                                               <td><button type="submit" class="btn btn-primary form-control">Generate Timetable</button>
                                             {{ Form::close()}}

                    </div>
                </div>
            </div>
        </div>
<!--

 -->

 <script>
 $(document).ready(function () {

   $('#viewClasses').on('show.bs.modal', function (event) {

          var button = $(event.relatedTarget);
          var classRoomId = button.data('classRoomid');
          var classRoomGrade = button.data('classRoomGrade');
          var classRoomNumber = button.data('classRoomNumber');
          var classRoomSection = button.data('classRoomSection');
          var classRoomDepartment = button.data('classRoomDepartment');
          var classRoomSemester = button.data('classRoomSemester');


   var modal = $(this);

   modal.find('#classroomIdForModalForm').val(classRoomId);
   modal.find('#classroomIdForDeleteClassRoom').val(classRoomId);
   modal.find('#classRoomGrade').val(classRoomGrade);
   modal.find('#classRoomNumber').val(classRoomNumber);
   modal.find('#classRoomSection').val(classRoomSection);
   modal.find('#classRoomDepartment').val(classRoomDepartment);
   modal.find('#classRoomSemester').val(classRoomSemester);
});

 });
              
                   // For getClassRooms() only
function getTeacherForClassRooms(){
    return $.ajax({
        url: "{{ route('getCompatibleTeachersDetails') }}",
        method: "GET",
        dataType: "json"
    });
}
function getClassRooms(){
    $.ajax({
        url: "{{ route('getClassRooms') }}",
        method: "GET",
        dataType: "json",
        success: function(classRooms) {

            getTeacherForClassRooms().then(function(teachers){

                let classRoomRows = '';

                classRooms.forEach(function(classRoom){

                    let options = '<option value="">Select Teacher</option>';

                    teachers.forEach(function(teacher){
                        let selected = teacher.teacherId == classRoom.classTeacher ? 'selected' : '';

                        options += `
                            <option value="${teacher.teacherId}" ${selected}>
                                ${teacher.firstName} ${teacher.lastName}
                            </option>
                        `;
                    });

                    classRoomRows += `
                        <tr>
                            <td>${classRoom.grade}</td>
                            <td>${classRoom.roomNo}</td>
                            <td>${classRoom.sectionName}</td>
                            <td>${classRoom.departmentName}</td>
                            <td>${classRoom.semesterName}</td>

                            <td>
                                <select name="teacherId" class="form-control">
                                    ${options}
                                </select>
                            </td>

                            <td>
                                <input type="text" class="form-control"
                                    value="${classRoom.description || ''}">
                            </td>

                            <td>${classRoom.capacity}</td>
                        </tr>
                    `;
                });

                $('#classRoomTable tbody').html(classRoomRows);

            });

        }
    });
}
    </script>









                                                          <script type="text/javascript">
//
// For success
//
// 
// 
// 
 $(function () {

                                                                $.ajaxSetup({
                                                                    headers: {
                                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                    }
                                                              });


                                                              $('#addClassroom').click(function (e) {
    e.preventDefault();

    var FormDataToCreateClassRoom =
        $('#FormToCreateClassRoom').attr('action');

    console.log('URL:', FormDataToCreateClassRoom);
    console.log('DATA:', $('#FormToCreateClassRoom').serialize());

    $.ajax({
        data: $('#FormToCreateClassRoom').serialize(),
        url: FormDataToCreateClassRoom,
        type: "POST",

        success: function (data) {
                   getAllData();
            showSuccess();
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

// 

                                                          </script>

    <!--

   -->

    <div class="py-12" id="createClassRoom">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" id="createClassRoomPart">
                  Create classroom
                  <form method="POST" action="{{ route('createclassRoom') }}" name="createClassRoom" id="FormToCreateClassRoom">
                  {{ csrf_field() }}{{ method_field('POST') }}
                  {{Form::label('departments','Department')}}
                  <select id="departmentId" name="departmentId" class="form-select"></select>
                  <br>
                  <br>
                  {{Form::label('semesters','Semester')}}
                <select id="semesterId" name="semesterId" class="form-select"></select>
                  <br>
                  <br>
                  {{Form::label('classTeacher','Class Teacher')}}
                    <select id="teacherId" name="classTeacher" class="form-select"></select>
                  <br>
                  <br>
                  {{Form::label('grade','Grade : ')}}
                  <select id="gradeId" name="grade" class="form-select"></select>
                  <br>
                  {{Form::label('roomNo','Room Number : ')}}
                  {{Form::text('roomNo',null,array('placeholder'=>'Enter Room Number','class'=>'form-control'))}}
                  <br>
                  {{Form::label('sectionName','Section Name : ')}}
                 <select id="sectionId" name="section" class="form-select"></select>
                  <br>
                  {{Form::label('description','Class Description')}}
                  {{Form::text('classDescription',null,array('placeholder'=>'Class description','class'=>'form-control'))}}
                  <br>
                  {{Form::label('Capacity','Class Capacity')}}
                  {{Form::number('classCapacity',null,array('placeholder'=>'Class Capacity','class'=>'form-control'))}}
                  <br>
                  @isset($classTimeTables)
                    {{Form::label('classTimeTableId','Class TimeTable Id')}}
                    <select name="classTimeTableId" class="form-control">
                      @foreach($classTimeTables as $classTimeTable)
                        <option value="{{$classTimeTable->classTimeTableId}}">{{$classTimeTable->classTimeTableName}}</option>
                      @endforeach
                    </select>
                  @endisset
                  <button type="submit" id="addClassroom" class="btn btn-primary form-control">Create Classroom</button>
                  </form>
                </div>
            </div>
        </div>
    </div>



       <script src="{{ asset('js/Admin/commonContent.js') }}" defer></script>
</x-app-layout>
