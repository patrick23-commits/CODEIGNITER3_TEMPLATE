<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'login';

$route['home'] = 'home';
$route['getallaccounts'] = 'login/getallaccounts';
$route['validate'] = 'login/validate';
$route['register'] = 'login/register';
$route['edit'] = 'login/edit';
$route['delete'] = 'login/delete';
$route['save'] = 'login/save_user';


#for alliah
$route['alliah'] = 'AlliahController/index';
$route['alliah-login'] ='AlliahController/login';
$route['main-view'] = 'AlliahController/main';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
