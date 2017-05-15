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

}
