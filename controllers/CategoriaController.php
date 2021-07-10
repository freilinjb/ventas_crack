<?php

class CategoriaController
{
  static public function getCategoria($idCategoria = null)
  {
    $respuesta = CategoriaModel::getCategoria($idCategoria);
    return $respuesta;
  }
}
