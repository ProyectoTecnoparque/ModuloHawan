<?php
if (isset($_SESSION['tipo_usuario'])) {
   header("Location: " . base_url('Inicio'));
   die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Inicio Sesión</title>
   <link rel="icon" href="<?php echo base_url('public/dist/img/travel.png'); ?>" type="image/ico" />

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo base_url('public/plugins/fontawesome-free/css/all.min.css'); ?>">
   <!-- icheck bootstrap -->
   <link rel="stylesheet" href="<?php echo base_url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
   <!-- Theme style -->
   <link rel="stylesheet" href="<?php echo base_url('public/dist/css/adminlte.min.css'); ?>">

   <style type="text/css">
   body {
      background-image: url(https://img2.viajar.elperiodico.com/63/c0/c5/eje-cafetero-colombiano.jpg);
      background-repeat: no-repeat;
      background-size: cover;
   }
   </style>
</head>

<body class="hold-transition login-page">
   <div class="login-box">
      <div class="card">
         <div class="card-body login-card-body">

            <img class="ml-5 mb-4" src="<?php echo base_url('public/dist/img/TRAVELL.png'); ?>" alt="" width='200' heigh='200'>
            <p class="login-box-msg">INICIAR SESION</p>

            <form id="formulario_ingreso" action="#" method="post" autocomplete="off">
               <div class="input-group mb-3">
                  <input id="campo_email" type="email" class="form-control" placeholder="Correo Electronico" required autofocus>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input id="campo_password" type="password" class="form-control" placeholder="Contraseña" required>
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <!-- /.col -->
                  <div class="col-12">
                     <button type="submit" class="btn btn-primary btn-block col-4 float-right">INICIAR</button>
                  </div>
                  <!-- /.col -->
               </div>
            </form>
            <!-- /.social-auth-links -->

            <p class="mb-1">
               <a href="#">He olvidado mi contraseña</a>
            </p>
            <p class="mb-0">
               <a href="<?php echo base_url('Registrar') ?>" class="text-center">Deseo registrarme!</a>
            </p>
         </div>
         <!-- /.login-card-body -->
      </div>
   </div>
   <!-- /.login-box -->

   <!-- jQuery -->
   <script src="<?php echo base_url('public/plugins/jquery/jquery.min.js'); ?>"></script>
   <!-- Bootstrap 4 -->
   <script src="<?php echo base_url('public/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
   <!-- AdminLTE App -->
   <script src="<?php echo base_url('public/dist/js/adminlte.min.js'); ?>"></script>
   <!-- sweetalert2 -->
   <script src="<?php echo base_url('/public/plugins/sweetalert2/sweetalert2.all.min.js'); ?>"></script>

   <script type="text/javascript">
   $(document).ready(function() {
      $("#formulario_ingreso").submit(function(event) {
         event.preventDefault();
         validarDatosIngreso();
      });
   });

   function validarDatosIngreso() {
      valor_email = $("#campo_email").val();
      valor_pass = $("#campo_password").val();

      if (valor_email != "" && valor_pass != "") {

         $.ajax({
            url: "<?php echo base_url('Inicio/validarDatosIngreso') ?>",
            type: 'POST',
            dataType: 'text',
            data: {
               email: valor_email,
               password: valor_pass
            },
         })
         .done(function(data) {

            if (data == "OK##DATA##LOGIN") {
               window.location = "<?php echo base_url('Inicio'); ?>";
            } else if (data == "NOT##STATUS##OFF") {
               $("#campo_password").val("");
               Swal.fire({
                  icon: 'error',
                  title: 'Has sido inactivado del sistema!',
                  text: 'Tu usuario ahora mismo se encuentra inactivo en el sistema, no podrás ingresar.',
                  footer: 'Si fue un error, puedes enviar un mensaje al correo:<i class="text-success">hawah@gmail.com</i>'
               })
            } else {
               $("#campo_password").val("");
               Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'No se pudo encontrar el usuario',
                  footer: '<a href="<?php echo base_url('Registrar'); ?>">Todavia no tienes una cuenta? Registrate!.</a>'
               })
            }
         })
         .fail(function(data) {
            console.log("error");
            console.log(data);
         });

      } else {
         Swal.fire({
            icon: 'warning',
            title: 'Campos vacios!',
            text: 'Debes llenar todos los campos.'
         })
      }
   }
   </script>

</body>

</html>
