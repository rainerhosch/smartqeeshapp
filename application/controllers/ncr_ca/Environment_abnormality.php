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

        if (isset($post['inputMemberInvestigation']) && !empty($post['inputMemberInvestigation'])) {
            $member_investigation = implode(',', $post['inputMemberInvestigation']);

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


    public function delete_data()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $where = [
                'int_id_Envinvestigation' => $data_post['id']
            ];
            $delete = $this->envinvestigation->delete_data($where);
            if (!$delete) {
                $data = [
                    'status' => false,
                    'code' => 500,
                    'icon' => 'error',
                    'message' => 'Koneksi Server Error!',
                    'data' => null
                ];
            } else {
                // $this->generate_bagan_json_file();
                $data = [
                    'status' => true,
                    'code' => 200,
                    'icon' => 'success',
                    'message' => 'Data berhasil dihapus.',
                    'data' => $delete
                ];
            }
            echo json_encode($data);
        } else {
            show_404();
        }
    }
    public function DownloadsToWord()
    {
        $data_param = $this->input->get();
        $where = [
            'int_id_Envinvestigation' => $data_param['id']
        ];
        $datareq = $this->envinvestigation->get_data($where)->row_array();

        $department = $this->department->getData_v2(['intIdDepartement' => $datareq['txt_incident_departement']])->row_array();
        $datareq['department_name'] = $department['txtNamaDepartement'];
        $dataplant = $this->plant->getById($datareq['txt_incident_plant']);
        $datareq['plant_name'] = $dataplant->txtNamaPlant;

        $envabnormal_table = [
            0 => [
                'label_1' => 'E-RCA Nomor',
                'data_1' => 'E-RCA/ENV/' . $datareq['int_id_Envinvestigation'],
                'label_2' => 'Departement',
                'data_2' => $datareq['department_name'],
            ],
            1 => [
                'label_1' => 'Date',
                'data_1' => $datareq['dtm_date_incident'],
                'label_2' => 'Location',
                'data_2' => $datareq['txt_incident_location'],
            ],
            2 => [
                'label_1' => 'Plant',
                'data_1' => $datareq['plant_name'],
                'label_2' => 'Incident Report by',
                'data_2' => $datareq['txt_report_by'],
            ],
        ];
        $envabnormal_table_2 = [
            0 => [
                'label_1' => 'Failure',
                'data_1' => 'E-RCA/ENV/' . $datareq['int_id_Envinvestigation'],
                'label_2' => 'Estimate quantity',
                'data_2' => $datareq['txt_fd_estimate_quantity'],
            ],
            1 => [
                'label_1' => 'Material Polluter',
                'data_1' => $datareq['txt_fd_material_polluter'],
                'label_2' => 'Environment Impact to',
                'data_2' => $datareq['txt_fd_env_inpact_to'],
            ],
        ];
        $datareq['row_fishbone'] = 0;
        $datareq['data_fishbone'] = [];
        $datareq['manpower'] = explode(',', $datareq['txt_rca_manpower']);
        $jml_data[] = count($datareq['manpower']);
        $datareq['methode'] = explode(',', $datareq['txt_rca_methode']);
        $jml_data[] = count($datareq['methode']);
        $datareq['machine'] = explode(',', $datareq['txt_rca_machine']);
        $jml_data[] = count($datareq['machine']);
        $datareq['material'] = explode(',', $datareq['txt_rca_material']);
        $jml_data[] = count($datareq['material']);
        foreach ($jml_data as $i => $val) {
            if ($datareq['row_fishbone'] < $val) {
                $datareq['row_fishbone'] = $val;
            }
        }
        for ($j = 0; $j < $datareq['row_fishbone']; $j++) {
            $manpower = '';
            $methode = '';
            $machine = '';
            $material = '';
            if (isset($datareq['manpower'][$j])) {
                $manpower = $datareq['manpower'][$j];
            }
            if (isset($datareq['methode'][$j])) {
                $methode = $datareq['methode'][$j];
            }
            if (isset($datareq['machine'][$j])) {
                $machine = $datareq['machine'][$j];
            }
            if (isset($datareq['material'][$j])) {
                $material = $datareq['material'][$j];
            }
            $datareq['data_fishbone'][$j] = [
                'manpower' => $manpower,
                'methode' => $methode,
                'machine' => $machine,
                'material' => $material,
            ];
        }

        // data dominos effect
        $datareq['row_dominos_effect'] = 0;
        $datareq['data_dominos_effect'] = [];
        $datareq['basic_cause'] = explode(',', $datareq['txt_de_basic_cause']);
        $jml_data_de[] = count($datareq['basic_cause']);
        $datareq['indirect_cause'] = explode(',', $datareq['txt_de_indirect_cause']);
        $jml_data_de[] = count($datareq['indirect_cause']);
        $datareq['direct_cause'] = explode(',', $datareq['txt_de_direct_cause']);
        $jml_data_de[] = count($datareq['direct_cause']);
        $datareq['de_loses'] = explode(',', $datareq['txt_de_loses']);
        $jml_data_de[] = count($datareq['de_loses']);
        foreach ($jml_data_de as $i => $val) {
            if ($datareq['row_dominos_effect'] < $val) {
                $datareq['row_dominos_effect'] = $val;
            }
        }
        for ($j = 0; $j < $datareq['row_dominos_effect']; $j++) {
            $basic_cause = '';
            $indirect_cause = '';
            $direct_cause = '';
            $de_loses = '';
            if (isset($datareq['basic_cause'][$j])) {
                $basic_cause = $datareq['basic_cause'][$j];
            }
            if (isset($datareq['indirect_cause'][$j])) {
                $indirect_cause = $datareq['indirect_cause'][$j];
            }
            if (isset($datareq['direct_cause'][$j])) {
                $direct_cause = $datareq['direct_cause'][$j];
            }
            if (isset($datareq['de_loses'][$j])) {
                $de_loses = $datareq['de_loses'][$j];
            }
            $datareq['data_dominos_effect'][$j] = [
                'basic_cause' => $basic_cause,
                'indirect_cause' => $indirect_cause,
                'direct_cause' => $direct_cause,
                'de_loses' => $de_loses,
            ];
        }

        // echo '<pre>';
        // var_dump($datareq);
        // echo '</pre>';
        // die;

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->setDefaultParagraphStyle(
            array(
                'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,
                'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(1.5),
                'spacing' => 1.15,
            )
        );
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $dir_image = FCPATH . 'assets/images/';

        // style
        $sectionStyle = array(
            'marginTop' => 600,
            'marginBottom' => 350,
            'marginRight' => 600,
            'marginLeft' => 600,
        );
        $section = $phpWord->addSection($sectionStyle);
        // define bold style
        $boldFontStyleName = 'BoldText';
        $phpWord->addFontStyle($boldFontStyleName, array('bold' => true, 'size' => 14));

        // Add page header
        $header = $section->addHeader();
        $styleTableHeader = array('borderSize' => 5, 'borderColor' => '000');
        $styleTable = array('borderTopSize' => 3, 'borderBottomSize' => 3, 'borderLeftSize' => 3, 'borderRightSize' => 3, 'borderColor' => '000');
        // $styleTable = array('borderSize' => 3, 'borderColor' => '000');

        $fancyTableStyle = array('borderTopSize' => 3, 'borderBottomSize' => 3, 'borderLeftSize' => 3, 'borderRightSize' => 3, 'borderColor' => '999999');
        // $fancyTableStyle = array('borderSize' => 6, 'borderColor' => '999999');
        $cellRowSpan = array('borderSize' => 3, 'vMerge' => 'restart', 'valign' => 'center');
        $cellRowContinue = array('borderSize' => 3, 'vMerge' => 'continue');
        $cellColSpan = array('borderSize' => 3, 'gridSpan' => 3);
        $cellHCentered = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
        $cellVCentered = array('valign' => 'center');

        $table = $header->addTable($styleTableHeader);
        $table->addRow();
        $table->addCell(2000, ['valign' => 'center'])->addImage($dir_image . 'apf-header.png', array('width' => 120, 'height' => 65, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH));
        $cell = $table->addCell(8000, ['valign' => 'center']);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('ENVIRONMENTAL ABNORMALITY', $boldFontStyleName);
        $textrun->addTextBreak();
        $textrun->addText('ROOT COUSE ANALYSIS', ['size' => 14]);
        $cell = $table->addCell(3000, ['valign' => 'center']);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('Form No. :', ['size' => 14]);

        // Add footer
        $footer = $section->addFooter();
        $footerText = 'THIS INFORMATION IS CONFIDENTIAL AND PROPRIETARY TO APF AND SHALL NOT BE REPRODUCED OR OTHERWISE DISCLOSED TO ANYONE OTHER THAN APF EMPLOYES WITHOUT WRITTEN PERMISSION FROM APF.';
        $footer->addText($footerText, ['size' => 7, 'name' => 'Calibri'], ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH]);

        // Content Table Env Cause
        $section->addTextBreak();
        $tableS = $section->addTable($styleTable);
        foreach ($envabnormal_table as $i => $val) {
            $tableS->addRow();
            $cell = $tableS->addCell(3000);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
            $textrun->addText($val['label_1'], ['name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
            $cell = $tableS->addCell(500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText(':', ['name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
            $cell = $tableS->addCell(5500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
            $textrun->addText($val['data_1'], ['color' => '808080', 'name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
            $cell = $tableS->addCell(500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText(' ', ['name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
            $cell = $tableS->addCell(5000);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
            $textrun->addText($val['label_2'], ['name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
            $cell = $tableS->addCell(500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText(':', ['name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
            $cell = $tableS->addCell(5500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
            $textrun->addText($val['data_2'], ['color' => '808080', 'name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
        }

        $section->addTextBreak();
        $tableS = $section->addTable($styleTable);
        foreach ($envabnormal_table_2 as $i => $val2) {
            $tableS->addRow();
            $cell = $tableS->addCell(3000);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
            $textrun->addText($val2['label_1'], ['name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
            $cell = $tableS->addCell(500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText(':', ['name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
            $cell = $tableS->addCell(5500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
            $textrun->addText($val2['data_1'], ['color' => '808080', 'name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
            $cell = $tableS->addCell(500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText(' ', ['name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
            $cell = $tableS->addCell(5000);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
            $textrun->addText($val2['label_2'], ['name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
            $cell = $tableS->addCell(500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText(':', ['name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
            $cell = $tableS->addCell(5500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
            $textrun->addText($val2['data_2'], ['color' => '808080', 'name' => 'Cambria', 'size' => 11], ['lineSpacing' => 150]);
        }

        // Content Env Cause Desc
        $section->addTextBreak();
        $tableS = $section->addTable(['borderSize' => 3, 'borderColor' => '000']);
        $tableS->addRow();
        $cell = $tableS->addCell(18000);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Failure Description :', ['name' => 'Cambria', 'size' => 11]);
        $textrun->addTextBreak();
        $textrun->addText('Description Of Failure', ['name' => 'Cambria', 'italic' => true, 'size' => 11, 'color' => '000']);
        $textrun->addTextBreak();
        $textrun->addTextBreak();

        $incident_desc = explode('/', $datareq['txt_fd_incident_desc']);
        foreach ($incident_desc as $i => $val) {
            $textrun->addText('• ' . $val, ['name' => 'Cambria', 'size' => 11, 'color' => '000']);
            $textrun->addTextBreak(1);
        }

        // new rows
        $tableS->addRow();
        $cell = $tableS->addCell(18000);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Observation/Immediate Action Taken :', ['name' => 'Cambria', 'size' => 11]);
        $textrun->addTextBreak();
        $fd_action_taken = explode('/', $datareq['txt_fd_action_taken']);
        foreach ($fd_action_taken as $i => $val) {
            $textrun->addText('• ' . $val, ['name' => 'Cambria', 'size' => 11, 'color' => '000']);
            $textrun->addTextBreak(1);
        }
        $textrun->addTextBreak();
        // new rows
        $tableS->addRow();
        $cell = $tableS->addCell(18000);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Probable Reasons :', ['name' => 'Cambria', 'size' => 11]);
        $textrun->addTextBreak();
        $textrun->addText($datareq['txt_fd_probable_reason'], ['name' => 'Cambria', 'size' => 11, 'color' => '000']);
        $textrun->addTextBreak();
        // new rows
        $tableS->addRow();
        $cell = $tableS->addCell(18000);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Corrective and Preventive Action :', ['name' => 'Cambria', 'size' => 11]);
        $textrun->addTextBreak();

        $fd_cnr_action = explode('/', $datareq['txt_fd_cnr_action']);
        foreach ($fd_cnr_action as $i => $val) {
            $textrun->addText('• ' . $val, ['name' => 'Cambria', 'size' => 11, 'color' => '000']);
            $textrun->addTextBreak(1);
        }
        $textrun->addTextBreak();

        $section->addTextBreak();
        $tableS = $section->addTable($styleTable);
        $tableS->addRow();
        $tableS->addCell(200, $cellVCentered);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Reporter', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Head Dept ', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Head of Function', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('HSE Head Dept', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $tableS->addCell(200, $cellVCentered);
        $section->addTextBreak();

        $tableS->addRow(2000);
        $tableS->addCell(200, $cellVCentered);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $tableS->addCell(200, $cellVCentered);
        $section->addTextBreak();


        // // Judul
        // $section->addTextBreak();
        // $tableS = $section->addTable(['borderSize' => 3, 'borderColor' => '000']);
        // $tableS->addRow();
        // $cell = $tableS->addCell(18000, ['bgColor' => '#DBE5F1']);
        // $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        // $textrun->addText('URAIAN KEJADIAN', ['bold' => true, 'name' => 'calibri', 'size' => 11]);
        // $textrun->addTextBreak();
        // $textrun->addText('Description Of Incident', ['italic' => true, 'name' => 'calibri', 'size' => 11, 'color' => '000']);

        // // Content Table Desc
        // $section->addTextBreak();
        // // $tableS = $section->addTable(['borderSize' => 3, 'borderColor' => '000']);
        // $tableS = $section->addTable(['borderTopSize' => 3, 'borderBottomSize' => 3, 'borderLeftSize' => 3, 'borderRightSize' => 3, 'borderColor' => '000']);
        // $tableS->addRow();
        // $cell = $tableS->addCell(11000, $cellColSpan);
        // $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        // $textrun->addText($datareq['txt_ii_incident_desc'], ['size' => 10]);
        // $cell = $tableS->addCell(7000);
        // $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        // $textrun->addText('Lingkari bagian tubuh yang terluka', ['bold' => true, 'name' => 'calibri', 'size' => 11]);
        // $textrun->addTextBreak();
        // $textrun->addText('Circle the injured body part', ['italic' => true, 'size' => 10, 'color' => 'A6A6A6']);
        // $textrun->addTextBreak();
        // $textrun->addImage($dir_image . 'bodypartanatomy.jpg', array('width' => 100, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH));

        // $tableS->addRow();
        // $spanTableStyleName = 'Colspan Rowspan';
        // $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
        // $cell = $tableS->addCell(5000, $cellVCentered);
        // $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        // $textrun->addText('Tingkat Kecelakaan', ['size' => 10], $cellHCentered);
        // $textrun->addTextBreak();
        // $textrun->addText('Accident Level', ['italic' => true, 'size' => 10, 'color' => 'A6A6A6']);
        // $tableS->addCell(500, $cellVCentered)->addText(':', null, $cellHCentered);
        // $tableS->addCell(3000, $cellVCentered)->addText($datareq['txt_ii_incident_level'], ['bold' => true, 'size' => 10, 'color' => 'FF0000'], $cellHCentered);
        // $cell = $tableS->addCell(7000, $cellRowSpan);
        // $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        // $textrun->addText('Jelaskan kondisi luka : ', ['bold' => true, 'size' => 11]);
        // $textrun->addTextBreak();
        // $textrun->addText('Describe the condition of the wound', ['italic' => true, 'size' => 10]);
        // $textrun->addTextBreak();
        // $textrun->addTextBreak();
        // $textrun->addText($datareq['txt_ii_condition_of_wound'], ['italic' => true, 'size' => 10]);

        // $tableS->addRow();
        // $cell = $tableS->addCell(5000, $cellVCentered);
        // $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        // $textrun->addText('Tingkat Keparahan', ['size' => 10], $cellHCentered);
        // $textrun->addTextBreak();
        // $textrun->addText('Severity Level', ['italic' => true, 'size' => 10, 'color' => 'A6A6A6']);
        // $tableS->addCell(500, $cellVCentered)->addText(':', null, $cellHCentered);
        // $tableS->addCell(3000, $cellVCentered)->addText($datareq['txt_ii_severity_level'], ['bold' => true, 'size' => 10, 'color' => 'FF0000'], $cellHCentered);
        // $tableS->addCell(null, $cellRowContinue);
        // $tableS->addRow();
        // $cell = $tableS->addCell(5000, $cellVCentered);
        // $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        // $textrun->addText('Kemungkinan Terulang', ['size' => 10], $cellHCentered);
        // $textrun->addTextBreak();
        // $textrun->addText('Recurrence Proability', ['italic' => true, 'size' => 10, 'color' => 'A6A6A6']);
        // $tableS->addCell(500, $cellVCentered)->addText(':', null, $cellHCentered);
        // $tableS->addCell(3000, $cellVCentered)->addText($datareq['txt_ii_reccurent_proability'], ['bold' => true, 'size' => 10, 'color' => 'FF0000'], $cellHCentered);
        // $tableS->addCell(null, $cellRowContinue);
        // // Judul
        // $section->addTextBreak();
        // $tableS = $section->addTable(['borderSize' => 3, 'borderColor' => '000']);
        // $tableS->addRow();
        // $cell = $tableS->addCell(18000);
        // $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        // $textrun->addText('Pengamatan / Tindakan Segera Diambil:', ['bold' => true, 'size' => 11]);
        // $textrun->addTextBreak();
        // $textrun->addText('Observation/Immediate Action Taken', ['italic' => true, 'size' => 11, 'color' => 'A6A6A6']);
        // $textrun->addTextBreak();
        // $textrun->addTextBreak();
        // $textrun->addText('Mr. ' . $datareq['txt_vi_victim_name'] . ' headed to the pratama clinic PT. Asia Pacific Fibers, the wound was cleaned and taken to the hospital', ['size' => 11]);



        // Create a second page
        $section->addPageBreak();
        // Page 2
        $section->addTextBreak();
        $tableS = $section->addTable($styleTable);
        $tableS->addRow();
        $cell = $tableS->addCell(18000);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Analisa Akar Penyebab :', ['bold' => true, 'size' => 11], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('Root Couse Analysis ', ['size' => 11, 'color' => '000']);

        $cellColSpan2 = array('borderSize' => 3, 'gridSpan' => 6);
        $section->addTextBreak();
        $tableS = $section->addTable($styleTable);
        $tableS->addRow();
        $cell = $tableS->addCell(18000, $cellColSpan2);
        $textrun = $cell->addTextRun(['bgColor' => '#DBE5F1', 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('FISH BOND METHODE', ['bold' => true, 'size' => 11], ['lineSpacing' => 50]);
        // line break tr
        $section->addTextBreak();
        $tableS->addRow();
        $cell = $tableS->addCell(18000, ['gridSpan' => 6]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        // end
        $tableS->addRow();
        $tableS->addCell(1000, $cellVCentered);
        $cell = $tableS->addCell(4000, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('MANPOWER', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4000, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('METHODE', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4000, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('MATERIAL', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4000, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('MACHINE', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        $tableS->addCell(1000, $cellVCentered);
        for ($i = 0; $i < $datareq['row_fishbone']; $i++) {
            $tableS->addRow();
            $tableS->addCell(1000, $cellVCentered);
            $cell = $tableS->addCell(4000, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText($datareq['data_fishbone'][$i]['manpower'], ['size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
            $cell = $tableS->addCell(4000, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText($datareq['data_fishbone'][$i]['methode'], ['size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
            $cell = $tableS->addCell(4000, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText($datareq['data_fishbone'][$i]['material'], ['size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
            $cell = $tableS->addCell(4000, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText($datareq['data_fishbone'][$i]['machine'], ['size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
            $tableS->addCell(1000, $cellVCentered);
        }
        // line break table tr
        $tableS->addRow();
        $cell = $tableS->addCell(18000, ['gridSpan' => 6]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        // end

        $cellColSpan2 = array('borderSize' => 3, 'gridSpan' => 8);
        $tableS = $section->addTable($styleTable);
        $tableS->addRow();
        $cell = $tableS->addCell(18000, $cellColSpan2);
        $textrun = $cell->addTextRun(['bgColor' => '#DBE5F1', 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Efek Domino dalam Kecelakaan :', ['bold' => true, 'size' => 11], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('Dominos Effect in Accident', ['italic' => true, 'size' => 11]);

        // line break tr
        $section->addTextBreak();
        $tableS->addRow();
        $cell = $tableS->addCell(18000, ['gridSpan' => 8]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        // end
        $tableS->addRow();
        $cell = $tableS->addCell(4500, ['borderSize' => 3, 'gridSpan' => 2]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('Penyebab Dasar', ['name' => 'calibri', 'bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('Basic Cause', ['name' => 'calibri', 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4500, ['borderSize' => 3, 'gridSpan' => 2]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('Penyebab Tidak Langsung', ['name' => 'calibri', 'bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('In Direct Cause', ['name' => 'calibri', 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4500, ['borderSize' => 3, 'gridSpan' => 2]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('Penyebab Langsung', ['name' => 'calibri', 'bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('Direct Cause', ['name' => 'calibri', 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4500, ['borderSize' => 3, 'gridSpan' => 2]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('Kerugian/Kecelakaan', ['name' => 'calibri', 'bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('Loses', ['name' => 'calibri', 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        for ($i = 0; $i < $datareq['row_dominos_effect']; $i++) {
            $tableS->addRow();
            $cell = $tableS->addCell(500, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            if ($datareq['data_dominos_effect'][$i]['basic_cause'] != '') {
                $textrun->addText('', ['name' => 'Wingdings 2', 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
            }
            $cell = $tableS->addCell(4000, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText($datareq['data_dominos_effect'][$i]['basic_cause'], ['name' => 'calibri', 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
            $cell = $tableS->addCell(500, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            if ($datareq['data_dominos_effect'][$i]['indirect_cause'] != '') {
                $textrun->addText('', ['name' => 'Wingdings 2', 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
            }
            $cell = $tableS->addCell(4000, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText($datareq['data_dominos_effect'][$i]['indirect_cause'], ['name' => 'calibri', 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
            $cell = $tableS->addCell(500, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            if ($datareq['data_dominos_effect'][$i]['direct_cause'] != '') {
                $textrun->addText('', ['name' => 'Wingdings 2', 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
            }
            $cell = $tableS->addCell(4000, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText($datareq['data_dominos_effect'][$i]['direct_cause'], ['name' => 'calibri', 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
            $cell = $tableS->addCell(500, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            if ($datareq['data_dominos_effect'][$i]['de_loses'] != '') {
                $textrun->addText('', ['name' => 'Wingdings 2', 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
            }
            $cell = $tableS->addCell(4000, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText($datareq['data_dominos_effect'][$i]['de_loses'], ['name' => 'calibri', 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        }
        // line break tr
        $section->addTextBreak();
        $tableS->addRow();
        $cell = $tableS->addCell(18000, ['gridSpan' => 8]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        // end


        // Page 3
        $section->addPageBreak();
        $section->addTextBreak();
        $cellColSpan2 = array('gridSpan' => 6);
        $tableS = $section->addTable($styleTable);
        $tableS->addRow();
        $cell = $tableS->addCell(18000, $cellColSpan2);
        $textrun = $cell->addTextRun(['bgColor' => '#DBE5F1', 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 20]);

        // line break tr
        $tableS->addRow();
        $tableS->addCell(200, $cellVCentered);
        $cell = $tableS->addCell(17600, ['borderSize' => 3, 'gridSpan' => 4]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Tindakan Perbaikan dan Pencegahan', ['size' => 10], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('Corrective and Preventive Action', ['italic' => true, 'size' => 10, 'color' => '000']);
        $tableS->addCell(200, $cellVCentered);
        // end
        $tableS->addRow();
        $tableS->addCell(200, $cellVCentered);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('Tindakan', ['name' => 'calibri', 'bold' => true, 'size' => 9, 'color' => '000'], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('Action', ['name' => 'calibri', 'size' => 9, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('Tanggung Jawab', ['name' => 'calibri', 'bold' => true, 'size' => 9, 'color' => '000'], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('Person in Charge', ['name' => 'calibri', 'size' => 9, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('Batas Waktu Penyelesaian', ['name' => 'calibri', 'bold' => true, 'size' => 9, 'color' => '000'], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('Due Date Completion', ['name' => 'calibri', 'size' => 9, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('Catatan', ['name' => 'calibri', 'bold' => true, 'size' => 9, 'color' => '000'], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('Notes', ['name' => 'calibri', 'size' => 9, 'color' => '000'], ['lineSpacing' => 50]);
        $tableS->addCell(200, $cellVCentered);
        for ($i = 0; $i < 4; $i++) {
            $tableS->addRow();
            $tableS->addCell(200, $cellVCentered);
            $cell = $tableS->addCell(4400, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText('', ['name' => 'arial', 'size' => 9, 'color' => 'FF0000'], ['lineSpacing' => 50]);
            $cell = $tableS->addCell(4400, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText('', ['name' => 'arial', 'size' => 9, 'color' => 'FF0000'], ['lineSpacing' => 50]);
            $cell = $tableS->addCell(4400, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText('', ['name' => 'arial', 'size' => 9, 'color' => 'FF0000'], ['lineSpacing' => 50]);
            $cell = $tableS->addCell(4400, $styleTableHeader);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText('', ['name' => 'arial', 'size' => 9, 'color' => 'FF0000'], ['lineSpacing' => 50]);
            $tableS->addCell(200, $cellVCentered);
        }
        $tableS->addRow();
        $cell = $tableS->addCell(18000, ['gridSpan' => 6]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        // end table corrective

        // table Documentation
        $section->addTextBreak();
        $cellColSpan2 = array('gridSpan' => 3);
        $tableS = $section->addTable($styleTable);
        $tableS->addRow();
        $cell = $tableS->addCell(18000, $cellColSpan2);
        $textrun = $cell->addTextRun(['bgColor' => '#DBE5F1', 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 20]);
        $tableS->addRow();
        $tableS->addCell(200, $cellVCentered);
        $cell = $tableS->addCell(17600, ['borderSize' => 3]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Dokumentasi', ['name' => 'calibri', 'bold' => true, 'size' => 10], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('Documentation', ['name' => 'calibri', 'italic' => true, 'size' => 10, 'color' => '000']);
        $tableS->addCell(200, $cellVCentered);

        $tableS->addRow(5000);
        $tableS->addCell(200, $cellVCentered);
        $cell = $tableS->addCell(17600, ['borderSize' => 3]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $path_accident_photos = $dir_image . 'accident/envabnormal/' . $datareq['int_id_Envinvestigation'];
        $incident_img = explode(',', $datareq['txt_incident_image']);
        foreach ($incident_img as $i => $val) {
            $textrun->addImage($path_accident_photos . '/' . $val, array('width' => 100, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH));
        }
        $tableS->addCell(200, $cellVCentered);
        // line break tr
        $tableS->addRow();
        $cell = $tableS->addCell(18000, ['gridSpan' => 3]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        // end

        // Table bootom
        $section->addTextBreak();
        $cellColSpan2 = array('gridSpan' => 6);
        $tableS = $section->addTable($styleTable);
        $tableS->addRow();
        $cell = $tableS->addCell(18000, $cellColSpan2);
        $textrun = $cell->addTextRun(['bgColor' => '#DBE5F1', 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 20]);

        $tableS->addRow();
        $tableS->addCell(200, $cellVCentered);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Reporter', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Head Dept ', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Head of Function', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('HSE Head Dept', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $tableS->addCell(200, $cellVCentered);
        $section->addTextBreak();

        $tableS->addRow(2000);
        $tableS->addCell(200, $cellVCentered);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $cell = $tableS->addCell(4400, $styleTableHeader);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('', ['name' => 'calibri', 'bold' => true, 'size' => 10, 'color' => '000'], ['lineSpacing' => 50]);
        $tableS->addCell(200, $cellVCentered);
        $section->addTextBreak();

        $tableS->addRow();
        $cell = $tableS->addCell(18000, ['gridSpan' => 6]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        // end




        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $filename = 'E-RCA-' . $datareq['int_id_Envinvestigation'] . ' (ENVIRONMENTAL ABNORMALITY)';

        header('Content-Type: application/msword');
        header('Content-Disposition: attachment;filename="' . $filename . '.docx"');
        header('Cache-Control: max-age=0');

        // $templateProcessor->saveAs('php://output');
        $objWriter->save('php://output');
    }

}