<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_wilayah.php
 *  File Type             : Model
 *  File Package          : CI_Model
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 06/06/2022
 *  Quots of the code     : 'sabar ya'
 */


class M_wilayah extends CI_Model{
	
	public $table = 'mWilayah';

	public function get()
	{
		$this->db->select('mw.*,mn.txtNamaNegara');
		$this->db->from('mWilayah mw');
		$this->db->join('mNegara mn', 'mn.txtKodeNegara = mw.txtKodeNegara');
		$this->db->limit(20);
		return $this->db->get();
	}

	public function find($where)
	{
		$this->db->where($where);
		return $this->db->get($this->table);
	}

	public function getByKodeNegara($kode_negara)
	{
		$this->db->where('txtKodeNegara',$kode_negara);
		return $this->db->get($this->table);
	}

	public function latest()
	{
		$this->db->order_by('intIdWilayah','DESC');
		return $this->db->get($this->table);
	}

	public function create($data)
    {
        return $this->db->insert($this->table,$data);
    }

    public function update($id,$data)
    {
        $this->db->where('intIdWilayah',$id);
        $this->db->update($this->table,$data);
    }

    public function destroy($id)
    {
        $this->db->where('intIdWilayah',$id);
        $this->db->delete($this->table);
    }

    public function search($keyword)
    {
        $this->db->from('mWilayah mw');
		$this->db->join('mNegara mn', 'mn.txtKodeNegara = mw.txtKodeNegara');
        $this->db->like('mw.txtNamaWilayah',$keyword);
		$this->db->or_like('mn.txtNamaNegara',$keyword);
        $this->db->select('*');
        return $this->db->get();
    }

}
