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


  static public function getComprobante($idAquisicion)
  {
    $respuesta = null;
    if ($idAquisicion == null) {
      $respuesta = Conection::connect()->prepare("
      SELECT
      ac.idAquisicion, 
      ac.idTipoComprobante,
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
      ac.idAquisicion,
         ac.idTipoComprobante,
          ac.idSucursal, 
          ac.vencimiento, 
          ac.inicio,
           ac.final,
           ac.secuencia,
            ac.estado
            FROM adquirsicion_comprobante ac WHERE ac.idAquisicion, = $idAquisicion");
      $respuesta->execute();
      return $respuesta->fetch();
    }
  }





  static public function addComprobante($datos)
  {

    $exec = Conection::connect();

    try {

      $exec->beginTransaction();
      $exec->exec("INSERT INTO adquirsicion_comprobante (idTipoComprobante, vencimiento, inicio, final, secuencia, estado) VALUE ('" . $datos["idTipoComprobante"] . "',  '" . $datos["vencimiento"] . "', '" . $datos["inicio"] . "', '" . $datos["final"] . "', '" . $datos["secuencia"] . "', '" . $datos["estado"] . "')");


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

  }



  static public function actualizandoComprobante($datos)
  {


    $respuesta = Conection::connect()->prepare("
        SELECT
          ac.idAquisicion,
          ac.idTipoComprobante,
          ac.idSucursal, 
          ac.vencimiento, 
          ac.inicio,
          ac.final,
          ac.secuencia,
          ac.estado
            FROM adquirsicion_comprobante ac
            WHERE ac.idAquisicion = " . $datos['idAquisicion'] . "
        LIMIT 1");
    $respuesta->execute();
    $records = $respuesta->fetchAll();

    print_r($records);


    if (count($records) > 0) {

      $data = Conection::connect()->prepare("UPDATE adquirsicion_comprobante ac SET ac.idTipoComprobante = " . $datos['idTipoComprobante'] . ", ac.vencimiento = '" . $datos['vencimiento'] . "', ac.inicio = '" . $datos['inicio'] . "', ac.final = '" . $datos['final'] . "', ac.secuencia = " . $datos['secuencia'] . "', ac.estado = " . $datos['estado'] . " 
           WHERE ac.idAquisicion = " . $datos['idAquisicion'] . "")->execute();

      return $data;
    }
  }


  static public function eliminarComprobante($idAquisicion)
  {
    $respuesta = Conection::connect()->prepare("
    SELECT
    ac.idAquisicion,
    ac.idTipoComprobante,
     ac.idSucursal, 
     ac.vencimiento, 
     ac.inicio,
      ac.final,
      ac.secuencia,
       ac.estado
       FROM adquirsicion_comprobante ac
        WHERE ac.idAquisicion = " . $idAquisicion . "
        LIMIT 1");
    $respuesta->execute();
    $records = $respuesta->fetchAll();

    $idAquisicion = $records[0]['idAquisicion'];


    if (count($records) > 0) {

      Conection::connect()->prepare("DELETE FROM adquirsicion_comprobante WHERE idAquisicion = $idAquisicion")->execute();
    }

    return (count($records) > 0) ? true : false;
  }
}
