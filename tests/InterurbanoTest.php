<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class InterurbanoTest extends TestCase{  
  public function testGetlinea(){
    $cole = new Interurbano(103);
    $this->assertEquals($cole->getLinea(), 103);
  }

  public function testPagar(){
    $tarjeta = new Tarjeta(380);
    $colectivo = new Interurbano(103);
    $boleto = $colectivo->pagarCon($tarjeta);
    $this->assertEquals($boleto->getSaldo(), 196);

    $tarjeta1 = new Tarjeta(-200);
    $this->assertFalse($colectivo->pagarCon($tarjeta1));
  }
}