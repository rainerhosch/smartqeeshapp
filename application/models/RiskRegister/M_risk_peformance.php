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
class M_risk_peformance extends CI_Model
{
	var $table = 'trRiskIdentification'; //nama tabel dari database
	var $column_order = array(null); //field yang ada di table user
	var $column_search = array('trRiskIdentification.txtSourceRiskIden'); //field yang diizin untuk pencarian
	var $order = array('dtmInsertedBy' => 'desc'); // default order

	private function _get_datatables_query($intIdDepartemen = "")
	{
		$this->db->select("mTahapanProses.txtNamaTahapan, trRiskContext.txtNamaContext, mActivity.txtNamaActivity, trRiskIdentification.txtSourceRiskIden, trRiskIdentification.txtRiskAnalysis, trRiskIdentification.txtRiskType, trRiskIdentification.txtRiskCategory, trRiskIdentification.txtRiskCondition, trRiskIdentification.txtLastRiskLevel, trRiskContext.intIdTrRiskContext, trTahapanProsesRisk.intIdTahapanProsesRisk, trActivityRiskRegister.intIdActivityRisk, trDokRiskRegister.intIdDokRiskRegister, trRiskIdentification.intIdRiskSourceIdentification");
		$this->db->from($this->table);
		$this->db->join("mRiskAssessmentMatrix", "mRiskAssessmentMatrix.intIdRiskAssessmentMatrix = trRiskIdentification.intIdRiskAssessmentMatrix");
		$this->db->join("trRiskContext", "trRiskIdentification.intIdTrRiskContext = trRiskContext.intIdTrRiskContext");
		$this->db->join("trTahapanProsesRisk", "trRiskContext.intIdTahapanProsesRisk = trTahapanProsesRisk.intIdTahapanProsesRisk");
		$this->db->join("mTahapanProses", "trTahapanProsesRisk.intIdTahapanProses = mTahapanProses.intIdTahapanProses");
		$this->db->join("trActivityRiskRegister", "trTahapanProsesRisk.intIdActivityRisk = trActivityRiskRegister.intIdActivityRisk");
		$this->db->join("mActivity", "trActivityRiskRegister.intIdActivity = mActivity.intIdActivity");
		$this->db->join("trDokRiskRegister", "trActivityRiskRegister.intIdDokRiskRegister = trDokRiskRegister.intIdDokRiskRegister");
		$this->db->where("mRiskAssessmentMatrix.txtTingkatResiko", $_POST['filter']);
		if ($intIdDepartemen != "")
		{
			$this->db->where(["mActivity.intIdDepartement" => $intIdDepartemen]);
		}
		$this->db->order_by("trActivityRiskRegister.intIdActivityRisk", "DESC");

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

	function get_datatables($intIdDepartemen = "")
	{
		$this->_get_datatables_query($intIdDepartemen);
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		$list = $query->result();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row 									= array();
			$row["txtNamaActivity"] 				= $field->txtNamaActivity;
			$row["txtNamaTahapan"] 					= $field->txtNamaTahapan;
			$row["txtSourceRiskIden"] 				= $field->txtRiskAnalysis;
			$row["txtRiskAnalysis"] 				= $field->txtRiskLevel;
			$row["txtRiskType"] 					= $field->txtRiskType;
			$row["txtRiskCategory"] 				= $field->txtRiskCategory;
			$row["txtRiskCondition"] 				= $field->txtRiskCondition;
			$row["txtLastRiskLevel"] 				= $field->txtLastRiskLevel;
			$row["intIdDokRiskRegister"] 			= $field->intIdDokRiskRegister;
			$row["intIdActivityRisk"] 				= $field->intIdActivityRisk;
			$row["intIdTahapanProsesRisk"] 			= $field->intIdTahapanProsesRisk;
			$row["intIdTrRiskContext"] 				= $field->intIdTrRiskContext;
			$row["intIdRiskSourceIdentification"] 	= $field->intIdRiskSourceIdentification;
			$data[] 								= $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->count_all($intIdDepartemen),
			"recordsFiltered" => $this->count_filtered($intIdDepartemen),
			"data" => $data,
		);
		return $output;
	}

	function count_filtered($intIdDepartemen)
	{
		$this->_get_datatables_query($intIdDepartemen);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($intIdDepartemen = "")
	{
		$this->db->select("mTahapanProses.txtNamaTahapan, trRiskContext.txtNamaContext, mActivity.txtNamaActivity, trRiskIdentification.txtSourceRiskIden, trRiskIdentification.txtRiskAnalysis, trRiskIdentification.txtRiskType, trRiskIdentification.txtRiskCategory, trRiskIdentification.txtRiskCondition, trRiskIdentification.txtLastRiskLevel, trRiskContext.intIdTrRiskContext, trTahapanProsesRisk.intIdTahapanProsesRisk, trActivityRiskRegister.intIdActivityRisk, trDokRiskRegister.intIdDokRiskRegister, trRiskIdentification.intIdRiskSourceIdentification");
		$this->db->from($this->table);
		$this->db->join("mRiskAssessmentMatrix", "mRiskAssessmentMatrix.intIdRiskAssessmentMatrix = trRiskIdentification.intIdRiskAssessmentMatrix");
		$this->db->join("trRiskContext", "trRiskIdentification.intIdTrRiskContext = trRiskContext.intIdTrRiskContext");
		$this->db->join("trTahapanProsesRisk", "trRiskContext.intIdTahapanProsesRisk = trTahapanProsesRisk.intIdTahapanProsesRisk");
		$this->db->join("mTahapanProses", "trTahapanProsesRisk.intIdTahapanProses = mTahapanProses.intIdTahapanProses");
		$this->db->join("trActivityRiskRegister", "trTahapanProsesRisk.intIdActivityRisk = trActivityRiskRegister.intIdActivityRisk");
		$this->db->join("mActivity", "trActivityRiskRegister.intIdActivity = mActivity.intIdActivity");
		$this->db->join("trDokRiskRegister", "trActivityRiskRegister.intIdDokRiskRegister = trDokRiskRegister.intIdDokRiskRegister");
		$this->db->where("mRiskAssessmentMatrix.txtTingkatResiko", $_POST['filter']);
		if ($intIdDepartemen != "")
		{
			$this->db->where(["mActivity.intIdDepartement" => $intIdDepartemen]);
		}
		$this->db->order_by("trActivityRiskRegister.intIdActivityRisk", "DESC");
		return $this->db->count_all_results();
	}
}
