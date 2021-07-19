<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* -------------------------------------------------------------------------
* URI ROUTING
* -------------------------------------------------------------------------
* This file lets you re-map URI requests to specific controller functions.
*
* Typically there is a one-to-one relationship between a URL string
* and its corresponding controller class/method. The segments in a
* URL normally follow this pattern:
*
*	example.com/class/method/id/
*
* In some instances, however, you may want to remap this relationship
* so that a different class/function is called than the one
* corresponding to the URL.
*
* Please see the user guide for complete details:
*
*	https://codeigniter.com/user_guide/general/routing.html
*
* -------------------------------------------------------------------------
* RESERVED ROUTES
* -------------------------------------------------------------------------
*
* There are three reserved routes:
*
*	$route['default_controller'] = 'welcome';
*
* This route indicates which controller class should be loaded if the
* URI contains no data. In the above example, the "welcome" class
* would be loaded.
*
*	$route['404_override'] = 'errors/page_missing';
*
* This route will tell the Router which controller/method to use if those
* provided in the URL cannot be matched to a valid route.
*
*	$route['translate_uri_dashes'] = FALSE;
*
* This is not exactly a route, but allows you to automatically route
* controller and method names that contain dashes. '-' isn't a valid
* class or method name character, so it requires translation.
* When you set this option to TRUE, it will replace ALL dashes in the
* controller and method URI segments.
*
* Examples:	my-controller/index	-> my_controller/index
*		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'AuthenticationController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = true;

// =========================FOR USER=============================
$route['/']['GET'] = 'User_HomeController/index';
$route['index']['GET'] = 'User_HomeController/index';

// =========================FOR AUTH=============================
$route['login']['GET'] = 'AuthenticationController/index';
$route['register']['GET'] = 'AuthenticationController/register';


$route['log-out']['GET'] = 'AuthenticationController/logout';

// =========================FOR ADMIN============================
$route['admin']['GET'] = 'Admin_HomeController/index';
$route['admin/index']['GET'] = 'Admin_HomeController/index';
$route['admin/dashboard']['GET'] = 'Admin_HomeController/index';

$route['admin/brands-management']['GET'] = 'Admin_BrandsController/index';
$route['admin/brands-management/add']['GET'] = 'Admin_BrandsController/create_view';
$route['admin/brands-management/add']['POST'] = 'Admin_BrandsController/create_post';
$route['admin/brands-management/edit/(:num)']['GET'] = 'Admin_BrandsController/edit_view/$1';
$route['admin/brands-management/edit']['POST'] = 'Admin_BrandsController/edit_post';
$route['admin/brands-management/delete/(:num)']['GET'] = 'Admin_BrandsController/delete_post/$1';

$route['admin/categories-management']['GET'] = 'Admin_CategoriesController/index';
$route['admin/categories-management/add']['GET'] = 'Admin_CategoriesController/create_view';
$route['admin/categories-management/add']['POST'] = 'Admin_CategoriesController/create_post';
$route['admin/categories-management/edit/(:num)']['GET'] = 'Admin_CategoriesController/edit_view/$1';
$route['admin/categories-management/edit']['POST'] = 'Admin_CategoriesController/edit_post';
$route['admin/categories-management/delete/(:num)']['GET'] = 'Admin_CategoriesController/delete/$1';
//sprays
$route['admin/sprays-management']['GET'] = 'Admin_SpraysController/index';
$route['admin/sprays-management/add']['GET'] = 'Admin_SpraysController/create_view';
$route['admin/sprays-management/add']['POST'] = 'Admin_SpraysController/create_post';
$route['admin/sprays-management/edit/(:num)']['GET'] = 'Admin_SpraysController/edit_view/$1';
$route['admin/sprays-management/edit']['POST'] = 'Admin_SpraysController/edit_post';
$route['admin/sprays-management/delete/(:num)']['GET'] = 'Admin_SpraysController/delete/$1';
//storage boxes
$route['admin/boxes-management']['GET'] = 'Admin_StorageBoxesController/index';
$route['admin/boxes-management/add']['GET'] = 'Admin_StorageBoxesController/create_view';
$route['admin/boxes-management/add']['POST'] = 'Admin_StorageBoxesController/create_post';
$route['admin/boxes-management/edit/(:num)']['GET'] = 'Admin_StorageBoxesController/edit_view/$1';
$route['admin/boxes-management/edit']['POST'] = 'Admin_StorageBoxesController/edit_post';
$route['admin/boxes-management/delete/(:num)']['GET'] = 'Admin_StorageBoxesController/delete/$1';
//clothes
$route['admin/clothes-management']['GET'] = 'Admin_ClothesController/index';
$route['admin/clothes-management/add']['GET'] = 'Admin_ClothesController/create_view';
$route['admin/clothes-management/add']['POST'] = 'Admin_ClothesController/create_post';
$route['admin/clothes-management/edit/(:num)']['GET'] = 'Admin_ClothesController/edit_view/$1';
$route['admin/clothes-management/edit']['POST'] = 'Admin_ClothesController/edit_post';
$route['admin/clothes-management/delete/(:num)']['GET'] = 'Admin_ClothesController/delete/$1';

