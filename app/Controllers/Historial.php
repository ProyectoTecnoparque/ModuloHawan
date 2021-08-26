<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistorialModel;

class  Historial extends BaseController
{
      public function historial_expe()
      {
            $punto_acum = new HistorialModel();
            $acumulador = $punto_acum->findAll();
            $data = ['datos' => $acumulador];

            echo view('template/header');
            echo view('ModuloHistorial/historial',$data);
            echo view('template/footer');

      }
}