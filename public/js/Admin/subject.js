$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

               $(document).on('submit', '#addSubjectAdmin', function (e) {
                e.preventDefault();
                  var url = $('#addSubjectAdmin').attr('action');
                  
      $.ajax({
            data: $('#addSubjectAdmin').serialize(),
      url: url,
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
// 
// 
// 
$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

               $(document).on('submit', '.deleteSubject', function (e) {
                e.preventDefault();
              
    let form = $(this);
      $.ajax({
      url: form.attr('action'),
type: "POST",
            data:  form.serialize(),
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
//
//
//
$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#updateSubjectDetails').click(function (e) {
                e.preventDefault();
                  var urlupdateSubject = $('#updateSubject').attr('action');
      $.ajax({
            data: $('#updateSubject').serialize(),
      url: urlupdateSubject,
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

$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

               $(document).on('submit', '.updateSubjectName', function (e) {
                    e.preventDefault();
                  var urlupdateSubject = $('.updateSubjectName').attr('action');
      $.ajax({
            data: $('.updateSubjectName').serialize(),
      url: urlupdateSubject,
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

//
//
//


//
//
//


// 

// 

// 

$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

               $(document).on('submit', '.deleteSubject', function (e) {
                    e.preventDefault();
                  var urlupdateSubject = $('.deleteSubject').attr('action');
      $.ajax({
            data: $('.deleteSubject').serialize(),
      url: urlupdateSubject,
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

//
//
//
$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#buttonForAddPriority').click(function (e) {
                e.preventDefault();
                  var urlcreatePriority = $('#createPriority').attr('action');
      $.ajax({
            data: $('#createPriority').serialize(),
      url: urlcreatePriority,
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
$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

              $(document).on('click', '.buttonForUpdatePriority', function () {

const row = $(this).closest('tr');

    const priorityId = row.find('.priorityId').val();
    const priorityName   = row.find('.priorityName').val();
    const priorityValue   = row.find('.priorityValue').val();
   const urleditPriority = $(this).data('url');
    // alert(urleditPriority);
    console.log({
    priorityId: row.find('.priorityId').val(),
    priorityName: row.find('.priorityName').val(),
    priorityValue: row.find('.priorityValue').val()
});
    $.ajax({
        data: {
          priorityId:priorityId,
          priorityName:priorityName,
          priorityValue:priorityValue
        },
        url: urleditPriority,
        type: "POST",
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
