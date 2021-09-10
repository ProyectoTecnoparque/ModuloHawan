<?php

namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\DepartamentosModel;
use App\Models\HistorialModel;

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
		                              usuario.departamento,usuario.direccion,usuario.genero,usuario.puntos,usuario.tipo_usuario,
									  usuario.estado,usuario.fecha_insert,departamentos.nombre,departamentos.id_depa')
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
		$id_departamento = $this->request->getPostGet('id_departamento');

		$data = $usuarios->set(['nombres' => $nombre_edit, 'apellidos' => $apellido_edit, 'direccion' => $direccion_edit, 'departamento' => $id_departamento])->where('id', $id_perfil)->update();

		if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode('ERROR#UPDATE');
		}
	}
	public function password_edit()
	{

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
    


    public function EditarPuntos()
	{
	  $usuarios = new UsuariosModel();	
      $new_point = $this->request->getPostGet('puntos');
	  $id = $this->request->getPostGet('id');

      $data = $usuarios->set(['puntos'=> $new_point])->where('id', $id)->update();

	  if ($data) {
		$mensaje = "OK#UPDATE";
	} else {
		$mensaje = "NO#UPDATE";
	}

	  echo $mensaje;
	}



	public function NivelUsuario(){

		$id = $_SESSION['id'];
		$usuarios = new HistorialModel();
		$data = $usuarios->where('usuario_id',$id)->countAll();

		if ($data) {
                  echo json_encode($data);
            } else {
                  echo json_encode('error no encontrado');
            }

	}


}
