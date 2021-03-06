<?php
    class Rotativo 
    {   //atributos da classe para utilizarmos durante todo o processo, ela receberá os valores escritos no UI
        public $idrotativo;
        public $login;
        public $idvaga;
        public $idcliente;
        public $idplano;
        public $placa;
        public $dthr_entrada;
        public $dthr_saida;
        public $valor_estadia;
        
        //O Método construct executa tudo que estiver dentro
        public function __construct()
        {
            //atributos e métodos que irão se realizar quando a classe for instanciada
            include("Classe_Conexao.php");
            $this->$idrotativo="";
            $this->$login="";
            $this->$idvaga="";
            $this->$idcliente="";
            $this->$idplano="";
            $this->$placa="";
            $this->$dthr_entrada="";
            $this->$dthr_saida="";
            $this->$valor_estadia="";

        }
        //Método de inserção de veículos, ela será chamada nas páginas quando formos inserir, reutilizando o código
        
        public function Inserir()
		{	//instanciação da classe de conexão, Dividimos a programação em três ou quatro camdas, a DAL(Data Acess Layer), a BLL(Business Logical Layer)
			//a UI (User Interface) e a DTO(Data Transfer Object). A DAL é a classe de conexão, a nossa Classe_Conexao, e ela não necessita de nenhuma
			//instanciação de outras classes, sendo uma base. A BLL e essa classe(Classe_Cliente), e ela trabalha tudo envolvo em lóogica de CRUD(Create,Retrieve,Update,Delete)
			//ou afins, e ela necessita da DAL e da DTO(Não estamos utilizando DTO nesse sistema). Por último, a UI, ela é página em que trabalhamos, 
			//a única camada que o usuário urá interagir, e ela necessita da BLL e da DTO, sendo a BLL usando a DAL.
			$objConexao = new Conexao();
			$sql = "insert into fRotativo values
					(
                        '".$this->idrotativo."',     
                        '".$this->login."',
                        '".$this->idvaga."',
                        '".$this->idcliente."',
                        '".$this->idplano."',
                        '".$this->placa."',
                        '".$this->dthr_entrada."',
                        '".$this->dthr_saida."',
                        '".$this->valor_estadia."',
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
			$sql = "select * from fRotativo where idrotativo = ".$this->idrotativo;
			//Query de execução da sql acima
			$ExecuteSQL = $objConexao->conexao->query($sql);
			$Row = mysqli_num_rows($ExecuteSQL);
			//Essa variável irá armazenar por em índice textual, ou seja, a identificação dos dados ocerrerá atraves de índices escritos ao invés de números.
			//A variável carrega consigo todas as informações do usuário especificado.
			$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
			//a atribuição dos dados armazenados na variável DataTableP, nos atributos da classe.
            $this->idrotativo = $DataTableP["idrotativo"];
            $this->login = $DataTableP["login"];
            $this->idvaga = $DataTableP["idvaga"];
            $this->idcliente = $DataTableP["idcliente"];
            $this->idplano = $DataTableP["idplano"];
            $this->placa = $DataTableP["placa"];
            $this->dthr_entrada = $DataTableP["dthr_entrada"];
            $this->dthr_saida = $DataTableP["dthr_saida"];
            $this->valor_estadia = $DataTableP["valor_estadia"];
        }

        public function Alterar()
		{
			$objConexao = new Conexao();
			
			$sql = "update dVeiculos set 
            idvaga='".$this->idvaga."',
            idcliente='".$this->idcliente."',
            idplano='".$this->idplano."',
            placa='".$this->placa."',
            dthr_saida='".$this->dthr_saida."',
            valor_estadia='".$this->valor_estadia."',
            where idrotativo=".$this->idrotativo."";

            if ($objConexao->conexao->query($sql) === TRUE) 
			{
				header('location: Pagamento.php');
			}
			else 
			{
				echo "Error updated record: " . $objConexao->conexao->error;
			}
        }

    }
?>
