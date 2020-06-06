<?php

	include("conexaoMySQL.php");
	include("crud-usuario.php");

	$usuario = buscaUsuario($conexao,$_POST["username"],$_POST["pwd"]);
	
	if($usuario == null)
	{
		echo "Usuário e/ou Senha estão incorreto(s).";	
	}
	else{
			header("Location: index.php");
		}

?>