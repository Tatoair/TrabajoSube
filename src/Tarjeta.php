<?php
namespace TrabajoSube;
class Tarjeta{
  protected $ID;
  protected $saldo;
  protected $saldoPendiente;
  protected $tarifa;
  private $viajes;
  private $descuentoFrecuente;
  private $ultimoMes;

  public function __construct($saldo = 0){
    $this->ID = uniqid();
    $this->saldo = $saldo;
    $this->saldoPendiente = 0;
    $this->tarifa = 1;
    $this->viajes = 0;
    $this->ultimoMes = date("m");
  }

  public function getID(){
    return $this->ID;
  }

  public function getSaldo(){
    return $this->saldo;
  }

  public function getTarifa(){
    return $this->tarifa;
  }

  public function getSaldoPendiente(){
    return $this->saldoPendiente;
  }

  public function getViajes(){
    return $this->viajes;
  }

  public function setTarifa($tarifa){
    $this->tarifa = $tarifa;
  }

  public function setViajes($viajes){
    $this->viajes = $viajes;
  }

  private function setDescuentoFrecuente($viajes){
    if ($viajes < 30) {
      $this->descuentoFrecuente = 1;
    } else if ($viajes < 80) {
      $this->descuentoFrecuente = 0.8;
    } else {
      $this->descuentoFrecuente = 0.75;
    }
  }

  protected function acreditarSaldoPendiente(){
    if ($this->saldoPendiente > 0) {
      $this->saldo += $this->saldoPendiente;
      if ($this->saldo > 6600) {
        $this->saldoPendiente = $this->saldo-6600;
        $this->saldo = 6600;
      } else {
        $this->saldoPendiente = 0;
      }
    }
  }
  
  public function descontarSaldo($saldo){
    if(date("m") != $this->ultimoMes){
      $this->viajes = 0;
    }
    $this->setDescuentoFrecuente($this->viajes);
    if ($this->saldo - $saldo * $this->tarifa * $this->descuentoFrecuente >= -211.84){
      $this->saldo -= $saldo * $this->tarifa * $this->descuentoFrecuente;
      $this->viajes++;
      $this->ultimoMes = date("m");
      $this->acreditarSaldoPendiente();
      return true;
    } else {
      return false;
    }
  }

  public function cargarSaldo($carga){
    $cargaValida = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];

    //Verifica si la carga ingresada es valida y carga el monto//
    if (in_array($carga, $cargaValida)) {
      if ($this->saldo + $carga > 6600) {
        $this->saldoPendiente += $carga - (6600-$this->saldo);
        $this->saldo = 6600;
      } else {
        $this->saldo += $carga;
      }
      return true;
    } else {
      echo "No es posible acreditarle " . $carga . " pesos, intente una cantidad dentro del rango de cargas";
      return false;
    }
  }
}
