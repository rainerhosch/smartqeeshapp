<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Medical_checkup.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Muhamad Rizky Kholba & Rifqi Fadhillah
 *  Date Created          : 31/03/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Medical_checkup extends CI_Controller
{
    public $table = 'trMcu';
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_user', 'user');
        $this->load->model('PerformanceManagement/M_mcu');
    }

// ---------------------------------- INPUT MCU DATA --------------------------------------

    public function index()
    {
        $data['mcup'] = $this->M_mcu->get_data();
        $data['employee'] = $this->M_mcu->get_employeenik();
        $data['hospital'] = $this->M_mcu->get_hospital();
        $data['disease'] = $this->M_mcu->get_disease();
        $data['type'] = $this->M_mcu->get_mcutype();
        $data['listmcu'] = $this->M_mcu->get_listmcu();
        
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/medical_checkup';
        $this->load->view('template', $data);
    }

// ---------------------------------- MCU RECORD --------------------------------------

    public function mcu_record()
    {
        // $data['mcup'] = $this->M_mcu->get_data();
        $data['employee'] = $this->M_mcu->get_employeenik();
        $data['deptlist'] = $this->M_mcu->get_deptlist();
        
        $data['mcuperiod'] = $this->M_mcu->get_mcuperiod();
        

        $buttonSRCH = $this->input->post('searchVal', true);
        if($buttonSRCH != '1'){
            $data['disease'] = $this->M_mcu->get_disease();
            $array_penyakit = array();
            foreach ($data['disease'] as $i=>$penyakit){
                $array_penyakit[$penyakit['intidDisease']] = $penyakit['txtNamaDisease'];
            }
            $data['listmcu'] = $this->M_mcu->get_listmcu();
            $data['penyakit'] = $array_penyakit;
            $data['struk'] = NULL;
            $data['search'] = NULL;
        }else{
            $idPeriod = $this->input->post('filterperiod', true);
            $idDept = $this->input->post('dept', true);
            $idNik = $this->input->post('nik', true);
            $idStatus = $this->input->post('filterstatus', true);
            $idDisease = $this->input->post('filterdisease', true);

            $data['search'] = [$idPeriod, $idStatus, $idNik, $idDisease, $idDept];
            $data['struk'] = $this->M_mcu->getWhere_disease($idDisease);
            $data['disease'] = $this->M_mcu->get_disease();
            $array_penyakit = array();
            foreach ($data['disease'] as $i=>$penyakit){
                $array_penyakit[$penyakit['intidDisease']] = $penyakit['txtNamaDisease'];
            }
            $data['penyakit'] = $array_penyakit;
            $this->db->select('*');
            $this->db->from('trMcu m');
            $this->db->join('mEmployee e', 'm.intIdEmployee = e.intIdEmployee');
            $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
            $this->db->join('mDisease f', 'm.identified_disease = f.intidDisease');

            if(!empty($idStatus)) {
            $this->db->where('m.health_status', $idStatus);
            }
            // if(!empty($idDisease)) {
            //     $this->db->where('m.identified_disease', $idDisease);
            // }
            if(!empty($idPeriod)) {
                // $ymd = explode("-", $idPeriod);
                // $RESULTEXPL = $ymd[0];
                $this->db->where('SUBSTRING(m.mcu_period, 1,4) =', $idPeriod);
            }
            if(!empty($idDept)) {
                $this->db->where('e.intIdDepartment', $idDept);
            }
            if(!empty($idNik)) {
                $this->db->where('e.intIdEmployee', $idNik);
            }
            $data['listmcu'] = $this->db->get()->result();
        }
        
        

        // var_dump($mcu);
        //$data['mcu']=$this->m_mcu->tampil_data()->result();
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/mcu_record';
        $this->load->view('template', $data);
    }

    public function search()
    {
        $data['title'] = 'Smart Qeesh App';
        // $data['page'] = 'Home';
        // $data['subpage'] = 'Blank Page';
        // // $data['user_divisi'] = 'CT-HSE';
        // $data['content'] = 'pages/performance_management/mcu_record';

        $idPeriod = $this->input->post('filterperiod', true);
        $idDept = $this->input->post('dept', true);
        $idNik = $this->input->post('nik', true);
        $idStatus = $this->input->post('filterstatus', true);
        $idDisease = $this->input->post('filterdisease', true);

        echo $idPeriod.' - '.$idDept.' - '.$idNik.' - '.$idStatus.' - '.$idDisease;

        // $X = 5;
        // $this->db->select('*');
        // $this->db->from('trMcu m');
        // $this->db->like('m.identified_disease', $X);
        // $queryX = $this->db->get()->result_array();

        // //50,15,55,500

        // if(COUNT($queryX) > 0){
        //     $dim = [];
        //     foreach($queryX as $row){
        //         $char = $row['identified_disease']; //50,8
        //         $split = explode(',', $char);
        //         foreach($split as $rowZ){
        //             if(in_array($X,$rowZ){

        //             }
        //         }
        //     }
        // }
        // mDisease trMcu mEmployee mDepartemen
        $this->db->select('*');
        $this->db->from('trMcu m');
        $this->db->join('mDisease p', 'm.identified_disease = p.intidDisease');
        $this->db->join('mEmployee e', 'm.intIdEmployee = e.intIdEmployee');
        $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');

        if(!empty($idStatus)) {
            $this->db->where('m.health_status', $idStatus);
        }
        if(!empty($idDisease)) {
            $this->db->like('m.identified_disease', $idDisease);
        }
        if(!empty($idPeriod)) {
            // $ymd = explode("-", $idPeriod);
            // $RESULTEXPL = $ymd[0];
            $this->db->where('SUBSTRING(m.mcu_period, 1,4) =', $idPeriod);
        }
        if(!empty($idDept)) {
            $this->db->where('e.intIdDepartment', $idDept);
        }
        $query = $this->db->get()->result_array();
        // return $query->result_array();
        echo '<pre>';
        echo print_r($query);
        echo '</pre>';
        // var_dump($query);
        exit;
        // $this->load->view('template', $data);
    }

