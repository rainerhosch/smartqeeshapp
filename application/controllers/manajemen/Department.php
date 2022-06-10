<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Department.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Reki Maulid
 *  Date Created          : 26/03/2022
 *  Quots of the code     : sukses itu ketika running code pertama dan tidak ada error :D (tong tinggi teuing ngakhayal na lord wkwkwk)
 */
class Department extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          login_check();
          $this->load->model("Manajemen/M_department", "department");
     }

     public function index()
     {
          $data['title']           = 'Smart Qeesh App';
          $data['page']            = 'Manajemen';
          $data['subpage']         = 'Manajemen Department';
          $data['content']         = 'pages/manajemen/v_department';

          $data["departments"]     = $this->department->getsDepartmentSection();
          $this->load->view('template', $data);
     }

     public function initiateData()
     {
          try {
               $data = [
                    "intIdDepartement"       => 0,
                    "txtNamaDepartement"     => "",
                    "txtSingkatan"           => "",
                    "bitActive"              => true,
                    "intInsertedBy"          => 0,
                    "dtmInsertedDate"        => "",
                    "intUpdatedBy"           => 0,
                    "dtmUpdatedDate"         => "",
                    "intIdSection"           => 0,
               ];

               echo json_encode($data);
          } catch (\Exception $e) {
               die($e->getMessage());
          }
     }

     public function saveData()
     {
          $data = $this->input->post("data");
          $parseData = json_decode($data, true);

          $validasi = $this->validasiSaveData($parseData);

          if ($validasi["status"]) {
               $parseData["txtNamaDepartement"]   = strtoupper($parseData["txtNamaDepartement"]);
               $parseData["txtSingkatan"]         = strtoupper($parseData["txtSingkatan"]);
               $departmentID = $parseData["intIdDepartement"];
               if ($departmentID == 0) {
                    //CREATE
                    $parseData["intInsertedBy"]   = $this->session->userdata('user_id');
                    $parseData["dtmInsertedDate"] = date("Y-m-d");
                    $parseData["intUpdatedBy"]    = $this->session->userdata('user_id');
                    $parseData["dtmUpdatedDate"]  = date("Y-m-d");

                    $id = $this->department->insertData($parseData);
                    $parseData["intIdDepartement"] = $id;

                    $validasi["pesan"] = "Berhasil simpan";
               } else {
                    //UPDATE
                    $dataDB = $this->department->getDepartment($parseData["intIdDepartement"]);

                    $parseData["intInsertedBy"]   = $dataDB["intInsertedBy"];
                    $parseData["dtmInsertedDate"] = $dataDB["dtmInsertedDate"];
                    $parseData["intUpdatedBy"]    = $this->session->userdata('user_id');
                    $parseData["dtmUpdatedDate"]  = date("Y-m-d");

                    $validasi["pesan"] = "Berhasil simpan perubahan";

                    $this->department->updateData($parseData, $parseData["intIdDepartement"]);
               }
          }

          $response = [
               'code'    => $validasi["code"],
               'status'  => $validasi["status"],
               'msg'     => $validasi["pesan"],
               'data'    => $parseData
          ];

          echo json_encode($response);
     }

     public function getData()
     {
          try {
               $id = $this->input->post("id");

               $data = $this->department->getDepartment($id);

               echo json_encode($data);
          } catch (\Exception $e) {
               die($e->getMessage());
          }
     }


     // code by rz oktan 19/05/2022
     public function getData_v2()
     {
          if ($this->input->is_ajax_request()) {
               $data = $this->department->getData_v2()->result_array();
               $response = [
                    'code'    => 200,
                    'status'  => true,
                    'msg'     => 'Berhasil',
                    'data'    => $data
               ];
          } else {
               $response = [
                    'code'    => 500,
                    'status'  => false,
                    'msg'     => 'Internal Server Error',
                    'data'    => null
               ];
          }
          echo json_encode($response);
     }

     private function validasiSaveData($data)
     {
          if ($data["intIdDepartement"] == null) {
               $pesan = "ID Department tidak boleh kosong";
          } elseif ($data["intIdSection"] == null || $data["intIdSection"] == 0) {
               $pesan = "Section tidak boleh kosong";
          } elseif ($data["txtNamaDepartement"] == null) {
               $pesan = "Nama Department tidak boleh kosong";
          } elseif ($data["txtSingkatan"] == null) {
               $pesan = "Kode Department tidak boleh kosong";
          } else {
               $pesan = "";
          }

          if ($data["intIdDepartement"] == 0) {
               //CREATE
               $validasiIdSectionNamaDepartment = $this->department->validateSectionNamaDepartment($data["intIdSection"], $data["txtNamaDepartement"]);

               if ($validasiIdSectionNamaDepartment != null) {
                    $pesan = "Nama Department sudah tersedia di section tersebut, silahkan gunakan nama lain";
               } else {
                    $validasiIdSectionKodeDepartment = $this->department->validateSectionKodeDepartment($data["intIdSection"], $data["txtSingkatan"]);

                    if ($validasiIdSectionKodeDepartment != null) {
                         $pesan = "Kode Department sudah tersedia di section tersebut, silahkan gunakan nama lain";
                    }
               }
          } else {
               //UPDATE
               $dataDB = $this->department->getDepartment($data["intIdDepartement"]);
               if ($dataDB["intIdSection"] == $data["intIdSection"]) {
                    //JIKA PLANT TIDAK BERUBAH
                    if ($dataDB["txtNamaDepartement"] != $data["txtNamaDepartement"]) {
                         $validasiIdSectionNamaDepartment = $this->department->validateSectionNamaDepartment($data["intIdSection"], $data["txtNamaDepartement"]);

                         if ($validasiIdSectionNamaDepartment != null) {
                              $pesan = "Nama Department sudah tersedia di section tersebut, silahkan gunakan nama lain";
                         } else {
                              $validasiIdSectionKodeDepartment = $this->department->validateSectionKodeDepartment($data["intIdSection"], $data["txtSingkatan"]);

                              if ($validasiIdSectionKodeDepartment != null) {
                                   $pesan = "Kode Department sudah tersedia di section tersebut, silahkan gunakan nama lain";
                              }
                         }
                    } else {
                         $validasiIdSectionKodeDepartment = $this->department->validateSectionKodeDepartment($data["intIdSection"], $data["txtSingkatan"]);

                         if ($validasiIdSectionKodeDepartment != null) {
                              $pesan = "Kode Department sudah tersedia di section tersebut, silahkan gunakan nama lain";
                         }
                    }
               } else {
                    $validasiIdSectionNamaDepartment = $this->department->validateSectionNamaDepartment($data["intIdSection"], $data["txtNamaDepartement"]);

                    if ($validasiIdSectionNamaDepartment != null) {
                         $pesan = "Nama Department sudah tersedia di section tersebut, silahkan gunakan nama lain";
                    } else {
                         $validasiIdSectionKodeDepartment = $this->department->validateSectionKodeDepartment($data["intIdSection"], $data["txtSingkatan"]);

                         if ($validasiIdSectionKodeDepartment != null) {
                              $pesan = "Kode Department sudah tersedia di section tersebut, silahkan gunakan nama lain";
                         }
                    }
               }
          }

          if ($pesan == "") {
               $status = true;
               $code = 200;
          } else {
               $status = false;
               $code = 400;
          }

          $returnData = [
               "status"  => $status,
               "pesan"   => $pesan,
               "code"    => $code
          ];

          return $returnData;
     }

     public function getDataByIdPlant()
     {
          $id                = $this->input->get('id');
          $data_dept      = $this->department->getDepartemenByIdPlant($id);
          $opt           = '<option value ="">Silahkan Pilih Departemen</option>';
          if (!empty($data_dept)) {
               foreach ($data_dept as $item) {
                    $opt .= '<option value="' . $item["intIdDepartement"] . '"> ' . $item["txtNamaDepartement"] . '</option>';
               }
          }
          $response = [
               'code'    => 200,
               'status'  => "OK",
               'msg'     => "OK",
               'data'    => $opt
          ];

          echo json_encode($response);
     }
}
