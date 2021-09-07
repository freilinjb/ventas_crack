<?php

class UnidadController
{
  static public function getUnidad($idUnidad = null)
  {
    $respuesta = UnidadModel::getUnidad($idUnidad);
    return $respuesta;
  }
}
