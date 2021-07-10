<?php

class ComprobanteController
{
  static public function geComprobante($idTipoComprobante = null)
  {
    $respuesta = ComprobanteModel::geComprobante($idTipoComprobante);
    return $respuesta;
  }
}
