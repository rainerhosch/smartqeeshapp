<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_department.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Reki Maulid
 *  Date Created          : 26/03/2022
 *  Quots of the code     : sukses itu ketika running code pertama dan tidak ada error :D
 */
class M_department extends CI_Model
{
	var $table = 'mDepartemen'; //nama tabel dari database
	var $column_order = array(null); //field yang ada di table user
	var $column_search = array('mActivity.txtNamaActivity', 'mDepartemen.txtNamaDepartement', 'mSection.txtNamaSection'); //field yang diizin untuk pencarian
	var $order = array('dtmInsertedDate' => 'desc'); // default order

	private function _get_datatables_query()
	{
		$this->db->select("intIdDepartement, mDepartemen.intIdSection, mSection.txtNamaSection, txtNamaDepartement, mDepartemen.bitActive, mDepartemen.txtSingkatan");
		$this->db->from($this->table);
		$this->db->join("mSection", "mDepartemen.intIdSection = mSection.intIdSection");
		if ($_POST['intIdSection'] != "") {
			$this->db->where("mDepartemen.intIdSection", $_POST['intIdSection']);
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
			$row["intIdDepartement"] = $field->intIdDepartement;
			$row["intIdSection"] = $field->intIdSection;
			$row["txtNamaDepartement"] = $field->txtNamaDepartement;
			$row["txtNamaSection"] = $field->txtNamaSection;
			$row["txtSingkatan"] = $field->txtSingkatan;
			$row["bitActive"] = $field->bitActive;
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
		$this->db->join("mSection", "mDepartemen.intIdSection = mSection.intIdSection");
		return $this->db->count_all_results();
	}
	//CONTROL
	public function validateSectionNamaDepartment($id_section, $nama_department)
	{
		$this->db->where("intIdSection", $id_section);
		$this->db->where("txtNamaDepartement", $nama_department);
		return $this->db->get($this->table)->row_array();
	}

	public function validateSectionKodeDepartment($id_section, $kode_department)
	{
		$this->db->where("intIdSection", $id_section);
		$this->db->where("txtSingkatan", $kode_department);
		return $this->db->get($this->table)->row_array();
	}

	//ACTION
	public function getsDepartmentSection()
	{
		$this->db->select("intIdDepartement, mDepartemen.intIdSection, mSection.txtNamaSection, txtNamaDepartement, mDepartemen.bitActive, mDepartemen.txtSingkatan");
		$this->db->join("mSection", "mDepartemen.intIdSection = mSection.intIdSection");
		return $this->db->get($this->table)->result_array();
	}

	public function getsDepartmentActive()
	{
		return $this->db->get_where($this->table, ["bitActive" => true])->result();
	}

	public function insertData($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function getDepartment($id)
	{
		return $this->db->get_where($this->table, ["intIdDepartement" => $id])->row_array();
	}

	// code by rzoktan
	public function getData_v2($where = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if ($where != null) {
			$this->db->where($where);
		}
		return $this->db->get();
	}

	public function updateData($data, $id)
	{
		$this->db->update($this->table, $data, ["intIdDepartement" => $id]);
	}

	public function getDepartemenByIdPlant($id)
	{
		return $this->db->get_where($this->table, ["intIdPlant" => $id, "bitActive" => true])->result_array();
	}

	public function getDataByIdDepartement($id)
	{
		return $this->db->get_where($this->table, ["intIdDepartement" => $id])->row();
	}
}
