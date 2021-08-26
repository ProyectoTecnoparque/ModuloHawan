<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title"><b>Historial de Puntos Acumulados Usuario</b></h2>
              <div class="d-grid d-md-flex  justify-content-md-end">
              </div>
            </div>
            <div class="card-body" id="actualizar">
              <table id="historial" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>Id</th>
                  <th>Usuario</th>
                  <th>Experiencia</th>
                  <th>Valor</th>
                  <th>Fecha</th>
                  </tr>
                </thead>
                <tbody id="lista">

                  <?php foreach ($datos as $dato) : ?>
                    <tr>
                        <td><?php echo $dato['id']; ?></td>
                        <td><?php echo $dato['usuario_id']; ?></td>
                        <td><?php echo $dato['id_nivel']; ?></td>
                        <td><?php echo $dato['acum_point']; ?></td>
                        <td><?php echo $dato['fecha_insert']; ?></td>
                    </tr>
                  <?php endforeach ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content-header -->
</div>


<script>

  $(document).ready(iniciar);

  function iniciar() {
      $('#historial').DataTable({
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"},
        "responsive": true, "autoWidth": false,
         "ordering":true,
         "aoColumnDefs": [
           { 'bSortable': false, 'aTargets': [ 1 ] },
           { 'bSortable': false, 'aTargets': [ 6 ] },
           { 'bSortable': false, 'aTargets': [ 7 ] }
        ],
      });
      $('.detalle').click(verPedido);
      
    }





</script>