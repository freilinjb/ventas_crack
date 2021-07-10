<?php

require_once "../Models/UnidadModel.php";

class UnidadAjax
{
  // public $idEmpleado;
  // public $idSexo;
  // public $idDepartamento;
  // public $datosEmpleado;

  public function registrarUnidad()
  {

    $datos = array(
      "creado_por" => 1,
      "nombre" => $_POST["nombre"],
      "estado" => $_POST["estado"],
    );


    $respuesta  =  UnidadModel::registrarUnidad($datos); // UnidadModel::registrarUnidad($datos);

    // print_r($respuesta);die;
    // echo "registrado";
    echo json_encode($respuesta);
  }

  public function actualizandoUnidad()
  {

    $datos = array(
      "idUnidad" => $_POST["idUnidad"],
      "creado_por" => 1,
      "nombre" => $_POST["nombre"],
      "estado" => $_POST["estado"],
    );


    $respuesta  = UnidadModel::registrarUnidad($datos);

    // print_r($respuesta);die;
    // echo "registrado";
    echo json_encode($respuesta);
  }

  public function getUnidad()
  {

    $idUnidad = $_POST['idUnidad'];
    $respuesta  = UnidadModel::getUnidad($idUnidad);

    echo json_encode($respuesta);
  }

  // public function eliminarEmpleado()
  // {
  //   if (preg_match('/^[0-9]+$/', $_POST['idEmpleado'])) {
  //     $idEmpleado = $_POST['idEmpleado'];
  //     // echo "idEmpleado; " . $idEmpleado;die;
  //     $respuesta  = EmpleadoModel::eliminarEmpleado($idEmpleado);

  //     echo json_encode($respuesta);
  //   } else {
  //     $datos = array("msg" => "Solo se admiten numeros", "status" => 200);
  //     echo json_encode($datos);
  //   }
  // }
}



/*=============================================
Comprobamos que el valor no venga vacío
=============================================*/
if (isset($_POST['exec']) && !empty($_POST['exec'])) {
  // print_r($_POST);
  // die;

  $funcion = $_POST['exec'];
  $ejecutar = new UnidadAjax();
  //En función del parámetro que nos llegue ejecutamos una función u otra
  switch ($funcion) {

    case 'registrarUnidad':
      // echo "hola mundo";
      $ejecutar->registrarUnidad();
      // echo "hola mundo";
      break;

      // case 'registrarProveedor':
      //   $ejecutar->registrarUnidad();
      //   // echo "hola mundo";
      //   break;

    case 'actualizandoUnidad':
      $ejecutar->actualizandoUnidad();
      // echo "hola mundo";
      break;

    case 'getUnidad':
      $ejecutar->getUnidad();
      // echo "hola mundo";
      break;

      // case 'eliminarEmpleado':
      //   $ejecutar->eliminarEmpleado();
      //   // echo "hola mundo";
      //   break;
    case 'funcion2':
      $b->accion2();
      break;
  }
}