$route['admin/users-management']['GET'] = 'Admin_UsersController/index';
$route['admin/users-management/add']['GET'] = 'Admin_UsersController/create_view';
$route['admin/users-management/add']['POST'] = 'Admin_UsersController/create_post';
$route['admin/users-management/edit/(:num)']['GET'] = 'Admin_UsersController/edit_view/$1';
$route['admin/users-management/edit']['POST'] = 'Admin_UsersController/edit_post';
$route['admin/users-management/delete/(:num)']['GET'] = 'Admin_UsersController/delete/$1';


$route['admin/orders-management']['GET'] = 'Admin_OrdersController/index';
$route['admin/orders-management/add']['GET'] = 'Admin_OrdersController/create_view';
$route['admin/orders-management/add']['POST'] = 'Admin_OrdersController/create_post';
$route['admin/orders-management/(:num)/details']['GET'] = 'Admin_OrdersController/edit_view/$1';
$route['admin/orders-management/(:num)/details']['POST'] = 'Admin_OrdersController/edit_save/$1';

$route['admin/messages-box']['GET'] = 'Admin_MessagesBoxController/index';
$route['admin/messages-box/send']['POST'] = 'Admin_MessagesBoxController/send_message';

$route['admin/preferences']['GET'] = 'Admin_PreferencesController/index';
$route['admin/preferences']['POST'] = 'Admin_PreferencesController/save';

$route['admin/revenue']['GET'] = 'Admin_RevenueController/index';

//Glasses
$route['admin/glasses-management']['GET'] = 'Admin_GlassesController/index';
$route['admin/glasses-management/add']['GET'] = 'Admin_GlassesController/create_view';
$route['admin/glasses-management/add']['POST'] = 'Admin_GlassesController/create_post';
$route['admin/glasses-management/edit/(:num)']['GET'] = 'Admin_GlassesController/edit_view/$1';
$route['admin/glasses-management/edit']['POST'] = 'Admin_GlassesController/edit_post';
$route['admin/glasses-management/delete/(:num)']['GET'] = 'Admin_GlassesController/delete_post/$1';

//Contact Lens
$route['admin/contactlens-management']['GET'] = 'Admin_ContactLensController/index';
$route['admin/contactlens-management/add']['GET'] = 'Admin_ContactLensController/create_view';
$route['admin/contactlens-management/add']['POST'] = 'Admin_ContactLensController/create_post';
$route['admin/contactlens-management/edit/(:num)']['GET'] = 'Admin_ContactLensController/edit_view/$1';
$route['admin/contactlens-management/edit']['POST'] = 'Admin_ContactLensController/edit_post';
$route['admin/contactlens-management/delete/(:num)']['GET'] = 'Admin_ContactLensController/delete_post/$1';



// =========================FOR USER============================
$route['user']['GET'] = 'User_HomeController/index';
$route['user/index']['GET'] = 'User_HomeController/index';
$route['user/dashboard']['GET'] = 'User_HomeController/index';

//Product
$route['user/product']['GET'] = 'User_ProductController/index';
$route['user/product/detail/(:num)']['GET'] = 'User_ProductController/detail/$1';
$route['user/product/detail/comment']['GET'] = 'User_ProductController/save';
$route['user/product/detail/comment']['POST'] = 'User_ProductController/save';




//UserOrder
$route['user/orders/view']['GET'] = 'User_OrdersController/index';
$route['user/orders/add/(:num)']['GET'] = 'User_OrdersController/create_view/$1';
$route['user/orders/add']['POST'] = 'User_OrdersController/create_post';
$route['user/orders/cancel/(:num)']['GET'] = 'User_OrdersController/cancel/$1';
