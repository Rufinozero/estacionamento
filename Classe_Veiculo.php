<?php
    class Veiculo 
    {   //atributos da classe para utilizarmos durante todo o processo, ela receberá os valores escritos no UI
        public $placa;
        public $marca;
        public $modelo;
        public $cor;
        public $tipo_veiculo;
        public $descricao_tipo;
        public $observacoes;
        public $idcliente;
        public $idplano;
            
        //O Método construct executa tudo que estiver dentro
        public function __construct()
        {
            //atributos e métodos que irão se realizar quando a classe for instanciada
            include("Classe_Conexao.php");
            $this->$placa="";
            $this->$marca="";
            $this->$modelo="";
            $this->$cor="";
            $this->$tipo_veiculo="";
            $this->$descricao_tipo="";
            $this->$observacoes="";
            $this->$idcliente="";
            $this->$idplano="";
            $this->$status="";
        }
        //Método de inserção de veículos, ela será chamada nas páginas quando formos inserir, reutilizando o código
        
        public function Inserir()
		{	//instanciação da classe de conexão, Dividimos a programação em três ou quatro camdas, a DAL(Data Acess Layer), a BLL(Business Logical Layer)
			//a UI (User Interface) e a DTO(Data Transfer Object). A DAL é a classe de conexão, a nossa Classe_Conexao, e ela não necessita de nenhuma
			//instanciação de outras classes, sendo uma base. A BLL e essa classe(Classe_Cliente), e ela trabalha tudo envolvo em lóogica de CRUD(Create,Retrieve,Update,Delete)
			//ou afins, e ela necessita da DAL e da DTO(Não estamos utilizando DTO nesse sistema). Por último, a UI, ela é página em que trabalhamos, 
			//a única camada que o usuário urá interagir, e ela necessita da BLL e da DTO, sendo a BLL usando a DAL.
			$objConexao = new Conexao();
			$sql = "insert into dVeiculo values
					(
						'".$this->placa."', 
                        '".$this->marca."', 
                        '".$this->modelo."', 
                        '".$this->cor."', 
                        '".$this->tipo_veiculo."', 
                        '".$this->descricao_tipo."', 
                        '".$this->observacoes."', 
                        '".$this->idcliente."', 
                        '".$this->idplano."', 
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
			$sql = "select * from dVeiculo where placa = ".$this->placa;
			//Query de execução da sql acima
			$ExecuteSQL = $objConexao->conexao->query($sql);
			$Row = mysqli_num_rows($ExecuteSQL);
			//Essa variável irá armazenar por em índice textual, ou seja, a identificação dos dados ocerrerá atraves de índices escritos ao invés de números.
			//A variável carrega consigo todas as informações do usuário especificado.
			$DataTableP = mysqli_fetch_assoc($ExecuteSQL);
			//a atribuição dos dados armazenados na variável DataTableP, nos atributos da classe.
            $this->placa = $DataTableP["placa"];
            $this->marca = $DataTableP["marca"];
            $this->modelo = $DataTableP["modelo"];
            $this->cor = $DataTableP["cor"];
            $this->tipo_veiculo = $DataTableP["tipo_veiculo"];
            $this->descricao_tipo = $DataTableP["descricao_tipo"];
            $this->observacoes = $DataTableP["observacoes"];
            $this->idcliente = $DataTableP["idcliente"];
            $this->idplano = $DataTableP["idplano"];
            $this->status = $DataTableP["status"];
        }

        public function Alterar()
		{
			$objConexao = new Conexao();
			
			$sql = "update dVeiculos set 
            placa='".$this->placa."',
            marca='".$this->marca."',
            modelo='".$this->modelo."',
            cor='".$this->cor."',
            tipo_veiculo='".$this->tipo_veiculo."',
            descricao_tipo='".$this->descricao_tipo."',
            observacoes='".$this->observacoes."',
            idcliente='".$this->idcliente."',
            idplano='".$this->idplano."',
            status='".$this->status."',
            where placa=".$this->placa."";

            if ($objConexao->conexao->query($sql) === TRUE) 
			{
				header('location: Desktop.php');
			}
			else 
			{
				echo "Error updated record: " . $objConexao->conexao->error;
			}
        }
        
        public function Deletar()
		{
			$objConexao = new Conexao();

            $sql = "update dVeiculo set status = false
                        where placa=".$this->placa."";
			
			if ($objConexao->conexao->query($sql) === TRUE) 
			{
				echo "<script>alert('Veículo removido');</script>";
			}
			else 
			{
				echo "Erro ao remover veículo: " . $objConexao->conexao->error;
			}
		}
    }

?>