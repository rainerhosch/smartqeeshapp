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
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_user', 'user');

        $this->load->model('M_internal_clinic');
    }

    public function index()
    {
        $data['intclinic'] = $this->M_internal_clinic->get_data();

        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        $data['subpage'] = 'Blank Page';
        // $data['user_divisi'] = 'CT-HSE';
        $data['content'] = 'pages/performance_management/internal_clinic.php';
        $this->load->view('template', $data);
    }

    public function add_data()
    {
        $employee_number    = $this->input->post('employee_number');
        $name               = $this->input->post('name');
        $departement        = $this->input->post('departement');
        $age                = $this->input->post('age');
        $address            = $this->input->post('addess');
        $service_period     = $this->input->post('service_period');
        $date               = $this->input->post('date');
        $paramedic_name     = $this->input->post('paramedic_name');
        $complaint          = $this->input->post('complaint');
        $action             = $this->input->post('action');
        $medicine           = $this->input->post('medicine');

        $data = array(
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

        $this->M_internal_clinic->input_data($data);
        redirect('performance_management/Internal_clinic');
    }

    public function delete($id)
    {
        $where = array('internalclinic_id' => $id);
        $this->M_internal_clinic->delete_data($where, 'trinternalclinic');
        redirect('performance_management/Internal_clinic');
    }
}
