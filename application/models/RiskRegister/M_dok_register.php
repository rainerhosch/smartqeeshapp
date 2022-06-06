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
class M_dok_register extends CI_Model
{
	var $table = 'trDokRiskRegister'; //nama tabel dari database
	var $column_order = array(null); //field yang ada di table user
	var $column_search = array('txtDocNumber'); //field yang diizin untuk pencarian 
	var $order = array('dtmInsertedBy' => 'desc'); // default order 

	private function _get_datatables_query()
	{
		$this->db->select('trDokRiskRegister.txtDocNumber, trDokRiskRegister.txtStatus, user_detail.nama, trDokRiskRegister.dtmInsertedBy, trDokRiskRegister.intIdDokRiskRegister');		
		$this->db->from($this->table);
		$this->db->join('user', 'trDokRiskRegister.intInsertedBy=user.user_detail_id');
		$this->db->join('user_detail', 'user.user_detail_id=user_detail.user_detail_id');
		

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

	
	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		$list = $query->result();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row["no"] = $no;
			$row["txtDocNumber"] = $field->txtDocNumber;
			$row["txtStatus"] = $field->txtStatus;
			$row["intIdDokRiskRegister"] = $field->intIdDokRiskRegister;
			$row["nama"] = $field->nama;
			$row["dtmInsertedBy"] = date('d-m-Y', strtotime($field->dtmInsertedBy));
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->count_all(),
			"recordsFiltered" => $this->count_filtered(),
			"data" => $data,
		);
		return $output;
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		$this->db->join('user', 'trDokRiskRegister.intInsertedBy=user.user_detail_id');
		$this->db->join('user_detail', 'user.user_detail_id=user_detail.user_detail_id');
		return $this->db->count_all_results();
	}

	public function simpan ($data)
	{
		$this->db->insert($this->table, $data);	
	}

	public function getByID ($id) {		
		$this->db->select('trDokRiskRegister.txtDocNumber, trDokRiskRegister.txtStatus, trDokRiskRegister.intInspectedBy, trDokRiskRegister.intValidateBy, mSection.txtNamaSection, mPlant.txtNamaPlant, mDepartemen.txtNamaDepartement, trDokRiskRegister.intIdDokRiskRegister, trDokRiskRegister.dtmInsertedBy, trDokRiskRegister.dtmInspectedDate, trDokRiskRegister.dtmValidatedDate, trDokRiskRegister.intInsertedBy');
		$this->db->from($this->table);
		$this->db->join('mDepartemen', $this->table.'.intIdDepartement = mDepartemen.intIdDepartement');
		$this->db->join('mSection', 'mDepartemen.intIdSection = mSection.intIdSection');				
		$this->db->join('mPlant', 'mSection.intIdPlant = mPlant.intIdPlant');
		$this->db->where('trDokRiskRegister.intIdDokRiskRegister', $id);
		return $this->db->get();								
	}
}
