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
class Input_new_risk_register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_user', 'user');
        $this->load->model('RiskRegister/M_risk_type');
        $this->load->model('RiskRegister/M_risk_category');
        $this->load->model('RiskRegister/M_risk_condition');
    }

    public function index()
    {
        $data['title'] = 'Activity List';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/risk_management/input_activity_list';
        $this->load->view('template', $data);
    }

    public function table_activity()
    {
        $data['title'] = 'Table Data Activity';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/risk_management/input_table_activity';
        $this->load->view('template', $data);
    }

    public function form_filled()
    {
        $data['title'] = 'Form Filled';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/risk_management/input_form_filled';
        $data['risk_type'] = $this->M_risk_type->getType();
        $data['risk_category']  = $this->M_risk_category->getType();
        $data['risk_condition']  = $this->M_risk_condition->getType();
        $this->load->view('template', $data);
    }

    public function table_data()
    {
        $data['title'] = 'Table Data';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/risk_management/input_table_data';
        $this->load->view('template', $data);
    }
}
