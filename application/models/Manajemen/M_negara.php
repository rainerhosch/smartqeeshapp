<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_negara.php
 *  File Type             : Model
 *  File Package          : CI_Model
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 04/04/2022
 *  Quots of the code     : 'sabar ya'
 */


class M_negara extends CI_Model{
	
	public $table = 'mNegara';

	public function get()
	{
		return $this->db->get($this->table);
	}

	public function getByKewarganegaraan($kwn)
	{
		if($kwn === 'wni')
		{
			$data = $this->db->get_where($this->table,array('txtNamaNegara'=>'indonesia'));
		}else{
			$this->db->where_not_in('txtNamaNegara','indonesia');
			$data = $this->db->get($this->table);
		}
		return $data;
	}

	public function find($where)
	{
		$this->db->where($where);
		return $this->db->get($this->table);
	}

	public function create($data)
    {
        $this->db->insert($this->table,$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
    }

    public function update($id,$data)
    {
        $this->db->where('intIdNegara',$id);
        $this->db->update($this->table,$data);
    }

    public function destroy($id)
    {
        $this->db->where('intIdNegara',$id);
        $this->db->delete($this->table);
    }

    public function search($keyword)
    {
        $this->db->like('txtKodeNegara',$keyword);
		$this->db->or_like('txtNamaNegara',$keyword);
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get();
    }

}
