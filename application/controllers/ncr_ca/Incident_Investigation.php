<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Incident_Investigation.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 20/04/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Incident_Investigation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
    }


    public function index()
    {
        // code here...
        $data['title'] = 'Smart Qeesh App';
        $data['menu_header'] = 'NON-CONFORMITY & CORRECTIVE ACTION';
        $data['page'] = 'NCR & CA';
        $data['subpage'] = 'Incident Investigation';
        $data['content'] = 'pages/ncr_ca/v_incident_investigation';
        $this->load->view('template', $data);
    }

    public function get_data_dominos_effect()
    {
        if ($this->input->is_ajax_request()) {
            // $this->load->model('m_ncr_ca');
            // $data = $this->m_ncr_ca->get_data_dominos_effect();
            $data = [
                0 => [
                    'ds_id' => 'BC',
                    'ds_type' => 'BASIC CAUSE',
                    'ds_label' => 'BasicCause',
                    'ds_child' => [
                        0 => [
                            'childid' => '1',
                            'child_name' => 'No or Like Of Procedure'
                        ],
                        1 => [
                            'childid' => '2',
                            'child_name' => 'No or Like Of Tools'
                        ],
                        2 => [
                            'childid' => '3',
                            'child_name' => 'No or Like Of Awareness'
                        ],
                        3 => [
                            'childid' => '4',
                            'child_name' => 'No or Like Of Obedience'
                        ],
                        4 => [
                            'childid' => '5',
                            'child_name' => 'No Of Cooperation'
                        ],
                    ]
                ],
                1 => [
                    'ds_id' => 'IDC',
                    'ds_type' => 'IN DIRECT CAUSE',
                    'ds_label' => 'IndirectCause',
                    'ds_child' => [
                        0 => [
                            'childid' => '1',
                            'child_name' => 'Work Factor'
                        ],
                        1 => [
                            'childid' => '2',
                            'child_name' => 'Personal Factor'
                        ],
                    ]
                ],
                2 => [
                    'ds_id' => 'DC',
                    'ds_type' => 'DIRECT CAUSE',
                    'ds_label' => 'DirectCause',
                    'ds_child' => [
                        0 => [
                            'childid' => '1',
                            'child_name' => 'Unsafe Actions'
                        ],
                        1 => [
                            'childid' => '2',
                            'child_name' => 'Unsafe Conditions'
                        ],
                    ]
                ],
                3 => [
                    'ds_id' => 'LS',
                    'ds_type' => 'LOSES',
                    'ds_label' => 'Loses',
                    'ds_child' => [
                        0 => [
                            'childid' => '1',
                            'child_name' => 'Human'
                        ],
                        1 => [
                            'childid' => '2',
                            'child_name' => 'Machine'
                        ],
                        2 => [
                            'childid' => '3',
                            'child_name' => 'Material'
                        ],
                        3 => [
                            'childid' => '4',
                            'child_name' => 'Environment'
                        ],
                    ]
                ],
            ];
            $response = [
                'code' => 200,
                'status' => 'ok',
                'data' => $data,
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

    public function save_data()
    {
        $post = $this->input->post();
        $investigation_type = '1'; // 1 = Incident Investigation
        // $data['created_by'] = $this->session->userdata('user_id');
        $created_by = '1';
        $created_date = date('Y-m-d H:i:s');
        $updated_by = '1';
        $updated_date = date('Y-m-d H:i:s');
        // data post
        $date_incident = $post['inputIncidentDate'];
        $time_incident = $post['inputIncidentTime'];
        $incident_area = $post['inputIncidentArea'];
        $incident_plant = $post['inputIncidentPlant'];
        // ===================== victim information ======================
        $emplodee_number = $post['inputEmplodeeNumber'];
        $victim_name = $post['inputVictimName'];
        // $victim_position = $post['inputVictimPosition'];
        $victim_department = $post['inputVictimDepartment'];
        $victim_age = $post['inputVictimAge'];
        $victim_level = $post['inputVictimLevel'];
        $victim_service_period = $post['inputVictimServicePeriod'];
        // =================== incident information ======================
        $incident_desc = $post['inputIncidentDesc'];
        $injuried_body_part = implode(', ', $post['inputInjuriedBodyPart']);
        $condition_of_wound = $post['inputConditionOfWound'];
        $incident_level = $post['inputIncidentLevel'];
        $severity_level = $post['inputSeverityLevel'];
        $reccurent_proability = $post['inputReccurentProability'];
        $action_taken = $post['inputActionTaken'];
        $date_back_to_work = $post['inputDateBackToWork'];
        // ============ route couse analysis ==============================
        $manpower = implode(', ', $post['input_manpower']);
        $methode = implode(', ', $post['input_methode']);
        $material = implode(', ', $post['input_material']);
        $machine = implode(', ', $post['input_machine']);
        // =============== Dominos Effect Accident ========================
        $basic_cause = implode(', ', $post['inputBasicCause']);
        $indirect_cause = implode(', ', $post['inputIndirectCause']);
        $direct_cause = implode(', ', $post['inputDirectCause']);
        $loses = implode(', ', $post['inputLoses']);
        // ============== Preventive And Corrective Action ================
        $preventive_action = $post['inputPreventiveAction'];
        $person_responsibility = $post['inputPersonResponsibility'];
        $time_target = $post['inputTimeTarget'];
        // $corrective_action = $post['inputCorrectiveAction'];
        // =================== Incident Photo =============================
        $incident_img = 'default.jpg';
        // $incident_img = $post['inputIncidentImg'];
        // ================== Investigation Team ==========================
        $lead_investigation = $post['inputLeadInvestigation'];
        $member_investigation = null;
        if (isset($post['inputMemberInvestigation']) && !empty($post['inputMemberInvestigation'])) {
            $member_investigation = implode(', ', $post['inputMemberInvestigation']);
        }







        $data_insert = [
            'inv_type' => $investigation_type,
            'date_incident' => $date_incident,
            'time_incident' => $time_incident,
            'incident_area' => $incident_area,
            'incident_plant' => $incident_plant,
            // ===================== victim information ======================
            'vi_employee_number' => $emplodee_number,
            'vi_victim_name' => $victim_name,
            // 'vi_victim_position' => $victim_position,
            'vi_victim_department' => $victim_department,
            'vi_victim_age' => $victim_age,
            'vi_victim_level' => $victim_level,
            'vi_victim_service_period' => $victim_service_period,
            // =================== incident information ======================
            'ii_incident_desc' => $incident_desc,
            // 'ii_incident_date' => $incident_date,
            // 'ii_incident_time' => $incident_time,
            'ii_injuried_body_part' => $injuried_body_part,
            'ii_condition_of_wound' => $condition_of_wound,
            'ii_incident_level' => $incident_level,
            'ii_severity_level' => $severity_level,
            'ii_reccurent_proability' => $reccurent_proability,
            'ii_action_taken' => $action_taken,
            'ii_date_back_to_work' => $date_back_to_work,
            // ============ route couse analysis ==============================
            'rca_manpower' => $manpower,
            'rca_methode' => $methode,
            'rca_machine' => $machine,
            'rca_material' => $material,
            // =============== Dominos Effect Accident ========================
            'de_basic_cause' => $basic_cause,
            'de_indirect_cause' => $indirect_cause,
            'de_direct_cause' => $direct_cause,
            'de_loses' => $loses,
            // ============== Preventive And Corrective Action ================
            'pca_preventive_action' => $preventive_action,
            'pca_person_responsibility' => $person_responsibility,
            'pca_time_target' => $time_target,
            // =================== Incident Photo =============================
            'incident_img' => $incident_img,
            // ================== Investigation Team ==========================
            'investigation_lead' => $lead_investigation,
            'investigation_member' => $member_investigation,
            // =================== Created By ================================
            'created_by' => $created_by,
            'created_date' => $created_date,
            // 'created_time' => $data['created_time,
            // =================== Updated By ================================
            'updated_by' => $updated_by,
            'updated_date' => $updated_date,
            // 'updated_time' => $data['updated_time,

        ];
        // var_dump($data);
        // die;
        echo json_encode($data_insert);
    }
}
