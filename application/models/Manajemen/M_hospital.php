<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_hospital.php
 *  File Type             : Model
 *  File Package          : CI_Model
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 04/04/2022
 *  Quots of the code     : 'sabar ya'
 */


class M_hospital extends CI_Model{
	
	public $table = 'mHospital';

	public function get()
	{
		return $this->db->get($this->table);
	}

	public function find($where)
	{
		$this->db->where($where);
		return $this->db->get($this->table);
	}

	public function create($data)
    {
        return $this->db->insert($this->table,$data);
    }

    public function update($id,$data)
    {
        $this->db->where('IdHospital',$id);
        $this->db->update($this->table,$data);
    }

    public function destroy($id)
    {
        $this->db->where('IdHospital',$id);
        $this->db->delete($this->table);
    }

    public function search($keyword)
    {
        $this->db->like('HospitalName',$keyword);
        $this->db->select('*');
        $this->db->from('mHospital');
        return $this->db->get();
    }

}
