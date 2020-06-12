<?php
	session_start();
?>
<html>
	<head>
		<title>Estacionamento Rufino</title>
		<meta charset="utf-8">		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet"href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>

    <body>
        <form method="POST" action="" id="Login" name="Login">		
			<nav class="navbar navbar-inverse">
			  <div class="container">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="#">Rufino Estacionamentos</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav navbar-right">
					<li><a href="Cadastro_Cliente.php"><span class="glyphicon glyphicon-exclamation-sign"></span> Cadastre-se</a></li>
				  </ul>
				</div>
			  </div>
			</nav>
			
			<div class="container-fluid">
				<div class="row">					
					<div class="col-sm-12 text-center">
						<div id="login">
							<div class="text-center img-responsive">
								<img src="">  
							</div>
							<label>
							E-mail:
							<input class="lead form-control" type="mail" name="email" required>
							</label>
							<br>
							<label>
							Senha:
							<input class="lead form-control" type="password" name="senha" crypt="md5" required>
							</label>
							<br>
							<br> 
							<input type="submit" class="but btn-success btn btn-lg" name ="logar" value="Entrar" >
						</div>
					</div>
				</div>
			</div>
		</form>
		
		<?php
			
			$_SESSION{"LGN"} = "";
			include("Classe_Login.php");
			
			if(isset($_POST["logar"]))
			{
				$objLogin = new Login();
				
				$objLogin->usrLogin = $_POST["email"];
				$objLogin->cliEmail = $_POST["email"];
				$objLogin->pwdLogin = $_POST["senha"];
				$objLogin->cliSenha = $_POST["senha"];
				
				$objLogin->Login();
				
				if($objLogin->status == true)
				{
					$_SESSION{"LGN"} = true;
					echo "<script>alert('Deu certo ;)');</script>";
					//header('location: Desktop.php');
				}
				echo "<script>alert('deu errado :(');</script>";
			}
        ?>
    </body>
</html>