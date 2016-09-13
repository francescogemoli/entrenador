<?php
class Peliculas{
    private $ci;
    
    public function __construct(Interop\Container\ContainerInterface $ci){
        $this->ci = $ci;
    }
    
    public function busquedaPeliculas($request, $response, $args){
        
        if(isset($_GET['buscar'])){
        $buscar = $_GET['buscar'];

        $con = $this->ci->bd;
        $sql = "SELECT film_id as ID, title as `TÍTULO`, release_year as `AÑO` FROM film WHERE title LIKE '%$buscar%' ORDER BY title";

        $res = $con->query($sql);
        
        $d=$res->fetchAll();}
        $d['title'] = "Lista Películas:";
    
        $response = $this->ci->view->render($response, "plantilla_index.php", $d);
        return $response;
        }

    public function detallePelicula($request, $response, $args){
        
        $con = $this->ci->bd;
        $id=$_GET['id'];
        $sql = "SELECT f.title as 'TITULO', f.release_year as 'AÑO', l.name as 'IDIOMA', f.length as 'DURACION en MINUTOS', c.name as 'GENERO' 
                FROM film f, language l, category c, film_category fc 
                WHERE f.film_id = $id and f.language_id = l.language_id and c.category_id = fc.category_id and f.film_id = fc.film_id";
        $res = $con->query($sql);
        $d=$res->fetchAll();

        $sql2 = "SELECT a.first_name as 'NOMBRE ACTOR', a.last_name as 'APELLIDO ACTOR'
                FROM film f, actor a, film_actor fa
                WHERE f.film_id = $id and a.actor_id = fa.actor_id and f.film_id = fa.film_id";
        $res2 = $con->query($sql2);
        $actor=$res2->fetchAll();
        
        $data=['film' => $d, 'actor' => $actor];
        
        $response = $this->ci->view->render($response, "plantilla_pelicula.php", $data);       
        return $response;
        }
}
?>