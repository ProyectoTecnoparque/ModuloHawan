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
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nivel</th>
                                        <th>Puntos Requeridos</th>
                                        <th>Valor</th>
                                      
                                    </tr>
                                </thead>
                                <tbody id="tbodyusuarios">
                                    <?php foreach ($datos as $dato) { ?>
                                        <tr>
                                            <td class="nivel"><?php echo $dato['id']; ?></td>
                                            <td><?php echo $dato['Nivel']; ?></td>
                                            <td><?php echo $dato['puntos']; ?></td>
                                            <td><?php echo $dato['valor']; ?></td>
                                            
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

