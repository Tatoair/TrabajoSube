<?php
namespace TrabajoSube;
class MedioBoleto extends Tarjeta{
  public function __construct($ID, $saldo = 0){
    $this->ID = uniqid();
    $this->saldo = $saldo;
    $this->tarifa = 60;
  }
}