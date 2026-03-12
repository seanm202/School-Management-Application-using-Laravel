$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#buttonForAddStudentAdmin').click(function (e) {
                e.preventDefault();
                  var url = $('#addStudentAdmin').attr('action');
                
      $.ajax({
            data: $('#addStudentAdmin').serialize(),
      url: url,
type: "POST",
dataType: 'json',
      success: function (data) {
                    alert('Success');
      },
    error: function (xhr) {
  console.log(xhr.responseText);
      }
      });
        });
});
