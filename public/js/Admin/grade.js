// Go to top button
// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
// 

// 

// 



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