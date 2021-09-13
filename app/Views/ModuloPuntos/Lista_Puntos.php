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
                            <h2 class="card-title"><b>Lista de  Niveles y Valores</b></h2>
                            

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tabla_puntos" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Nivel</th>
                                        <th>Puntos Requeridos</th>
                                        <th>Valor</th>
                                      
                                    </tr>
                                </thead>
                                <tbody id="tbodyusuarios">
                                    <?php foreach ($datos as $dato) { ?>
                                        <tr>
                                            <td class="nivel"><?php echo $dato['id']; ?></td>
                                            <td class="text-center"><?php echo $dato['Nivel']; ?></td>
                                            <td class="text-center"><?php echo $dato['puntos']; ?></td>
                                            <td class="text-center"><?php echo $dato['valor']; ?></td>
                                            
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
      $(document).ready(function(){  
        $('#tabla_puntos').DataTable({
            "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
      },
        "responsive": true,
        "autoWidth": false,
        "ordering": true,
        "aoColumnDefs": [{
            'bSortable': false,
            'aTargets': [4]
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
    });
</script>

