<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistorialModel;
use App\Models\UsuariosModel;
use App\Models\PuntosModel;


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
            // $inicio = '2021-08-13';
            // $limite = $this->request->getPost('limite');
            // $fecha_inicio = date('Y-m-d', strtotime($inicio));
            // echo $fecha_inicio;



            $data=$historial->select()->where('fecha_insert', $inicio)->findAll();
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

            
             if ($data) {
                  echo json_encode($data);
            } else {
                  echo json_encode('error no encontrado');
            }
      }


      //    public function BuscarDatos()
      // {
      //       $usuarios = new HistorialModel();
      //       $id_perfil = $this->request->getPostGet('inicio');
      //       $data = $usuarios
      //             ->where('usuario_id', $id_perfil)
      //             ->findAll();
      //       if ($data) {
      //             echo json_encode($data);
      //       } else {
      //             echo json_encode('error no encontrado');
      //       }
      // }
}
