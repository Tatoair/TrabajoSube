<?php
namespace TrabajoSube;
class Interurbano extends Colectivo{
  protected $linea;
  protected $tarifa;

  public function __construct($linea, $tarifa){
    $this->linea = $linea;
    $this->tarifa = 184;
  }
}