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
    //Verifica si la carga ingresada es valida y carga el monto//
    if($this->saldo + $carga > 6600){
      echo "No es posible acreditarle " . $carga . " pesos, intente una cantidad menor";
    }
    
    else if($this->saldo > 150 && $this->saldo <= 500 && $this->saldo % 50 == 0){
      $this->saldo += $carga;
    }
    else if($this->saldo > 500 && $this->saldo <= 1500 && $this->saldo % 100 == 0){
      $this->saldo += $carga;
    }
    else if($this->saldo > 1500 && $this->saldo <= 4000 && $this->saldo % 500 == 0){
      $this->saldo += $carga;
    }
    //Si la carga no es alguna de los acordados//
    else {
      echo "No es posible acreditarle " . $carga . " pesos, intente una cantidad dentro del rango de cargas";
    }
  }
}
