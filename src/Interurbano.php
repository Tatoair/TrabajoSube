<?php
namespace TrabajoSube;
class Colectivo{
  protected $linea;
  protected $tarifa;

  public function __construct($linea, $tarifa){
    $this->linea = $linea;
    $this->tarifa = 184;
  }
}