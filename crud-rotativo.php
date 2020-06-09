<?php

    function inicia_rotativo($conexao,$idvaga,$idcliente,$placa,$dataentrada){
        $query = "INSERT INTO FROTATIVO (VAGA,IDCLIENTE,PLACA,DTHR_ENTRADA)
                        VALUES ('{$idvaga}','{$idcliente}','{$placa}','{$dataentrada}')";
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

    




?>