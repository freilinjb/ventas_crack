<div class="page-heading">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administración de Almacen</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li> -->
            <li class="breadcrumb-item active">Administración de Almacen</li>
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
                Registro de Almacen
              </h3>

            </div>
            <div class="card-body">
              <div class="">
                <button class="btn btn-info mb-3" data-toggle="modal" data-target="#modalRegistroAlmacen" id="btnRegistrar">
                  <strong> + </strong> Almacen
                </button>
              </div>
              <table id="table1" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Provincia</th>
                    <th>Ciudad</th>
                    <th>Creado en</th>
                    <th>Creado por</th>
                    <th>Estado</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $almacen = InventarioController::getInventarios(false);

                  $echo = "<tbody>";
                  foreach ($almacen as $index => $key) {
                    $estado = ($key['activo'] == 1) ? ('<span class="badge bg-success">Activo</span>') : ('<span class="badge bg-danger">Inactive</span>');
                    echo "
                                <tr>
                                    <td>" . 1 + $index . "</td>
                                    <td>" . $key['nombre'] . "</td>
                                    <td>" . $key['provincia'] . "</td>
                                    <td>" . $key['ciudad'] . "</td>
                                    <td>" . $key['creado_en'] . "</td>
                                    <td>" . $key['creado_por'] . "</td>
                                    <td>$estado</td>
                                    <td>
                                        <div class='btn-group btn-group-sm' role='group' aria-label='Acciones'>
                                            <button type='button' class='btn btn-primary actualizarAlmacen' idAlmacen='" . $key['idAlmacen'] . "' data-bs-toggle='modal' data-bs-target='#modalRegistroAlmacen'><span class='fa-fw select-all fas'></span></button>
                                            <button type='button' class='btn btn-danger eliminarAlmacen' idAlmacen='" . $key['idAlmacen'] . "'><span class='fa-fw select-all fas'></span></button>
                                        </div>
                                        <!--
                                        <a class='btn btn-outline-primary rounded-circle btn-sm actualizarAlmacen' idAlmacen='" . $key['idAlmacen'] . "' data-bs-toggle='modal' data-bs-target='#modalRegistroUnidad'><span class='fa-fw select-all fas'></span></a>
                                        <a class='btn btn-danger rounded-circle btn-sm eliminarAlmacen' idAlmacen='" . $key['idAlmacen'] . "'><span class='fa-fw select-all fas'></span></a>
                                        -->
                                    </td> 
                                </tr>";
                  }
                  $echo .= "</tbody>";
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





</div>

<!--login form Modal -->
<div class="modal fade text-left" id="modalRegistroAlmacen" tabindex="-1" role="dialog" aria-labelledby="tituloModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="tituloModal">Registro de Almacen </h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"><span class="fa-fw select-all fas"></span></i>
        </button>
      </div>
      <div class="modal-body">

        <form id="registroInventario">
          <div class="row">
            <div class="col-12">
              <label>Nombre <span style="color: red; font-size: 15px;">*</span> </label>
              <input type="hidden" name="idInventario" value="0" id="idInventario">
              <div class="form-group">
                <input type="text" placeholder="Ingrese el nombre del Almacen" class="form-control" name="nombre" id="nombre" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-6 col-12">
              <label for="provincia">Provincia</label>
              <div class="form-group">
                <select class="form-select" name="provincia" id="provincia">
                  <?php
                  $provincia = ConsultasController::getDatos('provincia', 'activo', true);
                  echo "<option value='' disabled selected>Seleccione una opcion</option>";

                  foreach ($provincia as $index => $key) {
                    echo "<option value='" . $key['idProvincia'] . "'>" . $key['descripcion'] . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-12">
              <label for="ciudad">Ciudad</label>
              <div class="form-group">
                <select class="form-select" name="ciudad" id="ciudad">
                  <option value='' disabled selected>Seleccione una opcion</option>
                  <?php
                  $ciudad = ConsultasController::getDatos('ciudad', 'activo', true);

                  foreach ($ciudad as $index => $key) {
                    echo "<option value='" . $key['idCiudad'] . "'>" . $key['descripcion'] . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-12">
              <label>Sector </label>
              <div class="form-group">
                <input type="text" class="form-control" name="sector" id="sector" autocomplete="off">
              </div>
            </div>
            <div class="col-12">
              <label>Dirección </label>
              <div class="form-group">
                <input type="text" class="form-control" name="direccion" id="direccion" autocomplete="off">
              </div>
            </div>
            <div class="col-12">
              <div class="form-check">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="form-check-input form-check-primary" checked name="estado" id="estado">
                  <label class="form-check-label" for="estado">Activo</label>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                  <i class="bx bx-x d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Cerrar</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1">
                  <i class="bx bx-check d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Guardar</span>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>




<link rel="stylesheet" href="public/assets/vendors/fontawesome/all.min.css">
<script src="public/assets/vendors/fontawesome/all.min.js"></script>
<!-- JS PERSONAL -->
<script src="public/js/almacen.js"></script>
<!-- FIN JS PERSONAL -->
<script src="public/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!-- <script src="public/assets/js/bootstrap.bundle.min.js"></script> -->

<script src="public/assets/vendors/simple-datatables/simple-datatables.js"></script>
<!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
<script>
  // Simple Datatable
  let table1 = document.querySelector('#table1');
  let dataTable = new simpleDatatables.DataTable(table1);
</script>

<!-- <script src="public/assets/js/main.js"></script> -->