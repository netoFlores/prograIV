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

    public function add() {
        try {
            $query = "INSERT INTO detalleVenta values(idVenta,idProducto,precio,cantida) (?,?,?,?)";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->idVenta, PDO::PARAM_INT);
            $execute->bindParam(2, $this->idProducto, PDO::PARAM_INT);
            $execute->bindParam(3, $this->precio, PDO::PARAM_STR);
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
            $query = "UPDATE detalleVenta SET cantida=? WHERE idDetalleVenta =?";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->cantida, PDO::PARAM_INT);
            $execute->bindParam(2, $this->idDetalleVenta, PDO::PARAM_INT);
            $execute->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }

    public function delete() {
        try {
            $query = "DELETE FROM detalleVenta WHERE idDetalleVenta=?";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->idDetalleVenta, PDO::PARAM_INT);
            $execute->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }

    public function findById() {
        try {
            $query = "SELECT * FROM detalleVenta WHERE idDetalleVenta =?";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->idDetalleVenta, PDO::PARAM_INT);
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
            $query = "SELECT * FROM detalleVenta";
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
