
  <div>
    <div class="py-12" id="addTeachersAdmin">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  Name : {{$studentDetails->sal}}{{$studentDetails->firstName}}{{$studentDetails->lastName}}
                  Age : {{$studentDetails->age}}
                  Date of Birth : {{$studentDetails->dob}}
                  <div class="markListTable">
                      <table>
                        <tr>
                          <th>Department</th>
                          <th>Semester</th>
                          <th>Subject Name</th>
                          <th>Subject Code</th>
                          <th>Subject Maximum Marks</th>
                          <th>Subject Marks</th>
                        </tr>
                        @foreach($studentMarks as $studentMarkData)
                        <tr>
                          <td>{{$studentMarkData->departmentName}}</td>
                          <td>{{$studentMarkData->semesterName}}</td>
                          <td>{{$studentMarkData->subjectName}}</td>
                          <td>{{$studentMarkData->subjectCode}}</td>
                          <td>{{$studentMarkData->subjectMaxMarks}}</td>
                          <td>{{$studentMarkData->marks}}</td>
                        </tr>
                        @endforeach
                      </table>
                </div>
          </div>
            </div>
        </div>
    </div>
</div>
