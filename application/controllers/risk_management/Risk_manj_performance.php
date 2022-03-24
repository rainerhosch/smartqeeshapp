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
class Risk_manj_performance extends CI_Controller
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
        $data['content'] = 'pages/risk_management/risk_man_perf';
        $this->load->view('template', $data);
    }

    public function low_risk()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        $data['content'] = 'pages/risk_management/risk_man_perf_low_risk';
        $this->load->view('template', $data);
    }
    public function medium_risk()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        $data['content'] = 'pages/risk_management/risk_man_perf_medium_risk';
        $this->load->view('template', $data);
    }

    public function hard_risk()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        $data['content'] = 'pages/risk_management/risk_man_perf_hard_risk';
        $this->load->view('template', $data);
    }

    public function extreme_risk()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        $data['content'] = 'pages/risk_management/risk_man_perf_extreme_risk';
        $this->load->view('template', $data);
    }
}
