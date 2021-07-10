<?php

require_once "Conection.php";

class ProvedoresModel
{


  static public function getProveedores()
  {
    // die;
    $respuesta = Conection::connect()->prepare("
    SELECT 
    p.idProveedor,
    p.nombre,
    i.descripcion AS RNC,
    cr.descripcion AS correo,
    t.descripcion AS telefono,
    p1.provincia AS provincia,
    c.ciudad AS ciudad,
    td.direccion,
    p.descripcion AS observacion,
    CASE WHEN p.estado IS TRUE  THEN 'Activo' ELSE 'Inactivo' END AS estado
  
    FROM proveedor p
    INNER JOIN identificacion i ON p.idTercero = i.idTercero
    INNER JOIN tercero_correo tc ON p.idTercero = tc.idTercero
    INNER JOIN correo cr ON cr.idCorreo = tc.idCorreo
    INNER JOIN tercero_telefono tt ON p.idTercero = tt.idTercero
    LEFT JOIN telefono t ON t.idTelefono = tt.idTelefono
    INNER JOIN tercero_direccion td ON  p.idTercero = td.idTercero
    INNER JOIN direccion d ON d.idDireccion = td.idDireccion
    INNER JOIN provincia p1 ON p1.idProvincia = d.idProvincia
    INNER JOIN ciudad c ON c.idProvincia = p1.idProvincia
   
    
       ");
    $respuesta->execute();
    return $respuesta->fetchAll();
  }


  static public function getProvincia()
  {
    $respuesta = Conection::connect()->prepare("SELECT p.idProvincia, p.provincia FROM provincia p");
    $respuesta->execute();
    return $respuesta->fetchAll();
  }

  static public function getCiudad()
  {
    $respuesta = Conection::connect()->prepare("SELECT c.idCiuddad, c.ciudad FROM ciudad c");
    $respuesta->execute();
    return $respuesta->fetchAll();
  }



  static public function registrarProvedor($datos)
  {





    if (isset($datos["idProvedor"]) && $datos["idProvedor"] > 0) { /// NUEVO provedor
      $respuesta = Conection::connect()->prepare("CALL addProveedor (?,?,?,?,?,?,?,?,?,?)");
      $respuesta->bindParam("1", $datos["idProvedor"], PDO::PARAM_INT);
      $respuesta->bindParam("2", $datos["nombre"], PDO::PARAM_STR);
      $respuesta->bindParam("3", $datos["RNC"], PDO::PARAM_STR);
      $respuesta->bindParam("4", $datos["correo"], PDO::PARAM_STR);
      $respuesta->bindParam("5", $datos["telefono"], PDO::PARAM_STR);
      $respuesta->bindParam("6", $datos["provincia"], PDO::PARAM_STR);
      $respuesta->bindParam("7", $datos["ciudad"], PDO::PARAM_STR);
      $respuesta->bindParam("8", $datos["direccion"], PDO::PARAM_STR);
      $respuesta->bindParam("9", $datos["observacion"], PDO::PARAM_STR);
      // $respuesta->bindParam("10", $datos["creador_por"], PDO::PARAM_BOOL);
      $respuesta->bindParam("11", $datos["estado"], PDO::PARAM_STR);


      $respuesta->execute();
      return $respuesta->fetch();
    } else { /// EDITAR provedor
      $respuesta = Conection::connect()->prepare("CALL addProveedor (NULL,?,?,?,?,?,?,?,?,?,?)");
      $respuesta->bindParam("2", $datos["nombre"], PDO::PARAM_STR);
      $respuesta->bindParam("3", $datos["RNC"], PDO::PARAM_STR);
      $respuesta->bindParam("4", $datos["correo"], PDO::PARAM_STR);
      $respuesta->bindParam("5", $datos["telefono"], PDO::PARAM_STR);
      $respuesta->bindParam("6", $datos["provincia"], PDO::PARAM_STR);
      $respuesta->bindParam("7", $datos["ciudad"], PDO::PARAM_STR);
      $respuesta->bindParam("8", $datos["direccion"], PDO::PARAM_STR);
      $respuesta->bindParam("9", $datos["observacion"], PDO::PARAM_STR);
      $respuesta->bindParam("10", $datos["creador_por"], PDO::PARAM_BOOL);
      $respuesta->bindParam("11", $datos["estado"], PDO::PARAM_STR);

      $respuesta->execute();
      return $respuesta->fetch();
    }
  }
}
