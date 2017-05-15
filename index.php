<?php
  // includes
  require_once("libs/funcoes.php");
  require_once ("application.php");

  $modulo = isset($_GET['m']) ? $_GET['m'] : 'inicial';

  switch ($modulo) {
    case "user":
      $app = new App();
      renderUser($app);
      break;

    case "createUser":
      $app = new App();
      renderCreateUser($app);
      break;

    case "createNewUser":
      $app = new App();
      renderCreateNewUser($app);
      break;

    case "deleteUser":
      $app = new App();
      renderDeleteUser($app);
      break;

    case "updateUser":
      $app = new App();
      renderUpdateUser($app);
      break;

    default:
      $app = new App();
      renderPage($app);
      break;
  }

  /*
   *  Funcoes
  */
  function renderPage($app){
    $site = $app->loadModel("Site");
    $obj = $site->listPosts($app->PDO);
    $posts = $obj->fetchAll(PDO::FETCH_ASSOC);
    $param = array('titulo' => $app->site_titulo,
                   'pagina' => 'inicial',
                   'inicial' => array('posts' => $posts)
                   );
    $app->loadView("Site",$param);
  }

  function renderUser($app){
    $site = $app->loadModel("User");
    $obj = $site->getUsers($app->PDO);
    $user = $obj;
    $param = array('titulo' => $app->site_titulo,
                   'pagina' => 'users',
                   'users' => array('user' => $user)
                   );
    $app->loadView("Users",$param);
}

  function renderCreateUser($app){
    $app->loadView("User_form",$param);
  }
  function renderCreateNewUser($app){
    $site = $app->loadModel("User");
    $nome = $_POST['nome'];
    $obj = $site->createUser($app->PDO, $nome);
    $app->loadView("Users",$param);
  }

  function renderDeleteUser($app){
    $site = $app->loadModel("User");
    $idusuario = (int)$_GET["idusuario"];
    $obj = $site->deleteUser($app->PDO, $idusuario);
    $app->loadView("Users",$param);
  }


  function renderUpdateUser($app){
    $param = array('titulo' => $app->site_titulo);
    $app->loadView("User_form",$param);
echo "Update";
  }
