<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_user.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 29/01/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class M_user extends CI_Model
{
    public function get_user($field, $where = null)
    {
        $this->db->select($field);
        $this->db->from('user');
        $this->db->join('user_detail', 'user_detail.user_detail_id=user.user_detail_id');
        $this->db->join('user_role', 'user_role.role_id=user.role_id');        

        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }

    public function get_role_user($where = null)
    {
        $this->db->select('role_id, role_type, description');
        $this->db->from('user_role');
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
