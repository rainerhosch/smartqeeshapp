<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : CA_Fire.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rifqi Fadhillah
 *  Date Created          : 21/06/2022
 *  Quots of the code     : '---'
 */
class Ca_fire extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_user', 'user');
    }

    public function index()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['menu_header'] = 'NON-CONFORMITY & CORRECTIVE ACTION';
        $data['page'] = 'NCR & CA';
        $data['subpage'] = 'Corrective Action';
        $data['content'] = 'pages/ncr_ca/ca_fire';
        $this->load->view('template', $data);
    }
}
