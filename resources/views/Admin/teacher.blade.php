<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
  <script src="https://malsup.github.io/jquery.form.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Teacher') }}
               <br>
               <button class="btn btn-primary" id="menu-toggle" style="position:fixed;background-color: white;color:black;">Menu</button>  @if(Session::has('success'))
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

    <!-- Sidebar -->
    <div>


    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
      <div class="sidebar-heading">MySchool </div>
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#addTeachersAdmin" class="list-group-item list-group-item-action bg-light">Add a teacher</a>
        </li>
          </ul>
      </div>
    </div>
  </div>

</div>


    @if ( Auth::user()->role != 3)

      <script type="text/javascript">
      window.location = "{{url('logout')}}";//here double curly bracket
      </script>
    @endif

    <div class="py-12" id="addTeachersAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Add Teachers

                  <form action="{{route('detail.createTeacher')}}" method="POST"  enctype="multipart/form-data" name="addTeacherAdmin" id="addTeacherAdmin">
                  @csrf
                    <table class="table">
                  <thead>
                      <tr>
                        <th>Salutation</th>
                        <td>
                        <select name="salutation">
                             <option value="Mr./Ms." selected>Mr./Ms.</option>
                             <option value="Mr.">Mr.</option>
                             <option value="Ms.">Ms.</option>
                        </select></td>
                      </tr>
                    <tr>
                      <th>First Name</th>
                    <td>{{Form::text('firstName',NULL,array('placeholder'=>'Enter first name','class'=>'form-control','id'=>'firstName'))}} </td>
                    </tr>
                    <tr>
                      <th>Last name</th>
                    <td>{{Form::text('lastName',NULL,array('placeholder'=>'Enter last name','class'=>'form-control','id'=>'lastName'))}} </td></tr>
                    <tr>
                      <th>Email</th>
                    <td>{{Form::text('email',NULL,array('placeholder'=>'Enter Email Id','class'=>'form-control','id'=>'email'))}} </td></tr>
                    <tr>
                      <th>Phone</th>
                    <td>{{Form::text('phone',NULL,array('placeholder'=>'Enter Phone Number','class'=>'form-control','id'=>'phone'))}} </td></tr>
                      <tr>
                      <th>Age</th>{{Form::hidden('password',(\App\Models\ConstantController::where('constantName','defaultPassword')->select('constantValue')->first()))}}
                    <td>{{Form::text('age',NULL,array('placeholder'=>'Enter age','class'=>'form-control','id'=>'age'))}}</td></tr>
                      <tr>
                      <th>Date of birth</th>
                    <td>{{Form::date('dob',NULL,array('placeholder'=>'Enter date of birth','class'=>'form-control','id'=>'dob'))}}</td></tr>
                      <tr>
                        <th>Contact Number</th>
                        <td>{{Form::text('contactNumber',NULL,array('placeholder'=>'Enter contact Number','class'=>'form-control','id'=>'contactNumber'))}}</td></tr>
                        <tr>
                          <th>Alternate Contact Number</th>
                          <td>{{Form::text('alternateContactNumber',NULL,array('placeholder'=>'Enter Alternate Contact Number','class'=>'form-control','id'=>'alternateContactNumber'))}}</td></tr>
                    <tr>
                        <th>Address</th>
                        <td>{{Form::text('address',NULL,array('placeholder'=>'Enter Address','class'=>'form-control','id'=>'address'))}}</td>
                      </tr>

        <tr>
            <th>Blood Group</th>
            <td>{{Form::text('bloodGroup',NULL,array('placeholder'=>'Enter Blood Group','class'=>'form-control','id'=>'bloodGroup'))}}</td>
          </tr>


    <tr>
        <th>Identification Mark</th>
        <td>{{Form::text('identificationMark',NULL,array('placeholder'=>'Enter Identification Mark','class'=>'form-control','id'=>'identificationMark'))}}</td>
      </tr>
<tr>
    <th>Parent's Number</th>
    <td>{{Form::text('parentNumber',NULL,array('placeholder'=>'Enter Parent\'s Number','class'=>'form-control','id'=>'parentNumber'))}}</td>
  </tr>
<tr>
<th>Home Phone Number</th>
<td>{{Form::text('homePhoneNumber',NULL,array('placeholder'=>'Home Phone Number','class'=>'form-control','id'=>'homePhoneNumber'))}}</td>
</tr>
<tr>
<th>Father's / Spouse's Name</th>
<td>{{Form::text('fatherSpouseName',NULL,array('placeholder'=>'Father\'s/Spouse\'s Name','class'=>'form-control','id'=>'fatherSpouseName'))}}</td>
</tr>
<tr>
<th>Mother's Name</th>
<td>{{Form::text('motherName',NULL,array('placeholder'=>'Mother\'s Name','class'=>'form-control','id'=>'motherName'))}}</td>
</tr>
<tr>
<th>Guardian Name</th>
<td>{{Form::text('guardianName',NULL,array('placeholder'=>'Guardian Name','class'=>'form-control','id'=>'guardianName'))}}</td>
</tr>
                    </thead>
                  </table>
                      <button type="submit" class="btn btn-primary form-control">Save</button>

                                        {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
     <script src="{{ asset('js/Admin/teacher.js') }}" defer></script>


</x-app-layout>
