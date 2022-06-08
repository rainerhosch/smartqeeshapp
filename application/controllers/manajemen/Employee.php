<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Employee.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 06/06/2022
 *  Quots of the code     : 'sabar ya'
 */

class Employee extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('Manajemen/M_employee', 'employee');
    }

    public function index()
    {

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Employee';
        $data['content'] = 'pages/manajemen/v_employee';
        $this->load->view('template', $data);
    }

	public function getDepartments()
    {
		$this->load->model('Manajemen/M_department','department');
        if($this->input->is_ajax_request())
        {
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => 'Success',
                'data' => $this->department->getsDepartmentActive()
            ];
        }
        echo json_encode($data);
    }

    public function get_json()
    {
        if($this->input->is_ajax_request())
        {
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => 'Success',
                'data' => $this->employee->get()->result()
            ];
        }
        echo json_encode($data);
    }

	public function show($id)
	{
		$data['employee'] = $this->employee->find($id)->row();
		$this->load->view('pages/manajemen/employee/show',$data);
	}

	public function store()
    {
        if($this->input->is_ajax_request())
        {
            $input = $this->input->post();
            
            if($input['intIdEmployee'])
            {
                $id = $input['intIdEmployee'];
                $datainput = $this->input->post();
                // proses update
                $status =  $this->employee->update($id,$datainput);
                $data = [
                    'code' => 200,
                    'status' => 'success',
                    'msg' => 'Employee berhasil diupdate',
                    'data' => NULL
                ];
            }else{
				$datainput = $this->input->post();
				$nikValid = $this->employee->findByNik($this->input->post('txtNikEmployee'))->num_rows();
				if($nikValid > 1)
				{
					$data = [
						'code' => 400,
						'status' => 'error',
						'msg' => 'NIK employee sudah ada.',
						'data' => NULL
					];
					echo json_encode($data);
					die();
				}
                $status =  $this->employee->create($datainput);
                $data = [
                    'code' => 200,
                    'status' => $status,
                    'msg' => 'Employee berhasil ditambahkan',
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
                $this->employee->destroy($id);
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Employee berhasil dihapus',
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
            $result  = $this->employee->search($keyword)->result();
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
