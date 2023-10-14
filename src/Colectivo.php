<?php
namespace TrabajoSube;
class Colectivo{
  protected $linea;
  protected $tarifa;

  public function __construct($linea, $tarifa){
    $this->linea = $linea;
    $this->tarifa = $tarifa;
  }

  public function getLinea(){
    return $this->linea;
  }

  public function pagarCon($tarjeta){
    if($tarjeta->descontarSaldo($this->tarifa)){
      $boleto = new Boleto($this->getLinea(), $tarjeta->getID(), $tarjeta, $this->tarifa*$tarjeta->tarifa, $tarjeta->getSaldo());
      $boleto->setDescripcion();
      return $boleto;
    } else {
      return false;
    }
  }
}