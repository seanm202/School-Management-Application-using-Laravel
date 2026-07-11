
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
 <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<link href="{{ asset('css/errorStyle.css') }}" rel="stylesheet" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
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
        
<div id="successBox" class="success-box">
    <span id="successMessage" class="message">✅ Data saved successfully!</span>
    <span class="close-btn" onclick="closeSuccess()">&times;</span>
</div>
<div id="errorShowBox" class="errorshow-box">
    <div id="contentOfErrorShowBox"></div>
    <span class="close-btn" onclick="closeError()">&times;</span>
</div>

    </x-slot>
    
 <script type="text/javascript">
      $(document).ready(function () {
   getAllData();
});
      </script>
    <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div>


    <div class="bg-light border-right" id="sidebar-wrapper" style="position: fixed;background-color:red;">
      <div class="sidebar-heading">MySchool </div>
      <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
      <div class="list-group list-group-flush" style="max-height: 330px;overflow-y:scroll;">
        <ul>
          <li>
          <a href="#updateRolesByAdmin" class="list-group-item list-group-item-action bg-light">Update Role</a>
        </li>
          </ul>
      </div>
    </div>
  </div>

</div>



    @if ( Auth::user()->role != 1)

      <script type="text/javascript">
      window.location = "{{url('logout')}}";//here double curly bracket
      </script>
    @endif

<!-- 
    
-->
<script type="text/javascript">

        function getRoles(){
            $.ajax({
                url: "{{ route('getRoleDetails') }}", // Use the named route
                method: "GET", // Use GET method for fetching data
                dataType: "json", // Expect a JSON response
                success: function(data) {
                    console.log(data); // You can view the data in the browser console
let rowsGetRoles = "";
           data.forEach(function(role){
// let roleupdateurl = "/updateRole";
               rowsGetRoles += `
                    <tr>
    <td>
        ${role.roleId} </td>
    <td>
        <input type="hidden"
                     name="roleId" class="roleId"
                            value="${role.roleId}">

                     <input type="text"
                            name="roleName"
                            value="${role.roleName}"
                            class="roleName form-control role-input">
 </td>
    <td>
        
                     <button type="button"
                     data-url="/updateRole"
                             class="btn btn-primary buttonForUpdateRoleByAdmin">
                         Update
                     </button>
             </td>
             
    <td><button type="button" data-url="/destroyRole"
                             class="btn btn-primary buttonForDeleteRoleByAdmin">Delete</button>
             </td>
            </tr>
               `;
           });

           $('#tableForRolesAJAX tbody').html(rowsGetRoles);                },
                error: function(jqXHR, ajaxOptions, thrownError) {
                    alert('Error fetching data');
                    console.log(thrownError);
                }
            });
        }
        // 
        // 
        // 
        
function getAllData()
    {
         getRoles();
    }
        
    
//
    //
    //
    </script>
<!-- 


-->

    <div class="py-12" id="updateRolesByAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Update roles
                    <table class="table" id="tableForRolesAJAX">
                        <thead>
                          <tr>
                            <th>Role Id</th>
                            <th>Role Name</th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/Admin/role.js') }}"></script>
       <script src="{{ asset('js/Admin/commonContent.js') }}" defer></script>
</x-app-layout>
