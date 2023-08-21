<?php
namespace TrabajoSube;
class Colectivo{

    public function pagarCon($tarjeta){
      $tarjeta->descontarSaldo();
      $boleto = new Boleto();
      return $boleto->generarBoleto($tarjeta);
    }
}

