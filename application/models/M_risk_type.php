<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_risk_type.php
 *  File Type             : Model
 *  File Package          : CI_Model
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 02/04/2022
 *  Quots of the code     : 'sabar ya'
 */
class M_risk_type extends CI_Model{

    public $table = 'mRisk_type';

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
        $this->db->where('id',$id);
        $this->db->update($this->table,[
            'name' => $data['name'],
            'description' => $data['description']
        ]);
    }

    public function destroy($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table);
    }

    public function search($keyword)
    {
        $this->db->like('name',$keyword);
        $this->db->or_like('description',$keyword);
        $result = $this->db->get($this->table);
        return $result->result_array();
    }

}