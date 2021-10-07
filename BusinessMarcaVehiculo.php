<?php
include_once('../Config/connection.php');
include_once('../Models/MarcaVehiculo.php');

class BusinessMarcaVehiculo extends MarcaVehiculo
{
    public function fncObtenerBD($id)
    {
        $conecction = new connection();
        $connectionstatus = $conecction->openConnection();

        if ($connectionstatus) {
            $sql = "select * from gps_marca_vehiculo where idMarcaVehiculo = :idMarcaVehiculo";
            $statement = $connectionstatus->prepare($sql);
            $marcaVehiculo = new MarcaVehiculo;
            if ($statement != false) {
                $statement->bindParam('idMarcaVehiculo', $id);
                $statement->execute();
                if (!$registro = $statement->fetch(PDO::FETCH_ASSOC)) {
                    return false;
                }
                $marcaVehiculo->idMarcaVehiculo = $registro['idMarcaVehiculo'];
                $marcaVehiculo->marca = $registro['marca'];

                return $marcaVehiculo;
                $conecction->closeConnection($connectionstatus);
            } else {
                return false;
            }
        } else {

            unset($connectionstatus);
            unset($connection);
            return false;
        }
    }
    public function fncGuardarBD(MarcaVehiculo $marcaVehiculo)
    {
        $connection = new connection();
        $connectionstatus = $connection->openConnection();
        if ($connectionstatus) {
            $sql = "
			INSERT INTO gps_marca_vehiculo
			(				
				marca
			)
			VALUES
			(
				:marca			
			)
			";

            $statement = $connectionstatus->prepare($sql);

            if ($statement != false) {
                $statement->bindParam("marca", $marcaVehiculo->marca);
                $statement->execute();
                $connection->closeConnection($connectionstatus);
                $id = $connectionstatus->lastInsertId();
                $marcaVehiculo->idMarcaVehiculo = $id;
                return $marcaVehiculo;
            }
        } else {
            unset($connectionstatus);
            unset($connection);
            return false;
        }
    }
    public function fncModificarBD(MarcaVehiculo $marcaVehiculo)
    {
      
        $connection = new connection();
        $connectionstatus = $connection->openConnection();
        if ($connectionstatus) {
            $sql = "
			UPDATE gps_marca_vehiculo
            SET
                marca = :marca 
            WHERE idMarcaVehiculo = :idMarcaVehiculo
			";
            $statement = $connectionstatus->prepare($sql);

            if ($statement != false) {
                $statement->bindParam("idMarcaVehiculo", $marcaVehiculo->idMarcaVehiculo);
                $statement->bindParam("marca", $marcaVehiculo->marca);
                $statement->execute();
                $connection->closeConnection($connectionstatus);        
                return $marcaVehiculo;
            }
        } else {
            unset($connectionstatus);
            unset($connection);
            return false;
        }
    }

    public function fncEliminarBD(MarcaVehiculo $marcaVehiculo)
    {
      
        $connection = new connection();
        $connectionstatus = $connection->openConnection();
        if ($connectionstatus) {
            $sql = "
			DELETE FROM gps_marca_vehiculo	
            WHERE idMarcaVehiculo = :idMarcaVehiculo
			";
            $statement = $connectionstatus->prepare($sql);

            if ($statement != false) {
                $statement->bindParam("idMarcaVehiculo", $marcaVehiculo->idMarcaVehiculo);
                $statement->execute();
                $connection->closeConnection($connectionstatus);        
                return $marcaVehiculo;
            }
        } else {
            unset($connectionstatus);
            unset($connection);
            return false;
        }
    }
}
