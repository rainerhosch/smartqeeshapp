<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_disease.php
 *  File Type             : Model
 *  File Package          : CI_Model
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 04/04/2022
 *  Quots of the code     : 'sabar ya'
 */


class M_disease extends CI_Model{
	
	public $table = 'mDisease';

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
        $this->db->where('intidDisease',$id);
        $this->db->update($this->table,$data);
    }

    public function destroy($id)
    {
        $this->db->where('intidDisease',$id);
        $this->db->delete($this->table);
    }

    public function search($keyword)
    {
        $this->db->like('txtNamaDisease',$keyword);
        $this->db->select('*');
        $this->db->from('mDisease');
        return $this->db->get();
    }

}
