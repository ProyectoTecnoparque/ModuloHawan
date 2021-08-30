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
            $limite = $this->request->getPostGet('limite');

            // $datos=$historial->select()->where('fecha', $clave)->countAll('acum_point');
            // $datos = $this->$historial->where("fecha_insert", $inicio)->or_where("fecha_insert", $limite);

            // $inicio = '2021-08-13';
            // $limite = '2021-08-20';

            $data = $historial->where('fecha_insert',$inicio. '"AND"' .$limite.'"');
            
            if ($data) {
                  $mensaje = "OK#SEARCH";
            } else {
                  $mensaje = "ERROR#SEARCH";
            }

            echo $mensaje;
      }
}
