
$(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });

                $('#saveGrade').click(function (e) {
                e.preventDefault();
                  var urlcreateGradeByAdmin = $('#formForCreateGradeByAdmin').attr('action');
      $.ajax({
            data: $('#formForCreateGradeByAdmin').serialize(),
      url: urlcreateGradeByAdmin,
type: "POST",
dataType: 'json',
      success: function (data) {
        showSuccess();
                    getAllData();
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


$(document).ready(function () {

                        $.ajaxSetup({
                               headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                             }
                         });

                                    // ✅ delegated event (works for all rows)
                                    $(document).on('click', '.buttonForUpdateGradeByAdmin', function (e) {
                                     e.preventDefault();
                                        const row = $(this).closest('tr');

    const gradeName = row.find('.gradeName').val();
    const gradeId   = row.find('.gradeId').val();

    const url = $(this).data('url');
                                     
                                      $.ajax({
                                          url: url,
                                          type: "POST",
                                          data:{
                                            gradeName: gradeName,
                                            gradeId: gradeId
                                          },
                                          dataType: 'json',
                                          success: function (data) {
                                              getAllData();
                                              showSuccess();
                                              console.log("SUCCESS FIRED");
                                              console.log(data);
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
                                    $(document).on('click', '.buttonForDeleteGradeByAdmin', function (e) {
                                      const row = $(this).closest('tr');

    const gradeId   = row.find('.gradeId').val();

    const url = $(this).data('url');
                                      $.ajax({
                                          url: url,
                                          type: "POST",
                                          data:{
                                            gradeId: gradeId
                                          },
                                          dataType: 'json',
                                          success: function (data) {
                                              getAllData();
                                              showSuccess();
                                              console.log(data);
                                          },
                                          error: function (xhr) {
                                              console.log(xhr.status);
                                              console.log(xhr.responseText);
                                          }
                                      });
                                  });
                                });