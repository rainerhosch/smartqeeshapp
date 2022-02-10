<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $page; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $page; ?></a></li>
                        <li class="breadcrumb-item active"><?= $subpage; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-white">
                        <div class="card-header">
                            <h3 class="card-title">Data <?= $subpage; ?></h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-sm btn-primary btn_user_add mb-2" data-toggle="modal" data-target="#modalAddUser">Add User</a>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">NAMA</th>
                                        <th class="text-center">DIVISI</th>
                                        <th class="text-center">JABATAN</th>
                                        <th class="text-center">TLP</th>
                                        <th class="text-center">STATUS</th>
                                        <th class="text-center">TOOLS</th>
                                    </tr>
                                </thead>
                                <tbody id="user_tbody">
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Modal User-->
<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="modalAddUserTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_add_user" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="nama_user" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email_user" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email_user" name="email_user" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="divisi_user" class="col-sm-2 col-form-label">Divisi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="divisi_user" name="divisi_user" placeholder="Divisi" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jabatan_user" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jabatan_user" name="jabatan_user" placeholder="Jabatan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="default123" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2 float-right">
                            <button type="submit" class="btn btn-sm btn-primary btn_save">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "user/get_user",
            data: {
                method: `get_all`
            },
            dataType: "json",
            success: function(response) {
                let html_usr = ``;
                let icon = ``;
                let color = ``;
                if (response.data != 0) {
                    let no = ``;
                    $.each(response.data, function(i, user) {
                        no = i + 1;
                        html_usr += `<tr>`;
                        html_usr += `<td class="text-center">${no}</td>`;
                        html_usr += `<td class="text-center">${user.nama}</td>`;
                        html_usr += `<td class="text-center">${user.divisi}</td>`;
                        html_usr += `<td class="text-center">${user.jabatan}</td>`;
                        html_usr += `<td class="text-center">${user.email}</td>`;
                        html_usr += `<td class="text-center">`;
                        html_usr += `<label class="switch switch-primary">`;
                        if (user.is_active === '1') {
                            icon = `unlock`;
                            color = `success`;
                        } else {
                            icon = `lock`;
                            color = `danger`;
                        }
                        // html_usr += `<input type="checkbox" ${checkbox_check} class="btn_user_active small" value="${user.is_active}" data-user="${user.user_id}"><span></span>`;
                        if (user.role_type === 'Administrator') {
                            html_usr += `<a data-toggle="tooltip" data-placement="top" title="This user can't edited" class="btn btn-xs btn-${color} btn_user_administrator" value="${user.is_active}" data-user="${user.user_id}"><i class="fas fa-${icon}"></i></a>`;
                        } else {
                            html_usr += `<a data-toggle="tooltip" data-placement="top" title="Click for activate/deactive user" class="btn btn-xs btn-${color} btn_user_active" value="${user.is_active}" data-user="${user.user_id}"><i class="fas fa-${icon}"></i></a>`;
                        }
                        html_usr += `</label>`;
                        html_usr += `</td>`;

                        if (user.role_type === 'Administrator') {
                            html_usr += `<td class="text-center">Not editable</td>`;
                        } else {
                            html_usr += `<td class="text-center"><a data-toggle="tooltip" data-placement="left" title="Reset user password" class="btn btn-xs btn-warning btn_rst_password_user" nama-user="${user.nama}" data-user="${user.user_id}"><strong>RESET</strong> <i class="fas fa-key"></i></a> | <a class="btn btn-xs btn-danger btn_user_delete" nama-user="${user.nama}" data-user="${user.user_id}"><i class="fas fa-trash-alt"></i></a></td>`;
                        }
                        html_usr += `</tr>`;
                    });
                } else {
                    html_usr += `<tr>`;
                    html_usr += `<td colspan="12" class="text-center"><br>`;
                    html_usr += `<div class='col-md-12'>`;
                    html_usr += `<div class='alert alert-warning alert-dismissible'>`;
                    html_usr += `<h4><i class='icon fa fa-warning'></i>Tidak ada data!</h4>`;
                    html_usr += `</div>`;
                    html_usr += `</div>`;
                    html_usr += `</td>`;
                    html_usr += `</tr>`;
                }
                $("#user_tbody").html(html_usr);
                $('.btn_rst_password_user').on('click', function() {
                    let user_id = $(this).attr("data-user");
                    let nama_user = $(this).attr("nama-user");
                    let table = 'user';

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `The password ${nama_user}, will reset to default. And the default password is "default123"!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, reset it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "<?= base_url() ?>user/reset_password",
                                data: {
                                    id: user_id,
                                    table: table
                                },
                                dataType: "json",
                                success: function(response) {
                                    // console.log(response)
                                    let title = ``;
                                    let msg = ``;
                                    let icon = ``;
                                    if (response.code === 200) {
                                        title = `Success`;
                                        icon = `success`;
                                    } else {
                                        title = `Error!`;
                                        icon = `error`;
                                    }
                                    Swal.fire(
                                        title,
                                        response.msg,
                                        icon
                                    )
                                    location.reload();
                                }
                            })
                        }
                    });

                });
                $('.btn_user_administrator').on('click', function() {
                    alert(`This user can't edited`);
                })
                $('.btn_user_active').on('click', function() {
                    let user_id = $(this).attr("data-user");
                    let status = $(this).attr("value");
                    let table = 'user';
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>user/ubah_status_aktif",
                        data: {
                            id: user_id,
                            status: status,
                            table: table
                        },
                        dataType: "json",
                        success: function(response) {
                            let status = response.data.is_active;
                            if (status === '1') {
                                status = 'Berhasil mengaktifkan user.'
                            } else {
                                status = 'User telah dinonaktifkan.'
                            }
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: status,
                                showConfirmButton: false,
                                timer: 2500
                            }).then(function(isConfirm) {
                                location.reload()
                            });
                        }
                    })
                });
                $('.btn_user_delete').on('click', function() {
                    let user_id = $(this).attr("data-user");
                    let nama_user = $(this).attr("nama-user");
                    let table = `user`;
                    Swal.fire({
                        title: 'Are you sure?',
                        text: `The ${nama_user} user, will delete!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "user/hapus_user", // where you wanna post
                                data: {
                                    id: user_id,
                                    table: table
                                },
                                dataType: "json",
                                success: function(response) {
                                    let title = ``;
                                    let msg = ``;
                                    let icon = ``;
                                    if (response.code === 200) {
                                        title = `Deleted`;
                                        icon = `success`;
                                    } else {
                                        title = `Error!`;
                                        icon = `error`;
                                    }
                                    Swal.fire(
                                        title,
                                        response.msg,
                                        icon
                                    )
                                    location.reload();
                                }
                            })
                        }
                    })
                });
            }
        });
        $("#form_add_user").submit(function(e) {
            e.preventDefault();
            let form = $(this);
            $.ajax({
                type: "POST",
                url: "<?= base_url() ?>/auth/process_registration",
                data: form.serializeArray(),
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    let icon = ``;
                    let title = ``;
                    let text = ``;
                    if (response.code === 200) {
                        icon = `success`;
                        title = `Success`;
                    } else {
                        icon = `error`;
                        title = `Error`;
                    }
                    Swal.fire({
                        icon: icon,
                        title: title,
                        text: response.msg,
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function(isConfirm) {
                        location.reload()
                    });
                }
            });
        });
    });
</script>