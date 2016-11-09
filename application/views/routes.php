<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "login";
$route['login'] = 'login/index';
$route['sendmsg'] = 'welcome/sendmsg';
$route['dashboard'] = 'dashboard/homepage';
$route['addrouter'] = 'router/addrouter';
$route['router'] = 'router/allrouter';
$route['signup'] = 'login/signup';
$route['addsignup'] = 'login/signup_data';
$route['success'] = 'login/getsuccess';
$route['logout'] = 'login/logout';
$route['getrouter'] = 'welcome/getrouter';

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */