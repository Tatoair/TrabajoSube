<?php
namespace TrabajoSube;
class Boleto{
  public $mensaje;

  public function __construct($mensaje = ""){
    $this->mensaje = $mensaje;
  }
  
  public function generarBoleto($tarjeta){
    $this->mensaje = "Costo del Boleto: $120\n Saldo final: " . $tarjeta->saldo;
    echo $this->mensaje;
  }
}
