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
class M_risk_context extends CI_Model
{
	var $table = 'trRiskContext'; //nama tabel dari database
	var $column_order = array(null); //field yang ada di table user
	var $column_search = array('trRiskContext.txtNamaContext'); //field yang diizin untuk pencarian 
	var $order = array('dtmInsertedBy' => 'desc'); // default order 

	private function _get_datatables_query($intIdTahapanProsesRisk)
	{
		$this->db->select('*');		
		$this->db->from($this->table);
		$this->db->where([
			'intIdTahapanProsesRisk' => $intIdTahapanProsesRisk
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

	function get_datatables($intIdTahapanProsesRisk)
	{
		$this->_get_datatables_query($intIdTahapanProsesRisk);
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
			$row["txtNamaContext"] 		= $field->txtNamaContext;
			$row["intIdTrRiskContext"] 	= $field->intIdTrRiskContext;
			$data[] 					= $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->count_all($intIdTahapanProsesRisk),
			"recordsFiltered" => $this->count_filtered($intIdTahapanProsesRisk),
			"data" => $data,
		);
		return $output;
	}

	function count_filtered($intIdTahapanProsesRisk)
	{
		$this->_get_datatables_query($intIdTahapanProsesRisk);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($intIdTahapanProsesRisk)
	{		
		$this->db->from($this->table);
		$this->db->where([
			'intIdTahapanProsesRisk' => $intIdTahapanProsesRisk
		]);
		return $this->db->count_all_results();
	}

	public function simpan_tahapan_baru($data) {		
		$this->db->insert($this->table, $data);
		return true;
	}
}
