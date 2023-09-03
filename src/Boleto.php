<?php
namespace TrabajoSube;
class Boleto{
  public $tarifa;
  public $saldoFinal;

  public function __construct($tarifa, $saldoFinal){
    $this->$tarifa = $tarifa;
    $this->$saldoFinal = $saldoFinal;
  }
}