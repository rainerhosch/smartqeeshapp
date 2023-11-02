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
class Internal_clinic extends CI_Controller
{
    public $table = 'trinternalclinic';
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_user', 'user');

        $this->load->model('PerformanceManagement/M_internal_clinic');
    }

    public function index()
    {
        $data['intclinic'] = $this->M_internal_clinic->get_all_data()->result();

        $data['employee'] = $this->M_internal_clinic->get_employeenik();
        $data['listintclinic'] = $this->M_internal_clinic->get_list_intclinic();
        $data['paramedic'] = $this->M_internal_clinic->get_paramedic();
        $data['disease'] = $this->M_internal_clinic->get_disease();
        $data['medicine'] = $this->M_internal_clinic->get_medicine();

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/internal_clinic.php';
        $this->load->view('template', $data);
    }

    public function visit_record($date1 = null, $date2 = null)
    {
        $data['employee'] = $this->M_internal_clinic->get_employeenik();
        $data['deptlist'] = $this->M_internal_clinic->get_deptlist();
        $data['disease'] = $this->M_internal_clinic->get_disease();

        $buttonSRCH = $this->input->post('searchVal', true);
        if ($buttonSRCH != '1') {
            // $data['disease'] = $this->M_internal_clinic->get_disease();
            $array_penyakit = array();
            foreach ($data['disease'] as $i => $penyakit) {
                $array_penyakit[$penyakit['intidDisease']] = $penyakit['txtNamaDisease'];
            }
            $data['listintclinic'] = $this->M_internal_clinic->get_list_intclinic();
            $data['penyakit'] = $array_penyakit;
            $data['struk'] = NULL;
            $data['search'] = NULL;
        } else {
            $idDate1 = $this->input->post('filterdate1', true);
            $idDate2 = $this->input->post('filterdate2', true);
            $idDept = $this->input->post('dept', true);
            $idNik = $this->input->post('nik', true);
            $idDisease = $this->input->post('filterdisease', true);

            $data['search'] = [$idDate1, $idDate2, $idNik, $idDisease, $idDept];
            $data['struk'] = $this->M_internal_clinic->getWhere_disease($idDisease);
            // $data['disease'] = $this->M_internal_clinic->get_disease();

            $array_penyakit = array();
            foreach ($data['disease'] as $i => $penyakit) {
                $array_penyakit[$penyakit['intidDisease']] = $penyakit['txtNamaDisease'];
            }
            $data['penyakit'] = $array_penyakit;
            $this->db->select('*');
            $this->db->from('trinternalclinic m');
            $this->db->join('mEmployee e', 'm.intIdEmployee = e.intIdEmployee');
            $this->db->join('mDepartemen d', 'e.intIdDepartment = d.intIdDepartement');
            $this->db->join('mDisease f', 'm.idcomplaint = f.intidDisease');
            $this->db->join('mMedicine o', 'm.idMedicine = o.idObat');

            if (!empty($idStatus)) {
                $this->db->where('m.health_status', $idStatus);
            }
            // if(!empty($idDisease)) {
            //     $this->db->where('m.idcomplaint', $idDisease);
            // }
            if (!empty($idDate1) && !empty($idDate2)) {
                // $ymd = explode("-", $idPeriod);
                // $RESULTEXPL = $ymd[0];
                $this->db->where('m.date BETWEEN"'.$idDate1.'"and"'.$idDate2.'"');
            }
            if (!empty($idDept)) {
                $this->db->where('e.intIdDepartment', $idDept);
            }
            if (!empty($idNik)) {
                $this->db->where('e.intIdEmployee', $idNik);
            }
            $data['listintclinic'] = $this->db->get()->result();
        }
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/visit_record.php';
        $this->load->view('template', $data);
    }

    public function visit_perf()
    {
        // $wheres['dept'] = $this->input->get('dept')!='' ? $this->input->get('dept'):'';
        // $wheres['filterperiod'] = $this->input->get('filterperiod')!='' ? $this->input->get('filterperiod'):'';
        $data['intclinic'] = $this->M_internal_clinic->get_visitperf();
        // $data['totalpenyakit'] = $this->M_interal_clinic->totalpenyakit($wheres);
        $data['employee'] = $this->M_internal_clinic->get_employeenik();
        $data['deptlist'] = $this->M_internal_clinic->get_deptlist();
        $data['mcuperiod'] = $this->M_internal_clinic->get_mcuperiod();
        $data['detaildept'] = $this->M_internal_clinic->get_employeenik();
        $data['listintclinic'] = $this->M_internal_clinic->get_list_intclinic();
        $data['paramedic'] = $this->M_internal_clinic->get_paramedic();
        // $data['totaldept'] = $this->M_interal_clinic->totaldept($wheres);
        $data['disease'] = $this->M_internal_clinic->get_disease();
        $buttonSRCH = $this->input->post('searchVal', true);
        if($buttonSRCH != '1'){
            $data['disease'] = $this->M_internal_clinic->get_disease();
            $array_penyakit = array();
            foreach ($data['disease'] as $i=>$penyakit){
                $array_penyakit[$penyakit['intidDisease']] = $penyakit['txtNamaDisease'];
            }
            $data['listmcu'] = $this->M_internal_clinic->get_listmcu();
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
            $penyakit = $this->M_internal_clinic->getWhere_disease($key);
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
        
        //OLD
        // $data['actionperf'] = $this->M_internal_clinic->get_actionperf();
        // $array_action = array();
        // $array_actiontotal = array();
        // foreach ($data['actionperf'] as $i => $action) {
        //     $array_action[$i] = $action['txtNamaDepartement'];

        //     $array_actiontotal[$i] = $this->db->get_where('trMcu', ['intIdEmployee' => $action['intIdEmployee']])->num_rows();
        // }
        // $data['action'] = json_encode($array_action);
        // $data['actiontotal'] = json_encode($array_actiontotal);

        // $array_penyakit = array();
        // $array_total = array();
        // foreach ($data['intclinic'] as $i => $penyakit) {
        //     $array_penyakit[$i] = $penyakit['txtNamaDisease'];

        //     $array_total[$i] = $this->db->get_where('trinternalclinic', ['idcomplaint' => $penyakit['intidDisease']])->num_rows();
        // }
        // $data['penyakit'] = json_encode($array_penyakit);
        // $data['total'] = json_encode($array_total);

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/visit_perf.php';
        $this->load->view('template', $data);
    }

    public function input_data()
    {
        $this->M_internal_clinic->add_data();
        $this->session->set_flashdata('flash-success', 'Di-simpan');
        redirect('performance_management/Internal_clinic/visit_record');
        //var_dump($data);
    }

    public function delete($id)
    {
        $where = array('internalclinic_id' => $id);
        $this->M_internal_clinic->delete_data($where, 'trinternalclinic');
        redirect('performance_management/Internal_clinic');
    }

    public function destroy()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('internalclinic_id');
            if ($id) {
                $this->M_internal_clinic->destroy($id);
                $data = [
                    'code' => 200,
                    'status' => true,
                    'msg' => 'Data berhasil dihapus',
                    'data' => NULL
                ];
            } else {
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

    public function edit($internalclinic_id)
    {
        $where = array('internalclinic_id' => $internalclinic_id);

        $data['clinicedit'] = $this->M_internal_clinic->edit_data($where, $this->table)->row();

        $data['intclinic'] = $this->M_internal_clinic->get_all_data()->result();
        $data['employee'] = $this->M_internal_clinic->get_employeenik();
        $data['listintclinic'] = $this->M_internal_clinic->get_list_intclinic();
        $data['paramedic'] = $this->M_internal_clinic->get_paramedic();
        $data['disease'] = $this->M_internal_clinic->get_disease();
        $data['medicine'] = $this->M_internal_clinic->get_medicine();

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/internal_clinic edit.php';
        $this->load->view('template', $data);
    }

    public function update_data()
    {
        $internalclinic_id  = $this->input->post('internalclinic_id');
        $employee_number    = $this->input->post('employee_number');
        $name               = $this->input->post('name');
        $departement        = $this->input->post('departement');
        $age                = $this->input->post('age');
        $address            = $this->input->post('address');
        $service_period     = $this->input->post('service_period');
        $date               = $this->input->post('date');
        $paramedic_name     = $this->input->post('paramedic_name');
        $complaint          = $this->input->post('complaint');
        $action             = $this->input->post('action');
        $medicine           = $this->input->post('medicine');

        $data = array(
            'internalclinic_id' => $internalclinic_id,
            'employee_number'   => $employee_number,
            'name'              => $name,
            'departement'       => $departement,
            'age'               => $age,
            'address'           => $address,
            'service_period'    => $service_period,
            'date'              => $date,
            'paramedic_name'    => $paramedic_name,
            'complaint'         => $complaint,
            'action'            => $action,
            'medicine'          => $medicine
        );


        $this->M_internal_clinic->update_data($internalclinic_id, 'trinternalclinic', $data);
        redirect('performance_management/Internal_clinic');
        //var_dump($data);
    }

    public function getIdEmployee()
    {
        if ($this->input->is_ajax_request()) {
            $code = $_POST['kode'];
            $check = $this->M_internal_clinic->getdetailemployee($code);
            if ($check) {
                echo json_encode($check);
            } else {
                echo json_encode('Failed');
            }
        } else {
            echo 'You can not access';
        }
    }

    public function get_intc_id()
    {
        if ($this->input->is_ajax_request()) {
            $code = $_POST['kode'];
            $check = $this->M_internal_clinic->get_data($code);
            if ($check) {
                echo json_encode($check);
            } else {
                echo json_encode('Failed');
            }
        } else {
            echo 'You can not access';
        }
    }
}
