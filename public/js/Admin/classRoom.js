// 

// 

// 
function getTeachersList(callback) {

    $.ajax({
        url: "/getListOfTeachers",
        method: "GET",
        dataType: "json",
        success: function(data) {

            let options = '';
             options += `
                    <option value="">
                        Select Teacher
                    </option>`;
            data.forEach(function(teacher) {
                options += `
                    <option value="${teacher.teacherId}">
                        ${teacher.firstName} ${teacher.lastName}
                    </option>`;
            });

            callback(options);
        },

error: function(xhr) {

    console.log(xhr.responseJSON);

    if (xhr.status === 422) {

        let errors = xhr.responseJSON.errors;

        for (let field in errors) {
            console.log(field + " : " + errors[field][0]);
        }

        let messages = Object.values(errors).flat();
        showError(messages);

    } else {

        console.log(xhr.responseText);
        showError("Something went wrong.");

    }
}
    });
}
// 

// 

// 


   function getDepartmentsList(callback) {

    $.ajax({
        url: "/getListOfDepartments",
        method: "GET",
        dataType: "json",
        success: function(data) {

            let options = '';
                options += `
                    <option value="">
                        Select Department
                    </option>`;
            data.forEach(function(department) {
                options += `
                    <option value="${department.departmentId}">
                        ${department.departmentName}
                    </option>`;
            });

            callback(options);
        },

error: function(xhr) {

    console.log(xhr.responseJSON);

    if (xhr.status === 422) {

        let errors = xhr.responseJSON.errors;

        for (let field in errors) {
            console.log(field + " : " + errors[field][0]);
        }

        let messages = Object.values(errors).flat();
        showError(messages);

    } else {

        console.log(xhr.responseText);
        showError("Something went wrong.");

    }
}
    });
}
// 

// 

// 


  function getSemestersList(callback) {

    $.ajax({
        url: "/getListOfSemesters",
        method: "GET",
        dataType: "json",
        success: function(data) {

            let options = '';
            options += `
                    <option value="">
                        Select Semester
                    </option>`;
            data.forEach(function(semester) {
                options += `
                    <option value="${semester.semesterId}">
                        ${semester.semesterName}
                    </option>`;
            });

            callback(options);
        },

error: function(xhr) {

    console.log(xhr.responseJSON);

    if (xhr.status === 422) {

        let errors = xhr.responseJSON.errors;

        for (let field in errors) {
            console.log(field + " : " + errors[field][0]);
        }

        let messages = Object.values(errors).flat();
        showError(messages);

    } else {

        console.log(xhr.responseText);
        showError("Something went wrong.");

    }
}
    });
}
// 

// 

// 

 function getSectionsList(callback) {

    $.ajax({
        url: "/getSectionsList",
        method: "GET",
        dataType: "json",
        success: function(data) {

            let options = '';
            options += `
                    <option value="">
                        Select Section
                    </option>`;
            data.forEach(function(section) {
                options += `
                    <option value="${section.sectionId}">
                        ${section.sectionName}
                    </option>`;
            });

            callback(options);
        },

error: function(xhr) {

    console.log(xhr.responseJSON);

    if (xhr.status === 422) {

        let errors = xhr.responseJSON.errors;

        for (let field in errors) {
            console.log(field + " : " + errors[field][0]);
        }

        let messages = Object.values(errors).flat();
        showError(messages);

    } else {

        console.log(xhr.responseText);
        showError("Something went wrong.");

    }
}
    });
}
function getGradesList(callback) {

    $.ajax({
        url: "/getGradesList",
        method: "GET",
        dataType: "json",
        success: function(data) {

            let options = '';

                options += `
                    <option value="">
                        Select Grade
                    </option>`;
            data.forEach(function(grade) {
                options += `
                    <option value="${grade.gradeId}">
                        ${grade.grade}
                    </option>`;
            });

            callback(options);
        }
    });
}

// 

// 

// 


