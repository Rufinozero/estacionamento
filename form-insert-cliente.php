<?php include("cabecalho.php");?>

    <h1>Cadastro de Clientes</h1>

    <form action="insert-cliente.php" method="post">
        <table class="table">
            <tr>
                <td>Nome:</td>
                <td>
                    <input class="form-control" type="text" placeholder="NOME" name="nome" autocapitalize="characters" autofocus/>
                </td>
            </tr>    

            <tr>
                <td>Data de Nascimento:</td>
                <td>
                    <input class="form-control" type="date" timezone_location_get placeholder="DD-MM-YYYY" name="dtnasc"/>
                </td>
            </tr>

            <tr>
                <td>CPF:</td>
                <td>
                    <input class="form-control" type="text" placeholder="CPF - Digite apenas os números" name="cpf"/>
                </td>            
            </tr>

            <tr>
                <td>CNPJ:</td>
                <td>
                    <input class="form-control" type="text" placeholder="CNPJ - Digite apenas os números" name="cnpj" />
                </td>
            </tr>

            <tr>
                <td>SEXO:</td>
                <td>
                    <select type="text" name="sexo">
                        <option>Selecione o sexo</option>
                        <option value="F">Feminino</option>
                        <option value="M">Masculino</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>TELEFONE:</td>
                <td>
                    <input class="form-control" type="text" placeholder="(31) 999999999" name="telefone" />
                </td>
            </tr>

            <tr>
                <td>EMAIL</td>
                <td>
                    <input class="form-control" type="mail" placeholder="Email" name="email" />
                </td>
            </tr>

            <tr>
                <td>CEP</td>
                <td>
                    <input class="form-control" type="integer" placeholder="CEP" name="cep" />
                </td>
            </tr>

            <tr>
                <td>ENDEREÇO:</td>
                <td>
                    <input class="form-control" type="text" placeholder="Rua/Av" name="nome_rua" />
                </td>
            </tr>

            <tr>
                <td>N°:</td>
                <td>
                    <input class="form-control" type="integer" placeholder="Ex. 301" name="numero_casa" />
                </td>
            </tr>
            
            <tr>
                <td>Complemento:</td>
                <td>
                    <input class="form-control" type="text" placeholder="Ex. Casa fundos" name="complemento" />
                </td>
            </tr>
            
            <tr>
                <td>Bairro:</td>
                <td>
                    <input class="form-control" type="text" placeholder="Bairro" name="bairro" />
                </td>
            </tr>
            
            <tr>
                <td>Cidade:</td>
                <td>
                    <input class="form-control" type="text" placeholder="Cidade" name="cidade" />
                </td>
            </tr>
            
            <tr>
                <td>Estado:</td>
                <td>
                    <input class="form-control" type="text" placeholder="Estado" name="estado" />
                </td>
            </tr>  
        
            
            <tr>
                <td></td>
                <td>
                    <input class="btn btn-light" type="submit" value="Adicionar Cliente">
                    <input class="btn btn-light" type="reset"  value="Cancelar">
                </td>
            </tr>
        </table> 

    </form>

<?php include("rodape.php");?>