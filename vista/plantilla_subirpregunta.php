<!DOCTYPE html>
<html lang=”es”>

<head>
    <meta charset=”utf-8″>
    <title>Subir Pregunta - Entrenador de Preguntas</title>
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

    <br><br>
        
    <main>
        <div>
            <form method="post" action="../index.php/subirpregunta">
                
                <label for="pregunta">Nueva Pregunta:</label>
                <input type="text" name="pregunta" placeholder="texto nueva pregunta" required><br><br>

                <p>Escribir las posibles respuestas y seleccionar la sola correcta</p>
                
                <label for="respuesta1">Respuesta 1:</label>
                <input type="text" name="respuesta1" placeholder="texto respuesta 1" required>
                <input type="radio" name="correcta" value="1" required><br><br>

                <label for="respuesta2">Respuesta 2:</label>
                <input type="text" name="respuesta2" placeholder="texto respuesta 2" required>
                <input type="radio" name="correcta" value="2" required><br><br>
                
                <label for="respuesta3">Respuesta 3:</label>
                <input type="text" name="respuesta3" placeholder="texto respuesta 3" required>
                <input type="radio" name="correcta" value="3" required><br><br>
                
                <label for="respuesta4">Respuesta 4:</label>
                <input type="text" name="respuesta4" placeholder="texto respuesta 4" required>
                <input type="radio" name="correcta" value="4" required><br><br>
                
                <label for="tema">Tema:</label>
                <input type="text" name="tema" placeholder="1=Math 2=Historia 3=Italiano" required><br><br>
                
                <input type="submit" name="add" value="Añadir Pregunta"><br><br>

            </form>

        </div>
    </main>

    <footer>
        <div><h1>All rights reserved | © Copyright 2016 | Francesco</h1></div>
    </footer>
    </div>

</body>

</html>