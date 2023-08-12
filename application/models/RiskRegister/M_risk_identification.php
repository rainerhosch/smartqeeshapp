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
class M_risk_identification extends CI_Model
{
	var $table = 'trRiskIdentification'; //nama tabel dari database
	var $column_order = array(null); //field yang ada di table user
	var $column_search = array('trRiskIdentification.txtSourceRiskIden'); //field yang diizin untuk pencarian
	var $order = array('dtmInsertedBy' => 'desc'); // default order

	private function _get_datatables_query($intIdTrRiskContext)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where([
			'intIdTrRiskContext' => $intIdTrRiskContext
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

	function get_datatables($intIdTrRiskContext)
	{
		$this->_get_datatables_query($intIdTrRiskContext);
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		$list = $query->result();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $field) {
			$no++;
			$row 									= array();
			$row["no"] 								= $no;
			$row["txtSourceRiskIden"] 				= $field->txtSourceRiskIden;
			$row["bitLastStatusRiskRegister"] 		= $field->bitLastStatusRiskRegister;
			$row["txtLastRiskLevel"] 				= $field->txtLastRiskLevel;
			$row["txtRiskLevel"] 					= $field->txtRiskLevel;
			$row["bitStatusKepentingan"] 			= $field->bitStatusKepentingan;
			$row["intIdRiskSourceIdentification"] 	= $field->intIdRiskSourceIdentification;
			$data[] 								= $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->count_all($intIdTrRiskContext),
			"recordsFiltered" => $this->count_filtered($intIdTrRiskContext),
			"data" => $data,
		);
		return $output;
	}

	function count_filtered($intIdTrRiskContext)
	{
		$this->_get_datatables_query($intIdTrRiskContext);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($intIdTrRiskContext)
	{
		$this->db->from($this->table);
		$this->db->where([
			'intIdTrRiskContext' => $intIdTrRiskContext
		]);
		return $this->db->count_all_results();
	}

	public function getById($where)
	{
		$this->db->select('trRiskIdentification.intIdRiskSourceIdentification, trRiskIdentification.intIdTrRiskContext,	trRiskIdentification.txtSourceRiskIden,trRiskIdentification.txtRiskAnalysis, trRiskIdentification.txtRiskType, trRiskIdentification.txtRiskCategory, trRiskIdentification.txtRiskCondition, trRiskIdentification.bitStatusKepentingan, trRiskIdentification.intIdRiskAssessmentMatrix, vw_risk_assesment_matrix.txtRiskOwner, vw_risk_assesment_matrix.txtNamaResiko,vw_risk_assesment_matrix.txtNamaLikelihood, vw_risk_assesment_matrix.txtNamaTingkatKlasifikasi, vw_risk_assesment_matrix.txtTingkatKeparahan, vw_risk_assesment_matrix.txtSebaranResiko, vw_risk_assesment_matrix.txtLamaPemulihan, vw_risk_assesment_matrix.txtBiayaPemulihan, vw_risk_assesment_matrix.txtCitraPerusahaan, trRiskIdentification.intConsequence, trRiskIdentification.intLikelihood, trRiskIdentification.txtRiskLevel');
		$this->db->join('vw_risk_assesment_matrix', 'trRiskIdentification.intIdRiskAssessmentMatrix = vw_risk_assesment_matrix.intIdRiskAssessmentMatrix');
		return $this->db->get_where($this->table, $where);
	}

	public function simpan_tahapan_baru($data)
	{
		$this->db->insert($this->table, $data);
		$data = $this->db->get_where($this->table, [
			"dtmInsertedDate" 			=> $data["dtmInsertedDate"],
			"intInsertedBy" 			=> $data["intInsertedBy"],
			"txtSourceRiskIden" 		=> $data["txtSourceRiskIden"],
		])->row();
		return $data;
	}

	//RISK MANJ PERFORMANCE

	public function countJenisRisk ($jenisRisk)
	{
		$this->db->select("*");
		$this->db->join("mRiskAssessmentMatrix", "mRiskAssessmentMatrix.txtRiskMatrix = trRiskIdentification.txtLastRiskLevel");
		$this->db->from($this->table);
		$this->db->where("txtTingkatResiko", $jenisRisk);
		$this->db->group_by("intIdRiskSourceIdentification");

		return $this->db->get()->num_rows();
	}

	public function countJenisRiskDepartemen ($jenisRisk, $id_departemen = "")
	{
		$this->db->select("*");
		$this->db->join("mRiskAssessmentMatrix", "mRiskAssessmentMatrix.txtRiskMatrix = trRiskIdentification.txtLastRiskLevel");
		$this->db->from($this->table);
		$this->db->join("trRiskContext", "trRiskIdentification.intIdTrRiskContext = trRiskContext.intIdTrRiskContext");
		$this->db->join("trTahapanProsesRisk", "trRiskContext.intIdTahapanProsesRisk = trTahapanProsesRisk.intIdTahapanProsesRisk");
		$this->db->join("trActivityRiskRegister", "trTahapanProsesRisk.intIdActivityRisk = trActivityRiskRegister.intIdActivityRisk");
		$this->db->join("mActivity", "trActivityRiskRegister.intIdActivity = mActivity.intIdActivity");
		$this->db->where([
			"txtTingkatResiko" => $jenisRisk,
			"mActivity.intIdDepartement" => $id_departemen
		]);
		$this->db->group_by("intIdRiskSourceIdentification");

		return $this->db->get()->num_rows();
	}

	public function countProgram ($status_implementasi)
	{
		$this->db->select("*");
		$this->db->join("trRiskTreatmentFuture", "trRiskIdentification.intIdRiskSourceIdentification = trRiskTreatmentFuture.intIdRiskSourceIdentification");
		$this->db->from($this->table);
		$this->db->where("txtStatusImplementation", $status_implementasi);

		// $this->db->select("*");
		// $this->db->from('trActivityRiskRegister');
		// $this->db->where("txtStatusImplementation", $status_implementasi);

		return $this->db->get()->num_rows();
	}

	public function countProgramDepartemen ($status_implementasi, $id_departemen)
	{
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->join("trRiskTreatmentFuture", "trRiskIdentification.intIdRiskSourceIdentification = trRiskTreatmentFuture.intIdRiskSourceIdentification");
		$this->db->join("trRiskContext", "trRiskIdentification.intIdTrRiskContext = trRiskContext.intIdTrRiskContext");
		$this->db->join("trTahapanProsesRisk", "trRiskContext.intIdTahapanProsesRisk = trTahapanProsesRisk.intIdTahapanProsesRisk");
		$this->db->join("trActivityRiskRegister", "trTahapanProsesRisk.intIdActivityRisk = trActivityRiskRegister.intIdActivityRisk");
		$this->db->join("mActivity", "trActivityRiskRegister.intIdActivity = mActivity.intIdActivity");
		$this->db->where([
			"trRiskTreatmentFuture.txtStatusImplementation" => $status_implementasi,
			"mActivity.intIdDepartement" => $id_departemen
		]);
		// print_r($this->db->last_query());
		// exit;

		// $this->db->select("*");
		// $this->db->from('trActivityRiskRegister');
		// $this->db->where("txtStatusImplementation", $status_implementasi);
		return $this->db->get()->num_rows();
	}

	public function getsDataByFilterRisk($filterData)
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
		$this->db->where("mRiskAssessmentMatrix.txtTingkatResiko", $filterData);
		$this->db->order_by("trActivityRiskRegister.intIdActivityRisk", "DESC");
		// $this->db->get();
		// var_dump($this->db->last_query());exit;
		return $this->db->get()->result_array();
	}

	/* public function get_datatables_manaj_performance($draw, $start, $length, $search, $txtFilter)
	{
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $length,
			"recordsFiltered" => $length,
			"data" => $data,
		);
		return $output;
	} */
}
