<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends Testcase{
  public function testCargar(){
    $saldos = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];

    foreach ($saldos as &$saldo){
      $tarjeta = new Tarjeta();
      $this->assertTrue($tarjeta->cargarSaldo($saldo));
    }

    $tarjetaMax = new Tarjeta(5000);
    $this->assertTrue($tarjetaMax->cargarSaldo(2000));
    $this->assertEquals($tarjetaMax->getSaldo(), 6600);
    $this->assertEquals($tarjetaMax->getSaldoPendiente(), 400);

    $tarjetaNoValida = new Tarjeta();
    $this->assertFalse($tarjetaNoValida->cargarSaldo(245));
    $this->assertEquals($tarjetaNoValida->getSaldo(), 0);

    $tarjetaNegativa = new Tarjeta(-211.84);
    $tarjetaNegativa->cargarSaldo(300);
    $this->assertEquals($tarjetaNegativa->getSaldo(), 88.16);
  }

  public function testDescontar(){
    $tarjeta = new Tarjeta(200);
    $this->assertTrue($tarjeta->descontarSaldo(120));
    $this->assertEquals($tarjeta->getSaldo(), 80);

    $tarjetaNegativa = new Tarjeta(-120);
    $this->assertFalse($tarjetaNegativa->descontarSaldo(120));

    $tarjetaPendiente = new Tarjeta(6600);
    $tarjetaPendiente->cargarSaldo(150);
    $tarjetaPendiente->descontarSaldo(120);
    $this->assertEquals($tarjetaPendiente->getSaldo(), 6600);
    $this->assertEquals($tarjetaPendiente->getSaldoPendiente(), 30);
    $tarjetaPendiente->descontarSaldo(120);
    $this->assertEquals($tarjetaPendiente->getSaldo(), 6510);
    $this->assertEquals($tarjetaPendiente->getSaldoPendiente(), 0);

    //Sin descuento//
    $tarjetaDescontable = new Tarjeta(6600);
    $tarjetaDescontable->descontarSaldo(120);
    $this->assertEquals($tarjetaDescontable->getSaldo(), 6480);
    //Descuento 20%//
    $tarjetaDescontable->setViajes(30);
    $tarjetaDescontable->descontarSaldo(120);
    $this->assertEquals($tarjetaDescontable->getSaldo(), 6384);
    //Descuento 25%//
    $tarjetaDescontable->setViajes(80);
    $tarjetaDescontable->descontarSaldo(120);
    $this->assertEquals($tarjetaDescontable->getSaldo(), 6294);

    if($tarjetaDescontable->getUltimoMes() == 1){
      $tarjetaDescontable->setUltimoMes(12);
    } else {
      $tarjetaDescontable->setUltimoMes($tarjetaDescontable->getUltimoMes()-1);
    }
    $tarjetaDescontable->descontarSaldo(120);
    $this->assertEquals($tarjetaDescontable->getViajes(),1);
  }

  public function testGetViajes(){
    $tarjeta = new Tarjeta(100);
    $tarjeta->setViajes(10);
    $this->assertEquals($tarjeta->getViajes(), 10);
  }
}