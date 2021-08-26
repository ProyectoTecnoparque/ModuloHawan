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
$routes->get('/Registrar', 'Inicio::Registrar');
$routes->get('/Puntos', 'Puntos::index');


// Rutas para el modulo de GestionUsuarios
$routes->group('ModuloUsuarios', ['namespace' => 'App\Controllers\ModuloUsuarios'], function ($routes) {
    
    $routes->add('BuscarUsuarios', 'BuscarUsuarios::index');
    $routes->add('CantidadUsuarios', 'BuscarUsuarios::totalUsuarios');


    $routes->add('MostrarUsuarios', 'BuscarUsuarios::listarusuarios');
    $routes->add('BuscarusuId', 'BuscarUsuarios::buscarporId');
    $routes->add('Actuaestado', 'BuscarUsuarios::actualizarest');
    $routes->add('DesactivarUs', 'BuscarUsuarios::inactivarusuario');

    $routes->add('BuscarInactivos', 'BuscarInactivos::index');
    $routes->add('MostrarInactivos', 'BuscarInactivos::listarinactivos');
    $routes->add('BuscarInacId', 'BuscarInactivos::buscarinacId');
    $routes->add('ActualizarInac', 'BuscarInactivos::actualizarinac');
    $routes->add('RestaurarUsuario', 'BuscarInactivos::restaurarestado');

     
    $routes->add('PerfilUsuario', 'PerfilUsuario::index');
    $routes->add('CargarAvatar', 'PerfilUsuario::editarAvatar');
    // Buscar y Editar datos generales del perfil 
    $routes->add('BuscarDatosPerfil', 'PerfilUsuario::buscar_session');
    $routes->add('EditarPerfil', 'PerfilUsuario::enviarnewdatos');
    
    //  Editar datos  de seguridad del perfil 
    $routes->add('PasswordPerfil', 'PerfilUsuario::password_edit');
    


    // Rutas para consultar y modificar la ciudad del usuario (AppMovil)
    $routes->add('nombreCiudad', 'PerfilUsuario::consultarNombreCiudad');

    $routes->add('CambiarCiudadMovil', 'PerfilUsuario::editarCiudadMovil');
    $routes->add('EditarDatosMovil', 'PerfilUsuario::editarDatosMovil');
    $routes->add('EditarEmailMovil', 'PerfilUsuario::editarCorreoMovil');
    $routes->add('EditarPasswordMovil', 'PerfilUsuario::editarPasswordMovil');
    $routes->add('DesactivarCuentaMovil', 'PerfilUsuario::desactivarUsuarioMovil');
    $routes->add('ActualizarImagenPerfil', 'PerfilUsuario::editarAvatarMovil');
    
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
