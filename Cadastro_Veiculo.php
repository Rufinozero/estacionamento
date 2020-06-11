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
        <link rel="stylesheet" href="Estilo.css">
    </head>
    
    <body>
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
						<a href="Cadastro_Cliente.php" class="glyphicon glyphicon-info-sign"> Cadastro de Cliente</a>
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
				
					<div name="Placa" id="Placa" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira a placa do veículo: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="placa" required placeholder="AAA1234 ou AAA1A23" class='form-control' autofocus minlength="3">
						</div>
                    </div>
                    
                    <div name="Marca" id="Marca" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira a marca do veículo: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="marca" required placeholder="FIAT" class='form-control' autofocus minlength="3">
						</div>
                    </div>

                    <div name="Modelo" id="Modelo" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira o modelo do veículo: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="modelo" required placeholder="PALIO" class='form-control' autofocus minlength="3">
						</div>
                    </div>

                    <div name="Cor" id="Cor" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira a cor do veículo: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="cor" required placeholder="PRETO" class='form-control' autofocus minlength="3">
						</div>
                    </div>

                    <div name="Observacoes" id="Observacoes" class='col-md-12'>
						<br>
						<br>
						<div align="center">
							<label>Insira observações do veículo: </label>
						</div>
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input type="text" name="observacoes" required placeholder="Ex: Lateral amassada, lanterna quebrada." class='form-control' autofocus minlength="3">
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
		
		</form>
		
        <?php
        
            if(isset($_POST["enviar"]))
                {				
                    include("Classe_Veiculo.php");
                    
                    $objVeiculo = new Veiculo();

                    $objVeiculo->placa = $_POST["placa"];
                    $objVeiculo->marca = $_POST["marca"];
                    $objVeiculo->modelo = $_POST["cor"];
                    $objVeiculo->observacoes = $_POST["observacoes"];
                    
                    $objVeiculo->Inserir();
				
                    header('location: index.php');
                }
            ?>
        </body>
    </html>
            