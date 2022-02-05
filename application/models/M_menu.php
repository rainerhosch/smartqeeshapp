<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_menu.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 02/02/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class M_menu extends CI_Model
{
    public function get_all_menu($where = null)
    {
        $this->db->select('id_menu, nama_menu, link_menu, type, icon, is_active, editable, color');
        $this->db->from('menu');
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }

    public function get_all_submenu($where = null)
    {
        $this->db->select('sm.*');
        $this->db->from('submenu sm');
        $this->db->join('menu m', 'm.id_menu=sm.id_menu');
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }


    public function get_user_access_menu($where = null)
    {
        // 'SELECT mn.* FROM menu mn JOIN user_access_menu uam ON uam.id_menu=mn.id_menu JOIN user_role ur ON ur.role_id=uam.role_id WHERE ur.role_id=1 AND mn.is_active=1';
        $this->db->select('mn.id_menu, mn.nama_menu, mn.link_menu, mn.type, mn.color, mn.icon, mn.is_active, mn.editable');
        $this->db->from('menu mn');
        $this->db->join('user_access_menu uam', 'uam.id_menu=mn.id_menu');
        $this->db->join('user_role ur', 'ur.role_id=uam.role_id');
        if ($where != null) {
            $this->db->where($where);
        }
        return $this->db->get();
    }

    // Update Menu
    public function updateMenu($tbl, $id_menu, $data)
    {
        $this->db->where('id_menu', $id_menu);
        $this->db->update($tbl, $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
