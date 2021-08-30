<?php
if (isset($_SESSION['tipo_usuario'])) {
   header("Location: " . base_url('Inicio'));
   die();
}
?>
<!DOCTYPE html>
<html>

<head lang="es">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>REGISTRO VENDEDOR</title>
   <link rel="icon" href="<?php echo base_url('public/dist/img/travel.png'); ?>" type="image/ico" />
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo base_url('public//plugins/fontawesome-free/css/all.min.css') ?>">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="<?php echo base_url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
   <!-- Theme style -->
<link rel="stylesheet" href="<?php echo base_url('public/dist/css/adminlte.min.css') ?>">
</head>

<body>


   <nav class="navbar navbar-light" style="background-color: #0292E4;">
      <a class="navbar-brand" href="">
         <img  class="ml-5" src="<?php echo base_url('public/dist/img/travel.png');?>" height="90" width="90" alt="" >
      </a>
   </nav>


   <div class="container py-5">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-6 mx-auto">

                  <!-- form card login -->
                  <div class="card rounded-0">
                     <div class="card-header">
                        <h3 class="mb-0">Crear Cuenta</h3>
                     </div>
                     <div class="card-body">
                        <form id="formulario_registro" enctype="multipart/form-data" method="post" autocomplete="off">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" name="documento" id="documento" placeholder="Documento de Identidad">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-address-card"></span>
                                 </div>
                              </div>
                           </div>
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre">
                              <div class="input-group-append mr-2">
                                 <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                 </div>
                              </div>

                              <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                 </div>
                              </div>
                           </div>

                           <div class="input-group mb-3">
                              <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electronico">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                 </div>
                              </div>
                           </div>

                           <div class="input-group mb-3">
                              <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-map-marker-alt"></span>
                                 </div>
                              </div>
                           </div>

                           <div class="input-group mb-3">
                              <select name="genero" id="genero" class="form-control">
                                 <option value="0">Seleccione Genero</option>
                                 <option value="Masculino">Masculino</option>
                                 <option value="Femenino">Femenino</option>
                                 <option value="Otro">Otro</option>
                              </select>
                           </div>

                           <div class="input-group mb-3">
                              <input type="number" class="form-control" id="puntos" name="puntos" placeholder="Puntos">
                              <div class="input-group-append mr-2">
                                 <div class="input-group-text">
                                 <i class="fas fa-coins"></i>
                                 </div>
                              </div>

                              <select name="departamento" id="departamento" class="form-control mr-3  ">
                                 <option value="" disabled selected>Seleccione Departamento</option>
                                    <option value="1">Risaralda</option>
                                    <option value="2">Quindio</option>
                                    <option value="3">Caldas</option>
                              </select>
                           </div>

                           <div class="input-group mb-3">
                              <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                              <div class="input-group-append mr-2">
                                 <div class="input-group-text">
                                    <span class="fas fa-unlock"></span>
                                 </div>
                              </div>

                              <input type="password" class="form-control" id="passwordconfirm" placeholder="Confirmar Contraseña">
                              <div class="input-group-append">
                                 <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                 </div>
                              </div>
                           </div>
                           <br>
                           <div class="row">
                              <div class="col-6">
                                
                              </div>
                              <!-- /.col -->
                              <div class="col-3">
                                 <a type="button" href="<?php echo base_url(); ?>" class="btn btn-secondary btn-block">Cancelar</a>
                              </div>
                              <div class="col-3">
                                 <button type="submit" id="insertar" class="btn btn-primary aling-right">Continuar</button>
                              </div>
                              <!-- /.col -->
                           </div>

                        </form>
                     </div>
                     <!--/card-block-->
                  </div>
                  <!-- /form card login -->
               </div>
            </div>
            <!--/row-->
         </div>
         <!--/col-->
      </div>
      <!--/row-->
   </div>
   <!--/container-->


   <!-- jQuery -->
   <script src="<?php echo base_url('public/plugins/jquery/jquery.min.js') ?>"></script>
   <!-- Bootstrap 4 -->
   <script src="<?php echo base_url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
   <!-- AdminLTE App -->
   <script src="<?php echo base_url('public/dist/js/adminlte.min.js') ?>"></script>

   <!-- Custument input -->
   <script src="<?php echo base_url('public/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>

   <!-- sweetalert2 -->
   <script src="<?php echo base_url('/public/plugins/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
   <script type="text/javascript">
          $(document).ready(function(){
         
             $("#formulario_registro").submit(function(event){
                event.preventDefault();
                registrarusuario();
             });
          });
             function registrarusuario(){
                documento = $('#documento').val();
                nombres = $('#nombres').val();
                apellidos = $('#apellidos').val();
                email = $('#email').val();
                password = $('#password').val();
                passwordconfirm = $('#passwordconfirm').val();
                direccion = $('#direccion').val();
                genero = $('#genero').val();
                departamento = $('#departamento').val();
                puntos = $('#puntos').val();
                

                if(documento != "" && nombres != "" && apellidos!= "" && email!= "" && password != ""   && direccion!= "" &&genero!= "" && departamento!= "" && passwordconfirm!= "" && puntos!= ""){
                  $.ajax({
                     url:'<?php echo base_url('Inicio/RegistrarUsuario')?>',
                     type: 'POST',
                     dataType:"text",
                     data:{
                        documento:documento,
                        nombres:nombres,
                        apellidos:apellidos,
                        email:email,
                        direccion:direccion,
                        genero:genero,
                        departamento:departamento,
                        puntos:puntos,
                        password:password
                     }
                  })
                  .done(function(data){
                     if (data == "FAIL#DOCUMENTO") {
                          Swal.fire({
                              icon: 'error',
                              title: 'Ya esta registrado en el sistema!',
                              text: 'El documento ingresado ya esta registrado.'
                          })
                      } else if (data == "FAIL#EMAIL") {
                          Swal.fire({
                              icon: 'error',
                              title: 'Ya esta registrado en el sistema!',
                              text: 'El correo ingresado ya esta registrado.'
                          })
                      } else if (data == "OK#CORRECT#DATA") {
                        window.location = "<?php echo base_url('Inicio/cargarVistaInicio'); ?>";

                        // Swal.fire({
                        //    title: 'Iniciar Sesión ahora?',
                        //    showDenyButton: true,
                        //    showCancelButton: true,
                        //    confirmButtonText: `Aceptar`,
                        //    }).then((result) => {
                        //    /* Read more about isConfirmed, isDenied below */
                        //    if (result.isConfirmed) {
                        //       window.location = "<?php echo base_url('Inicio/cargarVistaInicio'); ?>";
                        //    } else if (result.isDenied) {
                        //       window.location = "<?php echo base_url('Inicio/cargarVistaInicio'); ?>";
                        //    }
                        //    })
                        
                        }else if (data == "OK#CORRECT#DATA") {
                          Swal.fire({
                              icon: 'success',
                              title: 'Exitoso!',
                              text: 'Los datos del usuario han sido registrados.'
                          })
                        }else if (data == "OK#INVALID#DATA") {
                          Swal.fire({
                              icon: 'error',
                              title: 'Error!',
                              text: 'Los datos del usuario NO han sido registrados.'
                          })
                        }
                  })
                  .fail(function(data) {
                     Swal.fire({
                        icon: 'error',
                        title: 'Ocurrio algo!',
                        text: 'Ha ocurrido un error en el servidor, no se pudo registrar la información.'
                     })
                  });
                }else{
                  Swal.fire({
                     icon: 'warning',
                     title: 'Faltan datos',
                     text: 'Debes llenar todos los campos del formulario'
                  })
                }
              }
         
   </script>
   
</body>

</html>
