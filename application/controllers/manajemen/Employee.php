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
		$this->load->model('M_user','user');
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

	public function getEmployeeById()
	{
		if($this->input->is_ajax_request())
        {
			$id = $this->input->post('id');
            $data = [
                'code' => 200,
                'status' => true,
                'msg' => 'Success',
                'data' => $this->employee->find($id)->row()
            ];
        }
        echo json_encode($data);

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
                $idEmp =  $this->employee->create($datainput);
				$emp = $this->employee->find($idEmp)->row();
				$data = [
					'code' => 200,
					'status' => 'success',
					'msg' => 'Employee beserta akunnya berhasil ditambahkan',
					'data' => NULL
				];
				$roleEmployee = $this->user->getRole('Employee')->row();
				$dataUser = [
					'username' => strtolower(str_replace(' ', '', $emp->txtNameEmployee)) . rand(1,99),
					'password' => md5($emp->txtNikEmployee),
					'role_id' => $roleEmployee->role_id,
					'user_detail_id' => 0,
					'employee_id' => $idEmp,
					'date_created' => time(),
					'is_active' => 0,
					'last_login' => 0,
					'ip_address' => 0
				];
				$this->user->insert_data('user',$dataUser);
            }

            echo json_encode($data);
        }
    }

	public function destroy()
    {
        if($this->input->is_ajax_request())
        {
            $id = $this->input->post('id');
			$EmpId = $id;
            if($id)
            {
				$this->employee->destroy($id);
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Employee sekaligus akun berhasil dihapus',
                    'data' => NULL
                ];
				// hapus user yang bersangkutan
				$this->user->hapus_user($EmpId);
            }else{
                // jika id tidak ada
                $data = [
                    'code' => 400,
                    'status' => false,
                    'msg' => 'Employee tidak ditemukan',
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
