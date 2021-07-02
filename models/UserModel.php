<?php 

require_once "Conection.php";


class UserModel {

    static public function showUsers($item, $value) {
        if($item != null) {
            $data = Conection::connect()->prepare("SELECT u.idUser,u.idEmpleado,u.user, u.clave,tg.descriccion AS tipoUsuario, CONCAT(p.nombre, ' ', p.apellido) AS nombre FROM user u 
            INNER JOIN tipo_general tg ON tg.idTipo = u.idTipoUser
            INNER JOIN empleado e ON e.idEmpreado = u.idEmpleado
            INNER JOIN persona p ON p.idPersona = e.idPersona WHERE $item = :$item");
            $data -> bindParam(":".$item, $value, PDO::PARAM_STR);
            $data -> execute();

			return $data -> fetch();
        } else {
            $data = Conection::connect()->prepare("SELECT u.idUser,u.idEmpleado,u.user, u.clave,tg.descriccion AS tipoUsuario,CONCAT(p.nombre, ' ', p.apellido) AS nombre FROM user u 
            INNER JOIN tipo_general tg ON tg.idTipo = u.idTipoUser
            INNER JOIN empleado e ON e.idEmpreado = u.idEmpleado
            INNER JOIN persona p ON p.idPersona = e.idPersona");

			$data -> execute();

			return $data -> fetchAll();
        }
    }

    static public function registrarUsuario($datos) {

        $request = null;

        if(isset($data["idUsuario"])) {
            $request = Conection::connect()->prepare("CALL registrarUsuario(?,?,?,?,?)");

            $request->bindParam("1", $datos["idUsuario"], PDO::PARAM_INT);
            $request->bindParam("2", $datos["idEmpleado"], PDO::PARAM_INT);
            $request->bindParam("3", $datos["usuario"], PDO::PARAM_STR);
            $request->bindParam("4", $datos["clave"], PDO::PARAM_STR);
            $request->bindParam("5", $datos["idEstado"], PDO::PARAM_INT);

        } else {
            $request = Conection::connect()->prepare("CALL registrarUsuario(NULL,?,?,?,?)");

            $request->bindParam("1", $datos["idEmpleado"], PDO::PARAM_INT);
            $request->bindParam("2", $datos["usuario"], PDO::PARAM_STR);
            $request->bindParam("3", $datos["clave"], PDO::PARAM_STR);
            $request->bindParam("4", $datos["idEstado"], PDO::PARAM_INT);
        }
        
        $request->execute();
        return $request -> fetch();
    }
}