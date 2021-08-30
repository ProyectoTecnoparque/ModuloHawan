<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PuntosModel;

class Puntos extends BaseController
{
      public function index()
      {
            //echo view('Puntos/acum_puntos',$data);
            $puntolevel= new PuntosModel();
            $acumulador = $puntolevel->findAll();
            $data = ['datos' => $acumulador];
                 
            $tipo_usuario = $_SESSION['tipo_usuario'];

            if ($tipo_usuario == "Administrador") {
                  echo view('template/header');
                  echo view('ModuloPuntos/table_puntos',$data); 
                  echo view('template/footer');
            } else {
                  echo view('template/header');
                  echo view('ModuloPuntos/Lista_Puntos',$data); 
                  echo view('template/footer');
            }
      }

      public function BuscarNivel()
      {
            $puntolevel= new PuntosModel();
            $nivel = $this->request->getPostGet('nivel');


            $punto_nivel = $puntolevel->where(['id' => $nivel])->find();
            
            if ($punto_nivel) {
                  echo json_encode($punto_nivel);
            } else {
                  echo json_encode('ERROR#UPDATE');
            }
      }

      public function EditarNivel(){
            $Puntos = new PuntosModel();
            $id =$this->request->getPostGet('id_nivel');
            $name_nivel=$this->request->getPostGet('name_nivel');
            $puntos_req=$this->request->getPostGet('puntos_req'); 
            $val_puntos=$this->request->getPostGet('val_puntos');

            $data=$Puntos->set(['Nivel' => $name_nivel, 'puntos' => $puntos_req, 'valor' => $val_puntos])->where('id', $id)->update();
            if ($data) {
			echo json_encode($data);
		} else {
			echo json_encode('ERROR#UPDATE');
		}


      }
}
