
$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#addNewDetailsToUser').click(function (e) {
                e.preventDefault();
                  var urlcreateGradeByAdmin = $('#addDetails').attr('action');
      $.ajax({
            data: $('#addDetails').serialize(),
      url: urlcreateGradeByAdmin,
type: "POST",
dataType: 'json',
      success: function(response)
{
    showSuccess(response.message);
    getAllData();
},error: function(xhr) {
    var errors = xhr.responseJSON.errors;

    // Flatten all error arrays into one array
    var messages = Object.values(errors).flat();

    showError(messages);
}
      });
        });
});



$(document).ready(function(){

$(document).on('submit', '#newUserAddDetails', function(event) {
        event.preventDefault();

        var url = $(this).attr('action');

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
    $('#exampleModalLongNewUserUserId').modal('hide');
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




$(document).ready(function(){

$(document).on('submit', '#adminaddDetails', function(event) {
    // alert("Here");
    event.preventDefault();
        var url = $(this).attr('action');
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
      $('#exampleModalLongAdminUserId').modal('hide');
    getAllData();
},
error: function(xhr) {
    var errors = xhr.responseJSON.errors;

    // Flatten all error arrays into one array
    var messages = Object.values(errors).flat();

    showError(messages);
}
        });
    });

});



$(document).ready(function(){

        $(document).on('submit', '#teacheraddDetails', function(event) {
        event.preventDefault();
        var url = $(this).attr('action');

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
      $('#exampleModalLongTeacherUserId').modal('hide');
    getAllData();
},
error: function(xhr) {
    var errors = xhr.responseJSON.errors;

    // Flatten all error arrays into one array
    var messages = Object.values(errors).flat();

    showError(messages);
}
        });
    });

});

$(document).ready(function(){

     $(document).on('submit', '#studentAddDetails', function(event) {
        event.preventDefault();
        var url = $(this).attr('action');

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
      $('#exampleModalLongStudentUserId').modal('hide');
    getAllData();
},
error: function(xhr) {
    var errors = xhr.responseJSON.errors;

    // Flatten all error arrays into one array
    var messages = Object.values(errors).flat();

    showError(messages);
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

                $('#closeModalForUpdateTeacher').click(function (e) {
                e.preventDefault();
                  var urlcreateOrUpdateTeacherDetails = $('#createOrUpdateTeacherDetails').attr('action');
      $.ajax({
            data: $('#createOrUpdateTeacherDetails').serialize(),
      url: urlcreateOrUpdateTeacherDetails,
type: "POST",
dataType: 'json',
       success: function(response)
{
    showSuccess(response.message);
    getAllData();
},
error: function(xhr) {
    var errors = xhr.responseJSON.errors;

    // Flatten all error arrays into one array
    var messages = Object.values(errors).flat();

    showError(messages);
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

                $('#buttonForDeleteTeacherDetails').click(function (e) {
                e.preventDefault();
                  var urldeleteTeacherDetails = $('#deleteTeacherDetails').attr('action');
      $.ajax({
            data: $('#deleteTeacherDetails').serialize(),
      url: urldeleteTeacherDetails,
type: "POST",
dataType: 'json',
       success: function(response)
{
    showSuccess(response.message);
    getAllData();
},
error: function(xhr) {
    var errors = xhr.responseJSON.errors;

    // Flatten all error arrays into one array
    var messages = Object.values(errors).flat();

    showError(messages);
}
      });
        });
});


//
//
