<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranqCompTest extends Testcase{
    public function testDescontar(){
      $tarjeta = new FranquiciaCompleta(100);
      $tarjeta->descontarSaldo();
      $this->assertEquals($tarjeta->saldo, 100);
    }
  }