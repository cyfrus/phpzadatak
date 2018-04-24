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
$route['artikal/(:num)/delete']['POST'] = 'Artikal/delete_artikal/$1';
$route['artikal/(:num)/update']['POST'] = 'Artikal/update_artikal/$1';
$route['artikal/(:num)/edit']['GET'] = 'Artikal/edit_artikal/$1';
$route['artikal/(:num)']['GET']  = 'Artikal/get_artikal/$1';
$route['artikal/new']['POST'] = 'Artikal/create_artikal';  
$route['artikal/add']['GET'] = 'Artikal/add_artikal';

$route['korisnik/(:num)/update']['POST'] = 'Korisnik/update_korisnik/$1';
$route['korisnik/(:num/delete)']['POST'] = 'Korisnik/delete_korisnik/$1';
$route['korisnik/(:num)/edit']['GET'] = 'Korisnik/edit_korisnik/$1'; 
$route['korisnik/(:num)']['GET'] = 'Korisnik/get_korisnik/$1';
$route['korisnik/all']['GET'] = 'Korisnik/get_korisnici';
$route['korisnik/new']['POST'] = 'Korisnik/create_user';
$route['korisnik/add']['GET'] = 'Korisnik/add_user';

$route['logout']['GET'] = 'Korisnik/logout';
$route['login']['GET'] = 'Korisnik/login';
$route['login']['POST'] = 'Korisnik/authenticate';

$route['default_controller'] = 'Korisnik';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
