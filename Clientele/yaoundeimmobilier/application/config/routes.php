<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
*/

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['botdetect/captcha-handler'] = 'botdetect/captcha_handler/index';

//$route['console/parametrages'] = 'console/parametrage/';

$route['console/constructions/(:num)/update'] = 'console/update_construction/$1';
$route['console/constructions/(:num)/delete'] = 'console/delete_construction/$1';
$route['console/proprietaires/(:num)/update'] = 'console/update_proprietaire/$1';
$route['console/proprietaires/(:num)/delete'] = 'console/delete_proprietaire/$1';