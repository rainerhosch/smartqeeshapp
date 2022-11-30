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

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\Writer\Word2007;

use PhpOffice\PhpWord\Element\Field;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\SimpleType\TblWidth;

class Environment_Abnormality extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model('M_Envinvestigation', 'envinvestigation');
    }

    public function index()
    {
        // code here...
        $data['title'] = 'Smart Qeesh App';
        $data['menu_header'] = 'NON-CONFORMITY & CORRECTIVE ACTION';
        $data['page'] = 'NCR & CA';
        $data['subpage'] = 'Environment Abnormality';
        $data['content'] = 'pages/ncr_ca/v_environment_abnormal';
        $jml = $this->envinvestigation->get_data()->num_rows();
        $data['erca_no'] = 'E-RCA-' . ($jml + 1);
        $this->load->view('template', $data);
    }

    public function save_data()
    {
        $data_post = $this->input->post();
        echo '<pre>';
        var_dump($data_post);
        echo '</pre>';
        die;
    }
}