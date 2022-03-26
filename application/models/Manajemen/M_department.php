<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_department.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Reki Maulid
 *  Date Created          : 26/03/2022
 *  Quots of the code     : sukses itu ketika running code pertama dan tidak ada error :D
 */
class M_department extends CI_Model
{
     var $table = 'mDepartemen'; //nama tabel dari database
     //CONTROL
     public function validatePlantNamaDepartment($id_plant, $nama_department)
     {
          $this->db->where("intIdPlant", $id_plant);
          $this->db->where("txtNamaDepartement", $nama_department);
          return $this->db->get($this->table)->row_array();
     }

     //ACTION
     public function getsDepartment()
     {
          return $this->db->get_where($this->table, ["bitActive" => true])->result_array();
     }

     public function insertData($data)
     {
          $this->db->insert($this->table, $data);
     }
}
