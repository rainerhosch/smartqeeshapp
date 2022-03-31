<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : RiskConsequence.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Reki Maulid
 *  Date Created          : 30/03/2022
 *  Quots of the code     : sukses itu ketika running code pertama dan tidak ada error :D
 */

class RiskConsequence extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          login_check();
          $this->load->model("manajemen/M_RiskConsequence", "riskconsequence");
     }

     public function index()
     {
          $data['title']           = 'Smart Qeesh App';
          $data['page']            = 'Manajemen';
          $data['subpage']         = 'Manajemen Risk Consequence';
          $data['content']         = 'pages/manajemen/v_riskconsequence';

          $data["risksequences"]     = $this->riskconsequence->getsRiskConsequence();
          $this->load->view('template', $data);
     }

     public function initiateData()
     {
          try {
               $data = [
                    "intIdRiskConsequence"        => 0,
                    "intTingkatKlasifikasi"       => 0,
                    "txtNamaTingkatKlasifikasi"   => "",
                    "txtTingkatKeparahan"         => "",
                    "txtSebaranResiko"            => "",
                    "txtBiayaPemulihan"           => "",
                    "txtLamaPemulihan"            => "",
                    "txtCitraPerusahaan"          => "",
                    "bitActive"                   => true,
                    "intInsertedBy"               => "",
                    "dtmInsertedDate"             => "",
                    "intUpdatedBy"                => "",
                    "dtmUpdatedDate"              => ""
               ];

               echo json_encode($data);
          } catch (\Exception $e) {
               die($e->getMessage());
          }
     }

     public function getData()
     {
          try {
               $id = $this->input->post("id");

               $data = $this->riskconsequence->getRiskConsequence($id);

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
               $id = $parseData["intIdRiskConsequence"];
               $parseData["txtNamaTingkatKlasifikasi"] = strtoupper($parseData["txtNamaTingkatKlasifikasi"]);
               if ($id == 0) {
                    //CREATE
                    $parseData["intInsertedBy"]   = $this->session->userdata('user_id');
                    $parseData["dtmInsertedDate"] = date("Y-m-d");
                    $parseData["intUpdatedBy"]    = $this->session->userdata('user_id');
                    $parseData["dtmUpdatedDate"]  = date("Y-m-d");

                    $id = $this->riskconsequence->insertData($parseData);
                    $parseData["intIdRiskConsequence"] = $id;

                    $validasi["pesan"] = "Berhasil simpan";
               } else {
                    //UPDATE
                    $dataDB = $this->riskconsequence->getRiskConsequence($parseData["intIdRiskConsequence"]);

                    $parseData["intInsertedBy"]   = $dataDB["intInsertedBy"];
                    $parseData["dtmInsertedDate"] = $dataDB["dtmInsertedDate"];
                    $parseData["intUpdatedBy"]    = $this->session->userdata('user_id');
                    $parseData["dtmUpdatedDate"]  = date("Y-m-d");

                    $validasi["pesan"] = "Berhasil simpan perubahan";

                    $this->riskconsequence->updateData($parseData, $parseData["intIdRiskConsequence"]);
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

     private function validasiSaveData($data)
     {
          if ($data["intIdRiskConsequence"] == null) {
               $pesan = "ID Risk Sequence tidak boleh kosong";
          } elseif ($data["intTingkatKlasifikasi"] == null || $data["intTingkatKlasifikasi"] == 0) {
               $pesan = "Tingkat Klasifikasi tidak boleh kosong";
          } elseif ($data["intTingkatKlasifikasi"] < 0) {
               $pesan = "Tingkat Klasifikasi hanya menerima inputan lebih dari 0";
          } elseif ($data["txtNamaTingkatKlasifikasi"] == null) {
               $pesan = "Nama Tingkat Klasifikasi tidak boleh kosong";
          } elseif ($data["txtTingkatKeparahan"] == null) {
               $pesan = "Tingkat Keparahan tidak boleh kosong";
          } elseif ($data["txtSebaranResiko"] == null) {
               $pesan = "Sebaran Resiko tidak boleh kosong";
          } elseif ($data["txtBiayaPemulihan"] == null) {
               $pesan = "Biaya Pemulihan tidak boleh kosong";
          } elseif ($data["txtLamaPemulihan"] == null) {
               $pesan = "Lama Pemulihan tidak boleh kosong";
          } elseif ($data["txtCitraPerusahaan"] == null) {
               $pesan = "Citra Perusahaan tidak boleh kosong";
          } else {
               $pesan = "";
          }

          if ($data["intIdRiskConsequence"] == 0) {
               //CREATE
               $validasi = $this->riskconsequence->validateTingkatKlasifikasi($data["intTingkatKlasifikasi"]);

               if ($validasi != null) {
                    $pesan = "Tingkat Klasifikasi sudah tersedia, silahkan gunakan nomor lain";
               }
          } else {
               //UPDATE
               $dataDB = $this->riskconsequence->getRiskConsequence($data["intIdRiskConsequence"]);
               if ($dataDB["intTingkatKlasifikasi"] != $data["intTingkatKlasifikasi"]) {
                    //JIKA TINGKAT KLASIFIKASI TIDAK BERUBAH
                    $validasi = $this->riskconsequence->validateTingkatKlasifikasi($data["intTingkatKlasifikasi"]);

                    if ($validasi != null) {
                         $pesan = "Tingkat Klasifikasi sudah tersedia, silahkan gunakan nomor lain";
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
}
