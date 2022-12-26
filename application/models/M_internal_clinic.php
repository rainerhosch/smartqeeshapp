<?php
class M_internal_clinic extends CI_Model
{
    public $table = 'trInternalclinic';
    public function get_data()
    {
        return $this->db->get($this->table);
        
    }

    public function input_data($data)
    {
        $this->db->insert($this->table,$data);
        //$this->db->table('trinternalclinic')->insert($data);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
