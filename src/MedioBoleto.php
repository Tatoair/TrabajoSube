<?php
namespace TrabajoSube;
class MedioBoleto extends Tarjeta{
  protected $ultimoViaje;
  protected $ultimoDia;
  protected $cantViajes;

  public function __construct($saldo = 0){
    $this->ID = uniqid();
    $this->saldo = $saldo;
    $this->tarifa = 60;
    $this->ultimoViaje = time()-5*60;
    $this->ultimoDia = strtotime("today");
    $this->cantViajes = 4;
  }

  public function getCantViajes(){
    return $this->cantViajes;
  }

  public function setUltimoViaje($tiempo){
    $this->ultimoViaje = $tiempo;
  }

  public function setUltimoDia($dia){
    $this->ultimoDia = strtotime($dia);
  }

  public function descontarSaldo(){
    //Reinicia la cantidad de viajes medio boleto
    if (strtotime("today")-$this->ultimoDia > 0){
      $this->cantViajes = 4;
      $this->ultimoDia = strtotime("today");
    }

    if ($this->saldo - $this->tarifa >= -211.84 && (time()-$this->ultimoViaje)/60 >= 5){
      if($this->cantViajes > 0){
        $this->saldo-=$this->tarifa;
        $this->cantViajes--;
      } else {
        $this->saldo-=$this->tarifa*2;
      }
      $this->ultimoViaje = time();
      return true;
    } else {
      return false;
    }
  }
}
