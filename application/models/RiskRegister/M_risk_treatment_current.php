<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_risk_type.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 30/03/2022
 *  Quots of the code     :
 */ 

class M_risk_treatment_current extends CI_Model {

    var $table = 'trRiskTreatmentCurrent'; //nama tabel dari database

    public function simpan($data)
    {
        $this->db->insert($this->table, $data);		
    }

	public function getData ($where)
	{
		return $this->db->get_where($this->table, $where);		
	}

}
