<?php

require_once "Conection.php";

class ComprobanteModel
{
  static public function getComprobante($idTipoComprobante)
  {
    $respuesta = null;
    if ($idTipoComprobante == null) {
      $respuesta = Conection::connect()->prepare("
            SELECT 
              c.idTipoComprobante, 
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
                c.idTipoComprobante,
                c.descripcion AS categoria, 
                c.estado  
             FROM categoria c WHERE c.idTipoComprobante = $idTipoComprobante");
      $respuesta->execute();
      return $respuesta->fetch();
    }
  }

  static public function registrarComprobante($datos)
  {



    if (isset($datos["idTipoComprobante"]) && $datos["idTipoComprobante"] > 0) { /// NUEVO EMPLEADO
      $respuesta = Conection::connect()->prepare("UPDATE categoria c SET c.descripcion = ?, c.estado = ? WHERE c.idTipoComprobante = ?");
      $respuesta->bindParam("1", $datos["nombre"], PDO::PARAM_STR);
      $respuesta->bindParam("2", $datos["estado"], PDO::PARAM_BOOL);
      $respuesta->bindParam("3", $datos["idTipoComprobante"], PDO::PARAM_INT);

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
}
