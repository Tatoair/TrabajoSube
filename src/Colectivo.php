<?php
namespace TrabajoSube;
class Colectivo{
  protected $linea;
  protected $tarifa;

  public function __construct($linea){
    $this->linea = $linea;
    $this->tarifa = 120;
  }

  public function getLinea(){
    return $this->linea;
  }

  public function pagarCon($tarjeta){
    if($tarjeta->descontarSaldo($this->tarifa)){
      $boleto = new Boleto($this->getLinea(), $tarjeta->getID(), $tarjeta, $this->tarifa*$tarjeta->getTarifa(), $tarjeta->getSaldo());
      $boleto->setDescripcion();
      return $boleto;
    } else {
      return false;
    }
  }
}