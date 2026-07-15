$(document).ready(function(){

$(document).on('submit', '#markAttendance', function(event) {
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

        showError("Something went wrong.");

    }
}
        });
    });

});
// 
// 
// 

$(document).ready(function(){

$(document).on('submit', '#createStudentsAttendanceList', function(event) {
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

        showError("Something went wrong.");

    }
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


    $('#assignCurrentBatch').click(function (e) {
e.preventDefault();
var assignCurrentBatches = $('#currentBatch').attr('action');
$.ajax({
data: $('#currentBatch').serialize(),
url: assignCurrentBatches,
type: "POST",
dataType: 'json',
success: function(response)
{
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

$(document).on('submit', '#markAttendanceSubmit', function(event) {
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
  //
  //
  //
  
  $(document).ready(function(){

$(document).on('submit', '#getCurrentAttendanceDataId', function(event) {
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

