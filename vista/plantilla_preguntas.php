<!DOCTYPE html>
<html lang=”es”>

<head>
    <meta charset=”utf-8″>
    <title>Preguntas - Entrenador de Preguntas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    
    <div class="wrap">
    <header>
        <h1>ENTRENADOR de PREGUNTAS</h1>
    </header>
    
    <nav>
        <a href="../index.php">HomePage</a> |
        <a href="../index.php/preguntas">Preguntas Aleatoreas</a> |
        <a href="../index.php/subirpregunta">Subir Pregunta</a>
    </nav>

    <main>
        <div>
        <?php
            $p = $data['preguntas']['pregunta'];
			echo "<h2>$p</h2>";

            foreach($data['respuestas'] as $r){
			echo "<ul><input type='radio' name='correcta' value='1' required>${r['respuesta']}</ul>";
            }
            //print_r($data);
        ?>
        </div>
    </main>

    <footer>
        <div><h1>All rights reserved | © Copyright 2016 | Francesco</h1></div>
    </footer>
    </div>

</body>

</html>