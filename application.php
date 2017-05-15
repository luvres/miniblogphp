<?php

class App {

  public $DB_HOST = "mariadb-host";
  public $DB_USER = "root";
  public $DB_PASS = "maria";
  public $DB_NAME = "blog_php";
  public $DB_PORT = "3306";
  public $PDO;

  public $site_titulo = "Mini Blog";

  function __construct() {
    try {
      $dsn = "mysql:host=$this->DB_HOST; dbname=$this->DB_NAME; port=$this->DB_PORT";
      $this->PDO = new PDO($dsn, $this->DB_USER, $this->DB_PASS);
      //echo "MariaDB (PDO) -> Connect!";
    } catch (PDOException $e) {
      echo "Connect Fail ... ".$e->getMessage();
    }
  }

  function loadModel($model) {
    include("app/model/".strtolower($model).".class.php");
    return new $model;
  }
  function loadView($view, $tpl){
    include("app/view/".strtolower($view).".tpl.php");
  }

}
