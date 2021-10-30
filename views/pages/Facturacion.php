<?php

$comprobante = ComprobanteModel::getComprobante(null, null);
$idTipoComprobante = ContactoController::getIdTipoComprobante(null, null);

$tipoComprobante = ComprobanteModel::getTipoComprobante(null, null);
$producto = ProductoController::getProducto(null, null);

?>




<!-- Content Wrapper. Contains page content -->
<!-- <div class="content-wrapper"> -->
<!-- Content Header (Page header) -->

<section class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card card-info card-outline">
          <div class="card-header">
            <h4>
              <i class="fas fa-globe"></i> Ventas Crack, Inc.
              <!-- <small class="float-right">Date: 2/10/2014</small> -->
            </h4>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">

          <!-- <div class="col-sm-2 invoice-col">
                From
                <address>
                  <strong>Admin, Inc.</strong><br>
                  795 Folsom Ave, Suite 600<br>
                  San Francisco, CA 94107<br>
                  Phone: (804) 123-5432<br>
                  Email: info@almasaeedstudio.com
                </address>
              </div> -->


          <div class="col-sm-6 invoice-col">

            <div class="card hovercard">
              <div class="card-body">
                <!-- <div class="box-body"> -->
                <form role="form" method="POST">
                  <!-- <div class="box"> -->
                  <!-- ====================

                            ================= -->

                  <!-- ====================

                            ================= -->

                  <!--=====================================
                            ENTRADA DEL VENDEDOR
                        ======================================-->


                  <div class="row">

                    <div class="col-6-lg col-xl-6 col-sm-12">

                      <div class="form-group">

                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                          <!-- <span class="input-group-addon"><i class="fa fa-user"></i></span> -->

                          <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION["nombre"] ?>" readonly>

                        </div>

                      </div>
                    </div>


                    <!--=====================================
                            ENTRADA DEL VENDEDOR
                            ======================================-->

                    <div class="col-6-lg col-xl-6 col-sm-12">

                      <div class="form-group">

                        <div class="input-group">


                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                          </div>

                          <?php
                          // $iten = null;
                          // $valor = null;


                          // $ventas = VentasController::getVentas($Item, $valor);
                          // if (!$ventas) {

                          //   echo '  <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10002343" readonly>';
                          // }

                          ?>
                          <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10002343" readonly>




                        </div>

                      </div>
                    </div>









                    <div class="col-6-lg col-xl-6 col-sm-12">
                      <div class="form-group">
                        <!-- <label>Tipo Comprobante</label> -->
                        <select class="form-control" name="idTipoComprobante" id="idTipoComprobante">
                          <option value="0" disabled selected>Seleccione Tipo Comprobante</option>
                          <?php
                          foreach ($tipoComprobante as $key) {
                            echo '<option value="' . $key['idTipoComprobante'] . '">' . $key['tipoComprobante'] . '</option>';
                          }

                          ?>
                        </select>
                      </div>
                    </div>



                    <div class="col-6-lg col-xl-6 col-sm-12">
                      <div class="form-group">
                        <!-- <label for="estado">Estado</label> -->
                        <select id="tipoVenta" class="form-control" name="tipoVenta" required>
                          <option value="0" disabled selected>Seleccione Tipo Venta</option>

                          <option value="contado">Contado</option>
                          <option value="credito">Credito</option>
                          <option value="compuesto">Compuesto</option>
                        </select>
                      </div>
                    </div>

                  </div>


                  <div class="col-6-lg col-xl-6 col-sm-12">
                    <div class="form-group">

                      <div class="input-group">


                        <select class="form-control" name="ciudad" id="ciudad">
                          <option value='' disabled selected>Seleccione el Cliente</option>
                          <?php
                          $cliente = ConsultasController::getDatos('contacto', 'esCliente', true);

                          foreach ($cliente as $index => $key) {
                            echo "<option value='" . $key['idContacto'] . "'>" . $key['nombre'] . "</option>";
                          }
                          ?>
                        </select>


                        <span class="input-group-addon"> <button class="btn btn-info mb-3" data-toggle="modal" data-target="#modalContactoRegister" id="registroContacto">
                            <i class="icon-database-add"></i> Agregar Nuevo <?php echo $titulo ?>
                            <!-- <strong> + </strong> Nuevo -->
                          </button></span>




                      </div>

                    </div>
                    <!-- </div> -->

                    <!-- <div class="col-6-lg col-xl-6 col-sm-12">
                    
                      <div class="form-group">
                    
                        <div class="input-group">
                          <input type="text" class="form-control" name="inicio" id="inicio" value="1" placeholder="Ingrese el apellido" autocomplete="off">
                        </div>
                      
                      </div>
                    </div> -->


                    <!-- </div> -->




                </form>
              </div>
            </div>

          </div>
        </div>

        <!-- =================
                 Tabla De productos
                 ===================                -->

        <div class="col-sm-6 invoice-col">
          <div class="card-body table-responsive p-0" style="height: 200px;">


            <table id="producto" class="table table-head-fixed table-hover text-nowrap tablaVentas">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Descripcion</th>
                  <!-- <th>cantidad</th> -->
                  <!-- <th>descripcion</th> -->
                  <!-- <th>Precio Compra</th> -->
                  <th>Precio </th>
                  <th>stock</th>
                  <th>Acccion</th>


                  <!-- <th>Telefono</th>
                                    <th>Estado</th>
                                    <th>Acción</th> -->
                </tr>
              </thead>










              <!-- 
              <tbody id="bodyProductos">


                <tr>
                  <th>Condigo</th>
                  <th>D</th>
                  <th>Estado</th>
                  <th>Nombre</th>
                  <th>treu</th>
                  <th>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary">
                        Agregar</button>
                    </div>
                  </th>
                </tr>
              </tbody> -->
            </table>



          </div>
        </div>
        <!-- /.col -->

        <!-- /.col -->






















        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="card-body table-responsive p-0" style="height: 300px;">

          <!-- <div class="col-12 table-responsive"> -->
          <!-- <table class="table table-striped"> -->
          <table class="table table-head-fixed text-nowrap">

            <thead>
              <tr scope="row">
                <th scope=" col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Itbis</th>
                <th scope="col">Importe</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody id="bodyProductos">
              <tr>
                <th>

                  <div class="col-xs-6" style="padding-right:0px">

                    <div class="input-group">

                      <input type="text" class="form-control" id="agregarProducto" name="agregarProducto" placeholder="Descripción del producto" required>

                    </div>

                  </div>
                </th>
                <th>


                  <div class="col-6-lg col-xl-6 col-sm-12">

                    <input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" placeholder="0" required>

                  </div>

                </th>
                <th>

                  <div class="col-xs-3" style="padding-left:0px">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                      <input type="number" min="1" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" placeholder="20000" readonly required>

                    </div>

                  </div>
                </th>
                <th>Nombre</th>
                <th>treu</th>
                <th>
                  <div class="btn-group">

                    <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xm"><i class="fa fa-times"></i></button></span>
                  </div>
                </th>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
          <p class="lead">Payment Methods:</p>
          <!-- <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

          <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
            plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p>
        </div>
        <!-- /.col -->
        <div class="col-6">

          <p class="lead">Amount Due 2/22/2014</p>


          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Productos:</th>

                <!-- <td>$250.30</td> -->
                <td id="totalCantidad" align="center" colspan="2">0</td>

              </tr>
              <tr>
                <th style="width:50%">Subtotal:</th>
                <!-- <td>$250.30</td> -->
                <td id="subTotal" align="center" colspan="2">0</td>

              </tr>
              <tr>
                <th>Itbis 18%</th>
                <!-- <td>$10.34</td> -->
                <td id="totalItbis" align="center" colspan="2">0</td>

              </tr>

              <th>Total:</th>
              <!-- <td>$265.24</td> -->
              <td id="totalImporte" align="center" colspan="2">0</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-12">
          <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
          <button type="submit" id="btnFacturar" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Facturar
          </button>
          <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
            <i class="fas fa-download"></i> Generate PDF
          </button>
          <button type="button" class="btn btn-danger float-right" style="margin-right: 5px;">
            <i class="fas fa-download"></i> Cancelar
          </button>
        </div>
      </div>





      <!-- /.invoice -->
    </div><!-- /.col -->
  </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>











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
                <input type="hidden" name="idContacto" id="idContacto" value="0">


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
                    <label for="idTipoIdentificacion">Tipo de indentificacion</label>
                    <select id="idTipoIdentificacion" class="form-control" name="idTipoIdentificacion" required>
                      <option value="1" selected>CEDULA</option>
                      <option value="2">RNC</option>
                      <option value="3" selected>PASSPORT</option>
                      <option value="4">Inactivo</option>
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
                    <label>Tipo Comprobante</label>
                    <select class="form-control" name="idTipoComprobante" id="idTipoComprobante">
                      <option value="0" disabled selected>Seleccione una opción</option>
                      <?php foreach ($idTipoComprobante as $key) {
                        echo '<option value="' . $key['idTipoComprobante'] . '">' . $key['tipoComprobante'] . '</option>';
                      }  ?>
                    </select>
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

<!-- /.content -->
<!-- </div> -->
<!-- /.content-wrapper -->


<!-- Control Sidebar -->

<!-- /.control-sidebar -->

<!-- ./wrapper -->


<!-- jQuery -->
<script src="views/assets/js/factura.js"></script>

<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>



<script>
  $(function() {
    $("#producto").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "info": true,
      "paging": true,
      "pageLength": 7,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#producto_wrapper  .col-md-6:eq(0)');
  });
</script>