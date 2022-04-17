<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : RiskIdentification.php
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
        $this->load->model('/RiskRegister/M_revaluation_risk', 'risk_revaluation');
		$this->load->model('M_risk_condition', 'risk_condition');
		$this->load->model('M_risk_category', 'risk_category');
		$this->load->model('M_risk_type', 'risk_type');
		$this->load->model('M_likelihood', 'likelihood');
		$this->load->model("manajemen/M_RiskConsequence", "riskconsequence");		
    }

	public function upload_config_iden($imgpath, $filetype)
    {
        $config['upload_path'] = $imgpath;
        $config['allowed_types'] = $filetype;
        // $config['encrypt_name'] = TRUE;
        $config['file_name'] = 'evidance_' . time();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    }


	public function getDataTable()
	{
		$intIdTrRiskContext = $this->input->post('intIdTrRiskContext');		
		echo json_encode($this->risk_iden->get_datatables($intIdTrRiskContext));
	}

	public function simpan()
	{
		header('Content-Type: text/html; charset=UTF-8');
		//iniate upload evidence
		$this->upload_config_iden('./upload_file/evidence_risk_register','gif|jpg|png|pdf|xlsx|docx|xls|doc|jpeg|bmp');
		$attr_file 		= 'txtFileEvidance';
		$file_upload 	= $this->upload->do_upload($attr_file);
		$datetime 		= date('Y-m-d H:i:s');
		// var_dump($file_upload);exit;
		if ($file_upload) {
			$file_iden 		= $this->upload->data();
            $nama_file_iden = $file_iden['file_name'];
			$data = [
				"intIdTrRiskContext" 			=> $this->input->post("intIdTrRiskContext"),
				"txtSourceRiskIden" 			=> $this->input->post("txtSourceRiskIden"),
				"txtRiskAnalysis" 				=> $this->input->post("txtRiskAnalysis"),
				"txtRiskType" 					=> $this->input->post("txtRiskType"),
				"txtRiskCategory" 				=> $this->input->post("txtRiskCategory"),
				"txtRiskCondition" 				=> $this->input->post("txtRiskCondition"),
				"txtRiskTreatmentCurrent" 		=> $this->input->post("txtRiskTreatmentCurrent"),
				"intConsequence" 				=> $this->input->post("intConsequence"),
				"txtRiskLevel" 					=> $this->input->post("txtRiskLevel"),
				"intLikelihood" 				=> $this->input->post("intLikelihood"),
				"bitStatusKepentingan" 			=> $this->input->post("bitStatusKepentingan"), // ini risk status sesuai bahasa di excel
				"txtRiskOwner" 					=> $this->input->post("txtRiskOwner"),
				"txtRiskTreatmentFuture" 		=> $this->input->post("txtRiskTreatmentFuture"),
				"txtRiskPriorityConsideration" 	=> $this->input->post("txtRiskPriorityConsideration"),
				"txtImprovement" 				=> $this->input->post("txtImprovement"),
				"charRiskPriority" 				=> $this->input->post("charRiskPriority"),
				"txtStatusImplementation" 		=> $this->input->post("txtStatusImplementation"),
				"intTimePlantMonth" 			=> $this->input->post("intTimePlantMonth"),
				"intTimePlantYear" 				=> $this->input->post("intTimePlantYear"),
				"bitLastStatusRiskRegister" 	=> $this->input->post("bitStatusKepentingan"),												
				"txtLastRiskLevel" 				=> $this->input->post("txtRiskLevel"),												
				"txtFileEvidance" 				=> $nama_file_iden,
				"dtmInsertedDate"				=> $datetime
			];
			$data = $this->risk_iden->simpan_tahapan_baru($data);
			$response = [
							'code' => 200,
							'status' => "OK",
							'msg' => 'Berhasil disimpan.',
							'data' => $data
						];
			echo json_encode($response);
		} else {
			$response = [
							'code' => 500,
							'status' => "Server Error",
							'msg' => 'File gagal diupload',
							'data' => ''
						];
			echo json_encode($response);
		}		
	}

	public function getIdenRisk() 
	{
		$where = [
			'intIdRiskSourceIdentification' => $this->input->get('intIdRiskSourceIdentification')
		];
		$data = $this->risk_iden->getById($where)->row();
		$response = [
						'code' => 200,
						'status' => 'OK',
						'msg' => '-',
						'data' => $data
					];
		echo json_encode($response);
	}

	public function getRevaluationData () 
	{
		$where = [
			'intIdRiskSourceIdentification' => $this->input->get('intIdRiskSourceIdentification')
		];
		$data = $this->risk_revaluation->getData($where)->result();
		$response = [
						'code' => 200,
						'status' => 'OK',
						'msg' => '-',
						'data' => $data
					];
		echo json_encode($response);
	}

	public function simpanRevaluation()
	{
		$date = date('Y-m-d H:i:s');
		$data = [
			'intIdRiskSourceIdentification' => $this->input->post('intIdRiskSourceIdentification'),
			'intConsequenceEvaluation' 		=> $this->input->post('intConsequence_revaluation'),
			'intLikelihoodEvaluation' 		=> $this->input->post('intLikelihood_revaluation'),
			'txtRiskLevelEvaluation' 		=> $this->input->post('txtRiskLevel_revaluation'),
			'bitRiskStatus' 				=> $this->input->post('bitStatusKepentingan_revaluation'),
			'txtRiskOwner' 					=> $this->input->post('txtRiskOwner_revaluation'),
			'dtmInsertedDate' 				=> $date,
			'intInsertedBy'	 				=> $this->session->userdata('user_id'),			
		];
		$this->risk_revaluation->simpanRevaluation($data);
		$response = [
						'code' => 200,
						'status' => 'OK',
						'msg' => '-',
						'data' => "-"
					];
		echo json_encode($response);
	}

	public function iniateForm ()
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
