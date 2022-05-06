<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_risk_treatment_future.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Dimas Fauzan
 *  Date Created          : 30/03/2022
 *  Quots of the code     :
 */ 

class M_risk_treatment_future extends CI_Model {

    var $table = 'trRiskTreatmentFuture'; //nama tabel dari database    

    public function simpan($data)
    {
        $this->db->insert($this->table, $data);
		return $this->getLastData($data);
    }

	public function getLastData($where) {
		$this->db->order_by('intIdTrRiskConsideration', 'desc');
		return $this->db->get_where($this->table, $where);		
	}

	public function getData ($where)
	{
		return $this->db->get_where($this->table, $where);		
	}

}
