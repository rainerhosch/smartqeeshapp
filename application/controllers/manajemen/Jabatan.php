<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Jabatan.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 06/06/2022
 *  Quots of the code     : 'sabar ya'
 */

class Jabatan extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('Manajemen/M_jabatan', 'jabatan');
    }

    public function index()
    {

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Jabatan';
        $data['content'] = 'pages/manajemen/v_jabatan';
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
                'data' => $this->jabatan->get()->result()
            ];
        }
        echo json_encode($data);
    }

	public function store()
    {
        if($this->input->is_ajax_request())
        {
            $input = $this->input->post();
            
            if($input['intIdJabatan'])
            {
                $id = $input['intIdJabatan'];
                $datainput = [
                    'txtNamaJabatan' => $this->input->post('txtNamaJabatan'),
					'bitActive' => $this->input->post('bitActive')
                ];
                // proses update
                $status =  $this->jabatan->update($id,$datainput);
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'msg' => 'Jabatan berhasil diupdate',
                    'data' => NULL
                ];
            }else{
				$namaAgama = $this->input->post('txtNamaJabatan');
                $datainput = [
                    'txtNamaJabatan' => $namaAgama,
					'bitActive' => $this->input->post('bitActive')
                ];
                $status =  $this->jabatan->create($datainput);
                $data = [
                    'code' => 200,
                    'status' => $status,
                    'msg' => 'Jabatan berhasil ditambahkan',
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
				$already = $this->jabatan->checkJabatan($id,'memployee','intIdJabatan')->num_rows();
				if($already > 0)
				{
					$data = [
						'code' => 400,
						'status' => false,
						'msg' => 'Jabatan tidak boleh dihapus',
						'data' => NULL
					];
				}else{
					$this->jabatan->destroy($id);
					$data = [
						'code' => 200,
						'status' => true,
						'msg' => 'Jabatan berhasil dihapus',
						'data' => NULL
					];
				}
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
            $result  = $this->jabatan->search($keyword)->result();
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
