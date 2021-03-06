<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/auth/login', 'Auth::login');


$routes->group('api',['namespace' => 'App\Controllers\API', 'filter'=> 'authFilter'],function ($routes){
	$routes -> get('estudiante', 'Estudiante::index');
	$routes -> post('estudiante/create', 'Estudiante::create');
	$routes -> get('estudiante/edit/(:num)', 'Estudiante::edit/$1');
	$routes -> put('estudiante/update/(:num)', 'Estudiante::update/$1');
	$routes -> delete('estudiante/delete/(:num)', 'Estudiante::delete/$1');  

	$routes -> get('profesor', 'Profesor::index');
	$routes -> post('profesor/create', 'Profesor::create');
	$routes -> get('profesor/edit/(:num)', 'Profesor::edit/$1');
	$routes -> put('profesor/update/(:num)', 'Profesor::update/$1');
	$routes -> delete('profesor/delete/(:num)', 'Profesor::delete/$1'); 

	$routes -> get('grado', 'Grado::index');
	$routes -> post('grado/create', 'Grado::create');
	$routes -> get('grado/edit/(:num)', 'Grado::edit/$1');
	$routes -> put('grado/update/(:num)', 'Grado::update/$1'); 
	$routes -> delete('grado/delete/(:num)', 'Grado::delete/$1'); 

	$routes -> get('roles', 'Roles::index');
	$routes -> post('roles/create', 'Roles::create');
	$routes -> get('roles/edit/(:num)', 'Roles::edit/$1');
	$routes -> put('roles/update/(:num)', 'Roles::update/$1'); 
	$routes -> delete('roles/delete/(:num)', 'Roles::delete/$1'); 

	$routes -> get('usuarios', 'Usuarios::index');
	$routes -> post('usuarios/create', 'Usuarios::create');
	$routes -> get('usuarios/edit/(:num)', 'Usuarios::edit/$1');
	$routes -> put('usuarios/update/(:num)', 'Usuarios::update/$1'); 
	$routes -> delete('usuarios/delete/(:num)', 'Usuarios::delete/$1'); 

});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
