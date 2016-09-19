<!DOCTYPE html>
<html lang=”es”>

<head>
    <meta charset=”utf-8″>
    <title>Pregunta - Entrenador de Preguntas</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    
    <div class="wrap">
    <header>
        <h1>ENTRENADOR de PREGUNTAS</h1>
    </header>
    
    <nav>
        <a href="../index.php">HomePage</a>
        <a href="../index.php/preguntas">Preguntas Aleatoreas</a>
    </nav>

    <main>
        <div>
        <?php
        foreach($data['preguntas'] as $p){
			echo "<h2>${p['pregunta']}</h2>";
            }
        ?>
        </div>
    </main>

    <footer>
        <div><h1>All rights reserved | © Copyright 2016 | Francesco</h1></div>
    </footer>
    </div>

</body>

</html>