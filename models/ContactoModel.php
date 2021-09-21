
<?php

require_once "Conection.php";


class ContactoModel
{
  public function getContacto($parame)
  {
    $condicion = '';
    ////////////////////////////////////////////////////
    //Condicion para saber si es cliente o provedor
    if ($parame->todo === false) {
      # code...
      if ($parame->esCliente) {
        # code...
        $condicion = " AND c.esCliente IS TRUE";
      } elseif ($parame->esProvedor) {
        # code...
        $condicion = " AND c.esProvedor";
      }
    }
    ///////////////////////////////////////////////////////


    $respuesta = Conection::connect()->prepare("
      
       SELECT 
            c.idContacto, 
            c.nombre, 
            c.razonSocial AS razon_social, 
            CASE WHEN c.esCliente IS TRUE THEN 1 ELSE 0 END esCliente,
            CASE WHEN c.esProveedor IS TRUE THEN 1 ELSE 0 END esProveedor,
            c1.descripcion AS correo,
            t.descripcion AS telefono,
            tp.nombre AS tipoIdentificacion,
            i.Identificacion AS identificacion,
            CASE WHEN c.estado IS TRUE THEN 1 ELSE 0 END estado 
        FROM contacto c 
        INNER JOIN identificacion i ON c.idTercero = i.idTercero
        INNER JOIN tipo tp ON i.idTipoIdentificacion = tp.idtipo
        LEFT JOIN tercero_correo tc ON tc.idTercero = c.idTercero
        LEFT JOIN correo c1 ON tc.idCorreo = c1.idCorreo
        LEFT JOIN tercero_telefono tt ON tt.idTercero = c.idTercero
        LEFT JOIN telefono t ON tt.idTelefono = t.idTelefono
        WHERE 1 = 1 $condicion
    
 
 
 
 ");
    $respuesta->execute();
    return $respuesta->fetchAll();
  }
}
