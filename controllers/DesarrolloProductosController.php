<?php

class DesarrolloProductosController
{

  static public function getDesarrolloProductos($item, $value)
  {
    $table = "desarrolloproducto_v";
    $request = DesarrolloProductosModel::getData($table, $item, $value);

    return $request;
  }
  static public function registrarDesarrolloProductos()
  {

    if (isset($_POST["idCategoria"]) && !empty($_POST["idCategoria"])) {

      if (
        preg_match('/^[0-9]+$/', $_POST["idCategoria"]) &&
        preg_match('/^[0-9]+$/', $_POST["idTipoProducto"]) &&
        preg_match('/^[0-9]+$/', $_POST["idSubTipo"]) &&
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["producto"]) &&
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcion"]) &&
        preg_match('/^[0-9]+$/', $_POST["idEstado"])
      ) {

        if (isset($_POST["idDesarrolloProductos"])) {

          $datos = array(
            "idProducto" => $_POST["idProducto"],
            "idCategoria" => $_POST["idCategoria"],
            "idTipoProducto" => $_POST["idTipoProducto"],
            "idSubTipo" => $_POST["idSubTipo"],
            "producto" => $_POST["producto"],
            "descripcion" => $_POST["descripcion"],
            "producto" => $_POST["idEstado"]
          );
        } else {

          $datos = array(
            "idCategoria" => $_POST["idCategoria"],
            "idTipoProducto" => $_POST["idTipoProducto"],
            "idSubTipo" => $_POST["idSubTipo"],
            "producto" => $_POST["producto"],
            "descripcion" => $_POST["descripcion"],
            "idEstado" => $_POST["idEstado"]
          );
        }


        $respuesta = DesarrolloProductosModel::registrarDesarrolloProductosModel($datos);

        // print_r($respuesta["status"] == 200);

        if ($respuesta["status"] == 200) {
          echo '<script>
                        jQuery(document).ready(function () {
                                Swal.fire(
                                    "Ok!",
                                    "Se ha registro correctamente!",
                                    "success"
                                );
                            });
                        </script>';
        }
      }
    }
  }

  static public function eliminarDesarrolloProductos()
  {

    if (isset($_GET["idDesarrolloProductos"])) {

      $tabla = "desarrolloproducto";
      $datos = $_GET["idDesarrolloProductos"];

      // if ($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png") {

      //     unlink($_GET["imagen"]);
      //     rmdir('vistas/img/productos/' . $_GET["codigo"]);
      // }

      $respuesta = DesarrolloProductosModel::eliminarDesarrolloProductosModel($tabla, $datos);

      if ($respuesta == true) {

        echo '<script>
                jQuery(document).ready(function () {
                    Swal.fire({
                        icon: "success",
                        title: "Eliminado.",
                        text: "El producto ha sido borrado correctamente!"
                      }).then(function(result) {
                                if (result.value) {
                                    window.location = "index.php?route=administracionProductos";
                                }
                            });
                });

				</script>';
      } else {
        echo "<script>
                jQuery(document).ready(function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    });
                })
				</script>";
      }
    }
  }
}
