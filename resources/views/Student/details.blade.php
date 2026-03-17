<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src = "https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity = "sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin = "anonymous">
  </script>
  <script src =
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity =
"sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin = "anonymous">
  </script>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Details') }}
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

        @if ( Auth::user()->role != 4)

            <script type="text/javascript">
            window.location = "{{url('logout')}}";//here double curly bracket
            </script>
          @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    View personal details   @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
                @if(count($studentDetails = \App\Models\Detail::where('details.userId','=',Auth::user()->userId)->where('details.roleId','=',4)
                       ->where('details.batchId','=',1)
                       ->join('users','users.userId','=','details.userId')
                       ->join('students','students.userId','=','users.userId')
                       ->join('class_rooms','class_rooms.classroomDetailId','=','students.studentClassroom')
                       ->join('sections','sections.sectionId','=','class_rooms.section')
                       ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                       ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                       ->select('details.firstname AS firstName',
                       'details.lastname AS lastName',
                       'details.age AS age',
                       'details.dob AS dob',
                       'details.contactNumber AS contactNumber',
                       'details.alternateContactNumber AS alternateContactNumber',
                       'details.address AS address',
                       'details.bloodGroup AS bloodGroup',
                       'details.identificationMark AS identificationMark',
                       'details.parentNumber AS parentNumber',
                       'details.homePhoneNumber AS homePhoneNumber',
                       'details.fatherSpouseName AS fatherSpouseName',
                       'details.motherName AS motherName',
                       'details.guardianName AS guardianName',
                       'users.userId AS userId',
                       'details.detailId AS detailId',
                       'sections.sectionName AS sectionName',
                        'departments.departmentName AS departmentName',
                        'semesters.semesterName AS semesterName',
                        'class_rooms.classroomDetailId AS classroomId'
                        )
                       ->get())>0)
                    @foreach(($studentDetails = \App\Models\Detail::where('details.userId','=',Auth::user()->userId)->where('details.roleId','=',4)
                           ->where('details.batchId','=',1)
                           ->join('users','users.userId','=','details.userId')
                           ->join('students','students.userId','=','users.userId')
                           ->join('class_rooms','class_rooms.classroomDetailId','=','students.studentClassroom')
                           ->join('sections','sections.sectionId','=','class_rooms.section')
                           ->join('semesters','semesters.semesterId','=','class_rooms.semester')
                           ->join('departments','departments.departmentId','=','class_rooms.departmentId')
                           ->select('details.firstname AS firstName',
                           'details.lastname AS lastName',
                           'details.age AS age',
                           'details.dob AS dob',
                           'details.contactNumber AS contactNumber',
                           'details.alternateContactNumber AS alternateContactNumber',
                           'details.address AS address',
                           'details.bloodGroup AS bloodGroup',
                           'details.identificationMark AS identificationMark',
                           'details.parentNumber AS parentNumber',
                           'details.homePhoneNumber AS homePhoneNumber',
                           'details.fatherSpouseName AS fatherSpouseName',
                           'details.motherName AS motherName',
                           'details.guardianName AS guardianName',
                           'users.userId AS userId',
                           'details.detailId AS detailId',
                           'sections.sectionName AS sectionName',
                            'departments.departmentName AS departmentName',
                            'semesters.semesterName AS semesterName',
                            'class_rooms.classroomDetailId AS classroomId'
                            )
                           ->get()) as $studentDetail)
                           <div style="display:flex;">
                             <div>
                               <h2>First Name : {{$studentDetail->firstName}}</h2>
                             </div> <div style="padding:20px;"></div><div>
                               <h2>Last Name : {{$studentDetail->lastName}}</h2></div>
                           </div>
                           <div style="display:flex;">
                             <div>
                               <h2>Age : {{$studentDetail->age}}</h2></div> <div style="padding:20px;"></div><div>
                                 <h2>Date Of Birth  : {{$studentDetail->dob}}</h2></div>
                           </div>
                           <div style="display:flex;">
                             <div>
                               <h2>Contact Number : {{$studentDetail->contactNumber}}</h2></div> <div style="padding:20px;"></div><div>
                                 <h2>Alternate Contact Number : {{$studentDetail->alternateContactNumber}}</h2></div>
                           </div>
                           <div style="display:flex;">
                             <div>
                               <h2>Address : {{$studentDetail->address}}</h2></div> <div style="padding:20px;"></div><div>
                                 <h2>Blood Group : {{$studentDetail->bloodGroup}}</h2></div>
                           </div>
                           <div style="display:flex;">
                             <div>
                               <h2>Identification Mark : {{$studentDetail->identificationMark}}</h2></div> <div style="padding:20px;"></div>
                           </div>
                           <div style="display:flex;">
                             <div>
                               <h2>Parent's Number : {{$studentDetail->parentNumber}}</h2></div> <div style="padding:20px;"></div><div>
                                 <h2>Home Phone Number : {{$studentDetail->homePhoneNumber}}</h2></div>
                           </div>
                           <div style="display:flex;">
                             <div>
                               <h2>Father's / Spouse's Name : {{$studentDetail->fatherSpouseName}}</h2></div> <div style="padding:20px;"></div><div>
                                 <h2>Mother's Name : {{$studentDetail->motherName}}</h2></div><div style="padding:20px;"></div>
                                   <div>
                                     <h2>Guardian Name : {{$studentDetail->guardianName}}</h2></div>
                           </div>

                           <div style="display:flex;">
                             <div>
                               <h2>Class Room Id : {{$studentDetail->classroomId}}</h2>
                             </div> <div style="padding:20px;"></div><div>
                               <h2>Section : {{$studentDetail->sectionName}}</h2></div>
                           </div>
                           <div style="display:flex;">
                             <div>
                               <h2>Semester : {{$studentDetail->semesterName}}</h2>
                             </div> <div style="padding:20px;"></div><div>
                               <h2>Department : {{$studentDetail->departmentName}}</h2></div>
                           </div>
                    @endforeach

                @else
                  <h3 style="color:red;">List is empty!</h3>
                @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
