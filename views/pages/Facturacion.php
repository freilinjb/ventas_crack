<?php

$comprobante = ComprobanteModel::getComprobante(null, null);

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



                  <div class="col-6-lg col-xl-6 col-sm-12">
                    <div class="form-group">
                      <!-- <label>Sucursal</label> -->
                      <select class="form-control" name="formato" id="formato">
                        <option value="0" disabled selected>Seleccione El Cliente</option>
                        <?php
                        // $parametro = new stdClass();
                        // $parametro->esProveedor = false;
                        // $parametro->esCliente = true;
                        // $parametro->todo = false;

                        // if ($titulo === "proveedor") {
                        //   $parametro->esProveedor = true;
                        // } else 
                        // if ($titulo === "cliente") {
                        //   $parametro->esCliente = true;
                        // } else {
                        //   $parametro->todo = true;
                        // }
                        // $clientes = ContactoController::getContacto($parametro);
                        // foreach ($clientes as $index => $key) {
                        //   echo "<option value='" . $key['idContacto'] . "'>" . $key['nombre'] . "</option>";
                        // }
                        ?>
                      </select>
                    </div>
                    <!-- </div> -->

                    <div class="col-6-lg col-xl-6 col-sm-12">
                      <!-- Date dd/mm/yyyy -->
                      <div class="form-group">
                        <!-- <label>inicio</label> -->
                        <div class="input-group">
                          <input type="text" class="form-control" name="inicio" id="inicio" value="1" placeholder="Ingrese el apellido" autocomplete="off">
                        </div>
                        <!-- /.input group -->
                      </div>
                    </div>


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

            <!-- <div class="col-12 table-responsive"> -->
            <!-- <table class="table table-striped"> -->
            <!-- <table class="table table-head-fixed text-nowrap">

                  <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Call of Duty</td>
                      <td>455-981-221</td>
                      <td>El snort testosterone trophy driving gloves handsome</td>
                      <td>$64.50</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Need for Speed IV</td>
                      <td>247-925-726</td>
                      <td>Wes Anderson umami biodiesel</td>
                      <td>$50.00</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Monsters DVD</td>
                      <td>735-845-642</td>
                      <td>Terry Richardson helvetica tousled street art master</td>
                      <td>$10.70</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Monsters DVD</td>
                      <td>735-845-642</td>
                      <td>Terry Richardson helvetica tousled street art master</td>
                      <td>$10.70</td>
                    </tr>

                  </tbody>
                </table> -->
            <table id="producto" class="table table-head-fixed table-hover text-nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Condigo</th>
                  <th>Nombre</th>
                  <!-- <th>descripcion</th> -->
                  <!-- <th>Precio Compra</th> -->
                  <th>Precio </th>
                  <th>Estado</th>
                  <th>Acccion</th>


                  <!-- <th>Telefono</th>
                                    <th>Estado</th>
                                    <th>Acción</th> -->
                </tr>
              </thead>
              <tbody id="bodyProductos">
                <?php
                // print_r($producto);
                // echo "hola mundo" . $producto[0]['nombrePro'];
                // die;
                foreach ($producto as $index => $value) {
                  $estado = null;
                  // print_r($value);
                  if ($value["estado"] == 'Activo') {
                    $estado = "<span class='badge badge-primary'>" . $value["estado"] . "</span>";
                  } else {
                    $estado = "<span class='badge badge-danger'>" . $value["estado"] . "</span>";
                  }
                  echo '<tr>';
                  echo '<td>' . ($index + 1) . '</td>';
                  echo '<td>' . $value["codigoPro"] . '</td>';

                  echo '<td>' . $value["nombrePro"] . '</td>';
                  // echo '<td>' . $value["descripcion"] . '</td>';
                  // echo '<td>' . $value["precioCompra"] . '</td>';
                  echo '<td>' . $value["precioVenta"] . '</td>';
                  // echo '<td>' . $value["estado"] . '</td>';
                  // echo '<td>' . $value["telefono"] . '</td>';
                  echo '<td>' . $estado  . '</td>';
                  echo '<td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-editar" data-toggle="modal" data-target="#modalProducto" idProducto="' . $value["idProducto"] . '">Editar</button>
                                        <button type="button" class="btn btn-danger btn-eliminar"  idProducto="' . $value["idProducto"] . '">Eliminar</button>
                                    </div>
                                        </td>';
                  echo '</tr>';
                }
                ?>
              </tbody>
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
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Itbis</th>
                <th scope="col">Importe</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody id="bodyProductos">

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
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

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
<!-- /.content -->
<!-- </div> -->
<!-- /.content-wrapper -->


<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
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