<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\DepartamentosModel;


class RegistrarAdministrador extends BaseController
{
    public function index(){

		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "BuscarUsuarios";

		$this->departamentos = new DepartamentosModel();
		$departamento = $this->departamentos->select('*')->findAll();
		$datos = ['datos' => $departamento];

		echo view('template/header', $data);
		echo view('ModuloUsuarios/registrar_admin',$datos);
		echo view('template/footer');
	}

}
