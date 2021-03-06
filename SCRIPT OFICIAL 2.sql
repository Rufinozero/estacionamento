CREATE SCHEMA IF NOT EXISTS estacionamento;

use estacionamento;

 -- CRIA TABELA DE USUÁRIO
 
CREATE TABLE IF NOT EXISTS dUsuario (
	LOGIN VARCHAR(50) PRIMARY KEY NOT NULL,
	SENHA INTEGER NOT NULL,
	NOME VARCHAR(100) NOT NULL,
	FUNCAO NUMERIC(1),
	DESCRICAO_FUNCAO VARCHAR(50) NOT NULL,
	TELEFONE INTEGER
);
ALTER TABLE DUSUARIO CHANGE SENHA SENHA VARCHAR(100) NOT NULL;
ALTER TABLE DUSUARIO CHANGE TELEFONE TELEFONE VARCHAR(11);



INSERT INTO DUSUARIO
	VALUES  ('RUFINOZERO',MD5(123456),'VICTOR RUFINO',1,'ADMINISTRADOR DO SISTEMA',31912345678),
			('CMNUNES',MD5(654321),'CRISTIANO NUNES',2,'GERENTE DE ESTACIONAMENTO',31923456789),
            ('LUHBRITS',MD5(161896),'LUÍZA BRITS',3,'ATENDENTE DE ESTACIONAMENTO',31934567890);
	

SELECT * FROM DUSUARIO;
 -- ---------------------------------------- --
 -- CRIA TABELA DE PLANOS
 
CREATE TABLE IF NOT EXISTS dPlanos (
	VALOR NUMERIC(15,2) NOT NULL,
	DESCRICAO_PLANO VARCHAR(50),
	IDPLANO INTEGER PRIMARY KEY AUTO_INCREMENT
);

INSERT INTO DPLANOS 
	VALUES  (2.99,'PLANO AVULSO CARRO PEQUENO',1),
			(3.50,'PLANO AVULSO CARRO GRANDE',2),
			(1.99,'PLANO AVULSO MOTOCICLETA',3),
            (200.00,'PLANO MENSAL CARRO PEQUENO',4),
            (250.00,'PLANO MENSAL CARRO GRANDE',5),
            (150.00,'PLANO MENSAL MOTOCICLETA',6);

SELECT * FROM DPLANOS;
 -- ---------------------------------------- --
 -- CRIA TABELA DE CLIENTES
 
 CREATE TABLE IF NOT EXISTS dCliente (
	IDCLIENTE INTEGER PRIMARY KEY AUTO_INCREMENT,
	DTNASC DATETIME NOT NULL,
	NOME VARCHAR(100) NOT NULL,
	CPF INTEGER,
	CNPJ INTEGER,
	SEXO CHAR(1),
	TELEFONE INTEGER NOT NULL,
	TIPO_CLIENTE INTEGER,
	EMAIL VARCHAR(100),
	NOME_RUA VARCHAR(100),
	NUMERO_CASA INTEGER,
	COMPLEMENTO VARCHAR(10),
	BAIRRO VARCHAR(50),
	CIDADE VARCHAR(50),
	ESTADO VARCHAR(2),
	CEP INTEGER,
	IDPLANO INTEGER,
	FOREIGN KEY(IDPLANO) REFERENCES dPlanos (IDPLANO)
);

ALTER TABLE DCLIENTE CHANGE DTNASC DTNASC DATE;
ALTER TABLE DCLIENTE CHANGE CPF CPF VARCHAR(11);
ALTER TABLE DCLIENTE CHANGE CNPJ CNPJ VARCHAR(11);
ALTER TABLE DCLIENTE CHANGE TELEFONE TELEFONE VARCHAR(11);

SELECT * FROM DCLIENTE;
 -- ---------------------------------------- --
 -- CRIA TABELA DE VEICULOS
 
 CREATE TABLE IF NOT EXISTS dVeiculo (
	PLACA VARCHAR(7) PRIMARY KEY NOT NULL,
	MARCA VARCHAR(20),
	MODELO VARCHAR(20),
	COR VARCHAR(20) NOT NULL,
	TIPO_VEICULO INTEGER,
	DESCRICAO_TIPO VARCHAR(50),
	OBSERVACOES VARCHAR(100),
	IDCLIENTE INTEGER,
    FOREIGN KEY(IDCLIENTE) REFERENCES dCliente (IDCLIENTE)
);
 
 ALTER TABLE DVEICULO ADD IDPLANO INTEGER NOT NULL;
 
 ALTER TABLE DVEICULO ADD FOREIGN KEY(IDPLANO) REFERENCES DPLANOS (IDPLANO);
 
 SELECT * FROM DVEICULO;
 -- ---------------------------------------- --
 -- CRIA TABELA DE VAGAS
 
 CREATE TABLE IF NOT EXISTS dVagas (
	IDVAGA INTEGER PRIMARY KEY AUTO_INCREMENT,
	TIPO_VAGA INTEGER NOT NULL,
	DESCRICAO_VAGA VARCHAR(50),
	STATUS_VAGA INTEGER
);
 
 SELECT * FROM DVAGAS;
 -- ---------------------------------------- --
 -- CRIA TABELA DE ROTATIVO
 
CREATE TABLE IF NOT EXISTS fRotativo (
	IDROTATIVO INTEGER PRIMARY KEY AUTO_INCREMENT,
	LOGIN VARCHAR(50),
	IDVAGA INTEGER,
	IDCLIENTE VARCHAR(10),
	IDPLANO INTEGER,
	PLACA VARCHAR(7),
	DTHR_ENTRADA DATETIME,
	DTHR_SAIDA DATETIME,
	VALOR_ESTADIA NUMERIC(15),
	FOREIGN KEY (LOGIN) REFERENCES dUsuario (LOGIN),
	FOREIGN KEY (IDVAGA) REFERENCES dVagas (IDVAGA),
	FOREIGN KEY (IDCLIENTE) REFERENCES dCliente (IDCLIENTE),
	FOREIGN KEY (IDPLANO) REFERENCES dPlanos (IDPLANO),
	FOREIGN KEY (PLACA) REFERENCES dVeiculos (PLACA)
);


SELECT * FROM FROTATIVO;
 -- ---------------------------------------- --
 -- CRIA TABELA DE PAGAMENTO

CREATE TABLE IF NOT EXISTS fPagamento (
	IDPGTO INTEGER PRIMARY KEY,
	DESCRICAO_TIPO_PGTO VARCHAR(50),
	TIPO_PGTO INTEGER,
	IDCLIENTE INTEGER,
	PLACA VARCHAR(7),
	IDROTATIVO INTEGER,
	IDPLANO INTEGER,
    FOREIGN KEY (PLACA) REFERENCES dVeiculos (PLACA),
    FOREIGN KEY (IDCLIENTE) REFERENCES dCliente (IDCLIENTE),
    FOREIGN KEY (IDROTATIVO) REFERENCES dRotativo (IDROTATIVO)
);

ALTER TABLE FPAGAMENTO ADD COLUMN VALOR_PGTO NUMERIC(15,2);

SELECT * FROM FPAGAMENTO;

