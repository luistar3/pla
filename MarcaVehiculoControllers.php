<?php
include_once('../Business/BusinessMarcaVehiculo.php');
include_once('../Models/MarcaVehiculo.php');


class MarcaVehiculoController extends MarcaVehiculo{

    public function fncObtenerMarcaVehiculo($id){
        $dtReturn = array();
        $businessMarcaVehiculo = new BusinessMarcaVehiculo();
        $dtReturn = $businessMarcaVehiculo->fncObtenerBD($id);
        return $dtReturn;
    }

    public function fncGuardarMarcaVehiculo($marca){
        $dtReturn = array();
        $marcaVehiculo = new MarcaVehiculo();
        $businessMarcaVehiculo = new BusinessMarcaVehiculo();
        $marcaVehiculo->marca = $marca;
        $dtReturn = $businessMarcaVehiculo->fncGuardarBD($marcaVehiculo);
        return $dtReturn;
    }
    
    public function fncModificarMarcaVehiculo($idMarcaVehiculo, $marca){
        $dtReturn = array();
        $marcaVehiculo = new MarcaVehiculo();
        $businessMarcaVehiculo = new BusinessMarcaVehiculo();
        $marcaVehiculo->idMarcaVehiculo = $idMarcaVehiculo;
        $marcaVehiculo->marca = $marca;
        $dtMarcaVehiculo= $businessMarcaVehiculo->fncModificarBD($marcaVehiculo);
        $dtReturn = $this->fncObtenerMarcaVehiculo($dtMarcaVehiculo->idMarcaVehiculo);
        return $dtReturn;
    }
    public function fncEliminarMarcaVehiculo($idMarcaVehiculo){
        $businessMarcaVehiculo = new BusinessMarcaVehiculo();        
        $marcaVehiculo = new MarcaVehiculo();
        $marcaVehiculo->idMarcaVehiculo = $idMarcaVehiculo;
        $businessMarcaVehiculo->fncEliminarBD($marcaVehiculo);
    }

}


$marcaVehiculo = new MarcaVehiculoController();

var_dump($marcaVehiculo->fncGuardarMarcaVehiculo('ferrari'));
var_dump($marcaVehiculo->fncGuardarMarcaVehiculo('ferrari2'));
var_dump($marcaVehiculo->fncObtenerMarcaVehiculo(32));
var_dump($marcaVehiculo->fncObtenerMarcaVehiculo(33));
var_dump($marcaVehiculo->fncModificarMarcaVehiculo(32,'ferrarimod'));
$marcaVehiculo->fncEliminarMarcaVehiculo(33);
var_dump($marcaVehiculo->fncObtenerMarcaVehiculo(33));
?>