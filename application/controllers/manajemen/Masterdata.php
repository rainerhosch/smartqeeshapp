<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Masterdata.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 20/05/2022
 *  Quots of the code     : 'Hanya seorang yang hobi berbicara dengan komputer.'
 */
class Masterdata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_masterdata', 'masterdata');
        $this->load->model('Manajemen/M_bodypart', 'bodypart');
    }

    public function getData()
    {
        $table = 'user u';
        $field = 'u.user_id, u.username, ud.nama, ud.email, ud.divisi, ud.jabatan, ud.tlp, ud.img, ur.role_type, ur.description';
        // $field = '*';
        $tableJoin = [
            0 => [
                'table' => 'user_role ur',
                'fk_join' => 'u.role_id = ur.role_id',

            ],
            1 => [
                'table' => 'user_detail ud',
                'fk_join' => 'u.user_detail_id = ud.user_detail_id',
            ],
        ];
        $where = null;
        $res = $this->masterdata->getData($field, $table, $tableJoin)->result_array();
        var_dump($res);
        die;
    }


    public function get_body_part()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $where = null;
            $search = null;
            if (isset($data_post['search'])) {
                $search = $data_post['search'];
            }
            $res = $this->bodypart->get_data($where, $search)->result_array();
            $response = [
                'code' => 200,
                'status' => 'ok',
                'data' => $res,
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

    public function get_incident_level()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $where = null;
            $search = null;
            if (isset($data_post['search'])) {
                $search = $data_post['search'];
            }
            $res = $this->masterdata->getData('*', 'mincident_level')->result_array();
            $response = [
                'code' => 200,
                'status' => 'ok',
                'data' => $res,
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

    public function get_severity_level()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $where = null;
            $search = null;
            if (isset($data_post['search'])) {
                $search = $data_post['search'];
            }
            $res = $this->masterdata->getData('*', 'mseverity_level')->result_array();
            $response = [
                'code' => 200,
                'status' => 'ok',
                'data' => $res,
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
    public function get_mreccurent_proability()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $where = null;
            $search = null;
            if (isset($data_post['search'])) {
                $search = $data_post['search'];
            }
            $res = $this->masterdata->getData('*', 'mreccurent_proability')->result_array();
            $response = [
                'code' => 200,
                'status' => 'ok',
                'data' => $res,
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

    public function get_fire_facility()
    {
        if ($this->input->is_ajax_request()) {
            $data_post = $this->input->post();
            $where = null;
            $search = null;
            if (isset($data_post['search'])) {
                $search = $data_post['search'];
            }
            $res = $this->masterdata->getData('*', 'mFireFacility', null, null, null, null)->result_array();
            $response = [
                'code' => 200,
                'status' => 'ok',
                'data' => $res,
                'message' => 'Success Request.',
            ];
            echo json_encode($response);
        } else {
            show_404();
        }
    }
}
