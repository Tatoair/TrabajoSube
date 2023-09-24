<?php
namespace TrabajoSube;
class Tarjeta{
  protected $ID;
  protected $saldo;
  protected $tarifa;

  public function __construct($ID, $saldo = 0){
    $this->ID = uniqid();
    $this->saldo = $saldo;
    $this->tarifa = 120;
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
  
  public function descontarSaldo(){
    if ($this->saldo - $tarifa >= -211.84){
      $this->saldo-=$tarifa;
      return true;
    } else {
      return false;
    }
  }
  
  public function cargarSaldo($carga){
    $cargaValida = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];

    //Verifica si la carga ingresada es valida y carga el monto//
    if($this->saldo + $carga > 6600){
      echo "No es posible acreditarle " . $carga . " pesos, intente una cantidad menor";
      return false;
    } else if (in_array($carga, $cargaValida)){
      $this->saldo += $carga;
      return true;
    } else {
      echo "No es posible acreditarle " . $carga . " pesos, intente una cantidad dentro del rango de cargas";
      return false;
    }
  }
}