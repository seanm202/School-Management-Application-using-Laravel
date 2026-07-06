$(document).ready(function(){

  $('#showTodaysAbsentees').ajaxForm(function() {
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


$(document).ready(function(){

    $('#showAbsenteesOn').ajaxForm(function() {
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



$(document).ready(function(){

    $('#showAbsenteesBetween').ajaxForm(function() {
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
