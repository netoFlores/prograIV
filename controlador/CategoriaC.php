<?php

include_once( 'modelo/Conexion.php');
include_once( 'modelo/Categoria.php');
class CategoriaC {
    function  getAll(){
        $conn = new Conexion();
        $categoria = new Categoria($conn);
        return $categoria->findAll();
    }
}
