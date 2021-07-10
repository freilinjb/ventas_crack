<?php




class ProvedoresController
{

  static public function getProveedores()
  {
    // $table = "proveedor_v";
    $respuesta = ProvedoresModel::getProveedores();

    return $respuesta;
  }


  static public function getProvincia()
  {
    // $table = "proveedor_v";
    $respuesta = ProvedoresModel::getProvincia();

    return $respuesta;
  }


  static public function getCiudad()
  {
    // $table = "proveedor_v";
    $respuesta = ProvedoresModel::getCiudad();

    return $respuesta;
  }


  public function registrarProvedor()
  {

    $datos = array(
      "nombre" => $_POST["nombre"],
      "RNC" => $_POST["RNC"],
      "correo" => $_POST["correo"],
      "telefono" => $_POST["telefono"],
      "provincia" => $_POST["provincia"],
      "ciudad" => $_POST["ciudad"],
      "direccion" => $_POST["direccion"],
      "tipoUsuario" => $_POST["tipoUsuario"],
      "Observacion" => $_POST["Observacion"],

      "estado" => $_POST["estado"],




    );

    $respuesta  = ProvedoresModel::registrarProvedor($datos);

    // print_r($respuesta);
    // echo "registrado";
    echo json_encode($respuesta);


    // print_r($datos);
    // die;

    $respuesta = ProvedoresModel::registrarProvedor($datos);
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
