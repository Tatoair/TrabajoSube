<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends Testcase{
  public function testCargar(){
    $saldos = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];

    //Test de carga en todos los rangos aceptados
    foreach ($saldos as &$saldo){
      $tarjeta1 = new Tarjeta();
      $this->assertTrue($tarjeta1->cargarSaldo($saldo));
    }

    //Test de carga excediendo el máximo
    $tarjeta2 = new Tarjeta(5000);
    $this->assertFalse($tarjeta2->cargarSaldo(2000));
    $this->assertEquals($tarjeta2->saldo, 5000);

    //Test de carga con monto no valido
    $tarjeta3 = new Tarjeta();
    $this->assertFalse($tarjeta3->cargarSaldo(245));
    $this->assertEquals($tarjeta3->saldo, 0);

    //Test de carga con saldo negativo
    $tarjeta4 = new Tarjeta(-211.84);
    $tarjeta4->cargarSaldo(300);
    $this->assertEquals($tarjeta4->saldo, 88.16);
  }

  public function testDescontar(){
    //Test de descontar simple
    $tarjeta = new Tarjeta(200);
    $this->assertTrue($tarjeta->descontarSaldo());
    $this->assertEquals($tarjeta->saldo, 80);
    
    $tarjeta1 = new Tarjeta(-120);
    $this->assertFalse($tarjeta1->descontarSaldo());
  }
}
