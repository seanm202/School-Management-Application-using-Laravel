

$(document).ready(function(){

    var form = '#formIdNow';
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $(form).on('submit', function(event){
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
            success:function(response)
            {
                alert("Success");
            },
            error: function(response) {
            }
        });
    });

});



$(document).ready(function(){

    var form = '#updateMarksTeacher';
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        }
    });

    $(form).on('submit', function(event){
        event.preventDefault();
        var url = $(this).attr('action');

        $.ajax({
             headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
    },
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                 alert("Success");
            },
            error: function(response) {
            }
        });
    });

});
