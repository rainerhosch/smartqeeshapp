<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Legal_compliance_home extends MY_Controller
{

	public function __construct()
	{
        $this->_bigModul = LEGAL_COMPLIANCE;
        $this->_page = 'home';
		parent::__construct();
	}

    public function index()
    {
        $this->_setJs();
        $this->_content = strtolower($this->router->class).'/'.'v_home';
        $this->_view();
    }
}