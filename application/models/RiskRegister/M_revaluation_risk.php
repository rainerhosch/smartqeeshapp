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
class M_revaluation_risk extends CI_Model
{
	var $table = 'trRiskEvaluation'; //nama tabel dari database

	public function getData($where)
	{
		$this->db->select('trRiskEvaluation.intIdRiskSourceIdentification, trRiskEvaluation.intConsequenceEvaluation, trRiskEvaluation.intLikelihoodEvaluation, trRiskEvaluation.txtRiskLevelEvaluation, trRiskEvaluation.bitRiskStatus, trRiskEvaluation.txtRiskOwner, trRiskEvaluation.intIdRiskAssessmentMatrix, vw_risk_assesment_matrix.txtTingkatKeparahan, vw_risk_assesment_matrix.txtSebaranResiko, vw_risk_assesment_matrix.txtLamaPemulihan, vw_risk_assesment_matrix.txtBiayaPemulihan, vw_risk_assesment_matrix.txtCitraPerusahaan,trRiskEvaluation.intIdRiskEvaluation');		
		$this->db->join('vw_risk_assesment_matrix', 'trRiskEvaluation.intIdRiskAssessmentMatrix = vw_risk_assesment_matrix.intIdRiskAssessmentMatrix');		
		$this->db->order_by('trRiskEvaluation.intIdRiskEvaluation', 'asc');		
		return $this->db->get_where($this->table, $where);		
	}

	public function simpanRevaluation($data) {		
		$this->db->insert($this->table, $data);
		$data_last = [
			"bitLastStatusRiskRegister" 		=> $data["bitRiskStatus"],												
			"txtLastRiskLevel" 					=> $data["txtRiskLevelEvaluation"],
			"intLastIdRiskAssessmentMatrixEval" => $data["intIdRiskAssessmentMatrix"],
		];
		$this->db->update('trRiskIdentification', $data_last, [
			'intIdRiskSourceIdentification' => $data['intIdRiskSourceIdentification']
		]);
		return true;
	}
}
