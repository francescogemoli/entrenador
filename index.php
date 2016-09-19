<?php
  require "vendor/autoload.php";
  
  $app = new Slim\App();
  
  $c = $app->getContainer();
  
  $c['bd'] = function(){
      $pdo = new PDO("mysql:host=localhost;dbname=entrenador", "root", "aula4");
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      return $pdo;
  };
  
  $c['view'] = new \Slim\Views\PhpRenderer('vista/');


$app->get("/", function($request, $response, $args){
    $con = $this->bd;
    $sql="SELECT * FROM preguntas";
    $res = $con->query($sql);
    $data['preguntas'] = $res->fetchAll();
/*
$sql_articles="SELECT ar.title as title, ar.title_url as article_url, ar.image as image, ar.description as description, ca.name as category, ca.name_url as category_url
FROM articles ar
LEFT JOIN categories ca ON ca.id=ar.category;";
$res = $con->query($sql_articles);
$data['articles'] = $res->fetchAll();
*/

$response = $this->view->render($response, "plantilla_index.php", $data);
return $response;
});


$app->get("/preguntas", function($request, $response, $args){
    $con = $this->bd;
    $sql="SELECT * FROM preguntas ORDER BY RAND() LIMIT 1";
    $res = $con->query($sql);
    $data['preguntas'] = $res->fetchAll();

$response = $this->view->render($response, "plantilla_pregunta.php", $data);
return $response;
});





/*
  $app->get("/categories/{name_url}", function($request, $response, $args){
    $con = $this->bd;
    $sql="SELECT ar.title, ar.description, ar.image as image, ar.title_url, c.name, c.name_url 
FROM categories c, articles ar 
WHERE c.id = ar.category AND c.name_url = '${args['name_url']}' 
ORDER BY ar.id DESC";
    $res = $con->query($sql);
    $data['articles'] = $res->fetchAll();
    
    $res = $con->query("SELECT * FROM categories WHERE name_url = '${args['name_url']}';");
    $data['category'] = $res->fetchAll()[0];
    
    $sql_categories="SELECT c.name as name, c.name_url as name_url, count(ar.id) as articles, ar.image as image
FROM categories c 
LEFT JOIN articles ar ON ar.category = c.id
GROUP BY c.id 
ORDER BY c.name";
    $res = $con->query($sql_categories);
    $data['categories'] = $res->fetchAll();
  
    $response = $this->view->render($response, "plantilla_categories_select.php", $data);
    return $response;
  });
  
  $app->get("/categories/{name_url}/{title_url}", function($request, $response, $args){
   $con = $this->bd;
    $sql="SELECT c.name as name, c.name_url as name_url, count(ar.id) as articles, ar.title as title, ar.title_url as article_url
FROM categories c 
LEFT JOIN articles ar ON ar.category = c.id
GROUP BY c.id 
ORDER BY c.name";
    $res = $con->query($sql);
    $data['categories'] = $res->fetchAll();
  
    $sql_articles="SELECT ar.title as title, ar.title_url as article_url, ar.image as image, ar.description as description,  ar.content as content, ca.name as category, ca.name_url as category_url
FROM articles ar
LEFT JOIN categories ca ON ca.id=ar.category
WHERE ar.title_url = '${args['title_url']}';";
    $res = $con->query($sql_articles);
    $data['article'] = $res->fetchAll()[0];
      
    $response = $this->view->render($response, "plantilla_articles.php", $data);
    return $response;
  });
  
*/
  
  $app->run();
?>