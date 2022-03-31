<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_RiskConsequence.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Reki Maulid
 *  Date Created          : 30/03/2022
 *  Quots of the code     : sukses itu ketika running code pertama dan tidak ada error :D
 */
class M_RiskConsequence extends CI_Model
{
     var $table = 'mRiskConsequence'; //nama tabel dari database
     //CONTROL
     public function validateTingkatKlasifikasi($tingkat_klasifikasi)
     {
          $this->db->where("intTingkatKlasifikasi", $tingkat_klasifikasi);
          return $this->db->get($this->table)->row_array();
     }

     //ACTION
     public function getsRiskConsequence()
     {
          return $this->db->get($this->table)->result_array();
     }

     public function getRiskConsequence($id)
     {
          return $this->db->get_where($this->table, ["intIdRiskConsequence" => $id])->row_array();
     }

     public function insertData($data)
     {
          $this->db->insert($this->table, $data);
          return $this->db->insert_id();
     }

     public function updateData($data, $id)
     {
          $this->db->update($this->table, $data, ["intIdRiskConsequence" => $id]);
     }
}
