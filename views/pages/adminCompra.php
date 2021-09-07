<?php

$producto = ProductoController::getProducto(null, null);
$categoria = ProductoController::getCategoria(null, null);
$subCategoria = ProductoController::getSubCategoria(null, null);
$marca = ProductoController::getMarca(null, null);
$unidad = ProductoController::getUnidad(null, null);
?>





<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Adminiscación de Compras</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Layout</a></li>
          <li class="breadcrumb-item active">Fixed Layout</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">

  <div class="container-fluid">d
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card card-info card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Registro de Compras
            </h3>
          </div>
          <div class="card-body">








            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Productos</h3>

                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 350px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="height: 120px;">
                    <table id="producto" class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Condigo</th>
                          <!-- <th>Nombre</th> -->
                          <th>descripcion</th>
                          <th>Precio</th>
                          <!-- <th>Precio Venta</th> -->
                          <th>Estado</th>
                          <!-- <th>Acccion</th> -->


                          <!-- <th>Telefono</th>
                                    <th>Estado</th>
                                    <th>Acción</th> -->
                        </tr>
                      </thead>
                      <tbody>
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

                          // echo '<td>' . $value["nombrePro"] . '</td>';
                          echo '<td>' . $value["descripcion"] . '</td>';
                          echo '<td>' . $value["precioCompra"] . '</td>';
                          // echo '<td>' . $value["precioVenta"] . '</td>';
                          // echo '<td>' . $value["estado"] . '</td>';
                          // echo '<td>' . $value["telefono"] . '</td>';
                          echo '<td>' . $estado  . '</td>';
                          // echo '<td>
                          //               <div class="btn-group" role="group" aria-label="Basic example">
                          //               <button type="button" class="btn btn-primary btn-editar" data-toggle="modal" data-target="#modalProducto" idProducto="' . $value["idProducto"] . '">Editar</button>
                          //               <button type="button" class="btn btn-danger btn-eliminar"  idProducto="' . $value["idProducto"] . '">Eliminar</button>
                          //           </div>
                          //               </td>';
                          echo '</tr>';
                        }
                        ?>
                      </tbody>
                    </table>





                  </div>
                  <!-- /.card-body -->

                </div>
                <!-- /.card -->

              </div>


              <div class="col-md-4">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Codigo de Barra</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="codigo" id="codigo" value="crack2" placeholder="Ingrese el codigo" autocomplete="off">
                  </div>
                  <!-- /.input group -->
                </div>
              </div>




            </div>











            <div class="row">
              <input type="hidden" name="idEmpleado" id="idEmpleado" value="0">




              <div class="col-md-4">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Descripcion</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="crack2" placeholder="Ingrese el descripcion" autocomplete="off" disabled>
                  </div>
                  <!-- /.input group -->
                </div>
              </div>

              <div class="col-md-3">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Cantiadad</label>
                  <div class="input-group">
                    <input type="number" class="form-control" name="cantidad" id="cantidad" value="crack2" placeholder="Ingrese el cantidad" autocomplete="off">
                  </div>
                  <!-- /.input group -->
                </div>
              </div>

              <div class="col-md-3">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Precio Compra</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="codigo" id="codigo" value="crack2" placeholder="Precio Compra" autocomplete="off" disabled>
                  </div>
                  <!-- /.input group -->
                </div>
              </div>










              <div class="col-md-3">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Sub Total</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="apellido" id="apellido" value="crack2" placeholder="Sub Total" autocomplete="off">
                  </div>
                  <!-- /.input group -->
                </div>
              </div>



















            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <!-- <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-info">Save changes</button>
      </div>
      </form>










    </div>
  </div>
  <!-- /.card -->
  </div>
  </div>
  </div>
</section>


<!-- MODAL REGISTRAR EMPLEADO-->


<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<!-- END MODAL REGISTRAR EMPLEADO-->

<!-- MODAL REGISTRAR EDITAR-->


<!-- /.modal-dialog -->
</div>

<!-- END MODAL REGISTRAR EMPLEADO-->

<!-- SCRIPT PERSONAL -->
<script src="views/assets/js/empleado.js"></script>
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