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
//