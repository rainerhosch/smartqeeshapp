<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Auth.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 27/01/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
    }

    public function index()
    {
        redirect('auth/login');
    }

    public function login()
    {
        // code here...
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Auth';
        $data['content'] = 'pages/v_login';
        $this->load->view('template', $data);
    }

    public function process_login()
    {
        if ($this->input->is_ajax_request()) {
            $email_or_username = $this->input->post('email_or_username');
            $password = $this->input->post('password');
            $field = 'user.user_id,user.username, user.password, user.is_active, user_detail.*';
            $contition = "user.username='" . $email_or_username . "' OR user_detail.email='" . $email_or_username . "'";
            $data_user = $this->user->get_user($field, $contition)->row_array();
            if ($data_user != null) {
                // cek password
                if ($data_user['password'] === md5($password)) {
                    if ($data_user['is_active'] > 0) {
                        $session_login = [
<<<<<<< HEAD
                            'user_id' => $data_user['user_id'],
=======
                            'user_id' 		=> $data_user['user_id'],
>>>>>>> 7874b071a59bfea3d2757dcb77e6117cefbec27b
                            'id_departemen' => $data_user['id_departemen'],
                        ];
                        $this->session->set_userdata($session_login);
                        $data_user = $session_login;
                        $data = [
                            'code' => 200,
                            'status' => true,
                            'msg' => 'Berhasil login.',
                            'data' => $data_user
                        ];
                    } else {
                        $data = [
                            'code' => 402,
                            'status' => false,
                            'msg' => 'Akun Belum Aktif.',
                            'data' => null
                        ];
                    }
                } else {
                    $data = [
                        'code' => 403,
                        'status' => false,
                        'msg' => 'Password salah.',
                        'data' => null
                    ];
                }
            } else {
                $data = [
                    'code' => 404,
                    'status' => false,
                    'msg' => 'Akun tidak ditemukan!',
                    'data' => $data_user
                ];
            }
        } else {
            $data = [
                'code' => 500,
                'status' => false,
                'msh' => 'Invalid request',
                'data' => null
            ];
        }
        echo json_encode($data);
    }

    public function registration()
    {
        // code here...
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Auth';
        $data['content'] = 'pages/v_registration';
        $this->load->view('template', $data);
    }

    public function process_registration()
    {
        if ($this->input->is_ajax_request()) {
            $curent_time = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
            $date = $curent_time->format('Y-m-d');
            $post_regist = $this->input->post();


            // data insert user detail
            $tbl = 'user_detail';
            $data_detail_user = [
                'nama'      	=> $post_regist['nama_user'],
                'email'     	=> $post_regist['email_user'],
                'divisi'    	=> "-",
                'jabatan'   	=> $post_regist['jabatan_user'],
                'id_departemen' => $post_regist['id_departemen'],
                'tlp'       	=> 62,
                'img'       	=> 'default.jpg'
            ];

            $id_detail_user = $this->user->insert_data($tbl, $data_detail_user);
            if (!$id_detail_user) {
                // error
                $data = [
                    'code' => 500,
                    'status' => false,
                    'msh' => 'Gagal insert data user detail.',
                    'data' => null
                ];
            } else {
                $tbl = 'user';
                $data_user_regist = [
                    'username'          => $post_regist['username'],
                    'password'          => md5($post_regist['password']),
                    'date_created'      => strtotime($date),
                    'role_id'           => 2,
                    'user_detail_id'    => $id_detail_user,
                    'is_active'         => 0
                ];
                $insert_user = $this->user->insert_data($tbl, $data_user_regist);
                if (!$insert_user) {
                    $data = [
                        'code' => 500,
                        'status' => false,
                        'msh' => 'Gagal insert data user.',
                        'data' => null
                    ];
                } else {
                    $data = [
                        'code' => 200,
                        'status' => true,
                        'msg' => 'Data registarsi berhasil di simpan.',
                        'data' => $post_regist['nama_user'],
                    ];
                }
            }
        } else {
            $data = [
                'code' => 500,
                'status' => false,
                'msh' => 'Invalid request',
                'data' => null
            ];
        }
        echo json_encode($data);
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Berhasil Logout!</div>');
        redirect('Auth');
    }
}
