<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if(file_exists('vendor/autoload.php')){
  require 'vendor/autoload.php';
}

if(file_exists('../vendor/autoload.php')){
  require '../vendor/autoload.php';
}

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel
{
  public function __construct()
  {
    $this->ci = &get_instance();
  }

  public function process($data = [])
  {

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $fontBold = [
      'font' => [
        'bold' => true,
      ],
    ];

    $aligmentCenter = [
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
      ],
    ];

    $borderThin = [
      'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
      ],
    ];

    $aligmentLeft = [
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
      ],
    ];

    $styleArrayHeader = [];
    $styleArrayValue = [];
    $styleArrayTitle = [];

    try {
      if (count($data['query']) == 0) {
        throw new Exception("Error Processing Request", 1);
      }

      $titleRow = 1;
      $headerRow = 3;
      $header = array_keys($data['query'][0]);
      if (count($header) > 0) {
        $styleArrayHeader = array_merge($fontBold,$aligmentCenter);
        $styleArrayHeader = array_merge($styleArrayHeader,$borderThin);

        for ($i = 65; $i < (count($header) + 65); $i++) {
          $sheet->setCellValue(chr($i) . $headerRow, ucwords((strpos("_", $header[($i - 65)]) >= 0 ? str_replace("_", " ", $header[($i - 65)]) : $header[($i - 65)])));
          $headerRange = chr($i).$headerRow; 
          $titleRange = chr($i).$titleRow;
          $sheet->getColumnDimension(chr($i))->setAutoSize(true);
        }
        
        $sheet->getStyle("A".$headerRow.":".$headerRange)->applyFromArray($styleArrayHeader);
        $sheet->getRowDimension($headerRow)->setRowHeight(20);

        $sheet->mergeCells("A".$titleRow.":".$titleRange);
        $sheet->getRowDimension($titleRow)->setRowHeight(20);

        $sheet->setCellValue("A".$titleRow,strtoupper($data['title']));
        $styleArrayTitle = array_merge($fontBold,$aligmentCenter);
        $sheet->getStyle("A".$titleRow.":".$titleRange)->applyFromArray($styleArrayTitle);

      }

      $detailRow = 4;
      $styleArrayValue = array_merge($aligmentLeft,$borderThin);

      foreach ($data['query'] as $ky => $val) {
        $detailData = array_values($val);
        for ($i = 65; $i < (count($detailData) + 65); $i++) {
          $sheet->setCellValue(chr($i) . $detailRow, $detailData[($i - 65)]);
          $detailRange = chr($i).$detailRow;
        }
        $sheet->getStyle("A".$detailRow.":".$detailRange)->applyFromArray($styleArrayValue);
        $sheet->getRowDimension($detailRow)->setRowHeight(20);
        $detailRow++;
      }

      $filename = $data['filename'] . date('YmdHis');
    } catch (Exception $e) {
      $filename = $data['filename'] . date('YmdHis') . "_0";
    }

    $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }

  public function preview($file)
  {
    $inputFileType = 'Xlsx';
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load($file);
    $maxCell = $spreadsheet->getActiveSheet()->getHighestRowAndColumn();
    $sheet = $spreadsheet->getActiveSheet()->rangeToArray('A1:' . $maxCell['column'] . $maxCell['row'],NULL,true,true,true);
    $column = '';
    foreach($sheet as $ky => $val){
      if($column == ''){
        $column = array_keys($val);
      }
      $ketemu = 0;
      for($i = 0; $i < count($column);$i++){
        if($this->checkNullValue($val[$column[$i]])){
          $ketemu++;
        }
      }
      if($ketemu == count($column)){
        unset($sheet[$ky]);
      }
    }
    return $sheet;
  }

  private function checkNullValue($value)
  {
    if(is_null($value) || trim($value) == ""){
      return true;
    }

    return false;
  }
}
