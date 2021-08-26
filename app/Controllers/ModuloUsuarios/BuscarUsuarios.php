<?php namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class BuscarUsuarios extends BaseController {
 
	public function index(){
		$this->usuarios = new UsuariosModel();
        $usuarios = $this->usuarios->select('*')->where('estado','Activo')->findAll();
		$personas =['datos' => $usuarios];
		// $usuarios = $this->$usuarios->select('*')->where('estado','ACTIVO')->findAll();
		// $personas =['personas' => $usuarios];

		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "BuscarUsuarios";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/buscar_usuarios',$personas);
		echo view('template/footer');
	}



	public function buscarporId(){
		$usuarios = new UsuariosModel();
		$id = $this->request->getPostGet('doc');
		$usuario = $usuarios->select('usuario.id,usuario.email,usuario.documento,usuario.nombres,usuario.apellidos,
		                              usuario.departamento,usuario.direccion,usuario.telefono,usuario.genero,usuario.tipo_usuario,
									  usuario.estado,usuario.fecha_insert,departamentos.nombre')
							 ->join('departamentos', 'departamentos.id_depa=usuario.departamento')
							 ->where('usuario.id', $id)
							 ->first();
		$data=['datos' => $usuario];
		
		echo view('template/header',);
		echo view('ModuloUsuarios/detalle_usuario',$data);
		echo view('template/footer');
	}
	

	public function inactivarusuario(){
		$usuarios = new UsuariosModel();
		$doc = $this->request->getPostGet('doc');
		$datos=$usuarios->set('estado', 'Inactivo')->where('id', $doc)->update();

		if ($datos) {
			$mensaje = "OK#UPDATE";
		}else{
			$mensaje = "NO#UPDATE";
		}

		echo $mensaje;
	}


	public function totalUsuarios (){
		$usuarios = new UsuariosModel();

		$datos=$usuarios
		  //->where('estado',"ACTIVO")
		  ->from("id")
		  ->countAll();

		  echo $datos;
	}

}

