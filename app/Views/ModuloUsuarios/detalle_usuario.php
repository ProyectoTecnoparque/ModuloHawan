<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detalles Perfil Usuario</h3>
            </div>
            <section class="content">
                <div class="card-body">
                  <div class="row">

                    <div class="col-8 col-md-8 col-lg-3 order-2 order-md-1">
                      <div class="m-4">
                        <img src="<?php echo base_url("public/dist/img/avatar.png");?>" class="rounded float-start ml-4" alt="..." width="200" height="200">
                      </div>
                    </div>

                    <div class="col-12 col-md-10 col-lg-8 order-1 order-md-4">
                      <h3 class="text-info"><i class="fas fa-address-book mr-4"></i><b>Datos Usuario</b></h3>
                      <div class="text-muted">
                        
                          <div class="card-body">
                            <dl class="row">

                              <dt class="col-sm-3">Documento :</dt>
                              <dd class="col-sm-9"><?php echo $datos['documento'] ?></dd>
                              <dt class="col-sm-3">Nombre Completo : </dt>
                              <dd class="col-sm-8"><?php echo $datos['nombres'] . '  ' . $datos['apellidos']; ?></dd>
                              <dt class="col-sm-3">Tipo de usuario :</dt>
                              <dd class="col-sm-9"><?php echo $datos['tipo_usuario'] ?></dd>
                              <dt class="col-sm-3">Genero</dt>
                              <dd class="col-sm-9"><?php echo $datos['genero'] ?></dd>
                              <dt class="col-sm-3">Email :</dt>
                              <dd class="col-sm-9"><?php echo $datos['email'] ?></dd> 
                              <dt class="col-sm-3">Fecha de registro :</dt>
                              <dd class="col-sm-9"><?php echo $datos['fecha_insert'] ?></dd>
                              <dt class="col-sm-3">Direccion :</dt>
                              <dd class="col-sm-9"><?php echo $datos['direccion'] ?></dd>
                              <dt class="col-sm-3">Departamento :</dt>
                              <dd class="col-sm-9"><?php echo $datos['nombre'] ?></dd>
                              <dt class="col-sm-3">Estado :</dt>
                              <dd class="col-sm-9"><?php echo $datos['estado'] ?></dd>
                              <dt class="col-sm-3">Puntos Acumuldos :</dt>

                              <select  id="tipo_ingreso" class="col-sm-3 mr-2 form-control" name="tipo_ingreso" >
                                <option value="">Tipo de modificaci??n</option>
                                <option value="sum">Sumar Puntos</option>
                                <option value="res">Restar Puntos</option>
                              </select>
                              <input id="puntos2"  class="col-sm-2 form-control" value="">

                              <input id="puntos" disabled class="col-sm-2 form-control" value="<?php echo $datos['puntos_rest'] ?>" >
                              <input type="hidden" id="id" class="col-sm-2" value="<?php echo $datos['id'] ?>" >
                              <a type='submit' id="edit_point" class="btn btn-success text-light ml-2 habilitar" >Editar Puntos</a>
                            </dl>
                          </div>
                          <a href="<?php echo base_url('/ModuloUsuarios/BuscarUsuarios') ?>" class="btn  btn-info col-2 mt-4 mb-4 ml-4"><i class="mr-2 fas fa-arrow-circle-left"></i>Regresar</a>
                      </div>
                    </div>
                  </div>
                </div>
              <!-- /.card -->
            </section>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div><!-- /.content-header -->
    </div>
  </div>
</div>
<script>
$(document).ready(iniciar);

function iniciar() {
  $('#edit_point').on('click', editar_puntos);
  $('#tipo_ingreso').hide();
  $('#puntos2').hide();
}

function editar_puntos(){
  $('#puntos').hide('');
  $('#puntos2').show();
  
  $("#edit_point").removeAttr("id");
  $(".habilitar").attr("id","guardar");
  $("#guardar").html('Guardar Cambios');
  $('#tipo_ingreso').show();

  $('#guardar').click( Guardar_puntos);
  
}
function Guardar_puntos(){

  tipo_ingreso = $('#tipo_ingreso').val();


  console.log(tipo_ingreso)  
if (tipo_ingreso=="sum") {

    sum_puntos =$('#puntos2').val();
    id_sum =$('#id').val();
  $.ajax({
        url: '<?php echo base_url('/ModuloUsuarios/EditarPuntossum'); ?>',
        type: 'POST',
        dataType: "json",
        data: {
          sum_puntos : sum_puntos ,
          id_sum: id_sum
        }

      }).done(function(data) {
    
          Swal.fire({
            text: "Se ha modificado los datos del Usuario",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',

          }).then((result) => {
             location.reload();
          })  
  
        }).fail(function(data) {
            console.log(data);
            Swal.fire({
            text: "Se ha modificado los datos del Usuario",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
          }).then((result) => {
             location.reload();
          })  
        });
  
  
} else if(tipo_ingreso=="res") { 
  
  res_puntos =$('#puntos2').val();
  id_res =$('#id').val();
  
  $.ajax({
        url: '<?php echo base_url('/ModuloUsuarios/EditarPuntosres'); ?>',
        type: 'POST',
        dataType: "json",
        data: {
          res_puntos : res_puntos,
          id_res: id_res
        }

      }).done(function(data) {
    
          Swal.fire({
            text: "Se ha modificado los datos del Usuario",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',

          }).then((result) => {
             location.reload();
          })  
  
        }).fail(function(data) {
            console.log(data);
            Swal.fire({
            text: "Se ha modificado los datos del Usuario",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Aceptar',
          }).then((result) => {
             location.reload();
          })  
      });
  }
}


</script>