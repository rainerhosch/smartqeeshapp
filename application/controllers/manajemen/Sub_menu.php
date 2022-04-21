<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Sub_menu.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 07/02/2020
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Sub_menu extends CI_Controller
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
        $data['subpage'] = 'Submenu';
        $data['content'] = 'pages/manajemen/v_submenu';
        $this->load->view('template', $data);
    }

    public function get_submenu()
    {
        // code here...
        if ($this->input->is_ajax_request()) {
            $input = $this->input->post('id_submenu');
            $datamenu = [];
            $code = '';
            $status = '';

            if ($input != null) {
                // $condition = ['id_menu' => $input];
                $datamenu = $this->menu->get_all_submenu_editable(['id_submenu' => $input])->row_array();
                if (!$datamenu) {
                    $code = 404;
                    $status = false;
                } else {
                    $code = 200;
                    $status = true;
                }
            } else {
                // $condition = null;
                $datamenu = $this->menu->get_all_submenu_editable()->result_array();
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

    public function simpan_submenu()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $table = 'submenu';
            $data = [];
            if (isset($data_post['id_submenu_edit']) != null) {
                $data_input = [
                    'id_menu'           => $data_post['menu_parent'],
                    'nama_submenu'      => $data_post['nama_submenu_edit'],
                    'url'               => $data_post['url_submenu_edit'],
                    'icon'              => $data_post['icon_submenu_edit'],
                    'is_active'         => 1,
                ];
                $save_data =  $this->menu->updateMenu($table, $data_post['id_submenu_edit'], $data_input);
                if ($save_data) {
                    $data = [
                        'code' => 200,
                        'status' => true,
                        'msg' => 'Submenu berhasi di update.',
                        'data' => $save_data
                    ];
                } else {
                    $data = [
                        'code' => 500,
                        'status' => false,
                        'msg' => 'Submenu gagal di edit.',
                        'data' => $save_data
                    ];
                }
            } else {
                $data_input = [
                    'id_menu'           => $data_post['menu_parent'],
                    'nama_submenu'      => $data_post['nama_submenu'],
                    'url'               => $data_post['url_submenu'],
                    'icon'              => $data_post['icon_submenu'],
                    'is_active'         => 1,
                ];
                $save_data =  $this->menu->addData($table, $data_input);
                if ($save_data) {
                    $data = [
                        'code' => 200,
                        'status' => true,
                        'msg' => 'Submenu berhasil di tambahkan.',
                        'data' => null
                    ];
                } else {
                    $data = [
                        'code' => 500,
                        'status' => false,
                        'msg' => 'Gagal menambahkan submenu.',
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

    public function hapus_submenu()
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
                    'msg' => 'Gagal hapus submenu.',
                    'data' => $deleted
                ];
            } else {
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Berhasil hapus submenu.',
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
