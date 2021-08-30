<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistorialModel;
use App\Models\UsuariosModel;
use App\Models\PuntosModel;


class  Historial extends BaseController
{
      public function historial_expe2()
      {
            $punto_acum = new HistorialModel();
            $acumulador = $punto_acum->findAll();
            $data = ['datos' => $acumulador];

            echo view('template/header');
            echo view('ModuloHistorial/historial',$data);
            echo view('template/footer');

      }


       public function historial_expe()
      {
            $punto_acum = new HistorialModel();


            $id = $_SESSION['id'];
            $tipo_usuario = $_SESSION['tipo_usuario'];

            if ($tipo_usuario == "Administrador") {
                  $consulta['datos'] = $punto_acum
                   ->where('usuario_id',$id)
                        ->findAll();
            } else {
                  $consulta['datos'] = $punto_acum
                        ->where('usuario_id',$id)
                        ->findAll();
            }

            echo view('template/header');
            echo view('ModuloHistorial/historial', $consulta);
            echo view('template/footer');
      }
}