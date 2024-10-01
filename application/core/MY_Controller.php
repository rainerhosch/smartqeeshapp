<?php defined('BASEPATH') or exit('No direct script access allowed');

abstract class MY_Controller extends MY_Template
{

    public function __construct()
    {
        parent::__construct();
        login_check();
        $this->load->model($this->router->class . '_model', strtolower($this->router->class) . '_model');
    }

}