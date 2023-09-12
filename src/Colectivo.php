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
    if($tarjeta->descontarSaldo()){
      return new Boleto(120, $tarjeta->saldo);
    } else {
      return false;
    }
  }
}