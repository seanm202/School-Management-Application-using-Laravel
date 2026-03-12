$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });


  $('#buttonForCreateSectionByAdmin').click(function (e) {
e.preventDefault();
var url = $('#createSectionByAdmin').attr('action');
console.log(url);
$.ajax({
data: $('#createSectionByAdmin').serialize(),
url: url,
type: "POST",
dataType: 'json',
success: function (data) {
alert('Success');
},
error: function (xhr) {
console.log(xhr.responseText); // 🔥 very useful
alert('Error');
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
    $(document).on('click', '.saveSectionBtn', function (e) {
      e.preventDefault();

      var form = $(this).closest('form');

      var url = form.attr('action');
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
    $(document).on('click', '.deleteSectionBtn', function (e) {
      e.preventDefault();

      var form = $(this).closest('form');

      var url = form.attr('action');
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
