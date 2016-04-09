<?php
	class Usuario{
		private $idUsuario;
		private $nombre;
		private $apellido;
		private $direccion;
		private $telefono;
		private $email;
		private $clave;
		private $usuario;
		private $fecha_creacion;
		private $fecha_mod;
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

                function getClave() {
                    return $this->clave;
                }

                function getUsuario() {
                    return $this->usuario;
                }

                function getFecha_creacion() {
                    return $this->fecha_creacion;
                }

                function getFecha_mod() {
                    return $this->fecha_mod;
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

                function setClave($clave) {
                    $this->clave = $clave;
                }

                function setUsuario($usuario) {
                    $this->usuario = $usuario;
                }

                function setFecha_creacion($fecha_creacion) {
                    $this->fecha_creacion = $fecha_creacion;
                }

                function setFecha_mod($fecha_mod) {
                    $this->fecha_mod = $fecha_mod;
                }

                		public function __construct(){

		}

		public function getIdUsuario(){
			return $this->idUsuario;
		}

		public function setIdUsuario($idUsuario){
			$this->idUsuario = $idUsuario;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
	}


?>