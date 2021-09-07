<?php

require_once "../Controllers/ProvedoresController.php";

require_once "../Models/ProvedoresModel.php";

class ProvedorAjax
{
  // public $idProvedor;
  // public $idSexo;

  public $provedor;
  public $provincia;
  public $ciudad;
  // public $idDepartamento;
  // public $datosEmpleado;


  public function registrarProvedor()
  {

    $datos = array(
      "nombre" => $_POST["nombre"],
      "creado_por" => 1,
      "RNC" => $_POST["RNC"],
      "correo" => $_POST["correo"],
      "telefono" => $_POST["telefono"],
      "provincia" => $_POST["idProvincia"],
      "ciudad" => $_POST["idCiudad"],
      "direccion" => $_POST["direccion"],
      "tipoUsuario" => $_POST["tipoUsuario"],
      "observacion" => $_POST["observacion"],

      "estado" => $_POST["estado"],




    );

    $respuesta  = ProvedoresModel::registrarProvedor($datos);

    // print_r($respuesta);
    // echo "registrado";
    echo json_encode($respuesta);
  }

  public function actualizandoProvedor()
  {

    $datos = array(
      "idProvedor" => $_POST["idProvedor"],
      "creado_por" => 1,
      "nombre" => $_POST["nombre"],
      "RNC" => $_POST["RNC"],
      "correo" => $_POST["correo"],
      "telefono" => $_POST["telefono"],
      "provincia" => $_POST["provincia"],
      "ciudad" => $_POST["ciudad"],
      "direccion" => $_POST["direccion"],
      "tipoUsuario" => $_POST["tipoUsuario"],
      "observacion" => $_POST["observacion"],

      "estado" => $_POST["estado"],
    );

    $respuesta  = ProvedoresModel::registrarProvedor($datos);

    echo json_encode($respuesta);
  }

  public function getProveedores()
  {
    $idProvedor = $_POST['idProvedor'];
    $respuesta  = ProvedoresModel::getProveedores($idProvedor);

    echo json_encode($respuesta);
  }

  public function eliminarEmpleado()
  {
    if (preg_match('/^[0-9]+$/', $_POST['idProvedor'])) {
      $idProvedor = $_POST['idProvedor'];
      // echo "idProvedor; " . $idProvedor;die;
      $respuesta  = EmpleadoModel::eliminarEmpleado($idProvedor);

      echo json_encode($respuesta);
    } else {
      $datos = array("msg" => "Solo se admiten numeros", "status" => 200);
      echo json_encode($datos);
    }
  }
}










/*=============================================
Comprobamos que el valor no venga vacío
=============================================*/
if (isset($_POST['exec']) && !empty($_POST['exec'])) {
  $funcion = $_POST['exec'];
  $ejecutar = new ProvedorAjax();
  //En función del parámetro que nos llegue ejecutamos una función u otra
  switch ($funcion) {

    case 'registrarProvedor':
      $ejecutar->registrarProvedor();
      // echo "hola mundo";
      break;

      // case 'registrarProvedor':
      //   $ejecutar->registrarProvedor();
      //   // echo "hola mundo";
      //   break;

    case 'actualizandoEmpleado':
      $ejecutar->actualizandoProvedor();
      // echo "hola mundo";
      break;

    case 'getProveedores':
      $ejecutar->getProveedores();
      // echo "hola mundo";
      break;

      // case 'eliminarEmpleado':
      //   $ejecutar->eliminarEmpleado();
      //   // echo "hola mundo";
      //   break;
      // case 'funcion2':
      //   $b->accion2();
      //   break;
  }
}
