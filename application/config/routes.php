<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// $route['default_controller'] = 'dashboard';
// $route['sub_menu/(:any)'] = 'manajemen/sub_menu/$1';
// $route['menu/(:any)'] = 'manajemen/menu/$1';
// $route['user/(:any)'] = 'manajemen/user/$1';
// $route['role_access/(:any)'] = 'manajemen/role_access/$1';
// $route['risk_management/(:any)'] = 'risk_management/$1';
// $route['legal_compliance/(:any)'] = 'legal_compliance/$1';
// $route['404_override'] = 'pages_404';
// $route['translate_uri_dashes'] = FALSE;

$route['default_controller'] = 'dashboard';
$route['sub_menu/(:any)'] = 'manajemen/sub_menu/$1';
$route['menu/(:any)'] = 'manajemen/menu/$1';
$route['user/(:any)'] = 'manajemen/user/$1';
$route['role_access/(:any)'] = 'manajemen/role_access/$1';

$route['manajemen_menu/sub_menu'] = 'manajemen/sub_menu';
$route['manajemen_menu/menu'] = 'manajemen/menu';
$route['manajemen_menu/user'] = 'manajemen/user';
$route['manajemen_menu/role_access'] = 'manajemen/role_access';

$route['manajemen_data/agama'] = 'manajemen/agama';
$route['manajemen_data/employee'] = 'manajemen/employee';
$route['manajemen_data/hospital'] = 'manajemen/hospital';
$route['manajemen_data/negara'] = 'manajemen/negara';
$route['manajemen_data/jenjang_pendidikan'] = 'manajemen/jenjang_pendidikan';
$route['manajemen_data/jabatan'] = 'manajemen/jabatan';

$route['manajemen_plant/plant'] = 'manajemen/plant';
$route['manajemen_plant/departement'] = 'manajemen/departement';
$route['manajemen_plant/section'] = 'manajemen/section';

$route['risk_management/input_risk_register'] = 'risk_register/dokumen';

$route['manajemen_master/risk_assessment_matrix'] = 'manajemen/risk_assessment_matrix';
$route['manajemen_master/RiskConsequence'] = 'manajemen/RiskConsequence';
$route['manajemen_master/likelihood'] = 'manajemen/likelihood';
$route['manajemen_master/activity'] = 'manajemen/activity';
$route['manajemen_master/sub_activity'] = 'manajemen/TahapanProses';
$route['manajemen_master/risk_consequence'] = 'manajemen/RiskConsequence';

// ncr
$route['ncr_ca/corrective_action'] = 'ncr_ca/Corrective_action/incident_investigation';
$route['ncr_ca/corrective_action/(:any)'] = 'ncr_ca/Corrective_action/$1';

$route['manajemen_menu/sub_menu/(:any)'] = 'manajemen/sub_menu/$1';
$route['manajemen_menu/menu/(:any)'] = 'manajemen/menu/$1';
$route['manajemen_menu/user/(:any)'] = 'manajemen/user/$1';
$route['manajemen_menu/role_access/(:any)'] = 'manajemen/role_access/$1';


$route['risk_management/(:any)'] = 'risk_management/$1';
$route['legal_compliance/(:any)'] = 'legal_compliance/$1';
$route['404_override'] = 'pages_404';
$route['translate_uri_dashes'] = FALSE;