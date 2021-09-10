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

                            <!-- <label class=" mr-2">Fecha Limite</label>
                            <input type="date" class="form-control" id="limite" name="limite"> -->

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

               <a href="#" id="archivo" class="btn btn-primary m-2" onClick="javascript:fnExcelReport();">Descargar Excel</a>
              <table id="resultado_search" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text_center">No. Registro</th>
                    <th class="text_center">Documento Usuario</th>
                    <th class="text_center">Puntos Sumados <i class="fas fa-arrow-up text-success"></i></th>
                    <th class="text_center">Puntos Restados <i class="fas fa-arrow-down text-danger"></i></th>
                    <th class="text_center">Nivel</th>
                    <th class="text_center">fecha</th>
                  </tr>
                </thead>
                <tbody id="tbodyresultado">
                </tbody>
              </table>

              <!-- <form action="" method="post">
                <button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Export to excel</button>
              </form> -->


              <table id="data_table" class="table table-bordered table-striped ">
                <thead>
                  <tr>
                    <th class="text_center">No. Registro</th>
                    <th class="text_center">Documento Usuario</th>
                    <th class="text_center">Puntos Sumados <i class="fas fa-arrow-up text-success"></i></th>
                    <th class="text_center">Puntos Restados <i class="fas fa-arrow-down text-danger"></i></th>
                    <th class="text_center">Nivel</th>
                    <th class="text_center">fecha</th>
                  </tr>
                </thead>
                <tbody id="tbodyusuarios" class="text-right">
                  <?php foreach ($datos as $dato) { ?>
                    <tr>
                      <td class=""><?php echo $dato['id']; ?></td>
                      <td ><?php echo $dato['documento']; ?></td>
                      <td class="text-success">+ <?php echo $dato['puntos_sum']; ?></td>
                      <td class="text-danger">- <?php echo $dato['puntos_rest']; ?></td>
                      <td ><?php echo $dato['id_nivel']; ?></td>
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



<script>
  $(document).ready(function() {
    
    $('#resultado_search').hide();
    $("#buscar_info").submit(function(event) {
      event.preventDefault();
      buscar_info();
    });
  });

  function buscar_info(){
    $('#data_table').hide();
    $("#data_table").removeAttr("id");
    $("#resultado_search").attr("id","data_table");
    $('#data_table').show();
    $('#data_table').DataTable();

    $("#archivo").html('Descargar Busqueda');

    inicio = $('#inicio').val();
    limite = $('#limite').val();

    //console.log(inicio, limite)

    $.ajax({
        url: '<?php echo base_url('/Historial/BuscarDatos'); ?>',
        type: 'POST',
        dataType: "json",
        data: {
          inicio: inicio,
          limite:limite
          
        }
      }).done(function(data) {
        console.log("funciona");
      
       if (data>0) {
        for (var i = 0; i < data.length; i++) {

          $("#tbodyresultado").append('<tr>'+
          '<th>'+data[i].id +'</th>'+
          '<th>'+data[i].documento  +'</th>'+
          '<th>'+data[i].id_nivel +'</th>'+
          '<th>'+data[i].acum_point +'</th>'+
          '<th>'+data[i].fecha_insert+'</th>'+  
          '<tr>');
          }
         
       } else {
        Swal.fire({
          text: "No se ha encontrado ningun dato",
          icon: 'error',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Aceptar',

        }).then((result) => {
          location.reload();
        })
       }
        }).fail(function(data) {
            console.log("Error");
        });
  }


</script>