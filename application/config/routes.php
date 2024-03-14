<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['admin/bookings'] = 'Admin/bookings';
$route['admin/number'] = 'Admin/number';
$route['admin/clients'] = 'Admin/clients';
// $route['admin'] = 'admin';

$route['api/bookings'] = 'api/get_bookings';
$route['api/bookings/add'] = 'api/add_booking';
$route['api/bookings/(:num)']['PUT'] = 'api/update_booking/$1';
$route['api/bookings/(:num)']['DELETE'] = 'api/delete_booking/$1';

// $route['admin/clients'] = 'Admin/clients';
$route['api/clients'] = 'api/get_clients';
$route['api/clients/add'] = 'api/add_client';
$route['api/clients/(:num)']['PUT'] = 'api/update_client/$1';
$route['api/clients/(:num)']['DELETE'] = 'api/delete_client/$1';


$route['api/numbers'] = 'api/get_numbers';
$route['api/numbers/add'] = 'api/add_number';
$route['api/numbers/(:num)']['PUT'] = 'api/update_number/$1';
$route['api/numbers/(:num)']['DELETE'] = 'api/delete_number/$1';

$route['api/floors'] = 'api/get_floors';
$route['api/floors/add'] = 'api/add_floor';
$route['api/floors/(:num)']['PUT'] = 'api/update_floor/$1';
$route['api/floors/(:num)']['DELETE'] = 'api/delete_floor/$1';

$route['api/categorys'] = 'api/get_categorys';
$route['api/categorys/add'] = 'api/add_category';
$route['api/categorys/(:num)']['PUT'] = 'api/update_category/$1';
$route['api/categorys/(:num)']['DELETE'] = 'api/delete_category/$1';

$route['default_controller'] = 'Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


