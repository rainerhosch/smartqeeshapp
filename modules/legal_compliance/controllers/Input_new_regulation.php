<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_new_regulation extends MY_Controller
{

	public function __construct()
	{
        $this->_bigModul = LEGAL_COMPLIANCE;
        $this->_page = 'Input New Regulation';
		parent::__construct();
	}

    public function index()
    {
        $this->_setJs();
        $this->_content = $this->_body;
        $data = [
            'saveUrl' => "#"
        ];
        $this->_view($data);
    }
}