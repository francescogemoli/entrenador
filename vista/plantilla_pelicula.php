<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>SakilaSearcher - Detalle Pelicula</title>
    </head>
    <body>
        <h1>SakilaSearcher</h1>
        <form method = "GET" action = "../..">
        <strong>Búsqueda de películas:</strong>
        <input type="text" name="buscar" size="20"><br><br>
        <input type="submit" value="Buscar">
        </form>
        
    <h2>Detalle Pelicula:</h2>
        
        <table>
         <?php
            foreach($data['film'] as $fila){
                
                foreach($fila as $c=>$v){
                    echo "<li><strong>$c:</strong> $v</li>";
                }
            }
        ?>
        </table>

    <h3>Actores</h3>
        <ul>
        <?php
        
            foreach($data['actor'] as $fila2){
                    echo "<li>";
                foreach($fila2 as $c2){
                    //echo "<ul>";
                    echo "$c2 ";
                    //echo "</ul>";
                }
                echo "</li>";
            }
        ?>
        </ul>
    </body>
</html>