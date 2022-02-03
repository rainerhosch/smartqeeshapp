<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../../index3.html" class="brand-link">
        <img src="<?= base_url('assets/templates') ?>/img/smart_logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .9">
        <span class="brand-text font-weight-light"><strong>SmartQeesh APP</strong></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/templates') ?>/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user['nama']; ?></a>
                <small class="text-light text-center"><?= $user['jabatan']; ?> - <?= $user['divisi']; ?></small>
            </div>
            <div class="exit text-white">
                <a href="<?= base_url('auth/logout') ?>"><i class="nav-icon fas fa-sign-out-alt"></i></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column sidebar_menu" data-widget="treeview" role="menu" data-accordion="false">
                <!-- menu on jquery -->
            </ul>
        </nav>
    </div>
</aside>

<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>menu/get_user_access_menu",
            dataType: "json",
            success: function(response) {
                console.log(response.data)
                if (response.status === true) {
                    if (response.data != 0) {
                        let url = $(location).attr('href').split("/").splice(0, 5).join("/");
                        let segments = url.split('/');
                        console.log(segments[4]);
                        let html = ``;
                        let class_active = ``;
                        $.each(response.data, function(i, menu) {
                            html += `<li class="nav-header">${menu.nama_menu}</li>`;
                            if (menu.submenu != 0) {
                                $.each(menu.submenu, function(i, sm) {
                                    html += `<li class="nav-item">`;
                                    if (sm.nama_submenu === segments[4]) {
                                        html += `<a href="<?= base_url() ?>${sm.url}" class="nav-link active">`;
                                    } else {
                                        html += `<a href="<?= base_url() ?>${sm.url}" class="nav-link ">`;

                                    }
                                    html += `${sm.icon} `;
                                    html += `<p class="ml-3">${sm.nama_submenu}</p>`;
                                    html += `</a>`;
                                    html += `</li>`;
                                    html += `</li>`;
                                });
                            }
                        });
                        $(".sidebar_menu").html(html);
                    }
                }
            }
        });
    });
</script>