$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#saveGrade').click(function (e) {
                e.preventDefault();
                  var urlcreateGradeByAdmin = $('#formForCreateGradeByAdmin').attr('action');
      $.ajax({
            data: $('#formForCreateGradeByAdmin').serialize(),
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
    $(document).on('click', '.buttonForFormForUpdateGradeByAdmin', function (e) {
      e.preventDefault();

      var form = $(this).closest('form');
      console.log(form.length);
      console.log(form.serialize());

      var url = form.attr('action');
      console.log(url);
      $.ajax({
          url: url,
          type: "POST",
          data: form.serialize(),
          dataType: 'json',
          success: function (data) {
              console.log("SUCCESS FIRED");
              console.log(data);
              alert("Updated!");
          },
          error: function (xhr) {
              console.log(xhr.status);
              console.log(xhr.responseText);
          }
      });
  });
});


$(document).on('click', '.buttonForDeleteGradeByAdmin', function (e) {
    e.preventDefault();

    var form = $(this).closest('form');
    var url = form.attr('action');

    $.ajax({
        url: url,
        type: "POST",
        data: form.serialize(),
        dataType: 'json',
        success: function (data) {
            alert('Deleted');
        },
        error: function (xhr) {
            console.log(xhr.status);
            console.log(xhr.responseText);
        }
    });
});
