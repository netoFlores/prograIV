<?php

class Usuario {

    private $idUsuario, $nombre, $apellido, $direccion, $telefono, $email, $usuario, $clave, $fecha_creacion, $fecha_mod;
    private $conn;

    function __construct(Conexion $conn) {
        $this->conn = $conn;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getClave() {
        return $this->clave;
    }

    function getFecha_creacion() {
        return $this->fecha_creacion;
    }

    function getFecha_mod() {
        return $this->fecha_mod;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setFecha_creacion($fecha_creacion) {
        $this->fecha_creacion = $fecha_creacion;
    }

    function setFecha_mod($fecha_mod) {
        $this->fecha_mod = $fecha_mod;
    }

    public function add() {
        try {
            $query = "INSERT INTO usuario values(nombre, apellido, direccion, telefono, email, clave, usuario) (?,?,?,?,?,?,?)";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $execute->bindParam(2, $this->apellido, PDO::PARAM_STR);
            $execute->bindParam(3, $this->direccion, PDO::PARAM_STR);
            $execute->bindParam(4, $this->telefono, PDO::PARAM_STR);
            $execute->bindParam(5, $this->email, PDO::PARAM_STR);
            $execute->bindParam(6, $this->clave, PDO::PARAM_STR);
            $execute->bindParam(7, $this->usuario, PDO::PARAM_STR);
            $execute->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }

    public function update() {
        try {
            $query = "UPDATE usuario SET nombre=?, apellido=?, direccion=?, telefono=?, email=? WHERE idUsuario =?";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->nombre, PDO::PARAM_STR);
            $execute->bindParam(2, $this->apellido, PDO::PARAM_STR);
            $execute->bindParam(3, $this->direccion, PDO::PARAM_STR);
            $execute->bindParam(4, $this->telefono, PDO::PARAM_STR);
            $execute->bindParam(5, $this->email, PDO::PARAM_STR);
            $execute->bindParam(5, $this->idUsuario, PDO::PARAM_INT);
            $execute->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }

    public function delete() {
        try {
            $query = "DELETE FROM usuario WHERE idUsuario=?";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->idUsuario, PDO::PARAM_INT);
            $execute->execute();
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }

    public function findById() {
        try {
            $query = "SELECT * FROM usuario WHERE idUsuario=?";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->idUsuario, PDO::PARAM_INT);
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
            $query = "SELECT * FROM usuario";
            $execute = $this->conn->prepare($query);
            $execute->execute();
            return $execute->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } finally {
            $this->conn->close();
        }
    }
    
    
    public function login(){
        try {
            $query = "SELECT idUsuario, nombre, apellido FROM usuario WHERE usuario = ? AND clave = ?";
            $execute = $this->conn->prepare($query);
            $execute->bindParam(1, $this->usuario, PDO::PARAM_STR);
            $execute->bindPARAM(2, $this->clave, PDO::PARAM_STR);
            $execute->execute();
            if($execute->columnCount() > 0){
                return $execute->fetch(PDO::FETCH_OBJ);
            }
            return null;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
    
}