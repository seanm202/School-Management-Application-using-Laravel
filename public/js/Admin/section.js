    //
    //
    //
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });


      $('#buttonForCreateSectionByAdmin').click(function (e) {
  e.preventDefault();
  var createSectionAdmin = $('#createSectionByAdmin').attr('action');
//   alert(createSectionAdmin); // 🔥 very useful
  $.ajax({
  data: $('#createSectionByAdmin').serialize(),
  url: createSectionAdmin,
  type: "POST",
  dataType: 'json',
  success: function (data) {
      getAllData();
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
// 

$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ✅ delegated event (works for all rows)
    $(document).on('click', '.buttonForUpdateSectionByAdmin', function (e) {
        e.preventDefault();

        // console.log('clicked'); // 🔥 MUST appear
        const row = $(this).closest('tr');
    const sectionId   = row.find('.sectionId').val();
    const sectionName = row.find('.sectionName').val();

    const url = $(this).data('url');
        $.ajax({
            url: url,
            type: "POST",
            data:{
                 sectionId : sectionId,
                 sectionName : sectionName
                 },
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                getAllData(); // Refresh the data after successful update
                showSuccess(); // Show success message
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

$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ✅ delegated event (works for all rows)
    $(document).on('click', '.buttonForDeleteSectionByAdmin', function (e) {
        e.preventDefault();

        // console.log('clicked'); // 🔥 MUST appear
        const row = $(this).closest('tr');
    const sectionId   = row.find('.sectionId').val();

    const url = $(this).data('url');
        $.ajax({
            url: url,
            type: "POST",
            data:{
                 sectionId: sectionId
                 },
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                getAllData(); // Refresh the data after successful update
                showSuccess(); // Show success message
            },
    error: function (xhr) {
  console.log(xhr.responseText);
var errors = xhr.responseJSON.errors;
jsdisplaycustomerrors(errors);
    
      }
        });

    });

});
