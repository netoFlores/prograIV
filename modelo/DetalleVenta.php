<?php

class DetalleVenta {

    private $conn, $idDetalleVenta, $idVenta, $idProducto, $precio, $cantida, $fecha;

    function __construct(Conexion $conn) {
        $this->conn = $conn;
    }

    function getIdDetalleVenta() {
        return $this->idDetalleVenta;
    }

    function getIdVenta() {
        return $this->idVenta;
    }

    function getIdProducto() {
        return $this->idProducto;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getCantida() {
        return $this->cantida;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setIdDetalleVenta($idDetalleVenta) {
        $this->idDetalleVenta = $idDetalleVenta;
    }

    function setIdVenta($idVenta) {
        $this->idVenta = $idVenta;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setCantida($cantida) {
        $this->cantida = $cantida;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

}
