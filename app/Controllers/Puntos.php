<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PuntosModel;

class Puntos extends BaseController
{
      public function index()
      {
            //echo view('Puntos/acum_puntos',$data);
            $punto_acum = new PuntosModel();
            $acumulador = $punto_acum->findAll();
            $data = ['datos' => $acumulador];

            echo view('template/header');
            echo view('ModuloPuntos/table_puntos',$data); 
            echo view('template/footer');
      }

      public function BuscarNivel()
      {
      $punto_acum = new PuntosModel();
      $id = $this->request->getPostGet('doc');

      $punto_nivel = $punto_acum->where(['id' => $id])->find();

      $data=['datos' => $punto_nivel];
		
		echo view('template/header',);
		echo view('',$data);
		echo view('template/footer');



      }
}
