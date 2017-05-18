<?php

class Site {

  public $sqlPost = "SELECT u.idusuario,u.nome,p.idpost,p.titulo,p.texto
                    FROM usuario u,post p
                    WHERE u.idusuario=p.idusuario";

  // Listar todos os posts
  public function listPosts($con) {
    $obj = $con->prepare($this->sqlPost);
    $obj->execute();
    return $obj;
  }

  // Listagem de posts por página
  public function listPostsPage($con,$ini,$qtd) {
    $where = " LIMIT $ini,$qtd";
    $obj = $con->prepare($this->sqlPost." ".$where);
    $obj->execute();
    return $obj;
  }

  public function getRowsPost($con){
    $obj = $con->prepare("SELECT * FROM post");
    $obj->execute();
    $count = $obj->rowCount();
    return $count;
  }

  // Busca de posts por Título
  public function searchPosts($con,$search) {
    $where = " AND p.titulo LIKE '%$search%'";
    $obj = $con->prepare($this->sqlPost." ".$where);
    $obj->execute();
    return $obj;
  }

}
