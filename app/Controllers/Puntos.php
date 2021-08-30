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

            echo view('template/header');
            echo view('ModuloPuntos/table_puntos',$data); 
            echo view('template/footer');
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
}
