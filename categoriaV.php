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
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Id Categoria</th>
                    <th>Nombre </th>
                    <th>Fecha Creación</th>
                    <th>Fecha Modificación</th>
                    <th>Modificar<th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once('controlador/CategoriaC.php');
                $cat = new CategoriaC();
                foreach ($cat->getAll() as $c) {
                    ?>
                    <tr>
                        <td><?= $c->idCategoria ?></td>
                        <td><?= $c->nombre ?></td>
                        <td><?= $c->fecha_creacion ?></td>
                        <td><?= $c->fecha_mod ?></td>
                        <td><a href=""><span class="glyphicon glyphicon-pencil"><span></a></td>
                                        <td><a href=""><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
