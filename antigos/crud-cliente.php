<?php

	function insert_Cliente($conexao,$nome,$dtnasc,$cpf,$cnpj,$sexo,$telefone,$tipocliente,$email,$nome_rua,$numero_casa,$complemento,$bairro,$cidade,$estado,$cep,$plano){		
		$query = "INSERT INTO DCLIENTE (NOME,DTNASC,CPF,CNPJ,SEXO,TELEFONE,TIPO_CLIENTE,EMAIL,NOME_RUA,NUMERO_CASA,COMPLEMENTO,BAIRRO,CIDADE,ESTADO,CEP,IDPLANO)
		              VALUES ('{$nome}','{$dtnasc}','{$cpf}','{$cnpj}','{$sexo}','{$telefone}','{$tipocliente}','{$email}','{$nome_rua}','{$numero_casa}','{$complemento}','{$bairro}','{$cidade}','{$estado}','{$cep}','{$plano}'";
	    return mysqli_query($conexao,$query);
	}

	function select_Cliente($conexao){
		$listaCliente = array();
		$query = "SELECT * FROM DCLIENTE ORDER BY NOME";
		$resultado = mysqli_query($conexao,$query);
		
		while ($cliente = mysqli_fetch_assoc($resultado))
			  {
					array_push($listaCliente,$cliente);
			  }
		return $listaCliente;
	}

	function delete_Cliente($conexao,$codigo){
		$query = "DELETE FROM DCLIENTE WHERE IDCLIENTE = {$codigo}";
		return mysqli_query($conexao,$query);
	}

	function selectUpdate_Cliente($conexao,$codigo){
		$query = "SELECT * FROM DCLIENTE WHERE IDCLIENTE = {$codigo}";
		$resultado = mysqli_query($conexao,$query);
		return mysqli_fetch_assoc($resultado);
	}

	/*function update_Cliente($conexao,$codigo,$nome,$email){
		$query = "UPDATE CLIENTE 
		             SET NOME = '{$nome}', 
		                 EMAIL = '{$email}'
		               WHERE CODIGO = '{$codigo}'";
		return mysqli_query($conexao, $query);
	}*/

?>