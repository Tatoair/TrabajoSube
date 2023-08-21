<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase{
  public function testPagar(){
    $saldos = [150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500, 4000];

    $saldosFinales = [30, 80, 130, 180, 230, 280, 330, 380, 480, 580, 680, 780, 880, 980, 1080, 1180, 1280, 1380, 1880, 2380, 2880, 3380, 3880];
    
    foreach ($saldos as &$saldo){
      $tarjeta = new Tarjeta($saldo);
      $colectivo = new Colectivo();
      $colectivo->pagarCon($tarjeta);
      $saldo = $tarjeta->saldo;
    }

     $this->assertEquals(
            $saldosFinales,
            $saldos,
            "actual value is not equals to expected"
        );
  }
}
