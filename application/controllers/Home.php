<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Home.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 29/01/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'user');
    }

    public function index()
    {
        if ($this->session->userdata('user_id') === null) {
            redirect('Auth');
        } else {
            $data['title'] = 'Smart Qeesh App';
            $data['page'] = 'Home';
            $data['subpage'] = 'Blank Page';
            $contition = ['users.user_id' => $this->session->userdata('user_id')];
            $field = 'users.user_id, user_detail.*';
            $data['user'] = $this->user->get_user($field, $contition)->row_array();
            // $data['user_divisi'] = 'CT-HSE';
            $data['content'] = 'pages/risk_management/dashboard';
            $this->load->view('template', $data);
        }
    }
}
