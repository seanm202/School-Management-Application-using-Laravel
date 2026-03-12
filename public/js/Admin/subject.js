$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#buttonForAddSubject').click(function (e) {
                e.preventDefault();
                  var urlcreateSubject = $('#createSubject').attr('action');
      $.ajax({
            data: $('#createSubject').serialize(),
      url: urlcreateSubject,
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
  console.log(xhr.responseText);
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
  console.log(xhr.responseText);
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
$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.buttonForUpdatePriority', function (e) {
        e.preventDefault();

        // ✅ get the form of THIS row only
        var form = $(this).closest('form');

        var urleditPriority = form.attr('action');

        $.ajax({
            url: urleditPriority,
            type: "POST",
            data: form.serialize(),
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
