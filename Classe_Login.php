<?php
	Class Login
	{
		public $usrLogin;
		public $pwdLogin;
		public $cliEmail;
		public $cliSenha;
		public $status;
		
		public function __construct()
		{
			//atributos e métodos que irão se realizar quando a classe for instanciada
			include("Classe_Conexao.php");
			$this->usrLogin="";
			$this->pwdLogin="";
			$this->cliEmail="";
			$this->cliSenha="";
			$this->status="";
		}
		
		public function Login()
		{
			$objConexao = new Conexao();
			
			$sqlUSR = "select senha from dUsuario where login = '".$this->usrLogin."'";
			//Verificação se a variável de inserção retornará true do Banco de Dados
			
			$ExecuteSQL = $objConexao->conexao->query($sqlUSR);
			
			if ($ExecuteSQL === TRUE) 
			{
				$Row = mysqli_num_rows($ExecuteSQL);
				$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
				$this->pwdLogin=md5($this->pwdLogin);	

				if($this->pwdLogin == $DataTableP['senha'])
				{
					$this->status=true;
				}
				else
				{
					echo "<script>alert('Senha incorreta');</script>";
				}
			}
			else 
			{
				$sqlCLI = "select senha from dCliente where email ='".$this->cliEmail."'";
				//Verificação se a variável de inserção retornará true do Banco de Dados

				$ExecuteSQL = $objConexao->conexao->query($sqlCLI);

				if ($ExecuteSQL === TRUE) 
				{
					$Row = mysqli_num_rows($ExecuteSQL);
					$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
					$this->cliSenha=md5($this->cliSenha);

					if($this->cliSenha == $DataTableP['senha'])
					{
						$this->status=true;
					}
					else
					{
						echo "<script>alert('Senha incorreta');</script>";
					}
				}
				else
				{
					//Neste echo, ele apresentará que a query retornou false, e que nela contém um erro, apresentando tabém o erro e a linha em que se encontra
					echo "<script>alert('".$sqlUSR."');</script>";
				}
			}
		}
	}
?>