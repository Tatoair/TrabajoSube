<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoEducativoGratuitoTest extends Testcase{
  public function testDescontar(){
    $tarjeta2ViajesGratis = new BoletoEducativoGratuito(-80);
    $tarjeta2ViajesGratis->setDia(3);
    $tarjeta2ViajesGratis->setHora(12);
    $tarjeta2ViajesGratis->descontarSaldo(120);
    $this->assertEquals($tarjeta2ViajesGratis->getSaldo(),-80);
    $tarjeta2ViajesGratis->descontarSaldo(120);
    $this->assertEquals($tarjeta2ViajesGratis->getSaldo(),-80);
    $tarjeta2ViajesGratis->descontarSaldo(120);
    $this->assertEquals($tarjeta2ViajesGratis->getSaldo(),-200);
    $this->assertFalse($tarjeta2ViajesGratis->descontarSaldo(120));

    //Probamos que al día siguiente vuelvan los boletos gratuitos
    $tarjeta2ViajesGratis->setUltimoDia("yesterday");
    $tarjeta2ViajesGratis->descontarSaldo(120);
    $this->assertEquals($tarjeta2ViajesGratis->getSaldo(),-200);

    $tarjetaDiaNoHabil = new BoletoEducativoGratuito(120);
    $tarjetaDiaNoHabil->setDia(0);
    $tarjetaDiaNoHabil->setHora(10);
    $this->assertFalse($tarjetaDiaNoHabil->descontarSaldo(120));

    $tarjetaHoraNoHabil = new BoletoEducativoGratuito(120);
    $tarjetaHoraNoHabil->setDia(3);
    $tarjetaHoraNoHabil->setHora(3);
    $this->assertFalse($tarjetaHoraNoHabil->descontarSaldo(120));
  }
}