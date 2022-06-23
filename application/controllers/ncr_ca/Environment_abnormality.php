<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Environment_Abnormality.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 07/05/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Environment_Abnormality extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
    }

    public function index()
    {
        // code here...
        $data['title'] = 'Smart Qeesh App';
        $data['menu_header'] = 'NON-CONFORMITY & CORRECTIVE ACTION';
        $data['page'] = 'NCR & CA';
        $data['subpage'] = 'Environment Abnormality';
        $data['content'] = 'pages/ncr_ca/v_environment_abnormal';
        $this->load->view('template', $data);
    }
}
