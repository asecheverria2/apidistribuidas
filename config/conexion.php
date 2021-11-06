<?php

class Conectar{
    protected $dbh;

    protected function Conexion(){
        try {
            $conectar = $this->dbh= new PDO("mysql:local=localhost; dbname=servicioweb", "root","");
            return $conectar;
        } catch (Exception $e) {
            print "Error en BD:" . $e->getMessage() . "<br/>";
        }
    }
}
?>

