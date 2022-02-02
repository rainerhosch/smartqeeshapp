<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Menu.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 02/02/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
        $this->load->model('M_menu', 'menu');
    }

    public function get_menu()
    {
        // code here...
    }

    public function get_user_access_menu()
    {
        // code here...
        if ($this->input->is_ajax_request()) {
            $id_user = $this->session->userdata('user_id');
            $field = 'users.role_id';
            $condition = [
                'users.user_id' => $id_user
            ];
            $data_user = $this->user->get_user($field, $condition)->row_array();

            $condition_menu = [
                'ur.role_id' => $data_user['role_id'],
                'mn.is_active' => 1
            ];
            $datamenu = $this->menu->get_user_access_menu($condition_menu)->result_array();
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => 'Data ditemukan.',
                'data' => $datamenu
            ];
        } else {
            $data = [
                'code' => 500,
                'status' => false,
                'msg' => 'Invalid request.',
                'data' => null
            ];
        }
        echo json_encode($data);
    }
}
