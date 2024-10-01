<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_new_regulation_model extends MY_Model
{
    use MY_Tables;

    public function __construct()
	{
		$this->_tabel = $this->_table_regulation_compliance;
        $this->_crudName = 'Regulation';
		parent::__construct();
	}

    


}