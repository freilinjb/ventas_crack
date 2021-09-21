<?php



class ContactoController
{

  public function getContacto($parame)
  {
    $resutado = ContactoModel::getContacto($parame);
    return $resutado;
  }
}
