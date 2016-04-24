<?php

class Producto {

    private $conn, $idProducto, $nombre, $precio, $idCategoria, $cantida, $fecha_creacion, $fecha_mod;

    function __construct(Conexion $conn) {
        $this->conn = $conn;
    }

    function getIdProducto() {
        return $this->idProducto;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getCantida() {
        return $this->cantida;
    }

    function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    function getFecha_mod() {
        return $this->fecha_mod;
    }

    function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setCantida($cantida) {
        $this->cantida = $cantida;
    }

    function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    function setFecha_mod($fecha_mod) {
        $this->fecha_mod = $fecha_mod;
    }

}
