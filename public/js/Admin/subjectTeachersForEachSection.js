$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#buttonForCreateTeacherForSubject').click(function (e) {
                e.preventDefault();
                  var urlcreateGradeByAdmin = $('#createTeacherForSubject').attr('action');
      $.ajax({
            data: $('#createTeacherForSubject').serialize(),
      url: urlcreateGradeByAdmin,
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
