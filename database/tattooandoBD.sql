/**************************************************************************************
*
* Desenvolvido por BRYAN LIMA
* GitHub: https://github.com/bryan-lima
*
* Análise e Desenvolvimento de Sistemas - ADS
* Projeto Acadêmico - Tattooando: Agendamento de serviços de tatuagem
* Repositório deste projeto: https://github.com/bryan-lima/tattooando-project
*
**************************************************************************************/


-- Criando BD
CREATE DATABASE tattooandobd DEFAULT CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_general_ci;
USE tattooandobd;

-- Criando as tabelas
CREATE TABLE cliente (
id INT NOT NULL AUTO_INCREMENT,
tipo_usuario CHAR(7) NOT NULL,
nome VARCHAR(255) NOT NULL,
cpf CHAR(11) NOT NULL,
nascimento DATE NOT NULL,
telefone VARCHAR(11) NOT NULL,
email VARCHAR(255) NOT NULL,
senha VARCHAR(255) NOT NULL,
fk_endereco_id INT NOT NULL,
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE studio  (
id INT NOT NULL AUTO_INCREMENT,
tipo_usuario CHAR(6) NOT NULL,
nome VARCHAR(255) NOT NULL,
cnpj CHAR(14) NOT NULL,
telefone VARCHAR(11) NOT NULL,
email VARCHAR(255) NOT NULL,
senha VARCHAR(255) NOT NULL,
fk_endereco_id INT NOT NULL,
PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE endereco  (
id INT NOT NULL AUTO_INCREMENT,
cep VARCHAR(10) NOT NULL,
numero VARCHAR(15) NOT NULL,
complemento VARCHAR(255),
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE servico (
id INT NOT NULL AUTO_INCREMENT,
fk_studio_id INT NOT NULL,
nome VARCHAR(255) NOT NULL,
descricao TEXT,
preco DECIMAL(6, 2) NOT NULL,
tempo_medio INT NOT NULL,
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE horario_funcionamento (
id INT NOT NULL AUTO_INCREMENT,
fk_studio_id INT NOT NULL,
dias_aberto VARCHAR(255),
hr_semana_inicio TIME NOT NULL,
hr_semana_fim TIME NOT NULL,
hr_fim_semana_inicio TIME NOT NULL,
hr_fim_semana_fim TIME NOT NULL,
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE agendamento (
id INT NOT NULL AUTO_INCREMENT,
fk_cliente_id INT NOT NULL,
fk_servico_id INT NOT NULL,
data_agendada DATE NOT NULL,
hora_agendada TIME NOT NULL,
status VARCHAR(100) NOT NULL,
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET = utf8mb4;

-- Adicionando as constraint Foreign Key das tabelas
ALTER TABLE cliente ADD FOREIGN KEY (fk_endereco_id) REFERENCES endereco(id);
ALTER TABLE studio ADD FOREIGN KEY (fk_endereco_id) REFERENCES endereco(id);
ALTER TABLE servico ADD FOREIGN KEY (fk_studio_id) REFERENCES studio(id);
ALTER TABLE horario_funcionamento ADD FOREIGN KEY (fk_studio_id) REFERENCES studio(id);
ALTER TABLE agendamento ADD FOREIGN KEY (fk_cliente_id) REFERENCES cliente(id);
ALTER TABLE agendamento ADD FOREIGN KEY (fk_servico_id) REFERENCES servico(id);