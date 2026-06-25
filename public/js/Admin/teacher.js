$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#buttonForAddTeacherAdmin').click(function (e) {
                e.preventDefault();
                  var url = $('#addTeacherAdmin').attr('action');
                  // alert(url);
      $.ajax({
            data: $('#addTeacherAdmin').serialize(),
      url: url,
type: "POST",
dataType: 'json',
      success: function (data) {
        showSuccess();
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