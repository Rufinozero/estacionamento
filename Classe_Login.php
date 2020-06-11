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
			
			$sqlUSR = "select senha from dUsuario where login =".$this->usrLogin;
			//Verificação se a variável de inserção retornará true do Banco de Dados
			if ($objConexao->conexao->query($sqlUSR) === TRUE) 
			{
				$Row = mysqli_num_rows($ExecuteSQL);
				$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
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
				$sqlUSR = "select senha from dCliente where email =".$this->cliEmail;
				//Verificação se a variável de inserção retornará true do Banco de Dados
				if ($objConexao->conexao->query($sqlUSR) === TRUE) 
				{
					$Row = mysqli_num_rows($ExecuteSQL);
					$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
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
					echo "<script>alert('Email incorreto ou não existente');</script>";
				}
			}
		}
	}
?>