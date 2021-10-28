<?php

require_once "Conection.php";




class ConsultasModel
{

  static public function getDatos($table, $item, $value)
  {
    $data = null;
    if ($item != null) {
      $data = Conection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");
      $data->bindParam(":" . $item, $value, PDO::PARAM_STR);
      $data->execute();
      return $data->fetchAll();
    } else {
      $data = Conection::connect()->prepare("SELECT * FROM $table");
      $data->execute();
      return $data->fetchAll();
    }
  }
}
