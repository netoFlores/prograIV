<?php

class Conexion extends PDO {
    private $conn = null;
    private $server = "localhost";
    private $db = "c9";
    private $port = 3306;
    private $user = "root";
    private $passwd = "";

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
