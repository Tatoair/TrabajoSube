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
    $MedioBoleto->setDia(3);
    $MedioBoleto->setHora(12);
    $boletoMedio = $cole->pagarCon($MedioBoleto);
    $this->assertEquals($boletoMedio->getTipo(), "MedioBoleto");

    $FranqComp = new FranquiciaCompleta(120);
    $FranqComp->setDia(3);
    $FranqComp->setHora(12);
    $boletoFranq = $cole->pagarCon($FranqComp);
    $this->assertEquals($boletoFranq->getTipo(), "FranquiciaCompleta");

    $BEG = new BoletoEducativoGratuito(120);
    $BEG->setDia(3);
    $BEG->setHora(12);
    $boletoBEG = $cole->pagarCon($BEG);
    $this->assertEquals($boletoBEG->getTipo(), "BoletoEducativoGratuito");
  }

  public function testGetAbonado(){
    $cole = new Colectivo(103);
    $tarjeta = new Tarjeta(120);
    $boleto = $cole->pagarCon($tarjeta);
    $this->assertEquals($boleto->getAbonado(), 120);
    
    $MedioBoleto = new MedioBoleto(120);
    $MedioBoleto->setDia(3);
    $MedioBoleto->setHora(12);
    $boletoMedio = $cole->pagarCon($MedioBoleto);
    $this->assertEquals($boletoMedio->getAbonado(), 60);

    $FranqComp = new FranquiciaCompleta(120);
    $FranqComp->setDia(3);
    $FranqComp->setHora(12);
    $boletoFranq = $cole->pagarCon($FranqComp);
    $this->assertEquals($boletoFranq->getAbonado(), 0);
  }

  public function testGetSaldo(){
    $cole = new Colectivo(103);
    $tarjeta = new Tarjeta(120);
    $boleto = $cole->pagarCon($tarjeta);
    $this->assertEquals($boleto->getSaldo(), 0);

    $MedioBoleto = new MedioBoleto(120);
    $MedioBoleto->setDia(3);
    $MedioBoleto->setHora(12);
    $boletoMedio = $cole->pagarCon($MedioBoleto);
    $this->assertEquals($boletoMedio->getSaldo(), 60);

    $FranqComp = new FranquiciaCompleta(120);
    $FranqComp->setDia(3);
    $FranqComp->setHora(12);
    $boletoFranq = $cole->pagarCon($FranqComp);
    $this->assertEquals($boletoFranq->getSaldo(), 120);
  }

  public function testGetDescripcion(){
    $cole = new Colectivo(103);
    $tarjeta = new Tarjeta(120);
    $boleto = $cole->pagarCon($tarjeta);
    $this->assertEquals($boleto->getDescripcion(), "Abona saldo 120");

    $boletoNegativo = $cole->pagarCon($tarjeta);
    $this->assertEquals($boletoNegativo->getDescripcion(), "Abona saldo 120 (Se encuentra en negativo)");
  }
}