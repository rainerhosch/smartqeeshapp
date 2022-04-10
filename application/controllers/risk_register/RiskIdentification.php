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
        $this->load->model('/RiskRegister/M_risk_context', 'risk_context');
    }

	public function getDataTable()
	{
		$intIdTahapanProsesRisk = $this->input->post('intIdTahapanProsesRisk');		
		echo json_encode($this->risk_context->get_datatables($intIdTahapanProsesRisk));
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
		$status = $this->risk_context->simpan_tahapan_baru($data);
		$response = [
						'code' => 200,
						'status' => $status,
						'msg' => 'Berhasil disimpan.',
						'data' => "-"
					];
		echo json_encode($response);
	}
}
