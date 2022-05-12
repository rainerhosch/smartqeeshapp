<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_risk_assessment_matrix.php
 *  File Type             : Model
 *  File Package          : CI_Model
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 11/04/2022
 *  Quots of the code     : 'Sabar ya dengan kode orang'
 */
class M_risk_assessment_matrix extends CI_Model
{

    public $table = 'mRiskAssessmentMatrix';

    public function get($id = NULL)
    {
        if ($id) {
            $this->db->select('risk_mat.*,lh.txtNamaLikelihood as lhNama,rc.txtNamaTingkatKlasifikasi as rcKlasifikasi,us.username as us1Username,us2.username as us2Username');
            $this->db->from('mRiskAssessmentMatrix risk_mat');
            $this->db->join('user us', 'risk_mat.intInsertedBy=us.user_id', 'left');
            $this->db->join('user us2', 'risk_mat.intUpdatedBy=us2.user_id', 'left');
            $this->db->join('mLikelihood lh', 'risk_mat.intIdLikelihood=lh.intIdLikelihood', 'left');
            $this->db->join('mRiskConsequence rc', 'risk_mat.intIdRiskConsequence=rc.intIdRiskConsequence', 'left');
            $this->db->order_by('intIdRiskAssessmentMatrix', 'DESC');
            $this->db->where('intIdRiskAssessmentMatrix', $id);
        } else {
            $this->db->select('risk_mat.*,lh.txtNamaLikelihood as lhNama,rc.txtNamaTingkatKlasifikasi as rcKlasifikasi');
            $this->db->from('mRiskAssessmentMatrix risk_mat');
            $this->db->join('mLikelihood lh', 'risk_mat.intIdLikelihood=lh.intIdLikelihood', 'left');
            $this->db->join('mRiskConsequence rc', 'risk_mat.intIdRiskConsequence=rc.intIdRiskConsequence', 'left');
            $this->db->order_by('intIdRiskAssessmentMatrix', 'DESC');
        }
        return $this->db->get();
    }

    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, [
            'name' => $data['name'],
            'description' => $data['description']
        ]);
    }

    public function destroy($id)
    {
        $this->db->where('intIdRiskAssessmentMatrix', $id);
        $this->db->delete($this->table);
    }

    public function search($keyword)
    {
        $this->db->like('name', $keyword);
        $this->db->or_like('description', $keyword);
        $result = $this->db->get($this->table);
        return $result->result_array();
    }

    public function getConsequence()
    {
        return $this->db->get('mRiskConsequence')->result_array();
    }
    public function getLikelihood()
    {
        return $this->db->get('mLikelihood')->result_array();
    }

    public function getJenisTingkatResiko()
    {
        $this->db->select("txtTingkatResiko");
        $this->db->from($this->table);
        $this->db->group_by("txtTingkatResiko");
        $this->db->order_by("intIdRiskAssessmentMatrix", "asc");

        return $this->db->get()->result_array();
    }
}
