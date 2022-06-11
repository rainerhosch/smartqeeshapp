<?php
defined('BASEPATH') or exit('No direct script access allowed');

$active_group = 'live';
$query_builder = TRUE;

$db['live'] = array(
	'dsn'	=> '',
	'hostname' => '45.130.230.220',
	'username' => 'u1121502_smarqeesh_dev',
	'password' => 'smarqeesh',
	// DATABASE PRODUCTION
	// 'database' => 'u1121502_smart_qeesh',
	// DATABASE TESTING
	'database' => 'u1121502_smart_qeesh_testing',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	// 'db_debug' => (ENVIRONMENT !== 'production'),
	'db_debug' => (ENVIRONMENT !== 'development'),
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

$db['development'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'pmauser',
	'password' => 'pmapass',
	'database' => 'u1121502_smart_qeesh_testing',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'development'),
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
