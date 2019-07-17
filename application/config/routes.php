<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['login']='Home/login';
$route['logout']='Home/logout';
$route['admin/']='Admin/';
$route['admin/createProduct']='Admin/createProduct';
$route['admin/viewProducts']='Admin/viewProducts';
$route['admin/editProduct']='Admin/editProduct';

$route['Customer/viewCart']='Customer/viewCart';
$route['Customer/placeOrder']='Customer/placeOrder';
$route['Customer/track']='Customer/track';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
