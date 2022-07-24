<?php

defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Dokumen.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Dimas Fauzan
 *  Date Created          : 23/03/2022
 *  Quots of the code     : Kadang susah kalo udah nyaman sama framework sebelah :D
 */

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Dokumen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		login_check();
		$this->load->model('/RiskRegister/M_dok_register', 'dokumen');
		$this->load->model('/RiskRegister/M_report_risk_register', 'report');
		$this->load->model('M_user', 'user');
	}

	public function index()
	{
		$data['title'] 		= 'Smart Qeesh App';
		$data['page'] 		= 'Risk Register';
		$data['subpage'] 	= 'Blank Page';
		$data['content'] 	= 'pages/risk_management/risk_register/dokumen';
		$data["user"]		= $this->user->getDataUserDept($this->session->userdata('user_id'));
		$this->load->view('template', $data);
	}

	public function getDataTable()
	{
		$id_departemen = $this->session->userdata('id_departemen');
		echo json_encode($this->dokumen->get_datatables($id_departemen));
	}

	public function simpan()
	{
		$dateNow = date("Y-m-d");
		$data = [
			"txtDocNumber" 		=> $this->input->post('txtDocNumber'),
			"intInsertedBy" 	=> $this->session->userdata('user_id'),
			"intIdDepartement" 	=> $this->session->userdata('id_departemen'),
			"txtStatus"			=> "ON PROGRESS",
			"dtmInsertedBy" 	=> $dateNow
		];
		$this->dokumen->simpan($data);
		$response = [
			'code' => 200,
			'status' => true,
			'msg' => 'Berhasil disimpan.',
			'data' => "-"
		];
		echo json_encode($response);
	}

	public function exportnew()
	{
		$id_dok = $this->input->get('id');
		if ($id_dok == "") {
			redirect(base_url('risk_register/dokumen'));
		}

		//Style excel
		$styleArray = [
			'font' => [
				// 'bold' => true,
			],
			'alignment' => [
				// 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
			'borders' => [
				'outline' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('rgb' => '0000'),
				),
			],
		];
		$styleHeaderArray = [
			'font' => [
				'bold' => true,
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				'wrapText' => true
			],
			'borders' => [
				'outline' => array(
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					'color' => array('rgb' => '0000'),
				),
			],
		];

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		
		//Set Width		
		$sheet->getColumnDimensionByColumn(1)->setWidth(2.8);
		$sheet->getColumnDimensionByColumn(2)->setWidth(24.7);
		$sheet->getColumnDimensionByColumn(3)->setWidth(23.7);
		$sheet->getColumnDimensionByColumn(4)->setWidth(23);
		$sheet->getColumnDimensionByColumn(5)->setWidth(24);
		$sheet->getColumnDimensionByColumn(6)->setWidth(24);
		$sheet->getColumnDimensionByColumn(7)->setWidth(24);
		$sheet->getColumnDimensionByColumn(8)->setWidth(17);
		$sheet->getColumnDimensionByColumn(9)->setWidth(14);
		$sheet->getColumnDimensionByColumn(10)->setWidth(21);
		$sheet->getColumnDimensionByColumn(11)->setWidth(24);
		$sheet->getColumnDimensionByColumn(12)->setWidth(26);
		$sheet->getColumnDimensionByColumn(13)->setWidth(26);
		$sheet->getColumnDimensionByColumn(14)->setWidth(26);
		$sheet->getColumnDimensionByColumn(15)->setWidth(24);
		$sheet->getColumnDimensionByColumn(16)->setWidth(21);
		$sheet->getColumnDimensionByColumn(17)->setWidth(21);
		$sheet->getColumnDimensionByColumn(18)->setWidth(24);
		$sheet->getColumnDimensionByColumn(19)->setWidth(23);

		$row = 1;
		$sheet->setCellValue("A$row", 'Risk Register');
		$row += 3;
		$sheet->mergeCells('A1:X1');


		$data_dok = $this->report->getDataDokumen(["trDokRiskRegister.intIdDokRiskRegister" => $id_dok])->row();
		if ($data_dok != null) {

			$row_date = $row;
			$sheet->setCellValue("A$row_date", 'Tanggal');			
			$sheet->setCellValue("C$row_date", ": " . date("d F Y", strtotime($data_dok->dtmInsertedBy)));			
			$sheet->mergeCells("A$row_date:B$row_date");
			$row++;

			$row_dept = $row;
			$sheet->setCellValue("A$row_dept", 'Departemen');			
			$sheet->setCellValue("C$row_dept", ": " . $data_dok->txtNamaDepartement);			
			$sheet->mergeCells("A$row_dept:B$row_dept");
			$row++;

			$row_func = $row;
			$sheet->setCellValue("A$row_func", 'Function');			
			$sheet->setCellValue("C$row_func", ": " . $data_dok->txtNamaSection);
			$sheet->mergeCells("A$row_func:B$row_func");

			$row += 2;
			$row_head_table = $row;
			$sheet->setCellValue("A$row_head_table", '');			
			$sheet->setCellValue("B$row_head_table", "ACTIVITY / PRODUCT / SERVICES \n (BASED ON PROCESS)");
			$sheet->setCellValue("C$row_head_table", "RISK CONTEXT\n(INTERNAL / EXTERNAL)\n(Konteks Risiko di Organisasi)");
			$sheet->setCellValue("D$row_head_table", "RISK CONTEXT\n(INTERNAL / EXTERNAL)\n(Konteks Risiko di Organisasi)");
			$sheet->setCellValue("E$row_head_table", "RISK SOURCE IDENTIFICATION\n(Identifikasi Sumber Risiko)");
			$sheet->setCellValue("F$row_head_table", "RISK ANALYSIS\n(Analisa Risiko)");
			$sheet->setCellValue("G$row_head_table", "CONDITION (N/AN/E)");
			$sheet->setCellValue("H$row_head_table", "RISK EVALUATION\n(Evaluasi Risiko)");
			$sheet->setCellValue("J$row_head_table", "RISK LEVEL\n(0/H-M-L)\n(Tingkat Risiko)");
			// $sheet->setCellValue("K$row_head_table", "LEGAL COMPLIANCES\n(Kepatuhan Persyaratan)");
			$sheet->setCellValue("K$row_head_table", "SIGNIFICANT STATUS (ACCEPTED / NOT ACCEPTED)\n(Status Kepentingan) (Diterima/Tidak Diterima)");
			$sheet->setCellValue("L$row_head_table", "RISK OWNER\n(Pemilik Risiko)");
			$sheet->setCellValue("M$row_head_table", "RISK TREATMENT\n(Penanganan Risiko)");
			$sheet->setCellValue("O$row_head_table", "RISK PRIORITY CONSIDERATION\n(Pertimbangan Prioritas Risko)");
			// $sheet->setCellValue("T$row_head_table", "IMPROVEMENT OPPORTUNITY / STRATEGIC INITIATIVE");
			$sheet->setCellValue("P$row_head_table", "RE-EVALUATION OF RISK");
			$sheet->setCellValue("R$row_head_table", "RISK LEVEL\n(Tingkat Resiko)");

			$sheet->mergeCells("H$row_head_table:I$row_head_table");
			$sheet->mergeCells("M$row_head_table:N$row_head_table");
			$sheet->mergeCells("P$row_head_table:Q$row_head_table");
			// $sheet->mergeCells("V$row_head_table:W$row_head_table");

			$sheet->getStyle("A$row_head_table:R$row_head_table")->applyFromArray($styleHeaderArray);

			$row++;
			$row_head_table = $row;			
			$sheet->setCellValue("H$row_head_table", "CONSEQUENCES\n(Konsekuensi)");
			$sheet->setCellValue("I$row_head_table", "LIKELIHOOD\n(Keseringan)");			
			$sheet->setCellValue("M$row_head_table", "CURRENT\n(Sekarang)");
			$sheet->setCellValue("N$row_head_table", "FUTURE\n(Mendatang)");			
			$sheet->setCellValue("P$row_head_table", "CONSEQUENCES\n(Konsekuensi)");
			$sheet->setCellValue("Q$row_head_table", "LIKELIHOOD\n(Keseringan)");
			$sheet->getStyle("A$row_head_table:R$row_head_table")->applyFromArray($styleHeaderArray);

			$row_head_table_bef = $row_head_table - 1;
			$sheet->mergeCells("A$row_head_table_bef:A$row_head_table");
			$sheet->mergeCells("B$row_head_table_bef:B$row_head_table");
			$sheet->mergeCells("C$row_head_table_bef:C$row_head_table");
			$sheet->mergeCells("D$row_head_table_bef:D$row_head_table");
			$sheet->mergeCells("E$row_head_table_bef:E$row_head_table");
			$sheet->mergeCells("F$row_head_table_bef:F$row_head_table");
			$sheet->mergeCells("G$row_head_table_bef:G$row_head_table");
			$sheet->mergeCells("J$row_head_table_bef:J$row_head_table");
			$sheet->mergeCells("K$row_head_table_bef:K$row_head_table");
			$sheet->mergeCells("L$row_head_table_bef:L$row_head_table");
			$sheet->mergeCells("O$row_head_table_bef:O$row_head_table");
			$sheet->mergeCells("R$row_head_table_bef:R$row_head_table");
			// $sheet->mergeCells("M$row_head_table_bef:M$row_head_table");
			// $sheet->mergeCells("U$row_head_table_bef:U$row_head_table");
			// $sheet->mergeCells("V$row_head_table_bef:V$row_head_table");

			$row++;

			$data_activity = $this->report->getActivity(["trActivityRiskRegister.intIdDokRiskRegister" => $id_dok])->result();
			$no = 1;
			$row_pertama_tahapan = 0;
			$count_row_tahapan = 0;
			$row_pertama_context = 0;
			$count_row_context = 0;
			$count_row_identification = 0;
			$count_all_activity = 0;
			$count_row_eval = 0;
			$count_row_iden = 0;
			$sum_evaluation = 0;
			// var_dump($data_activity);
			if (!empty($data_activity)) {
				// var_dump($data_activity);
				foreach ($data_activity as $item) {	
					// var_dump($row);
					$sum_evaluation = 0;	
					$sheet->setCellValue("A$row", $no++);
					$sheet->setCellValue("B$row", $item->txtNamaActivity);					
					$row++;					
					
					$data_tahapan = $this->report->getTahapan(["trTahapanProsesRisk.intIdActivityRisk" => $item->intIdActivityRisk])->result();
					// var_dump($this->db->last_query());				
					$row_tahapan = $row;					
					if (!empty($data_tahapan)) {
						$count_all_activity = 0;
						$row_pertama_tahapan = $row + 1;
						$count_row_tahapan = 0;
						// $row_tahapan = $row;

						foreach ($data_tahapan as $item_tahapan) {
							// var_dump($item_tahapan, $item);
							$sheet->setCellValue("B$row_tahapan", $item_tahapan->txtNamaTahapan);
							
							$data_context = $this->report->getContext(["intIdTahapanProsesRisk" => $item_tahapan->intIdTahapanProsesRisk])->result();
							if (!empty($data_context)) {

								$row_pertama_context = $row_pertama_tahapan;
								$count_row_context = 0;
								$row_context = $row_tahapan;

								foreach ($data_context as $item_context) {
									$nama_context_temp = str_replace("<div>", "", $item_context->txtNamaContext);
									$nama_context_temp = str_replace("</div>", "\n", $nama_context_temp);
									$nama_context_temp = str_replace("<p>", "", $nama_context_temp);
									$nama_context_temp = str_replace("</p>", "\n", $nama_context_temp);
									$nama_context_temp = str_replace("&nbsp;", "", $nama_context_temp);
									;
									$sheet->setCellValue("C$row_context", $nama_context_temp);

									$data_identification = $this->report->getIdentification(
										["intIdTrRiskContext" => $item_context->intIdTrRiskContext]
									)->result();
									$row_pertama_identification = $row_context;
									$count_row_identification = 0;
									$row_identification = $row_context;
									if (!empty($data_identification)) {
										foreach ($data_identification as $item_iden) {
											$sheet->setCellValue("D$row_identification", $item_iden->txtSourceRiskIden);
											$sheet->setCellValue("E$row_identification", $item_iden->txtRiskAnalysis);
											$sheet->setCellValue("F$row_identification", $item_iden->txtRiskCategory);
											$sheet->setCellValue("G$row_identification", $item_iden->txtRiskCondition);
											$sheet->setCellValue("H$row_identification", $item_iden->intConsequence);
											$sheet->setCellValue("I$row_identification", $item_iden->intLikelihood);
											$sheet->setCellValue("J$row_identification", $item_iden->txtRiskLevel);
											if($item_iden->bitStatusKepentingan == 1) {
												$sheet->setCellValue("K$row_identification", "Accepted");
											} else {
												$sheet->setCellValue("K$row_identification", "Not Accepted");
											}
											$risk_matrix = $this->report->getRiskMatrix([
												"intIdRiskAssessmentMatrix" => $item_iden->intIdRiskAssessmentMatrix
											])->row();
											$sheet->setCellValue("L$row_identification", $risk_matrix->txtRiskOwner);

											$risk_treat_current = $this->report->getTreatmentCurrent([
												"intIdRiskSourceIdentification" => $item_iden->intIdRiskSourceIdentification
											])->result();
											$risk_treatment_current_text = "";
											$no_treat_curr = 1;
											foreach ($risk_treat_current as $item_risk_treat_curr) {
												$risk_treatment_current_text .= "$no_treat_curr. $item_risk_treat_curr->txtRiskTreatmentCurrent\n";
												$no_treat_curr++;
											}
											$sheet->setCellValue("M$row_identification", $risk_treatment_current_text);

											$risk_treat_future = $this->report->getTreatmentFuture([
												"intIdRiskSourceIdentification" => $item_iden->intIdRiskSourceIdentification
											])->result();
											// var_dump($risk_treat_future);
											if (!empty($risk_treat_future)) {
												$risk_treatment_current_future = "";
												$no_treat_future = 1;
												foreach ($risk_treat_future as $item_risk_treat_future) {
													$risk_treatment_current_future .= "$no_treat_future. $item_risk_treat_future->txtRiskTreatmentFuture\n";
													$no_treat_future++;
												}
												$sheet->setCellValue("N$row_identification", $risk_treatment_current_future);
											}

											$risk_evaluation = $this->report->getRiskEvaluation([
												"trRiskEvaluation.intIdRiskSourceIdentification" => $item_iden->intIdRiskSourceIdentification
											])->result();											
											if (!empty($risk_evaluation)) {
												$row_evaluation = $row_identification;
												$count_row_eval = 0;												
												foreach ($risk_evaluation as $item_evaluation) {
													// var_dump($row_evaluation);
													$sheet->setCellValue("P$row_evaluation", $item_evaluation->intConsequenceEvaluation);
													$sheet->setCellValue("Q$row_evaluation", $item_evaluation->intLikelihoodEvaluation);
													$sheet->setCellValue("R$row_evaluation", $item_evaluation->txtRiskLevelEvaluation);
													$count_row_eval ++;
													$row_evaluation++;
												}
											} else {
												$count_row_eval = 0;
											}

										}
										if ($count_row_eval > 0) {
											$row_identification += $count_row_eval;
											$sum_evaluation += $count_row_eval;
										} else {
											$row_identification += $count_row_identification;
										}
									}
									$row_context++;
									$count_row_context++;
									// $row_pertama_context++;
								}
							} else {
								
							}
							
							$row_tahapan++;
							$count_row_tahapan++;
						}
					}
					else {
						$row_tahapan++;
					}
					$jumlah_row_act = $this->report->countAllActivity([
						"trActivityRiskRegister.intIdActivityRisk" => $item->intIdActivityRisk
					])->result();
					$jumlah_row_act = count($jumlah_row_act);
					// var_dump($row, $jumlah_row_act);
					$row += $jumlah_row_act == 0 ? 1:$jumlah_row_act + $sum_evaluation - 1;
					// var_dump($row);
					//row harus ditambah oleh row pling terbesar
				}
				
			} else {
				$row++;
			}
			// exit;
			$writer = new Xlsx($spreadsheet);
			header('Content-Type: application/vnd.ms-excel; charset=utf-8' );
			header('Content-Disposition: attachment;filename="Report Excel'.time().'.xlsx"');
			// header('Cache-Control: max-age=0');
			// If you're serving to IE 9, then the following may be needed
			// header('Cache-Control: max-age=1');

			// If you're serving to IE over SSL, then the following may be needed
			// header('Expires: Mon, 26 Jul 2090 05:00:00 GMT'); // Date in the past
			// header("Expires: 0");
			// header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
			// header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
			header('Pragma: public'); // HTTP/1.0

			$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
			$writer->save('php://output');
			// redirect(base_url('risk_register/dokumen'));
		} else {
			redirect(base_url('risk_register/dokumen'));
		}
		// var_dump($data_dok);
	}
}
