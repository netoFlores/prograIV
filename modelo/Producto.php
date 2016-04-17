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

    public function add() {
        try {
            $query = "INSERT INTO producto values(nombre, precio, idCategoria, cantidad) (?,?,?,?)";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $execute->bindParam(2, $this->precio, PDO::PARAM_STR);
            $execute->bindParam(3, $this->idCategoria, PDO::PARAM_INT);
            $execute->bindParam(4, $this->cantida, PDO::PARAM_INT);
            $execute->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }

    public function update() {
        try {
            $query = "UPDATE producto SET nombre=?, precio=?, idCategoria=?, cantidad=? WHERE idProducto =?";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $execute->bindParam(2, $this->precio, PDO::PARAM_STR);
            $execute->bindParam(3, $this->idCategoria, PDO::PARAM_INT);
            $execute->bindParam(4, $this->cantida, PDO::PARAM_INT);
            $execute->bindParam(5, $this->idProducto, PDO::PARAM_INT);
            $execute->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }

    public function delete() {
        try {
            $query = "DELETE FROM producto WHERE idProducto=?";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->idProducto, PDO::PARAM_INT);
            $execute->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }

    public function findById() {
        try {
            $query = "SELECT * FROM producto WHERE idProducto =?";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->idProducto, PDO::PARAM_INT);
            $execute->execute();
            return $execute->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }

    public function findAll() {
        try {
            $query = "SELECT * FROM producto";
            $execute = $this->conn->prepare($query);
            $execute->execute();
            return $execute->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }

}
