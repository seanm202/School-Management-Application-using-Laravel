$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#updateClassRoomNotInModal').click(function (e) {
                e.preventDefault();
                  var urlupdateClassRoom = $('#updateClassRoom').attr('action');
      $.ajax({
            data: $('#updateClassRoom').serialize(),
      url: urlupdateClassRoom,
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


$(document).ready(function(){

  $('#deleteClassRoom').ajaxForm(function() {
        event.preventDefault();
alert('l');
        var url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
            },
            error: function(response) {
            }
        });
    });

});


$(document).ready(function(){

  $('#createClassRoom').ajaxForm(function() {
        event.preventDefault();
alert('l');
        var url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
            },
            error: function(response) {
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

                $('#updateClassRoomForView').click(function (e) {
                e.preventDefault();
                  var urlupdateClassRoomInModalForm = $('#updateClassRoomInModalForm').attr('action');
      $.ajax({
            data: $('#updateClassRoomInModalForm').serialize(),
      url: urlupdateClassRoomInModalForm,
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

$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#deleteClassroomForView').click(function (e) {
                e.preventDefault();
                  var urldeleteClassRoomInModalForm = $('#deleteClassRoomInModalForm').attr('action');
      $.ajax({
            data: $('#deleteClassRoomInModalForm').serialize(),
      url: urldeleteClassRoomInModalForm,
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
