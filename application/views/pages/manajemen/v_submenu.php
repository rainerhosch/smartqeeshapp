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
                            <a class="btn btn-sm btn-primary btn_submenu_add mb-2" data-toggle="modal" data-target="#modalAddSubmenu">Add Submenu</a>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">PARENT MENU</th>
                                        <th class="text-center">NAMA SUBMENU</th>
                                        <th class="text-center">URL</th>
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
<div class="modal fade" id="modalAddSubmenu" tabindex="-1" role="dialog" aria-labelledby="modalAddSubmenuTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Submenu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_add_submenu" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="menu_parent" class="col-sm-2 col-form-label">Menu Parent</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="menu_parent" name="menu_parent">
                                <option value="x">- Pilih Menu -</option>
                                <?php $menu = $this->menu->get_all_menu(['is_active' => 1])->result_array();
                                foreach ($menu as $mn) : ?><option class="<?= $mn['id_menu'] ?>" value="<?= $mn['id_menu'] ?>"><?= $mn['nama_menu'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_submenu" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_submenu" name="nama_submenu" placeholder="Nama submenu" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="url_submenu" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="url_submenu" name="url_submenu" placeholder="url_menu/url_submenu" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="icon_submenu" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="icon_submenu" name="icon_submenu" placeholder="Icon submenu" required>
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
<div class="modal fade" id="modalEditSubmenu" tabindex="-1" role="dialog" aria-labelledby="modalEditSubmenuTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit_submenu" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="menu_parent_edit" class="col-sm-2 col-form-label">Menu Parent</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="menu_parent_edit" name="menu_parent_edit" disabled>
                                <option value="x">- Pilih Menu -</option>
                                <?php $menu = $this->menu->get_all_menu()->result_array();
                                foreach ($menu as $mn) : ?><option class="<?= $mn['id_menu'] ?>" value="<?= $mn['id_menu'] ?>"><?= $mn['nama_menu'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_submenu" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id_submenu_edit" name="id_submenu_edit">
                            <input type="text" class="form-control" id="nama_submenu_edit" name="nama_submenu_edit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="url_submenu" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="url_submenu_edit" name="url_submenu_edit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="icon_submenu" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="icon_submenu_edit" name="icon_submenu_edit">
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
            url: "<?= base_url() ?>submenu/get_submenu",
            dataType: "json",
            success: function(response) {
                // console.log(response)
                let html_mn = ``;
                let checkbox_check = ``;
                if (response.data != 0) {
                    let no = ``;
                    $.each(response.data, function(i, submenu) {
                        no = i + 1;
                        html_mn += `<tr>`;
                        html_mn += `<td class="text-center">${no}</td>`;
                        html_mn += `<td class="text-center">${submenu.nama_menu}</td>`;
                        html_mn += `<td class="text-center">${submenu.nama_submenu}</td>`;
                        html_mn += `<td class="text-center">${submenu.url}</td>`;
                        html_mn += `<td class="text-center">${submenu.icon}</td>`;
                        html_mn += `<td class="text-center">`;
                        html_mn += `<label class="switch switch-primary">`;
                        if (submenu.is_active === '1') {
                            checkbox_check = `checked`;
                        } else {
                            checkbox_check = ``;
                        }
                        html_mn += `<input type="checkbox" class="btn_submenu_active" value="${submenu.is_active}" data-submenu="${submenu.id_submenu}" ${checkbox_check}><span></span>`;
                        html_mn += `</label>`;
                        html_mn += `</td>`;
                        html_mn += `<td class="text-center"><a class="btn btn-xs btn-warning btn_submenu_edit" data-submenu="${submenu.id_submenu}"><i class="fas fa-pen"></i></a> | <a class="btn btn-xs btn-danger btn_submenu_delete" nama-submenu="${submenu.nama_submenu}" data-submenu="${submenu.id_submenu}"><i class="fas fa-trash-alt"></i></a></td>`;
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
                $('.btn_submenu_active').on('click', function() {
                    let id_submenu = $(this).attr("data-submenu");
                    let status = $(this).attr("value");
                    let table = 'submenu';
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>menu/ubah_status_aktif",
                        data: {
                            id: id_submenu,
                            status: status,
                            table: table
                        },
                        dataType: "json",
                        success: function(response) {
                            // console.log(response)
                            location.reload();
                        }
                    })
                });


                $("#form_add_submenu").submit(function(e) {
                    e.preventDefault();
                    let form = $(this);
                    $.ajax({
                        type: "POST",
                        url: "submenu/simpan_submenu",
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

                $('.btn_submenu_edit').on('click', function() {
                    let id_submenu = $(this).attr("data-submenu");
                    if (id_submenu == "") {
                        alert("Error in id submenu");
                    } else {
                        $.ajax({
                            type: "POST",
                            url: "submenu/get_submenu",
                            data: {
                                id_submenu: id_submenu,
                            },
                            dataType: "json",
                            success: function(response) {
                                // console.log(response)
                                $('#modalEditSubmenu').modal("show");
                                $("#menu_parent_edit").val(response.data.id_menu);
                                $("#id_submenu_edit").val(response.data.id_submenu);
                                $("#nama_submenu_edit").val(response.data.nama_submenu);
                                $("#url_submenu_edit").val(response.data.url);
                                $("#icon_submenu_edit").val(response.data.icon);
                            }
                        })
                    }
                });

                $("#form_edit_submenu").submit(function(e) {
                    e.preventDefault();
                    let form = $(this);
                    $.ajax({
                        type: "POST",
                        url: "submenu/simpan_submenu",
                        data: form.serializeArray(),
                        dataType: "json",
                        success: function(response) {
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

                $('.btn_submenu_delete').on('click', function() {
                    let id_submenu = $(this).attr("data-submenu");
                    let nama_submenu = $(this).attr("nama-submenu");
                    let table = `submenu`;
                    Swal.fire({
                        title: 'Are you sure?',
                        text: `The ${nama_submenu} submenu, will delete!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "submenu/hapus_submenu", // where you wanna post
                                data: {
                                    id: id_submenu,
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