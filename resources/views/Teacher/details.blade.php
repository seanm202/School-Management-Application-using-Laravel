<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
  <script src="https://malsup.github.io/jquery.form.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Details') }} @if ($errors->any())
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

<!--


 -->



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Edit personal details   @if(Session::has('success'))
                    <div class="alert alert-success" style="position: fixed;">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                    @endif
                  @foreach(($teacherDetails = \App\Models\Detail::where('details.userId','=',Auth::user()->userId)->where('details.roleId','=',2)->where('details.batchId','=',1)
                         ->join('users','users.userId','=','details.userId')
                         ->join('teachers','teachers.userId','=','users.userId')
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
                         'details.detailId AS detailId'
                         )
                         ->get()) as  $teacherDetail)
                         <form action="{{route('updateTeacherDetails')}}" method="POST" name="updateTeacherDetails" id="updateTeacherDetails">
                         {{ csrf_field() }}{{ method_field('POST') }}
                         {{Form::label('firstname','First Name')}}
                          {{Form::hidden('userId',$teacherDetail->userId)}}
                           {{Form::hidden('roleId',2)}}
                            {{Form::hidden('detailId',$teacherDetail->detailId)}}
                         {{Form::text('firstname',$teacherDetail->firstName,array('placeholder'=>'Enter first Name','class'=>'form-control'))}}<br><br><hr><br>
                         {{Form::label('lastname','Last Name')}}
                         {{Form::text('lastname',$teacherDetail->lastName,array('placeholder'=>'Enter Last Name','class'=>'form-control'))}}<br><br><hr><br>
                         {{Form::label('age','Age')}}
                         {{Form::text('age',$teacherDetail->age,array('placeholder'=>'Enter Age','class'=>'form-control'))}}<br><br><hr><br>
                         {{Form::label('dob','Date of Birth')}} : {{$teacherDetail->dob}}
                         {{Form::date('dob',$teacherDetail->dob,array('placeholder'=>'Enter Date of Birth','class'=>'form-control'))}}<br><br><hr><br>
                         {{Form::label('contactNumber','Contact Number')}}
                         {{Form::text('contactNumber',$teacherDetail->contactNumber,array('placeholder'=>'Enter Contact Number','class'=>'form-control'))}}<br><br><hr><br>
                         {{Form::label('alternateContactNumber','Alternate Contact Number')}}
                         {{Form::text('alternateContactNumber',$teacherDetail->alternateContactNumber,array('placeholder'=>'Enter Alternate Contact Number','class'=>'form-control'))}}<br><br><hr><br>
                         {{Form::label('address','Address')}}
                         {{Form::text('address',$teacherDetail->address,array('placeholder'=>'Enter Address','class'=>'form-control'))}}<br><br><hr><br>
                         {{Form::label('bloodGroup','Blood Group')}}
                         {{Form::text('bloodGroup',$teacherDetail->bloodGroup,array('placeholder'=>'Enter Blood Group','class'=>'form-control'))}}<br><br><hr><br>
                         {{Form::label('identificationMark','Identification Mark')}}
                         {{Form::text('identificationMark',$teacherDetail->identificationMark,array('placeholder'=>'Enter Identification Mark','class'=>'form-control'))}}<br><br><hr><br>
                         {{Form::label('parentNumber','Parent\'s Contact Number')}}
                         {{Form::text('parentNumber',$teacherDetail->parentNumber,array('placeholder'=>'Enter Parent\'s Contact Number','class'=>'form-control'))}}<br><br><hr><br>
                         {{Form::label('homePhoneNumber','Home Phone Number')}}
                         {{Form::text('homePhoneNumber',$teacherDetail->homePhoneNumber,array('placeholder'=>'Enter Home Phone Number','class'=>'form-control'))}}<br><br><hr><br>
                         {{Form::label('fatherSpouseName',"Father\'sSpouse\'s Name")}}
                         {{Form::text('fatherSpouseName',$teacherDetail->fatherSpouseName,array('placeholder'=>"Enter Father\'s/Spouse\'s Name",'class'=>'form-control'))}}<br><br><hr><br>
                         {{Form::label('motherName','Enter Mothers\'s Name')}}
                         {{Form::text('motherName',$teacherDetail->motherName,array('placeholder'=>"Enter Mother\'s Name",'class'=>'form-control'))}}<br><br><hr><br>
                         {{Form::label('guardianName',"Enter Guardian's Name")}}
                         {{Form::text('guardianName',$teacherDetail->guardianName,array('placeholder'=>"Enter Guardian's Name",'class'=>'form-control'))}}<br><br><hr><br>

                  @endforeach

                          <button type="submit" class="btn btn-primary" >Save</button><br>
                          {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
         <script src="{{ asset('js/Teacher/details.js') }}" defer></script>
</x-app-layout>
