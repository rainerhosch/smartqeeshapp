<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *  File Name             : M_dok_register.php
 *  File Type             : Model
 *  File Package          : CI_Models
 ** * * * * * * * * * * * * * * * * * **
 *  Author                : Dimas Fauzan
 *  Date Created          : 23/03/2022
 *  Quots of the code     : PKadang susah kalo udah nyaman sama framework sebelah :D
 */
class M_tahapan_proses extends CI_Model
{
	var $table = 'trDokRiskRegister'; //nama tabel dari database
	var $column_order = array(null); //field yang ada di table user
	var $column_search = array('txtDocNumber'); //field yang diizin untuk pencarian 
	var $order = array('dtmInsertedBy' => 'desc'); // default order 
}
