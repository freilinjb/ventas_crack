<?php

/**
 * CONTROLADORES
 */
require_once "Controllers/TemplateController.php";
require_once "Controllers/UserController.php";
// require_once "Controllers/PruebaCrack.php";
require_once "Controllers/ProductoController.php";

require_once "Controllers/DesarrolloProductosController.php";


require_once "Controllers/EstandarController.php";
require_once "Controllers/OperacionesController.php";

require_once "Controllers/EmpleadoController.php";

require_once "Controllers/ProductoController.php";
require_once "Controllers/CategoriaController.php";


require_once "Controllers/UnidadController.php";

require_once "Controllers/ProductoController.php";

require_once "Controllers/ClienteController.php";

require_once "Controllers/ProvedoresController.php";

require_once "Controllers/ComprobanteController.php";




/**
 * MODELOS
 */
// require_once "Models/EmployeeModel.php";
require_once "Models/UserModel.php";
// require_once "Models/PruebaModel.php";
require_once "Models/ProductoModel.php";

require_once "Models/DesarrolloProductosModel.php";

require_once "Models/EstandarModel.php";
require_once "Models/OperacionesModel.php";

require_once "Models/EmpleadoModel.php";

require_once "Models/ProductoModel.php";
require_once "Models/CategoriaModel.php";


require_once "Models/UnidadModel.php";

require_once "Models/ProductoModel.php";


require_once "Models/ClienteModel.php";


//PROVEEDOR
require_once "Models/ProvedoresModel.php";


require_once "Models/ComprobanteModel.php";


$template = new TemplateController();
$template->template();
