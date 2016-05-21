<html>
    <head>
        <title>Categoria Vista</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    <body>

        <form method="post">
            <input type="search" required="true" placeholder="Buscar" name="buscar"><button type="submit" name="btnBuscar">Buscar</button>
        </form>
        <br><br>
        <?php
        include_once('controlador/CategoriaC.php');
        if (isset($_GET["delete"])) {
            $c = new CategoriaC();
            $c->delete($_GET["delete"]);
        }

        if (isset($_GET["id"])) {
            $cc = new CategoriaC();
            $dato = $cc->busqueda($_GET["id"]);
            foreach ($dato as $d) {
                ?>

                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $d->idCategoria ?>">
                    <p><label for="nombre">Nombre</label><input type="text" value="<?= $d->nombre ?>" name="nombre" id="nombre" required="true" placeholder="Nombre" ></p>
                    <p><label for="desc">Descripcion</label><textarea name="desc" id="desc" placeholder="Descripcion"><?= $d->descripcion ?></textarea></p>
                    <p><button type="submit" name="guardar">Modificar</button></p>
                </form>
                <?php
            }
        } else {
            ?>
            <form action="" method="post">
                <p><label for="nombre">Nombre</label><input type="text" name="nombre" id="nombre" required="true" placeholder="Nombre" ></p>
                <p><label for="desc">Descripcion</label><textarea name="desc" id="desc" placeholder="Descripcion"></textarea></p>
                <p><button type="submit" name="crear">Crear</button></p>
            </form>
            <?php
        }
        ?>


        <?php
        if (isset($_POST["nombre"]) && isset($_POST["crear"])) {
            $nombre = htmlentities($_POST["nombre"]);
            $desc = htmlentities($_POST["desc"]);
            $c = new CategoriaC();
            $c->add(array("nombre" => $nombre, "desc" => $desc));
        } else if (isset($_POST["nombre"]) && isset($_POST["guardar"])) {
            $nombre = htmlentities($_POST["nombre"]);
            $desc = htmlentities($_POST["desc"]);
            $id = htmlentities($_POST["id"]);
            $c = new CategoriaC();
            $c->update(array("nombre" => $nombre, "desc" => $desc, "id" => $id));
        }
        ?>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Id Categoria</th>
                    <th>Nombre </th>
                    <th>Fecha Creación</th>
                    <th>Fecha Modificación</th>
                    <th>Modificar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cat = new CategoriaC();
                foreach ($cat->getAll() as $c) {
                    ?>
                    <tr>
                        <td><?= $c->idCategoria ?></td>
                        <td><?= $c->nombre ?></td>
                        <td><?= $c->fecha_creacion ?></td>
                        <td><?= $c->fecha_mod ?></td>
                        <td><a href="categoriaV.php?id=<?= $c->idCategoria ?>"><span class="glyphicon glyphicon-pencil"><span></a></td>
                                        <td style="text-align: center;"><a href="categoriaV.php?delete=<?= $c->idCategoria ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    </table>
                                    </body>
                                    </html>
