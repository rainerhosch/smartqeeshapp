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
class TahapanProses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('/RiskRegister/M_tahapan_proses_risk', 'tahapan_proses');
    }

	public function getDataTable()
	{
		$intIdActivityRisk 	= $this->input->post('intIdActivityRisk');		
		$intIdActivity 		= $this->input->post('intIdActivity');		
		echo json_encode($this->tahapan_proses->get_datatables($intIdActivityRisk, $intIdActivity));
	}

	public function simpan()
	{
		$dateNow = date("Y-m-d");
		$data = [
			"intIdActivityRisk" 		=> $this->input->post('intIdActivityRisk'),
			"intIdActivity" 			=> $this->input->post('intIdActivity'),
			"txtTahapanProses" 			=> strtoupper($this->input->post('txtTahapanProses')),
			"txtInsertedBy" 			=> $this->session->userdata('user_id'),
			"dtmInsertedDate" 			=> $dateNow,
			"intIdDepartemen"			=> $this->session->userdata('id_departemen')
		];
		$status = $this->tahapan_proses->simpan_tahapan_baru($data);
		$response = [
						'code' => 200,
						'status' => $status,
						'msg' => 'Berhasil disimpan.',
						'data' => "-"
					];
		echo json_encode($response);
	}

	public function cekTahapan () {
		$dateNow = date("Y-m-d");
		$data = [
			"intIdActivityRisk" 		=> $this->input->get('intIdActivityRisk'),
			"intIdTahapanProses" 		=> $this->input->get('id'),
			"intInsertedBy" 			=> $this->session->userdata('user_id'),
			"dtmInsertedDate" 			=> $dateNow
		];
		$data = $this->tahapan_proses->cekTahapan($data);
		$response = [
						'code' => 200,
						'status' => true,
						'msg' => '',
						'data' => $data
					];
		echo json_encode($response);
	}

	public function cekTahapanHasInput()
	{
		$where = [
			"intIdTahapanProses" 	=> $this->input->get('intIdTahapanProses'),			
			"intIdActivityRisk"		=> $this->input->get('intIdActivityRisk'),			
		];
		$response = [
						'code' => 200,
						'status' => '',
						'msg' => 'Berhasil disimpan.',
						'data' => $this->tahapan_proses->cek_tahapan_risk($where)
					];
		echo json_encode($response);
	}
}
