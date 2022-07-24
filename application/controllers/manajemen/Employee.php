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

class Employee extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		login_check();
		$this->load->model('Manajemen/M_employee', 'employee');
		$this->load->model('Manajemen/M_negara', 'negara');
		$this->load->model('Manajemen/M_lokasi', 'lokasi');
		$this->load->model('M_user', 'user');
		$this->load->model('Manajemen/M_jabatan', 'jabatan');
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
		$this->load->model('Manajemen/M_department', 'department');
		if ($this->input->is_ajax_request()) {
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
		if ($this->input->is_ajax_request()) {
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
		$data['employee'] = $this->employee->find(array('intIdEmployee' => $id))->row();
		$this->load->view('pages/manajemen/employee/show', $data);
	}

	public function getEmployeeById()
	{
		if ($this->input->is_ajax_request()) {
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
		if ($this->input->is_ajax_request()) {
			$buatAkunUser = $this->input->post('buatAkunUser');
			$KirimNotivikasiWa = $this->input->post('KirimNotivikasiWa');
			$data = [
				'txtNameEmployee' => $this->input->post('txtNameEmployee'),
				'txtNikEmployee' => $this->input->post('txtNikEmployee'),
				'txtEmail' => $this->input->post('txtEmail'),
				'txtNomorWa' => $this->input->post('txtNomorWa'),
				'intIdDepartment' => $this->input->post('intIdDepartment'),
				'intIdJabatan' => $this->input->post('intIdJabatan'),
				'intTpk' => $this->input->post('intTpk'),
				'intKpw' => $this->input->post('intKpw'),
				'intKtk' => $this->input->post('intKtk'),
				'intJumlahAnak' => $this->input->post('intJumlahAnak'),
				'dtmTanggalMasuk' => $this->input->post('dtmTanggalMasuk'),
				'txtTempatLahir' => $this->input->post('txtTempatLahir'),
				'dtmTanggalLahir' => $this->input->post('dtmTanggalLahir'),
				'intIdAgama' => $this->input->post('intIdAgama'),
				'txtSuku' => $this->input->post('txtSuku'),
				'txtGolonganDarah' => $this->input->post('txtGolonganDarah'),
				'txtAlamat1' => $this->input->post('txtAlamat1'),
				'txtAlamat2' => $this->input->post('txtAlamat2'),
				'intIdNegara' => $this->input->post('intIdNegara'),
				'intIdProvinsi' => $this->input->post('intIdProvinsi'),
				'intIdKota' => $this->input->post('intIdKota'),
				'intIdJenjangPendidikan' => $this->input->post('intIdJenjangPendidikan')
			];
			if ($KirimNotivikasiWa) {
				$redirect = true;
			} else {
				$redirect = false;
			}

			//jika inputan negara adalah huruf, create
			if (!is_numeric($data['intIdNegara'])) {
				// create Negara
				$kodeNegara = strtoupper(substr($data['intIdNegara'], 0, 2)) . rand(1, 999);
				$dataCreateNegara = [
					'txtKodeNegara' => $kodeNegara,
					'txtNamaNegara' => $this->input->post('intIdNegara')
				];
				$idNegara = $this->negara->create($dataCreateNegara);
				if (!$idNegara)
					$response = [
						'code' => 400,
						'status' => 'error',
						'msg' => 'Negara gagal ditambahkan.',
						'data' => NULL
					];
				$data['intIdNegara'] = $idNegara;
			} else {
				$data['intIdNegara'] = intval($this->input->post('intIdNegara'));
			}

			//jika inputan provinsi adalah huruf, create
			if (!is_numeric($data['intIdProvinsi'])) {
				// create Provinsi
				$dataCreateProvinsi = [
					'intIdNegara' => $data['intIdNegara'],
					'txtNamaProvinsi' => $this->input->post('intIdProvinsi')
				];
				$idProvinsi = $this->lokasi->createProvinsi($dataCreateProvinsi);
				if (!$idProvinsi)
					$response = [
						'code' => 400,
						'status' => 'error',
						'msg' => 'Provinsi gagal ditambahkan.',
						'data' => NULL
					];
				$data['intIdProvinsi'] = $idProvinsi;
			} else {
				$data['intIdProvinsi'] = intval($this->input->post('intIdProvinsi'));
			}


			if (!is_numeric($data['intIdKota'])) {
				// create kota
				$dataCreateKota = [
					'intIdProvinsi' => $data['intIdProvinsi'],
					'txtNamaKota' => $this->input->post('intIdKota')
				];
				$idkota = $this->lokasi->createKota($dataCreateKota);
				if (!$idkota)
					$response = [
						'code' => 400,
						'status' => 'error',
						'msg' => 'Kota gagal ditambahkan.',
						'data' => NULL
					];
				$data['intIdKota'] = $idkota;
			} else {
				$data['intIdKota'] = intval($this->input->post('intIdKota'));
			}


			// echo json_encode($data);
			// 	die();

			if ($this->input->post('intIdEmployee')) {
				$id = $data['intIdEmployee'];
				// proses update
				$update =  $this->employee->update($id, $data);
				if (!$update) {
					$response = [
						'code' => 400,
						'status' => 'error',
						'msg' => 'Employee gagal diupdate.',
						'data' => NULL
					];
					echo json_encode($response);
					die();
				}
				$response = [
					'code' => 200,
					'status' => 'success',
					'msg' => 'Employee berhasil diupdate',
					'data' => NULL
				];
			} else {

				$nikValid = $this->employee->findByNik($this->input->post('txtNikEmployee'))->num_rows();
				if ($nikValid > 1) {
					$response = [
						'code' => 400,
						'status' => 'error',
						'msg' => 'NIK employee sudah ada.',
						'data' => NULL
					];
					echo json_encode($response);
					die();
				}



				$idEmp =  $this->employee->create($data);
				$emp = $this->employee->find(array('intIdEmployee' => $idEmp))->row();
				if (!$idEmp || !$emp) {
					$response = [
						'code' => 400,
						'status' => 'error',
						'msg' => 'Employee gagal ditambahkan.',
						'data' => NULL
					];
					echo json_encode($response);
					die();
				}
				if ($buatAkunUser) {
					$explode = explode(" ", $emp->txtNameEmployee);
					if (count($explode) > 2) {
						$username = strtolower($explode[0] . $explode[1]) . rand(1, 99);
					} elseif (count($explode) == 2) {
						$username = strtolower($explode[0] . $explode[1]) . rand(1, 99);
					} elseif (count($explode) == 1) {
						$username = strtolower($explode[0]) . rand(1, 99);
					}

					$dataUser = [
						'username' => $username,
						'password' => md5($username),
						'role_id' => $emp->intIdJabatan,
						'employee_id' => $idEmp,
						'date_created' => time(),
						'is_active' => 0,
						'last_login' => 0,
						'ip_address' => 0
					];

					$this->user->insert_data('user', $dataUser);
					$msg = 'Employee beserta akunnya berhasil ditambahkan.';
				} else {
					$msg = 'Employee berhasil ditambahkan.';
				}
				$response = [
					'code' => 200,
					'status' => 'success',
					'msg' => $msg,
					'redirect' => $redirect,
					'no_wa' => $emp->txtNomorWa,
					'isiPesan' => 'Isi Pesan Wa'
				];
			}

			echo json_encode($response);
		}
	}

	public function destroy()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			$EmpId = $id;
			if ($id) {
				$this->employee->destroy($id);
				$data = [
					'code' => 200,
					'status' => true,
					'msg' => 'Employee sekaligus akun berhasil dihapus',
					'data' => NULL
				];
				// hapus user yang bersangkutan
				$this->user->hapus_user($EmpId);
			} else {
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
		if ($this->input->is_ajax_request()) {
			$keyword = $this->input->post('keyword');
			$result  = $this->employee->search($keyword)->result();
			$data = [
				'code' => 200,
				'status' => true,
				'msg' => '',
				'data' => $result
			];
			echo json_encode($data);
		} else {
			// add by oktan
			$message_403 = "You don't have access to the url you where trying to reach.";
			show_error($message_403, 403);
		}
	}

	// add by oktan
	public function getData()
	{
		if ($this->input->is_ajax_request()) {
			$data_post = $this->input->post();
			$filter = null;

			if (isset($data_post['filterby'])) {
				$field_filter = 'intId' . $data_post['filterby'];
				$filter = [
					$field_filter => $data_post['id']
				];
			}
			$result  = $this->employee->getData($filter)->result_array();
			$data = [
				'code' => 200,
				'status' => true,
				'msg' => '',
				'data' => $result
			];
			echo json_encode($data);
		} else {
			$message_403 = "You don't have access to the url you where trying to reach.";
			show_error($message_403, 403);
		}
	}

	// add by oktan
	public function getDataForAutoComplete()
	{
		if ($this->input->is_ajax_request()) {
			$data_post = $this->input->post();
			$filter = null;
			$search = null;

			if (isset($data_post['filterby'])) {
				$field_filter = 'intId' . $data_post['filterby'];
				$filter = [
					$field_filter => $data_post['id']
				];
			}
			if (isset($data_post['search'])) {
				$search =  $data_post['search'];
			}
			$dataEmployee  = $this->employee->getData($filter, $search)->result_array();
			foreach ($dataEmployee as $key => $value) {

				$dataEmployee[$key]['label'] = $value['txtNameEmployee'];
				$dataEmployee[$key]['value'] = $value['txtNameEmployee'];
				$dataEmployee[$key]['id'] = $value['intIdEmployee'];
				$dataEmployee[$key]['jabatan'] = $this->jabatan->find(['intIdJabatan' => $value['intIdJabatan']])->row_array();
				$dataEmployee[$key]['umur'] = date('Y') - substr($value['dtmTanggalLahir'], 0, 4);
				$dataEmployee[$key]['lama_bekerja'] = date('Y') - substr($value['dtmTanggalMasuk'], 0, 4);
			}
			$data = [
				'code' => 200,
				'status' => true,
				'msg' => '',
				'data' => $dataEmployee,
			];
			echo json_encode($data);
		} else {
			$message_403 = "You don't have access to the url you where trying to reach.";
			show_error($message_403, 403);
		}
	}
}
