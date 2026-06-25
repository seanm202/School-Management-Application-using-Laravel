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
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="{{ asset('js/sidebar.js') }}"></script>
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
           {{ __('Section') }}
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

<div id="successBox" class="success-box">
    <span class="message">✅ Data saved successfully!</span>
    <span class="close-btn" onclick="closeSuccess()">&times;</span>
</div>

<div id="deleteSuccessBox" class="delete-box">
    <span class="message">✅ Data deleted successfully!</span>
    <span class="close-btn" onclick="closeDeleteSuccess()">&times;</span>
</div>
<div id="errorShowBox" class="errorshow-box">
    <span class="message"><h3 id="contentOfErrorShowBox"></h3></span>
    <span class="close-btn" onclick="closeError()">&times;</span>
</div>


 <script type="text/javascript">
      $(document).ready(function () {
   getAllData();
});
      </script>

    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
      <div class="sidebar-heading">MySchool </div>
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#createSectionsByAdmin" class="list-group-item list-group-item-action bg-light">Add Sections</a>
          <a href="#updateSectionsByAdmin" class="list-group-item list-group-item-action bg-light">Update Sections</a>
        </li>
          </ul>
      </div>
    </div>
  </div>

</div>

<!--

 -->
 @if ( Auth::user()->role != 1)

   <script type="text/javascript">
   window.location = "{{url('logout')}}";//here double curly bracket
   </script>
 @endif

<script type="text/javascript">
function getSections(){
    
           $.ajax({
               url: "{{ route('getSectionDetailsByAJAX') }}", // Use the named route
               method: "GET", // Use GET method for fetching data
               dataType: "json", // Expect a JSON response
               success: function(data) {

           let rowsGetSections = "";
let editsectionurl = "/updateAJAXSection";
let deletesectionurl = "/destroySection";
           data.forEach(function(section){
            rowsGetSections += `
<tr>
    <td>
        <input type="text"
               class="sectionName"
               value="${section.sectionName}">
        <input type="hidden"
               class="sectionId"
               value="${section.sectionId}">
    </td>

    <td>
        <button type="button"
                class="buttonForUpdateSectionByAdmin btn btn-primary form-control"
                data-url="updateAJAXSection">
            Update
        </button>
    </td>

    <td>
        <button type="button"
                class="buttonForDeleteSectionByAdmin btn btn-primary form-control"
                data-url="destroySection">
            Delete
        </button>
    </td>
</tr>
`;
       
           });

        
           
           $('#tableForSectionAJAX tbody').html(rowsGetSections);
},
               error: function(jqXHR, ajaxOptions, thrownError) {
                   alert('Error fetching data');
                   console.log(thrownError);
               }
           });
       }
    
function getAllData()
    {
        getSections();
    }
        
    
//
    //
    //
       
   </script>
    <div class="py-12" id="createSectionsByAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Create sections

                    <form action="{{route('createSection')}}" method="POST" name="createSectionByAdmin" id="createSectionByAdmin">
                    {{ csrf_field() }}{{ method_field('POST') }}
                    {{Form::label('sectionName', 'Enter section name :')}}
                    {{Form::text('sectionName',NULL,array('placeholder'=>'Name of the section','class'=>'form-control','id'=>'sectionName'))}}<br>
                    <button type="button" id="buttonForCreateSectionByAdmin" class="btn btn-primary form-control">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="py-12" id="updateSectionsByAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Update sections
                  @if(count($sections=App\Models\Section::where('sections.batchId','=',$currentBatchId)->get())>0)
                  <table class="table" id="tableForSectionAJAX">
    <thead>
        <tr>
            <th>Section Name</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
    </tbody>
</table>
                  @else
                    <h3 style="color:red;">List is empty</h3>
                  @endif
                </div>
            </div>
        </div>
    </div>

</div>
</div>



                  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
                  <script src="{{ asset('js/Admin/section.js') }}" defer></script>
       <script src="{{ asset('js/Admin/commonContent.js') }}" defer></script>


</x-app-layout>
