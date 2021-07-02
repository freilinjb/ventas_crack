<?php

require_once "Conection.php";

class UsuarioModel
{
  static public function getUsuarios($table, $item, $value)
  {

    if ($item != null) {
      $data = Conection::connect()->prepare("SELECT u.idUser, u.idEmpleado, u.user, u.clave,tg.descriccion AS tipoUsuario  FROM $table u 
        INNER JOIN tipo_general tg ON tg.idTipo = u.idTipoUser WHERE $item = :$item");
      $data->bindParam(":" . $item, $value, PDO::PARAM_STR);
      $data->execute();
      return $data->fetch();
    } else {
      $data = Conection::connect()->prepare("SELECT * FROM $table");
      $data->execute();

      return $data->fetchAll();
    }
  }
}
