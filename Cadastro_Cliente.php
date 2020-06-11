<?php
	session_start();
?>

<html>
	<head>
        <meta charset="utf-8">
        <title>Estacionamento</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet"href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script language="javascript"> 
			//Código para adicionar uma máscara ao campo de telefone, no index e no Alterar
			function mascara(t, mask)
			{
				var i = t.value.length;
				var saida = mask.substring(1,0);
				var texto = mask.substring(i)
				if (texto.substring(0,1) != saida)
				{
					t.value += texto.substring(0,1);
				}
			}
		</script>
        <link rel="stylesheet" href="Estilo.css">
    </head>
    <body >
        <form method="POST" action="" id="Cadastro" name="Cadastro">		
			<div class="text-center img-responsive">
				<img src="">  
			</div>
			
			<nav class="navbar navbar-inverse">
			  <div class="container">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
					<a class="navbar-brand" href="index.php">Rufino Estacionamentos</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li>
						<a href="" class="glyphicon glyphicon-info-sign">  Institucional</a>
					</li>	
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
					<li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>   
				  </ul>
				</div>
			  </div>
			</nav>
			
			<div class="container">
				<div class="row">
				
					<div name="Nome" id="Nome" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira seu nome: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="nome" required placeholder="Nome" class='form-control' autofocus minlength="3">
						</div>
					</div>
					
					<div name="Data" id="Data" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira sua data de nascimento: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
							<input type="date" name="data" required class='form-control' min="1900-01-01" max="2016-11-28">
						</div>
					</div>
					
					<div name="Cpf" id="Cpf" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>CPF (Somente para pessoas físicas): </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="cpf" required placeholder="123.456.789-10" class='form-control' autofocus minlength="3">
						</div>
					</div>
					
					<div name="Cpnj" id="Cpnj" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>CNPJ (Somente para pessoas jurídicas): </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="cnpj" required placeholder="12.345.678/9101-11" class='form-control' autofocus minlength="3">
						</div>
					</div>
					
					<div name="Sexo" id="sexo" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Sexo: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<select type="text" name="sexo" required placeholder="Ex: Feminino" class='form-control' autofocus minlength="3">
								<option value="F">Feminino</option>
								<option value="M">Masculino</option>
							</select>
						</div>
					</div>
					
					<div name="Email" id="Email" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira seu E-mail: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input type="email" name="email" required placeholder="Ex: email@dominio.com" class='form-control'>
						</div>
					</div>
					
					<div name="Telefone" id="Telefone" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira se telefone: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
							<input type="text" name="telefone" required class='form-control' onkeypress="mascara(objCliente, '## ####-####')" placeholder="(31) 91234-5678" maxlength="12">
						</div>
					</div>
					
					<div name="Cep" id="Cep" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>CEP: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="cep" required placeholder="12.345.678" class='form-control' autofocus minlength="3">
						</div>
					</div>
					
					<div name="Endereco" id="Endereco" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Endereço: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="endereco" required placeholder="Rua/AV A" class='form-control' autofocus minlength="3">
						</div>
					</div>
					
					<div name="Numero" id="Numero" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Número: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="numero" required placeholder="10" class='form-control' autofocus minlength="3">
						</div>
					</div>
					
					<div name="Complemento" id="Complemento" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Complemento: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="complemento" required placeholder="Ap/Casa A" class='form-control' autofocus minlength="3">
						</div>
					</div>
					
					<div name="Bairro" id="Bairro" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Bairro: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="bairro" required placeholder="Eldorado" class='form-control' autofocus minlength="3">
						</div>
					</div>
					
					<div name="Cidade" id="Cidade" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Cidade: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="cidade" required placeholder="Contagem" class='form-control' autofocus minlength="3">
						</div>
					</div>
					
					<div name="Estado" id="Estado" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Estado: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="estado" required placeholder="Minas Gerais" class='form-control' autofocus minlength="3">
						</div>
					</div>
					
					<div name="Senha" id="Senha" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira sua senha: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" name="senha" required class='form-control' minlength="8">
						</div>
					</div>
					
					<div name="SenhaC" id="SenhaC" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Confirme a sua senha: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input type="password" name="senhaC" required class='form-control' minlength="8">
						</div>
					</div>
					
					<div class='col-md-6'>
						<br>
						<br>
						<div align="center">
							<input type="submit" name="enviar" value="Finalizar" class="lead btn">
						</div>
					</div>
					
					<div class='col-md-6'>
						<br>
						<br>
						<div align="center">
							<input type="reset" name="reset" value="Limpar" class="lead btn">
						</div>
					</div>
					
				</div>
			</div>
			<br>
			<br>
			
			<div class="jumbotron text-center">
				<h1>Obrigado por se cadastrar!</h1>
			</div>
		</form>
		
		<?php
		
			if(isset($_POST["enviar"]))
			{				
				include("Classe_Cliente.php");
				
				$objCliente = new Cliente();
				
				$objCliente->dtnasc = $_POST["data"];
				$objCliente->nome = $_POST["nome"];
				$objCliente->cpf = $_POST["cpf"];
				$objCliente->cpnj = $_POST["cnpj"];
				$objCliente->sexo = $_POST["sexo"];
				$objCliente->telefone = $_POST["telefone"];
				$objCliente->email = $_POST["email"];
				$objCliente->nome_rua = $_POST["endereco"];
				$objCliente->numero_rua = $_POST["numero"];
				$objCliente->complemento = $_POST["complemento"];
				$objCliente->bairro = $_POST["bairro"];
				$objCliente->cidade = $_POST["cidade"];
				$objCliente->estado = $_POST["estado"];
				$objCliente->cep = $_POST["cep"];
				
				$objCliente->Inserir();
				
				header('location: index.php');
			}
		?>
    </body>
</html>