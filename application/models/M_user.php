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
        $this->db->from('users');
        $this->db->join('user_detail', 'user_detail.user_detail_id=users.user_detail_id');
        $this->db->join('user_role', 'user_role.role_id=users.role_id');

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
    public function update_data($table, $parameter, $data)
    {
        $this->db->where($parameter);
        $this->db->update($table, $data);
        $updated_status = $this->db->affected_rows();
        if ($updated_status) {
            return true;
        } else {
            return false;
        }
    }
}
