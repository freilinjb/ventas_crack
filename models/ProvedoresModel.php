<?php

require "Conection.php";

class ProvedoresModel
{


  static public function getProveedores()
  {


    $respuesta = Conection::connect()->prepare("
        SELECT 
        p.idProveedor,
        p.nombre,
        i.descripcion AS RNC,
        cr.descripcion AS correo,
        t.descripcion AS telefono,
        p1.provincia AS provincia,
        c.ciudad AS ciudad,
        p.descripcion,
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
}
