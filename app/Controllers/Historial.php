<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistorialModel;
use App\Models\UsuariosModel;
use App\Models\PuntosModel;
use PHPExcel_IOFactory;


      

class  Historial extends BaseController
{

   
      public function historial_expe()
      {
            $historial = new HistorialModel();
            $id = $_SESSION['id'];
            $tipo_usuario = $_SESSION['tipo_usuario'];

            if ($tipo_usuario == "Administrador") {
                  $consulta['datos'] = $historial
                        ->findAll();
            } else {
                  $consulta['datos'] = $historial
                        ->where('usuario_id', $id)
                        ->findAll();
            }

            echo view('template/header');
            echo view('ModuloHistorial/historial', $consulta);
            echo view('template/footer');
      }
      public function BuscarDatos()
      {
            $historial = new HistorialModel();
            $inicio = $this->request->getPostGet('inicio');
            $limite = $this->request->getPostGet('limite');
            
      

             $data=$historial->where('fecha_insert', $inicio )->findAll();
             // $data= $historial->where("fecha_insert BETWEEN '{$inicio}' AND '{$limite}'");

             if ($data) {
                  echo json_encode($data);
            } else {
                  echo json_encode('error no encontrado');
            }
      }
      


    
}
       

      // $datos = $this->$historial->where("fecha_insert", $inicio)->or_where("fecha_insert", $limite);

      // 
      // $limite = '2021-08-20';

      //$data=$historial->where('fecha_insert BETWEEN "'. date('Y-m-d', strtotime($inicio)). '" AND "'. date('Y-m-d', strtotime($limite)).'"');

      
      // $historial = "SELECT fecha_insert FROM point_acum WHERE acum_point LIKE '%" .
      // $data=$historial->escapeLikeString($inicio) . "%' ESCAPE '!'";


            // $data = $historial->where('fecha_insert',$fecha_inicio);
      // $data = $historial->where('fecha_insert BETWEEN',$inicio. '"AND"' .$limite.'"')->findAll();
      
      // SELECT * FROM point_acum WHERE fecha_insert >= DATE_FORMAT('2021-08-13',"%Y-%m-%d") AND  fecha_insert <= DATE_FORMAT('2021-08-30',"%Y-%m-%d")

      // $data= "SELECT * FROM point_acum WHERE  fecha_insert= '$fecha_inicio";
      // "SELECT * FROM  WHERE fecha_insert >='.DATE_FORMAT($fecha_inicio,'%Y-%m-%d').'";