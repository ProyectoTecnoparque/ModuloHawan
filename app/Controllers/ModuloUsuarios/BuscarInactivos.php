<?php namespace App\Controllers\ModuloUsuarios;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UsuariosModel;

class BuscarInactivos extends BaseController {

	public function index(){
		$this->usuarios = new UsuariosModel();
        $usuarios = $this->usuarios->select('*')->where('estado','Inactivo')->findAll();
		 $personas =['datos' => $usuarios];
		$data['modulo_selected'] = "Usuarios";
		$data['opcion_selected'] = "BuscarInactivos";

		echo view('template/header', $data);
		echo view('ModuloUsuarios/buscar_inactivos',$personas);
		echo view('template/footer');
	}	

	public function buscarinacId(){
		$usuarios = new UsuariosModel();
		$docum = $this->request->getPostGet('docum');
		$data = $usuarios->where('documento',$docum)->find();

		if ($data) {
        echo view('template/header',);
		echo view('ModuloUsuarios/detalles_usuario',$data);
		echo view('template/footer');
		   
	   } else {
		   echo json_encode('error');
	   }
	}

	public function restaurarestado(){
		$usuarios = new UsuariosModel();
		$doc = $this->request->getPostGet('doc');
		$sql=$usuarios->set('estado', 'Activo')->where('id', $doc)->update();

		if ($sql) {
			$mensaje = "OK#UPDATE";
		}else{
			$mensaje = "NO#UPDATE";
		}
		echo $mensaje;
	}
  
}