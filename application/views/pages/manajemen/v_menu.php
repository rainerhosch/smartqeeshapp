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
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>URL</th>
                                        <th>TIPE</th>
                                        <!-- <th>WARNA</th> -->
                                        <th>ICON</th>
                                        <th>AKTIF</th>
                                        <th>TOOL</th>
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
                    $.each(response.data, function(i, menu) {
                        html_mn += `<tr>`;
                        html_mn += `<td>${menu.nama_menu}</td>`;
                        html_mn += `<td>${menu.link_menu}</td>`;
                        html_mn += `<td>${menu.type}</td>`;
                        // html_mn += `<td><input type="color" id="menu_color" name="menu_color" value="${menu.color}"></td>`;
                        html_mn += `<td>${menu.icon}</td>`;
                        html_mn += `<td>`;
                        html_mn += `<label class="switch switch-primary">`;
                        if (menu.is_active === '1') {
                            checkbox_check = 'checked';
                        }
                        html_mn += `<input type="checkbox" ${checkbox_check} class="btn_menu_active" value="${menu.is_active}" data-menu="${menu.id_menu}"><span></span>`;
                        html_mn += `</label>`;
                        html_mn += `</td>`;
                        html_mn += `<td><a class="btn btn-xs btn-warning btn_menu_edit">Edit</a> | <a class="btn btn-xs btn-danger btn_menu_delete">Delete</a></td>`;
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
                            id_menu: id_menu,
                            status: status,
                            table: table
                        },
                        dataType: "json",
                        success: function(response) {
                            // console.log(response)
                            location.reload();
                        }
                    })
                })
            }
        });
    });
</script>