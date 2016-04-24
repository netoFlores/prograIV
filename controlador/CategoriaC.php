<?php

include_once( 'modelo/Conexion.php');
include_once( 'modelo/Categoria.php');
class CategoriaC {
    function  getAll(){
        $conn = new Conexion();
        $categoria = new Categoria($conn);
        return $categoria->findAll();
    }
    
    function add($datos){
        $conn = new Conexion();
        $categoria = new Categoria($conn);
        $categoria->setNombre($datos["nombre"]);
        $categoria->setDescripcion($datos["desc"]);
        $categoria->add();
    }
    
    function busqueda($id){
        $conn = new Conexion();
        $categoria = new Categoria($conn);
        $categoria->setIdCategoria($id);
        return $categoria->findById();
    }
    
    function update($datos){
        $conn = new Conexion();
        $categoria = new Categoria($conn);
        $categoria->setDescripcion($datos["desc"]);
        $categoria->setnombre($datos["nombre"]);
        $categoria->setIdCategoria($datos["id"]);
        $categoria->update();
        header("Location: categoriaV.php");
    }
    
    function delete($id){
        $conn = new Conexion();
        $categoria = new Categoria($conn);
        $categoria->setIdCategoria($id);
        $categoria->delete();
        header("Location: categoriaV.php");
    }
}
