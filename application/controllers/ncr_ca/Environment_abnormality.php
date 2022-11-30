<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Environment_Abnormality.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 07/05/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\Writer\Word2007;

use PhpOffice\PhpWord\Element\Field;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\SimpleType\TblWidth;

class Environment_Abnormality extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_Envinvestigation', 'envinvestigation');
        $this->load->model("Manajemen/M_department", "department");
        $this->load->model("Manajemen/M_plant", "plant");
    }

    public function index()
    {
        // code here...
        $data['title'] = 'Smart Qeesh App';
        $data['menu_header'] = 'NON-CONFORMITY & CORRECTIVE ACTION';
        $data['page'] = 'NCR & CA';
        $data['subpage'] = 'Environment Abnormality';
        $data['content'] = 'pages/ncr_ca/v_environment_abnormal';
        $jml = $this->envinvestigation->get_data()->num_rows();
        $data['erca_no'] = 'E-RCA-' . ($jml + 1);
        $this->load->view('template', $data);
    }

    public function save_data()
    {
        $post = $this->input->post();

        $created_by = $this->session->userdata('user_id');
        $created_date = date('Y-m-d');
        $created_time = date('H:i:s');
        $updated_by = $this->session->userdata('user_id');
        $updated_date = date('Y-m-d');
        $updated_time = date('H:i:s');

        $formNo = $post['input-ercaNo'];
        $date_incident = $post['input-dateIncident'];
        $incident_plant = $post['input-incidentPlant'];
        $incident_departement = $post['input-incidentDepartment'];
        $incident_location = $post['input-incidentLocation'];
        $incident_reportBy = $post['input-reportBy'];

        // =================== incident information ======================
        $incident_desc = $post['input-failDesc'];
        $action_taken = $post['input-actionTaken'];
        $material_polluter = $post['input-materialPolluter'];
        $impactTo = $post['input-impactTo'];
        $estQty = $post['input-estQty'];
        $probReason = $post['input-probReason'];
        $cnpAction = $post['input-cnpAction'];

        // ============ route couse analysis ==============================
        $manpower = implode(',', $post['input_manpower']);
        $methode = implode(',', $post['input_methode']);
        $material = implode(',', $post['input_material']);
        $machine = implode(',', $post['input_machine']);
        // =============== Dominos Effect Accident ========================
        $basic_cause = implode(',', $post['inputBasicCause']);
        $indirect_cause = implode(',', $post['inputIndirectCause']);
        $direct_cause = implode(',', $post['inputDirectCause']);
        $loses = implode(',', $post['inputLoses']);
        // ============== Preventive And Corrective Action ================
        $preventive_action = $post['input-pncAction'];
        $person_responsibility = $post['input-person_responsibility'];
        $time_target = $post['input-time_target'];
        // $corrective_action = $post['inputCorrectiveAction'];
        // =================== Incident Photo =============================
        $incident_img = 'default.jpg';
        // $incident_img = $post['inputIncidentImg'];
        // ================== Investigation Team ==========================
        $lead_investigation = $post['input-leadInvestigation'];
        $member_investigation = null;
        if (isset($post['input-memberInvestigation']) && !empty($post['input-memberInvestigation'])) {
            $member_investigation = implode(',', $post['input-memberInvestigation']);
        }


        $data_insert = [
            'dtm_date_incident' => $date_incident,
            'txt_incident_plant' => $incident_plant,
            'txt_incident_departement' => $incident_departement,
            'txt_incident_location' => $incident_location,
            'txt_report_by' => $incident_reportBy,
            // =================== incident information ======================
            'txt_fd_incident_desc' => $incident_desc,
            'txt_fd_action_taken' => $action_taken,
            'txt_fd_material_polluter' => $material_polluter,
            'txt_fd_env_inpact_to' => $impactTo,
            'txt_fd_estimate_quantity' => $estQty,
            'txt_fd_probable_reason' => $probReason,
            'txt_fd_cnr_action' => $cnpAction,
            // ============ route couse analysis ==============================
            'txt_rca_manpower' => $manpower,
            'txt_rca_methode' => $methode,
            'txt_rca_machine' => $machine,
            'txt_rca_material' => $material,
            // =============== Dominos Effect Accident ========================
            'txt_de_basic_cause' => $basic_cause,
            'txt_de_indirect_cause' => $indirect_cause,
            'txt_de_direct_cause' => $direct_cause,
            'txt_de_loses' => $loses,
            // ============== Preventive And Corrective Action ================
            'txt_pca_preventive_action' => $preventive_action,
            'txt_pca_person_responsibility' => $person_responsibility,
            'txt_pca_time_target' => $time_target,
            // =================== Incident Photo =============================
            'txt_incident_image' => $incident_img,
            // ================== Investigation Team ==========================
            'txt_investigation_lead' => $lead_investigation,
            'txt_investigation_member' => $member_investigation,
            // =================== Created By ================================
            'int_create_by' => $created_by,
            'dtm_create_date' => $created_date,
            'dtm_create_time' => $created_time,
            // 'created_time' => $data['created_time,
            // =================== Updated By ================================
            'int_update_by' => $updated_by,
            'dtm_update_date' => $updated_date,
            'dtm_update_time' => $updated_time,
            // 'updated_time' => $data['updated_time,

        ];

        // echo '<pre>';
        // var_dump($data_insert);
        // echo '</pre>';
        // die;

        $insert = $this->envinvestigation->insert_data($data_insert);

        if ($insert) {
            // success
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
            redirect('ncr_ca/Environment_abnormality');
        } else {
            // error
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan data!</div>');
            redirect('ncr_ca/Environment_abnormality');
        }

    }


    public function getDataRecord()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $where = null;
            if (count($data_post) > 0) {
                if (isset($data_post['type'])) {
                    $where = [
                        'txt_inv_type' => $data_post['type']
                    ];
                }
            }
            $datareq = $this->envinvestigation->get_data($where)->result_array();
            foreach ($datareq as $i => $val) {
                $department = $this->department->getData_v2(['intIdDepartement' => $val['txt_incident_departement']])->row_array();
                $datareq[$i]['department_name'] = $department['txtNamaDepartement'];
                $dataplant = $this->plant->getById($val['txt_incident_plant']);
                $datareq[$i]['plant_name'] = $dataplant->txtNamaPlant;
            }

            $response = [
                'code' => 200,
                'status' => 'ok',
                'data' => $datareq,
                'message' => 'Success Request.',
            ];
        } else {
            $response = [
                'code' => 500,
                'status' => 'error',
                'data' => null,
                'message' => 'Invalid Request Method.',
            ];
        }
        echo json_encode($response);
    }
}