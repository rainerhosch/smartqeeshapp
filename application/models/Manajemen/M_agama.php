<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_agama.php
 *  File Type             : Model
 *  File Package          : CI_Model
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 04/04/2022
 *  Quots of the code     : 'sabar ya'
 */


class M_agama extends CI_Model{
	
	public $table = 'mAgama';

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
        $this->db->where('intIdAgama',$id);
        $this->db->update($this->table,$data);
    }

    public function destroy($id)
    {
        $this->db->where('intIdAgama',$id);
        $this->db->delete($this->table);
    }

    public function search($keyword)
    {
        $this->db->like('txtNamaAgama',$keyword);
        $this->db->select('*');
        $this->db->from('mAgama');
        return $this->db->get();
    }

}