// ---------------------------------- MCU PERFORMANCE --------------------------------------

    public function mcu_perf()
    {
        $data['mcuperf'] = $this->M_mcu->get_mcuperf();
        
        $data['fwn']=$this->db->get_where('trMcu', ['health_status' => 'Fit with Note'])->result_array();
        $data['unfit']=$this->db->get_where('trMcu', ['health_status' => 'Unfit'])->result_array();
        $data['ffw']=$this->db->get_where('trMcu', ['health_status' => 'Fit for Work'])->result_array();
        $data['disease'] = $this->M_mcu->get_disease();
        $array_penyakit = array();
        $array_total = array();
        foreach ($data['mcuperf'] as $i=>$penyakit)
        {
            $array_penyakit[$i] = $penyakit['txtNamaDisease'];
            
            $array_total[$i] = $this->db->get_where('trMcu', ['identified_disease' => $penyakit['intidDisease']])->num_rows();

            
        }
        $data['penyakit'] = json_encode($array_penyakit);
        $data['total'] = json_encode($array_total);
        // echo '<pre>';
        // echo print_r($data['penyakit']);
        // echo '</pre>';
        // exit;

        // var_dump($mcu);
        //$data['mcu']=$this->m_mcu->tampil_data()->result();
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/mcu_perf';
        $this->load->view('template', $data);
    }

// ---------------------------------- CRUD DATA --------------------------------------

    public function input_data()
    {
        $this->M_mcu->create();
        $this->session->set_flashdata('flash-success', 'Di-simpan');
        redirect('performance_management/medical_checkup/mcu_record');
    }
    
    public function destroy()
    {
        if($this->input->is_ajax_request())
        {
            $id = $this->input->post('id');
            if($id)
            {
                $this->M_mcu->destroy($id);
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Data berhasil dihapus',
                    'data' => NULL
                ];
            }else{
                // jika id tidak ada
                $data = [
                    'code' => 400,
                    'status' => false,
                    'msg' => 'Data tidak ditemukan',
                    'data' => NULL
                ];
            }
            echo json_encode($data);
        }

    }

    public function edit($id)
    { 
        $where = array('id' =>$id); 

        $data['mcup'] = $this->M_mcu->edit_data($where, $this->table)->row();
        $data['mcuedit'] = $this->M_mcu->get_data();
        $data['employe'] = $this->M_mcu->get_employeenik();
        $data['hospital'] = $this->M_mcu->get_hospital();
        $data['disease'] = $this->M_mcu->get_disease();
        $data['type'] = $this->M_mcu->get_mcutype();
        $data['listmcu'] = $this->M_mcu->get_listmcu();
        //$data['mcu']=$this->m_mcu->tampil_data()->result();
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/medical_checkup_edit';
        $this->load->view('template', $data);
    }

    //fungsi untuk memperbaharui/mengupdate data dari database 
    public function update()
    {
        $id                 = $this->input->post('id'); 
        $employee_number    = $this->input->post('nik');
        $employee_name      = $this->input->post('employee_name');
        $address            = $this->input->post('address');
        $department         = $this->input->post('department');
        $service_period     = $this->input->post('service_period');
        $age                = $this->input->post('age');
        $mcu_period         = $this->input->post('mcu_period');
        $hospital           = $this->input->post('hospital');
        $mcu_type           = $this->input->post('mcu_type');
        $mcu_date           = $this->input->post('mcu_date');
        $health_status      = $this->input->post('health_status');
        $identified_disease = $this->input->post('identified_disease');
        $treatment          = $this->input->post('treatment');
        // $mcu_report         = $this->upload-?_uploadReport('uploadReport');

        $data = array(
            'service_period'     => $service_period,
            'mcu_period'         => $mcu_period,
            'hospital'           => $hospital,
            'mcu_type'           => $mcu_type,
            'mcu_date'           => $mcu_date,
            'health_status'      => $health_status,
            'identified_disease' => implode(",",$identified_disease),
            'treatment'          => $treatment,
            // 'mcu_report'         => $mcu_report,
            'intIdEmployee'      => $employee_number,
            'age'                => $age
        );
        $where = array( 'id' => $id ); 
        $this->M_mcu->update_data($where,$data,'trMcu'); 
        redirect('performance_management/medical_checkup/mcu_record');
    }

// ---------------------------------- FILTER SEARCH --------------------------------------

    public function filter_nik()
    {
        $keyword_nik = $this->input->post('keyword_nik');
        $data['mcup'] = $this->M_mcu->get_nik($keyword_nik);
        //$data['mcu']=$this->m_mcu->tampil_data()->result();
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/medical_checkup';
        $this->load->view('template', $data);
    }

    public function filter_dept()
    {
        $keyword_dept = $this->input->post('keyword_dept');
        $data['mcup'] = $this->M_mcu->get_dept($keyword_dept);
        //$data['mcu']=$this->m_mcu->tampil_data()->result();
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/medical_checkup';
        $this->load->view('template', $data);
    }

    public function getIdEmployee()
    {
		if ($this->input->is_ajax_request()) {
			$code = $_POST['kode'];
			$check = $this->M_mcu->getdetailemployee($code);
			if($check)
			{
                echo json_encode($check);
				
			}else{
				echo json_encode('asadd');
			}
		}else{
			echo 'You can not access';
		}
	}
}
