<?php
namespace TrabajoSube;
class Boleto{
  protected $fecha;
  protected $tipoTarjeta;
  protected $lineaColectivo;
  protected $abonado;
  protected $saldoFinal;
  protected $IDTarjeta;
  protected $descripcion;

  public function __construct($lineaColectivo, $IDTarjeta, $tipoTarjeta, $abonado, $saldoFinal){
    $this->fecha = date("d/m/Y H:i:s");
    $this->lineaColectivo = $lineaColectivo;
    $this->IDTarjeta = $IDTarjeta;
    $this->tipoTarjeta = $tipoTarjeta;
    $this->abonado = $abonado;
    $this->saldoFinal = $saldoFinal;
  }
  
  public function getFecha(){
    return $this->fecha;
  }

  public function getLinea(){
    return $this->lineaColectivo;
  }

  public function getID(){
    return $this->IDTarjeta;
  }

  public function getTipo(){
    return substr(get_class($this->tipoTarjeta), 12);
  }

  public function getAbonado(){
    return $this->abonado;
  }

  public function getSaldo(){
    return $this->saldoFinal;
  }

  public function getDescripcion(){
    return $this->descripcion;
  }

  public function setDescripcion(){
    if($this->saldoFinal >= 0){
      $this->descripcion = "Abona saldo " . $this->abonado;
    } elseif ($this->saldoFinal >= -211.84){
      $this->descripcion = "Abona saldo " . $this->abonado . " (Se encuentra en negativo)";
    } else {
      $this->descripcion = "No tiene suficiente saldo";
    }
  }
}
