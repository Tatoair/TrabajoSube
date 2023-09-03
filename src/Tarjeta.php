<?php
namespace TrabajoSube;
class Tarjeta{
  public $saldo;

  public function __construct($saldo = 0){
    $this->saldo = $saldo;
  }
  
  public function descontarSaldo(){
    if ($this->saldo < 120){
      return false;
    } else {
      $this->saldo-=120;
      return true;
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
