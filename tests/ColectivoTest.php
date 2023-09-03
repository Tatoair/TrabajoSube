<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{  
  public function testGetlinea(){
    $cole = new Colectivo(103);
    $this->assertEquals($cole->getLinea(), 103);
  }
  
  public function testPagar(){
    $tarjeta = new Tarjeta(380);
    $colectivo = new Colectivo(103);
    $colectivo->pagarCon($tarjeta);

    $this->assertEquals($tarjeta->saldo, 260);
  }
}