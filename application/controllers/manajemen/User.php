<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : User.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 05/02/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
    }

    public function get_user()
    {
        if ($this->input->is_ajax_request()) {
            $contition = ['users.user_id' => $this->session->userdata('user_id')];
            $field = 'users.user_id, user_detail.*';
            $datauser = $this->user->get_user($field, $contition)->row_array();
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
}
