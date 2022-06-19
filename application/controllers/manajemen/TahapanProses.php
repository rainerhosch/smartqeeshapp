<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Plant.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Dimas Fauzan
 *  Date Created          : 26/03/2022
 *  Quots of the code     : Kadang susah kalo udah nyaman sama framework sebelah :D
 */
class TahapanProses extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		login_check();
		$this->load->model('/Manajemen/M_tahapan_proses', 'tahapan_proses');
		$this->load->model('/Manajemen/M_section', 'section');
		$this->load->model('/Manajemen/M_Activity', 'activity');
		$this->load->model('/Manajemen/M_department', 'departement');
	}

	public function getsPlant()
	{
		try {
			$allData = $this->tahapan_proses->getsPlantActive();

			echo json_encode($allData);
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}

	public function index()
	{
		$data['title'] 		= 'Smart Qeesh App';
		$data['page'] 		= 'Manajemen Tahapan Proses';
		$data['subpage'] 	= 'Blank Page';
		$data['content'] 	= 'pages/manajemen/v_tahapan_proses';
		$data['section']	= $this->section->getSectionActive();
		$this->load->view('template', $data);
	}

	public function getDataTable()
	{
		echo json_encode($this->tahapan_proses->get_datatables());
	}

	public function getById ()
	{
		$id 				= $this->input->get('intIdTahapanProses');
		$data["tahapan"] 	= $this->tahapan_proses->getById($id);
		$data["activity"]	= $this->activity->getActivity($data["tahapan"]->intIdActivty); //row_Array
		$data["section"]	= $this->departement->getDataByIdDepartement($data["activity"]["intIdDepartement"]); //row_Array
		// $option_activity 	= $this->activity->getActivityBySection($data["activity"]["intIdSection"]);
		// $res 				= '<option value="">Pilih Activity</option>';
		
		// foreach ($option_activity as $item) {
		// 	if ($item["intIdActivity"] == $data["tahapan"]->intIdActivty) {
		// 			$res .= '<option value="'.$item["intIdActivity"].'" selected>'.$item["txtNamaActivity"].'</option>';
		// 	} else {
		// 		$res .= '<option value="'.$item["intIdActivity"].'" selected>'.$item["txtNamaActivity"].'</option>';
		// 	}
			
		// }
		// $data["option_activity"] = $res;
		if ($data != null) {
			echo json_encode ([
				'code' 		=> 200,
				'status' 	=> true,
				'msg' 		=> 'Berhasil',
				'data' 		=> $data
			]);
		} else {
			echo json_encode ([
				'code' 		=> 404,
				'status' 	=> true,
				'msg' 		=> 'Data Tidak Ditemukan !',
				'data' 		=> null
			]);
		} 
		
	}

	public function simpan()
	{
		$dateNow = date("Y-m-d");
		$data = [
			"intIdActivty" 			=> $this->input->post('intIdActivity'),
			"txtNamaTahapan" 		=> strtoupper($this->input->post('txtNamaTahapan')),
			"bitActive" 			=> $this->input->post('bitActive'),
			"intInsertedBy" 		=> $this->session->userdata('user_id'),
			"dtmInsertedDate" 		=> $dateNow
		];		
		$this->tahapan_proses->simpan($data);
		$response = [
						'code' 		=> 200,
						'status' 	=> true,
						'msg' 		=> 'Berhasil disimpan.',
						'data' 		=> "-"
					];					
		echo json_encode($response);
	}

	public function update ()
	{
		$dateNow 	= date("Y-m-d");
		$intIdPlant = $this->input->post('intIdTahapanProses');		 
		$data = [
			"intIdActivty" 			=> $this->input->post('intIdActivity'),
			"txtNamaTahapan" 		=> strtoupper($this->input->post('txtNamaTahapan')),
			"bitActive" 			=> $this->input->post('bitActive'),			
			"intUpdateBy" 			=> $this->session->userdata('user_id'),
			"dtmUpdatedDate" 		=> $dateNow
		];		
		$this->tahapan_proses->update($data, $intIdPlant);
		$response = [
						'code' 		=> 200,
						'status' 	=> true,
						'msg' 		=> 'Berhasil disimpan.',
						'data' 		=> "-"
					];
		echo json_encode($response);
	}
}
