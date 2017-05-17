<?php
  // includes
  require_once("libs/funcoes.php");
  require_once ("application.php");

  $modulo = isset($_GET['m']) ? $_GET['m'] : 'inicial';


  switch ($modulo) {

  // Usuários
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

  // Posts
    case "createPost":
      $app = new App();
      renderCreatePost($app);
      break;
    case "createNewPost":
      $app = new App();
      renderCreateNewPost($app);
      break;

    case "deletePost":
      $app = new App();
      renderDeletePost($app);
      break;

    case "updatePost":
      $app = new App();
      renderUpdatePost($app);
      break;
    case "updatePostDone":
      $app = new App();
      renderUpdatePostDone($app);
      break;


    default:
      $app = new App();
      renderPage($app);
      break;
  }

  /*
   *  Funcoes
  */

// Principal
  function renderPage($app){
    $site = $app->loadModel("Site");
    $obj = $site->listPosts($app->PDO);
    $posts = $obj->fetchAll(PDO::FETCH_ASSOC);
    $param = array('titulo' => $app->site_titulo,
                   'pagina' => 'inicial',
                   'titulo_pagina' => 'titulo',
                   'inicial' => array('posts' => $posts)
                   );
    $app->loadView("Site",$param);
  }

// USUARIOS
  function renderUser($app){
    $site = $app->loadModel("User");
    $obj = $site->getUsers($app->PDO);
    $param = array('titulo' => $app->site_titulo,
                   'pagina' => 'users',
                   'users' => array('user' => $obj)
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
    $site->createUser($app->PDO, $nome);
    $param = array('titulo' => $app->site_titulo,
                   'dados' => array('tituloform' => 'Cadastrar novo usuário',
                                    ));
    /* Listar Usuários */
    $obj = $site->getUsers($app->PDO);
    $param = array('titulo' => $app->site_titulo,
                   'pagina' => 'users',
                   'users' => array('user' => $obj)
                   );
    $app->loadView("Users",$param);
  }

  function renderDeleteUser($app){
    $idusuario = (int)$_GET["idusuario"];
    $site = $app->loadModel("User");
    $obj = $site->deleteUser($app->PDO, $idusuario);
    /* Listar Usuários */
    $obj = $site->getUsers($app->PDO);
    $param = array('titulo' => $app->site_titulo,
                   'pagina' => 'users',
                   'users' => array('user' => $obj)
                   );
    $app->loadView("Users",$param);
  }

  function  renderUpdateUser($app){
    $idusuario = (int)$_GET["idusuario"];
    $site = $app->loadModel("User");
    $obj = $site->getUserId($app->PDO, $idusuario);
    $param = array('titulo' => $app->site_titulo,
                   'dados' => array('tituloform' => 'Editar Usuário',
                                    'idusuario' => $obj['idusuario'],
                                    'nome' => $obj['nome'],
                                    'btn' => 'Salvar',
                                    'action' => 'updateUserDone'
                                    ));
    $app->loadView("User_form",$param);
  }
  function renderUpdateUserDone($app){
    $site = $app->loadModel("User");
    $nome = $_POST['nome'];
    $idusuario = $_POST['idusuario'];
    $obj = $site->updateUser($app->PDO, $nome, $idusuario);
    $param = array('titulo' => $app->site_titulo
                  );
    /* Listar Usuários */
    $obj = $site->getUsers($app->PDO);
    $param = array('titulo' => $app->site_titulo,
                   'pagina' => 'users',
                   'users' => array('user' => $obj)
                   );
    $app->loadView("Users",$param);
  }

// POSTS
  function renderCreatePost($app){
    $idusuario = (int)$_GET["idusuario"];
    $site = $app->loadModel("User");
    $obj = $site->getUserId($app->PDO, $idusuario);
    $param = array('titulo' => $app->site_titulo,
                   'dados' => array('tituloform' => 'Cadastrar post',
                                    'idusuario' => $obj['idusuario'],
                                    'btn' => 'Cadastrar Post',
                                    'nome' => $obj['nome'],
                                    'action' => 'createNewPost'
                                    ));
    $app->loadView("Post_form",$param);
  }

  function renderCreateNewPost($app){
    $site = $app->loadModel("User");
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $idusuario = $_POST['idusuario'];
    $obj = $site->createPost($app->PDO, $titulo, $texto, $idusuario);
    /* Listar Posts */
    $site = $app->loadModel("Site");
    $obj = $site->listPosts($app->PDO);
    $posts = $obj->fetchAll(PDO::FETCH_ASSOC);
    $param = array('titulo' => $app->site_titulo,
                   'pagina' => 'inicial',
                  'titulo_pagina' => 'titulo',
                  'inicial' => array('posts' => $posts)
                  );
    $app->loadView("Site",$param);
  }

  function renderDeletePost($app){
    $idpost = (int)$_GET['idpost'];
    $site = $app->loadModel("User");
    $obj = $site->deletePost($app->PDO, $idpost);
    /* Listar Posts */
    $site = $app->loadModel("Site");
    $obj = $site->listPosts($app->PDO);
    $posts = $obj->fetchAll(PDO::FETCH_ASSOC);
    $param = array('titulo' => $app->site_titulo,
                   'pagina' => 'inicial',
                  'titulo_pagina' => 'titulo',
                  'inicial' => array('posts' => $posts)
                  );
    $app->loadView("Site",$param);
  }

  function renderUpdatePost($app){
    $idpost = (int)$_GET["idpost"];
    $site = $app->loadModel("User");
    $obj = $site->getPostId($app->PDO, $idpost);
    $param = array('titulo' => $app->site_titulo,
                   'dados' => array('tituloform' => 'Editar Post',
                                    'idpost' => $obj['idpost'],
                                    'nome' => $obj['nome'],
                                    'titulo' => $obj['titulo'],
                                    'texto' => $obj['texto'],
                                    'btn' => 'Salvar',
                                    'action' => 'updatePostDone'
                                    ));
    $app->loadView("Post_form",$param);
  }

  function renderUpdatePostDone($app){
    $site = $app->loadModel("User");
    $titulo = $_POST['titulo'];
    $texto = $_POST['texto'];
    $idpost = $_POST['idpost'];
    $obj = $site->updatePost($app->PDO, $titulo, $texto, $idpost);
    $param = array('titulo' => $app->site_titulo
                  );
    /* Listar Posts */
    $site = $app->loadModel("Site");
    $obj = $site->listPosts($app->PDO);
    $posts = $obj->fetchAll(PDO::FETCH_ASSOC);
    $param = array('titulo' => $app->site_titulo,
                   'pagina' => 'inicial',
                  'titulo_pagina' => 'titulo',
                  'inicial' => array('posts' => $posts)
                  );
    $app->loadView("Site",$param);
  }
