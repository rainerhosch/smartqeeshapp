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
class M_activity_risk_register extends CI_Model
{
	var $table = 'trActivityRiskRegister'; //nama tabel dari database
	var $column_order = array(null); //field yang ada di table user
	var $column_search = array('txtNamaActivity'); //field yang diizin untuk pencarian 
	var $order = array('dtmInsertedBy' => 'desc'); // default order 

	private function _get_datatables_query()
	{
		$this->db->select('trActivityRiskRegister.intIdActivityRisk, mActivity.txtNamaActivity');		
		$this->db->from($this->table);
		$this->db->join('mActivity', 'trActivityRiskRegister.intIdActivity=mActivity.intIdActivity');
		$this->db->order_by('trActivityRiskRegister.intIdActivityRisk', 'desc');

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
			$row["txtNamaActivity"] = $field->txtNamaActivity;
			$row["intIdActivityRisk"] = $field->intIdActivityRisk;
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
		$this->db->join('mActivity', 'trActivityRiskRegister.intIdActivity=mActivity.intIdActivity');
		return $this->db->count_all_results();
	}

	public function simpan ($data, $id_departemen)
	{
		$activityData 			= $this->db->get_where('mActivity', ['txtNamaActivity' => strtoupper($data['txtActivityAdd'])])->row();
		$dataFinal 				= [];
		$dataInsertNewActivity 	= [];
		if ($activityData != null) {
			$dataFinal = [
				"intIdActivity" 			=> $activityData->intIdActivity,
				"intIdDokRiskRegister" 		=> $data['intIdDokRiskRegister'],
				"intInsertedBy" 			=> $data['intInsertedBy'],
				"dtmInsertedDate"			=> $data['dtmInsertedDate'] 
			];
		} else {
			$dataInsertNewActivity = [
                    "intIdDepartement"  => $id_departemen,
                    "txtNamaActivity"   => strtoupper($data['txtActivityAdd']),
                    "bitActive"         => 1,
                    "intInsertedBy"     => $data['intInsertedBy'],
                    "dtmInsertedDate"   => $data['dtmInsertedDate'],
                    "intUpdatedBy"      => $data['intInsertedBy'],
                    "dtmUpdatedDate"    => $data['dtmInsertedDate']
			];
			$this->db->insert('mActivity', $dataInsertNewActivity);
			$dataActivityNew = $this->db->get_where('mActivity', $dataInsertNewActivity)->row();
			$dataFinal = [
				"intIdActivity" 			=> $dataActivityNew->intIdActivity,
				"intIdDokRiskRegister" 		=> $data['intIdDokRiskRegister'],
				"intInsertedBy" 			=> $data['intInsertedBy'],
				"dtmInsertedDate"			=> $data['dtmInsertedDate'] 
			];
		}
		$activityExist = $this->db->get_where($this->table, [
			"intIdActivity" 			=> $dataFinal['intIdActivity'],
			"intIdDokRiskRegister" 		=> $dataFinal['intIdDokRiskRegister'],
		])->row();
		if ($activityExist == null) {
			$this->db->insert($this->table, $dataFinal);
			return true;
		} else {
			return false;
		}
		
		
	}

	public function getByID ($id) {		
		$this->db->select('trDokRiskRegister.txtDocNumber, trDokRiskRegister.txtStatus, trDokRiskRegister.intInspectedBy, trDokRiskRegister.intValidateBy, mSection.txtNamaSection, mPlant.txtNamaPlant, mDepartemen.txtNamaDepartement, trDokRiskRegister.intIdDokRiskRegister, trDokRiskRegister.dtmInsertedBy, trDokRiskRegister.dtmInspectedDate, trDokRiskRegister.dtmValidatedDate, trDokRiskRegister.intInsertedBy');
		$this->db->from($this->table);
		$this->db->join('mSection', 'trDokRiskRegister.intIdSection = mSection.intIdSection');		
		$this->db->join('mDepartemen', 'mSection.intIdDepartemen = mDepartemen.intIdDepartement');
		$this->db->join('mPlant', 'mDepartemen.intIdPlant = mPlant.intIdPlant');
		$this->db->where('trDokRiskRegister.intIdDokRiskRegister', $id);
		return $this->db->get()->row();								
	}
}
