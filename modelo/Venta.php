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

    public function add() {
        try {
            $query = "INSERT INTO venta values(idUsuario) (?)";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->idUsuario, PDO::PARAM_INT);
            $execute->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }

    public function update() {
        try {
            $query = "UPDATE venta SET idUsuario=? WHERE idVenta =?";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->idUsuario, PDO::PARAM_INT);
            $execute->bindParam(2, $this->idVenta, PDO::PARAM_INT);
            $execute->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }

    public function delete() {
        try {
            $query = "DELETE FROM venta WHERE idVenta=?";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->idVenta, PDO::PARAM_INT);
            $execute->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }

    public function findById() {
        try {
            $query = "SELECT * FROM venta WHERE idVenta =?";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->idVenta, PDO::PARAM_INT);
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
            $query = "SELECT * FROM venta";
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
