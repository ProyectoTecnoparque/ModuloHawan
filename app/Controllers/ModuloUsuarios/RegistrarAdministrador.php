<?php

namespace App\Controllers;

use App\Models\UsuariosModel;


class RegistrarAdministrador extends BaseController
{
    public function index(){

		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "BuscarUsuarios";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/registrar_admin');
		echo view('template/footer');
	}

}
