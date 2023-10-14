<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoEducativoGratuitoTest extends Testcase{
  public function testDescontar(){
    //Test para probar que una tarjeta de boleto educativo gratuito no pueda hacer más de 2 gratis por día
    $tarjeta = new BoletoEducativoGratuito(-80);
    //Se descuenta una vez, paga 0
    $tarjeta->descontarSaldo(120);
    $this->assertEquals($tarjeta->getSaldo(),-80);
    //Se descuenta otra vez, paga 0
    $tarjeta->descontarSaldo(120);
    $this->assertEquals($tarjeta->getSaldo(),-80);
    //Se descuenta una vez más, paga 120
    $tarjeta->descontarSaldo(120);
    $this->assertEquals($tarjeta->getSaldo(),-200);
    //No puede pagar nuevamente al no tener saldo
    $this->assertFalse($tarjeta->descontarSaldo(120));

    //Probamos que al día siguiente vuelvan los boletos gratuitos
    $tarjeta->setUltimoDia("yesterday");
    $tarjeta->descontarSaldo();
    $this->assertEquals($tarjeta->getSaldo(),-200);
  }
}