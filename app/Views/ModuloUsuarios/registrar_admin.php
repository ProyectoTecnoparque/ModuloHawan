<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container py-5">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-6 mx-auto">

                  <!-- form card login -->
                  <div class="card rounded-0">
                     <div class="card-header">
                        <h3 class="mb-0">Registrar Administrador</h3>
                     </div>
                     <div class="card-body">
                        <form id="formulario_admin" enctype="multipart/form-data" method="post" autocomplete="off">
                           <div class="input-group mb-4">
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

                           <div class="input-group mb-4">
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
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
          $(document).ready(function(){
         
             $("#formulario_admin").submit(function(event){
                event.preventDefault();
                registraradmin();
             });
          });
             function registraradmin(){
                documento = $('#documento').val();
                nombres = $('#nombres').val();
                apellidos = $('#apellidos').val();
                email = $('#email').val();
                password = $('#password').val();
                passwordconfirm = $('#passwordconfirm').val();
                direccion = $('#direccion').val();
                genero = $('#genero').val();
                departamento = $('#departamento').val();
               
               
                
                if(documento != "" && nombres != "" && apellidos!= "" && email!= "" && password != ""   && direccion!= "" &&genero!= "" && departamento!= "" && passwordconfirm!= ""){
                  $.ajax({
                     url:'<?php echo base_url('/ModuloUsuario/NuevoAdmin')?>',
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
                           Swal.fire({
                              text: "Se ha Registrado Correctamente el nuevo Administrado?",
                              icon: 'success',
                              confirmButtonColor: '#3085d6',
                              confirmButtonText: 'Aceptar',
                           }).then((result) => {
                              window.location = '<?php echo base_url('/ModuloUsuarios/BuscarUsuarios')?>';
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
