<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Prog_manj_plan.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Muhamad Rizky Kholba
 *  Date Created          : 31/03/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Prog_manj_plan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_user', 'user');
    }

    public function index()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/risk_management/prog_manj_plan';
        $this->load->view('template', $data);
    }
}
