<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Paramedic.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 06/06/2022
 *  Quots of the code     : 'sabar ya'
 */

class Paramedic extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('Manajemen/M_paramedic', 'paramedic');
    }

    public function index()
    {

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Paramedic';
        $data['content'] = 'pages/manajemen/v_paramedic';
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
                'data' => $this->paramedic->get()->result()
            ];
        }
        echo json_encode($data);
    }

	public function store()
    {
        if($this->input->is_ajax_request())
        {
            $input = $this->input->post();
            
            if($input['idparamedic'])
            {
                $id = $input['idparamedic'];
                $datainput = [
                    'paramedic_name' => $this->input->post('paramedic_name'),
                    'specialist' => $this->input->post('specialist'),
					'gender' => $this->input->post('gender')
                ];
                // proses update
                $status =  $this->paramedic->update($id,$datainput);
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'msg' => 'Paramedic berhasil diupdate',
                    'data' => NULL
                ];
            }else{
				$paramedic_name = $this->input->post('paramedic_name');
                $specialist = $this->input->post('specialist');
                $datainput = [
                    'paramedic_name' => $paramedic_name,
                    'specialist' => $specialist,
					'gender' => $this->input->post('gender')
                ];
                $status =  $this->paramedic->create($datainput);
                $data = [
                    'code' => 200,
                    'status' => $status,
                    'msg' => 'Paramedic berhasil ditambahkan',
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
                $this->paramedic->destroy($id);
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Paramedic berhasil dihapus',
                    'data' => NULL
                ];
            }else{
                // jika id tidak ada
                $data = [
                    'code' => 400,
                    'status' => false,
                    'msg' => 'Paramedic tidak ditemukan',
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
            $result  = $this->paramedic->search($keyword)->result();
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
