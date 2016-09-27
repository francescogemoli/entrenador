<?php
  class Estadistica{
    public function __invoke($request, $response, $next){
      $con = new PDO("mysql:host=localhost;dbname=entrenador", "root", "aula5");
      $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $ruta = $request->getUri()->getPath();

      if(strpos($ruta, "validar") || strpos($ruta, "tadistica")) return $next($request, $response);
      $res = $con->query("select clics from estadistica where ruta='$ruta'");
      $res = $res->fetch();
      if(!$res){
        $con->exec("insert into estadistica(ruta, clics) values('$ruta', 1)");
      }else{
        $clics = $res['clics']+1;
        $con->exec("update estadistica set clics=$clics where ruta='$ruta';");
      }
      return $next($request, $response);
    }
  }
?>
