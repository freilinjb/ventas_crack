<?php

class ComprobanteController
{
  static public function getTipoComprobante()
  {
    $respuesta = ComprobanteModel::getTipoComprobante();
    return $respuesta;
  }


  static public function getComprobante($idAquisicion = null)
  {
    $respuesta = ComprobanteModel::getComprobante($idAquisicion);
    return $respuesta;
  }



  static public function addComprobante()
  {

    if (isset($_POST['adquirsicion_comprobante'])) {

      $datos = array(

        'idTipoComprobante' => $_POST['idTipoComprobante'],
        'sucursal' => $_POST['sucursal'],
        'vencimiento' => $_POST['vencimiento'],
        'inicio' => $_POST['inicio'],
        'final' => $_POST['final'],
        'secuencia' => $_POST['secuencia'],
        'estado' => $_POST['estado'],



      );


      $resultado = ComprobanteModel::addComprobante($datos);
      $_POST = null;
      if ($resultado > 0) {
        echo '<script>
          Swal.fire(
              "Notificacion!",
              "Se ha registrado de forma correcta!",
              "success"
          );
          </script>';
      } else if ($resultado == 0) {
        echo '<script>
          Swal.fire(
              "Notificacion!",
              "Ah ocurrido un errodo!",
              "success"
          );
          </script>';
      }
      // print_r($resultado);



    }
  }
}
