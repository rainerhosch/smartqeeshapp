<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Section.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Dimas Fauzan
 *  Date Created          : 26/03/2022
 *  Quots of the code     : Kadang susah kalo udah nyaman sama framework sebelah :D
 * Note 				  : Ini sebenernya controller untuk manajemen function
 */
class Section extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		login_check();
		$this->load->model('/Manajemen/M_section', 'section');
		$this->load->model('/Manajemen/M_department', 'departement');
		$this->load->model('/Manajemen/M_plant', 'plant');
	}

	public function getsSection()
	{
		try {
			$allData = $this->section->getSectionActive();
			echo json_encode($allData);
		} catch (\Exception $e) {
			die($e->getMessage());
		}
	}

	public function index()
	{
		$data['title'] 		= 'Smart Qeesh App';
		$data['page'] 		= 'Manajemen Function';
		$data['subpage'] 	= 'Blank Page';
		$data['content'] 	= 'pages/manajemen/v_section';
		$data["plant"]		= $this->plant->getsPlantActive();
		$data["departemen"]	= $this->departement->getsDepartmentActive();
		$this->load->view('template', $data);
	}

	public function getDataTable()
	{
		echo json_encode($this->section->get_datatables());
	}

	public function getById()
	{
		$id 	= $this->input->get('intIdSection');
		$data 	= $this->section->getById($id);
		if ($data != null) {
			echo json_encode([
				'code' 		=> 200,
				'status' 	=> true,
				'msg' 		=> 'Berhasil',
				'data' 		=> $data
			]);
		} else {
			echo json_encode([
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
			"txtNamaSection" 	=> strtoupper($this->input->post('txtNamaSection')),
			"bitActive" 		=> $this->input->post('bitActive'),
			"intIdPlant" 		=> $this->input->post('intIdPlant'),
			"intInsertBy" 		=> $this->session->userdata('user_id'),
			"dtmInsertedDate" 	=> $dateNow
		];
		// var_dump($data);exit;	
		$this->section->simpan($data);
		$response = [
			'code' 		=> 200,
			'status' 	=> true,
			'msg' 		=> 'Berhasil disimpan.',
			'data' 		=> "-"
		];
		echo json_encode($response);
	}

	public function update()
	{
		$dateNow 		= date("Y-m-d");
		$intIdSection 	= $this->input->post('intIdSection');
		$data = [
			"txtNamaSection" 	=> strtoupper($this->input->post('txtNamaSection')),
			"bitActive" 		=> $this->input->post('bitActive'),
			"intIdPlant" 		=> $this->input->post('intIdPlant'),
			"intUpdatedBy" 		=> $this->session->userdata('user_id'),
			"dtmUpdatedDate" 	=> $dateNow
		];
		$this->section->update($data, $intIdSection);
		$response = [
			'code' 		=> 200,
			'status' 	=> true,
			'msg' 		=> 'Berhasil disimpan.',
			'data' 		=> "-"
		];
		echo json_encode($response);
	}

	public function getDataByIdPlant()
	{
		$id 		= $this->input->get('id');
		$data_dept 	= $this->section->getDataByIdPlant($id);
		$opt 		= '<option value ="" disabled selected hidden style="font-size: inherit;">Silahkan Pilih Function</option>';
		if (!empty($data_dept)) {
			foreach ($data_dept as $item) {
				$opt .= '<option value="' . $item["intIdSection"] . '"> ' . $item["txtNamaSection"] . '</option>';
			}
		}
		$response = [
			'code'    => 200,
			'status'  => "OK",
			'msg'     => "OK",
			'data'    => $opt
		];

		echo json_encode($response);
	}
}
