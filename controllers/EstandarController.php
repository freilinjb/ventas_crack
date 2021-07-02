<?php

class EstandarController {

    static public function getEstandar($item, $value) {
        $table = "estandar";
        $request = EstandarModel::getData($table, $item, $value);

        return $request;
    }

    static public function registrarEstandar() {
        if(isset($_POST["estandar"])) {
            if(
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["estandar"]) &&
                preg_match('/^[-.\/-0-9]+$/', $_POST["estado"])){

                $datos = array("estandar"=>$_POST["estandar"],
                                "estado"=>$_POST["estado"]); 
                                
                $respuesta = EstandarModel::registrarEstandar($datos);
            }
        }
    }
}