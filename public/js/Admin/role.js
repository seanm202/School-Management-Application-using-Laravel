$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ✅ delegated event (works for all rows)
    $(document).on('click', '.buttonForUpdateRoleByAdmin', function (e) {
        e.preventDefault();

        // console.log('clicked'); // 🔥 MUST appear

        var form = $(this).closest('form');
        console.log(form.serialize()); // 🔥 MUST show data

        var url = form.attr('action');

        $.ajax({
            url: url,
            type: "POST",
            data: form.serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                alert('Success');
            },
            error: function (xhr) {
                console.log(xhr.status);
                console.log(xhr.responseText);
            }
        });

    });

});
