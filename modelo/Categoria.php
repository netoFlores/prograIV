<?php

class Categoria {

    private $conn, $idCategoria, $nombre, $descripcion, $fecha_creacion, $fecha_mod;

    function __construct(Conexion $conn) {
        $this->conn = $conn;
    }
            

    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    function getFecha_mod() {
        return $this->fecha_mod;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    function setFecha_mod($fecha_mod) {
        $this->fecha_mod = $fecha_mod;
    }
    
    //Logica de Negocio
    
    function add(){
                 //"INSERT INTO categoria VALUES(null, '".$nombre."','descripcion', now(),null)"
        $query = "INSERT INTO categoria VALUES(null, ?, ?, now(), null)";
        try{
            $query = $this->conn->prepare($query);
            $query->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $query->bindParam(2, $this->descripcion, PDO::PARAM_STR);
            $query->execute();
            $this->conn->close();
        } catch (PDOException $ex) {
            echo $ex.getMessage();
        }
    }
    //Tarea agregar los metodos de modificar y eliminar. 

}
