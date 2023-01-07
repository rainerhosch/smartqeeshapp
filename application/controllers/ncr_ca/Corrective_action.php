<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Corrective_action.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 05/01/2023
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Corrective_action extends CI_Controller
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
        $data['menu_header'] = 'NON-CONFORMITY & CORRECTIVE ACTION';
        $data['page'] = 'NCR & CA';
        $data['subpage'] = 'Corrective Action';
        $data['content'] = 'pages/ncr_ca/ca_incident';
        $this->load->view('template', $data);
    }

    public function incident_investigation()
    {
        if ($this->input->is_ajax_request()) {

        } else {
            $response = [
                'code' => 500,
                'status' => 'error',
                'data' => null,
                'message' => 'Invalid Request Method.',
            ];
        }
        echo json_encode($response);
    }
    public function fire_investigation()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['menu_header'] = 'NON-CONFORMITY & CORRECTIVE ACTION';
        $data['page'] = 'NCR & CA';
        $data['subpage'] = 'Corrective Action';
        $data['content'] = 'pages/ncr_ca/ca_fire';
        $this->load->view('template', $data);
    }
    public function env_abnormality()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['menu_header'] = 'NON-CONFORMITY & CORRECTIVE ACTION';
        $data['page'] = 'NCR & CA';
        $data['subpage'] = 'Corrective Action';
        $data['content'] = 'pages/ncr_ca/ca_environment';
        $this->load->view('template', $data);
    }

}