<?php
include_once('../Business/BusinessMarcaVehiculo.php');
include_once('../Models/MarcaVehiculo.php');


class MarcaVehiculoController extends MarcaVehiculo{

    public function fncObtenerMarcaVehiculo($inputs){
        $dtReturn = array();
        $businessMarcaVehiculo = new BusinessMarcaVehiculo();
        $dtReturn = $businessMarcaVehiculo->fncObtenerBD($inputs->idMarcaVehiculo);
        return $dtReturn;
    }
    public function fncListarMarcaVehiculo(){
        $dtReturn = array();
        $businessMarcaVehiculo = new BusinessMarcaVehiculo();
        $dtListado = $businessMarcaVehiculo->fncListarBD();


        foreach( $dtListado as $listado ){
            $model = array();
            $model['idMarcaVehiculo'] 	= $listado->idMarcaVehiculo;
            $model['marca'] = $listado->marca;     			
            array_push($dtReturn, $model);
            unset($model);
        }

        return $dtReturn;
    }

    public function fncGuardarMarcaVehiculo($inputs){
        $dtReturn = array();
        $marcaVehiculo = new MarcaVehiculo();
        $businessMarcaVehiculo = new BusinessMarcaVehiculo();
        $marcaVehiculo->marca = $inputs->marca;
        $dtReturn = $businessMarcaVehiculo->fncGuardarBD($marcaVehiculo);
        return $dtReturn;
    }
    
    public function fncModificarMarcaVehiculo($inputs){
        $dtReturn = array();
        $marcaVehiculo = new MarcaVehiculo();
        $businessMarcaVehiculo = new BusinessMarcaVehiculo();
        $marcaVehiculo->idMarcaVehiculo = $inputs->idMarcaVehiculo;
        $marcaVehiculo->marca = $inputs->marca;
        $dtMarcaVehiculo= $businessMarcaVehiculo->fncModificarBD($marcaVehiculo);
        $dtReturn = $this->fncObtenerMarcaVehiculo($dtMarcaVehiculo->idMarcaVehiculo);
        return $dtReturn;
    }
    public function fncEliminarMarcaVehiculo($inputs){
        $businessMarcaVehiculo = new BusinessMarcaVehiculo();        
        $marcaVehiculo = new MarcaVehiculo();
        $marcaVehiculo->idMarcaVehiculo = $inputs->idMarcaVehiculo;
        $businessMarcaVehiculo->fncEliminarBD($marcaVehiculo);
    }

}


// $marcaVehiculo = new MarcaVehiculoController();

// var_dump($marcaVehiculo->fncGuardarMarcaVehiculo('ferrari'));
// var_dump($marcaVehiculo->fncGuardarMarcaVehiculo('ferrari2'));
// var_dump($marcaVehiculo->fncObtenerMarcaVehiculo(32));
// var_dump($marcaVehiculo->fncObtenerMarcaVehiculo(33));
// var_dump($marcaVehiculo->fncModificarMarcaVehiculo(32,'ferrarimod'));
// $marcaVehiculo->fncEliminarMarcaVehiculo(33);
// var_dump($marcaVehiculo->fncObtenerMarcaVehiculo(33));
?>
