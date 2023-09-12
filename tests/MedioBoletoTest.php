<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class MedioBTest extends Testcase{
  public function testDescontar(){
    $tarjeta = new MedioBoleto(100);
    $tarjeta->descontarSaldo();
    $this->assertEquals($tarjeta->saldo, 40);
  }
}