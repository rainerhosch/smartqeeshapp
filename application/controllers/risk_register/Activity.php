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
class Activity extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('/RiskRegister/M_dok_register', 'dokumen');
        $this->load->model('/RiskRegister/M_activity_risk_register', 'activity');
        $this->load->model('/Manajemen/M_Activity', 'activity_master');
        $this->load->model('M_user', 'user');
    }

    public function index()
    {
		$id 						= $this->input->get('id');
        $data['title'] 				= 'Smart Qeesh App';
        $data['page'] 				= 'Risk Register';
        $data['subpage'] 			= 'Blank Page';        
        $data['content'] 			= 'pages/risk_management/risk_register/activity';
		$data["intIdDokRegister"] 	= $id;		
		$data["user"]				= $this->user->getDataUserDept($this->session->userdata('user_id'));		
		$data["dok"]				= $this->dokumen->getByID($id);		
		$data["createBy"]			= $this->user->getDataUserDept($data["dok"]->intInsertedBy);				
		$data["activity"]			= $this->activity_master->getActivityBySection($this->session->userdata('id_section'));		
        $this->load->view('template', $data);
    }

	public function getDataTable()
	{
		echo json_encode($this->activity->get_datatables());
	}

	public function simpan()
	{
		$dateNow = date("Y-m-d");
		$data = [
			"intIdActivity" 			=> $this->input->post('intIdActivity'),
			"intIdDokRiskRegister" 		=> $this->input->post('intIdDokRiskRegister'),
			"intInsertedBy" 			=> $this->session->userdata('user_id'),
			"dtmInsertedDate" 			=> $dateNow
		];
		$this->activity->simpan($data);
		$response = [
						'code' => 200,
						'status' => true,
						'msg' => 'Berhasil disimpan.',
						'data' => "-"
					];
		echo json_encode($response);
	}
}
