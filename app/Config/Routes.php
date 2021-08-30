<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Inicio');
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
$routes->get('/Login', 'Inicio::index');
$routes->get('/Inicio', 'Inicio::cargarVistaInicio');
$routes->get('/RegistrarUsuario', 'Inicio::RegistrarUsuario');
$routes->get('7NuevoAdmin', 'Inicio::NuevoAdmin');

$routes->get('/Registrar', 'Inicio::Registrar');
$routes->get('/Historial', 'Historial::historial_expe');
$routes->get('/BuscarDatos', 'Historial::BuscarDatos');

//modulo de Puntos
$routes->get('/Puntos', 'Puntos::index');
$routes->get('/BuscarNivel', 'Puntos::BuscarNivel');
$routes->get('/EditarNivel', 'Puntos::EditarNivel');


// Rutas para el modulo de GestionUsuarios
$routes->group('ModuloUsuarios', ['namespace' => 'App\Controllers\ModuloUsuarios'], function ($routes) {
    // Registrar nuevo administrador
    // $routes->add('RegistrarAdministrador', 'RegistrarAdministrador::index');

    $routes->add('RegistrarAdministrador', 'BuscarUsuarios::RegistrarAdministrador');
    // $routes->add('NuevoAdmin', 'BuscarUsuarios::NuevoAdmin');


    $routes->add('BuscarUsuarios', 'BuscarUsuarios::index');
    $routes->add('BuscarusuId', 'BuscarUsuarios::buscarporId');

    $routes->add('MostrarUsuarios', 'BuscarUsuarios::listarusuarios');
    $routes->add('Actuaestado', 'BuscarUsuarios::actualizarest');
    $routes->add('DesactivarUs', 'BuscarUsuarios::inactivarusuario');

    $routes->add('BuscarInactivos', 'BuscarInactivos::index');
    $routes->add('MostrarInactivos', 'BuscarInactivos::listarinactivos');
    $routes->add('BuscarInacId', 'BuscarInactivos::buscarinacId');
    $routes->add('ActualizarInac', 'BuscarInactivos::actualizarinac');
    $routes->add('RestaurarUsuario', 'BuscarInactivos::restaurarestado');


    $routes->add('PerfilUsuario', 'PerfilUsuario::index');
    // Buscar y Editar datos generales del perfil 
    $routes->add('BuscarDatosPerfil', 'PerfilUsuario::buscar_session');

    $routes->add('EditarPerfil', 'PerfilUsuario::enviarnewdatos');

    //  Editar datos  de seguridad del perfil 
    $routes->add('PasswordPerfil', 'PerfilUsuario::password_edit');
});

$routes->group('ModuloPuntos', ['namespace' => 'App\Controllers\ModuloPuntos'], function ($routes) {
    $routes->get('Puntos', 'Puntos::index');
    $routes->add('BuscarUsuarios', 'BuscarUsuarios::index');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
