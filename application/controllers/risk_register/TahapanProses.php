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
		$intIdActivityRisk = $this->input->post('intIdActivityRisk');		
		echo json_encode($this->tahapan_proses->get_datatables($intIdActivityRisk));
	}

	public function simpan()
	{
		$dateNow = date("yyyy-mm-dd");
		$data = [
			"txtDocNumber" 		=> $this->input->post('txtDocNumber'),
			"txtInsertedBy" 	=> $this->session->userdata('user_id'),
			"dtmInsertedDate" 	=> $dateNow
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
