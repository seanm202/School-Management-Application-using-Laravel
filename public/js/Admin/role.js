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

        const row = $(this).closest('tr');

    const roleId   = row.find('.roleId').val();
    const roleName   = row.find('.roleName').val();
    const url = $(this).data('url');
        $.ajax({
            url: url,
            type: "POST",
            data:{
                 roleId: roleId,
                 roleName: roleName
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


$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ✅ delegated event (works for all rows)
    $(document).on('click', '.buttonForDeleteRoleByAdmin', function (e) {
        e.preventDefault();

        // console.log('clicked'); // 🔥 MUST appear
        const row = $(this).closest('tr');
    const roleId   = row.find('.roleId').val();

    const url = $(this).data('url');
        $.ajax({
            url: url,
            type: "POST",
            data:{
                 roleId: roleId
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
