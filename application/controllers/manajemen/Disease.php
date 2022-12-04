<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Disease.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 06/06/2022
 *  Quots of the code     : 'sabar ya'
 */

class Disease extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->library('form_validation');
        $this->load->model('Manajemen/M_disease', 'disease');
    }

    public function index()
    {
        $this->form_validation->set_rules('txtNamaDisease', 'NamaDisease', 'trim|required|is_unique[mDisease.txtNamaDisease]', ['is_unique' => 'Nama penyakit sudah ada!']);

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Disease';
        $data['content'] = 'pages/manajemen/v_disease';
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
                'data' => $this->disease->get()->result()
            ];
        }
        echo json_encode($data);
    }

	public function store()
    {
        if($this->input->is_ajax_request())
        {
            $input = $this->input->post();
            
            if($input['intidDisease'])
            {
                $id = $input['intidDisease'];
                $datainput = [
                    'txtNamaDisease' => $this->input->post('txtNamaDisease'),
                    'txtMedicalTerm' => $this->input->post('txtMedicalTerm')
                ];
                // proses update
                $status =  $this->disease->update($id,$datainput);
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'msg' => 'Disease berhasil diupdate',
                    'data' => NULL
                ];
            }else{
				$txtNamaDisease = $this->input->post('txtNamaDisease');
                $txtMedicalTerm = $this->input->post('txtMedicalTerm');
                $datainput = [
                    'txtNamaDisease' => $txtNamaDisease,
                    'txtMedicalTerm' => $txtMedicalTerm
                ];
                $status =  $this->disease->create($datainput);
                $data = [
                    'code' => 200,
                    'status' => $status,
                    'msg' => 'Disease berhasil ditambahkan',
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
                $this->disease->destroy($id);
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Disease berhasil dihapus',
                    'data' => NULL
                ];
            }else{
                // jika id tidak ada
                $data = [
                    'code' => 400,
                    'status' => false,
                    'msg' => 'Disease tidak ditemukan',
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
            $result  = $this->disease->search($keyword)->result();
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
