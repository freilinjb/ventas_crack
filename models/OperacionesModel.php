<?php 

require_once "Conection.php";


class OperacionesModel { 

    static public function getData($table, $item, $value) {
        $data = null;
        if($item != null) {
			$data = Conection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
            $data -> bindParam(":".$item, $value, PDO::PARAM_STR);
            $data -> execute();
            return $data -> fetchAll();
            

		} else {
			$data = Conection::connect()->prepare("SELECT * FROM $table");
            $data -> execute();
            
			return $data -> fetchAll();
        }
		$data = null;
    }

	static public function eliminarOperacion($tabla, $datos){

		$stmt = Conection::connect()->prepare("DELETE FROM $tabla WHERE idEstandar = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

        return ($stmt -> execute()) ? true : false;
		$stmt = null;
	}

    static public function registrarOperacion($datos) {

        print_r($datos);
        
        $stmt = Conection::connect()->prepare("INSERT INTO estandar(Estandar, estado) 
        VALUES (:Estandar, :estado)");

        $stmt->bindParam(":Estandar", $datos["Estandar"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_INT);

        return $stmt->execute() ? true : false;
    }
}