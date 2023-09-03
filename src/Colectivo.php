<?php
namespace TrabajoSube;
class Colectivo{
  protected $linea;
    
  public function __construct($linea){
    $this->linea = $linea;
  }

  public function getLinea(){
    return $this->linea;
  }
  
  public function pagarCon($tarjeta){
    $pase = $tarjeta->descontarSaldo();
    if($pase){
      new Boleto(120, $tarjeta->saldo);
    }
    return $pase;
  }
}