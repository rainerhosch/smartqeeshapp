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
    $user_id = $ci->session->userdata('user_id');
    if ($user_id === null) {
        $ci->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Anda tidak mempunyai akses, silahkan login!</div>');
        redirect('auth');
    }
}
