<html>
    <head>
        <title>Busqueda con AJAX</title>
        <script
            src="https://code.jquery.com/jquery-1.12.4.js"></script>
    </head>
    <body>
        
        <input type="search" name="buscar" id="buscar" placeholder="Buscar" />
        <input type="button" value="Buscar" href="javascript:;" onclick="realizarBusqueda($('#buscar').val()); return false"/>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Fecha Creacion</th>
                    <th>Fecha Modificación</th>
                </tr>
            </thead>
            <tbody id="datos">

            </tbody>
        </table>
        
        <script type="text/javascript" >
            function realizarBusqueda(valor){
                var parametros = {
                   "id" : valor
                };
                
                $.ajax({
                   
                   data: parametros,
                   url: 'busquedaB.php',
                   type: 'post',
                   beforeSend : function(){
                       $("#datos").html("Procesando, espere por favor").delay(5000);
                       
                   },
                   success: function(response){
                       $("#datos").html(response);
                   }
                });
                
            }
        </script>
    </body>
</html>
