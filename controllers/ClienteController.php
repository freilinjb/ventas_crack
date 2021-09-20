<?php

class ClienteController
{
  // static public function getClientes($item, $value)
  // {
  //   $respuesta = ClienteModel::getClientes($item, $value);
  //   return $respuesta;
  // }

  static public function getTipoIdentificacion()
  {
    $respuesta = ClienteModel::getTipoIdentificacion();
    return $respuesta;
  }

  static public function getTipoComprobante()
  {
    $respuesta = ClienteModel::getTipoComprobante();
    return $respuesta;
  }

  static public function getVendedor()
  {
    $respuesta = ClienteModel::getVendedor();
    return $respuesta;
  }



  static public function getCliente()
  {
    $resultado = ClienteModel::getCliente();
    return $resultado;
  }





  static public function registrarCliente()
  {
    if (isset($_POST['cliente'])) {
      $datos = array(
        "nombre" => $_POST["nombre"],
        "tipoIdentificacion" => $_POST["tipoIdentificacion"],
        "idenficacion" => $_POST["idenficacion"],
        "tipoComprobante" => $_POST["tipoComprobante"],
        "vendedor" => $_POST["vendedor"],
        "correo" => $_POST["correo"],
        "telefono" => $_POST["telefono"],
        "diasCredito" => $_POST["diasCredito"],
        "limiteCredito" => $_POST["limiteCredito"],
        "aplicaDescuento" => $_POST["aplicaDescuento"],
        "descuento" => $_POST["descuento"],
        "provincia" => $_POST["provincia"],
        "ciuda" => $_POST["ciuda"],
        "direccion" => $_POST["direccion"],
        "observacion" => $_POST["observacion"],

        "estado" => $_POST["estado"]
      );


      // print_r($datos);
      // die;
      $resultado = ClienteModel::registrarCliente($datos);
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
