<?php

class ComprobanteController
{
  static public function geComprobante($idTipoComprobante = null)
  {
    $respuesta = ComprobanteModel::getComprobante($idTipoComprobante);
    return $respuesta;
  }
}
