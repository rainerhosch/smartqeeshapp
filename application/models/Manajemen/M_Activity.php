<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_activity.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Reki Maulid
 *  Date Created          : 28/03/2022
 *  Quots of the code     : sukses itu ketika running code pertama dan tidak ada error :D
 */
class M_activity extends CI_Model
{
     var $table = 'mActivity'; //nama tabel dari database
     //CONTROL
     public function validateSectionActivity($id_section, $nama_activity)
     {
          $this->db->where("intIdSection", $id_section);
          $this->db->where("txtNamaActivity", $nama_activity);
          return $this->db->get($this->table)->row_array();
     }

     //ACTION
     public function getsActivitySection()
     {
          /*
               SELECT mActivity.intIdActivity, txtNamaActivity, mActivity.bitActive, txtNamaSection from mActivity join mSection on mActivity.intIdSection = mSection.intIdSection
          */
          $this->db->select("mActivity.intIdActivity, txtNamaActivity, mActivity.bitActive, txtNamaSection");
          $this->db->join("mSection", "mActivity.intIdSection = mSection.intIdSection");
          return $this->db->get($this->table)->result_array();
     }

     public function getsActivityActive()
     {
          return $this->db->get_where($this->table, ["bitActive" => true])->result();
     }

     public function insertData($data)
     {
          $this->db->insert($this->table, $data);
          return $this->db->insert_id();
     }

     public function getActivity($id)
     {
          return $this->db->get_where($this->table, ["intIdActivity" => $id])->row_array();
     }

     public function updateData($data, $id)
     {
          $this->db->update($this->table, $data, ["intIdActivity" => $id]);
     }
}
