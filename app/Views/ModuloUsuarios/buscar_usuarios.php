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
              <h2 class="card-title"><b>Lista de Usuarios Activos</b></h2>
              <div class="d-grid d-md-flex  justify-content-md-end">
                <a href="<?php echo base_url('/ModuloUsuarios/BuscarInactivos') ?>" class="btn  bg-danger mr-4">
                  <i class="fas fa-user-lock"></i>
                  Usuarios Inactivos</a>
               
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="usuarios_activos" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Documento</th>
                    <th>Nombre </th>
                    <th>Tipo Usuario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="tbodyusuarios">
                  <?php foreach ($datos as $dato) { ?>
                    <tr>
                      <td class="doc"><?php echo $dato['id']; ?></td>
                      <td><?php echo $dato['email']; ?></td>
                      <td><?php echo $dato['documento']; ?></td>
                      <td><?php echo $dato['nombres'] . ' ' . $dato['apellidos']; ?></td>
                      <td><?php echo $dato['tipo_usuario']; ?></td>
                      <td><span class="btn bg-success"><?php echo $dato['estado']; ?></span></td>
                      <td><a type="button" class="btn btn-primary mr-2 modal_edit" href="<?php echo base_url('/ModuloUsuarios/BuscarPenId?doc=') . $dato['id']; ?>"><i class="far fa-eye"></i></a><a class="btn btn-danger toastrDefaultSuccess"><i class="fas fa-user-lock"></i></a></td>
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


<!--INICIO PARA  MOSTRAR LOS DATOS DEL USUARIO ACTIVO -->
<!-- <div class="modal fade " id="mod_editar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header ">
        <h4 class="modal-title "><b>Datos Nuevo Usuario</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group row md-2">
          <div class="form-group col-6">
            <label for="exampleInputEmail1">Documento</label>
            <input type="text" class="form-control" id="documento_us" name="documento_us" disabled>
          </div>
          <div class="form-group col-6">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email_us" name="email_us" disabled>
          </div>
        </div>
        <div class="form-group">
          <label>Estado</label>
          <input type="text" class="form-control" id="estado_us" name="estado_us" disabled>

          </select>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary admitir" data-dismiss="modal">Guardar cambios</button>
      </div>
    </div>
   
  </div>

</div> -->
<!-- FIN DE MODAL PARA MOSTRAR LOS DATOS DEL USUARIO ACTIVO -->

<script>
  $(document).ready(iniciar);

  function iniciar() {
    $('#usuarios_activos').DataTable({
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
    $(".modal_edit").click(buscarpenId);
  }


  function actualizarpen() {
    var doc = $('#documento').val();
    var new_estado = $('#nuevo_estado').val();

    $.ajax({
      url: '<?php echo base_url('/ModuloUsuarios/ActualizarPen'); ?>',
      type: 'POST',
      dataType: "text",
      data: {
        doc: doc,
        new_estado: new_estado
      },
    }).done(function(data) {

      if (data == "USUARIO#ACTUALIZADO") {

        Swal.fire({
          text: "Se ha modificado el estado del Usuario",
          icon: 'success',
          confirmButtonColor: '#23F672',
          confirmButtonText: 'Aceptar',

        }).then((result) => {

          window.location = '<?php echo base_url('/ModuloUsuarios/BuscarPendientes'); ?>';
        })

      } else {
        alert('no funciona');
      }
    }).fail(function() {
      alert("error al enviar ");
    });
  }
</script>