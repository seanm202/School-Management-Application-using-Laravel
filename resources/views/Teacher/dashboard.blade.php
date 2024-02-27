<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
  <script src="https://malsup.github.io/jquery.form.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
            {{ __('Dashboard') }} @if ($errors->any())
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
    @if ( Auth::user()->role != 2)

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
                @if(count($att = \App\Models\attendence::where('attendences.batchId','=',$currentBatchId)
                      ->where('userId','=',Auth()->user()->userId)->where('todaysDate','=',date('Y-m-d'))->get())==NULL)
                    @foreach(($att = \App\Models\attendence::where('attendences.batchId','=',$currentBatchId)
                      ->where('userId','=',Auth()->user()->userId)->where('todaysDate','=',date('Y-m-d'))->get()) as $attendance)
                      <form action="{{route('attendence.markTodaysAttendance',['attendence'=>$attendance->attendanceDataId])}}" method="POST" name="markAttendance" id="markAttendance">
                      {{ csrf_field() }}{{ method_field('POST') }}
                        {{Form::label('inOrOut','Present')}}{{Form::radio('inOrOut',1,array('class'=>'form-control'))}}
                        <br>
                        {{Form::label('inOrOut','Absent')}}{{Form::radio('inOrOut',0,'checked',array('class'=>'form-control'))}}
                        {{Form::hidden('userRole',2)}}
                        {{Form::hidden('attendanceDataId',$attendance->attendanceDataId)}}
                        <br>
                        <button type="submit" class="btn btn-primary form-control">Mark Attendance</button>
                        {{ Form::close() }}
                    @endforeach
                @elseif(($att = \App\Models\attendence::where('attendences.batchId','=',$currentBatchId)
                      ->where('userId','=',Auth()->user()->userId)->where('todaysDate','=',date('Y-m-d'))->first())->yes_or_no == 0)
                     @foreach(($att = \App\Models\attendence::where('attendences.batchId','=',$currentBatchId)
                      ->where('userId','=',Auth()->user()->userId)->where('todaysDate','=',date('Y-m-d'))->get()) as $attendance)
                      <form action="{{route('attendence.markTodaysAttendance',['attendence'=>$attendance->attendanceDataId])}}" method="POST" name="markAttendance" id="markAttendance">
                      {{ csrf_field() }}{{ method_field('POST') }}
                        {{Form::label('inOrOut','Present')}}{{Form::radio('inOrOut',1)}}
                        {{Form::hidden('userRole',2,array('class'=>'form-control'))}}
                        {{Form::hidden('attendanceDataId',$attendance->attendanceDataId)}}
                        <br>
                        {{Form::label('inOrOut','Absent')}}{{Form::radio('inOrOut',0,'checked',array('class'=>'form-control'))}}
                        <br>
                        <button type="submit" class="btn btn-primary form-control" >Mark Attendance</button>
                        {{ Form::close()}}
                      @endforeach
                @else
                        {{ Form::open() }}
                        {{ Form::label('attendance', "Attendance Marked ? ")}}<input type="checkbox" class="form-control" name="loggedInOrOut" checked="checked;" disabled="false"/>
                        {{ Form::close() }}
                @endif
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
             <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
             <script src="{{ asset('js/Teacher/dashboard.js') }}" defer></script>
</x-app-layout>
