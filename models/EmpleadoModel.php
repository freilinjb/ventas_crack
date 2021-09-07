<?php

require_once "Conection.php";

class EmpleadoModel
{

  static public function getTipoUsuario()
  {
    $respuesta = Conection::connect()->prepare("SELECT tg.idTipo,tg.descriccion 
            FROM tipo_general tg WHERE tg.tipo = 'user' AND  tg.estado IS TRUE");

    $respuesta->execute();
    return $respuesta->fetchAll();
  }

  static public function getSexo()
  {
    $respuesta = Conection::connect()->prepare("SELECT s.idSexo, S.sexo FROM sexo S");
    $respuesta->execute();
    return $respuesta->fetchAll();
  }

  static public function registrarEmpleado($datos)
  {

    // if(isset($datos["idEmpleado"]) && $datos["idEmpleado"] > 0) {
    //   echo "existe";
    // } else {
    //   echo "no existe";
    // }
    // print_r($_POST);die;
    if (isset($datos["idEmpleado"]) && $datos["idEmpleado"] > 0) { /// NUEVO EMPLEADO
      $respuesta = Conection::connect()->prepare("CALL registrarEmpleado (?,?,?,?,?,?,?,?,?,?,?,?)");
      $respuesta->bindParam("1", $datos["idEmpleado"], PDO::PARAM_INT);
      $respuesta->bindParam("2", $datos["nombre"], PDO::PARAM_STR);
      $respuesta->bindParam("3", $datos["apellido"], PDO::PARAM_STR);
      $respuesta->bindParam("4", $datos["idSexo"], PDO::PARAM_INT);
      $respuesta->bindParam("5", $datos["identifcacion"], PDO::PARAM_STR);
      $respuesta->bindParam("6", $datos["fechaNacimiento"], PDO::PARAM_STR);
      $respuesta->bindParam("7", $datos["usuario"], PDO::PARAM_STR);
      $respuesta->bindParam("8", $datos["clave"], PDO::PARAM_STR);
      $respuesta->bindParam("9", $datos["idTipoUser"], PDO::PARAM_INT);
      $respuesta->bindParam("10", $datos["estado"], PDO::PARAM_BOOL);
      $respuesta->bindParam("11", $datos["telefono"], PDO::PARAM_STR);
      $respuesta->bindParam("12", $datos["correo"], PDO::PARAM_STR);

      $respuesta->execute();
      return $respuesta->fetch();
    } else { /// EDITAR EMPLEADO
      $respuesta = Conection::connect()->prepare("CALL registrarEmpleado (null,?,?,?,?,?,?,?,?,?,?,?)");
      $respuesta->bindParam("1", $datos["nombre"], PDO::PARAM_STR);
      $respuesta->bindParam("2", $datos["apellido"], PDO::PARAM_STR);
      $respuesta->bindParam("3", $datos["idSexo"], PDO::PARAM_INT);
      $respuesta->bindParam("4", $datos["identificacion"], PDO::PARAM_STR);
      $respuesta->bindParam("5", $datos["fechaNacimiento"], PDO::PARAM_STR);
      $respuesta->bindParam("6", $datos["usuario"], PDO::PARAM_STR);
      $respuesta->bindParam("7", $datos["clave"], PDO::PARAM_STR);
      $respuesta->bindParam("8", $datos["tipoUsuario"], PDO::PARAM_INT);
      $respuesta->bindParam("9", $datos["estado"], PDO::PARAM_BOOL);
      $respuesta->bindParam("10", $datos["telefono"], PDO::PARAM_STR);
      $respuesta->bindParam("11", $datos["correo"], PDO::PARAM_STR);

      $respuesta->execute();
      return $respuesta->fetch();
    }
  }

  static public function getEmpleados($item, $value)
  {
    if ($item != null) {
      $data = Conection::connect()->prepare("
      SELECT u.idUser,
      u.user,
      p.nombre,
      p.apellido,
      p.fechaNaci,
      s.sexo,
      u.idTipoUser,
      c.descripcion AS correo, 
      t.descripcion AS telefono,
      u.idEmpleado,
      CASE WHEN e.estado IS TRUE  THEN 'Activo' ELSE 'Inactivo' END AS estado
      FROM user u
      INNER JOIN empleado e ON e.idEmpreado = u.idEmpleado
      INNER JOIN persona p ON p.idPersona = e.idPersona
      INNER JOIN sexo s ON s.idSexo = p.idSexo
      INNER JOIN tercero_telefono tt ON p.idTercero = tt.idTercero
      INNER JOIN telefono t ON t.idTelefono = tt.idTelefono
      INNER JOIN tercero_correo tc ON tc.idTercero = p.idTercero
      INNER JOIN correo c ON c.idCorreo = tc.idCorreo
                WHERE $item = :$item");
      $data->bindParam(":" . $item, $value, PDO::PARAM_INT);
      $data->execute();
      return $data->fetch();
    } else {
      $data = Conection::connect()->prepare("
      SELECT * FROM empleado_v");
      $data->execute();
      return $data->fetchAll();
    }
  }


  static public function getEmpleado($ID)
  {
    // echo "hola prueba" . $ID;
    // die;
    $data = Conection::connect()->prepare("
        SELECT * FROM empleado_v
        WHERE idUser = $ID");

    $data->execute();
    return $data->fetch();
  }

  static public function eliminarEmpleado($ID)
  {
    // echo "hola prueba";die;
    $data = Conection::connect()->prepare("CALL eliminarEmpleado ($ID)");

    $data->execute();
    return $data->fetch();
  }
}
