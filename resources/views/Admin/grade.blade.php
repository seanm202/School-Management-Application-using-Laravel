<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('js/Admin/grade.js') }}"></script>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grade') }}
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

    <!-- Sidebar -->
    <div>


    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
      <div class="sidebar-heading">MySchool </div>
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#createGradeByAdmin" class="list-group-item list-group-item-action bg-light">Add Grade</a>
          <a href="#updateGradeByAdmin" class="list-group-item list-group-item-action bg-light">Edit / Delete Grade</a>
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
<!--

 -->

    <div class="py-12" id="createGradeByAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Create grade
                    <form action="{{route('createGrade')}}" method="POST" name="createGradeByAdmin" id="formForCreateGradeByAdmin">
                    {{ csrf_field() }}
                    {{Form::label('gradeName', 'Enter grade name :')}}
                    {{Form::text('gradeName',NULL,array('placeholder'=>'Name of the grade','class'=>'form-control'))}}
                    <button type="button" id="saveGrade" class="btn btn-primary form-control">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="py-12" id="updateGradeByAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Update grades
                    @if(count(App\Models\Grade::where('grades.batchId','=',1)->get())>0)
                    <table class="table">
    <thead>
        <tr>
            <th>Grade Name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach(App\Models\Grade::where('grades.batchId','=',1)->get() as $grade)
<tr>
    <td colspan="2">
        <form action="{{ route('updateGrade') }}"
              method="POST"
              class="updateGradeByAdmin d-flex align-items-center gap-2">
            @csrf

            <input type="text"
                   name="gradeName"
                   value="{{ $grade->grade }}"
                   class="form-control">

            <input type="hidden"
                   name="gradeId"
                   value="{{ $grade->gradeId }}">

            <button type="button"
                    class="buttonForFormForUpdateGradeByAdmin btn btn-primary">
                Update
            </button>
        </form>
    </td>

    <td>
        <form action="{{ route('destroyGrade') }}"
              method="POST"
              class="deleteGradeByAdmin">
            @csrf
            <input type="hidden" name="gradeId" value="{{ $grade->gradeId }}">

            <button type="button"
                    class="buttonForDeleteGradeByAdmin btn btn-danger">
                Delete
            </button>
        </form>
    </td>
</tr>
@endforeach
    </tbody>
</table>
                    @else
                     <h3 style="color:red;">List is empty!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
