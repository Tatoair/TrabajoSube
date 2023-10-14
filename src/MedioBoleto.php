<?php
namespace TrabajoSube;
class MedioBoleto extends Tarjeta{
  protected $ultimoViaje;
  protected $ultimoDia;
  protected $cantViajes;

  public function __construct($saldo = 0){
    $this->ID = uniqid();
    $this->saldo = $saldo;
    $this->ultimoViaje = time()-5*60;
    $this->ultimoDia = strtotime("today");
    $this->cantViajes = 4;
    $this->tarifa = 0.5;
  }

  public function getCantViajes(){
    return $this->cantViajes;
  }

  public function setUltimoViaje($tiempo){
    $this->ultimoViaje = $tiempo;
  }

  public function setUltimoDia($dia){
    $this->ultimoDia = strtotime($dia);
  }

  public function descontarSaldo($saldo){
    //Reinicia la cantidad de viajes medio boleto
    if (strtotime("today")-$this->ultimoDia > 0){
      $this->cantViajes = 4;
      $this->setTarifa(0.5);
      $this->ultimoDia = strtotime("today");
    }

    if ($this->saldo - $saldo * $this->tarifa >= -211.84 && (time()-$this->ultimoViaje)/60 >= 5){
      if($this->cantViajes > 0){
        $this->cantViajes--;
      } else {
        $this->setTarifa(1);
      }
      $this->saldo -= $saldo * $this->tarifa;
      $this->ultimoViaje = time();
      return true;
    } else {
      return false;
    }
  }
}