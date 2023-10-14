<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoEducativoGratuitoTest extends Testcase{
  public function testDescontar(){
    $tarjeta2ViajesGratis = new BoletoEducativoGratuito(-80);
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
  }
}