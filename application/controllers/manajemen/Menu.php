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
            $input = $this->input->post('id_menu');
            $datamenu = [];
            $code = '';
            $status = '';
            if ($input != null) {
                // $condition = ['id_menu' => $input];
                $datamenu = $this->menu->get_all_menu(['id_menu' => $input])->row_array();
                if (!$datamenu) {
                    $code = 404;
                    $status = false;
                } else {
                    $code = 200;
                    $status = true;
                }
            } else {
                // $condition = null;
                $datamenu = $this->menu->get_all_menu()->result_array();
                if (!$datamenu) {
                    $code = 404;
                    $status = false;
                } else {
                    $code = 200;
                    $status = true;
                }
            }
            $data = [
                'code' => $code,
                'status' => $status,
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
            $field = 'user.role_id';
            $condition = [
                'user.user_id' => $id_user
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

    public function simpan_menu()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $table = 'menu';
            $data = [];
            if (isset($data_post['id_menu_edit']) != null) {
                $data_input = [
                    'nama_menu'     => $data_post['nama_menu_edit'],
                    'link_menu'     => $data_post['url_menu_edit'],
                    'type'          => 'statis',
                    'color'         => 'FFF',
                    'icon'          => $data_post['icon_menu_edit'],
                    'is_active'     => 1,
                    'editable'      => 'YES'
                ];
                $save_data =  $this->menu->updateMenu($table, $data_post['id_menu_edit'], $data_input);
                if ($save_data) {
                    $data = [
                        'code' => 200,
                        'status' => true,
                        'msg' => 'Menu berhasi di update.',
                        'data' => $save_data
                    ];
                } else {
                    $data = [
                        'code' => 500,
                        'status' => false,
                        'msg' => 'Menu gagal di edit.',
                        'data' => $save_data
                    ];
                }
            } else {
                $data_input = [
                    'nama_menu'     => $data_post['nama_menu'],
                    'link_menu'     => $data_post['url_menu'],
                    'type'          => 'statis',
                    'color'         => 'FFF',
                    'icon'          => $data_post['icon_menu'],
                    'is_active'     => 1,
                    'editable'      => 'YES'
                ];
                $save_data =  $this->menu->addData($table, $data_input);
                if ($save_data) {
                    $data = [
                        'code' => 200,
                        'status' => true,
                        'msg' => 'Menu berhasil di tambahkan.',
                        'data' => null
                    ];
                } else {
                    $data = [
                        'code' => 500,
                        'status' => false,
                        'msg' => 'Gagal menambahkan menu.',
                        'data' => null
                    ];
                }
            }
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

    public function hapus_menu()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $table = $this->input->post('table');
            $field = 'id_' . $table;
            $where = [
                '' . $field . '' => $id
            ];
            $deleted = $this->menu->delete_data($table, $where);
            if (!$deleted) {
                $data = [
                    'code' => 300,
                    'status' => false,
                    'msg' => 'Gagal hapus menu.',
                    'data' => $deleted
                ];
            } else {
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Berhasil hapus menu.',
                    'data' => $deleted
                ];
            }
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
