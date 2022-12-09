<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_bodypart.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 15/07/2022
 *  Quots of the code     : 'sebuah code program bukanlah sebatas perintah-perintah yang ditulis di komputer, melainkan sebuah kesempatan berkomunikasi antara komputer dan manusia. (bagi yang tidak punya teman wkwk)'
 */
class M_bodypart extends CI_Model
{

    public function get_data($where = null, $search = null)
    {
        $this->db->select('*');
        $this->db->from('mBodyPart');
        if ($where != null) {
            $this->db->where($where);
        }
        if ($search != null) {
            $this->db->like('txtNameBodyPart', $search, 'after');
        }
        return $this->db->get();
    }
    // insert data
    public function insert_data($data)
    {
        $insert_status = $this->db->insert('mBodyPart', $data);
        $id_insert = $this->db->insert_id();
        if ($insert_status) {
            return $id_insert;
        } else {
            return false;
        }
    }
    // update data
    public function update_data($id, $data)
    {
        $this->db->where('intIdBodyPart', $id);
        $this->db->update('mBodyPart', $data);
        $updated_status = $this->db->affected_rows();
        if ($updated_status) {
            return true;
        } else {
            return false;
        }
    }
    // delete
    public function delete_data($where)
    {
        $this->db->where($where);
        $this->db->delete('mBodyPart');
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
