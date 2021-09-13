<?php

namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\DepartamentosModel;
use App\Models\HistorialModel;
use App\Models\PuntosModel;

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
    


    public function EditarPuntossum()
	{
	  $historial = new HistorialModel();	
      $sum_puntos  = $this->request->getPostGet('sum_puntos');
	  $id_sum = $this->request->getPostGet('id_sum');

	  $data = $historial->save([
		'usuario_id' => $id_sum,
		'puntos_sum' => $sum_puntos,
		'puntos_rest' => '0',
		'id_nivel' =>'2',]);

	  if ($data) {
		$mensaje = "OK#INSERT";
	} else {
		$mensaje = "NO#INSERT";
	}

	  echo $mensaje;
	}

	public function EditarPuntosres()
	
	{
	  $historial = new HistorialModel();
	  $niveles= new PuntosModel();
      $new_point = $this->request->getPostGet('res_puntos');
	  $id_user = $this->request->getPostGet('id_res');
	  $nivel = $niveles->select('id')->where('puntos'<= $new_point);

      $data = $historial->save([
		  'usuario_id' => $id_user,
		  'puntos_sum' =>'0',
		  'puntos_rest' => $new_point,
		  'id_nivel' => '1']);

	  if ($data) {
		$mensaje = "OK#INSERT";
	} else {
		$mensaje = "NO#INSERT";
	}

	  echo $mensaje;
	}



	public function NivelUsuario(){

		$id = $_SESSION['id'];
		$historial = new HistorialModel();
		$data = $historial->select('usuario.id,point_acum.usuario_id,SUM(point_acum.puntos_sum) - SUM(point_acum.puntos_rest) ')
						  ->join('usuario',' usuario.id = point_acum.usuario_id')
						  ->where('usuario_id',$id);

		if ($data) {
                  echo json_encode($data);
            } else {
                  echo json_encode('error no encontrado');
            }

	}


}
