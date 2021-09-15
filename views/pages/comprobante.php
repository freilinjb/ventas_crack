<?php

$comprobante = ComprobanteModel::getComprobante(null, null);

$tipoComprobante = ComprobanteModel::getTipoComprobante(null, null);

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Administración de Comprobantes</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li> -->
                    <li class="breadcrumb-item active">Administración de Comprobantess</li>
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
                            <i class="fas fa-edit"></i>
                            Registro de Comprobantes
                        </h3>
                        s
                    </div>
                    <div class="card-body">
                        <div class="">
                            <button class="btn btn-info mb-3" data-toggle="modal" data-target="#modalCategoria" id="addComprobante">
                                <strong> + </strong> Comprobantes
                            </button>
                        </div>
                        <table id="comprobante" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo-Comprobante</th>
                                    <th>Sucursal</th>
                                    <!-- <th>tipo Documento</th> -->
                                    <!-- <th>Titulo</th> -->
                                    <!-- <th>fecha</th> -->
                                    <th>vencimiento</th>
                                    <th>inicio</th>
                                    <th>fin</th>
                                    <th>Secuencia</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($comprobante as $index => $value) {
                                    $estado = null;
                                    if ($value["estado"] == 'Activo') {
                                        $estado = "<span class='badge badge-primary'>" . $value["estado"] . "</span>";
                                    } else {
                                        $estado = "<span class='badge badge-danger'>" . $value["estado"] . "</span>";
                                    }
                                    echo '<tr>';
                                    echo '<td>' . ($index + 1) . '</td>';
                                    echo '<td>' . $value["comprobante"] . '</td>';
                                    echo '<td>' . $value["sucursal"] . '</td>';
                                    echo '<td>' . $value["vencimiento"] . '</td>';
                                    echo '<td>' . $value["inicio"] . '</td>';
                                    echo '<td>' . $value["final"] . '</td>';
                                    echo '<td>' . $value["secuencia"] . '</td>';
                                    echo '<td>' . $estado  . '</td>';
                                    echo '<td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-editar" data-toggle="modal" data-target="#modalCategoria" idTipoComprobante="' . $value["idTipoComprobante"] . '">Editar</button>
                                        <button type="button" class="btn btn-danger btn-eliminar"  idTipoComprobante="' . $value["idTipoComprobante"] . '">Eliminar</button>
                                    </div>
                                        </td>';
                                    echo '</tr>';
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


<!-- MODAL REGISTRAR EMPLEADO-->
<div class="modal fade" id="modalCategoria" style="display: none; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formComprobante">
                <div class="modal-header bg-info">
                    <h4 class="modal-title" id="tituloModal">Registro de Comprobantes</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card hovercard">
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="idTipoComprobante" id="idTipoComprobante" value="0">

                                <div class="col-6-lg col-xl-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Tipo Comprobante</label>
                                        <select class="form-control" name="idTipoComprobante" id="idTipoComprobante">
                                            <option value="0" disabled selected>Seleccione una opción</option>
                                            <?php foreach ($tipoComprobante as $key) {
                                                echo '<option value="' . $key['idTipoComprobante'] . '">' . $key['tipoComprobante'] . '</option>';
                                            }  ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-6-lg col-xl-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Sucursal</label>
                                        <select class="form-control" name="sucursal" id="sucursal">
                                            <option value="0" disabled selected>Seleccione una opción</option>
                                            <?php foreach ($sexo as $key) {
                                                echo '<option value="' . $key['idSucursal'] . '">' . $key['sucursal'] . '</option>';
                                            }  ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- 
                                <div class="col-6-lg col-xl-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Tipo Documento</label>
                                        <select class="form-control" name="sexo" id="sexo">
                                            <option value="0" disabled selected>Seleccione una opción</option>
                                            <?php foreach ($sexo as $key) {
                                                echo '<option value="' . $key['idSexo'] . '">' . $key['sexo'] . '</option>';
                                            }  ?>
                                        </select>
                                    </div>
                                </div> -->






                                <div class="col-6-lg col-xl-6 col-sm-12">
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <label>Vencimiento:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" name="vencimiento" id="vencimiento" value="">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-6-lg col-xl-6 col-sm-12">
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <label>inicio</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="inicio" id="inicio" value="1" placeholder="Ingrese el apellido" autocomplete="off">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>


                                <div class="col-6-lg col-xl-6 col-sm-12">
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <label>fin</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="final" id="final" value="1" placeholder="Ingrese el final" autocomplete="off">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>



                                <div class="col-6-lg col-xl-6 col-sm-12">
                                    <!-- Date dd/mm/yyyy -->
                                    <div class="form-group">
                                        <label>Secuencia</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="secuencia" id="secuencia" value="1" placeholder="Ingrese el secuencia" autocomplete="off">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>









                                <div class="col-6-lg col-xl-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select id="estado" class="form-control" name="estado" required>
                                            <option value="1" selected>Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- END MODAL REGISTRAR EMPLEADO-->

<!-- SCRIPT PERSONAL -->
<script src="views/assets/js/comprobante.js"></script>
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
<script src="views/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="views/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="views/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="views/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- jquery-validation -->
<script src="views/assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="views/assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- sweetalert2 -->

<script src="views/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- sweetalert2-theme-bootstrap-4 -->
<link rel="stylesheet" href="views/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<!-- Page specific script -->
<script>
    $(function() {
        $("#comprobante").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "info": true,
            "paging": true,
            "pageLength": 7,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        }).buttons().container().appendTo('#comprobante_wrapper  .col-md-6:eq(0)');
    });
</script>