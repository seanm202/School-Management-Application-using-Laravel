
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
      success: function (data) {
        showSuccess();
                    getAllData();
      },
          error: function (xhr) {
  console.log(xhr.responseText);
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);
    
      }
      });
        });
});





$(document).ready(function(){

    $('#createOrUpdateAdminDetails').ajaxForm(function() {
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
            success:function(response)
            {
                 showSuccess();
                    getAllData();
            },
          error: function (xhr) {
  console.log(xhr.responseText);
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);
    
      }
        });
    });

});



$(document).ready(function(){

    $('#createOrUpdateTeacherDetails').ajaxForm(function() {
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
            success:function(response)
            {
                 showSuccess();
                    getAllData();
            },
          error: function (xhr) {
  console.log(xhr.responseText);
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);
    
      }
        });
    });

});

$(document).ready(function(){

  $('#createOrUpdateStudentDetails').ajaxForm(function() {
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
            success:function(response)
            {
                 showSuccess();
                    getAllData();
            },
          error: function (xhr) {
  console.log(xhr.responseText);
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);
    
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
      success: function (data) {
                     showSuccess();
                    getAllData();
      },
          error: function (xhr) {
  console.log(xhr.responseText);
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);
    
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
      success: function (data) {
                    showSuccess();
                    getAllData();
      },
          error: function (xhr) {
  console.log(xhr.responseText);
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);
    
      }
      });
        });
});


//
//
