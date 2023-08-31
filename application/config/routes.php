<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'login';

$route['home'] = 'home';
$route['validate'] = 'login/validate';
$route['register'] = 'login/register';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
