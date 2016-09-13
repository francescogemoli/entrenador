<?php
require "vendor/autoload.php";
require "controlador.php";

$app = new Slim\App();

$c = $app->getContainer();

$c['bd'] = function(){
    $pdo = new PDO("mysql:host=localhost;dbname=sakila", "root", "aula4");
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$c['view'] = new \Slim\Views\PhpRenderer('vista/');

$app->get("/",  '\Peliculas:busquedaPeliculas');
$app->get("/peliculas/info_pelicula",'\Peliculas:detallePelicula');

$app->run();
?>
