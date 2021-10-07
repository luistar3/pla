<?php
class MarcaVehiculo implements \JsonSerializable
{
    protected $idMarcaVehiculo;
    protected $marca;

    public function __construct(){

    }
    public function getIdMarcaVehiculo() { return $this->idMarcaVehiculo; }
    public function getMarca() { return $this->marca; }

    public function setIdMarcaVehiculo($idMarcaVehiculo){ $this->idMarcaVehiculo = $idMarcaVehiculo;}
    public function setMarca($marca){ $this->marca = $marca;}

    public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
    

    
}
