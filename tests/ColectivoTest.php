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
    $boleto = new Boleto(120, 260);
    $this->assertEquals($colectivo->pagarCon($tarjeta), $boleto);

    $tarjeta1 = new Tarjeta(-200);
    $this->assertFalse($colectivo->pagarCon($tarjeta1));
  }
}