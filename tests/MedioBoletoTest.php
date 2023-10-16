<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class MedioBoletoTest extends Testcase{
  public function testDescontar(){
    $tarjeta = new MedioBoleto(100);
    $tarjeta->setDia(3);
    $tarjeta->setHora(12);
    $tarjeta->descontarSaldo(120);
    $this->assertEquals($tarjeta->getSaldo(), 40);

    //Test para probar que se verifique que pasen 5 minutos antes que se page el siguiente// 
    $tarjeta5Min = new MedioBoleto(600);
    $tarjeta5Min->setDia(3);
    $tarjeta5Min->setHora(12);
    $tarjeta5Min->descontarSaldo(120);
    $this->assertFalse($tarjeta5Min->descontarSaldo(120));

    $tarjeta5ViajeNormal = new MedioBoleto(600);
    $tarjeta5ViajeNormal->setDia(3);
    $tarjeta5ViajeNormal->setHora(12);
    $tarjeta5ViajeNormal->descontarSaldo(120);
    $tarjeta5ViajeNormal->setUltimoViaje(time() - 5*60);
    $tarjeta5ViajeNormal->descontarSaldo(120);
    $tarjeta5ViajeNormal->setUltimoViaje(time() - 5*60);
    $tarjeta5ViajeNormal->descontarSaldo(120);
    $tarjeta5ViajeNormal->setUltimoViaje(time() - 5*60);
    $tarjeta5ViajeNormal->descontarSaldo(120);
    $tarjeta5ViajeNormal->setUltimoViaje(time() - 5*60);
    $tarjeta5ViajeNormal->descontarSaldo(120);
    $this->assertEquals($tarjeta5ViajeNormal->getSaldo(), 240);

    //Test para probar que al pasar el día vuelve el medio boleto//
    $tarjeta5ViajeNormal->setUltimoDia("yesterday");
    $tarjeta5ViajeNormal->setUltimoViaje(time() - 5*60);
    $tarjeta5ViajeNormal->descontarSaldo(120);
    $this->assertEquals($tarjeta5ViajeNormal->getSaldo(), 180);

    $tarjetaDiaNoHabil = new MedioBoleto(120);
    $tarjetaDiaNoHabil->setDia(0);
    $tarjetaDiaNoHabil->setHora(10);
    $this->assertFalse($tarjetaDiaNoHabil->descontarSaldo(120));

    $tarjetaHoraNoHabil = new MedioBoleto(120);
    $tarjetaHoraNoHabil->setDia(3);
    $tarjetaHoraNoHabil->setHora(3);
    $this->assertFalse($tarjetaHoraNoHabil->descontarSaldo(120));
  }

  public function testGetCantViajes(){
    $tarjeta = new MedioBoleto(100);
    $tarjeta->setDia(3);
    $tarjeta->setHora(12);
    $this->assertEquals($tarjeta->getCantViajes(), 4);
    $tarjeta->descontarSaldo(120);
    $this->assertEquals($tarjeta->getCantViajes(), 3);
    
    $tarjeta->setUltimoDia("yesterday");
    $tarjeta->setUltimoViaje(time() - 5*60);
    $tarjeta->descontarSaldo(120);
    $this->assertEquals($tarjeta->getCantViajes(), 3);
  }
}