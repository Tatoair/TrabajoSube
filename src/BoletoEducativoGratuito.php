<?php
namespace TrabajoSube;
class BoletoEducativoGratuito extends Tarjeta{
  protected $ultimoDia;
  protected $cantViajes;

  public function __construct($saldo = 0){
    $this->ID = uniqid();
    $this->saldo = $saldo;
    $this->ultimoDia = strtotime("today");
    $this->cantViajes = 2;
    $this->tarifa = 0;
  }

  public function setUltimoDia($dia){
    $this->ultimoDia = strtotime($dia);
  }

  public function descontarSaldo($saldo){
    //Reinicia la cantidad de viajes medio boleto
    if (strtotime("today")-$this->ultimoDia > 0){
      $this->cantViajes = 2;
      $this->setTarifa(0);
      $this->ultimoDia = strtotime("today");
    }

    if ($this->saldo - $saldo * $this->tarifa >= -211.84){
      if($this->cantViajes > 0){
        $this->cantViajes--;
      } else {
        $this->setTarifa(1);
      }
      $this->saldo -= $saldo * $this->tarifa;
      return true;
    } else {
      return false;
    }
  } 
}