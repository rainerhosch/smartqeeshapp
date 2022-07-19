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
        $this->load->model('M_investigation', 'investigation');
        $this->load->model('Manajemen/M_employee', 'employee');
        $this->load->model("Manajemen/M_department", "department");
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

    public function getDataRecord()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $datareq = $this->investigation->get_data()->result_array();
            foreach ($datareq as $i => $val) {
                $department = $this->department->getData_v2(['intIdDepartement' => $val['txt_vi_victim_department']])->row_array();
                $employee = $this->employee->getData(['intIdEmployee' => $val['int_vi_employee_id']])->row_array();
                $datareq[$i]['victim_department_name'] = $department['txtNamaDepartement'];
                $datareq[$i]['victim_alamat_1'] = $employee['txtAlamat1'];
                $datareq[$i]['victim_alamat_2'] = $employee['txtAlamat2'];
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

    public function save_data()
    {
        $post = $this->input->post();
        $investigation_type = '1'; // 1 = Incident Investigation
        // $data['created_by'] = $this->session->userdata('user_id');
        $created_by = '1';
        $created_date = date('Y-m-d');
        $created_time = date('H:i:s');
        $updated_by = '1';
        $updated_date = date('Y-m-d');
        $updated_time = date('H:i:s');
        // data post
        $date_incident = $post['inputIncidentDate'];
        $time_incident = $post['inputIncidentTime'];
        $incident_area = $post['inputIncidentArea'];
        $incident_plant = $post['inputIncidentPlant'];
        // ===================== victim information ======================
        $emplodee_number = $post['inputEmplodeeNumber'];
        $victim_name = $post['inputVictimName'];
        $victim_id = $post['inputVictimId'];
        // $victim_position = $post['inputVictimPosition'];
        $victim_department = $post['inputVictimDepartment'];
        $victim_age = $post['inputVictimAge'];
        $employee_level = $post['inputEmployeeLevel'];
        $victim_service_period = $post['inputVictimServicePeriod'];
        // =================== incident information ======================
        $incident_desc = $post['inputIncidentDesc'];
        $injuried_body_part = implode(',', $post['inputInjuriedBodyPart']);
        $condition_of_wound = $post['inputConditionOfWound'];
        $incident_level = $post['inputIncidentLevel'];
        $severity_level = $post['inputSeverityLevel'];
        $reccurent_proability = $post['inputReccurentProability'];
        $action_taken = $post['inputActionTaken'];
        $date_back_to_work = $post['inputDateBackToWork'];
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
            $member_investigation = implode(',', $post['inputMemberInvestigation']);
        }


        $data_insert = [
            'txt_inv_type' => $investigation_type,
            'dtm_date_incident' => $date_incident,
            'dtm_time_incident' => $time_incident,
            'txt_incident_area' => $incident_area,
            'txt_incident_plant' => $incident_plant,
            // ===================== victim information ======================
            'txt_vi_employee_number' => $emplodee_number,
            'int_vi_employee_id' => $victim_id,
            'txt_vi_victim_name' => $victim_name,
            'txt_vi_victim_department' => $victim_department,
            'int_vi_victim_age' => $victim_age,
            'txt_vi_employee_level' => $employee_level,
            'txt_vi_victim_service_period' => $victim_service_period,
            // =================== incident information ======================
            'txt_ii_incident_desc' => $incident_desc,
            'txt_ii_injuried_body_part' => $injuried_body_part,
            'txt_ii_condition_of_wound' => $condition_of_wound,
            'txt_ii_incident_level' => $incident_level,
            'txt_ii_severity_level' => $severity_level,
            'txt_ii_reccurent_proability' => $reccurent_proability,
            'txt_ii_action_taken' => $action_taken,
            'dtm_ii_date_back_to_work' => $date_back_to_work,
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
        $insert = $this->investigation->insert_data($data_insert);
        // var_dump($this->db->last_query());
        // die;

        if ($insert) {
            // success
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan!</div>');
            redirect('ncr_ca/Incident_Investigation');
        } else {
            // error
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan data!</div>');
            redirect('ncr_ca/Incident_Investigation');
        }
    }

    // public function generateBodyPart()
    // {
    //     $dataBodyPart = [
    //         'Forehead',
    //         'Eye',
    //         'Nose',
    //         'Mouth',
    //         'Lip',
    //         'Chin',
    //         'Head',
    //         'Ear',
    //         'Neck',
    //         'Shoulder',
    //         'Chest',
    //         'Nipple',
    //         'Arm',
    //         'Armpit',
    //         'Elbow',
    //         'Navel',
    //         'Wrist',
    //         'Buttocks',
    //         'Forearm',
    //         'Hand',
    //         'Thumb',
    //         'Finger',
    //         'Hip',
    //         'Groin',
    //         'Leg',
    //         'Thigh',
    //         'Knee',
    //         'Calf',
    //         'Foot',
    //         'Ankle',
    //         'Instep',
    //         'Heal',
    //         'Toenail'
    //     ];
    //     foreach ($dataBodyPart as $i => $val) {
    //         $this->db->insert('mBodyPart', ['txtNameBodyPart' => $val]);
    //     }
    // }



    // public function createTable()
    // {
    //     // $this->load->db();
    //     $this->load->dbforge();
    //     // switch over to Library DB
    //     $this->db->query('use Library');

    //     $data_insert = [
    //         'int_id_investigation' => [
    //             'type' => 'INT',
    //             'constraint' => 50,
    //             'auto_increment' => TRUE
    //         ],
    //         'txt_inv_type' => [
    //             'type' => 'TEXT',
    //         ],
    //         'dtm_date_incident date default current_timestamp',
    //         'dtm_time_incident time default current_timestamp',
    //         'txt_incident_area' => [
    //             'type' => 'TEXT',
    //         ],
    //         'txt_incident_plant' => [
    //             'type' => 'TEXT',
    //         ],
    //         // ===================== victim information ======================
    //         'txt_vi_employee_number' => [
    //             'type' => 'TEXT',
    //         ],
    //         'txt_vi_victim_name' => [
    //             'type' => 'TEXT',
    //         ],
    //         // 'vi_victim_position' => $victim_position,
    //         'txt_vi_victim_department' => [
    //             'type' => 'TEXT',
    //         ],
    //         'int_vi_victim_age' => [
    //             'type' => 'INT',
    //             'constraint' => 11,
    //         ],
    //         'txt_vi_employee_level' => [
    //             'type' => 'TEXT',
    //         ],
    //         'txt_vi_victim_service_period' => [
    //             'type' => 'TEXT',
    //         ],
    //         // =================== incident information ======================
    //         'txt_ii_incident_desc' => [
    //             'type' => 'TEXT',
    //         ],
    //         'txt_ii_injuried_body_part' => [
    //             'type' => 'TEXT',
    //         ],
    //         'txt_ii_condition_of_wound' => [
    //             'type' => 'TEXT'
    //         ],
    //         'txt_ii_incident_level' => [
    //             'type' => 'TEXT'
    //         ],
    //         'txt_ii_severity_level' => [
    //             'type' => 'TEXT'
    //         ],
    //         'txt_ii_reccurent_proability' => [
    //             'type' => 'TEXT'
    //         ],
    //         'txt_ii_action_taken' => [
    //             'type' => 'TEXT',
    //         ],
    //         'dtm_ii_date_back_to_work date',
    //         // ============ route couse analysis ==============================
    //         'txt_rca_manpower' => [
    //             'type' => 'TEXT',
    //         ],
    //         'txt_rca_methode' => [
    //             'type' => 'TEXT',
    //         ],
    //         'txt_rca_machine' => [
    //             'type' => 'TEXT',
    //         ],
    //         'txt_rca_material' => [
    //             'type' => 'TEXT',
    //         ],
    //         // =============== Dominos Effect Accident ========================
    //         'txt_de_basic_cause' => [
    //             'type' => 'TEXT',
    //         ],
    //         'txt_de_indirect_cause' => [
    //             'type' => 'TEXT',
    //         ],
    //         'txt_de_direct_cause' => [
    //             'type' => 'TEXT',
    //         ],
    //         'txt_de_loses' => [
    //             'type' => 'TEXT',
    //         ],
    //         // ============== Preventive And Corrective Action ================
    //         'txt_pca_preventive_action' => [
    //             'type' => 'TEXT',
    //         ],
    //         'txt_pca_person_responsibility' => [
    //             'type' => 'TEXT',
    //         ],
    //         'txt_pca_time_target' => [
    //             'type' => 'TEXT',
    //         ],
    //         // =================== Incident Photo =============================
    //         'txt_incident_image' => [
    //             'type' => 'TEXT'
    //         ],
    //         // ================== Investigation Team ==========================
    //         'txt_investigation_lead' => [
    //             'type' => 'TEXT'
    //         ],
    //         'txt_investigation_member' => [
    //             'type' => 'TEXT'
    //         ],
    //         // =================== Created By ================================
    //         'int_create_by' => [
    //             'type' => 'INT',
    //             'constraint' => 11,
    //             'unique' => TRUE
    //         ],
    //         'dtm_create_date date default current_timestamp',
    //         'dtm_create_time time default current_timestamp',
    //         // =================== Updated By ================================
    //         'int_update_by' => [
    //             'type' => 'INT',
    //             'constraint' => 11,
    //             'unique' => TRUE
    //         ],
    //         'dtm_update_date date default current_timestamp',
    //         'dtm_update_time time default current_timestamp'

    //     ];

    //     $this->dbforge->add_field($data_insert);

    //     // define primary key
    //     $this->dbforge->add_key('int_id_investigation', TRUE);

    //     // create table
    //     $this->dbforge->create_table('trInvestigation');
    // }
}
