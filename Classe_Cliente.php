<?php
	class Cliente
	{	//atributos da classe para utilizarmos durante todo o processo, ela receberá os valores escritos no UI
		public $idcliente;
		public $dtnasc;
		public $nome;
		public $cpf;
		public $cnpj;
		public $sexo;
		public $telefone;
		public $tipo_cliente;
		public $email;
		public $nome_rua;
		public $numero_rua;
		public $complemento;
		public $bairro;
		public $cidade;
		public $estado;
		public $cep;
		public $status;
		
		//O Método construct executa tudo que estiver dentro
		public function __construct()
		{
			//atributos e métodos que irão se realizar quando a classe for instanciada
			include("Classe_Conexao.php");
			$this->idcliente="";
			$this->dtnasc="";
			$this->nome="";
			$this->cpf="";
			$this->cnpj="";
			$this->sexo="";
			$this->telefone="";
			$this->tipo_cliente="";
			$this->email="";
			$this->nome_rua="";
			$this->numero_rua="";
			$this->complemento="";
			$this->bairro="";
			$this->cidade="";
			$this->estado="";
			$this->cep="";
			$this->status="";
		}
		
		//Método de inserção de clientes, ela será chamada nas páginas quando formos inserir, reutilizando o código
		public function Inserir()
		{	//instanciação da classe de conexão, Dividimos a programação em três ou quatro camdas, a DAL(Data Acess Layer), a BLL(Business Logical Layer)
			//a UI (User Interface) e a DTO(Data Transfer Object). A DAL é a classe de conexão, a nossa Classe_Conexao, e ela não necessita de nenhuma
			//instanciação de outras classes, sendo uma base. A BLL e essa classe(Classe_Cliente), e ela trabalha tudo envolvo em lóogica de CRUD(Create,Retrieve,Update,Delete)
			//ou afins, e ela necessita da DAL e da DTO(Não estamos utilizando DTO nesse sistema). Por último, a UI, ela é página em que trabalhamos, 
			//a única camada que o usuário urá interagir, e ela necessita da BLL e da DTO, sendo a BLL usando a DAL.
			if($this->cpf != "" || $this->cpf != null)
			{
				$this->tipo_cliente = 1;
			}
			else if($this->cnpj != "" || $this->cnpj != null)
			{
				$this->tipo_cliente = 2;
			}
			
			$objConexao = new Conexao();
			$sql = "insert into dCliente values
					(
						null, 
						'".$this->dtnasc."', 
						'".$this->nome."', 
						'".$this->cpf."',
						'".$this->cnpj."',
						'".$this->sexo."',
						'".$this->telefone."',
						'".$this->tipo_cliente."',
						'".$this->email."',
						'".$this->nome_rua."',
						'".$this->numero_rua."',
						'".$this->complemento."',
						'".$this->bairro."',
						'".$this->cidade."',
						'".$this->estado."',
						'".$this->cep."',
						true
					)";
			//Verificação se a variável de inserção retornará true do Banco de Dados
			if ($objConexao->conexao->query($sql) === TRUE) 
			{
				echo "Record inserted successfully";
			}
			else 
			{
				//Neste echo, ele apresentará que a query retornou false, e que nela contém um erro, apresentando tabém o erro e a linha em que se encontra
				echo "Error inserting record: " . $objConexao->conexao->error;
			}
		}
		
		public function Pesquisar()
		{
			$objConexao = new Conexao();
			//Query de seleção
			$sql = "select * from dCliente where idcliente = ".$this->idcliente;
			//Query de execução da sql acima
			$ExecuteSQL = $objConexao->conexao->query($sql);
			$Row = mysqli_num_rows($ExecuteSQL);
			//Essa variável irá armazenar por em índice textual, ou seja, a identificação dos dados ocerrerá atraves de índices escritos ao invés de números.
			//A variável carrega consigo todas as informações do usuário especificado.
			$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
			//a atribuição dos dados armazenados na variável DataTableP, nos atributos da classe.
			$this->idcliente = $DataTableP["idcliente"];
			$this->dtnasc = $DataTableP["dtnasc"];
			$this->nome = $DataTableP["nome"];
			$this->cpf = $DataTableP["cpf"];
			$this->cnpj = $DataTableP["cnpj"];
			$this->sexo = $DataTableP["sexo"];
			$this->telefone = $DataTableP["telefone"];
			$this->tipo_cliente = $DataTableP["tipo_cliente"];
			$this->email = $DataTableP["email"];
			$this->nome_rua = $DataTableP["nome_rua"];
			$this->numero_rua = $DataTableP["numero_rua"];
			$this->complemento = $DataTableP["complemento"];
			$this->bairro = $DataTableP["bairro"];
			$this->cidade = $DataTableP["cidade"];
			$this->estado = $DataTableP["estado"];
			$this->cep = $DataTableP["cep"];
			$this->status = $DataTableP["status"];
		}
		
		public function Alterar()
		{
			$objConexao = new Conexao();
			
			$sql = "update dCliente set 
			dtnasc='".$this->dtnasc."',
			nome='".$this->nome."',
			cpf='".$this->cpf."',
			cnpj='".$this->cnpj."',
			sexo='".$this->sexo."',
			telefone='".$this->telefone."',
			tipo_cliente='".$this->tipo_cliente."',
			email='".$this->email."',
			nome_rua='".$this->nome_rua."',
			numero_rua='".$this->numero_rua."',
			complemento='".$this->complemento."',
			bairro='".$this->bairro."',
			cidade='".$this->cidade."',
			estado='".$this->estado."',
			cep='".$this->cep."',
			where idcliente=".$this->idcliente."";
			
			if ($objConexao->conexao->query($sql) === TRUE) 
			{
				header('location: INSERIRVEICULO.php');
			}
			else 
			{
				echo "Error updated record: " . $objConexao->conexao->error;
			}
		}
		
		public function Deletar()
		{
			$objConexao = new Conexao();

			$sql = "update dCliente set status = false";
			
			if ($objConexao->conexao->query($sql) === TRUE) 
			{
				echo "<script>alert('Cliente removido');</script>";
			}
			else 
			{
				echo "Erro ao remover cliente: " . $objConexao->conexao->error;
			}
		}
	}
?>