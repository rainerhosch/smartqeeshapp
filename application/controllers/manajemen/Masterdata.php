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
}
