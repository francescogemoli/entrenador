<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>DataBase</title>
    </head>
    <body>
        <h1>Creación de la bd</h1>
        <?php
        /* Nos conectamos al SGBD */
        try{
            $conexion = new PDO("mysql:host=localhost", "root", "aula4");
        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
            die();
        }
        
        /* borrar base de datos */
        $sql = "drop database if exists entrenador;";
        $res = $conexion->exec($sql);
     
        /* Crear la BD */
        $sql = "create database entrenador;";
        $res = $conexion->exec($sql);
        if($res===FALSE){
            echo "<p>No se ha podido crear la base de datos.</p>";
            echo "<p>".$conexion->errorInfo()[2]."</p>";
        }else{
            echo "<p>Base de datos creada.</p>";
        }
        
        /* Conectar a la base de datos */
        $sql = "use entrenador;";
        $res = $conexion->exec($sql);
        if($res===FALSE){
            echo "<p>No se ha podido conectar a la base de datos.</p>";
            echo "<p>".$conexion->errorInfo()[2]."</p>";
        }else{
            echo "<p>Conectados a la base de datos.</p>";
        }
        
        /* Crear tabla Temas */
        $sql = <<<sql
        create table Temas(
        id int primary key auto_increment,
        titulo varchar(100),
        titulo_url varchar(100)
);
sql;
        $res = $conexion->exec($sql);
        if($res===FALSE){
            echo "<p>No se ha podido crear la tabla temas.</p>";
            echo "<p>".$conexion->errorInfo()[2]."</p>";
        }else{
            echo "<p>Tabla Temas creada.</p>";
        }
        
        /* Crear tabla Preguntas */
        $sql = <<<sql
        create table Preguntas(
        id int primary key auto_increment,
        pregunta varchar(500),
        tema int,
        foreign key(tema) references Temas(id)
);
sql;
        $res = $conexion->exec($sql);
        if($res===FALSE){
            echo "<p>No se ha podido crear la tabla Preguntas.</p>";
            echo "<p>".$conexion->errorInfo()[2]."</p>";
        }else{
            echo "<p>Tabla Preguntas creada.</p>";
        }
        
        /* Crear tabla Respuestas */
        $sql = <<<sql
        create table Respuestas(
        id int primary key auto_increment,
        respuesta varchar(200),
        verdadera varchar(200),
        pregunta int,
        foreign key(pregunta) references Preguntas(id)
);
sql;
        $res = $conexion->exec($sql);
        if($res===FALSE){
            echo "<p>No se ha podido crear la tabla Respuestas.</p>";
            echo "<p>".$conexion->errorInfo()[2]."</p>";
        }else{
            echo "<p>Tabla Respuestas creada.</p>";
        }

        /* Crear tabla Estadisticas */
        $sql = <<<sql
        create table Estadisticas(
        ruta varchar(200) primary key,
        clicks int
);
sql;
        $res = $conexion->exec($sql);
        if($res===FALSE){
            echo "<p>No se ha podido crear la tabla Estadisticas.</p>";
            echo "<p>".$conexion->errorInfo()[2]."</p>";
        }else{
            echo "<p>Tabla Estadisticas creada.</p>";
        }
        
        /* Insert titulo y titulo_url en Temas */
        $sql = <<<sql
insert into Temas(titulo, titulo_url)
values ('Matematica','mat'),('Historia','his'),('Italiano','ita');
sql;
        $res = $conexion->exec($sql);
        if($res===FALSE){
            echo "<p>Error al añadir datos.</p>";
            echo "<p>".$conexion->errorInfo()[2]."</p>";
        }else{
            echo "<p>Se han añadido $res filas de Temas</p>";
        }
        
        /* Insert pregunta y tema en Preguntas */
        $sql = <<<sql
insert into Preguntas(pregunta, tema)
values ('¿cuanto da como resultado a este polinomio: 2+2-2-4+5-6+7+1-9-6+6?','1'),('¿Cuál de las siguientes cifras constituye la mejor estimación del número total de asistentes al concierto?','1'),('¿Qué tratado firman la corona española y la portuguesa para repartirse las colonias del Nuevo Mundo?','2'),('¿Cúal es el principio básico del Humanismo?','2'),('¿Cuál NO es una región de Italia?','3'),('¿Qué tipo de leche es la mejor para hacer mozzarella?','3');
sql;
        $res = $conexion->exec($sql);
        if($res===FALSE){
            echo "<p>Error al añadir datos.</p>";
            echo "<p>".$conexion->errorInfo()[2]."</p>";
        }else{
            echo "<p>Se han añadido $res filas de Preguntas</p>";
        }
        
        /* Insert respuesta, verdadera y pregunta en Respuestas */
        $sql = <<<sql
insert into Respuestas(respuesta, verdadera, pregunta)
values ('45','0','1'),('-4','1','1'),('4','0','1'),('-45','0','1'),('2000','0','2'),('5000','0','2'),('20000','0','2'),('100','1','2'),('Tratado de Utretch','0','3'),('Tratado de Versalles','0','3'),('Tratado de Tordesillas','1','3'),('Tratado de Casanova','0','3'),('Afirma la esperanza de la felicidad en la vida eterna','0','4'),('Afirma la dignidad y valor del individuo','1','4'),('Afirma la existencia del poder superior de los dioses que controlan el destino delos humanos','0','4'),('Afirma la seguridad de la felicidad en la vida eterna','0','4'),('Piemonte','0','5'),('Toscana','0','5'),('Corsica','1','5'),('Lombardia','0','5'),('Cabra','0','6'),('Vaca','0','6'),('Oveja','0','6'),('búfala','1','6');
sql;
        $res = $conexion->exec($sql);
        if($res===FALSE){
            echo "<p>Error al añadir datos.</p>";
            echo "<p>".$conexion->errorInfo()[2]."</p>";
        }else{
            echo "<p>Se han añadido $res filas de Preguntas</p>";
        }

        /* Insert ruta y clicks en Estadisticas */
        $sql = <<<sql
insert into Estadisticas(ruta, clicks)
values ('index.php','0');
sql;
        $res = $conexion->exec($sql);
        if($res===FALSE){
            echo "<p>Error al añadir datos.</p>";
            echo "<p>".$conexion->errorInfo()[2]."</p>";
        }else{
            echo "<p>Se han añadido $res filas de Preguntas</p>";
        }
        
        ?>
    </body>
</html>
