
  <x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Dashboard') }}
           <br>
           <button class="btn btn-primary" id="menu-toggle" style="position:fixed;background-color: white;color:black;">Menu</button>
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
        <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
          <ul>
            <li>
            <a href="#markAttendance" class="list-group-item list-group-item-action bg-light">Mark attendance</a>
          </li>
            </ul>
        </div>
      </div>
    <!-- Sidebar -->
    <div>



  </div>

</div>

      <!-- 
      
      
      
      
      -->

    @if ( Auth::user()->role != 3)

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
<div class="py-12" id="markAttendance">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      <h2>Mark Attendence</h2>
                @if(($att = \App\Models\attendence::where('attendences.batchId','=',$currentBatchId)->where('userId','=',Auth()->user()->userId)->where('todaysDate','=',date('Y-m-d'))->first())==NULL)
                    @foreach(($att = \App\Models\attendence::where('attendences.batchId','=',$currentBatchId)
                        ->where('userId','=',Auth()->user()->userId)->where('todaysDate','=',date('Y-m-d'))->get()) as $attendance)
                          <form action="{{route('attendence.markTodaysAttendance',['attendence'=>$attendance->attendanceDataId]) }}" method="POST" enctype="multipart/form-data" id="markAttendance">
                              {{ csrf_field() }}{{ method_field('POST') }}
                              {{Form::label('inOrOut', 'Present')}}{{Form::radio('inOrOut', 1,array('class'=>'form-control','id'=>'inOrOut'))}}
                              <br>
                              {{Form::label('inOrOut', 'Absent')}}{{Form::radio('inOrOut', 0,array('class'=>'form-control','id'=>'inOrOut','checked'=>'checked'))}}
                              {{Form::hidden('userRole',3)}}
                              {{Form::hidden('attendanceDataId',$attendance->attendanceDataId)}}
                              <br>
                              <button type="submit" class="btn btn-primary form-control">Submit</button>
                              {{ Form::close() }}
                      @endforeach
                @elseif(($att = \App\Models\attendence::where('attendences.batchId','=',$currentBatchId)->where('userId','=',Auth()->user()->userId)->where('todaysDate','=',date('Y-m-d'))->first())->yes_or_no == 0)
                      @foreach(($att= \App\Models\attendence::where('attendences.batchId','=',$currentBatchId)
                          ->where('userId','=',Auth()->user()->userId)->where('todaysDate','=',date('Y-m-d'))->get()) as $attendance)
                        <form action="{{route('attendence.markTodaysAttendance',['attendence'=>$attendance->attendanceDataId]) }}" method="POST" enctype="multipart/form-data" id="markAttendance">
                                {{ csrf_field() }}{{ method_field('POST') }}
                                {{Form::label('inOrOut', 'Present')}}{{Form::radio('inOrOut', 1,array('class'=>'form-control','id'=>'inOrOut'))}}
                                <br>
                                {{Form::hidden('userRole',3)}}
                                {{Form::hidden('attendanceDataId',$attendance->attendanceDataId)}}
                                {{Form::label('inOrOut', 'Absent')}}{{Form::radio('inOrOut', 0,array('class'=>'form-control','id'=>'inOrOut','checked'=>'checked'))}}
                                <br>
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                                {{ Form::close() }}
                      @endforeach
                  @else
                        {{ Form::open() }}
                        {{ Form::label('attendance', 'Attendance Marked ? ');}}<input type="checkbox" name="loggedInOrOut" class="form-control" checked="checked;" disabled="false"/>
                        {{ Form::close() }}
                  @endif

                    </div>
                </div>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/Admin/dashboard.js') }}" ></script>

    
</x-app-layout>
