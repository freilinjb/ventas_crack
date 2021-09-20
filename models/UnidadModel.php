<?php

require_once "Conection.php";

class UnidadModel
{
  static public function getUnidad($idUnidad)
  {
    $respuesta = null;
    if ($idUnidad == null) {
      $respuesta = Conection::connect()->prepare("
            SELECT 
              un.idUnidad, 
              un.descripcion AS unidad,
              CASE WHEN un.estado IS TRUE THEN 'Activo' ELSE 'Inactivo' END AS estado,
              COALESCE(u.user, ' - ')  AS creado_por
          FROM unidad un
          LEFT JOIN user u ON u.idUser = un.creado_por");
      $respuesta->execute();
      return $respuesta->fetchAll();
    } else {
      $respuesta = Conection::connect()->prepare("
            SELECT 
                un.idUnidad,
                un.descripcion AS unidad, 
                un.estado  
             FROM unidad un WHERE un.idUnidad = $idUnidad");
      $respuesta->execute();
      return $respuesta->fetch();
    }
  }


  static public function eliminarUnidad($idUnidad)
  {
    // echo "hola prueba";die;

    $respuesta = Conection::connect()->prepare("
         SELECT 
              un.idUnidad,
              un.descripcion AS unidad, 
              un.estado  
             FROM unidad un WHERE un.idUnidad = " . $idUnidad . "
        LIMIT 1");
    $respuesta->execute();
    $records = $respuesta->fetchAll();

    $idUnidad = $records[0]['idUnidad'];


    if (count($records) > 0) {

      Conection::connect()->prepare("DELETE FROM unidad WHERE idUnidad = $idUnidad")->execute();
    }

    return (count($records) > 0) ? true : false;
  }










  static public function registrarUnidad($datos)
  {


    if (isset($datos["idUnidad"]) && $datos["idUnidad"] > 0) { /// NUEVO UNIDAD
      $respuesta = Conection::connect()->prepare("UPDATE unidad un SET un.descripcion = ?, un.estado = ? WHERE un.idUnidad = ?");
      $respuesta->bindParam("1", $datos["nombre"], PDO::PARAM_STR);
      $respuesta->bindParam("2", $datos["estado"], PDO::PARAM_BOOL);
      $respuesta->bindParam("3", $datos["idUnidad"], PDO::PARAM_INT);

      return $respuesta->execute();
      //$respuesta->fetch();
    } else { /// EDITAR UNIDAD  
      $respuesta = Conection::connect()->prepare("INSERT INTO unidad(descripcion, estado, creado_por) VALUES(?,?,?);");
      $respuesta->bindParam("1", $datos["nombre"], PDO::PARAM_STR);
      $respuesta->bindParam("2", $datos["estado"], PDO::PARAM_INT);
      $respuesta->bindParam("3", $datos["creado_por"], PDO::PARAM_INT);

      return $respuesta->execute();
      //  $respuesta->fetch();
    }
  }
}
