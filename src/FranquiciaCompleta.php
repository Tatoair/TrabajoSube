<?php
namespace TrabajoSube;
class FranquiciaCompleta extends Tarjeta{
  public function __construct($saldo = 0){
    $this->ID = uniqid();
    $this->saldo = $saldo;
    $this->tarifa = 0;
  }

  public function descontarSaldo($saldo){
    if ($this->saldo - $saldo * $this->tarifa >= -211.84){
      $this->saldo -= $saldo * $this->tarifa;
      $this->acreditarSaldoPendiente();
      return true;
    } else {
      return false;
    }
  }
}