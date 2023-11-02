<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Ncr_performance.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rifqi Fadhillah
 *  Date Created          : 21/06/2022
 *  Quots of the code     : '---'
 */
class Ncr_performance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_user', 'user');
        $this->load->model('M_Envinvestigation', 'envinvestigation');
        $this->load->model('M_fireinvestigation', 'fireinvestigation');
        $this->load->model('M_investigation', 'investigation');
    }

    public function index()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['menu_header'] = 'NON-CONFORMITY & CORRECTIVE ACTION';
        $data['page'] = 'NCR & CA';
        $data['subpage'] = 'NCR Performance';
        $data['content'] = 'pages/ncr_ca/ncr_performance';
        $this->load->view('template', $data);
    }

    public function getDataRecord()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $env_jml = $this->envinvestigation->get_data()->num_rows();
            $fire_jml = $this->fireinvestigation->get_data()->num_rows();
            $accident_jml = $this->investigation->get_data()->num_rows();
            $datareq['total_accident'] = $env_jml + $fire_jml + $accident_jml;
            $datareq['detail'][0] = [
                'label' => 'Environment Abnormality',
                'jumlahdata' => $env_jml,
                'color' => '#2B7B70'
            ];
            $datareq['detail'][1] = [
                'label' => 'Accident of Fire',
                'jumlahdata' => $fire_jml,
                'color' => '#984242'
            ];
            $datareq['detail'][2] = [
                'label' => 'Accident of Employee',
                'jumlahdata' => $accident_jml,
                'color' => '#405987'
            ];

            $response = [
                'code' => 200,
                'status' => 'ok',
                'data' => $datareq,
                'message' => 'Success Request.',
            ];
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
}