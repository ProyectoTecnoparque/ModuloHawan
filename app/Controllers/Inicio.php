<?php

namespace App\Controllers;

use App\Models\UsuariosModel;
use App\Models\DepartamentosModel;
use App\Models\PuntosModel;

class Inicio extends BaseController
{

   public function index()
   {
      return view('login');
   }

   public function validarDatosIngreso()
   {
      $valor_email = $this->request->getPostGet('email');
      $valor_pass = md5($this->request->getPostGet('password'));

      $usuarios_db = new UsuariosModel();
      $registros = $usuarios_db->where(['email' => $valor_email, 'password' => $valor_pass])->find();

      if (sizeof($registros) == 0) {
         $mensaje = 'ERROR##INVALID##DATA';
      } else {
          if ($registros[0]["estado"] == "INACTIVO") {
            $mensaje = 'NOT##STATUS##OFF';
         } else {
            unset($registros[0]['password']);

            $this->session->set($registros[0]);
            $mensaje = 'OK##DATA##LOGIN';
         }
      }
      echo $mensaje;
   }


   public function cargarVistaInicio()
   {
      if ($this->session->has("tipo_usuario")) {
      
         echo view('template/header');
         echo view('ModuloUsuarios/perfil');
         echo view('template/footer');
      } else {
         return view('login');
      }
   }

   public function cerrarSession()
   {
      $this->session->destroy();
      header("Location:" . base_url());
      die();
   }

   public function Registrar()
   {
      $this->departamentos = new DepartamentosModel();
		$departamento = $this->departamentos->select('*')->findAll();
		$datos = ['datos' => $departamento];

      echo view('RegistrarUsuario',$datos);
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
               'puntos' => '100',
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
   public function NuevoAdmin()
	{
	   $documento = $this->request->getPostGet('documento');
	   $nombres = $this->request->getPostGet('nombres');
	   $apellidos = $this->request->getPostGet('apellidos');
	   $email = $this->request->getPostGet('email');
	   $password = $this->request->getPostGet('password');
	   $direccion = $this->request->getPostGet('direccion');
	   $genero = $this->request->getPostGet('genero');
	   $departamento = $this->request->getPostGet('departamento');
 
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
				'tipo_usuario' => 'Administrador',
				'puntos' => 'NULL',
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
