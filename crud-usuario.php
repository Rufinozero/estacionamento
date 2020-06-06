<?php

	function buscaUsuario($conexao,$usuario,$senha){

		$senhaMd5 = md5($senha);

		$query = "SELECT * 
		            FROM DUSUARIO 
				   WHERE LOGIN = '{$usuario}'
				     AND SENHA = '{$senhaMd5}'";
		
		$resultado = mysqli_query($conexao,$query);
		
		$usuario =  mysqli_fetch_assoc($resultado);
		
		return $usuario;
	}

?>