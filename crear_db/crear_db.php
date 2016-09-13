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

        /* Insert titulo y titulo_url en Temas */
        $sql = <<<sql
insert into Temas(titulo, titulo_url)
values ('Matematica','mat'),('Historia','his'),('Italiano','ita'),('Catalan','cat'),('Ingles','ing'),('Geografia','geo'),('Literatura','lit');
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
values ('La subida al Monte Fuji solo está abierta al público desde el 1 de julio hasta el 27 de agosto de cada año. Alrededor de unas 200.000 personas suben al Monte Fuji durante este periodo de tiempo. Como media, ¿alrededor de cuántas personas suben al Monte Fuji cada día?','1'),('¿Cuál de las siguientes cifras constituye la mejor estimación del número total de asistentes al concierto?','1'),('Historia','2'),('Italiano','3'),('Catalan','4'),('Ingles','5'),('Geografia','6'),('Literatura','7');
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
values ('340','0','1'),('710','0','1'),('3400','1','1'),('7100','0','1'),('7400','0','1'),('2000','1','2'),('5000','1','2'),('20000','1','2'),('50000','1','2'),('100','1','2');
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
