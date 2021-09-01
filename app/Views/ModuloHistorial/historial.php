<!-- !prueba de pull sin push -->
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title "><b>Historial de Puntos Acumulados Usuario</b></h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Main content -->
              <section class="content">
                <div class="container-fluid">
                  <h2 class="text-center display-4">Buscar</h2>
                  <div class="row">
                    <div class="col-md-8 offset-md-2">
                      <form action="#" id="buscar_info" method="POST">
                        <div class="modal-body">
                          <div class="input-group mb-2">

                            <label class=" mr-2">Fecha Inicio</label>
                            
                            <input type="date" class="form-control mr-2" id="inicio" name="inicio">

                            <label class=" mr-2">Fecha Limite</label>
                            <input type="date" class="form-control" id="limite" name="limite">

                            <button type="submit" class="btn btn-primary">
                              <span> <i class="fas fa-search mr-2"></i>Buscar</span>
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
               </section>
              <br>
              <br>


              <table id="resultado_search" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Nivel</th>
                    <th>Valor</th>
                    <th>fecha</th>
                  </tr>
                </thead>
                <tbody id="tbodyresultado">
                </tbody>
              </table>


              <table id="Historial" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th align="center">Id</th>
                    <th align="center">Usuario</th>
                    <th align="center">Nivel</th>
                    <th align="center">Valor</th>
                    <th align="center">fecha</th>
                  </tr>
                </thead>
                <tbody id="tbodyusuarios">
                  <?php foreach ($datos as $dato) { ?>
                    <tr>
                      <td ><?php echo $dato['id']; ?></td>
                      <td ><?php echo $dato['usuario_id']; ?></td>
                      <td ><?php echo $dato['id_nivel']; ?></td>
                      <td ><?php echo $dato['acum_point']; ?></td>
                      <td ><?php echo $dato['fecha_insert']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div><!-- /.content-header -->
</div>

<!-- INICIO DEL MODAL CON LOS DATOS DE LOS USUARIOS INACTIVOS -->
<div class="modal fade " id="mod_inactivos">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar Datos Usuarios</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Documento</label>
          <input type="email" class="form-control" id="documento_edit" name="documento_edit" disabled="">
        </div>
        <div class="form-group">
          <label>Estado</label>
          <select class="form-control" name="estado_edit">
            <option selected>Seleccione el nuevo estado</option>
            <option value="ACTIVO">Activo</option>
            <option value="PENDIENTE">Pendiente</option>
          </select>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar cambios</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- FIN DEL MODAL CON LOS DATOS DE LOS USUARIOS INACTIVOS
// $(document).ready(iniciar);

  // function iniciar(){ 
  //   $('#buscar_info').submit(buscar_info);
  // 
   -->

<script>
  $(document).ready(function() {
    $('#resultado_search').hide();
    $("#buscar_info").submit(function(event) {
      event.preventDefault();

      buscar_info();
    });
  });

  function buscar_info(){
    $('#Historial').hide();
    $('#resultado_search').show();
    inicio = $('#inicio').val();
    // limite = $('#limite').val();
  

    console.log(inicio, limite)

    $.ajax({
        url: '<?php echo base_url('/Historial/BuscarDatos'); ?>',
        type: 'POST',
        dataType: "json",
        data: {
          inicio: inicio
          
        }
      }).done(function(data) {
        console.log("funciona");
       if (data) {
        for (var i = 0; i < data.length; i++) {
          $("#tbodyresultado").append('<tr>'+
          '<th>'+data[i].id +'</th>'+
          '<th>'+data[i].usuario_id +'</th>'+
          '<th>'+data[i].id_nivel +'</th>'+
          '<th>'+data[i].acum_point +'</th>'+
          '<th>'+data[i].fecha_insert+'</th>'+
          '<tr>');
        }
       }else{
        $("#tbodyresultado").empty();
       }
        

      }).fail(function(data) {
        console.log("Error");
      });
  }
</script>