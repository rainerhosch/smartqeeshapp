<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Wilayah.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 06/06/2022
 *  Quots of the code     : 'sabar ya'
 */

class Wilayah extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('Manajemen/M_wilayah', 'wilayah');
    }

    public function index()
    {

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Wilayah';
        $data['content'] = 'pages/manajemen/v_wilayah';
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
                'data' => $this->wilayah->get()->result()
            ];
        }
        echo json_encode($data);
    }

	public function store()
    {
		if($this->input->is_ajax_request())
        {
            $input = $this->input->post();
            
            if($input['intIdWilayah'])
            {
                $id = $input['intIdWilayah'];
                $datainput = [
					'txtKodeNegara' => $this->input->post('txtKodeNegara'),
                    'txtNamaWilayah' => $this->input->post('txtNamaWilayah'),
                ];
                // proses update
                $status =  $this->wilayah->update($id,$datainput);
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'msg' => 'Wilayah berhasil diupdate',
                    'data' => NULL
                ];
            }else{
                $datainput = [
					'txtKodeNegara' => $this->input->post('txtKodeNegara'),
                    'txtNamaWilayah' => $this->input->post('txtNamaWilayah')
                ];
                $status =  $this->wilayah->create($datainput);
                if($status)
				{
					$data = [
						'code' => 200,
						'status' => $status,
						'msg' => 'Wilayah berhasil ditambahkan',
						'data' => NULL
					];
				}else{
					$data = [
						'code' => 400,
						'status' => $status,
						'msg' => 'Wilayah gagal ditambahkan',
						'data' => NULL
					];
				}
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
                $this->wilayah->destroy($id);
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Wilayah berhasil dihapus',
                    'data' => NULL
                ];
            }else{
                // jika id tidak ada
                $data = [
                    'code' => 400,
                    'status' => false,
                    'msg' => 'agama tidak ditemukan',
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
            $result  = $this->wilayah->search($keyword)->result();
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
