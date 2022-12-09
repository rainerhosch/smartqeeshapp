<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Hospital.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 06/06/2022
 *  Quots of the code     : 'sabar ya'
 */

class Hospital extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('Manajemen/M_hospital', 'hospital');
    }

    public function index()
    {

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Hospital';
        $data['content'] = 'pages/manajemen/v_hospital';
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
                'data' => $this->hospital->get()->result()
            ];
        }
        echo json_encode($data);
    }

	public function store()
    {
        if($this->input->is_ajax_request())
        {
            $input = $this->input->post();
            
            if($input['IdHospital'])
            {
                $id = $input['IdHospital'];
                $datainput = [
                    'HospitalName' => $this->input->post('HospitalName'),
                    'HospitalAddress' => $this->input->post('HospitalAddress'),
					'HospitalStatus' => $this->input->post('HospitalStatus')
                ];
                // proses update
                $status =  $this->hospital->update($id,$datainput);
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'msg' => 'Hospital berhasil diupdate',
                    'data' => NULL
                ];
            }else{
				$HospitalName = $this->input->post('HospitalName');
                $HospitalAddress = $this->input->post('HospitalAddress');
                $datainput = [
                    'HospitalName' => $HospitalName,
                    'HospitalAddress' => $HospitalAddress,
					'HospitalStatus' => $this->input->post('HospitalStatus')
                ];
                $status =  $this->hospital->create($datainput);
                $data = [
                    'code' => 200,
                    'status' => $status,
                    'msg' => 'Hospital berhasil ditambahkan',
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
                $this->hospital->destroy($id);
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Hospital berhasil dihapus',
                    'data' => NULL
                ];
            }else{
                // jika id tidak ada
                $data = [
                    'code' => 400,
                    'status' => false,
                    'msg' => 'Hospital tidak ditemukan',
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
            $result  = $this->hospital->search($keyword)->result();
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
