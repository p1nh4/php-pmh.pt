CREATE TABLE Categoria
(
    id INT AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL UNIQUE,
    descricao TEXT,
    PRIMARY KEY (id)
);

CREATE TABLE Marca
(
    id INT AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL UNIQUE,
    pais_origem VARCHAR(50),
    PRIMARY KEY (id)   
);

CREATE TABLE Fornecedor
(
    id INT AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    contato VARCHAR(100),
    telefone VARCHAR(15),
    email VARCHAR(100),
    senha  VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);  

CREATE TABLE Cliente
(
    id INT AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    endereco TEXT,
    telefone VARCHAR(15),
    email VARCHAR(100),
    senha  VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Produto
(
    id INT AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    validade DATE,
    estoque INT NOT NULL,
    categoria_id INT,
    marca_id INT,
    fornecedor_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (categoria_id) REFERENCES Categoria(id),
    FOREIGN KEY (marca_id) REFERENCES Marca(id),
    FOREIGN KEY (fornecedor_id) REFERENCES Fornecedor(id)  
);

create table Cliente_Produto
(
    cliente_id INT,
    produto_id INT,
    primary key (cliente_id, produto_id),
    foreign key (cliente_id) references Cliente(id),
    foreign key (produto_id) references Produto(id)
);