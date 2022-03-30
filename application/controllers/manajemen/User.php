<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : User.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah (Edited by Dimas Fauzan Tambah modul pilih section)
 *  Date Created          : 05/02/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_user', 'user');
        $this->load->model('Manajemen/M_plant', 'plant');
    }

    public function index()
    {
        // code here...
        $data['title'] 		= 'Smart Qeesh App';
        $data['page'] 		= 'Manajemen';
        $data['subpage'] 	= 'User';
        $data['content'] 	= 'pages/manajemen/v_user';
        $data['plant'] 		= $this->plant->getsPlantActive();
        $this->load->view('template', $data);
    }

    public function get_user()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post('method');
            $field = 'user.user_id, user.is_active, user_detail.*, user_role.role_type, id_section';
            if (isset($data_post) != 'get_all') {
                $condition = ['user.user_id' => $this->session->userdata('user_id')];
                $datauser = $this->user->get_user($field, $condition)->row_array();
            } else {
                $condition = null;
                $datauser = $this->user->get_user($field, $condition)->result_array();
            }
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => 'Data ditemukan.',
                'data' => $datauser
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
            $data = $this->user->update_data($tbl, $id, $dataUpdate);
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

    public function reset_password()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $tbl = $this->input->post('table');
            $pass = 'default123';
            $dataUpdate = [
                'password' => md5($pass)
            ];
            $reset = $this->user->update_data($tbl, $id, $dataUpdate);
            if ($reset) {
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Reset Password Berhasil',
                    'data' => $reset
                ];
            } else {
                $data = [
                    'code' => 500,
                    'status' => true,
                    'msg' => 'Gagal Reset Password!',
                    'data' => null
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

    public function hapus_user()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $table = $this->input->post('table');
            $field = $table . '_id';
            $where = [
                '' . $field . '' => $id
            ];
            $delete_tbl_user = $this->user->delete_data($table, $where);
            // $delete_tbl_user = true;
            if (!$delete_tbl_user) {
                $data = [
                    'code' => 300,
                    'status' => false,
                    'msg' => 'Gagal hapus menu.',
                    'data' => null
                ];
            } else {
                $table = 'user_detail';
                $field = $table . '_id';
                $where = [
                    '' . $field . '' => $id
                ];
                $delete_user_detail = $this->user->delete_data($table, $where);
                // $delete_user_detail = true;
                if (!$delete_user_detail) {
                    $data = [
                        'code' => 300,
                        'status' => false,
                        'msg' => 'Gagal hapus submenu.',
                        'data' => null
                    ];
                } else {
                    $data = [
                        'code' => 200,
                        'status' => true,
                        'msg' => 'Berhasil hapus menu.',
                        'data' => $where
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
}
