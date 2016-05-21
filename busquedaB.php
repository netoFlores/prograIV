<?php
if (isset($_POST["id"])) {
    include_once './controlador/CategoriaC.php';
    $c = new CategoriaC();
    $result = $c->busqueda($_POST["id"]);
    
    //print_r($result);
    if (count($result) == 0) {
        echo 'No hay registros';
    } else {
        $result = $result[0];
        ?>
        <tr>
            <td><?= $result->idCategoria ?> </td>
            <td><?= $result->nombre ?> </td>
            <td><?= $result->descripcion ?> </td>
            <td><?= $result->fecha_creacion ?> </td>
            <td><?= $result->fecha_mod ?> </td>
        </tr>
        <?php
    }
}
?>