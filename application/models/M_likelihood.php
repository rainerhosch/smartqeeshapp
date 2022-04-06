<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_likelihood.php
 *  File Type             : Model
 *  File Package          : CI_Model
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 02/04/2022
 *  Quots of the code     : 'sabar ya'
 */
class M_likelihood extends CI_Model{

    public $table = 'mLikelihood';

    public function get()
    {
        $this->db->select('ml.*,us.username as insertedBy,us2.username as updatedBy');
        $this->db->from('mLikelihood ml');
        $this->db->join('user us','ml.intInsertedBy=us.user_id','left');
        $this->db->join('user us2','ml.intUpdatedBy=us2.user_id','left');
        return $this->db->get();
    }

    public function create($data)
    {
        return $this->db->insert($this->table,$data);
    }

    public function update($id,$data)
    {
        $this->db->where('intIdLikelihood',$id);
        $this->db->update($this->table,$data);
    }

    public function destroy($id)
    {
        $this->db->where('intIdLikelihood',$id);
        $this->db->delete($this->table);
    }

    public function search($keyword)
    {
        $this->db->like('intLikelihoodNumber',$keyword);
        $this->db->or_like('txtNamaLikelihood',$keyword);
        $this->db->select('ml.*,us.username as insertedBy,us2.username as updatedBy');
        $this->db->from('mLikelihood ml');
        $this->db->join('user us','ml.intInsertedBy=us.user_id');
        $this->db->join('user us2','ml.intUpdatedBy=us2.user_id');
        $result = $this->db->get();
        return $result->result_array();
    }

}