$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#generateSubjectsDataForEachClassroom').click(function (e) {
                e.preventDefault();
                  var urlupdateClassRoom = $('#generateSubjectsDataForEachClassroom').attr('action');
      $.ajax({
            data: $('#generateSubjectsDataForEachClassroom').serialize(),
      url: urlupdateClassRoom,
type: "POST",
dataType: 'json',
      success: function(response)
{
    showSuccess(response.message);
    getAllData();
},

error: function(xhr) {

    console.log(xhr.responseJSON);

    if (xhr.status === 422) {

        let errors = xhr.responseJSON.errors;

        for (let field in errors) {
            console.log(field + " : " + errors[field][0]);
        }

        let messages = Object.values(errors).flat();
        showError(messages);

    } else {

        console.log(xhr.responseText);
        showError("Something went wrong.");

    }
}
      });
        });
});

// 

// 

// 

$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#updateClassRoomNotInModal').click(function (e) {
                e.preventDefault();
                  var urlupdateClassRoom = $('#updateClassRoom').attr('action');
      $.ajax({
            data: $('#updateClassRoom').serialize(),
      url: urlupdateClassRoom,
type: "POST",
dataType: 'json',
      success: function(response)
{
    showSuccess(response.message);
    getAllData();
},

error: function(xhr) {

    console.log(xhr.responseJSON);

    if (xhr.status === 422) {

        let errors = xhr.responseJSON.errors;

        for (let field in errors) {
            console.log(field + " : " + errors[field][0]);
        }

        let messages = Object.values(errors).flat();
        showError(messages);

    } else {

        console.log(xhr.responseText);
        showError("Something went wrong.");

    }
}
      });
        });
});


//
//
//


$(document).ready(function(){

  $('#deleteClassRoom').ajaxForm(function() {
        event.preventDefault();
        var url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
             success: function(response)
{
    showSuccess(response.message);
    getAllData();
},

error: function(xhr) {

    console.log(xhr.responseJSON);

    if (xhr.status === 422) {

        let errors = xhr.responseJSON.errors;

        for (let field in errors) {
            console.log(field + " : " + errors[field][0]);
        }

        let messages = Object.values(errors).flat();
        showError(messages);

    } else {

        console.log(xhr.responseText);
        showError("Something went wrong.");

    }
}
        });
    });

});

   //
   //
   //
   $(function () {

                                                                $.ajaxSetup({
                                                                    headers: {
                                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                    }
                                                              });


   $(document).on('submit', '#FormToCreateClassRoom', function(event) {
    event.preventDefault();

    console.log('Button clicked');

    var FormDataToCreateClassRoom =
        $('#FormToCreateClassRoom').attr('action');

    console.log('URL:', FormDataToCreateClassRoom);
    console.log('DATA:', $('#FormToCreateClassRoom').serialize());

    $.ajax({
        data: $('#FormToCreateClassRoom').serialize(),
        url: FormDataToCreateClassRoom,
        type: "POST",

         success: function(response)
{
    showSuccess(response.message);
    getAllData();
},
error: function(xhr) {

    console.log("Status:", xhr.status);
    console.log("Response:", xhr.responseText);

    if (xhr.responseJSON && xhr.responseJSON.errors) {

        let messages = Object.values(xhr.responseJSON.errors).flat();
        showError(messages);

    } else if (xhr.responseJSON && xhr.responseJSON.message) {

        showError(xhr.responseJSON.message);

    } else {

        showError("Internal Server Error (500). Check laravel.log.");

    }

}
    });
});

                                                            });

                                                            //
                                                            //
                                                            //



