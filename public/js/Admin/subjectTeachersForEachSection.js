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