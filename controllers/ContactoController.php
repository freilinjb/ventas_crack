<?php



class ContactoController
{

  public function getContacto($parame)
  {
    $resutado = ContactoModel::getContacto($parame);
    return $resutado;
  }


  public function getIdTipoComprobante()
  {

    $respuesta = ContactoModel::getIdTipoComprobante();
    return $respuesta;
  }


  static public function registrarContacto()
  {
    $datos = array(
      "nombre" => $_POST['nombre'],
      "esCliente" => isset($_POST['esCliente']) ? $_POST['esCliente'] : 0,
      "esProveedor" => isset($_POST['esProveedor']) ? $_POST['esProveedor'] : 0,
      "razonSocial" => $_POST['razonSocial'],
      "idTipoIdentificacion" => $_POST['idTipoIdentificacion'],
      "identificacion" => $_POST['identificacion'],
      "tipoComprobante" => $_POST['tipoComprobante'],
      "correo" => $_POST['correo'],
      "telefono" => $_POST['telefono'],
      "estado" => $_POST['estado'],
    );
    $contacto = new ContactoModel();
    $resultado = $contacto->registrarContacto($datos);
    // print_r($_POST);
    // die;
    if ($resultado == 0) {
      echo json_encode(
        array(
          "error" => true,
          "exec" => "registro",
          "msg" => "Ah ocurrido un error",
        )
      );
    } else {
      echo json_encode(
        array(
          "ssucess" => true,
          "exec" => "registro",
          "msg" => "Se ha registrado de forma correcta",
        )
      );
    }
  }
}
