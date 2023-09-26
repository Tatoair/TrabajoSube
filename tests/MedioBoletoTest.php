<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class MedioBoletoTest extends Testcase{
  public function testDescontar(){
    $tarjeta = new MedioBoleto(100);
    $tarjeta->descontarSaldo();
    $this->assertEquals($tarjeta->getSaldo(), 40);
  }
}