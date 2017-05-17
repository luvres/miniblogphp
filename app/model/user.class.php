<?php

class User {
/*
	public function getUserLogin($con, $nome){
		$obj = $con->prepare("SELECT nome
													FROM usuario
													WHERE nome = :nome");
		$obj->bindParam(":nome", $nome);
		return ($obj->execute()) ? $obj->fetch(PDO::FETCH_OBJ) : false;
	}
*/

// USER
	public function getUsers($con){
		$obj = $con->prepare("SELECT idusuario,nome
													FROM usuario
													ORDER BY nome");
		return ($obj->execute()) ? $obj->fetchAll(PDO::FETCH_ASSOC) : false;
	}

	public function createUser($con, $nome){
		$ins = $con->prepare("INSERT INTO usuario(nome)
													VALUES(:nome)");
		$ins->bindParam(":nome",$nome);
		$obj = $ins->execute();
		return ($obj) ? $obj : false;
	}

	public function deleteUser($con, $idusuario){
		$ins = $con->prepare("DELETE FROM usuario
													WHERE idusuario = :idusuario");
		$ins->bindParam(":idusuario",$idusuario);
		$obj = $ins->execute();
		return ($obj) ? $obj : false;
	}


	public function getUserId($con, $idusuario){
		$obj = $con->prepare("SELECT idusuario,nome
													FROM usuario
													WHERE idusuario = :idusuario");
		$obj->bindParam(":idusuario",$idusuario);
		return ($obj->execute()) ? $obj->fetch(PDO::FETCH_ASSOC) : false;
	}

	public function updateUser($con, $nome, $idusuario){
		$ins = $con->prepare("UPDATE usuario SET nome = :nome
													WHERE idusuario = :idusuario");
		$ins->bindParam(":nome",$nome);
		$ins->bindParam(":idusuario",$idusuario);
		$obj = $ins->execute();
		return ($obj) ? $obj : false;
	}

// POSTS
	public function createPost($con, $titulo, $texto, $idusuario){
		$ins = $con->prepare("INSERT INTO post(titulo,texto,idusuario)
													VALUES(:titulo,:texto,:idusuario)");
		$ins->bindParam(":titulo",$titulo);
		$ins->bindParam(":texto",$texto);
		$ins->bindParam(":idusuario",$idusuario);
		$obj = $ins->execute();
		return ($obj) ? $obj : false;
	}

	public function deletePost($con, $idpost){
		$ins = $con->prepare("DELETE FROM post
													WHERE idpost = :idpost");
		$ins->bindParam(":idpost",$idpost);
		$obj = $ins->execute();
		return ($obj) ? $obj : false;
	}

	public function getPostId($con, $idpost){
		$obj = $con->prepare("SELECT u.idusuario,u.nome,p.idpost,p.titulo,p.texto
													FROM usuario u,post p
													WHERE u.idusuario=p.idusuario
													AND idpost = :idpost");
		$obj->bindParam(":idpost",$idpost);
		return ($obj->execute()) ? $obj->fetch(PDO::FETCH_ASSOC) : false;
	}

}
