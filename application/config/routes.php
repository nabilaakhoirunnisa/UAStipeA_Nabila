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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login']='auth';
$route['login/proses']='auth/login';
$route['logout']= 'auth/logout';
## produk
$route['produk'] = 'produk';
$route['produk/tambah'] = 'produk/tambah';
$route['produk/edit/(:num)'] = 'produk/edit/$1';
$route['produk/hapus/(:num)'] = 'produk/hapus/$1';
## pelanggan
$route['pelanggan'] = 'pelanggan';
$route['pelanggan/tambah'] = 'pelanggan/tambah';
$route['pelanggan/edit/(:num)'] = 'pelanggan/edit/$1';
$route['pelanggan/hapus/(:num)'] = 'pelanggan/hapus/$1';
## manajemen users
$route['manajemen_users'] = 'manajemen_users';
$route['manajemen_users/tambah'] = 'manajemen_users/tambah';
$route['manajemen_users/edit/(:num)'] = 'manajemen_users/edit/$1';
$route['manajemen_users/hapus/(:num)'] = 'manajemen_users/hapus/$1';
## sales order
$route['sales_order'] = 'sales_order';
$route['sales_order/tambah'] = 'sales_order/tambah';
$route['sales_order/detail/(:num)'] = 'sales_order/detail/$1';

$route['sales_order/tambah_produk/(:num)'] = 'sales_order/tambah_produk/$1';
$route['sales_order/hapus_produk/(:num)']  = 'sales_order/hapus_produk/$1';

$route['sales_order/ubah_status/(:num)'] = 'sales_order/ubah_status/$1';

$route['laporan/cetak_produk'] = 'laporan/cetak_produk';
$route['laporan/cetak_sales']  = 'laporan/cetak_sales';