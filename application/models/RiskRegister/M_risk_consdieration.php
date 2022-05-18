<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_risk_type.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Dimas Fauzan
 *  Date Created          : 30/03/2022
 *  Quots of the code     :
 */ 

class M_risk_consdieration extends CI_Model {

    var $table = 'trRiskPriorityConsideration'; //nama tabel dari database    

    public function simpan($data)
    {
		$data_risk_future 			= $data["data_insert_risk_future"];
		$data_risk_consideration 	= $data["data_risk_consideration"];
		for ($i=0; $i < count($data_risk_consideration); $i++) { 
			$data_insert = [
				"intIdTrRiskTreatmentFuture" 	=> $data_risk_future->intIdTrRiskTreatmentFuture,
				"txtRiskPriorityConsideration" 	=> $data_risk_consideration[$i]
			];
			$this->db->insert($this->table, $data_insert);
		}        
    }

	public function getData ($where)
	{
		return $this->db->get_where($this->table, $where);		
	}

}
