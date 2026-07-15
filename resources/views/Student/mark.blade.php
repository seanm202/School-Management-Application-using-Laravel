<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Marks') }}
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    View Marks for the current academic year   
      @if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
      @endif
          
      <script type="text/javascript">

           
      $(document).ready(function () {
   getAllData();
});
    
function getAllData()
    {
         getDataOfMarksObtained();
    }

function getDataOfMarksObtained(){
  
$.ajax({
url: "{{ route('getStudentMarkList') }}",
                method: "GET", 
                dataType: "json", 
                success: function(data) {

                    console.log(data);
let rowsGetStudentsMarks = "";

           data.forEach(function(studentsMark){

               rowsGetStudentsMarks += `
                    <tr class="studentId${studentsMark.studentId}studentId
                    departmentId${studentsMark.departmentId}departmentId 
                    semesterId${studentsMark.semesterId}semesterId
                    gradeId${studentsMark.gradeId}gradeId
                    sectionId${studentsMark.sectionId}sectionId
                    ">
    <td scope="row">${studentsMark.subjectId} </td>
    <td>${studentsMark.subjectName} </td>
    <td>${studentsMark.subjectCode}</td>
    <td>${studentsMark.subjectMaxMarks} </td>
    <td>${studentsMark.marks} </td>
            </tr>
               `;
           });

           $('#forDisplayingMarks tbody').html(rowsGetStudentsMarks);                
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
                   <div style="display:flex;">
                      <table class="table table-striped" id="forDisplayingMarks">
                        <thead>
                            <tr>
                              <th scope="col">Subject ID </th>
                              <th scope="col">Subject Name </th>
                              <th scope="col">Subject Code </th>
                              <th scope="col">Subject Maximum Marks</th>
                              <th scope="col">Subject Marks </th>
                            </tr>
                        </thead>
                        <tbody>

                          </body>
                      </table>
                    </div>
                                                      
              </div>
            </div>
        </div>
    </div>
    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    View Marks of the previous academic years
                <div style="display:flex;">
                   <div>
                          <h2>Batch Name : </h2>
                  </div> <div style="padding:20px;"></div>
                     <div>
                           <h2>View : </h2>
                             </div> <div style="padding:20px;"></div>
                             <div><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#getSelectedClassStudentList">
                                    View
                               </button></div>
                        </div> -->
<!--

Select marks of chosen year

 -->
 <!-- <div class="modal fade" id="getSelectedClassStudentList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         Student Marks
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">

         <div style="display:flex;">
              <div>
                <h2>SubjectName : </h2>
              </div> <div style="padding:20px;"></div>
              <div>
                    <h2>SubjectMarks : </h2>
              </div> <div style="padding:20px;"></div>
              <div><h2>Subject Maximum Marks </h2></div>
                                                       </div>
                                       
                 </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 </div>
                           </div>
                         </div>
                       </div>

              </div>
            </div>
        </div>
    </div> -->
</x-app-layout>
