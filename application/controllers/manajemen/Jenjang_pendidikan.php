<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Jenjang_pendidikan.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 06/06/2022
 *  Quots of the code     : 'sabar ya'
 */

class Jenjang_pendidikan extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('Manajemen/M_jenjang_pendidikan', 'pendidikan');
    }

    public function index()
    {

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Jenjang Pendidikan';
        $data['content'] = 'pages/manajemen/v_jenjang_pendidikan';
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
                'data' => $this->pendidikan->get()->result()
            ];
        }
        echo json_encode($data);
    }

	public function store()
    {
        if($this->input->is_ajax_request())
        {
            $input = $this->input->post();
            
            if($input['intIdJenjangPendidikan'])
            {
                $id = $input['intIdJenjangPendidikan'];
                $datainput = [
                    'txtNamaJenjangPendidikan' => $this->input->post('txtNamaJenjangPendidikan')
                ];
                // proses update
                $status =  $this->pendidikan->update($id,$datainput);
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'msg' => 'Jenjang Pendidikan berhasil diupdate',
                    'data' => NULL
                ];
            }else{
				$namaJenjang = $this->input->post('txtNamaJenjangPendidikan');
                $datainput = [
                    'txtNamaJenjangPendidikan' => $namaJenjang
                ];
                $status =  $this->pendidikan->create($datainput);
                $data = [
                    'code' => 200,
                    'status' => $status,
                    'msg' => 'Jenjang Pendidikan berhasil ditambahkan',
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
				$already = $this->pendidikan->checkJenjangPendidikan($id,'memployee','intIdJenjangPendidikan')->num_rows();
				if($already > 0)
				{
					$data = [
						'code' => 400,
						'status' => false,
						'msg' => 'Jenjang Pendidikan tidak boleh dihapus',
						'data' => NULL
					];
				}else{
					$this->pendidikan->destroy($id);
					$data = [
						'code' => 200,
						'status' => true,
						'msg' => 'Jenjang Pendidikan berhasil dihapus',
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
            $result  = $this->pendidikan->search($keyword)->result();
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
