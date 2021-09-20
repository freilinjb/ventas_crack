<?php
$empleado = EmpleadoController::getEmpleados(null, null);
$sexo = EmpleadoController::getSexo(null, null);
$tipoUsuario = EmpleadoController::getTipoUsuario(null, null);
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Adminiscación de Cliente</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li> -->
          <li class="breadcrumb-item active">Administración de Contacto</li>
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
              Registro de Contacto
            </h3>
            s
          </div>
          <div class="card-body">
            <div class="">
              <button class="btn btn-info mb-3" data-toggle="modal" data-target="#modalContactoRegister" id="registroContacto">
                <strong> + </strong> Cliente
              </button>
            </div>
            <table id="tabla_cliente" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>

                  <th>Nombre</th>
                  <th>identificacion</th>
                  <th>Tipo Comprobante</th>
                  <th>Correo</th>
                  <th>Telefono</th>
                  <!-- <th>Dias Credito</th> -->
                  <!-- <th>Limite Credito</th> -->
                  <!-- <th>Aplica Descuento</th> -->
                  <!-- <th>Descuento</th> -->
                  <th>Provincia</th>
                  <th>Ciudad</th>
                  <th>Direccion</th>
                  <!-- <th>Observacion</th> -->
                  <th>Estado</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // foreach ($empleado as $index => $value) {
                //     $estado = null;
                //     if ($value["estado"] == 'Activo') {
                //         $estado = "<span class='badge badge-primary'>" . $value["estado"] . "</span>";
                //     } else {
                //         $estado = "<span class='badge badge-danger'>" . $value["estado"] . "</span>";
                //     }
                //     echo '<tr>';
                //     echo '<td>' . ($index + 1) . '</td>';
                //     echo '<td>' . $value["user"] . '</td>';
                //     echo '<td>' . $value["nombre"] . '</td>';
                //     echo '<td>' . $value["apellido"] . '</td>';
                //     echo '<td>' . $value["fechaNaci"] . '</td>';
                //     echo '<td>' . $value["correo"] . '</td>';
                //     echo '<td>' . $value["telefono"] . '</td>';
                //     echo '<td>' . $estado  . '</td>';
                //     echo '<td>
                //         <div class="btn-group" role="group" aria-label="Basic example">
                //         <button type="button" class="btn btn-primary btn-editar" data-toggle="modal" data-target="#modalEmployeeRegister" idEmpleado="' . $value["idEmpleado"] . '">Editar</button>
                //         <button type="button" class="btn btn-danger btn-eliminar"  idEmpleado="' . $value["idEmpleado"] . '">Eliminar</button>
                //     </div>
                //         </td>';
                //     echo '</tr>';
                // }
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
<div class="modal fade" id="modalContactoRegister" style="display: none; padding-right: 17px;" aria-modal="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="formContacto">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Register Contacto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card hovercard">
            <div class="card-body">
              <div class="row">
                <input type="hidden" name="contacto" id="contacto" value="0">


                <div class="col-12">
                  <label for="">Referencia</label>
                  <br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="esCliente" id="esCliente" value="1" <?php if ($_GET['type'] == "cliente") {
                                                                                                                echo "checked='checked'";
                                                                                                              } ?>>
                    <label class="form-check-label" for="esCliente">Cliente</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="esProveedor" id="esProveedor" value="1" <?php if ($_GET['type'] == "proveedor") {
                                                                                                                    echo "checked='checked'";
                                                                                                                  } ?>>
                    <label class="form-check-label" for="esProveedor">Proveedor</label>
                  </div>
                </div>



                <div class="col-6-lg col-xl-6 col-sm-12">
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>Nombre</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="nombre" id="nombre" value="Tobi" placeholder="Ingrese el nombre" autocomplete="off">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>







                <div class="col-6-lg col-xl-6 col-sm-12">
                  <div class="form-group">
                    <label>Tipo Identificacion</label>
                    <select class="form-control" name="tipoIdentificacion" id="tipoIdentificacion">
                      <option value="0" disabled selected>Seleccione una opción</option>
                      <?php foreach ($sexo as $key) {
                        echo '<option value="' . $key['idTipoIdentificacion'] . '">' . $key['tipoIdentificacion'] . '</option>';
                      }  ?>
                    </select>
                  </div>
                </div>

                <div class="col-6-lg col-xl-6 col-sm-12">
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>identificacion</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="identificacion" id="identificacion" value="123213123" placeholder="Ingrese  la identificacion" autocomplete="off">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>


                <div class="col-6-lg col-xl-6 col-sm-12">
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>Razon Social</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="razonSocial" id="razonSocial" value="sdsdf" placeholder="Ingrese  la Razon Social" autocomplete="off">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>


                <div class="col-6-lg col-xl-6 col-sm-12">
                  <div class="form-group">
                    <label>Tipo Comprobante</label>
                    <select class="form-control" name="tipoComprobante" id="tipoComprobante">
                      <option value="0" disabled selected>Seleccione una opción</option>
                      <?php foreach ($sexo as $key) {
                        echo '<option value="' . $key['idTipoComprobante'] . '">' . $key['tipoComprobante'] . '</option>';
                      }  ?>
                    </select>
                  </div>
                </div>

                <div class="col-6-lg col-xl-6 col-sm-12">
                  <div class="form-group">
                    <label>Vendedor</label>
                    <select class="form-control" name="empleado" id="empleado">
                      <option value="0" disabled selected>Seleccione una opción</option>
                      <?php foreach ($sexo as $key) {
                        echo '<option value="' . $key['idEmpleado'] . '">' . $key['empleado'] . '</option>';
                      }  ?>
                    </select>
                  </div>
                </div>



                <div class="col-6-lg col-xl-6 col-sm-12">
                  <div class="form-group">
                    <label>Correo</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                      </div>
                      <input type="email" class="form-control" name="correo" id="correo" value="fras@fsd.com" autocomplete="off">
                    </div>
                  </div>
                </div>


                <div class="col-6-lg col-xl-6 col-sm-12">
                  <div class="form-group">
                    <label>Telefono</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" class="form-control" name="telefono" id="telefono" value="849-565-2312" autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="col-6-lg col-xl-6 col-sm-12">
                  <div class="form-group">
                    <label>Celular</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" class="form-control" name="celular" id="celular" value="849-565-2312" autocomplete="off">
                    </div>
                  </div>
                </div>





                <div class="col-6-lg col-xl-6 col-sm-12">
                  <div class="form-group">
                    <label>provincia</label>
                    <select class="form-control" name="provincia" id="provincia">
                      <option value="0" disabled selected>Seleccione una opción</option>
                      <?php foreach ($sexo as $key) {
                        echo '<option value="' . $key['idProvincia'] . '">' . $key['provincia'] . '</option>';
                      }  ?>
                    </select>
                  </div>
                </div>

                <div class="col-6-lg col-xl-6 col-sm-12">
                  <div class="form-group">
                    <label>Ciudad</label>
                    <select class="form-control" name="ciudad" id="ciudad">
                      <option value="0" disabled selected>Seleccione una opción</option>
                      <?php foreach ($sexo as $key) {
                        echo '<option value="' . $key['idCiudad'] . '">' . $key['ciudad'] . '</option>';
                      }  ?>
                    </select>
                  </div>
                </div>

                <div class="col-sm-12">
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>Direccion</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="direccion" id="direccion" value="Muchs coass de IT" placeholder="Ingrese la Direccion" autocomplete="off">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group">
                    <label>observacion</label>
                    <div class="input-group mb-3">
                      <textarea name="observacion" id="observacion" class="form-control" value="es responsable con tu pedidos" placeholder="Ingrese una Observacion" cols="30" rows="2"></textarea>
                    </div>
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
<script src="views/assets/js/cliente.js"></script>
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
    $("#empleados").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "info": true,
      "paging": true,
      "pageLength": 7,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#empleados_wrapper  .col-md-6:eq(0)');
  });
</script>