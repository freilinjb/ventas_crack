<?php

require_once "../Models/ProductoModel.php";

class ProductoAjax
{
    public $idProducto;
    public $idCategoria;
    // public $idTipoProducto;
    // public $idSubTipoProducto;
    public $idSubCategoria;
    public $idMarca;
    public $idUnidad;



    public function registrarProducto()
    {
        // print_r($_POST);
        // die;
        $datos = array(



            // "idProducto" => $_POST["idProducto"],
            "creado_por" => 1,
            "codigo" => $_POST["codigo"],
            "nombre" => $_POST["nombre"],
            "categoria" => $_POST["idCategoria"],
            "subcategoria" => $_POST["idSubcategoria"],
            "marca" => $_POST["idMarca"],
            "unidad" => $_POST["idUnidad"],
            "descripcion" => $_POST["descripcion"],
            "stockIni" => $_POST["stockIni"],
            "stockMini" => $_POST["stockMini"],
            "reorden" => $_POST["reorden"],
            "itbis" => $_POST["itbis"],
            "precioCompra" => $_POST["precioCompra"],
            "precioVenta" => $_POST["precioVenta"],
            "estado" => $_POST["estado"],
            // "creado_por" => 1,
            // "codigo" => $_POST["codigo"],
            // "nombre" => $_POST["nombre"],
            // "categoria" => $_POST["categoria"],
            // "subcategoria" => $_POST["subcategoria"],
            // "marca" => $_POST["marca"],
            // "unidad" => $_POST["unidad"],
            // "descripcion" => $_POST["descripcion"],
            // "stockIni" => $_POST["stockIni"],
            // "stockMini" => $_POST["stockMini"],
            // "precioCompra" => $_POST["precioCompra"],
            // "precioVenta" => $_POST["precioVenta"],
            // "estado" => $_POST["estado"],

        );
        // print_r($datos);
        // die;
        $respuesta  = ProductoModel::registrarProducto($datos);

        // print_r($respuesta);
        // echo "registrado";
        echo json_encode($respuesta);

        // print_r($datos);
        // die;
    }


    public function actualizandoProducto()
    {

        $datos = array(
            "idProducto" => $_POST["idProducto"],
            "creado_por" => 1,
            "codigo" => $_POST["codigo"],
            "nombre" => $_POST["nombre"],
            "categoria" => $_POST["idCategoria"],
            "subcategoria" => $_POST["idSubcategoria"],
            "marca" => $_POST["idMarca"],
            "unidad" => $_POST["idUnidad"],
            "descripcion" => $_POST["descripcion"],
            "stockIni" => $_POST["stockIni"],
            "stockMini" => $_POST["stockMini"],
            "reorden" => $_POST["reorden"],
            "itbis" => $_POST["itbis"],
            "precioCompra" => $_POST["precioCompra"],
            "precioVenta" => $_POST["precioVenta"],
            "estado" => $_POST["estado"],
        );

        // print_r($datos);
        // die;



        $respuesta  = ProductoModel::registrarProducto($datos);

        // print_r($respuesta);
        // die;
        // echo "registrado";
        echo json_encode($respuesta);
    }



    public function eliminarProducto()
    {
        if (preg_match('/^[0-9]+$/', $_POST['idProducto'])) {
            $idProducto = $_POST['idProducto'];
            // echo "idEmpleado; " . $idEmpleado;die;
            $respuesta  = ProductoModel::eliminarProducto($idProducto);

            echo json_encode($respuesta);
        } else {
            $datos = array("msg" => "Solo se admiten numeros", "status" => 200);
            echo json_encode($datos);
        }
    }

    public function getProducto()
    {

        $idProducto = $_POST['idProducto'];
        $respuesta  = ProductoModel::getProducto($idProducto);

        echo json_encode($respuesta);
    }




    public function getCategorias()
    {

        $tabla = "categoria";

        $respuesta = ProductoModel::getData($tabla, null, null);
        echo  json_encode($respuesta);
    }

    public function getSubCategorias()
    {

        $tabla = "subcategoria";

        $respuesta = ProductoModel::getData($tabla, null, null);
        echo  json_encode($respuesta);
    }

    public function getMarca()
    {

        $tabla = "marca";

        $respuesta = ProductoModel::getData($tabla, null, null);
        echo  json_encode($respuesta);
    }


    public function getUnidad()
    {

        $tabla = "unidad";

        $respuesta = ProductoModel::getData($tabla, null, null);
        echo  json_encode($respuesta);
    }
}

/*=============================================
Comprobamos que el valor no venga vacío
=============================================*/
if (isset($_POST['exec']) && !empty($_POST['exec'])) {

    $funcion = $_POST['exec'];
    $ejecutar = new ProductoAjax();
    //En función del parámetro que nos llegue ejecutamos una función u otra
    switch ($funcion) {


        case 'registrarProducto':
            $ejecutar->registrarProducto();
            // echo "hola mundo";
            break;
        case 'actualizandoProducto':
            $ejecutar->actualizandoProducto();
            // echo "hola mundo";
            break;
        case 'getCategorias':
            $ejecutar->getCategorias();
            break;



        case 'getCategorias':
            $ejecutar->getCategorias();
            break;
        case 'getSubCategorias':
            $ejecutar->getSubCategorias();
            break;
        case 'getMarca':
            $ejecutar->getMarca();
            break;
        case 'getUnidad':
            $ejecutar->getUnidad();
            break;
    }
}
