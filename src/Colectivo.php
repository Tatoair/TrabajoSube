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
      $boleto = new Boleto($this->getLinea(), $tarjeta->getID(), $tarjeta, $tarjeta->getTarifa(), $tarjeta->getSaldo());
      $boleto->setDescripcion();
      return $boleto;
    } else {
      return false;
    }
  }
}