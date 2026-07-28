<script type="text/javascript">

$(document).ready(function () {

                                      $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                        // ✅ delegated event (works for all rows)
                                        
                                             $(document).on('submit', '#loginForm', function(event) {
                                          event.preventDefault();

                                          var form = $(this).closest('form');
                                          console.log(form.length);
                                          console.log(form.serialize());

                                          var url = form.attr('action');
                                          console.log(url);
                                          $.ajax({
                                              url: url,
                                              type: "POST",
                                              data: form.serialize(),
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


</script>







                                    
    function getAllData()
    {
         getBatches();
   
    }
    

$(document).ready(function () {
   getAllData();
});