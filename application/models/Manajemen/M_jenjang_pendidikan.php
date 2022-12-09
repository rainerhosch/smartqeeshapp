<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_jenjang_pendidikan.php
 *  File Type             : Model
 *  File Package          : CI_Model
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 04/04/2022
 *  Quots of the code     : 'sabar ya'
 */


class M_jenjang_pendidikan extends CI_Model{
	
	public $table = 'mJenjangPendidikan';

	public function get()
	{
		return $this->db->get($this->table);
	}


	public function create($data)
    {
        return $this->db->insert($this->table,$data);
    }

    public function update($id,$data)
    {
        $this->db->where('intIdJenjangPendidikan',$id);
        $this->db->update($this->table,$data);
    }

    public function destroy($id)
    {
        $this->db->where('intIdJenjangPendidikan',$id);
        $this->db->delete($this->table);
    }

    public function search($keyword)
    {
        $this->db->like('txtNamaJenjangPendidikan',$keyword);
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get();
    }
	public function checkJenjangPendidikan($id,$table,$column)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($column, $id);
		return $this->db->get();
	}
}
