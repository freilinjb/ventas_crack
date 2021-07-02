<?php
    $operaciones = OperacionesController::getOperaciones(null, null);
    // print_r($estandar);
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Operaciones</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Home</a></li>
                    <li class="breadcrumb-item active">Operaciones</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-users"></i>
                            Administracion de operaciones
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <button class="btn btn-info mb-3" data-toggle="modal" data-target="#registrarOperacion">
                                <i class="fa fa-plus"></i>
                                Nuevo Operacion
                            </button>
                        </div>
                        <table id="empleados" class="table table-bordered table-striped table-hover float-left float-right">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Operacion</th>
                                    <th>creado en</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $estado = null;
                                foreach ($operaciones as $key => $value) {

                                    if ($value["estado"] == "1") {
                                        $estado = "<span class='badge badge-success'>Activo</span>";
                                    } else {
                                        $estado = "<span class='badge badge-danger'>Inactivo</span>";
                                    }


                                    echo '<tr>
                                    <td>' . ($key + 1) . '</td>
                                    <td>' . $value["Operacion"] . '</td>
                                    <td>' . $value["creado_en"] . '</td>
                                    <td>' . $estado . '</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-info btnEditarOperacion" data-toggle="modal" data-target="#editarOperacion" idOperacion="' . $value["idOperacion"] . '"><i class="fas fa-eye"></i></button>
                                            <button type="button" class="btn btn-light btnDesactivarOperacion" data-target="#editarOperacion" idOperacion="' . $value["idOperacion"] . '"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="btn btn-dark btnEliminarOperacion" data-target="#editarOperacion" idOperacion="' . $value["idOperacion"] . '"><i class="fas fa-trash"></i></button>
                                        </div>

                                    </td>
                                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>


<!-- MODAL REGISTRAR ESTANDAR-->
<div class="modal fade" id="registrarOperacion" style="display: none; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formRegistrarOperacion" method="post" enctype="multipart/form-data">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Registro de Estandar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card hovercard">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6-lg col-xl-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Operacion</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="operacion" id="operacion" placeholder="Ingrese el nombre del operacion" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6-lg col-xl-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select class="form-control select2bs4" name="estado" id="estado">
                                            <option value="" disabled selected>Seleccione el tipo de producto</option>
                                            <option value="1" >Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save changes</button>
                </div>
            </form>
            <?php
                    $estandar = new EstandarController();
                    $estandar->registrarEstandar();
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END MODAL REGISTRAR EMPLEADO-->


<!-- MODAL EDITAR PRODUCTO-->
<div class="modal fade" id="editarregistrarOperacion" style="display: none; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formEditarProducto" method="post" enctype="multipart/form-data">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Actualizar de estandar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card hovercard">
                        <div class="card-body">
                        <div class="row">
                                <div class="col-6-lg col-xl-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Tipo de producto</label>
                                        <select class="form-control select2bs4" name="idTipoProducto" id="idTipoProducto">
                                            <option value="" disabled selected>Seleccione el tipo de producto</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6-lg col-xl-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Producto</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="operacion" id="operacion" placeholder="Ingrese el nombre del operacion" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6-lg col-xl-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select class="form-control select2bs4" name="idTipoProducto" id="idTipoProducto">
                                            <option value="" disabled selected>Seleccione el tipo de producto</option>
                                            <option value="1" >Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save changes</button>
                </div>
            </form>
            <?php
                    $producto = new OperacionesController();
                    $producto->registrarOperacion();
            ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
    <?php 
        $eliminarProducto = new ProductoController();
        $eliminarProducto->eliminarProducto();
    ?>
<!-- END MODAL REGISTRAR EMPLEADO-->

<!-- SCRIPT PERSONAL -->
<script src="views/assets/js/administracionProductos.js"></script>
<!-- DataTables  & Plugins -->

<link rel="stylesheet" href="views/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="views/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="views/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<script src="views/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="views/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="views/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="views/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="views/assets/plugins/jszip/jszip.min.js"></script>
<!-- AdminLTE App -->
<script src="views/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- jquery-validation -->
<script src="views/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="views/assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- sweetalert2 -->

<script src="views/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- sweetalert2-theme-bootstrap-4 -->
<link rel="stylesheet" href="views/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<!-- SELECT -->
<link rel="stylesheet" href="views/assets/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="views/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Select2 -->
<script src="views/assets/plugins/select2/js/select2.full.min.js"></script>
<!-- dropzonejs -->
<script src="views/assets/plugins/dropzone/min/dropzone.min.js"></script>
<!-- dropzonejs -->
<link rel="stylesheet" href="views/assets/plugins/dropzone/min/dropzone.min.css">

<script>
    $(function() {
        $("#empleados").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "info": true,
            "paging": true,
            "pageLength": 7,
        });

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });
</script>