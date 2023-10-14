<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaTest extends Testcase{
    public function testDescontar(){
      $tarjeta = new FranquiciaCompleta(100);
      $tarjeta->descontarSaldo(120);
      $this->assertEquals($tarjeta->getSaldo(), 100);

      $tarjeta2ViajesGratis = new BoletoEducativoGratuito(200);
      $tarjeta2ViajesGratis->descontarSaldo(120);
      $this->assertEquals($tarjeta->getSaldo(),200);
      $tarjeta2ViajesGratis->descontarSaldo(120);
      $this->assertEquals($tarjeta->getSaldo(),200);
      $tarjeta2ViajesGratis->descontarSaldo(120);
      $this->assertEquals($tarjeta->getSaldo(),80);

      //Probamos que al día siguiente vuelvan los boletos gratuitos
      $tarjeta2ViajesGratis->setUltimoDia("yesterday");
      $tarjeta2ViajesGratis->descontarSaldo(120);
      $this->assertEquals($tarjeta2ViajesGratis->getSaldo(),80);
    }
}
