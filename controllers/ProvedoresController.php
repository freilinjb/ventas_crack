<?php




class ProvedoresController
{

  ///CREAR PROVEDORES



  static public function ctrCrearProvedores()
  {

    if (isset($_POST["nombre"])) {
      if (
        preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST['nuevoProvedor']) &&
        preg_match('/^[0-9]+$/', $_POST["nuevoProvedor"])
      ) {
        $tabla = "provedor";

        $datos = array(
          "nombre" => $_POST["nombre"],
          "RNC" => $_POST["RNC"],
          "correo" => $_POST["correo"],
          "telefono" => $_POST["telefono"],
          "provincia" => $_POST["provincia"],
          "ciudad" => $_POST["ciudad"],
          "direccion" => $_POST["direccion"],
          "tipoUsuario" => $_POST["tipoUsuario"],
          "observacion" => $_POST["observacion"],
          "creado_por" => $_POST["creado_por"],


          "estado" => $_POST["estado"],

        );


        $respuesta = ProvedoresModel::mdlIngresarProvedor($datos);


        if ($respuesta == 'ok') {
          echo ' <script>

          swal({
            type: "error",
            title: "! el provedor se Guardo Correctamente",
            showConfirmButton: true,
            confirButtonText: "Cerrar",
            closeOnConfirm: false
          }).then((result)) => {
             if (result.value){
               windows.location = "index.php?route=provedores";
             }
            })


    </script>';
        }
      } else {

        echo ' <script>

                  swal({
                    type: "error",
                    title: "! el provedor no puede estar vacio",
                    showConfirmButton: true,
                    confirButtonText: "Cerrar",
                    closeOnConfirm: false
                  }).then((result)) => {
                     if (result.value){
                       windows.location = "index.php?route=provedores";
                     }
                    })


            </script>';
      }
    }
  }











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
      "observacion" => $_POST["observacion"],
      "creado_por" => $_POST["creado_por"],


      "estado" => $_POST["estado"],




    );

    $respuesta  = ProvedoresModel::registrarProvedor($datos);

    // print_r($respuesta);
    // echo "registrado";
    echo json_encode($respuesta);




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
