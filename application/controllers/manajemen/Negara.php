<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Negara.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 06/06/2022
 *  Quots of the code     : 'sabar ya'
 */

class Negara extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('Manajemen/M_negara', 'negara');
    }

    public function index()
    {

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Negara';
        $data['content'] = 'pages/manajemen/v_negara';
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
                'data' => $this->negara->get()->result()
            ];
        }
        echo json_encode($data);
    }

	public function get()
    {
        if($this->input->is_ajax_request())
        {
			$kwn = $this->input->post('kwn');
			$data = $this->negara->getByKewarganegaraan($kwn)->result();
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => 'Success',
                'data' => $data
            ];
        }
        echo json_encode($data);
    }

	public function store()
    {
        if($this->input->is_ajax_request())
        {
            $input = $this->input->post();
            
            if($input['intIdNegara'])
            {
                $datainput = [
                    'txtKodeNegara' => $this->input->post('txtKodeNegara'),
					'txtNamaNegara' => $this->input->post('txtNamaNegara')
                ];
                // proses update
                $status =  $this->negara->update($input['intIdNegara'],$datainput);
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'msg' => 'Negara berhasil diupdate',
                    'data' => NULL
                ];
            }else{
				$datainput = [
                    'txtKodeNegara' => $this->input->post('txtKodeNegara'),
					'txtNamaNegara' => $this->input->post('txtNamaNegara')
                ];
                $status =  $this->negara->create($datainput);
                $data = [
                    'code' => 200,
                    'status' => $status,
                    'msg' => 'Negara berhasil ditambahkan',
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
				// cek apakah agama sudah dipake oleh table lain
				$already = $this->negara->checkNegara($id,'memployee','intIdNegara')->num_rows();
				if($already > 0)
				{
					$data = [
						'code' => 400,
						'status' => false,
						'msg' => 'Negara tidak boleh dihapus',
						'data' => NULL
					];
				}else{
					$this->negara->destroy($id);
					$data = [
						'code' => 200,
						'status' => true,
						'msg' => 'Negara berhasil dihapus',
						'data' => NULL
					];
				}
            }else{
                // jika id tidak ada
                $data = [
                    'code' => 400,
                    'status' => false,
                    'msg' => 'Negara tidak ditemukan',
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
            $result  = $this->negara->search($keyword)->result();
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
