<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>SakilaSearcher - HomePage</title>
    </head>
    <body>
        <h1>SakilaSearcher</h1>
        <form method = "GET" action = "">
        <strong>Búsqueda de películas:</strong>
        <input type="text" name="buscar" size="20"><br><br>
        <input type="submit" value="Buscar">
        </form>
        
        <table>
                <h2><?php echo $data['title']; ?></h2>
         <?php

            unset($data['title']);

            echo "<th>TÍTULO</th><th>AÑO</th>";

            foreach($data as $fila){
                echo "<tr>";
                
                    echo "<td><a href='index.php/peliculas/info_pelicula?id=${fila['ID']}'>${fila['TÍTULO']}</td>";
                    echo "<td>${fila['AÑO']}</td>";
                
                echo "</tr>";
            }
        ?>
        </table>
    </body>
</html>