<?php

require_once "../Models/ComprobanteModel.php";

class ComprobanteAjax
{
    public function addComprobante()
    {

        // print_r($_POST);
        // die;
        if (isset($_POST['comprobante'])) {
            # code...
            // print_r($_POST);
            // die;
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



    // public function eliminarComprobante()
    // {
    //     $idTipoComprobante = $_POST['idTipoComprobante'];

    //     // print_r($_POST);die;
    //     $respuesta = ComprobanteModel::eliminarComprobante($idTipoComprobante);
    //     // print_r($respuesta);
    //     if ($respuesta == true) {
    //         echo json_encode(
    //             array(
    //                 "ssucess" => true,
    //                 "exec" => "eliminarUsuario",
    //                 "msg" => "Se ha eliminado de forma correcta!!",
    //             )
    //         );
    //     } else {
    //         echo json_encode(
    //             array(
    //                 "error" => true,
    //                 "exec" => "actualizacion",
    //                 "msg" => "Ah ocurrido un error",
    //             )
    //         );
    //     }
    // }






    public function actualizandoComprobante()
    {

        $datos = array(
            "idAquisicion" => $_POST['idAquisicion'],
            'idTipoComprobante' => $_POST['idTipoComprobante'],
            'sucursal' => $_POST['sucursal'],
            'vencimiento' => $_POST['vencimiento'],
            'inicio' => $_POST['inicio'],
            'final' => $_POST['final'],
            'secuencia' => $_POST['secuencia'],
            'estado' => $_POST['estado'],
        );

        $resultado = ComprobanteModel::actualizandoComprobante($datos);

        if ($resultado == 0) {
            echo json_encode(
                array(
                    "error" => true,
                    "exec" => "actualizacion",
                    "msg" => "Ah ocurrido un error",
                )
            );
        } else {
            echo json_encode(
                array(
                    "ssucess" => true,
                    "exec" => "actualizacion",
                    "msg" => "Se ha actualizado de forma correcta",
                )
            );
        }



        // $datos = array(
        //     'idTipoComprobante' => $_POST['idTipoComprobante'],
        //     'sucursal' => $_POST['sucursal'],
        //     'vencimiento' => $_POST['vencimiento'],
        //     'inicio' => $_POST['inicio'],
        //     'final' => $_POST['final'],
        //     'secuencia' => $_POST['secuencia'],
        //     'estado' => $_POST['estado'],
        // );


        // $respuesta  = ComprobanteModel::addComprobante($datos);

        // // print_r($respuesta);
        // // die;
        // // echo "registrado";
        // echo json_encode($respuesta);
    }




    public function getTipoComprobante()
    {

        $idTipoComprobante = $_POST['idTipoComprobante'];
        $respuesta  = ComprobanteAjax::getTipoComprobante($idTipoComprobante);

        echo json_encode($respuesta);
    }
}



/*=============================================
Comprobamos que el valor no venga vacío
=============================================*/
// print_r($_POST);
// print_r($_GET);
// die;

if (isset($_GET['exec']) && !empty($_GET['exec'])) {
    // print_r($_POST);
    // die;

    $funcion = $_GET['exec'];
    $ejecutar = new ComprobanteAjax();
    // echo $funcion;
    //En función del parámetro que nos llegue ejecutamos una función u otra
    switch ($funcion) {

        case 'addComprobante':
            // echo "hola mundo";
            $ejecutar->addComprobante();
            // echo "hola mundo";
            break;



        case 'actualizandoComprobante':
            $ejecutar->actualizandoComprobante();
            //     // echo "hola mundo";
            break;

        case 'getTipoComprobante':
            $ejecutar->getTipoComprobante();
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