$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#updateClassRoomForView').click(function (e) {
                e.preventDefault();
                  var urlupdateClassRoomInModalForm = $('#updateClassRoomInModalForm').attr('action');
      $.ajax({
            data: $('#updateClassRoomInModalForm').serialize(),
      url: urlupdateClassRoomInModalForm,
type: "POST",
dataType: 'json',
       success: function(response)
{
    showSuccess(response.message);
    getAllData();
},

error: function(xhr) {

    console.log(xhr.responseJSON);

    if (xhr.status === 422) {

        let errors = xhr.responseJSON.errors;

        for (let field in errors) {
            console.log(field + " : " + errors[field][0]);
        }

        let messages = Object.values(errors).flat();
        showError(messages);

    } else {

        console.log(xhr.responseText);
        showError("Something went wrong.");

    }
}
      });
        });
});


//
//

$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#deleteClassroomForView').click(function (e) {
                e.preventDefault();
                  var urldeleteClassRoomInModalForm = $('#deleteClassRoomInModalForm').attr('action');
      $.ajax({
            data: $('#deleteClassRoomInModalForm').serialize(),
      url: urldeleteClassRoomInModalForm,
type: "POST",
dataType: 'json',
       success: function(response)
{
    showSuccess(response.message);
    getAllData();
},

error: function(xhr) {

    console.log(xhr.responseJSON);

    if (xhr.status === 422) {

        let errors = xhr.responseJSON.errors;

        for (let field in errors) {
            console.log(field + " : " + errors[field][0]);
        }

        let messages = Object.values(errors).flat();
        showError(messages);

    } else {

        console.log(xhr.responseText);
        showError("Something went wrong.");

    }
}
      });
        });
});


//
//
$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.selectForAssignClassRoomAStudent', function () {


        var studentId = $(this).data('bs-studentid');
        var studentFirstName = $(this).data('bs-first-name');
        var studentLastName = $(this).data('bs-last-name');
        var studentEmail = $(this).data('bs-email');
        var studentPhone = $(this).data('bs-phone');

        $.ajax({
            url: "/toGetAStudentClassRoomByAJAX",
            method: "GET",
            dataType: "json",

            success: function(data) {

                let rowsGetForAssignClassRoomToStudent = "";
                let classroomassignurl = "/assignClassroomStudent";

                $("#exampleModalStudentFullName").html(
                    "Name : " + studentFirstName + " " + studentLastName
                );

                $("#exampleModalStudentEmail").html(
                    "Email : " + studentEmail
                );

                $("#exampleModalStudentPhone").html(
                    "Phone : " + studentPhone
                );

                data.forEach(function(classroom) {

                    rowsGetForAssignClassRoomToStudent += `
                        <form method="POST" action="{{ route('createclassRoom') }}" name="createClassRoom" id="FormToCreateClassRoom">
                        <tr>
                            <td>${classroom.grade}</td>
                            <td>${classroom.sectionName}</td>
                            <td>${classroom.roomNo}</td>
                            <td>${classroom.departmentName}</td>
                            <td>${classroom.semesterName}</td>
                            <td>${classroom.teacherFirstName} ${classroom.teacherLastName}</td>
                            <td>${classroom.capacity}</td>
                            <td>
                                <form action="${classroomassignurl}"
                                      method="POST"
                                      class="assignClassroomIdForStudent">

                                    <input type="hidden"
                                           name="classRoomId"
                                           value="${classroom.classroomDetailId}">

                                    <input type="hidden"
                                           name="studentIdForAssignClassRoom"
                                           value="${studentId}">

                                    <button type="submit"
                                            class="btn btn-primary form-control" data-bs-dismiss="modal"
                                            class="selectedForAssignClassRoomAStudent">
                                        Choose
                                    </button>

                                </form>
                            </td>
                        </tr>
                    `;
                });

                $('#createClassRoomPart')
                    .html(rowsGetForAssignClassRoomToStudent);
            },

error: function(xhr) {

    console.log(xhr.responseJSON);

    if (xhr.status === 422) {

        let errors = xhr.responseJSON.errors;

        for (let field in errors) {
            console.log(field + " : " + errors[field][0]);
        }

        let messages = Object.values(errors).flat();
        showError(messages);

    } else {

        console.log(xhr.responseText);
        showError("Something went wrong.");

    }
}
        });

    });

});
