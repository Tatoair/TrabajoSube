<?php
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
      $boleto = new Boleto($this->getLinea(), $tarjeta->getID(), get_class($tarjeta), $tarjeta->getTarifa(), $tarjeta->getSaldo());
      $boleto->setDescription();
      return $boleto;
    } else {
      return false;
    }
  }
}