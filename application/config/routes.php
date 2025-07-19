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

// ============================  admin routes ===================================
$route['admin'] = 'admin/admin/index';
$route['admin/dashboard'] = 'admin/admin/index';
$route['admin/login']= 'admin/admin/login';
$route['admin/logout'] = 'admin/admin/logout';
$route['admin/profile/(:num)'] = 'admin/admin/profile/$1';
$route['admin/edit-user/(:num)'] = 'admin/admin/edit_user/$1';
$route['admin/category'] = 'admin/category';
$route['admin/category-group'] = 'admin/category/category_group';
$route['admin/add-category'] = 'admin/category/add_category';
$route['admin/delete-category'] = 'admin/category/delete_category';
$route['get-category/(:num)'] = 'admin/category/get_category/$1';
$route['set-category-order'] = 'admin/category/setCategotuOrder';
$route['admin/users'] = 'admin/admin/get_users';


// simple template 
$route['admin/add-template'] = 'admin/template/add_template';
$route['admin/all-templates'] = 'admin/template/all_template';
$route['admin/view-template/(:num)'] = 'admin/template/view_template/$1';
$route['admin/delete-template/(:num)'] = 'admin/template/delete_template/$1';

// canvas template 
$route['admin/canvas-all-templates'] = 'canvas_editor/canvas_editor/get_template';
$route['admin/view-canvas-template/(:num)'] = 'canvas_editor/canvas_editor/view_template/$1';
$route['admin/add_canvas_template'] = 'canvas_editor/canvas_editor/index';
$route['admin/save_canvas_template'] = 'canvas_editor/canvas_editor/save_template';
$route['admin/edit_canvas_template/(:num)'] = 'canvas_editor/canvas_editor/update_template/$1';
$route['admin/delete-template/(:num)'] = 'canvas_editor/canvas_editor/delete_template/$1';





// ==========================   user routes ========================================= 
$route['default_controller'] = 'app';
$route['profile'] = 'app/profile';
$route['signup'] = 'app/signup';
$route['login'] = 'app/login';
$route['add-business-data'] = 'app/add_business_details';

$route['home'] = 'app/index';
$route['view-poster/(:num)'] = 'app/view_poster/$1';
$route['category'] = 'app/category/';
$route['banner-by-category/(:num)'] = 'app/banner_by_category/$1';
$route['pro'] = 'app/pro';



// error_pages 
$route['404-page'] = 'app/page_not_found';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// user profile 
$route['save-user-info']= 'app/save_user_profile';

// api routes  
$route['api/banners'] = 'api/banner/index'; 
$route['api/banners/(:num)'] = 'api/banner/show/$1'; 
$route['api/canvas-template'] = 'api/canvas_template/index'; 
$route['api/add_canvas_template'] = 'api/canvas_template/add_template'; 


// api v1 
$route['v1/api/poster'] = 'api/Poster_templates/index'; 


