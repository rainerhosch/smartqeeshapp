<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Apf_performance.php.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 29/01/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Apf_performance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_user', 'user');
    }


    public function low_risk()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        $data['content'] = 'pages/risk_management/apf_perf_low_risk';
        $this->load->view('template', $data);
    }
    public function medium_risk()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        $data['content'] = 'pages/risk_management/apf_perf_medium_risk';
        $this->load->view('template', $data);
    }

    public function hard_risk()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        $data['content'] = 'pages/risk_management/apf_perf_hard_risk';
        $this->load->view('template', $data);
    }

    public function extreme_risk()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        $data['content'] = 'pages/risk_management/apf_perf_extreme_risk';
        $this->load->view('template', $data);
    }
}
