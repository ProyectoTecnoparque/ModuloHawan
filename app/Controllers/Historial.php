<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistorialModel;
use App\Models\UsuariosModel;
use App\Models\PuntosModel;


class  Historial extends BaseController
{

      public function __construct(){ 
                  
            // Models         
              
            // Libraries         
            
          }


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
            
            // $search = $inicio;
            // $data = "SELECT * FROM point_acum WHERE fecha_insert LIKE '%" . $db->escapeLikeString($search) . "%' ESCAPE '!'";
            //  $data=$historial->where('fecha_insert', $inicio)->findAll();

             $data=$historial->where('fecha_insert', $inicio )->findAll();

             if ($data) {
                  echo json_encode($data);
            } else {
                  echo json_encode('error no encontrado');
            }
      }
      
       public function ImprimirCSV(){
            $this->excel->setActiveSheetIndex(0);         
            $this->excel->getActiveSheet()->setTitle('test worksheet');         
            $this->excel->getActiveSheet()->setCellValue('A1', 'Un poco de texto');         
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);         
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);         
            $this->excel->getActiveSheet()->mergeCells('A1:D1');           
        
            header('Content-Type: application/vnd.ms-excel');         
            header('Content-Disposition: attachment;filename="nombredelfichero.xls"');
            header('Cache-Control: max-age=0'); //no cache         
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');         
            
            // Forzamos a la descarga         
            $objWriter->save('php://output');
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

      // $data=$historial->where('fecha_insert BETWEEN',$inicio. '"AND"' .$limite.'"')->findAll();
      // $data= "SELECT '$historial' FROM point_acum WHERE  fecha_insert= '$inicio";


      // SELECT * FROM students 
      // INNER JOIN inscritos ON inscritos.id_student = students.id_students 
      // INNER JOIN pagos_estudiantes ON pagos_estudiantes.id_inscripcion =  inscritos.id 
      // WHERE CAST(pagos_estudiantes.fecha_a_pagar AS DATETIME) BETWEEN '$fecha' AND '$dato2';
            

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