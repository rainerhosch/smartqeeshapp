<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_activity.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Reki Maulid
 *  Date Created          : 28/03/2022
 *  Quots of the code     : sukses itu ketika running code pertama dan tidak ada error :D
 */
class M_activity extends CI_Model
{
	var $table = 'mActivity'; //nama tabel dari database
	var $column_order = array(null); //field yang ada di table user
	var $column_search = array('mActivity.txtNamaActivity', 'mDepartemen.txtNamaDepartement', 'mSection.txtNamaSection'); //field yang diizin untuk pencarian
	var $order = array('dtmInsertedDate' => 'desc'); // default order

	private function _get_datatables_query()
	{
		$this->db->select("mActivity.intIdActivity, txtNamaActivity, mActivity.bitActive, txtNamaDepartement, txtNamaSection");
		$this->db->from($this->table);
		$this->db->join("mDepartemen", "mActivity.intIdDepartement = mDepartemen.intIdDepartement");
		$this->db->join("mSection", "mDepartemen.intIdSection = mSection.intIdSection");
		if ($_POST['intIdDepartement'] != "") {
			$this->db->where('mDepartemen.intIdDepartement', $_POST['intIdDepartement']);
		}

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
			$row["intIdActivity"] 			= $field->intIdActivity;
			$row["txtNamaSection"] 			= $field->txtNamaSection;
			$row["txtNamaActivity"] 			= $field->txtNamaActivity;
			$row["txtNamaDepartement"] 		= $field->txtNamaDepartement;
			$data[] 						= $row;
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
		$this->db->join("mDepartemen", "mActivity.intIdDepartement = mDepartemen.intIdDepartement");
		$this->db->join("mSection", "mDepartemen.intIdSection = mSection.intIdSection");
		return $this->db->count_all_results();
	}
	//CONTROL
	public function validateDepartmentActivity($id_department, $nama_activity)
	{
		$this->db->where("intIdDepartement", $id_department);
		$this->db->where("txtNamaActivity", $nama_activity);
		return $this->db->get($this->table)->row_array();
	}

	public function getsActivityActive()
	{
		return $this->db->get_where($this->table, ["bitActive" => true])->result();
	}

	public function insertData($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function getActivity($id)
	{
		$this->db->join("mDepartemen", "mActivity.intIdDepartement = mDepartemen.intIdDepartement");
		$this->db->join("mSection", "mDepartemen.intIdSection = mSection.intIdSection");
		return $this->db->get_where($this->table, ["intIdActivity" => $id])->row_array();
	}

	public function updateData($data, $id)
	{
		$this->db->update($this->table, $data, ["intIdActivity" => $id]);
	}

	public function getActivityBySection($id)
	{
		return $this->db->get_where($this->table, ['intIdSection' => $id, "bitActive" => 1])->result_array();
	}

	public function getActivityByDepartemen($id)
	{
		return $this->db->get_where($this->table, ['intIdDepartement' => $id, "bitActive" => 1])->result_array();
	}
}
