<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : risk_manj_performance.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 29/01/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Risk_manj_performance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_user', 'user');
        $this->load->model("RiskRegister/M_risk_identification", "risk_identification");
        $this->load->model("RiskRegister/M_risk_peformance", "risk_peformance");
        $this->load->model("Manajemen/M_risk_assessment_matrix", "risk_matrix");
    }

    public function index()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/risk_management/risk_man_perf';
        $this->load->view('template', $data);
    }

    public function getsTotalJenisRisk()
    {
        if ($this->input->is_ajax_request()) {
            $jenisRisk = $this->risk_matrix->getJenisTingkatResiko();
			$id_departement = $this->session->userdata('id_departemen');

            $listData = [];

            foreach ($jenisRisk as $jenis) {
                $total = $this->risk_identification->countJenisRisk($jenis["txtTingkatResiko"]);

                $totalRisk = [
                    "jenis" => $jenis["txtTingkatResiko"],
                    "total" => $total
                ];

                array_push($listData, $totalRisk);
            }

			$listDataProgram = [
				"not_complete" => $this->risk_identification->countProgram("Not Completed"),
				"in_progress" 	=> $this->risk_identification->countProgram("In Progress"),
				"completed" 	=> $this->risk_identification->countProgram("Completed"),
			];

            echo json_encode([
				"listDataRisk" => $listData,
				"listDataProgram" => $listDataProgram
			]);
        } else {
            echo json_encode("Invalid Request");
        }
    }

	public function getsTotalJenisRiskDepartemen()
    {
        if ($this->input->is_ajax_request()) {
            $jenisRisk = $this->risk_matrix->getJenisTingkatResiko();
			$id_departement = $this->session->userdata('id_departemen');

            $listData = [];

            foreach ($jenisRisk as $jenis) {
                $total = $this->risk_identification->countJenisRiskDepartemen($jenis["txtTingkatResiko"], $id_departement);

                $totalRisk = [
                    "jenis" => $jenis["txtTingkatResiko"],
                    "total" => $total
                ];

                array_push($listData, $totalRisk);
            }
			$listDataProgram = [
				"not_complete" => $this->risk_identification->countProgramDepartemen("Not Completed", $id_departement),
				"in_progress" 	=> $this->risk_identification->countProgramDepartemen("In Progress", $id_departement),
				"completed" 	=> $this->risk_identification->countProgramDepartemen("Completed", $id_departement),
			];

            echo json_encode([
				"listDataRisk" => $listData,
				"listDataProgram" => $listDataProgram
			]);
        } else {
            echo json_encode("Invalid Request");
        }
    }

    public function getsDataTableRisk()
    {
        // if ($this->input->is_ajax_request()) {
        //     $filterData = $this->input->post("filter");
        //     $data = $this->risk_identification->getsDataByFilterRisk($filterData);

        //     echo json_encode($data);
        // } else {
        //     echo json_encode("Invalid Request");
        // }
		echo json_encode($this->risk_peformance->get_datatables(""));
    }

	public function getsDataTableRiskDepartemen()
    {
        if ($this->input->is_ajax_request()) {
            $filterData = $this->input->post("filter");
            $data = $this->risk_identification->getsDataByFilterRisk($filterData);

            echo json_encode($data);
        } else {
            echo json_encode("Invalid Request");
        }
    }

    /* public function getsDataTableRisk()
    {
        $filterData = $_POST["filterData"];
        $draw = $_POST["draw"];
        $start = $_POST["start"];
        $length = $_POST["length"];
        $search = $_POST["search"]["value"];

        $data = $this->risk_identification->get_datatables_manaj_performance($draw, $start, $length, $search, $filterData);

        echo json_encode($search);
    } */

    public function low_risk()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        $data['content'] = 'pages/risk_management/risk_man_perf_low_risk';
        $this->load->view('template', $data);
    }
    public function medium_risk()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        $data['content'] = 'pages/risk_management/risk_man_perf_medium_risk';
        $this->load->view('template', $data);
    }

    public function hard_risk()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        $data['content'] = 'pages/risk_management/risk_man_perf_hard_risk';
        $this->load->view('template', $data);
    }

    public function extreme_risk()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        $data['content'] = 'pages/risk_management/risk_man_perf_extreme_risk';
        $this->load->view('template', $data);
    }
}
