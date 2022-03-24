<?php
defined('BASEPATH') or exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
<<<<<<< HEAD
	'username' => 'u1121502_smarqeesh_dev',
	'password' => 'smarqeesh',
	'database' => 'u1121502_smart_qeesh',
=======
	'username' => 'root',
	'password' => '',
	'database' => 'db_smart_qeesh',
	// 'username' => 'u1121502_smarqeesh_dev',
	// 'password' => 'smarqeesh',
	// 'database' => 'u1121502_smart_qeesh',
>>>>>>> e1aee5b635052b0c966fbd37c6a39d2d7f3a8067
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
<<<<<<< HEAD
// 	'db_debug' => (ENVIRONMENT !== 'development'),
=======
	// 'db_debug' => (ENVIRONMENT !== 'development'),
>>>>>>> e1aee5b635052b0c966fbd37c6a39d2d7f3a8067
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
