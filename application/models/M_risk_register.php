<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_Input_new_risk_register.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 29/01/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
 
class M_risk_register extends CI_Model
{
    
    public function risk_category($where = null)
    {
        $this->db->select('*');
        $this->db->from('risk_category');
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }
    
    public function risk_condition($where = null)
    {
        $this->db->select('*');
        $this->db->from('risk_condition');
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }
    
    public function risk_status($where = null)
    {
        $this->db->select('*');
        $this->db->from('risk_status');
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }
    
    public function risk_type($where = null)
    {
        $this->db->select('*');
        $this->db->from('risk_type');
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }
    
    public function user($where = null)
    {
        $this->db->select('user.user_id,user.username,user_detail.nama');
        $this->db->from('user');
        $this->db->join('user_detail', 'user_detail.user_detail_id=user.user_detail_id');
        $this->db->join('user_role', 'user_role.role_id=user.role_id');

        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }
    
    public function dataRisk($where = null)
    {
        $this->db->select('*');
        $this->db->from('risk_management');
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }
    
    // insert data
    public function insert_data($table, $data)
    {
        $insert_status = $this->db->insert($table, $data);
        $id_insert = $this->db->insert_id();
        if ($insert_status) {
            return $id_insert;
        } else {
            return false;
        }
    }

    // update data
    public function update_data($table, $id, $data)
    {
        $field = $table . '_id';
        $this->db->where($field, $id);
        $this->db->update($table, $data);
        $updated_status = $this->db->affected_rows();
        if ($updated_status) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_data($tbl, $where)
    {
        $this->db->where($where);
        $this->db->delete($tbl);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
