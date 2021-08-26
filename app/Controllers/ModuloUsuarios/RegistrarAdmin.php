<?php

namespace App\Controllers;

use App\Models\UsuariosModel;


class RegistrarAdmin extends BaseController
{
   public function index()
   {
    echo view('template/header');
    echo view('ModuloUsuarios/registrar_admin');
    echo view('template/footer')
   }

  

   public function Registrar()
   {
      echo view('RegistrarUsuario');
   }

   public function RegistrarUsuario()
   {

      $documento = $this->request->getPostGet('documento');
      $nombres = $this->request->getPostGet('nombres');
      $apellidos = $this->request->getPostGet('apellidos');
      $email = $this->request->getPostGet('email');
      $password = $this->request->getPostGet('password');
      $direccion = $this->request->getPostGet('direccion');
      $genero = $this->request->getPostGet('genero');
      $departamento = $this->request->getPostGet('departamento');
      $puntos =$this->request->getPostGet('puntos');
   

      // Verificar que el documento no este previamente registrado
      $usuario = new UsuariosModel();
      $consulta = $usuario->where(['documento' => $documento])->find();
      if (sizeof($consulta) > 0) {
         $mensaje = "FAIL#DOCUMENTO";
      } else {
            // Verificar que el correo no se encuentre en la bd
         $consulta = $usuario->where(['email' => $email])->find();

         if (sizeof($consulta) > 0) {
            $mensaje = "FAIL#EMAIL";
         } else {
            $registros = $usuario->save([
               'documento' => $documento,
               'nombres' => $nombres,
               'apellidos' => $apellidos,
               'email' => $email,
               'password' => md5($password),
               'direccion' => $direccion,
               'genero' => $genero,
               'departamento' => $departamento,
               'estado' => 'Activo',
               'tipo_usuario' => 'Usuario',
               'puntos' => $puntos,
               // Administrador
            ]);
            if ($registros) {
            

               $mensaje = "OK#CORRECT#DATA";
            } else {
               $mensaje = "OK#INVALID#DATA";
            }
         }
      }
      echo $mensaje;
   }
}
