<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends Testcase{
  public function testCargar(){
    //Test de carga simple
    $tarjeta1 = new Tarjeta();
    $this->assertTrue($tarjeta1->cargarSaldo(3500));
    $this->assertEquals($tarjeta1->saldo, 3500);

    //Test de carga excediendo el máximo
    $tarjeta2 = new Tarjeta(5000);
    $this->assertFalse($tarjeta2->cargarSaldo(2000));
    $this->assertEquals($tarjeta2->saldo, 5000);

    //Test de carga con monto no valido
    $tarjeta3 = new Tarjeta();
    $this->assertFalse($tarjeta3->cargarSaldo(245));
    $this->assertEquals($tarjeta3->saldo, 0);
  }

  public function testDescontar(){
    //Test de descontar simple
    $tarjeta = new Tarjeta(200);
    $tarjeta->descontarSaldo();
    $this->assertEquals($tarjeta->saldo, 80);
  }
}

class MedioBTest extends Testcase{
  public function testDescontar(){
    //Test de descontar para medio boleto//
    $tarjeta = new MedioBoleto(100);
    $tarjeta->descontarSaldo();
    $this->assertEquals($tarjeta->saldo, 40);
  }
}

class FranqCompTest extends Testcase{
  public function testDescontar(){
    //Test de descontar para franquicia completa//
    $tarjeta = new FranquiciaCompleta(100);
    $tarjeta->descontarSaldo();
    $this->assertEquals($tarjeta->saldo, 100);
  }
}