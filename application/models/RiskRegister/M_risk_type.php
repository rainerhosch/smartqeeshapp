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

class M_risk_type extends CI_Model {

    

    public function getType()
    {
        return $this->db->get('risk_type')->result_array();
    }

}