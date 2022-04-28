<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Incident_Investigation.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 20/04/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Incident_Investigation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        // code here...
        $data['title'] = 'Smart Qeesh App';
        $data['menu_header'] = 'NON-CONFORMITY & CORRECTIVE ACTION';
        $data['page'] = 'NCR & CA';
        $data['subpage'] = 'Incident Investigation';
        $data['content'] = 'pages/ncr_ca/v_incident_investigation';
        $this->load->view('template', $data);
    }
}
