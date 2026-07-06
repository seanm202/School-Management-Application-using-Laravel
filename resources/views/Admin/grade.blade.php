<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/errorStyle.css') }}" rel="stylesheet" />

<script src="{{ asset('js/sidebar.js') }}"></script>
<style>
    
    .errorshow-box {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #B01D1A;
    color: #fff;
    padding: 15px 20px;
    border-radius: 6px;
    font-family: Arial, sans-serif;
    display: none;
    align-items: center;
    justify-content: space-between;
    min-width: 250px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    animation: slideIn 0.4s ease;
}

/* Flex layout */
.errorshow-box.show {
    display: flex;
}

/* Close button */
.close-btn {
    margin-left: 15px;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
}

/* Hover effect */
.close-btn:hover {
    opacity: 0.7;
}

    /*

    For Success

    */
    .success-box {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #28a745;
    color: #fff;
    padding: 15px 20px;
    border-radius: 6px;
    font-family: Arial, sans-serif;
    display: none;
    align-items: center;
    justify-content: space-between;
    min-width: 250px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    animation: slideIn 0.4s ease;
}

/* Flex layout */
.success-box.show {
    display: flex;
}

/* Close button */
.close-btn {
    margin-left: 15px;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
}

/* Hover effect */
.close-btn:hover {
    opacity: 0.7;
}

/* Animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
    /*

    For Delete

    */
     .delete-box {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #AD1F34;
    color: #fff;
    padding: 15px 20px;
    border-radius: 6px;
    font-family: Arial, sans-serif;
    display: none;
    align-items: center;
    justify-content: space-between;
    min-width: 250px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    animation: slideIn 0.4s ease;
}

/* Flex layout */
.delete-box.show {
    display: flex;
}
</style>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Grade') }}
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

<div id="successBox" class="success-box">
    <span id="successMessage" class="message">✅ Data saved successfully!</span>
    <span class="close-btn" onclick="closeSuccess()">&times;</span>
</div>
<div id="errorShowBox" class="errorshow-box">
    <div id="contentOfErrorShowBox"></div>
    <span class="close-btn" onclick="closeError()">&times;</span>
</div>

 <script type="text/javascript">
      $(document).ready(function () {
   getAllData();
});
      </script>

    @if ( Auth::user()->role != 1)

      <script type="text/javascript">
      window.location = "{{url('logout')}}";//here double curly bracket
      </script>
    @endif
<!--

 -->
  <script type="text/javascript">
function getGrades(){
    
           $.ajax({
               url: "{{ route('getGradeDetailsByAJAX') }}", // Use the named route
               method: "GET", // Use GET method for fetching data
               dataType: "json", // Expect a JSON response
               success: function(data) {

           let rowsGetGrades = "";
let editgradeurl = "/updateGrade";
let deletegradeurl = "/destroyGrade";
           data.forEach(function(grade){
            rowsGetGrades += `
<tr>
    <td>
        <input type="text"
               class="gradeName"
               value="${grade.grade}">
        <input type="hidden"
               class="gradeId"
               value="${grade.gradeId}">
    </td>

    <td>
        <button type="button"
                class="buttonForUpdateGradeByAdmin btn btn-primary form-control"
                data-url="updateGrade">
            Update
        </button>
    </td>

    <td>
        <button type="button"
                class="buttonForDeleteGradeByAdmin btn btn-primary form-control"
                data-url="/destroyGrade">
            Delete
        </button>
    </td>
</tr>
`;
       
           });

        
           
           $('#tableForGradeAJAX tbody').html(rowsGetGrades);
},
               error: function(jqXHR, ajaxOptions, thrownError) {
                   alert('Error fetching data');
                   console.log(thrownError);
               }
           });
       }
    
function getAllData()
    {
         getGrades();
    }
        
    
//
    //
    //
       
   </script>
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
                    <table class="table" id="tableForGradeAJAX">
    <thead>
        <tr>
            <th>Grade Name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data will be populated here via AJAX -->
</tbody>
</table>
                    @else
                     <h3 style="color:red;">List is empty!</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
<script src="{{ asset('js/Admin/grade.js') }}"></script>
       <script src="{{ asset('js/Admin/commonContent.js') }}" defer></script>


<!-- jQuery Form plugin (you use it) -->
<script src="https://malsup.github.io/jquery.form.js"></script>

</x-app-layout>
