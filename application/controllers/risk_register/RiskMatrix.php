<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : RiskMatrix.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Dimas Fauzan
 *  Date Created          : 16/04/2022
 *  Quots of the code     : Kadang susah kalo udah nyaman sama framework sebelah :D
 */
class RiskMatrix extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('Manajemen/M_risk_matrix', 'risk_matrix');
        $this->load->model('M_user', 'user');
    }

	public function calculateRiskAssesment()
	{		
		$where = [
			"intLikelihoodNumber" 		=> $this->input->get('intLikelihoodNumber'),
			"intTingkatKlasifikasi" 	=> $this->input->get('intTingkatKlasifikasi'),			
		];
		$data = $this->risk_matrix->getMatrix($where)->row();
		$response = [
						'code' => 200,
						'status' => true,
						'msg' => '-',
						'data' => $data
					];
		echo json_encode($response);
	}
}
