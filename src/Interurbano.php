<?php
namespace TrabajoSube;
class Interurbano extends Colectivo{
  protected $linea;
  protected $tarifa;

  public function __construct($linea){
    $this->linea = $linea;
    $this->tarifa = 184;
  }
}