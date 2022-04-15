<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : TahapamProses.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Dimas Fauzan
 *  Date Created          : 23/03/2022
 *  Quots of the code     : Kadang susah kalo udah nyaman sama framework sebelah :D
 */
class RiskIdentification extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('/RiskRegister/M_risk_identification', 'risk_iden');
		$this->load->model('M_risk_condition', 'risk_condition');
		$this->load->model('M_risk_category', 'risk_category');
		$this->load->model('M_risk_type', 'risk_type');
		$this->load->model('M_likelihood', 'likelihood');
		$this->load->model("manajemen/M_RiskConsequence", "riskconsequence");
    }

	public function getDataTable()
	{
		$intIdTrRiskContext = $this->input->post('intIdTrRiskContext');		
		echo json_encode($this->risk_iden->get_datatables($intIdTrRiskContext));
	}

	public function simpan()
	{
		$dateNow = date("Y-m-d");
		$data = [
			"intIdTahapanProsesRisk" 	=> $this->input->post('intIdTahapanProsesRisk'),
			"txtNamaContext" 			=> strtoupper($this->input->post('txtNamaContext')),
			"intInsertedBy" 			=> $this->session->userdata('user_id'),
			"dtmInsertedDate" 			=> $dateNow
		];
		$status = $this->risk_iden->simpan_tahapan_baru($data);
		$response = [
						'code' => 200,
						'status' => $status,
						'msg' => 'Berhasil disimpan.',
						'data' => "-"
					];
		echo json_encode($response);
	}

	function iniateForm ()
	{
		$data['risk_type'] 			= $this->risk_type->get()->result();
		$data['risk_condition'] 	= $this->risk_condition->get()->result();
		$data['risk_category'] 		= $this->risk_category->get()->result();
		$data['likelihood'] 		= $this->likelihood->get()->result_array();
		$data['consequence'] 		= $this->riskconsequence->getsRiskConsequenceActive();
		$response = [
						'code' => 200,
						'status' => 'OK',
						'msg' => '-',
						'data' => $data
					];
		echo json_encode($response);
	}
}
