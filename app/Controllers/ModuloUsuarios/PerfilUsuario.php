<?php

namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\DepartamentosModel;

class PerfilUsuario extends BaseController
{

	public function index()
	{
		$this->departamento = new DepartamentosModel();
		$departamentos_sql = $this->departamento->select('*')->findAll();
		$departamentos = ['departamentos' => $departamentos_sql];

		$data['modulo_selected'] = "Perfil";
		$data['opcion_selected'] = "PerfilUsuario";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/perfil_usuario', $departamentos);
		echo view('template/footer');
	}

	public function buscar_session()
	{
		$usuarios = new UsuariosModel();
		$id_perfil = $this->request->getPostGet('id_perfil');
		$data = $usuarios->select('usuario.id,usuario.email,usuario.documento,usuario.nombres,usuario.apellidos,
		                              usuario.departamento,usuario.direccion,usuario.genero,usuario.tipo_usuario,
									  usuario.estado,usuario.fecha_insert,departamentos.nombre')
			->join('departamentos', 'departamentos.id_depa=usuario.departamento')
			->where('usuario.id', $id_perfil)
			->findAll();
		if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode('error no encontrado');
		}
	}

	public function enviarnewdatos()
	{
		$usuarios = new UsuariosModel();
		$id_perfil = $this->request->getPostGet('id_perfil');
		$nombre_edit = $this->request->getPostGet('nombre_edit');
		$apellido_edit = $this->request->getPostGet('apellido_edit');
		$direccion_edit = $this->request->getPostGet('direccion_edit');
		$id_ciudad = $this->request->getPostGet('id_ciudad');

		$data = $usuarios->set(['nombres' => $nombre_edit, 'apellidos' => $apellido_edit, 'direccion' => $direccion_edit, 'telefono' => $telefono_edit, 'id_ciudad' => $id_ciudad])->where('id', $id_perfil)->update();

		if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode('ERROR#UPDATE');
		}
	}
	public function password_edit(){

		$usuarios = new UsuariosModel();
		$id_perfil = $this->request->getPostGet('id_perfil');
		$password_db = md5($this->request->getPostGet('password_db'));
		$new_password = md5($this->request->getPostGet('new_password'));

		$consulta_pass = $usuarios->where('password', $password_db)->where('id', $id_perfil)->find();

		if ($consulta_pass) {
			$data = $usuarios->set(['password' => $new_password])->where('id', $id_perfil)->update();
			if ($data) {
				echo json_encode('OK##UPDATE');
			} else {
				echo json_encode('ERROR##UPDATE');
			}
		} else {
			echo json_encode('INVALID##PASSWORD');
		}
	}

}
