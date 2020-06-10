<?php
    
    function inclui_Pagamento($conexao,$idrotativo,$placa,$idcliente){
        $query = "INSERT INTO FPAGAMENTO (IDROTATIVO,PLACA,IDCLIENTE)
                        VALUES ('{$idrotativo}','{$placa}','{$idcliente}')";
        return mysqli_query($conexao,$query);
    }

    



?>