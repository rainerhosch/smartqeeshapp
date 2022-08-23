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

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\Writer\Word2007;

use PhpOffice\PhpWord\Element\Field;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\SimpleType\TblWidth;


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

    public function delete_data()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $where = [
                'int_id_investigation' => $data_post['id']
            ];
            $delete = $this->investigation->delete_data($where);
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

    public function DownloadsToWord()
    {
        $data_param = $this->input->get();
        $where = [
            'int_id_investigation' => $data_param['id']
        ];
        $datareq = $this->investigation->get_data($where)->row_array();
        $data_departemen = $this->department->getDepartment($datareq['txt_vi_victim_department']);
        $datareq['victim_department'] = $data_departemen['txtNamaDepartement'];
        $victim_table = [
            0 => [
                'label_1' => 'Tanggal',
                'eng_label_1' => 'Date',
                'data_1' => $datareq['dtm_date_incident'],
                'label_2' => 'Nama Korban',
                'eng_label_2' => 'Name of Victim',
                'data_2' => $datareq['txt_vi_victim_name'],
            ],
            1 => [
                'label_1' => 'Waktu',
                'eng_label_1' => 'Time',
                'data_1' => $datareq['dtm_time_incident'],
                'label_2' => 'Departement',
                'eng_label_2' => 'Departement',
                'data_2' => $datareq['victim_department'],
            ],
            2 => [
                'label_1' => 'Tempat',
                'eng_label_1' => 'Place',
                'data_1' => $datareq['txt_incident_area'],
                'label_2' => 'Jabatan',
                'eng_label_2' => 'Level',
                'data_2' => $datareq['txt_vi_employee_level'],
            ],
            3 => [
                'label_1' => 'Mesin/peralatan',
                'eng_label_1' => 'Machine/Equipment',
                'data_1' => '-',
                'label_2' => 'Lama Bekerja/ Umur',
                'eng_label_2' => 'Length of service/ Age',
                'data_2' => $datareq['txt_vi_victim_service_period'] . ' Month / ' . $datareq['int_vi_victim_age'] . ' YO',
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
        // // var_dump($datareq);
        // echo json_encode($datareq);
        // echo '</pre>';
        // die;
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->setDefaultParagraphStyle(
            array(
                'alignment'  => \PhpOffice\PhpWord\SimpleType\Jc::BOTH,
                'spaceAfter' => \PhpOffice\PhpWord\Shared\Converter::pointToTwip(1.5),
                'spacing'    => 1.15,
            )
        );
        $fontStyle = new \PhpOffice\PhpWord\Style\Font();
        $dir_image = FCPATH . 'assets/images/';

        // style
        $sectionStyle = array(
            'marginTop' => 600,
            'marginBottom' => 350,
            'marginRight' => 600,
            'marginLeft' =>  600,
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
        $textrun->addText('ANALISA AKAR PENYEBAB KECELAKAAN', $boldFontStyleName);
        $textrun->addTextBreak();
        $textrun->addText('ACCIDENT ROOT COUSE ANALYSIS', ['size' => 14]);
        $cell = $table->addCell(3000, ['valign' => 'center']);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('Form No. :', ['size' => 14]);

        // Add footer
        $footer = $section->addFooter();
        $footerText = 'THIS INFORMATION IS CONFIDENTIAL AND PROPRIETARY TO APF AND SHALL NOT BE REPRODUCED OR OTHERWISE DISCLOSED TO ANYONE OTHER THAN APF EMPLOYES WITHOUT WRITTEN PERMISSION FROM APF.';
        $footer->addText($footerText, ['size' => 7, 'name' => 'Calibri'], ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH]);

        // Label 1
        $section->addTextBreak();
        $tableS = $section->addTable($styleTable);
        $tableS->addRow();
        $cell = $tableS->addCell(3500);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Nomor', ['size' => 11], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('Number', ['italic' => true, 'size' => 11, 'color' => 'A6A6A6']);
        $cell = $tableS->addCell(500, ['valign' => 'center']);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText(':', ['size' => 11]);
        $cell = $tableS->addCell(16000, ['valign' => 'center']);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('10/HSE/ACC/XI/2021', ['size' => 11]);

        // Content Table Victim
        $section->addTextBreak();
        $tableS = $section->addTable($styleTable);
        foreach ($victim_table as $i => $val) {
            $tableS->addRow();
            $cell = $tableS->addCell(3000);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
            $textrun->addText($val['label_1'], ['size' => 11]);
            $textrun->addTextBreak();
            $textrun->addText($val['eng_label_1'], ['italic' => true, 'size' => 11, 'color' => 'A6A6A6']);
            $cell = $tableS->addCell(500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText(':', ['size' => 11]);
            $cell = $tableS->addCell(5500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
            $textrun->addText($val['data_1'], ['bold' => true, 'size' => 11]);
            $cell = $tableS->addCell(500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText(' ', ['size' => 11]);
            $cell = $tableS->addCell(5000);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
            $textrun->addText($val['label_2'], ['size' => 11]);
            $textrun->addTextBreak();
            $textrun->addText($val['eng_label_2'], ['italic' => true, 'size' => 11, 'color' => 'A6A6A6']);
            $cell = $tableS->addCell(500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
            $textrun->addText(':', ['size' => 11]);
            $cell = $tableS->addCell(5500, ['valign' => 'center']);
            $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
            $textrun->addText($val['data_2'], ['bold' => true, 'size' => 11]);
        }

        // Judul
        $section->addTextBreak();
        $tableS = $section->addTable(['borderSize' => 3, 'borderColor' => '000']);
        $tableS->addRow();
        $cell = $tableS->addCell(18000, ['bgColor' => '#DBE5F1']);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('URAIAN KEJADIAN', ['bold' => true, 'size' => 11]);
        $textrun->addTextBreak();
        $textrun->addText('Description Of Incident', ['italic' => true, 'size' => 11, 'color' => '000']);

        // Content Table Desc
        $section->addTextBreak();
        // $tableS = $section->addTable(['borderSize' => 3, 'borderColor' => '000']);
        $tableS = $section->addTable(['borderTopSize' => 3, 'borderBottomSize' => 3, 'borderLeftSize' => 3, 'borderRightSize' => 3, 'borderColor' => '000']);
        $tableS->addRow();
        $cell = $tableS->addCell(11000, $cellColSpan);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText($datareq['txt_ii_incident_desc'], ['size' => 10]);
        $cell = $tableS->addCell(7000);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Lingkari bagian tubuh yang terluka', ['bold' => true, 'size' => 11]);
        $textrun->addTextBreak();
        $textrun->addText('Circle the injured body part', ['italic' => true, 'size' => 10, 'color' => 'A6A6A6']);
        $textrun->addTextBreak();
        $textrun->addImage($dir_image . 'bodypartanatomy.jpg', array('width' => 100, 'height' => 200, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::BOTH));

        $tableS->addRow();
        $spanTableStyleName = 'Colspan Rowspan';
        $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
        $cell = $tableS->addCell(5000, $cellVCentered);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Tingkat Kecelakaan', ['size' => 10], $cellHCentered);
        $textrun->addTextBreak();
        $textrun->addText('Accident Level', ['italic' => true, 'size' => 10, 'color' => 'A6A6A6']);
        $tableS->addCell(500, $cellVCentered)->addText(':', null, $cellHCentered);
        $tableS->addCell(3000, $cellVCentered)->addText($datareq['txt_ii_incident_level'], ['bold' => true, 'size' => 10, 'color' => 'FF0000'], $cellHCentered);
        $cell = $tableS->addCell(7000, $cellRowSpan);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Jelaskan kondisi luka : ', ['bold' => true, 'size' => 11]);
        $textrun->addTextBreak();
        $textrun->addText('Describe the condition of the wound', ['italic' => true, 'size' => 10]);
        $textrun->addTextBreak();
        $textrun->addTextBreak();
        $textrun->addText($datareq['txt_ii_condition_of_wound'], ['italic' => true, 'size' => 10]);

        $tableS->addRow();
        $cell = $tableS->addCell(5000, $cellVCentered);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Tingkat Keparahan', ['size' => 10], $cellHCentered);
        $textrun->addTextBreak();
        $textrun->addText('Severity Level', ['italic' => true, 'size' => 10, 'color' => 'A6A6A6']);
        $tableS->addCell(500, $cellVCentered)->addText(':', null, $cellHCentered);
        $tableS->addCell(3000, $cellVCentered)->addText($datareq['txt_ii_severity_level'], ['bold' => true, 'size' => 10, 'color' => 'FF0000'], $cellHCentered);
        $tableS->addCell(null, $cellRowContinue);
        $tableS->addRow();
        $cell = $tableS->addCell(5000, $cellVCentered);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Kemungkinan Terulang', ['size' => 10], $cellHCentered);
        $textrun->addTextBreak();
        $textrun->addText('Recurrence Proability', ['italic' => true, 'size' => 10, 'color' => 'A6A6A6']);
        $tableS->addCell(500, $cellVCentered)->addText(':', null, $cellHCentered);
        $tableS->addCell(3000, $cellVCentered)->addText($datareq['txt_ii_reccurent_proability'], ['bold' => true, 'size' => 10, 'color' => 'FF0000'], $cellHCentered);
        $tableS->addCell(null, $cellRowContinue);
        // Judul
        $section->addTextBreak();
        $tableS = $section->addTable(['borderSize' => 3, 'borderColor' => '000']);
        $tableS->addRow();
        $cell = $tableS->addCell(18000);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Pengamatan / Tindakan Segera Diambil:', ['bold' => true, 'size' => 11]);
        $textrun->addTextBreak();
        $textrun->addText('Observation/Immediate Action Taken', ['italic' => true, 'size' => 11, 'color' => 'A6A6A6']);
        $textrun->addTextBreak();
        $textrun->addTextBreak();
        $textrun->addText('Mr. ' . $datareq['txt_vi_victim_name'] . ' headed to the pratama clinic PT. Asia Pacific Fibers, the wound was cleaned and taken to the hospital', ['size' => 11]);



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
        $section->addTextBreak();
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

        $section->addTextBreak();
        $tableS->addRow();
        $cell = $tableS->addCell(18000, ['gridSpan' => 6]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);

        // table Documentation
        $section->addTextBreak();
        $cellColSpan2 = array('gridSpan' => 5);
        $tableS = $section->addTable($styleTable);
        $tableS->addRow();
        $cell = $tableS->addCell(18000, $cellColSpan2);
        $textrun = $cell->addTextRun(['bgColor' => '#DBE5F1', 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 20]);

        $section->addTextBreak();
        $tableS->addRow();
        $tableS->addCell(200, $cellVCentered);
        $cell = $tableS->addCell(17600, ['borderSize' => 3, 'gridSpan' => 3]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::START]);
        $textrun->addText('Dokumentasi', ['name' => 'calibri', 'bold' => true, 'size' => 10], ['lineSpacing' => 50]);
        $textrun->addTextBreak();
        $textrun->addText('Documentation', ['name' => 'calibri', 'italic' => true, 'size' => 10, 'color' => '000']);
        $tableS->addCell(200, $cellVCentered);


        // line break tr
        $section->addTextBreak();
        $tableS->addRow();
        $cell = $tableS->addCell(18000, ['gridSpan' => 5]);
        $textrun = $cell->addTextRun(['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);
        $textrun->addText('', ['bold' => true, 'size' => 11, 'color' => '000'], ['lineSpacing' => 50]);
        // end




        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $filename = 'E-RCA-' . $datareq['int_id_investigation'] . '_' . $datareq['txt_vi_victim_name'];

        header('Content-Type: application/msword');
        header('Content-Disposition: attachment;filename="' . $filename . '.docx"');
        header('Cache-Control: max-age=0');

        // $templateProcessor->saveAs('php://output');
        $objWriter->save('php://output');
    }

    public function getDataById()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $where = [
                'int_id_investigation' => $data_post['id']
            ];
            $datareq = $this->investigation->get_data($where)->row_array();
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
            $datareq = $this->investigation->get_data($where)->result_array();
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
