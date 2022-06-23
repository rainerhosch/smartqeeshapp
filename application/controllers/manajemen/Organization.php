<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : Negara.php
 *  File Type             : Controller
 *  File Package          : CI_Controller
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Agung Kusaeri
 *  Date Created          : 06/06/2022
 *  Quots of the code     : 'sabar ya'
 */

class Organization extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        login_check();        
    }

    public function getDepartementListByIdSection()
    {

        $intIdSection 		= $this->input->get('intIdSection');
        $intIdDepartement 	= $this->input->get('intIdDepartement');
		$data 				= $this->db->get_where('mDepartemen', ['intIdSection' => $intIdSection])->result();
		$option 			= "<option value=0>Pilih Departement</option>";
		foreach ($data as $item) {
			if ($intIdDepartement != "") {
				if ($item->intIdDepartement == $intIdDepartement)
					$option .= "<option value=$item->intIdDepartement selected>$item->txtNamaDepartement</option>";
			} else {
				$option .= "<option value=$item->intIdDepartement>$item->txtNamaDepartement</option>";
			}			
		}
        echo json_encode($option);
    }

	public function getActivityListByIdDepartement()
    {

        $intIdDepartement 	= $this->input->get('intIdDepartement');
        $intIdActivity 		= $this->input->get('intIdActivity');
		$data 				= $this->db->get_where('mActivity', ['intIdDepartement' => $intIdDepartement])->result();		
		$option 			= "<option value=0>Pilih Activity</option>";
		foreach ($data as $item) {			
			if ($intIdActivity != "") {
				if ($item->intIdActivity == $intIdActivity)
					$option .= "<option value=$item->intIdActivity selected>$item->txtNamaActivity</option>";
			} else {
				$option .= "<option value=$item->intIdActivity>$item->txtNamaActivity</option>";
			}
		}
        echo json_encode($option);
    }
}
