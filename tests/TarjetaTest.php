<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends Testcase{
  public function testCargar(){
    /*$cargas = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];

    $cargasNovalid = [125, 375, 425, 475, 575, 675, 1375, 1475, 1975, 2475, 2975, 3475, 3975];

    $cargaExcedida = 4000;*/

    $tarjeta1 = new Tarjeta(0);
    $this->assertTrue($tarjeta1->cargarSaldo(3500));
    $tarjeta1->cargarSaldo(3500);
    $this->assertEquals($tarjeta1->saldo, 3500);

    $tarjeta2 = new Tarjeta(5000);
    $this->assertFalse($tarjeta2->cargarSaldo(2000));
    $tarjeta2->cargarSaldo(2000);
    $this->assertEquals($tarjeta2->saldo, 5000);

    $tarjeta3 = new Tarjeta(0);
    $this->assertFalse($tarjeta3->cargarSaldo(245));
    $tarjeta3->cargarSaldo(245);
    $this->assertEquals($tarjeta3->saldo, 0);

    /*
      $this->assertEquals(
        $tarjeta->cargarSaldo($carga),
        0,
        "Algo salio mal"
      );

    foreach ($cargasNovalid as &$carga){
      $this->assertEquals(
        $tarjeta->cargarSaldo($carga),
        2,
        "El mensaje del test es incorrecto"
      );
    }
    
    $tarjeta = new Tarjeta(4000);
      $this->assertEquals(
        $tarjeta->cargarSaldo($cargaExcedida),
        1
      );
    */
  }
}
