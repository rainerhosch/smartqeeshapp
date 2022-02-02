<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : auth_helper.php
 *  File Type             : Helper
 *  File Package          : CI_Helper
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 02/02/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
function login_check()
{
    $ci = get_instance();
    if (!$ci->session->userdata('role')) {
        redirect('auth');
    } else {
        $user_id = $ci->session->userdata('role');
        $akses_menu = $ci->uri->segment(1);
        $getMenu = $ci->db->get_where('menu', ['nama_menu' => $akses_menu])->row_array();
        $menu_id = $getMenu['id_menu'];
        $hakAccessMenu = $ci->db->get_where('user_access_menu', [
            'role_id' => $user_id,
            'menu_id' => $menu_id
        ]);

        if ($hakAccessMenu->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
