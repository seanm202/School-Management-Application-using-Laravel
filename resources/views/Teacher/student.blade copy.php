<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
            {{ __('Students') }} @if ($errors->any())
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

Add students
 -->
@if(Session::has('success'))
        <div class="alert alert-success" style="position: fixed;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

 <div class="py-12" id="teacherStudentAddStudent">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Add Students

        

               <form action="{{route('createStudentTeacher')}}"  method="POST" name="createStudentTeacher" id="createStudentTeacher">
                                    {{ csrf_field() }}{{ method_field('POST') }}
                                      <label>Salutation</label>
                                        <select name="salutation" id="forSalutationId">
                                           <option value="Mr./Ms." selected>Mr./Ms.</option>
                                             <option value="Mr.">Mr.</option>
                                             <option value="Ms.">Ms.</option>
                                        </select>
                                      <label>First name</label>
                                      <input type="text" name="firstName" id="firstName" placeholder="Enter first name" class="form-control"/>
                                      <label>Last name</label>
                                      <input type="text" name="lastName" id="lastName" placeholder="Enter last name" class="form-control"/>
                                        <label>Email</label>
                                      <input type="email" name="email" id="emailId" placeholder="Enter your email address" class="form-control"/>
                                        <label>Age</label>
                                      <input type="number" name="age" id="ageId" placeholder="Enter your age" class="form-control"/>
                                        
                                        <label>Date of birth</label>
                                      <input type="date" name="dob" id="dobId" placeholder="Enter your date of birth" class="form-control"/>
                                        <input type="hidden" name="userId" id="userId" value="1" class="form-control"/>
                                          
                                          <label>Contact Number</label>
                                          <input type="tel+" name="contactNumber" id="contactNumber" placeholder="Enter Your Contact Number" class="form-control"/>
	</td></tr>
                                          <label>Alternate Contact Number</label>
                                            <input type="tel:" name="alternateContactNumber" id="alternateContactNumber" placeholder="Enter Your Alternate Contact Number" class="form-control"/>
                                            <label>Assign Role : </label>
                                      <select name="roleId" id="roleForId" class="form-control">
                                                                                </select>
                                      <label>Address</label>
                                          <input type="text" name="address" id="address" placeholder="Enter Address" class="form-control"/>
                                          <label>Blood group</label>
                                            <input type="text" name="bloodGroup" id="bloodGroup" placeholder="Enter Blood Group" class="form-control"/>
                                            <label>Identification Mark</label>
                                              <input type="text" name="identificationMark" id="identificationMark" placeholder="Enter identification mark" class="form-control"/>
</td></tr>
                                              <label>Parent's Number</label>
                                                  <input type="text" name="parentNumber" id="parentNumber" placeholder="Enter parent's number" class="form-control"/>
                                                  <label>Home Phone Number</label>
                                                    <input type="text" name="homePhoneNumber" id="homePhoneNumber" placeholder="Enter Home Phone Number" class="form-control"/>
</td></tr>
                                                    <label>Father's/Spouse's Name</label>
                                                      <input type="text" name="fatherSpouseName" id="fatherSpouseName" placeholder="Enter Father's/Spouse's Name" class="form-control"/>
</td></tr>
                                                      <label>Mother's Name</label>
                                                        <input type="text" name="motherName" id="motherName" placeholder="Enter mother's name" class="form-control"/>
                                                        <label>Guardian's Name</label>
                                                          <input type="text" name="guardianName" id="guardianName" placeholder="Enter Guardian's Name" class="form-control"/>
                                                        
                                                      </div>  <button type="submit" class="btn btn-primary form-control form-control">Save</button>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" id="addNewDetailsToUser" data-dismiss="modal">Close</button>
                                                          </form>
             </div>
         </div>
     </div>
 </div> 

<!--
Edit student details
 -->

 <div class="py-12" id="teacherStudentAddStudent">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 text-gray-900">
               Edit student details

             </div>
         </div>
     </div>
 </div>

<!--
Edit student details
 -->


     <div class="py-12" id="teacherStudentAddStudentMarks">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900">
                   <h2>Add student Marks</h2>
                   
                                 <table class="table">
                     <thead>
                       <tr>
                         <th>Name</th>
                         <th>Grade</th>
                         <th>Section</th>
                         <th>Semester</th>
                         <th>Add Marks</th>
                         <th>View Details</th>
                       </tr>

               
                     <tr>
                       <td>Student Detail First Name Student Detail Last Name</td>
                       <td>Student Detail Grade Name</td>
                       <td>Student Detail Section Name</td>
                       <td>Student Detail Semester Name</td>
                       <td><button type="button" name="submitMarkDetailsCreation" class="btn btn-primary form-control" data-toggle="modal" data-target="#submitMarkDetailsCreation">Add</button></td>
                       <td><button type="button" name="editDeleteMarksDetailsUpdation" id="editDeleteMarksDetailsUpdation" class="btn btn-primary" data-toggle="modal" data-target="#editDeleteMarksDetailsUpdation">View</button></td>
                     </tr>
                           </thead>
                         </table>

                     <!--
 Create Marks
                    -->

                    <!--

                    For creation
                    -->
                    <div class="modal fade" id="submitMarkDetailsCreation" id="adminStudentStudentMarksCreation"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                               <div class="modal-dialog" role="document">
                                                 <div class="modal-content">
                                                   <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLongTitle">Add marks of Student Name</h5>

                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body" id="subjectsList">


                             <table class="table">
                               <thead>
                                 <tr>
                                   <th>Subject Name</th>
                                   <th>Mark</th>
                                   <th>Subject Maximum Mark</th>
                                 </tr>
                               </thead>
                                 <tbody>
                                   <form action="{{route('updateMarksTeacher')}}" method="POST" name="updateMarksTeacher" id="updateMarksTeacher">
                                   {{ csrf_field() }}{{ method_field('POST')}}
                               <tr>
                                                     <td>Subject Name</td>
                                                     <td>student_marksId</input>
                                                     <input type="number" class="form-control" name="subjectMark[]" value=""></input></td>
                                                     <td>Subject Max Marks</td>
                                                   </tr>
                               @endforeach
                             </tbody>
                           </table>
                             <button type="submit" class="btn btn-primary form-control" >Submit</button></form>
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
     </div>


    <!--
Marks Creation
   -->



   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/Teacher/student.js') }}" defer></script>
</x-app-layout>
