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
                      <form >
                        <div class="input-group">
                          <input type="search" class="form-control form-control-lg" placeholder="Ingrese el usuario o fecha de busqueda">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default">
                              <i class="fa fa-search"></i>
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
              <table id="usuarios_inactivos" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Nivel</th>
                    <th>Valor</th>
                    <th>fecha</th>
                  </tr>
                </thead>
                <tbody id="tbodyusuarios">
                  <?php foreach ($datos as $dato) { ?>
                    <tr>
                      <td><?php echo $dato['id']; ?></td>
                      <td><?php echo $dato['usuario_id']; ?></td>
                      <td><?php echo $dato['id_nivel']; ?></td>
                      <td><?php echo $dato['acum_point']; ?></td>
                      <td><?php echo $dato['fecha_insert']; ?></td>
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
<!-- FIN DEL MODAL CON LOS DATOS DE LOS USUARIOS INACTIVOS -->


<script>
  $(document).ready(iniciar);

  function iniciar() {
    $('#usuarios_inactivos').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
      },
      "responsive": true,
      "autoWidth": false,
      "ordering": true,
      "aoColumnDefs": [{
          'bSortable': false,
          'aTargets': [1]
        },
        {
          'bSortable': false,
          'aTargets': [6]
        },
        {
          'bSortable': false,
          'aTargets': [7]
        }
      ],
    });
    $(".mod_edit").click(buscarinacId);
    $(".activar").click(restaurarestado);
  }


  function buscarinacId() {
    var docum = $(this).parents("tr").find(".doc_in").text();
    $('#mod_inactivos').modal();


    $.ajax({
        url: '<?php echo base_url('/ModuloUsuarios/BuscarInacId'); ?>',
        type: 'POST',
        dataType: "json",
        data: {
          docum: docum
        }

      }).done(function(data) {
        console.log(data);
        for (var i = 0; i < data.length; i++) {
          $('#documento_edit').val(data[i].documento);
          $('#estado_edit').val(data[i].estado);
        }
      })
      .fail(function() {
        console.log("error");
      });

  }

  function restaurarestado() {

    var doc = $(this).parents("tr").find(".doc_in").text();
    $.ajax({
      url: '<?php echo base_url('/ModuloUsuarios/RestaurarUsuario'); ?>',
      type: 'POST',
      dataType: "text",
      data: {
        doc: doc
      },

    }).done(function(data) {
      if (data == "OK#UPDATE") {
        Swal.fire({
          text: "Se ha modificado el estado del Usuario",
          icon: 'success',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Aceptar',

        }).then((result) => {

          window.location = '<?php echo base_url('/ModuloUsuarios/BuscarUsuarios'); ?>';
        })
      } else {
        alert('no funciona');
      }
    }).fail(function() {
      alert("error al enviar ");
    });
  }
</script>