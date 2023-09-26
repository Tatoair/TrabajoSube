<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class MedioBoletoTest extends Testcase{
  public function testDescontar(){
    $tarjeta = new MedioBoleto(100);
    $tarjeta->descontarSaldo();
    $this->assertEquals($tarjeta->getSaldo(), 40);

    //Test para probar que se verifique que pasen 5 minutos antes que se page el siguiente// 
    $tarjeta = new MedioBoleto(600);
    $tarjeta->descontarSaldo();
    $this->assertFalse($tarjeta->descontarSaldo());

    //Test para probar que cuenta con 4 medioboletos, y el quinto se cobra normal//
    $tarjeta1= new MedioBoleto(600);
    //Viaje 1 , saldo restante: 540
    $tarjeta1->descontarSaldo();
    $tarjeta1->setUltimoViaje(time() - 5*60);
    //Viaje 2, saldo restante: 480
    $tarjeta1->descontarSaldo();
    $tarjeta1->setUltimoViaje(time() - 10*60);
    //Viaje 3, saldo restante: 420
    $tarjeta1->descontarSaldo();
    $tarjeta1->setUltimoViaje(time() - 15*60);
    //Viaje 4, saldo restante:360
    $tarjeta1->descontarSaldo();
    $tarjeta1->setUltimoViaje(time() - 20*60);
    //Viaje 5, NO mas MEDIO BOLETO por el resto del día, saldo restante: 240//
    $tarjeta1->descontarSaldo();
    $this->assertEquals($tarjeta1->getSaldo(), 240);

    //Test para probar que al pasar el día vuelven sus 4 medio boletos//
    $this->setUltimoDia("tomorrow");
    $this->assertEquals($tarjeta1->getCantViajes(), 4);
    //Viaje 6, Vuelve el medio boleto, saldo restante: 180//
    $tarjeta1->descontarSaldo();
    $this->assertEquals($tarjeta1->getSaldo(), 180);
  }
}
