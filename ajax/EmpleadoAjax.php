<?php

require_once "../Models/EmpleadoModel.php";

class EmpleadoAjax
{
    public $idEmpleado;
    public $idSexo;
    public $idDepartamento;
    public $tipoUsuario;
    public $datosEmpleado;

    public function registrarEmpleado()
    {

        $datos = array(
            "nombre" => $_POST["nombre"],
            "apellido" => $_POST["apellido"],
            "idSexo" => $_POST["idSexo"],
            "identificacion" => $_POST["identificacion"],
            "fechaNacimiento" => $_POST["fechaNacimiento"],
            "usuario" => $_POST["usuario"],
            "clave" => $_POST["clave"],
            "tipoUsuario" => $_POST["tipoUsuario"],
            "telefono" => $_POST["telefono"],
            "correo" => $_POST["correo"],
            "estado" => $_POST["estado"],
        );

        $respuesta  = EmpleadoModel::registrarEmpleado($datos);

        // print_r($respuesta);
        // die;
        echo json_encode($respuesta);
    }

    public function actualizandoEmpleado()
    {

        $datos = array(
            "idEmpleado" => $_POST["idEmpleado"],
            "nombre" => $_POST["nombre"],
            "apellido" => $_POST["apellido"],
            "sexo" => $_POST["sexo"],
            "identificacion" => $_POST["identificacion"],
            "fechaNacimiento" => $_POST["fechaNacimiento"],
            "usuario" => $_POST["usuario"],
            "clave" => $_POST["clave"],
            "tipoUsuario" => $_POST["tipoUsuario"],
            "telefono" => $_POST["telefono"],
            "correo" => $_POST["correo"],
            "estado" => $_POST["estado"],
        );

        $respuesta  = EmpleadoModel::registrarEmpleado($datos);

        echo json_encode($respuesta);
    }

    public function getEmpleado()
    {

        $idEmpleado = $_POST['idEmpleado'];
        $respuesta  = EmpleadoModel::getEmpleado($idEmpleado);

        echo json_encode($respuesta);
    }

    public function eliminarEmpleado()
    {
        if (preg_match('/^[0-9]+$/', $_POST['idEmpleado'])) {
            $idEmpleado = $_POST['idEmpleado'];
            // echo "idEmpleado; " . $idEmpleado;die;
            $respuesta  = EmpleadoModel::eliminarEmpleado($idEmpleado);

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
    $ejecutar = new EmpleadoAjax();
    //En función del parámetro que nos llegue ejecutamos una función u otra
    switch ($funcion) {

        case 'registrarEmpleado':
            $ejecutar->registrarEmpleado();
            // echo "hola mundo";
            break;

        case 'registrarProveedor':
            $ejecutar->registrarEmpleado();
            // echo "hola mundo";
            break;

        case 'actualizandoEmpleado':
            $ejecutar->actualizandoEmpleado();
            // echo "hola mundo";
            break;

        case 'getEmpleado':
            $ejecutar->getEmpleado();
            // echo "hola mundo";
            break;

        case 'eliminarEmpleado':
            $ejecutar->eliminarEmpleado();
            // echo "hola mundo";
            break;
        case 'funcion2':
            $b->accion2();
            break;
    }
}
