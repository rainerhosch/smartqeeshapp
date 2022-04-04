<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Likelihood.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 04/04/2022
 *  Quots of the code     : 'sabar ya'
 */
class Likelihood extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_likelihood', 'likelihood');
    }

    public function index()
    {

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Likelihood';
        $data['content'] = 'pages/manajemen/v_likelihood';
        $this->load->view('template', $data);
    }

    public function get_json()
    {
        if($this->input->is_ajax_request())
        {
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => 'Success',
                'data' => $this->likelihood->get()->result_array()
            ];
        }
        echo json_encode($data);
    }

    public function store()
    {
        if($this->input->is_ajax_request())
        {
            $input = $this->input->post();
            
            if($input['intIdLikelihood'])
            {
                $id = $input['intIdLikelihood'];
                $datainput = [
                    'intUpdatedBy' => $this->session->userdata('user_id'),
                    'dtmUpdatedDate' => date('Y-m-d'),
                    'intLikelihoodNumber' => $this->input->post('intLikelihoodNumber'),
                    'txtNamaLikelihood' => $this->input->post('txtNamaLikelihood'),
                    'txtKeteranganLikelihood' => $this->input->post('txtKeteranganLikelihood')
                ];
                // proses update
                $status =  $this->likelihood->update($id,$datainput);
                $data = [
                    'code' => 200,
                    'status' => 'OK',
                    'msg' => 'Likelihood berhasil diupdate',
                    'data' => NULL
                ];
            }else{
                $datainput = [
                    'intInsertedBy' => $this->session->userdata('user_id'),
                    'dtmInsertedDate' => date('Y-m-d'),
                    'intUpdatedBy' => $this->session->userdata('user_id'),
                    'dtmUpdatedDate' => date('Y-m-d'),
                    'intLikelihoodNumber' => $this->input->post('intLikelihoodNumber'),
                    'txtNamaLikelihood' => $this->input->post('txtNamaLikelihood'),
                    'txtKeteranganLikelihood' => $this->input->post('txtKeteranganLikelihood')
                ];
                $status =  $this->likelihood->create($datainput);
                $data = [
                    'code' => 200,
                    'status' => $status,
                    'msg' => 'Likelihood berhasil ditambahkan',
                    'data' => NULL
                ];
            }

            echo json_encode($data);
        }
    }

    public function destroy()
    {
        if($this->input->is_ajax_request())
        {
            $id = $this->input->post('id');
            if($id)
            {
                $this->likelihood->destroy($id);
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Likelihood berhasil dihapus',
                    'data' => NULL
                ];
            }else{
                // jika id tidak ada
                $data = [
                    'code' => 400,
                    'status' => false,
                    'msg' => 'Likelihood tidak ditemukan',
                    'data' => NULL
                ];
            }
            echo json_encode($data);
        }

    }

    public function search()
    {
        if($this->input->is_ajax_request())
        {
            $keyword = $this->input->post('keyword');
            $result  = $this->likelihood->search($keyword);
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => '',
                'data' => $result
            ];
        }

        echo json_encode($data);
    }

}