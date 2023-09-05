<?php
namespace TrabajoSube;
class Tarjeta{
  public $saldo;
  public $viajePlus;

  public function __construct($saldo = 0){
    $this->saldo = $saldo;
    $this->viajePlus = 2;
  }
  
  public function descontarSaldo(){
    if ($this->saldo >= 120){
      $this->saldo-=120;
      return true;
    } else if ($this->saldo >= -91.84  && $this->viajePlus > 0){
      $this->saldo-=120;
      $this->viajePlus--;
      echo "Le quedan " . $this->viajePlus . "viajes plus.";
      return true;
    } else {
      echo "Se ha quedado sin viajes plus.";
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
      //Se reinician los viajes plus al quedar sin saldo negativo
      if($this->saldo >= 0){
        $this->viajePlus = 2;
      }
      return true;
    } else {
      echo "No es posible acreditarle " . $carga . " pesos, intente una cantidad dentro del rango de cargas";
      return false;
    }
  }
}

class MedioBoleto extends Tarjeta{
  public function descontarSaldo(){
    $this->saldo-=60;
  }
  
}

class FranquiciaCompleta extends Tarjeta{
  public function descontarSaldo(){
    $this->saldo-=0;
  }
}

