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
     public function validateDepartmentActivity($id_department, $nama_activity)
     {
          $this->db->where("intIdDepartement", $id_department);
          $this->db->where("txtNamaActivity", $nama_activity);
          return $this->db->get($this->table)->row_array();
     }

     //ACTION
     public function getsActivityDepartment()
     {
          $this->db->select("mActivity.intIdActivity, txtNamaActivity, mActivity.bitActive, txtNamaDepartement");
          $this->db->join("mDepartemen", "mActivity.intIdDepartement = mDepartemen.intIdDepartement");
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

     public function getActivityBySection($id)
     {
          return $this->db->get_where($this->table, ['intIdSection' => $id, "bitActive" => 1])->result_array();
     }

	public function getActivityByDepartemen($id)
     {
          return $this->db->get_where($this->table, ['intIdDepartement' => $id, "bitActive" => 1])->result_array();
		
     }
}
