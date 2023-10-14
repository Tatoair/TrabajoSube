<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaTest extends Testcase{
    public function testDescontar(){
      $tarjeta = new FranquiciaCompleta(100);
      $tarjeta->descontarSaldo(120);
      $this->assertEquals($tarjeta->getSaldo(), 100);
    }
}