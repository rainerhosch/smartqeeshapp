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
            <div class="info user_profile">
                <!-- user profile from jquery -->
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
            url: "<?= base_url() ?>user/get_user",
            dataType: "json",
            success: function(response) {
                let htmlx = ``;
                if (response.status === true) {
                    let user = response.data;
                    htmlx += `<a href="#" class="d-block text-sm">${user.txtNameEmployee}</a>`;
                    // htmlx += `<small class="text-light text-center">${user.jabatan} - ${user.divisi}</small>`;
                }
                $(".user_profile").html(htmlx);
            }
        });



        // $.ajax({
        //     type: "POST",
        //     url: "<?= base_url() ?>menu/get_user_access_menu",
        //     dataType: "json",
        //     success: function(response) {
        //         if (response.status === true) {
        //             if (response.data != 0) {
        //                 let base_url = `<?= base_url(); ?>`;
        //                 let url = $(location).attr('href').split("/").splice(0, 10).join("/");
        //                 let segments = url.split('/');
        //                 let numb = segments.length - 1;
        //                 let html = ``;
        //                 let class_active = ``;
        //                 $.each(response.data, function(i, menu) {
        //                     if (menu.type != 'statis') {
        //                         html += `<li class="nav-header"><strong><a href="${base_url + menu.link_menu}">${menu.nama_menu}</a></strong></li>`;
        //                     } else {
        //                         html += `<li class="nav-header"><strong>${menu.nama_menu}</strong></li>`;
        //                         if (menu.submenu != 0) {
        //                             $.each(menu.submenu, function(i, sm) {
        //                                 let nm_submenu = sm.nama_submenu;
        //                                 nm_submenu = nm_submenu.replace(/ /g, "_");
        //                                 html += `<li class="nav-item">`;
        //                                 if (nm_submenu.toLowerCase() === segments[numb].toLowerCase()) {
        //                                     html += `<a href="<?= base_url() ?>${sm.url}" class="nav-link active">`;
        //                                 } else {
        //                                     html += `<a href="<?= base_url() ?>${sm.url}" class="nav-link ">`;
        //                                 }
        //                                 html += `${sm.icon} `;
        //                                 html += `<p class="ml-3">${sm.nama_submenu}</p>`;
        //                                 html += `</a>`;
        //                                 html += `</li>`;
        //                                 html += `</li>`;
        //                             });
        //                         }
        //                     }
        //                 });
        //                 $(".sidebar_menu").html(html);
        //             }
        //         }
        //     }
        // });
        
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>menu/get_user_access_menu",
            dataType: "json",
            success: function(response) {
                if (response.status === true) {
                    if (response.data != 0) {
                        let base_url = `<?= base_url(); ?>`;
                        let url = $(location).attr('href').split("/").splice(0, 10).join("/");
                        let segments = url.split('/');
                        console.log(segments);
                        let numb = segments.length - 1;
                        let html = ``;
                        let class_active = ``;
                        $.each(response.data, function(i, menu) {
                            // console.log(menu);
                            if (menu.type != 'statis') {
                                let activeMenu1 = `nav-item`;

                                if (segments[3] == menu.link_menu) {
                                    activeMenu1 = `nav-item menu-is-opening menu-open`;
                                }

                                html += `<li class="${activeMenu1}">`;
                                html += `<a href="${base_url + menu.link_menu}" class="nav-link">`;
                                html += `<p>`;
                                html += menu.nama_menu;
                                html += `</p>`;
                                html += `</a>`;
                                html += `</li>`;

                            } else {
                                let activeMenu2 = `nav-item`;

                                if (segments[3] == menu.link_menu) {
                                    activeMenu2 = `nav-item menu-is-opening menu-open`;
                                }

                                html += `<li class="${activeMenu2}">`;
                                html += `<a href="${base_url + menu.link_menu}" class="nav-link">`;
                                html += `<p> `;
                                html += menu.nama_menu;
                                html += `<i class="fas fa-angle-left right"></i>`;
                                html += `</p>`;
                                html += `</a>`;
                                html += `<ul class="nav nav-treeview">`;

                                if (menu.submenu != 0) {
                                    $.each(menu.submenu, function(i, sm) {
                                        let nm_submenu = sm.nama_submenu;
                                        nm_submenu = nm_submenu.replace(/ /g, "_");
                                        html += `<li class="nav-item">`;

                                        if (nm_submenu.toLowerCase() === segments[numb].toLowerCase()) {
                                            html += `<a href="<?= base_url() ?>${sm.url}" class="nav-link active">`;
                                        } else {
                                            html += `<a href="<?= base_url() ?>${sm.url}" class="nav-link ">`;
                                        }

                                        html += `${sm.icon} `;
                                        html += `<p class="ml-1">${sm.nama_submenu}</p>`;
                                        html += `</a>`;
                                        html += `</li>`;
                                    });
                                }
                                html += `</ul></li>`;
                            }

                        });
                        $(".sidebar_menu").html(html);
                    }
                }
            }
        });
    });
</script>
