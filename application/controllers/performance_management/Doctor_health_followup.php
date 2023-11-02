<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Internal_clinic.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Muhamad Rizky Kholba
 *  Date Created          : 1/06/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */

class Doctor_health_followup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_user', 'user');
        $this->load->model('PerformanceManagement/M_followup');
        $this->load->model('PerformanceManagement/M_mcu');
    }

    public function index()
    {
        // $data['unfit_followup'] = $this->M_followup->get_unfitdata();
        $data['employee'] = $this->M_followup->get_employeenik();
        $data['deptlist'] = $this->M_followup->get_deptlist();
        $data['mcuperiod'] = $this->M_followup->get_mcuperiod();
        $data['hospital'] = $this->M_followup->get_hospital();
        

        $buttonSRCH = $this->input->post('searchVal', true);
        if($buttonSRCH != '1'){
            $data['disease'] = $this->M_followup->get_disease();
            $array_penyakit = array();
            foreach ($data['disease'] as $i=>$penyakit){
                $array_penyakit[$penyakit['intidDisease']] = $penyakit['txtNamaDisease'];
            }
            $data['unfit_followup'] = $this->M_followup->get_unfitdata();
            $data['penyakit'] = $array_penyakit;
            $data['struk'] = NULL;
            $data['search'] = NULL;
        }else{
            $idPeriod = $this->input->post('filterperiod', true);
            $idDept = $this->input->post('dept', true);
            $idNik = $this->input->post('nik', true);
            $idDisease = $this->input->post('filterdisease', true);

            $data['search'] = [$idPeriod, $idNik, $idDisease, $idDept];
            $data['struk'] = $this->M_followup->getWhere_disease($idDisease);
            $data['disease'] = $this->M_followup->get_disease();
            $array_penyakit = array();
            foreach ($data['disease'] as $i=>$penyakit){
                $array_penyakit[$penyakit['intidDisease']] = $penyakit['txtNamaDisease'];
            }
            $data['penyakit'] = $array_penyakit;

            $this->db->select('*');
            $this->db->from('trMcu m');
            $this->db->where('m.health_status', 'unfit');
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
            $data['unfit_followup'] = $this->db->get()->result();
        }
        
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/doctor_health_followup.php';
        $this->load->view('template', $data);
    }

    public function action_followup()
    {
        $id                 = $this->input->post('id'); 
        $doctor_note        = $this->input->post('doctor_note');

        $data = array(
            'doctor_note' => $doctor_note
        );

        $where = array( 'id' => $id ); 
        $this->M_followup->update($where,$data,'trMcu');
        $this->session->set_flashdata('flash-success', 'Di-simpan');
        redirect('performance_management/doctor_health_followup/index');
    }

    public function followup_perf()
    {
        $wheres['dept'] = $this->input->get('dept')!='' ? $this->input->get('dept'):'';
        $wheres['filterperiod'] = $this->input->get('filterperiod')!='' ? $this->input->get('filterperiod'):'';
        $data['follupperf'] = $this->M_followup->get_follupperf();
        $data['totalpenyakit'] = $this->M_followup->totalpenyakit($wheres);
        $data['deptlist'] = $this->M_followup->get_deptlist();
        $data['mcuperiod'] = $this->M_followup->get_mcuperiod();
        $data['actionperf'] = $this->M_followup->get_actionperf();
        $data['totaldept'] = $this->M_followup->totaldept($wheres);
        // getWhere_disease
        $data['disease'] = $this->M_followup->get_disease();
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

            $data['search'] = [$idPeriod, $idDept];
        }
        $array_penyakit = array();
        $array_penyakit2 = array();
        $array_penyakit3 = array();
        $array_total = array();
        $array_action = array();
        $array_actiontotal = array();
        $where = array();
        if(count($data['totalpenyakit'])> 0){

            foreach ($data['totalpenyakit'] as $i=>$penyakit)
            {
            $identified_disease = explode(",",$penyakit['identified_disease']);
            foreach ($identified_disease as $key => $value) {
                $array_penyakit[][$value] =  $penyakit;
            }
        }
        
        foreach ($array_penyakit as $key => $value) {
            # code...
            $ii = 0;
            foreach ($value as $k => $v) {
                $array_penyakit2[$k][] = 1;
                $ii++;
            }
        }

        foreach ($array_penyakit2 as $key => $value) {
            $penyakit = $this->M_followup->getWhere_disease($key);
            $array_penyakit3['array_penyakit'][] = $penyakit['txtNamaDisease'];
            $array_penyakit3['array_total'][] = count($value);
        }
        }
        // echo '<pre>';
        // echo print_r($array_penyakit3);
        // echo '</pre>';
        // exit;
        
        foreach ($data['totaldept'] as $i=>$action)
        {
            $array_action[$i] = $action['txtNamaDepartement'];
            
            $array_actiontotal[$i] = $action['total'];
        }
        $penyakit = isset($array_penyakit3['array_penyakit']) ? $array_penyakit3['array_penyakit'] : array();
        $total = isset($array_penyakit3['array_total']) ? $array_penyakit3['array_total'] : array();
        $data['penyakit'] = json_encode($penyakit);
        $data['total'] = json_encode($total);
        $data['action'] = json_encode($array_action);
        $data['actiontotal'] = json_encode($array_actiontotal);
        // echo '<pre>';
        // echo print_r($data['totaldept']);
        // echo '</pre>';
        // exit;

        // var_dump($mcu);
        //$data['mcu']=$this->m_mcu->tampil_data()->result();
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/followup_perf';
        $this->load->view('template', $data);
    }
}
