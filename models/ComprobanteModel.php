<?php

require_once "Conection.php";

class ComprobanteModel
{
  static public function getTipoComprobante()
  {

    $respuesta = Conection::connect()->prepare("SELECT c.idTipoComprobante, c.encabezado AS tipoComprobante FROM comprobante c");
    $respuesta->execute();
    return $respuesta->fetchAll();
  }


  static public function getComprobante($idTipoComprobante)
  {
    $respuesta = null;
    if ($idTipoComprobante == null) {
      $respuesta = Conection::connect()->prepare("
      SELECT ac.idTipoComprobante,
      ac.idTipoComprobante,
      c.encabezado AS comprobante,
      ac.idSucursal,
      ac.vencimiento, 
      ac.inicio,
      ac.final,
      ac.secuencia, 
          
      CASE WHEN ac.estado IS TRUE THEN 'Activo' ELSE 'Inactivo' END AS estado
      FROM adquirsicion_comprobante ac
      INNER JOIN comprobante c ON c.idTipoComprobante = ac.idTipoComprobante");
      $respuesta->execute();
      return $respuesta->fetchAll();
    } else {
      $respuesta = Conection::connect()->prepare("
      SELECT
         ac.idTipoComprobante,
          ac.idSucursal, 
          ac.vencimiento, 
          ac.inicio,
           ac.final,
           ac.secuencia,
            ac.estado
            FROM adquirsicion_comprobante ac WHERE ac.idTipoComprobante = $idTipoComprobante");
      $respuesta->execute();
      return $respuesta->fetch();
    }
  }





  static public function addComprobante($datos)
  {

    $exec = Conection::connect();

    try {

      $exec->beginTransaction();
      $exec->exec("INSERT INTO adquirsicion_comprobante (idTipoComprobante, vencimiento, inicio, final, secuencia, estado) VALUE ('" . $datos["idTipoComprobante"] . "',  '" . $datos["vencimiento"] . "', '" . $datos["inicio"] . "', '" . $datos["final"] . "', '" . $datos["secuencia"] . "', '" . $datos["secuencia"] . "')");


      $idComprobante = $exec->lastInsertId();

      $exec->commit();
      // echo "aasdfasdf: " . $idComprobante;
      return $idComprobante;
      ///
    } catch (PDOException $e) {
      //throw $th;
      $exec->rollBack();
      echo "Ah ocurrido un error: " . $e->getMessage();
      throw new Exception('internal-database-error');
    }























    // print_r($datos);
    // die;






















    // if (isset($datos["idTipoComprobante"]) && $datos["idTipoComprobante"] > 0) { /// NUEVO COMPROBANTE
    //   $respuesta = Conection::connect()->prepare("UPDATE adquirsicion_comprobante ac SET ac.vencimiento = ?, ac.inicio = ?, ac.final = ?, ac.secuencia = ?, ac.estado = ?  WHERE ac.idTipoComprobante = ?");
    //   $respuesta->bindParam("1", $datos["vencimiento"], PDO::PARAM_STR);
    //   $respuesta->bindParam("2", $datos["inicio"], PDO::PARAM_INT);
    //   $respuesta->bindParam("3", $datos["final"], PDO::PARAM_INT);
    //   $respuesta->bindParam("4", $datos["secuencia"], PDO::PARAM_INT);
    //   $respuesta->bindParam("5", $datos["estado"], PDO::PARAM_BOOL);
    //   $respuesta->bindParam("6", $datos["idTipoComprobante"], PDO::PARAM_INT);


    //   return $respuesta->execute();
    //   $respuesta->fetch();
    // } else { /// EDITAR COMPROBANTE  
    //   $respuesta = Conection::connect()->prepare("INSERT INTO adquirsicion_comprobante(idTipoComprobante ,vencimiento, inicio, final, secuencia, estado) VALUES(?,?,?,?,?,?);");
    //   $respuesta->bindParam("1", $datos["idTipoComprobante"], PDO::PARAM_INT);
    //   $respuesta->bindParam("2", $datos["vencimiento"], PDO::PARAM_STR);
    //   $respuesta->bindParam("3", $datos["inicio"], PDO::PARAM_INT);
    //   $respuesta->bindParam("4", $datos["final"], PDO::PARAM_INT);
    //   $respuesta->bindParam("5", $datos["secuencia"], PDO::PARAM_INT);
    //   $respuesta->bindParam("6", $datos["estado"], PDO::PARAM_BOOL);


    //   return $respuesta->execute();
    //   //  $respuesta->fetch();
    // }
  }
}
