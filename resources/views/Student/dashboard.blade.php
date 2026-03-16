<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <meta name="csrf-token" content="{{ csrf_token() }}">
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
                    {{ __("You're logged in") }} {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>



     <script type="text/javascript">

         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         $(".markAttendance").click(function(e){

             e.preventDefault();

             var form = $("#markAttendance");

             $.ajax({
                type:'POST',
                url:"{{ route('markTodaysAttendance') }}",
                data:form.serialize(),
                success: function(response){
          alert("jjjj");
                }
             });

         });


     </script>
     <script type="text/javascript">

         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         $(".markTodaysAttendanceStudent").click(function(e){

             e.preventDefault();

             var form = $("#markTodaysAttendanceStudent");

             $.ajax({
                type:'POST',
                url:"{{ route('markTodaysAttendanceStudent') }}",
                data:form.serialize(),
                success: function(response){

                }
             });

         });


     </script>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">   @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif
                      @if(($att = \App\Models\StudentSubjectAttendance::where('student_subject_attendances.studentId','=',(\App\Models\Student::where('userId','=',Auth()->user()->userId)->select('studentId')->first()))
                                                                      ->where('student_subject_attendances.hourId','=',(\App\Models\Hours::where('hours.status','=',1)->first())->hourId)
                                                                      ->select('id')->first())!=NULL)

                        @foreach(($att = \App\Models\StudentSubjectAttendance::where('student_subject_attendances.studentId','=',(\App\Models\Student::where('userId','=',Auth()->user()->userId)->select('studentId')->first()))
                                                                        ->where('student_subject_attendances.hourId','=',(\App\Models\Hours::where('hours.status','=',1)->first())->hourId)
                                                                        ->select('id')->get()) as $atst)

                      <form action="{{route('markTodaysAttendanceStudent')}}" method="POST" name="markTodaysAttendanceStudent" id="markTodaysAttendanceStudent">
                      {{ csrf_field() }}{{ method_field('POST') }}
                        {{Form::label('inOrOut', 'Present')}}{{ Form::radio('inOrOut', 1, false, ['class'=>'form-control']) }}
                        <br>
                        {{Form::hidden('userRole',4)}}
                        {{Form::label('inOrOut', 'Absent')}}{{Form::radio('inOrOut', 0,'checked',array('class'=>'form-control'))}}
                        <br>
                        <input type="hidden" name="attendanceDataId" value="{{$atst->id}}"></input>
                        <button class="btn btn-success btn-addAdminAdmin form-control">Mark Attendance</button>
                        {{ Form::close() }}
                      @endforeach
                      @elseif(($att = \App\Models\StudentSubjectAttendance::where('student_subject_attendances.studentId','=',(\App\Models\Student::where('userId','=',Auth()->user()->userId)->select('studentId')->first()))
                                                                      ->where('student_subject_attendances.date','=',date('Y-m-d'))
                                                                      ->where('student_subject_attendances.hourId','=',(\App\Models\Hours::where('hours.status','=',1)->first())->hourId)
                                                                      ->select('id')->first())==0)
                                                                      @foreach(($att = \App\Models\StudentSubjectAttendance::where('student_subject_attendances.studentId','=',(\App\Models\Student::where('userId','=',Auth()->user()->userId)->select('studentId')->first()))
                                                                                                                      ->where('student_subject_attendances.date','=',date('Y-m-d'))
                                                                                                                      ->where('student_subject_attendances.hourId','=',(\App\Models\Hours::where('hours.status','=',1)->first())->hourId)
                                                                                                                      ->select('id')->get()) as $atst)
                      <form action="{{route('markTodaysAttendance')}}" method="POST" name="markAttendance" id="markAttendance">
                      {{ csrf_field() }}{{ method_field('POST') }}
                        {{Form::label('inOrOut', 'Present')}}{{Form::radio('inOrOut', 1)}}
                        <br>
                        {{Form::hidden('userRole',4)}}
                        <input type="hidden" name="attendanceDataId" value="{{$atst->id}}"></input>
                        {{Form::label('inOrOut', 'Absent')}}{{Form::radio('inOrOut', 0,'checked',array('class'=>'form-control'))}}
                        <br>
                        <button class="btn btn-success btn-addAdminAdmin form-control">Mark Attendance</button>
                        {{ Form::close() }}
                      @endforeach
                      @else
                        {{ Form::open() }}
                        {{ Form::label('attendance', 'Attendance Marked ? ');}}<input type="checkbox" name="loggedInOrOut" checked="checked;" class="form-control" disabled="false"/>
                        {{ Form::close() }}
                      @endif
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
