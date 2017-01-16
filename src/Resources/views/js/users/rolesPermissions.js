$(document).ready(function () {

    var enabled = true;

    $('.changePermission').click(function (e) {

        e.preventDefault(e);

        if (!enabled)
            return;

        var dialog = bootbox.dialog({
            title: 'Updating permission',
            message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>'
        });

        enabled = false;

        var role_id = $(this).attr('data-role-id');
        var permission_id = $(this).attr('data-permission-id');
        var has_permission = $(this).attr('data-has-permission');

        // console.log(role_id);
        // console.log(permission_id);
        // console.log(has_permission);

        var tr = $(this).closest('tr');

        $.ajax({
            type: 'GET',
            url: changePermissionUrl,
            data: {
                role_id: role_id,
                permission_id: permission_id,
                has_permission: has_permission,
                _token: API.Data.token
            },
            success: function (data) {

                dialog.init(function () {
                    setTimeout(function () {
                        dialog.find('.bootbox-body').html(data.msg);
                    }, 1000);
                });

                setTimeout(function () {

                    dialog.modal('hide');

                    // change row color
                    if (has_permission == 1) {
                        tr.find('.danger').addClass('success').removeClass('danger');
                    } else {
                        tr.find('.success').addClass('danger').removeClass('success');
                    }

                    // enable and disable links
                    var notActive = tr.find('.changePermission.not-active');
                    tr.find('.changePermission.active').addClass('not-active').removeClass('active');
                    notActive.addClass('active').removeClass('not-active')

                    // enable function
                    enabled = true;

                }, 1500);
            }
        });
    });
});