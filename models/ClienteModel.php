<?php
require_once "Conection.php";
session_start();

class ClienteModel
{
  static public function getClientes($item, $value)
  {
  }


  static public function getCliente($ID)
  {
  }


  static public function getTipoIdentificacion()
  {
    $respuesta = Conection::connect()->prepare("SELECT tg.idTipo,tg.descriccion 
            FROM tipo_general tg WHERE tg.tipo = 'user' AND  tg.estado IS TRUE");

    $respuesta->execute();
    return $respuesta->fetchAll();
  }

  static public function getTipoComprobante()
  {
    $respuesta = Conection::connect()->prepare("SELECT s.idSexo, S.sexo FROM sexo S");
    $respuesta->execute();
    return $respuesta->fetchAll();
  }

  static public function getVendedor()
  {
    $respuesta = Conection::connect()->prepare("SELECT s.idSexo, S.sexo FROM sexo S");
    $respuesta->execute();
    return $respuesta->fetchAll();
  }




  static public function registrarCliente($datos)
  {
    $exec = Conection::connect();


    try {
      print_r($_SESSION);
      die;
      // $stmt = Conection::connect()->prepare("INSERT INTO tercero (creado_por) VALUES(:creado_por)");
      // // |$exec$stmt->bindParam(":creado_por", $_SESSION['idUser'], PDO::PARAM_INT);


      // $exec->exec("INSERT INTO persona(idTercero, nombre) 
      //    VALUES($idTercero, '" . $datos["nombre"] . "')");
      // $idPersona = $exec->lastInsertId();




      // $exec->exec("INSERT INTO identificacion (idTercero, idTipoIdentificacoin, descripcion) VALUES ($idTercero, '" . $datos["idTipoIdentificacion"] . "',  '" . $datos["descripcion"] . "')");
      // $idTipoIdentificacion = $exec->lastInsertId();

      // $exec->exec("INSERT INTO tipo_general (idTipo) VALUE ($idTipoIdentificacion)");



      //   if (isset($datos["telefono"]) && !empty($datos["telefono"])) {
      //     $exec->exec("INSERT INTO telefono(descripcion)
      //     VALUES('" . $datos["telefono"] . "')");
      //     $idTelefono = $exec->lastInsertId();

      //     $exec->exec("INSERT INTO tercero_telefono(idTercero, idTelefono)
      //     VALUES($idTercero, $idTelefono)");
      //   }

      //   if (isset($datos["correo"]) && !empty($datos["correo"])) {
      //     $exec->exec("INSERT INTO correo(demscripcion)
      //     VALUES('" . $datos["correo"] . "')");
      //     $idCorreo = $exec->lastInsertId();

      //     $exec->exec("INSERT INTO tercero_correo(idTercero, idCorreo)
      //     VALUES($idTercero, $idCorreo)");
      //   }




      //   $exec->exec("INSERT INTO cliente(idTercero, idTipoComprobante, idVendedor, timeCredito,limiteCredito, ApliDescuento, descuento, obervacion, estado)
      // VALUES ($idTercero, $idTipoIdentificacion, idEmpleado, timeCredito, limiteCredito, ApliDescuento, descuento, observacion, estado);");
      //   $idCliente = $exec->lastInsertId();


      //   $exec->commit();
      //   return $idCliente;
      //
      //
      //
    } catch (PDOException $e) {

      // $exec->rollBack();
      // echo "Ah ocurrido un error: " . $e->getMessage();
      // throw new Exception('internal-database-error');
    }
  }



  static public function eliminarCliente()
  {
  }
}
