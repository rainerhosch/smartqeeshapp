<!-- Content Wrapper. Contains page content -->
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
                            <a class="btn btn-sm btn-primary btn_menu_add mb-2" data-toggle="modal" data-target="#modalAddMenu">Add Menu</a>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">NAMA</th>
                                        <th class="text-center">URL</th>
                                        <th class="text-center">TIPE</th>
                                        <th class="text-center">ICON</th>
                                        <th class="text-center">AKTIF</th>
                                        <th class="text-center">TOOL</th>
                                    </tr>
                                </thead>
                                <tbody id="menu_tbody">
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
<!-- modal add menu -->
<!-- Modal -->
<div class="modal fade" id="modalAddMenu" tabindex="-1" role="dialog" aria-labelledby="modalAddMenuTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_add_menu" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="nama_menu" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="Nama menu" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="url_menu" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="url_menu" name="url_menu" placeholder="Link/Url" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="icon_menu" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="icon_menu" name="icon_menu" placeholder="Icon Menu" required>
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
<!-- modal edit menu -->
<div class="modal fade" id="modalEditMenu" tabindex="-1" role="dialog" aria-labelledby="modalEditMenuTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_menu" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="nama_menu" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id_menu_edit" name="id_menu_edit">
                            <input type="text" class="form-control" id="nama_menu_edit" name="nama_menu_edit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="url_menu" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="url_menu_edit" name="url_menu_edit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="icon_menu" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="icon_menu_edit" name="icon_menu_edit">
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
            url: "<?= base_url() ?>menu/get_menu",
            dataType: "json",
            success: function(response) {
                // console.log(response)
                let html_mn = ``;
                let checkbox_check = ``;
                if (response.data != 0) {
                    let no = ``;
                    $.each(response.data, function(i, menu) {
                        no = i + 1;
                        html_mn += `<tr>`;
                        html_mn += `<td class="text-center">${no}</td>`;
                        html_mn += `<td class="text-center">${menu.nama_menu}</td>`;
                        html_mn += `<td class="text-center">${menu.link_menu}</td>`;
                        html_mn += `<td class="text-center">${menu.type}</td>`;
                        html_mn += `<td class="text-center">${menu.icon}</td>`;
                        html_mn += `<td class="text-center">`;
                        html_mn += `<label class="switch switch-primary">`;
                        if (menu.is_active === '1') {
                            checkbox_check = `checked`;
                        } else {
                            checkbox_check = ``;
                        }
                        html_mn += `<input type="checkbox" ${checkbox_check} class="btn_menu_active" value="${menu.is_active}" data-menu="${menu.id_menu}"><span></span>`;
                        html_mn += `</label>`;
                        html_mn += `</td>`;
                        html_mn += `<td class="text-center"><a class="btn btn-xs btn-warning btn_menu_edit" data-menu="${menu.id_menu}"><i class="fas fa-pen"></i></a> | <a class="btn btn-xs btn-danger btn_menu_delete" nama-menu="${menu.nama_menu}" data-menu="${menu.id_menu}"><i class="fas fa-trash-alt"></i></a></td>`;
                        html_mn += `</tr>`;
                    });
                } else {
                    html_mn += `<tr>`;
                    html_mn += `<td colspan="12" class="text-center"><br>`;
                    html_mn += `<div class='col-md-12'>`;
                    html_mn += `<div class='alert alert-warning alert-dismissible'>`;
                    html_mn += `<h4><i class='icon fa fa-warning'></i>Tidak ada data!</h4>`;
                    html_mn += `</div>`;
                    html_mn += `</div>`;
                    html_mn += `</td>`;
                    html_mn += `</tr>`;
                }
                $("#menu_tbody").html(html_mn);
                $('.btn_menu_active').on('click', function() {
                    let id_menu = $(this).attr("data-menu");
                    let status = $(this).attr("value");
                    let table = 'menu';
                    // console.log(id_menu)
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>menu/ubah_status_aktif",
                        data: {
                            id: id_menu,
                            status: status,
                            table: table
                        },
                        dataType: "json",
                        success: function(response) {
                            let status = response.data.is_active;
                            // console.log(status)
                            if (status === '1') {
                                status = 'Berhasil mengaktifkan menu.'
                            } else {
                                status = 'Menu telah dinonaktifkan.'
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
                $("#form_add_menu").submit(function(e) {
                    e.preventDefault();
                    let form = $(this);
                    $.ajax({
                        type: "POST",
                        url: "menu/simpan_menu",
                        data: form.serializeArray(),
                        dataType: "json",
                        success: function(response) {
                            // console.log(response);
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
                $('.btn_menu_edit').on('click', function() {
                    let id_menu = $(this).attr("data-menu");
                    if (id_menu == "") {
                        alert("Error in id user");
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "menu/get_menu",
                            data: {
                                id_menu: id_menu,
                            },
                            dataType: "json",
                            success: function(response) {
                                // console.log(response)
                                $('#modalEditMenu').modal("show");
                                $("#id_menu_edit").val(response.data.id_menu);
                                $("#nama_menu_edit").val(response.data.nama_menu);
                                $("#url_menu_edit").val(response.data.link_menu);
                                $("#icon_menu_edit").val(response.data.icon);
                            }
                        })
                    }
                });
                $("#form_edit_menu").submit(function(e) {
                    e.preventDefault();
                    let form = $(this);
                    $.ajax({
                        type: "POST",
                        url: "menu/simpan_menu", // where you wanna post
                        data: form.serialize(), // serializes form input,
                        dataType: "json",
                        success: function(response) {
                            // console.log(response);
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

                $('.btn_menu_delete').on('click', function() {
                    let id_menu = $(this).attr("data-menu");
                    let nama_menu = $(this).attr("nama-menu");
                    let table = `menu`;
                    Swal.fire({
                        title: 'Are you sure?',
                        text: `The ${nama_menu} menu, will delete!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "menu/hapus_menu", // where you wanna post
                                data: {
                                    id: id_menu,
                                    table: table
                                },
                                dataType: "json",
                                success: function(response) {
                                    // console.log(response)
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
    });
</script>