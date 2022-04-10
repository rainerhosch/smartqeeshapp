<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Risk_type.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 02/04/2022
 *  Quots of the code     : 'sabar ya'
 */
class Risk_type extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_risk_type', 'risk_type');
    }

    public function index()
    {
        // code here...
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Risk Type';
        $data['content'] = 'pages/manajemen/v_risk_type';
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
                'data' => $this->risk_type->get()->result_array()
            ];
        }
        echo json_encode($data);
    }

    public function store()
    {
        if($this->input->is_ajax_request())
        {
            $input = $this->input->post();
            if($input['id'])
            {
                $id = $input['id'];
                // proses update
                $status =  $this->risk_type->update($id,$input);
                $data = [
                    'code' => 200,
                    'status' => 'OK',
                    'msg' => 'Risk Type berhasil diupdate',
                    'data' => NULL
                ];
            }else{
                // proses insert
                $status =  $this->risk_type->create($input);
                $data = [
                    'code' => 200,
                    'status' => $status,
                    'msg' => 'Risk Type berhasil ditambahkan',
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
                $this->risk_type->destroy($id);
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Risk Type berhasil dihapus',
                    'data' => NULL
                ];
            }else{
                // jika id tidak ada
                $data = [
                    'code' => 400,
                    'status' => false,
                    'msg' => 'Risk Type tidak ditemukan',
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
            $result  = $this->risk_type->search($keyword);
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