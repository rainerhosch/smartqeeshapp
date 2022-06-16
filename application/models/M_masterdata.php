<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_masterdata.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 20/05/2022
 *  Quots of the code     : 'Carilah pacar seorang programmer, karena titik dan koma saja di parhatikan. Apalagi kamu! :D'
 */
class M_masterdata extends CI_Model
{
    // fungsi get data semua dinamis
    public function getData($field, $table, $tableJoin = null, $where = null, $order = null, $limit = null)
    {
        $this->db->select($field);
        $this->db->from($table);
        if ($where != null) {
            $this->db->where($where);
        }
        if ($order != null) {
            $this->db->order_by($order);
        }
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($tableJoin != null) {
            foreach ($tableJoin as $key => $value) {
                $this->db->join($value['table'], $value['fk_join']);
            }
        }
        return $this->db->get();
    }
}
