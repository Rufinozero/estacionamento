<?php

    function insert_veiculo($conexao,$idcliente,$placa,$marca,$modelo,$cor,$tipo_veiculo,$descricao_tipo,$observacoes){
        $query = "INSERT INTO DVEICULO (IDCLIENTE,PLACA,MARCA,MODELO,COR,TIPO_VEICULO,DESCRICAO_TIPO,OBSERVACOES)
                        VALUES ('{$idcliente}','{$placa}','{$marca}','{$modelo}','{$cor}','{$tipo_veiculo}','{$descricao_tipo}','{$observacoes}'";
                        return mysqli_query($conexao,$query);
    }


    function select_veiculo($conexao){
		$listaVeiculo = array();
		$query = "SELECT * FROM DVEICULO V, DCLIENTE C WHERE V.IDCLIENTE==C.IDCLIENTE ORDER BY V.PLACA";
		$resultado = mysqli_query($conexao,$query);
		
		while ($veiculo = mysqli_fetch_assoc($resultado))
			  {
					array_push($listaVeiculo,$veiculo);
			  }
		return $listaVeiculo;
    }
    
    function delete_veiculo($conexao,$placa){
		$query = "DELETE FROM DVEICULO WHERE PLACA = {$placa}";
		return mysqli_query($conexao,$query);
	}



?>