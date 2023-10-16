<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaCompletaTest extends Testcase{
    public function testDescontar(){
      $tarjeta = new FranquiciaCompleta(100);
      $tarjeta->setDia(3);
      $tarjeta->setHora(12);
      $tarjeta->descontarSaldo(120);
      $this->assertEquals($tarjeta->getSaldo(), 100);

      $tarjetaDiaNoHabil = new FranquiciaCompleta(120);
      $tarjetaDiaNoHabil->setDia(0);
      $tarjetaDiaNoHabil->setHora(10);
      $this->assertFalse($tarjetaDiaNoHabil->descontarSaldo(120));

      $tarjetaHoraNoHabil = new FranquiciaCompleta(120);
      $tarjetaHoraNoHabil->setDia(3);
      $tarjetaHoraNoHabil->setHora(3);
      $this->assertFalse($tarjetaHoraNoHabil->descontarSaldo(120));
    }
}
