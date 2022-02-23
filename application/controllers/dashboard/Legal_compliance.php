<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : risk_manj_performance.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 29/01/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Legal_compliance extends CI_Controller
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
        $data['content'] = 'pages/legal_compliance/dashboard';
        $this->load->view('template', $data);
    }
}
