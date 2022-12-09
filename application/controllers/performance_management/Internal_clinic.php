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

    public function visit_record()
    {
        $data['listintclinic'] = $this->M_internal_clinic->get_list_intclinic();
        $data['employee'] = $this->M_internal_clinic->get_employeenik();
        $data['deptlist'] = $this->M_internal_clinic->get_deptlist();
        $data['disease'] = $this->M_internal_clinic->get_disease();

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/visit_record.php';
        $this->load->view('template', $data);
    }

    public function visit_perf()
    {
        $data['intclinic'] = $this->M_internal_clinic->get_visitperf();

        $data['employee'] = $this->M_internal_clinic->get_employeenik();
        $data['detaildept'] = $this->M_internal_clinic->get_employeenik();
        $data['listintclinic'] = $this->M_internal_clinic->get_list_intclinic();
        $data['paramedic'] = $this->M_internal_clinic->get_paramedic();

        $array_penyakit = array();
        $array_total = array();
        foreach ($data['intclinic'] as $i=>$penyakit)
        {
            $array_penyakit[$i] = $penyakit['txtNamaDisease'];

            $array_total[$i] = $this->db->get_where('trinternalclinic', ['idcomplaint' => $penyakit['intidDisease']])->num_rows();

            
        }
        $data['penyakit'] = json_encode($array_penyakit);
        $data['total'] = json_encode($array_total);

        foreach ($data['intclinic'] as $i=>$penyakit)
        {
            $array_penyakit[$i] = $penyakit['txtNamaDisease'];

            $array_total[$i] = $this->db->get_where('trinternalclinic', ['idcomplaint' => $penyakit['intidDisease']])->num_rows();

            
        }
        $data['penyakit'] = json_encode($array_penyakit);
        $data['total'] = json_encode($array_total);
        
        
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

    public function edit($internalclinic_id)
    {
        $where = array('internalclinic_id' =>$internalclinic_id); 

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
