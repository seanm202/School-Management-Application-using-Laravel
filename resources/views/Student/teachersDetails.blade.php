<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignment') }}
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

    @if ( Auth::user()->role != 3)

        <script type="text/javascript">
        window.location = "{{url('logout')}}";//here double curly bracket
        </script>
      @endif

<script type="text/javascript">
  
      $(document).ready(function () {
   getAllData();
});

function getAllData()
    {
         getStaffContactDetails();
    }
    
    function getStaffContactDetails()
    {
      
            $.ajax({
                url: "{{ route('getStaffContactDetails') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                dataType: "json", // Expect a JSON response
                success: function(data) {
                  
let rowsGetcontactDetails = "";
           data.forEach(function(contactDetail){
// let roleupdateurl = "/updateRole";
               rowsGetcontactDetails += `
                    <tr>
    <td>${contactDetail.roleName}</td>
    <td>${contactDetail.sal} ${contactDetail.firstname}  ${contactDetail.lastname}</td>
    <td>${contactDetail.email}</td>
    <td>${contactDetail.contactNumber}</td>     
    <td>${contactDetail.alternateContactNumber}</td>
            </tr>
               `;
           });

           $('#tableForStaffContactDetails tbody').html(rowsGetcontactDetails);       
             },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    // alert('Error fetching data');
                    // console.log(thrownError);
                    console.log("Status:", jqXHR.status);
    console.log("Response:", jqXHR.responseText);
    console.log("Error:", thrownError);
                }
            });
        
    }
  </script>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  View Contact Details of School Staff
             
                     <table class="table" id="tableForStaffContactDetails">
                   <thead>
                       <tr>
                         <th>Designation</th>
                       <th>Full Name</th>
                       <th>Email ID</th>
                       <th>Contact Number</th>
                       <th>Alternate Contact Number</th>
                       </tr>
                     </thead>
                   <tbody>
                  
                </tbody>
              </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
