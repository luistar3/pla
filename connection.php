<?php
class connection
{
    private $server;
    private $dataBase;
    private $userId;
    private $passwd;

    function __construct(){
        $this->server='localhost';
        $this->dataBase = 'gpstel';
        $this->userId = 'root';
        $this->passwd ='';
    }

    public function openConnection(){
        $opciones = null;
        try {
            $opciones = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::MYSQL_ATTR_FOUND_ROWS => true
            );
     
            $status = new PDO(
                'mysql:host=' . $this->server . ';dbname=' . $this->dataBase,
                $this->userId,
                $this->passwd,
                $opciones
            );
    
                if (!$status)
                {
                    die('Error fatal. No se puede conectar a la base de datos.');
                }
                return $status;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function closeConnection($status){
        $status = null;
    }
}

?>
