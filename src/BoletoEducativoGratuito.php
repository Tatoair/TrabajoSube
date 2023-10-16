<?php
namespace TrabajoSube;
class BoletoEducativoGratuito extends FranquiciaCompleta {
  protected $ultimoDia;
  protected $cantViajes;

  public function __construct($saldo = 0){
    $this->ID = uniqid();
    $this->saldo = $saldo;
    $this->ultimoDia = strtotime("today");
    $this->cantViajes = 2;
    $this->tarifa = 0;
    $this->dia = date("w");
    $this->hora = date("G");
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
      if($this->dia > 0 && $this->dia < 6 && $this->hora >= 6 && $this->hora <= 22){
        if($this->cantViajes > 0){
          $this->cantViajes--;
        } else {
          $this->setTarifa(1);
        }
        $this->saldo -= $saldo * $this->tarifa;
        $this->acreditarSaldoPendiente();
        return true;
      }
    }
    return false;    
  }
} 
