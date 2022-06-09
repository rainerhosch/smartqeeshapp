<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Lokasi.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 06/06/2022
 *  Quots of the code     : 'sabar ya'
 */

class Lokasi extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('Manajemen/M_lokasi', 'lokasi');
    }

	public function getProvinsi()
	{
		if($this->input->is_ajax_request())
        {
			$kode_negara = $this->input->post('kode_negara');
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => 'Success',
                'data' => $this->lokasi->getProvinsiByKodeNegara($kode_negara)->result()
            ];
        }

		echo json_encode($data);
	}

	public function getKota()
	{
		if($this->input->is_ajax_request())
        {
			$id_provinsi = $this->input->post('id_provinsi');
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => 'Success',
                'data' => $this->lokasi->getKotaByIdProvinsi($id_provinsi)->result()
            ];
        }

		echo json_encode($data);
	}

}
