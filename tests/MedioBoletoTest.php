<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class MedioBoletoTest extends Testcase{
  public function testDescontar(){
    $tarjeta = new MedioBoleto(100);
    $tarjeta->descontarSaldo(120);
    $this->assertEquals($tarjeta->getSaldo(), 40);

    $tarjeta5Min = new MedioBoleto(600);
    $tarjeta5Min->descontarSaldo(120);
    $this->assertFalse($tarjeta5Min->descontarSaldo(120));

    $tarjeta5ViajeNormal = new MedioBoleto(600);
    $tarjeta5ViajeNormal->descontarSaldo(120);
    $tarjeta5ViajeNormal->setUltimoViaje(time() - 5*60);
    $tarjeta5ViajeNormal->descontarSaldo(120);
    $tarjeta5ViajeNormal->setUltimoViaje(time() - 10*60);
    $tarjeta5ViajeNormal->descontarSaldo(120);
    $tarjeta5ViajeNormal->setUltimoViaje(time() - 15*60);
    $tarjeta5ViajeNormal->descontarSaldo(120);
    $tarjeta5ViajeNormal->setUltimoViaje(time() - 20*60);
    $tarjeta5ViajeNormal->descontarSaldo(120);
    $this->assertEquals($tarjeta5ViajeNormal->getSaldo(), 240);

    //Test para probar que al pasar el día vuelven sus 4 medio boletos//
    $tarjeta5ViajeNormal->setUltimoDia("yesterday");
    $tarjeta5ViajeNormal->setUltimoViaje(time() - 25*60);
    $tarjeta5ViajeNormal->descontarSaldo(120);
    $this->assertEquals($tarjeta5ViajeNormal->getCantViajes(), 3);
    $this->assertEquals($tarjeta5ViajeNormal->getSaldo(), 180);
  }
}