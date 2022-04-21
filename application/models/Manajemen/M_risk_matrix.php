<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_risk_matrix.php
 *  File Type             : Model
 *  File Package          : CI_Model
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Dimas Fauzan
 *  Date Created          : 16/04/2022
 *  Quots of the code     : '-'
 */
class M_risk_matrix extends CI_Model{

    public $table = 'vw_risk_assesment_matrix';

    public function getMatrix($where)
    {        
        return $this->db->get_where($this->table, $where);
    }
}
