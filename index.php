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
    case "updateUserDone":
      $app = new App();
      renderUpdateUserDone($app);
      break;

    case "createPost":
      $app = new App();
      renderCreatePost($app);
      break;
    case "createNewPost":
      $app = new App();
      renderCreateNewPost($app);
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
    $param = array('titulo' => $app->site_titulo,
                   'dados' => array('tituloform' => 'Cadastrar novo usuário',
                                    'btn' => 'Cadastrar',
                                    'action' => 'createNewUser'
                                    ));
    $app->loadView("User_form",$param);
  }
  function renderCreateNewUser($app){
    $site = $app->loadModel("User");
    $nome = $_POST['nome'];
    $obj = $site->createUser($app->PDO, $nome);
    $app->loadView("Users",$param);
  }

  function renderDeleteUser($app){
    $idusuario = (int)$_GET["idusuario"];
    $site = $app->loadModel("User");
    $obj = $site->deleteUser($app->PDO, $idusuario);
    $app->loadView("Users",$param);
  }

  function  renderUpdateUser($app){
    $idusuario = (int)$_GET["idusuario"];
    $site = $app->loadModel("User");
    $obj = $site->getUserId($app->PDO, $idusuario);
    $param = array('titulo' => $app->site_titulo,
                   'dados' => array('tituloform' => 'Alterar usuário',
                                    'idusuario' => $obj['idusuario'],
                                    'nome' => $obj['nome'],
                                    'btn' => 'Alterar',
                                    'action' => 'updateUserDone'
                                    ));
    $app->loadView("User_form",$param);
  }
  function renderUpdateUserDone($app){
    $site = $app->loadModel("User");
    $nome = $_POST['nome'];
    $idusuario = $_POST['idusuario'];
    $obj = $site->updateUser($app->PDO, $nome, $idusuario);
    $app->loadView("Users",$param);
  }


  function renderCreatePost($app){
    $idusuario = (int)$_GET["idusuario"];
    //$site = $app->loadModel("User");
    //$obj = $site->getUserId($app->PDO, $idusuario);
    $param = array('titulo' => $app->site_titulo,
                   'dados' => array('tituloform' => 'Cadastrar post',
                   'btn' => 'Cadastrar Post',
                   'action' => 'createNewPost'
                   ));
    $app->loadView("Post_form",$param);
print_r($idusuario);
  }

  function renderCreateNewPost($app){
    $site = $app->loadModel("User");
    $titulo = $_POST['post_titulo'];
    $texto = $_POST['post_texto'];
    $idusuario = $_POST['idusuario'];
echo "titulo : "; print_r($titulo);
echo "<br>texto : "; print_r($texto);
echo "<br>id : ";  print_r($idusuario);
  }


//  $obj = $site->createUser($app->PDO, $nome);
//  $app->loadView("Users",$param);
