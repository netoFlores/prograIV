<?php
    $conn = mysql_connect("localhost", "ernestofl28", "") or die("Error de conexion ".mysql_error());
    mysql_select_db("c9", $conn) or die("No se encuentra la db c9");
    
    $query = "select nombre, descripcion from categoria  WHERE idCategoria = " . $_GET["id"];
    //$query = "SELECT nombre, descripcion FROM categoria";
    $query = mysql_query($query, $conn) or die(mysql_error());
    
    //while($row = mysql_fetch_array($query)){
    //    echo $row[0]." : ".$row[1]."<br>";
    //}
    
    while($row = mysql_fetch_assoc($query)){
        echo $row["nombre"]." : ".$row["descripcion"]."<br>";
    }
    
    
    //$query = "INSERT INTO categoria values(null, 'tv', 'TV', now(), null)";
    //$query = mysql_query($query, $conn) or die (mysql_error());
    
    //$query = "UPDATE categoria SET nombre='TV' WHERE idCategoria=3";
    //$query = mysql_query($query, $conn);
    
    $query = "DELETE FROM categoria WHERE idCategoria=3";
    $query = mysql_query($query,$conn);