<?php

class Conexion extends PDO {
    private $conn = null;
    private $server = "localhost";
    private $db = "tienda";
    private $port = 3307;
    private $user = "root";
    private $passwd = "usbw";

    function __construct() {
        try {
           $this->conn = parent::__construct("mysql:host=$this->server; port=$this->port; dbname=$this->db", $this->user, $this->passwd);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
    function close(){
        $this->conn = null;
    }

}
