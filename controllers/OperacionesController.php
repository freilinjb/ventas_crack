<?php

class OperacionesController {

    static public function getOperaciones($item, $value) {
        $table = "operacionfabricacion";
        $request = OperacionesModel::getData($table, $item, $value);

        return $request;
    }

    static public function registrarOperacion() {
        if(isset($_POST["estandar"])) {
            if(
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["estandar"]) &&
                preg_match('/^[-.\/-0-9]+$/', $_POST["estado"])){

                $datos = array("estandar"=>$_POST["estandar"],
                                "estado"=>$_POST["estado"]); 
                                
                $respuesta = OperacionesModel::registrarOperacion($datos);
            }
        }
    }
}