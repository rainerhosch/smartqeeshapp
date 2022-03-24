<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Dokumen.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Dimas Fauzan
 *  Date Created          : 23/03/2022
 *  Quots of the code     : Kadang susah kalo udah nyaman sama framework sebelah :D
 */
class Dokumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('/RiskRegister/M_dok_register', 'dokumen');
    }

    public function index()
    {
        $data['title'] 		= 'Smart Qeesh App';
        $data['page'] 		= 'Risk Register';
        $data['subpage'] 	= 'Blank Page';        
        $data['content'] 	= 'pages/risk_management/risk_register/dokumen';
        $this->load->view('template', $data);
    }

	public function getDataTable()
	{
		echo json_encode($this->dokumen->get_datatables());
	}

	public function simpan()
	{
		$data = [
			"txtDocNumber" 		=> $this->input->post('txtDocNumber'),
			"txtInsertedBy" 	=> $this->session->userdata('user_id'),
			"dtmInsertedDate" 	=> $this->dateNow
		];
		$this->dokumen->simpan ($data);
		$response = [
						'code' => 200,
						'status' => true,
						'msg' => 'Berhasil disimpan.',
						'data' => "-"
					];
		echo json_encode($response);
	}
}
