<?php


//nota = nombre tabla + campo + valor
class ConsultasController
{
  static public function getDatos($table, $item, $value)
  {
    $resultado = ConsultasModel::getDatos($table, $item, $value);
    return $resultado;
  }
}
