<?php

class EmpleadoController
{
  static public function getEmpleados($item, $value)
  {
    $respuesta = EmpleadoModel::getEmpleados($item, $value);
    return $respuesta;
  }

  static public function getSexo()
  {
    $respuesta = EmpleadoModel::getSexo();
    return $respuesta;
  }

  static public function getTipoUsuario()
  {
    $respuesta = EmpleadoModel::getTipoUsuario();
    return $respuesta;
  }

  static public function registrarEmpleado()
  {
    $datos = array(
      "nombre" => $_POST["nombre"],
      "apellido" => $_POST["apellido"],
      "sexo" => $_POST["sexo"],
      "identificacion" => $_POST["identificacion"],
      "user" => $_POST["user"],
      "clave" => $_POST["clave"],
      "idTipoUser" => $_POST["idTipoUser"],
      "telefono" => $_POST["telefono"],
      "correo" => $_POST["correo"],
      "fechaNaci" => $_POST["fechaNaci"],
      "estado" => $_POST["estado"]
    );

    // print_r($datos);
    // die;

    $respuesta = EmpleadoModel::registrarEmpleado($datos);
    // print_r($respuesta);
    // echo "status" . $respuesta["status"];
    if ($respuesta["status"] == 200) {
      echo "<script> 
          

          Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
          )
       </script>";
    } else {

      echo "<script> 
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href>Why do I have this issue?</a>'
              })
        </script>";
    }
    // print_r($respuesta);

    return;
  }
}
