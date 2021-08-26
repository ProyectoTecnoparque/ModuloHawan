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
                                    Niveles Inactivos</a>

                            </div>

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
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyusuarios">
                                    <?php foreach ($datos as $dato) { ?>
                                        <tr>
                                            <td class="doc"><?php echo $dato['id']; ?></td>
                                            <td><?php echo $dato['Nivel']; ?></td>
                                            <td><?php echo $dato['puntos']; ?></td>
                                            <td><?php echo $dato['valor']; ?></td>
                                            <th><a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarRango">Editar <i class="far fa-edit"></a></th>
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
<!-- Modal Editar datos de la tabla de niveles (Nombre,puntos Requeridos y Valor)-->
<div class="modal fade" id="editarRango" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarRangoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editarRangoLabel">Editar Datos</h5>
                <button type="button" class="btn " data-bs-dismiss="modal" >X</button>
            </div>

            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name_nivel" id="name_nivel" placeholder="Nombre del Nivel">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-certificate"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-4">

                    <input type="text" class="form-control" id="puntos_req" name="puntos_req" placeholder="Ingrese el nuevo datos">
                    <div class="input-group-append mr-2">
                        <div class="input-group-text">
                            <span> <i class="fas fa-coins"></i></span>

                        </div>
                    </div>
                    <input type="text" class="form-control" id="val_puntos" name="val_puntos" placeholder="Ingrese el nuevo datos">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-hand-holding-usd"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(iniciar);
     function iniciar(){
       
     
     }
</script>

<!-- /.container-fluid  Fin Modal-->