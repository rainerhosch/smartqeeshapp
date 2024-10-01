<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Legal_compliance_home_model extends MY_Model
{
    use MY_Tables;

    public function __construct()
	{
		$this->_tabel = $this->_table_regulation_related;
        $this->_crudName = 'Home';
		parent::__construct();
	}

}