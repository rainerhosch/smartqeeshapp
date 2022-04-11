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
class M_section extends CI_Model
{
	var $table 			= 'mSection'; //nama tabel dari database
	var $column_order 	= array(null); //field yang ada di table user
	var $column_search 	= array('mSection.txtNamaSection'); //field yang diizin untuk pencarian 
	var $order 			= array('mSection.dtmInsertedBy' => 'desc'); // default order
	var $columnData 	= "mSection.txtNamaSection, mSection.intIdSection, mSection.bitActive, mPlant.txtNamaPlant";

	private function _get_datatables_query()
	{
		
		$this->db->select($this->columnData);		
		$this->db->from($this->table);
		$this->db->join("mPlant", 'mSection.intIdPlant = mPlant.intIdPlant');
		// var_dump($q);exit;

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
		{
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		$list = $query->result();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row = array();
			$row["txtNamaSection"] 		= $field->txtNamaSection;
			$row["txtNamaPlant"] 		= $field->txtNamaPlant;
			$row["bitActive"] 			= $field->bitActive;
			$row["intIdSection"] 		= $field->intIdSection;
			$data[] = $row;
		}

		$output = array(
			"draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->count_all(),
			"recordsFiltered" 	=> $this->count_filtered(),
			"data" 				=> $data,
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
		$this->db->select($this->columnData);
		$this->db->from($this->table);
		$this->db->join("mPlant", 'mSection.intIdPlant = mPlant.intIdPlant');
		return $this->db->count_all_results();
	}

	public function getById ($id)
	{
		
		return $this->db->get_where($this->table, ['intIdSection' => $id])->row();
		
	}
	
	public function simpan($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function update($data, $id)
	{		
		$this->db->update($this->table, $data, ['intIdSection' => $id]);
		// try {
			
		// } catch (\Exception $e) {
		// 	var_dump($e->getMessage());exit;
		// }	
	}
	
	public function getSectionActive()
	{
		return $this->db->get_where($this->table, ["bitActive" => 1])->result_array();
	}

	public function getSectionActiveWithDept()
	{
		$this->db->select('mSection.intIdSection, mSection.txtNamaSection, mSection.bitActive, mDepartemen.txtNamaDepartement');
		$this->db->from('mSection');
		$this->db->join('mDepartemen', 'mDepartemen.intIdSection = mSection.intIdSection');
		$this->db->where('mSection.bitActive', 1);		
		return $this->db->get()->result();
	}

	public function getDataByIdPlant ($id)
	{
		return $this->db->get_where($this->table, ["intIdPlant" => $id, "bitActive" => true])->result_array();
	}
}
