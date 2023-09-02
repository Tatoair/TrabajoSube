<?php
namespace TrabajoSube;
class Tarjeta{
  public $saldo;

  public function __construct($saldo = 0){
    $this->saldo = $saldo;
  }
  
  public function descontarSaldo(){
    //Descuenta el valor de Un pasaje al saldo de la tarjeta//
    $this->saldo-=120;
  }
  
  public function cargarSaldo($carga){
    $cargaValida = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];

    //Verifica si la carga ingresada es valida y carga el monto//
    if($this->saldo + $carga > 6600){
      echo "No es posible acreditarle " . $carga . " pesos, intente una cantidad menor";
    } else if (in_array($carga, $cargaValida)){
      $this->saldo += $carga;
    }
    //Si la carga no es alguna de los acordados//
    else {
      echo "No es posible acreditarle " . $carga . " pesos, intente una cantidad dentro del rango de cargas";
    }
  }
}
