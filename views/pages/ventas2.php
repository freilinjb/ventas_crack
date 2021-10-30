<?php
$unidad = UnidadController::getUnidad();
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Administración de Ventas</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li> -->
          <li class="breadcrumb-item active">Administración de Ventas</li>
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
              Registro de Ventas
            </h3>
            s
          </div>
          <div class="card-body">
            <div class="content-wrapper">

              <section class="content-header">

                <h1>

                  Crear venta

                </h1>

                <ol class="breadcrumb">

                  <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

                  <li class="active">Crear venta</li>

                </ol>

              </section>

              <section class="content">

                <div class="row">

                  <!--=====================================
    EL FORMULARIO
    ======================================-->

                  <div class="col-lg-5 col-xs-12">

                    <div class="box box-success">

                      <div class="box-header with-border"></div>

                      <form role="form" metohd="post">

                        <div class="box-body">

                          <div class="box">

                            <!--=====================================
              ENTRADA DEL VENDEDOR
              ======================================-->

                            <div class="form-group">

                              <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="Usuario Administrador" readonly>

                              </div>

                            </div>

                            <!--=====================================
              ENTRADA DEL VENDEDOR
              ======================================-->

                            <div class="form-group">

                              <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10002343" readonly>

                              </div>

                            </div>

                            <!--=====================================
              ENTRADA DEL CLIENTE
              ======================================-->

                            <div class="form-group">

                              <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                                <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                                  <option value="">Seleccionar cliente</option>

                                </select>

                                <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>

                              </div>

                            </div>

                            <!--=====================================
              ENTRADA PARA AGREGAR PRODUCTO
              ======================================-->

                            <div class="form-group row nuevoProducto">

                              <!-- Descripción del producto -->

                              <div class="col-xs-6" style="padding-right:0px">

                                <div class="input-group">

                                  <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></span>

                                  <input type="text" class="form-control" id="agregarProducto" name="agregarProducto" placeholder="Descripción del producto" required>

                                </div>

                              </div>

                              <!-- Cantidad del producto -->

                              <div class="col-xs-3">

                                <input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" placeholder="0" required>

                              </div>

                              <!-- Precio del producto -->

                              <div class="col-xs-3" style="padding-left:0px">

                                <div class="input-group">

                                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                                  <input type="number" min="1" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" placeholder="000000" readonly required>

                                </div>

                              </div>

                            </div>

                            <!--=====================================
              BOTÓN PARA AGREGAR PRODUCTO
              ======================================-->

                            <button type="button" class="btn btn-default hidden-lg">Agregar producto</button>

                            <hr>

                            <div class="row">

                              <!--=====================================
                ENTRADA IMPUESTOS Y TOTAL
                ======================================-->

                              <div class="col-xs-8 pull-right">

                                <table class="table">

                                  <thead>

                                    <tr>
                                      <th>Impuesto</th>
                                      <th>Total</th>
                                    </tr>

                                  </thead>

                                  <tbody>

                                    <tr>

                                      <td style="width: 50%">

                                        <div class="input-group">

                                          <input type="number" class="form-control" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>
                                          <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                        </div>

                                      </td>

                                      <td style="width: 50%">

                                        <div class="input-group">

                                          <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                                          <input type="number" min="1" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="00000" readonly required>


                                        </div>

                                      </td>

                                    </tr>

                                  </tbody>

                                </table>

                              </div>

                            </div>

                            <hr>

                            <!--=====================================
              ENTRADA MÉTODO DE PAGO
              ======================================-->

                            <div class="form-group row">

                              <div class="col-xs-6" style="padding-right:0px">

                                <div class="input-group">

                                  <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                                    <option value="">Seleccione método de pago</option>
                                    <option value="efectivo">Efectivo</option>
                                    <option value="tarjetaCredito">Tarjeta Crédito</option>
                                    <option value="tarjetaDebito">Tarjeta Débito</option>
                                  </select>

                                </div>

                              </div>

                              <div class="col-xs-6" style="padding-left:0px">

                                <div class="input-group">

                                  <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="Código transacción" required>

                                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                </div>

                              </div>

                            </div>

                            <br>

                          </div>

                        </div>

                        <div class="box-footer">

                          <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>

                        </div>

                      </form>

                    </div>

                  </div>

                  <!--=====================================
    LA TABLA DE PRODUCTOS
    ======================================-->

                  <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

                    <div class="box box-warning">

                      <div class="box-header with-border"></div>

                      <div class="box-body">

                        <table class="table table-bordered table-striped dt-responsive tablas">

                          <thead>

                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Imagen</th>
                              <th>Código</th>
                              <th>Descripcion</th>
                              <th>Stock</th>
                              <th>Acciones</th>
                            </tr>

                          </thead>

                          <tbody>

                            <tr>
                              <td>1.</td>
                              <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                              <td>00123</td>
                              <td>Lorem ipsum dolor sit amet</td>
                              <td>20</td>
                              <td>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary">Agregar</button>
                                </div>
                              </td>
                            </tr>

                          </tbody>

                        </table>

                      </div>

                    </div>


                  </div>

                </div>

              </section>

            </div>

            <!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

            <div id="modalAgregarCliente" class="modal fade" role="dialog">

              <div class="modal-dialog">

                <div class="modal-content">

                  <form role="form" method="post">

                    <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

                    <div class="modal-header" style="background:#3c8dbc; color:white">

                      <button type="button" class="close" data-dismiss="modal">&times;</button>

                      <h4 class="modal-title">Agregar cliente</h4>

                    </div>

                    <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

                    <div class="modal-body">

                      <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-user"></i></span>

                            <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Ingresar nombre" required>

                          </div>

                        </div>

                        <!-- ENTRADA PARA EL DOCUMENTO ID -->

                        <div class="form-group">

                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-key"></i></span>

                            <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>

                          </div>

                        </div>

                        <!-- ENTRADA PARA EL EMAIL -->

                        <div class="form-group">

                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                            <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

                          </div>

                        </div>

                        <!-- ENTRADA PARA EL TELÉFONO -->

                        <div class="form-group">

                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                            <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

                          </div>

                        </div>

                        <!-- ENTRADA PARA LA DIRECCIÓN -->

                        <div class="form-group">

                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                            <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

                          </div>

                        </div>

                        <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

                        <div class="form-group">

                          <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                            <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

                          </div>

                        </div>

                      </div>

                    </div>

                    <!--=====================================
      PIE DEL MODAL
      ======================================-->

                    <div class="modal-footer">

                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                      <button type="submit" class="btn btn-primary">Guardar cliente</button>

                    </div>

                  </form>

                  <?php

                  // $crearCliente = new ControladorClientes();
                  // $crearCliente->ctrCrearCliente();

                  ?>

                </div>

              </div>

            </div>


          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>


<!-- MODAL REGISTRAR unidad-->
<div class="modal fade" id="modalUnidad" style="display: none; padding-right: 17px;" aria-modal="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="formUnidad">
        <div class="modal-header bg-info">
          <h4 class="modal-title" id="tituloModal">Registro de Unidad</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card hovercard">
            <div class="card-body">
              <div class="row">
                <input type="hidden" name="idUnidad" id="idUnidad" value="0">
                <div class="col-6-lg col-xl-6 col-sm-12">
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>Nombre</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="nombre" id="nombre" value="crack2" placeholder="Ingrese el nombre" autocomplete="off">
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
<script src="views/assets/js/unidad.js"></script>
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
    $("#unidades").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "info": true,
      "paging": true,
      "pageLength": 7,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#unidades_wrapper  .col-md-6:eq(0)');
  });
</script>