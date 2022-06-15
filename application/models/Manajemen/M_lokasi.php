<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_lokasi.php
 *  File Type             : Model
 *  File Package          : CI_Model
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 08/06/2022
 *  Quots of the code     : 'sabar ya'
 */


class M_lokasi extends CI_Model{
	
	public function getProvinsiByKodeNegara($kode_negara)
	{
		$this->db->where('intIdNegara',$kode_negara);
		return $this->db->get('mProvinsi');
	}

	public function getKotaByIdProvinsi($id_provinsi)
	{
		$this->db->where('intIdProvinsi',$id_provinsi);
		return $this->db->get('mKota');
	}

	public function createProvinsi($data)
	{
		$this->db->insert('mProvinsi',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function createKota($data)
	{
		$this->db->insert('mKota',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

}
