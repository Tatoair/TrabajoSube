<?php
namespace TrabajoSube;
class FranquiciaCompleta extends Tarjeta{
  protected $dia;
  protected $hora;
  
  public function __construct($saldo = 0){
    $this->ID = uniqid();
    $this->saldo = $saldo;
    $this->tarifa = 0;
    $this->dia = date("w");
    $this->hora = date("G");
  }

  public function setDia($dia){
    $this->dia = $dia;
  }

  public function setHora($hora){
    $this->hora = $hora;
  }

  public function descontarSaldo($saldo){
    if($this->dia > 0 && $this->dia < 6 && $this->hora >= 6 && $this->hora <= 22){
      $this->saldo -= $saldo * $this->tarifa;
      return true;
    } else {
      return false;
    }
  }
}