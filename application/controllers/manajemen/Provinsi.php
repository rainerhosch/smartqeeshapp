<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Provinsi.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 06/06/2022
 *  Quots of the code     : 'sabar ya'
 */

class Provinsi extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('Manajemen/M_provinsi', 'provinsi');
    }

    public function index()
    {

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'provinsi';
        $data['content'] = 'pages/manajemen/v_provinsi';
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
                'data' => $this->provinsi->get()->result()
            ];
        }
        echo json_encode($data);
    }

	public function store()
    {
        if($this->input->is_ajax_request())
        {
            $input = $this->input->post();
            
            if($input['intIdProvinsi'])
            {
                $datainput = [
                    'intIdNegara' => $this->input->post('intIdNegara'),
					'txtNamaProvinsi' => $this->input->post('txtNamaProvinsi')
                ];
                // proses update
                $status =  $this->provinsi->update($input['intIdprovinsi'],$datainput);
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'msg' => 'Provinsi berhasil diupdate',
                    'data' => NULL
                ];
            }else{
				$datainput = [
                    'intIdNegara' => $this->input->post('intIdNegara'),
					'txtNamaProvinsi' => $this->input->post('txtNamaProvinsi')
                ];
                $status =  $this->provinsi->create($datainput);
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'msg' => 'provinsi berhasil ditambahkan',
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
				$already = $this->provinsi->checkProvinsi($id,'memployee','intIdProvinsi')->num_rows();
				if($already > 0)
				{
					$data = [
						'code' => 400,
						'status' => false,
						'msg' => 'Provinsi tidak boleh dihapus',
						'data' => NULL
					];
				}else{
					$this->provinsi->destroy($id);
					$data = [
						'code' => 200,
						'status' => true,
						'msg' => 'Provinsi berhasil dihapus',
						'data' => NULL
					];
				}
            }else{
                // jika id tidak ada
                $data = [
                    'code' => 400,
                    'status' => false,
                    'msg' => 'provinsi tidak ditemukan',
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
            $result  = $this->provinsi->search($keyword)->result();
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
