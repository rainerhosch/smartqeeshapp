<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_dok_register.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Dimas Fauzan
 *  Date Created          : 23/03/2022
 *  Quots of the code     : PKadang susah kalo udah nyaman sama framework sebelah :D
 */
class M_tahapan_proses_risk extends CI_Model
{
	var $table = 'trTahapanProsesRisk'; //nama tabel dari database
	var $column_order = array(null); //field yang ada di table user
	var $column_search = array('mTahapanProses.txtNamaTahapan'); //field yang diizin untuk pencarian 
	var $order = array('dtmInsertedBy' => 'desc'); // default order 

	private function _get_datatables_query($intIdActivityRisk, $intIdActivity)
	{
		$this->db->select('mTahapanProses.txtNamaTahapan, mActivity.intIdDepartement, trTahapanProsesRisk.intIdTahapanProsesRisk, mTahapanProses.intIdTahapanProses, trTahapanProsesRisk.intIdActivityRisk');
		$this->db->from($this->table);
		$this->db->join('mTahapanProses', 'trTahapanProsesRisk.intIdTahapanProses = mTahapanProses.intIdTahapanProses', 'right');
		$this->db->join('mActivity', 'mTahapanProses.intIdActivty = mActivity.intIdActivity');
		$this->db->where([
			'mActivity.intIdDepartement' => $this->session->userdata('id_departemen'),
			'mTahapanProses.intIdActivty' => $intIdActivity
		]);
		// var_dump($this->db->last_query());exit;
		$i = 0;

		foreach ($this->column_search as $item) // looping awal
		{
			if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
			{

				if ($i === 0) // looping awal
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		// if (isset($_POST['order'])) {
		// 	$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		// } else if (isset($this->order)) {
		// 	$order = $this->order;
		// 	$this->db->order_by(key($order), $order[key($order)]);
		// }
	}

	function get_datatables($intIdActivityRisk, $intIdActivity)
	{
		$this->_get_datatables_query($intIdActivityRisk, $intIdActivity);
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);				
		$query = $this->db->get();
		$list = $query->result();
		$data = array();
		$no = $_POST['start'];		
		foreach ($list as $field) {
			$no++;
			$row 						= array();
			$row["no"] 					= $no;
			$row["txtNamaTahapan"] 		= $field->txtNamaTahapan;
			$row["intIdTahapanProses"] 	= $field->intIdTahapanProses;
			$data[] 					= $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->count_all($intIdActivityRisk, $intIdActivity),
			"recordsFiltered" => $this->count_filtered($intIdActivityRisk, $intIdActivity),
			"data" => $data,
		);
		return $output;
	}

	function count_filtered($intIdActivityRisk, $intIdActivity)
	{
		$this->_get_datatables_query($intIdActivityRisk, $intIdActivity);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($intIdActivityRisk, $intIdActivity)
	{		
		$this->db->from($this->table);
		$this->db->join('mTahapanProses', 'mTahapanProses.intIdTahapanProses = trTahapanProsesRisk.intIdTahapanProses', 'right');
		$this->db->join('mActivity', 'mTahapanProses.intIdActivty = mActivity.intIdActivity');
		$this->db->where([
			'mActivity.intIdDepartement' 	=> $this->session->userdata('id_departemen'),
			'mTahapanProses.intIdActivty' 	=> $intIdActivity
		]);
		return $this->db->count_all_results();
	}

	public function simpan_tahapan_baru($data) {
		$trActivity 		= $this->db->get_where('trActivityRiskRegister', ['intIdActivityRisk' => $data['intIdActivityRisk']])->row();
		$mTahapan 			= $this->db->get_where('mTahapanProses', ['txtNamaTahapan' => $data['txtTahapanProses']])->row();
		$dataNewTrTahapan 	= [];
		if ($mTahapan == null) {
			$dataTahapanBaru = [
				"intIdActivty" 			=> $trActivity->intIdActivity,
				"txtNamaTahapan" 		=> $data['txtTahapanProses'],
				"bitActive" 			=> 1,	
				"intInsertedBy" 		=> $data['txtInsertedBy'],
				"dtmInsertedDate" 		=> $data['dtmInsertedDate'],
			];
			$this->db->insert('mTahapanProses', $dataTahapanBaru);
			$tahapanBaru = $this->db->get_where('mTahapanProses', $dataTahapanBaru)->row();
			$dataNewTrTahapan = [
				'intIdTahapanProses' 	=> $tahapanBaru->intIdTahapanProses,
				'intIdActivityRisk' 	=> $data['intIdActivityRisk'],
				"intInsertedBy" 		=> $data['txtInsertedBy'],
				"dtmInsertedDate" 		=> $data['dtmInsertedDate'],
			];		
		} else {
			$dataNewTrTahapan = [
				'intIdTahapanProses' 	=> $mTahapan->intIdTahapanProses,
				'intIdActivityRisk' 	=> $data['intIdActivityRisk'],
				"intInsertedBy" 		=> $data['txtInsertedBy'],
				"dtmInsertedDate" 		=> $data['dtmInsertedDate'],
			];
		}
		$this->db->insert($this->table, $dataNewTrTahapan);
		return true;
	}

	public function cekTahapan ($param)
	{
		$tahapan_proses_exist = $this->db->get_where($this->table, [
			'intIdActivityRisk' 	=> $param['intIdActivityRisk'],
			'intIdTahapanProses' 	=> $param['intIdTahapanProses'],
		])->row();		
		if ($tahapan_proses_exist == null) {
			$dataInsert = [
				'intIdActivityRisk' 	=> $param['intIdActivityRisk'],
				'intIdTahapanProses' 	=> $param['intIdTahapanProses'],
				'intInsertedBy'			=> $param['intInsertedBy'],
				'dtmInsertedDate'		=> $param['dtmInsertedDate'],
			];
			$this->db->insert($this->table, $dataInsert);
			return $this->db->get_where($this->table, [
				'intIdActivityRisk' 	=> $param['intIdActivityRisk'],
				'intIdTahapanProses' 	=> $param['intIdTahapanProses'],
			])->row();						
		} else {
			return $tahapan_proses_exist;
		}
	}
}
