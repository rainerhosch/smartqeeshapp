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
        login_check();
        $this->load->model('M_user', 'user');
        $this->load->model('M_menu', 'menu');
    }

    public function index()
    {
        // code here...
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Menu';
        $data['content'] = 'pages/manajemen/v_menu';
        $this->load->view('template', $data);
    }

    public function get_menu()
    {
        // code here...
        if ($this->input->is_ajax_request()) {
            $datamenu = $this->menu->get_all_menu()->result_array();
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => 'Data Menu.',
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
            $menu_access = $this->menu->get_user_access_menu($condition_menu)->result_array();
            foreach ($menu_access as $i => $mn) {
                $menu_access[$i]['submenu'] = $this->menu->get_all_submenu(['m.id_menu' => $mn['id_menu'], 'sm.is_active' => 1])->result_array();
            }
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => 'Data ditemukan.',
                'data' => $menu_access
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

    public function ubah_status_aktif()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $is_active = $this->input->post('status');
            $tbl = $this->input->post('table');
            if ($is_active != '1') {
                $is_active = 1;
            } else {
                $is_active = 0;
            }
            $dataUpdate = [
                'is_active' => $is_active
            ];
            $data = $this->menu->updateMenu($tbl, $id, $dataUpdate);
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => 'Success',
                'data' => $dataUpdate
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
