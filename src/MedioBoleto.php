<?php
namespace TrabajoSube;
class MedioBoleto extends Tarjeta{
    public function descontarSaldo(){
      $this->saldo-=60;
    }
}