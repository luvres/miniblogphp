<?php

class Site {

  public $sqlPost = "SELECT u.idusuario,u.nome,p.idpost,p.titulo,p.texto
                    FROM usuario u,post p
                    WHERE u.idusuario=p.idusuario";

  public function listPosts($con) {
    $obj = $con->prepare($this->sqlPost);
    $obj->execute();
    return $obj;
  }
}
