<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_provinsi.php
 *  File Type             : Model
 *  File Package          : CI_Model
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 02/08/2022
 *  Quots of the code     : 'sabar ya'
 */


class M_provinsi extends CI_Model{
	
	public $table = 'mprovinsi';

	public function get()
	{
		$this->db->select('prov.*,ngr.txtNamaNegara');
		$this->db->from('mprovinsi prov');
		$this->db->join('mNegara ngr','prov.intIdNegara=ngr.intIdNegara');
		return $this->db->get();
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
        $this->db->where('intIdProvinsi',$id);
        $this->db->update($this->table,$data);
    }

    public function destroy($id)
    {
        $this->db->where('intIdProvinsi',$id);
        $this->db->delete($this->table);
    }

    public function search($keyword)
    {
		$this->db->like('prov.txtNamaProvinsi',$keyword);
		$this->db->or_like('ngr.txtNamaNegara',$keyword);
		$this->db->select('prov.*,ngr.txtNamaNegara');
		$this->db->from('mprovinsi prov');
		$this->db->join('mNegara ngr','prov.intIdNegara=ngr.intIdNegara');
		return $this->db->get();
    }

	public function checkProvinsi($id,$table,$column)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($column, $id);
		return $this->db->get();
	}

}
