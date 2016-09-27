<?php
  require "vendor/autoload.php";
  require "estatisticas.php";

  $app = new Slim\App();

  $c = $app->getContainer();

  $c['bd'] = function(){
      $pdo = new PDO("mysql:host=localhost;dbname=entrenador", "root", "aula4");
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
  };

  $c['view'] = new \Slim\Views\PhpRenderer('vista/');


/*
$auth = new \Slim\Middleware\HttpBasicAuthentication([
  "users" => [
    "admin" => "admin",
    "pepe" => "contrasenapepe"
  ],
  "path" => "/subirpregunta"
]);


$auth = new \Slim\Middleware\SafeURLMiddleware([
  "users" => [
    "admin" => "admin",
    "pepe" => "contrasenapepe"
  ],
  "path" => "/subirpregunta"
]);
*/


$app->get("/", function($request, $response, $args){
    $con = $this->bd;
    $sql="SELECT * FROM preguntas";
    $res = $con->query($sql);
    $data['preguntas'] = $res->fetchAll();

$response = $this->view->render($response, "plantilla_index.php", $data);
return $response;
})/*->add($auth)*/;


$app->get("/preguntas", function($request, $response, $args){
    $con = $this->bd;
    $sql="SELECT * FROM preguntas ORDER BY RAND() LIMIT 1";
    $res = $con->query($sql);
    $data['preguntas'] = $res->fetch();
    $id = $data['preguntas']['id'];
    
    $sql2="SELECT respuesta FROM respuestas WHERE pregunta = $id;";
    $res2 = $con->query($sql2);
    $data['respuestas'] = $res2->fetchAll();

$response = $this->view->render($response, "plantilla_preguntas.php", $data);
return $response;
})/*->add($auth)*/;


$app->get("/subirpregunta", function($request, $response, $args){
/*    $con = $this->bd;
    $sql="SELECT * FROM temas";
    $res = $con->query($sql);
    $data['pregunta'] = $res->fetchAll();
*/

$response = $this->view->render($response, "plantilla_subirpregunta.php");
return $response;
})/*->add($auth)*/;


$app->post("/subirpregunta", function($request, $response, $args){
    $post = $request->getParsedBody();
    $pregunta = $post['pregunta'];
    $tema = $post['tema'];
    $respuesta1 = $post['respuesta1'];
    $respuesta2 = $post['respuesta2'];
    $respuesta3 = $post['respuesta3'];
    $respuesta4 = $post['respuesta4'];
    $correcta = $post['correcta'];
    $con = $this->bd;
    
    $sql = "INSERT INTO preguntas (pregunta, tema) VALUES ('$pregunta','$tema')";
    $res = $con->exec($sql);
    
    $sql1 = "INSERT INTO respuestas (respuesta, verdadera, pregunta) SELECT '$respuesta1', '1', (SELECT MAX(id) FROM preguntas) GROUP BY '$respuesta1'";
    $res1 = $con->exec($sql1);
    
    $sql2 = "INSERT INTO respuestas (respuesta, verdadera, pregunta) SELECT '$respuesta2', '1', (SELECT MAX(id) FROM preguntas) GROUP BY '$respuesta2'";
    $res2 = $con->exec($sql2);
    
    $sql3 = "INSERT INTO respuestas (respuesta, verdadera, pregunta) SELECT '$respuesta3', '1', (SELECT MAX(id) FROM preguntas) GROUP BY '$respuesta3'";
    $res3 = $con->exec($sql3);
    
    $sql4 = "INSERT INTO respuestas (respuesta, verdadera, pregunta) SELECT '$respuesta4', '1', (SELECT MAX(id) FROM preguntas) GROUP BY '$respuesta4'";
    $res4 = $con->exec($sql4);
    
    
    if($res>=1){
        echo "<p>La pregunta y las respuestas se han creado correctamente!<p>";
        }else{
        echo "<p>No se ha podido añadir la nueva pregunta.</p>";
        }

$response = $this->view->render($response, "plantilla_subirpregunta.php");
return $response;
})/*->add($auth)*/;

  $app->run();
?>
