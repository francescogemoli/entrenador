<?php
  class ModelEstatistics {
    private $con;
    public function __construct(){
        $this->con = new PDO("mysql:host=localhost;dbname=entrenador", "root", "aula4");
        $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    public function getEstatistics(){
      $res = $this->con->query("select * from estadistica;");
      if(!$res) return [];
      return $res->fetchAll();
    }
  }
?>