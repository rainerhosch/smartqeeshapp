<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Submenu.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 07/02/2020
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Submenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_user', 'user');
        $this->load->model('M_menu', 'menu');
    }



    public function index()
    {
        // code here...
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Manajemen';
        $data['subpage'] = 'Submenu';
        $data['content'] = 'pages/manajemen/v_submenu';
        $this->load->view('template', $data);
    }

    public function get_submenu()
    {
        // code here...
        if ($this->input->is_ajax_request()) {
            $input = $this->input->post('id_submenu');
            $datamenu = [];
            $code = '';
            $status = '';

            if ($input != null) {
                // $condition = ['id_menu' => $input];
                $datamenu = $this->menu->get_all_submenu_editable(['id_submenu' => $input])->row_array();
                if (!$datamenu) {
                    $code = 404;
                    $status = false;
                } else {
                    $code = 200;
                    $status = true;
                }
            } else {
                // $condition = null;
                $datamenu = $this->menu->get_all_submenu_editable()->result_array();
                if (!$datamenu) {
                    $code = 404;
                    $status = false;
                } else {
                    $code = 200;
                    $status = true;
                }
            }
            $data = [
                'code' => $code,
                'status' => $status,
                'msg' => 'Data Menu.',
                'data' => $datamenu
            ];


            // $datamenu = $this->menu->get_all_submenu_editable()->result_array();
            // $data = [
            //     'code' => 200,
            //     'status' => true,
            //     'msg' => 'Data Submenu.',
            //     'data' => $datamenu
            // ];
        } else {
            $data = [
                'code' => 500,
                'status' => false,
                'msg' => 'Invalid request.',
                'data' => null
            ];
        }
        echo json_encode($data);
    }
}
