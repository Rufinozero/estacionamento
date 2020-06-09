<?php

    function inicia_rotativo($conexao,$idvaga,$idcliente,$placa,$dataentrada){
        $query = "INSERT INTO FROTATIVO (VAGA,IDCLIENTE,PLACA,DTHR_ENTRADA)
                        VALUES ('{$idvaga}','{$idcliente}','{$placa}',NOW())";
        return mysqli_query($conexao,$query);
    }

    function consulta_rotativo($conexao,$placa){
        $query = "SELECT IDCLIENTE, PLACA, DTHR_ENTRADA, IDVAGA
                    FROM FROTATIVO
                    WHERE PLACA == PLACA
                    OR    IDCLIENTE == IDCLIENTE
                    OR    IDVAGA == IDVAGA";

        return mysqli_query($conexao,$query);
    }

    function saida_rotativo($conexao,$idrotativo){
        $query = "UPDATE FROTATIVO SET DTHR_SAIDA = NOW()
                        WHERE IDROTATIVO == IDROTATIVO";

        return mysqli_query($conexao,$query);
    }

    




?>