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

	private function getData($where)
	{
		$this->db->order_by('intIdRiskEvaluation', 'desc');		
		return $this->db->get_where($this->table, $where);		
	}

	public function simpan_tahapan_baru($data) {		
		$this->db->insert($this->table, $data);
		$data_last = [
			"bitLastStatusRiskRegister" 	=> $data["bitStatusKepentingan_revaluation"],												
			"txtLastRiskLevel" 				=> $data["txtRiskLevel_revaluation"],
			"dtmUpdatedDate" 				=> $data["dtmUpdatedDate"],
		];
		$this->db->update('trRiskIdentification', $data_last, [
			'intIdRiskSourceIdentification' => $data['intIdRiskSourceIdentification']
		]);
		return true;
	}
}
