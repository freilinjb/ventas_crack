 <?php
    // $empleado = EmpleadoController::getproducto(null, null);
    // $sexo = EmpleadoController::getSexo(null, null);
    // $tipoUsuario = EmpleadoController::getTipoUsuario(null, null);

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
                 <h1>Adminiscación de Producto</h1>
             </div>
             <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li> -->
                     <li class="breadcrumb-item active">Administración de Producto</li>
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
                             Registro de Producto
                         </h3>
                         s
                     </div>
                     <div class="card-body">
                         <div class="">
                             <button class="btn btn-info mb-3" data-toggle="modal" data-target="#modalProducto" id="registroProducto">
                                 <strong> + </strong> Producto
                             </button>
                         </div>
                         <table id="producto" class="table table-bordered table-striped table-hover">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Condigo</th>
                                     <th>Nombre</th>
                                     <th>descripcion</th>
                                     <th>Precio Compra</th>
                                     <th>Precio Venta</th>
                                     <th>Estado</th>
                                     <th>Acccion</th>


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

                                        echo '<td>' . $value["nombrePro"] . '</td>';
                                        echo '<td>' . $value["descripcion"] . '</td>';
                                        echo '<td>' . $value["precioCompra"] . '</td>';
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
                 <!-- /.card -->


                 <div class="form-group">
                     <label>Codigo</label>
                     <div class="input-group">
                         <input type="text" class="form-control" name="codigo" id="codigo" value="crack233" placeholder="Ingrese el nombre" autocomplete="off">
                     </div>
                     <!-- /.input group -->
                 </div>
             </div>
         </div>
     </div>
 </section>


 <!-- MODAL REGISTRAR EMPLEADO-->
 <div class="modal fade" id="modalProducto" style="display: none; padding-right: 17px;" aria-modal="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <form id="formProducto">
                 <div class="modal-header bg-info">
                     <h4 class="modal-title" od="tituloModal">Register Producto</h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="card hovercard">
                         <div class="card-body">
                             <div class="row">
                                 <input type="hidden" name="idProducto" id="idProducto" value="0">
                                 <div class="col-6-lg col-xl-6 col-sm-12">
                                     <!-- Date dd/mm/yyyy -->

                                     <div class="form-group">
                                         <label>Codigo</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control" name="codigo" id="codigo" value="crack233" placeholder="Ingrese el nombre" autocomplete="off">
                                         </div>
                                         <!-- /.input group -->
                                     </div>
                                     <div class="form-group">
                                         <label>Nombre</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control" name="nombre" id="nombre" value="crack222" placeholder="Ingrese el nombre" autocomplete="off">
                                         </div>
                                         <!-- /.input group -->
                                     </div>
                                 </div>
                                 <div class="col-6-lg col-xl-6 col-sm-12">
                                     <div class="form-group">
                                         <label>Categoria</label>
                                         <select class="form-control" name="categoria" id="categoria">
                                             <option value="0" disabled selected>Seleccione una opción</option>
                                             <?php foreach ($categoria as $key) {
                                                    echo '<option value="' . $key['idCategoria'] . '">' . $key['categoria'] . '</option>';
                                                }  ?>
                                         </select>
                                     </div>
                                 </div>


                                 <!-- <div class="col-6-lg col-xl-6 col-sm-12">
                                    <div class="form-group">
                                        <label>SubCategoria</label>
                                        <select class="form-control" name="subCategoria" id="subCategoria">
                                            <option value="0" disabled selected>Seleccione una opción</option>
                                            <?php foreach ($subCategoria as $key) {
                                                echo '<option value="' . $key['idSubCategoria'] . '">' . $key['subCategoria'] . '</option>';
                                            }  ?>
                                        </select>
                                    </div>
                                </div> -->



                                 <div class="col-6-lg col-xl-6 col-sm-12">
                                     <div class="form-group">
                                         <label>Marca</label>
                                         <select class="form-control" name="marca" id="marca">
                                             <option value="0" disabled selected>Seleccione una opción</option>
                                             <?php foreach ($marca as $key) {
                                                    echo '<option value="' . $key['idMarca'] . '">' . $key['marca'] . '</option>';
                                                }  ?>
                                         </select>
                                     </div>
                                 </div>


                                 <div class="col-6-lg col-xl-6 col-sm-12">
                                     <div class="form-group">
                                         <label>Unidad</label>
                                         <select class="form-control" name="unidad" id="unidad">
                                             <option value="0" disabled selected>Seleccione una opción</option>
                                             <?php foreach ($unidad as $key) {
                                                    echo '<option value="' . $key['idUnidad'] . '">' . $key['unidad'] . '</option>';
                                                }  ?>
                                         </select>
                                     </div>
                                 </div>


                                 <div class="col-sm-12">
                                     <div class="form-group">
                                         <label>Descripcion</label>
                                         <div class="input-group mb-3">
                                             <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese una descripcion" cols="30" rows="2"></textarea>
                                         </div>
                                     </div>
                                 </div>


                                 <div class="col-6-lg col-xl-6 col-sm-12">
                                     <div class="form-group">
                                         <label>Stock Inicial</label>
                                         <div class="input-group">
                                             <input type="number" class="form-control" name="stockIni" id="stockIni" value="55" placeholder="Ingrese el stockIni" autocomplete="off">
                                         </div>
                                         <!-- /.input group -->
                                     </div>
                                 </div>



                                 <div class="col-6-lg col-xl-6 col-sm-12">
                                     <div class="form-group">
                                         <label>Stock Minimo</label>
                                         <div class="input-group">
                                             <input type="number" class="form-control" name="stockMini" id="stockMini" value="55" placeholder="Ingrese el stockMini" autocomplete="off">
                                         </div>
                                         <!-- /.input group -->
                                     </div>
                                 </div>


                                 <div class="col-6-lg col-xl-6 col-sm-12">
                                     <div class="form-group">
                                         <label>Reorden</label>
                                         <div class="input-group">
                                             <input type="number" class="form-control" name="reorden" id="reorden" value="555" placeholder="Ingrese el reorden" autocomplete="off">
                                         </div>
                                         <!-- /.input group -->
                                     </div>
                                 </div>

                                 <div class="col-6-lg col-xl-6 col-sm-12">
                                     <div class="form-group">
                                         <label>ITBIS</label>
                                         <div class="input-group">
                                             <input type="text" class="form-control" name="itbis" id="itbis" value="crack2" placeholder="Ingrese el itbis" autocomplete="off">
                                         </div>
                                         <!-- /.input group -->
                                     </div>
                                 </div>


                                 <div class="col-6-lg col-xl-6 col-sm-12">
                                     <div class="form-group">
                                         <label>Precio Compra</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fas fa-money"></i></span>
                                             </div>
                                             <input type="text" class="form-control" name="precioCompra" id="precioCompra" autocomplete="off" value="1423" placeholder="Ingrese Precio Compra">
                                         </div>
                                     </div>
                                 </div>



                                 <div class="col-6-lg col-xl-6 col-sm-12">
                                     <div class="form-group">
                                         <label>Precio Venta</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fas fa-key"></i></span>
                                             </div>
                                             <input type="text" class="form-control" name="precioVenta" id="precioVenta" autocomplete="off" value="1423" placeholder="Ingrese Precio Venta">
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
 <script src="views/assets/js/producto.js"></script>
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