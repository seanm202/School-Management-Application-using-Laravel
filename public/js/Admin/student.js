$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

              
                $(document).on('submit', '#addStudentAdmin', function (e) {
                e.preventDefault();
                  var url = $('#addStudentAdmin').attr('action');
                  
      $.ajax({
            data: $('#addStudentAdmin').serialize(),
      url: url,
type: "POST",
dataType: 'json',
       success: function(response)
{
    showSuccess(response.message);
    getAllData();
},
error: function(xhr) {

    console.log(xhr);
console.log(xhr.responseJSON);
console.log(xhr.responseText);
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

                $(document).on('submit', '#createMarkEntry', function (e) {
                e.preventDefault();
                  var url = $('#createMarkEntry').attr('action');
                
      $.ajax({
            data: $('#createMarkEntry').serialize(),
      url: url,
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

                $(document).on('submit', '.assignClassroomIdForStudent', function (e) {
                 
                e.preventDefault();
                  var url = $('.assignClassroomIdForStudent').attr('action');
                 
                 
      $.ajax({
            data: $('.assignClassroomIdForStudent').serialize(),
      url: url,
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

$(document).ready(function () {

                        $.ajaxSetup({
                               headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             }
                         });

                                    // ✅ delegated event (works for all rows)
                                    $(document).on('click', '.submitSubjectMarksButton', function (e) {
                                     e.preventDefault();
                                        const row = $(this).closest('tr');

    const student_marksId = row.find('.student_marksId').val();
    const marksObtained   = row.find('.marksObtained').val();

    const url = $(this).data('url');
                                     
                                      $.ajax({
                                          url: url,
                                          type: "POST",
                                          data:{
                                            student_marksId: student_marksId,
                                            marksObtained: marksObtained,
                                          },
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

    $(document).on('click', '.selectForAssignClassRoomAStudent', function () {


        var studentId = $(this).data('bs-studentid');
        var studentFirstName = $(this).data('bs-first-name');
        var studentLastName = $(this).data('bs-last-name');
        var studentEmail = $(this).data('bs-email');
        var studentPhone = $(this).data('bs-phone');

        $.ajax({
            url: "toGetAStudentClassRoomByAJAX",
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
                                    id="classRoomId"
                                           name="classRoomId"
                                           value="${classroom.classroomDetailId}">

                                    <input type="hidden"
                                    id="studentIdForAssignClassRoom"
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

                $('#tableForModalForAssignClassRoom tbody')
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
