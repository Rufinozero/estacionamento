<?php

    include("cabecalho.php");
    include("conexaoMySQL.php");
    include("crud-cliente.php");

    $nome        = $_POST["nome"];
    $dtnasc      = $_POST["dtnasc"];
    $cpf         = $_POST["cpf"];
    $cnpj        = $_POST["cnpj"];
    $sexo        = $_POST["sexo"];
    $telefone    = $_POST["telefone"];
    $email       = $_POST["email"];
    $cep         = $_POST["cep"];
    $nome_rua    = $_POST["nome_rua"];
    $numero_casa = $_POST["numero_casa"];
    $complemento = $_POST["complemento"];
    $bairro      = $_POST["bairro"];
    $cidade      = $_POST["cidade"];
    $estado      = $_POST["estado"];

    if(insert_Cliente($conexao,$nome,$dtnasc,$cpf,$cnpj,$sexo,$telefone,$email,$cep,$nome_rua,$numero_casa,$complemento,$bairro,$cidade,$estado))
        {?>
        <h2>
            <p class="text-success">Dados do Cliente - OK</p>
        </h2>

        <?php}

    else {
        $msg = mysqli_error($conexao);
        echo $msg;?>
        <h2>
            <p class="text-danger">Não foi possível incluir cliente. Procure o administrador.</p>
        </h2>

    <?php    
         }
    ?>

<?php include("rodape.php"); ?>