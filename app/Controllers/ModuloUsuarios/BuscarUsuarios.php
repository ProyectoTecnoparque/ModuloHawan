<?php

namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\DepartamentosModel;
use App\Models\HistorialModel;

class BuscarUsuarios extends BaseController
{

	public function index()
	{
		$this->usuarios = new UsuariosModel();
		$usuarios = $this->usuarios->select('*')->where('estado', 'Activo')->findAll();
		$personas = ['datos' => $usuarios];

		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "BuscarUsuarios";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/buscar_usuarios', $personas);
		echo view('template/footer');
	}

	public function RegistrarAdministrador()
	{

		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "BuscarUsuarios";

		$this->departamentos = new DepartamentosModel();
		$departamento = $this->departamentos->select('*')->findAll();
		$datos = ['datos' => $departamento];

		echo view('template/header', $data);
		echo view('ModuloUsuarios/registrar_admin',$datos);
		echo view('template/footer');
	}

	public function buscarporId()
	{
		$usuarios = new UsuariosModel();
		$historial = new HistorialModel();
		$id = $this->request->getPostGet('doc');

		$usuario = $usuarios->select('usuario.id,usuario.email,usuario.documento,usuario.nombres,usuario.apellidos,usuario.departamento,usuario.direccion,usuario.genero,usuario.tipo_usuario,
		                            usuario.estado,usuario.puntos,usuario.fecha_insert,departamentos.nombre,point_acum.usuario_id,SUM(point_acum.puntos_sum) -SUM(point_acum.puntos_rest) AS puntos_rest ')
			->join('departamentos', 'departamentos.id_depa=usuario.departamento')
			->join('point_acum ',' usuario.id = point_acum.usuario_id')
			->where('usuario.id', $id)
			->first();
		$data = ['datos' => $usuario];

		echo view('template/header',);
		echo view('ModuloUsuarios/detalle_usuario', $data );
		echo view('template/footer');
	}

	public function inactivarusuario()
	{
		$usuarios = new UsuariosModel();
		$doc = $this->request->getPostGet('doc');
		$datos = $usuarios->set('estado', 'Inactivo')->where('id', $doc)->update();

		if ($datos) {
			$mensaje = "OK#UPDATE";
		} else {
			$mensaje = "NO#UPDATE";
		}

		echo $mensaje;
	}


	public function NuevoAdmin()
	{
		$documento = $this->request->getPostGet('documento');
		$nombres = $this->request->getPostGet('nombres');
		$apellidos = $this->request->getPostGet('apellidos');
		$email = $this->request->getPostGet('email');
		$password = $this->request->getPostGet('password');
		$direccion = $this->request->getPostGet('direccion');
		$genero = $this->request->getPostGet('genero');
		$departamento = $this->request->getPostGet('departamento');

		$usuario = new UsuariosModel();
		$consulta = $usuario->where(['documento' => $documento])->find();

		if (sizeof($consulta) > 0) {
			$mensaje = "FAIL#DOCUMENTO";
		} else {
			// Verificar que el correo no se encuentre en la bd
			$consulta = $usuario->where(['email' => $email])->find();

			if (sizeof($consulta) > 0) {
				$mensaje = "FAIL#EMAIL";
			} else {
				$registros = $usuario->save([
					'documento' => $documento,
					'nombres' => $nombres,
					'apellidos' => $apellidos,
					'email' => $email,
					'password' => md5($password),
					'direccion' => $direccion,
					'genero' => $genero,
					'departamento' => $departamento,
					'estado' => 'Activo',
					'tipo_usuario' => 'Administrador',
					'puntos' => 'NULL',
				]);
				if ($registros) {

					$mensaje = "OK#CORRECT#DATA";
				} else {
					$mensaje = "OK#INVALID#DATA";
				}
			}
		}
		echo $mensaje;
	}

	public function CantidadUsuarios(){
		$usuarios = new UsuariosModel();
		$data = $usuarios->where('estado', 'Activo')->countAll();

		if ($data) {
                  echo json_encode($data);
            } else {
                  echo json_encode('error no encontrado');
            }

	}

	
}
