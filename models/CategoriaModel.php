<?php

require_once "Conection.php";

class CategoriaModel
{
  static public function getCategoria($idCategoria)
  {
    $respuesta = null;
    if ($idCategoria == null) {
      $respuesta = Conection::connect()->prepare("
            SELECT 
              c.idCategoria, 
              c.descripcion AS categoria,
              CASE WHEN c.estado IS TRUE THEN 'Activo' ELSE 'Inactivo' END AS estado,
              COALESCE(u.user, ' - ')  AS creado_por
          FROM categoria c
          LEFT JOIN user u ON u.idUser = c.creado_por");
      $respuesta->execute();
      return $respuesta->fetchAll();
    } else {
      $respuesta = Conection::connect()->prepare("
            SELECT 
                c.idCategoria,
                c.descripcion AS categoria, 
                c.estado  
             FROM categoria c WHERE c.idCategoria = $idCategoria");
      $respuesta->execute();
      return $respuesta->fetch();
    }
  }

  static public function registrarCategoria($datos)
  {



    if (isset($datos["idCategoria"]) && $datos["idCategoria"] > 0) { /// NUEVO EMPLEADO
      $respuesta = Conection::connect()->prepare("UPDATE categoria c SET c.descripcion = ?, c.estado = ? WHERE c.idCategoria = ?");
      $respuesta->bindParam("1", $datos["nombre"], PDO::PARAM_STR);
      $respuesta->bindParam("2", $datos["estado"], PDO::PARAM_BOOL);
      $respuesta->bindParam("3", $datos["idCategoria"], PDO::PARAM_INT);

      return $respuesta->execute();
      //$respuesta->fetch();
    } else { /// EDITAR EMPLEADO
      $respuesta = Conection::connect()->prepare("INSERT INTO categoria(descripcion, estado, creado_por) VALUES(?,?,?);");
      $respuesta->bindParam("1", $datos["nombre"], PDO::PARAM_STR);
      $respuesta->bindParam("2", $datos["estado"], PDO::PARAM_INT);
      $respuesta->bindParam("3", $datos["creado_por"], PDO::PARAM_INT);

      return $respuesta->execute();
      //  $respuesta->fetch();
    }
  }



  static public function eliminarCategoria($ID)
  {
    echo "hola prueba";
    die;
    $data = Conection::connect()->prepare("DELETE FROM categoria  WHERE idCategoria = " . $ID . "");

    $data->execute();
    return $data->fetch();
  }
}
