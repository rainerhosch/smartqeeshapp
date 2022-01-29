<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Home.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Rizky Ardiansyah
 *  Date Created          : 29/01/2022
 *  Quots of the code     : 'rapihkan lah code mu, seperti halnya kau menata kehidupan'
 */
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Smart Qeesh App';
        $data['page'] = 'Home';
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
