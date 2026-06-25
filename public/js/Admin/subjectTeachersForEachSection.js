$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('submit', '.formForAssigningTeachers', function (e) {

        e.preventDefault();

        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: "POST",
            data: form.serialize(),
            dataType: "json",

            success: function (data) {
                showSuccess();
        getAllData();
            },

            error: function (xhr) {
                console.log(xhr.responseText);

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    jsdisplaycustomerrors(xhr.responseJSON.errors);
                }
            }
        });

    });

});

$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                 $(document).on('submit', '.formForReAssigningTeachers', function (e) {
                e.preventDefault();
                  var url = $('.formForReAssigningTeachers').attr('action');
             
      $.ajax({
            data: $('.formForReAssigningTeachers').serialize(),
      url: url,
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