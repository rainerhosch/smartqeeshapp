<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Agama.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 06/06/2022
 *  Quots of the code     : 'sabar ya'
 */

class Agama extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('Manajemen/M_agama', 'agama');
    }

    public function index()
    {

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Agama';
        $data['content'] = 'pages/manajemen/v_agama';
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
                'data' => $this->agama->get()->result()
            ];
        }
        echo json_encode($data);
    }

	public function store()
    {
        if($this->input->is_ajax_request())
        {
            $input = $this->input->post();
            
            if($input['intidAgama'])
            {
                $id = $input['intidAgama'];
                $datainput = [
                    'txtNamaAgama' => $this->input->post('txtNamaAgama')
                ];
                // proses update
                $status =  $this->agama->update($id,$datainput);
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'msg' => 'Agama berhasil diupdate',
                    'data' => NULL
                ];
            }else{
				$namaAgama = $this->input->post('txtNamaAgama');
                $datainput = [
                    'txtNamaAgama' => $namaAgama
                ];
                $status =  $this->agama->create($datainput);
                $data = [
                    'code' => 200,
                    'status' => $status,
                    'msg' => 'Agama berhasil ditambahkan',
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
                $this->agama->destroy($id);
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Agama berhasil dihapus',
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
            $result  = $this->agama->search($keyword)->result();
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
