<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Administracion Provedores</h1>
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

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Default box -->
        <div class="card card-info card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Registro de Provedor
            </h3>
          </div>
          <div class="card-body">
            <div class="">
              <button class="btn btn-info mb-3" data-toggle="modal" data-target="#modalEmployeeRegister">
                <i class="fa fa-plus"></i>
                Provedor
              </button>
            </div>
            <table id="empleados" class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>RNC</th>
                  <th>Correo</th>
                  <th>Telefono</th>
                  <th>Provincia</th>
                  <th>Ciudad</th>
                  <th>Direccion</th>
                  <th>Obsercacion</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>



              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- MODAL REGISTRAR EMPLEADO-->
<div class="modal fade" id="modalEmployeeRegister" style="display: none; padding-right: 17px;" aria-modal="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="formEmployee" enctype="multipart/form-data">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Register Provedores</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card hovercard">

            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-6-lg col-xl-6 col-sm-12">
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>Nombre</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre" autocomplete="off">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>
                <div class="col-6-lg col-xl-6 col-sm-12">
                  <!-- Date dd/mm/yyyy -->
                  <div class="form-group">
                    <label>RNC</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="RNC" id="RNC" placeholder="Ingrese el RNC" autocomplete="off">
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
                      <input type="email" class="form-control" name="correo" id="correo" autocomplete="off">
                    </div>
                  </div>
                </div>



                <div class="col-6-lg col-xl-6 col-sm-12">
                  <div class="form-group">
                    <label>Telefono fijo</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" class="form-control" name="telefono" id="telefono" autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="col-6-lg col-xl-6 col-sm-12">
                  <div class="form-group">
                    <label>Provincia</label>
                    <select class="form-control" name="provincia" id="provincia">
                      <option value="0" disabled selected>Seleccione una opción</option>
                      <?php foreach ($provincia as $key) {
                        echo '<option value="' . $key['idProvicia'] . '">' . $key['provincia'] . '</option>';
                      }  ?>
                    </select>
                  </div>
                </div>


                <div class="col-6-lg col-xl-6 col-sm-12">
                  <div class="form-group">
                    <label>Ciudad</label>
                    <select class="form-control" name="ciudad" id="ciudad">
                      <option value="0" disabled selected>Seleccione una opción</option>
                      <?php foreach ($ciudad as $key) {
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
                      <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Ingrese la Direccion" autocomplete="off">
                    </div>
                    <!-- /.input group -->
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Observacion</label>
                    <div class="input-group mb-3">
                      <textarea name="observacion" id="observacion" class="form-control" placeholder="Ingrese una Observacion" cols="30" rows="2"></textarea>
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














                <hr>
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

</div>
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
      "lengthChange": true,
      "autoWidth": true,
      "info": true,
      "paging": true,
      "pageLength": 7,
      // "ajax": "ajax/datatable-empleados.php"
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#empleados_wrapper  .col-md-6:eq(0)');
  });
</script>