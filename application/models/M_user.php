<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_user.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 29/01/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class M_user extends CI_Model
{
    public function get_user($field, $where = null)
    {
        $this->db->select($field);
        $this->db->from('mEmployee');
        $this->db->join('user', 'mEmployee.intIdEmployee=`user`.employee_id');
        $this->db->join('user_role', 'user_role.role_id=user.role_id');        
		if ($where != null) {
			$this->db->where($where);
		}
		
		// $data =  $this->db->get();
		// var_dump($this->db->last_query());exit;
		return $this->db->get();
	}

	public function get_role_user($where = null)
	{
		$this->db->select('role_id, role_type, description');
		$this->db->from('user_role');
		if ($where != null) {
			$this->db->where($where);
		}
		return $this->db->get();
	}

	public function getRole($nama)
	{
		$this->db->where('role_type', $nama);
		return $this->db->get('user_role');
	}

	// insert data
	public function insert_data($table, $data)
	{
		$insert_status = $this->db->insert($table, $data);
		$id_insert = $this->db->insert_id();
		if ($insert_status) {
			return $id_insert;
		} else {
			return false;
		}
	}

	// update data
	public function update_data($table, $id, $data)
	{
		$field = $table . '_id';
		$this->db->where($field, $id);
		$this->db->update($table, $data);
		$updated_status = $this->db->affected_rows();
		if ($updated_status) {
			return true;
		} else {
			return false;
		}
	}

	public function update_user_password($data, $where)
	{
		$data_exist = $this->db->get_where('user', $where)->row();
		if ($data_exist != null) {			
			if ($data_exist->password != $data['password']) {				
				$this->db->update('user', $data, $where);
				$updated_status = $this->db->affected_rows();
				if ($updated_status) {
					return [
						"status" => true,
						"message" => "OK"
					];
				} else {
					return [
						"status" => false,
						"message" => "Password Tidak Dapat Disimpan"
					];
				}
			} else {
				return [
						"status" => false,
						"message" => "Password Tidak Boleh Sama"
					];
			}
		} else {
			return [
				"status" => false,
				"message" => "User Tidak Ditemukan"
			];
		}
	}

	public function delete_data($tbl, $where)
	{
		$this->db->where($where);
		$this->db->delete($tbl);
		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus_user($id_employee)
	{
		$this->db->where('employee_id', $id_employee);
		$this->db->delete('user');
	}

	public function getDataUserDept($id)
	{
		$this->db->select('mEmployee.txtNameEmployee as nama, mSection.txtNamaSection, mDepartemen.txtNamaDepartement, mPlant.txtSingkatan as txtCodePlant, mPlant.txtNamaPlant, mDepartemen.txtSingkatan as txtCodeDept, user.user_id');
		$this->db->from('user');
		$this->db->join('mEmployee', 'user.id_employee = mEmployee.intIdEmployee');
		$this->db->join('mDepartemen', 'mEmployee.intIdDepartment = mDepartemen.intIdDepartement');
		$this->db->join('mSection', 'mDepartemen.intIdSection = mSection.intIdSection');
		$this->db->join('mPlant', 'mSection.intIdPlant = mPlant.intIdPlant');
		$this->db->where('user.user_id', $id);
		return $this->db->get()->row();
	}
}
