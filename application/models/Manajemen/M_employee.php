<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_employee.php
 *  File Type             : Model
 *  File Package          : CI_Model
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 07/06/2022
 *  Quots of the code     : 'sabar ya'
 */


class M_employee extends CI_Model{
	
	public $table = 'mEmployee';

	public function get($limit = 20)
	{
		
		$this->db->select('me.*,md.txtNamaDepartement,mj.txtNamaJabatan,mp.txtNamaPlant');
		$this->db->from('mEmployee me');
		$this->db->join('mDepartemen md','md.intIdDepartement = me.intIdDepartment');
		$this->db->join('mJabatan mj','mj.intIdJabatan = me.intIdJabatan');
		$this->db->join('mPlant mp','mp.intIdPlant = me.intIdPlant');
		$this->db->limit($limit);
		$this->db->order_by('txtNameEmployee','ASC');
		return $this->db->get();
	}

	public function find($id)
	{
		$this->db->where('intIdEmployee',$id);
		$this->db->select('me.*,md.txtNamaDepartement,mj.txtNamaJabatan,mp.txtNamaPlant,ma.txtNamaAgama,mpr.txtNamaProvinsi,mkt.txtNamaKota,mjp.txtNamaJenjangPendidikan,mng.txtNamaNegara,mng.txtKodeNegara');
		$this->db->from('mEmployee me');
		$this->db->join('mDepartemen md','md.intIdDepartement = me.intIdDepartment');
		$this->db->join('mJabatan mj','mj.intIdJabatan = me.intIdJabatan');
		$this->db->join('mPlant mp','mp.intIdPlant = me.intIdPlant');
		$this->db->join('mAgama ma','ma.intIdAgama = me.intIdAgama');
		$this->db->join('mJenjangPendidikan mjp','mjp.intIdJenjangPendidikan = me.intIdJenjangPendidikan');
		$this->db->join('mProvinsi mpr','mpr.intIdProvinsi = me.intIdProvinsi');
		$this->db->join('mNegara mng','mng.txtKodeNegara = mpr.txtKodeNegara');
		$this->db->join('mKota mkt','mkt.intIdKota = me.intIdKota');
		return $this->db->get();
	}

	public function findByNik($txtNikEmployee)
	{
		$this->db->where('txtNikEmployee',$txtNikEmployee);
		$this->db->select('me.*,md.txtNamaDepartement,mj.txtNamaJabatan,mp.txtNamaPlant,ma.txtNamaAgama,mpr.txtNamaProvinsi,mkt.txtNamaKota,mjp.txtNamaJenjangPendidikan,mng.txtNamaNegara,mng.txtKodeNegara');
		$this->db->from('mEmployee me');
		$this->db->join('mDepartemen md','md.intIdDepartement = me.intIdDepartment');
		$this->db->join('mJabatan mj','mj.intIdJabatan = me.intIdJabatan');
		$this->db->join('mPlant mp','mp.intIdPlant = me.intIdPlant');
		$this->db->join('mAgama ma','ma.intIdAgama = me.intIdAgama');
		$this->db->join('mJenjangPendidikan mjp','mjp.intIdJenjangPendidikan = me.intIdJenjangPendidikan');
		$this->db->join('mProvinsi mpr','mpr.intIdProvinsi = me.intIdProvinsi');
		$this->db->join('mNegara mng','mng.txtKodeNegara = mpr.txtKodeNegara');
		$this->db->join('mKota mkt','mkt.intIdKota = me.intIdKota');
		return $this->db->get();
	}

	public function create($data)
    {
        $this->db->insert($this->table,$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
    }

    public function update($id,$data)
    {
        $this->db->where('intIdEmployee',$id);
        $this->db->update($this->table,$data);
    }

    public function destroy($id)
    {
        $this->db->where('intIdEmployee',$id);
        $this->db->delete($this->table);
    }

    public function search($keyword)
    {
        $this->db->like('txtNameEmployee',$keyword);
		$this->db->select('me.*,md.txtNamaDepartement,mj.txtNamaJabatan,mp.txtNamaPlant');
		$this->db->from('mEmployee me');
		$this->db->join('mDepartemen md','md.intIdDepartement = me.intIdDepartment');
		$this->db->join('mJabatan mj','mj.intIdJabatan = me.intIdJabatan');
		$this->db->join('mPlant mp','mp.intIdPlant = me.intIdPlant');
		$this->db->order_by('txtNameEmployee','ASC');
		return $this->db->get();
    }

}
