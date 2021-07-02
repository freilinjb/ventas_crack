<?php

class CategoriaController
{
    static public function getCategoria($idCategoria = null)
    {
      $respuesta = CategoriaModel::getCategoria($idCategoria);
      return $respuesta;
    }

    static public function registrarEmpleado($datos)
    {
  
      // if(isset($datos["idEmpleado"]) && $datos["idEmpleado"] > 0) {
      //   echo "existe";
      // } else {
      //   echo "no existe";
      // }
      // print_r($_POST);die;
      if (isset($datos["idCategoria"]) && $datos["idCategoria"] > 0) { /// NUEVO EMPLEADO
        $respuesta = Conection::connect()->prepare("CALL registrarEmpleado (?,?,?,?,?,?,?,?,?,?,?,?)");
        $respuesta->bindParam("1", $datos["idEmpleado"], PDO::PARAM_INT);
        $respuesta->bindParam("2", $datos["nombre"], PDO::PARAM_STR);
        $respuesta->bindParam("3", $datos["apellido"], PDO::PARAM_STR);
        $respuesta->bindParam("4", $datos["sexo"], PDO::PARAM_INT);
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
        $respuesta = Conection::connect()->prepare("INSERT INTO categoria(descripcion, estado, creado_por) VALUES(?,?,?);");
        $respuesta->bindParam("1", $datos["nombre"], PDO::PARAM_STR);
        $respuesta->bindParam("2", $datos["estado"], PDO::PARAM_INT);
  
        $respuesta->execute();
        return $respuesta->fetch();
      }
    }
}