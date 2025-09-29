-- Tabela base Pessoa
CREATE TABLE Pessoa (
    id_pessoa INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    endereco VARCHAR(150)
);

-- Pessoa Física
CREATE TABLE PessoaFisica (
    id_pessoa INT PRIMARY KEY,
    cpf CHAR(14) UNIQUE NOT NULL,
    FOREIGN KEY (id_pessoa) REFERENCES Pessoa(id_pessoa)
);

-- Pessoa Jurídica
CREATE TABLE PessoaJuridica (
    id_pessoa INT PRIMARY KEY,
    cnpj CHAR(18) UNIQUE NOT NULL,
    FOREIGN KEY (id_pessoa) REFERENCES Pessoa(id_pessoa)
);

-- Relacionamento sócios (PJ ↔ PF)
CREATE TABLE Socios (
    id_pj INT,
    id_pf INT,
    PRIMARY KEY (id_pj, id_pf),
    FOREIGN KEY (id_pj) REFERENCES PessoaJuridica(id_pessoa),
    FOREIGN KEY (id_pf) REFERENCES PessoaFisica(id_pessoa)
);

-- Carro (classe base)
CREATE TABLE Carro (
    id_carro INT AUTO_INCREMENT PRIMARY KEY,
    motor VARCHAR(50),
    torque VARCHAR(50),
    peso VARCHAR(50),
    espaco VARCHAR(50),
    velocidade INT,
    id_pessoa INT,
    FOREIGN KEY (id_pessoa) REFERENCES Pessoa(id_pessoa)
);

-- Carro Utilitário
CREATE TABLE Utilitario (
    id_carro INT PRIMARY KEY,
    modo_turbo INT,
    FOREIGN KEY (id_carro) REFERENCES Carro(id_carro)
);

-- SUV (herda de Utilitário)
CREATE TABLE SUV (
    id_carro INT PRIMARY KEY,
    assentos INT DEFAULT 5,
    FOREIGN KEY (id_carro) REFERENCES Utilitario(id_carro)
);
