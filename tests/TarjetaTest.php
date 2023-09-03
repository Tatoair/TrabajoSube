<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends Testcase{
  public function testCargar(){
    $tarjeta1 = new Tarjeta();
    $this->assertTrue($tarjeta1->cargarSaldo(3500));
    $this->assertEquals($tarjeta1->saldo, 3500);

    $tarjeta2 = new Tarjeta(5000);
    $this->assertFalse($tarjeta2->cargarSaldo(2000));
    $this->assertEquals($tarjeta2->saldo, 5000);

    $tarjeta3 = new Tarjeta();
    $this->assertFalse($tarjeta3->cargarSaldo(245));
    $this->assertEquals($tarjeta3->saldo, 0);
  }
}
