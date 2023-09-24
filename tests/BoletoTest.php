<?php 

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{

  public function testGetFecha(){
    $cole = new Colectivo(103);
    $tarjeta = new Tarjeta(120);
    $boleto = $cole->pagarCon($tarjeta);
    $fecha = date("d/m/Y H:i:s");
    $this->assertEquals($boleto->getFecha(), $fecha);
  }

  public function testGetLinea(){
    $cole = new Colectivo(103);
    $tarjeta = new Tarjeta(120);
    $boleto = $cole->pagarCon($tarjeta);
    $this->assertEquals($boleto->getLinea(), 103);
  }

  public function testGetID(){
    $cole = new Colectivo(103);
    $tarjeta = new Tarjeta(120);
    $boleto = $cole->pagarCon($tarjeta);
    $this->assertNotNull($boleto->getID());
  }

  public function testGetTipo(){
    $cole = new Colectivo(103);
    $tarjeta = new Tarjeta(120);
    $boleto = $cole->pagarCon($tarjeta);
    $this->assertEquals($boleto->getTipo(), "Tarjeta");

    $MedioBoleto = new MedioBoleto(120);
    $boleto2 = $cole->pagarCon($MedioBoleto);
    $this->assertEquals($boleto2->getTipo(), "MedioBoleto");

    $FranqComp = new FranquiciaCompleta(120);
    $boleto3 = $cole->pagarCon($FranqComp);
    $this->assertEquals($boleto3->getTipo(), "FranquiciaCompleta");
  }

  public function testGetAbonado(){
    $cole = new Colectivo(103);
    $tarjeta = new Tarjeta(120);
    $boleto = $cole->pagarCon($tarjeta);
    $this->assertEquals($boleto->getAbonado(), 120);
    
    $MedioBoleto = new MedioBoleto(120);
    $boleto2 = $cole->pagarCon($MedioBoleto);
    $this->assertEquals($boleto2->getAbonado(), 60);

    $FranqComp = new FranquiciaCompleta(120);
    $boleto3 = $cole->pagarCon($FranqComp);
    $this->assertEquals($boleto3->getAbonado(), 0);
  }

  public function testGetSaldo(){
    $cole = new Colectivo(103);
    $tarjeta = new Tarjeta(120);
    $boleto = $cole->pagarCon($tarjeta);
    $this->assertEquals($boleto->getSaldo(), 0);

    $MedioBoleto = new MedioBoleto(120);
    $boleto2 = $cole->pagarCon($MedioBoleto);
    $this->assertEquals($boleto2->getSaldo(), 60);

    $FranqComp = new FranquiciaCompleta(120);
    $boleto3 = $cole->pagarCon($FranqComp);
    $this->assertEquals($boleto3->getSaldo(), 120);
  }

  public function testGetDescripcion(){
    $cole = new Colectivo(103);
    $tarjeta = new Tarjeta(120);
    $boleto = $cole->pagarCon($tarjeta);
    $this->assertEquals($boleto->getDescripcion(), "Abona saldo 120");

    $boleto2 = $cole->pagarCon($tarjeta);
    $this->assertEquals($boleto2->getDescripcion(), "Abona saldo 120 (Se encuentra en negativo)");
  }
}
