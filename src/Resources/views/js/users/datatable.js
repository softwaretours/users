$(document).ready(function () {
    datatable();
});

function deleteItem($id) {
    if (confirm('Are you sure you want to delete user?')) {
        $.ajax({
            type: 'DELETE',
            url: $deleteUrl,
            data: {id: $id, _token: API.Data.token},
            success: function (data) {
                $('#example').dataTable().fnDestroy();
                datatable();
            }
        });
    }
}

function datatable() {
    var table = $('#example').DataTable({
        "lengthMenu": [5, 10, 15, 20, 50, 100],
        "pageLength": 50,
        "scrollY": "300px",
        "scrollCollapse": true,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: show_users,
            dataSrc: 'data'
        },
        "columnDefs": [
            {"targets": 0, "width": "10%"},
            {"targets": 4, "width": "10%"},
        ],
        'columns': [
            {'data': 'id'},
            {'data': 'name'},
            {'data': 'email'},
            {'data': 'password_text'},
            /* EDIT | DELETE*/ {
                mRender: function (data, type, row) {
                    
                    var update_btn = '<a class="btn btn-default" href="' + row['id'] + '/edit"><span class="glyphicon glyphicon-edit"></span></a>';
                    var delete_btn = '<button onclick="deleteItem(' + row['id'] + ')" class="btn btn-default button-delete" id="dlt-module"><span class="glyphicon glyphicon-trash"></span></button>';
                    var permissions_btn = '<a class="btn btn-default" href="' + row['id'] + '/permissions"><span class="glyphicon glyphicon-ban-circle"></span></a>';
                    var login_as_btn = ' <a class="btn btn-default" href="' + row['id'] + '/login-as">Login as</a>';

                    if (!permissionUpdate) update_btn = "";
                    if (!permissionDelete) delete_btn = "";
                    if (!permissionViewRolePermissions) permissions_btn = "";
                    if (!permissionLoginAs) login_as_btn = "";

                    return update_btn + ' ' + delete_btn + ' ' + permissions_btn + ' ' + login_as_btn;
                }
            }
        ]
    });
}