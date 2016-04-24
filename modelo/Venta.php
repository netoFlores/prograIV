<?php

class Venta {
    private $conn, $idVenta, $idUsuario, $fecha;
    
    function __construct(Conexion $conn) {
        $this->conn = $conn;
    }

    function getIdVenta() {
        return $this->idVenta;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setIdVenta($idVenta) {
        $this->idVenta = $idVenta;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

}
