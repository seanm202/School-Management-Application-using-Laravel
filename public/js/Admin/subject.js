$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#buttonForAddSubjectAdmin').click(function (e) {
                e.preventDefault();
                  var url = $('#addSubjectAdmin').attr('action');
                  // alert(url);
      $.ajax({
            data: $('#addSubjectAdmin').serialize(),
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
      success: function (data) {
                    alert('Success');
      },
    error: function (xhr) {
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);
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
$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#buttonForSubjectDelete').click(function (e) {
                e.preventDefault();
                  var urldeleteSubject = $('#deleteSubject').attr('action');
      $.ajax({
            data: $('#deleteSubject').serialize(),
      url: urldeleteSubject,
type: "POST",
dataType: 'json',
      success: function (data) {
                    alert('Success');
      },
    error: function (xhr) {
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);
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
      success: function (data) {
                    showSuccess();
      },
    error: function (xhr) {
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);
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

        success: function(data) {
            showSuccess();
        },

       error: function(xhr) {
    if (xhr.status === 422) {
        jsdisplaycustomerrors(xhr.responseJSON.errors);
    } else {
        console.log(xhr.responseText);
    }
}
    });
});

//                 $('.buttonForUpdatePriority').click(function (e) {
//                 e.preventDefault();
//                   var urleditPriority = $('.editPriority').attr('action');
//       $.ajax({
//             data: $('.editPriority').serialize(),
//       url: urleditPriority,
// type: "POST",
// dataType: 'json',
//       success: function (data) {
//                     showSuccess();
//       },
//     error: function (xhr) {
// var errors = xhr.responseJSON.errors;
// jsdisplaycustomerrors(errors);
//       }
//       });
//         });
});
