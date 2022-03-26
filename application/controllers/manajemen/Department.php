<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Department.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Reki Maulid
 *  Date Created          : 26/03/2022
 *  Quots of the code     : 'sukses itu ketika running code pertama dan tidak ada error :D'
 */
class Department extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          login_check();
     }

     public function index()
     {
          $data['title']      = 'Smart Qeesh App';
          $data['page']       = 'Manajemen';
          $data['subpage']    = 'Manajemen Department';
          $data['content']    = 'pages/manajemen/v_department';
          $this->load->view('template', $data);
     }

     public function initiateData()
     {
          try {
               $data = [
                    "intIdDepartment"   => 0,
                    "intIdPlant"        => 0,
                    "txtNamaDepartment" => "",
                    "bitActive"         => true,
                    "intInsertedBy"     => 0,
                    "dtmInsertedDate"   => "",
                    "intUpdatedBy"      => 0,
                    "dtmUpdatedDate"    => ""
               ];

               echo json_encode($data);
          } catch (\Exception $e) {
               die($e->getMessage());
          }
     }
}
