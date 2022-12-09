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
class M_report_risk_register extends CI_Model
{
	public function getDataDokumen($where)
	{
		$this->db->select('trDokRiskRegister.intIdDokRiskRegister, trDokRiskRegister.txtDocNumber, mDepartemen.txtNamaDepartement, mSection.txtNamaSection, trDokRiskRegister.dtmInsertedBy');
		$this->db->join('mDepartemen', 'trDokRiskRegister.intIdDepartement = mDepartemen.intIdDepartement');
		$this->db->join('mSection', 'mDepartemen.intIdSection = mSection.intIdSection');		
		return $this->db->get_where('trDokRiskRegister', $where);
	}

	public function getActivity ($where)
	{
		$this->db->select('mActivity.txtNamaActivity, trActivityRiskRegister.dtmInsertedDate, trActivityRiskRegister.intInsertedBy, trActivityRiskRegister.intIdDokRiskRegister, trActivityRiskRegister.intIdActivityRisk');		
		$this->db->join('mActivity', 'trActivityRiskRegister.intIdActivity = mActivity.intIdActivity');
		$this->db->where($where);
		// $this->db->limit(1);
		
		return $this->db->get_where('trActivityRiskRegister', $where);	
	}

	public function getTahapan ($where)
	{
		$this->db->select('trTahapanProsesRisk.intIdActivityRisk, mTahapanProses.txtNamaTahapan, trTahapanProsesRisk.intIdTahapanProsesRisk, trTahapanProsesRisk.dtmInsertedDate, trTahapanProsesRisk.intInsertedBy');
		$this->db->join('mTahapanProses', 'trTahapanProsesRisk.intIdTahapanProses = mTahapanProses.intIdTahapanProses');
		// $this->db->where($where);
		return $this->db->get_where('trTahapanProsesRisk' , $where);
	}

	public function getContext ($where)
	{
		return $this->db->get_where('trRiskContext', $where);
	}

	public function getIdentification ($where)
	{
		return $this->db->get_where('trRiskIdentification', $where);
	}

	public function getRiskMatrix ($where)
	{
		return $this->db->get_where('mRiskAssessmentMatrix', $where);
		
	}

	public function getTreatmentCurrent ($where)
	{
		return $this->db->get_where('trRiskTreatmentCurrent', $where);
	}

	public function getTreatmentFuture ($where)
	{
		return $this->db->get_where('trRiskTreatmentFuture', $where);
	}

	public function getRiskEvaluation ($where) {
		$this->db->select('vw_risk_assesment_matrix.txtRiskOwner, trRiskEvaluation.intIdRiskEvaluation, trRiskEvaluation.intIdRiskSourceIdentification, trRiskEvaluation.intConsequenceEvaluation, trRiskEvaluation.intLikelihoodEvaluation, trRiskEvaluation.txtRiskLevelEvaluation, trRiskEvaluation.txtResidualRisk, trRiskEvaluation.bitRiskStatus, trRiskEvaluation.txtRiskOwner, trRiskEvaluation.dtmInsertedDate, trRiskEvaluation.intInsertedBy, trRiskEvaluation.intIdRiskAssessmentMatrix');
		$this->db->from('trRiskEvaluation');
		$this->db->join('vw_risk_assesment_matrix', 'trRiskEvaluation.intIdRiskAssessmentMatrix = vw_risk_assesment_matrix.intIdRiskAssessmentMatrix');
		$this->db->where($where);
		return $this->db->get();
	}
	public function countAllActivity ($where) {
		$this->db->from('trActivityRiskRegister');
		$this->db->join('trTahapanProsesRisk', 'trActivityRiskRegister.intIdActivityRisk = trTahapanProsesRisk.intIdActivityRisk');
		$this->db->join('trRiskContext', 'trTahapanProsesRisk.intIdTahapanProsesRisk = trRiskContext.intIdTahapanProsesRisk');
		$this->db->join('trRiskIdentification', 'trRiskContext.intIdTrRiskContext = trRiskIdentification.intIdTrRiskContext');
		$this->db->where($where);
		// $data = $this->db->get();
		// var_dump($this->db->last_query());exit;	
		return $this->db->get();						
	}
}
