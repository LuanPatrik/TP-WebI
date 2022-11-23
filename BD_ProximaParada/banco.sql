DROP SCHEMA IF EXISTS proximaparada;
CREATE SCHEMA proximaparada;
USE proximaparada;

CREATE TABLE evento(
	id_evento INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(225) NOT NULL,
    data_evento DATE NOT NULL,
    cidade VARCHAR(50),
    bairro VARCHAR(100),
    rua VARCHAR(100),
    valor DOUBLE
);

CREATE TABLE usuario(
	id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(225) NOT NULL,
    cpf LONG NOT NULL,
    data_nasc DATE NOT NULL,
    telefone LONG NOT NULL,
    email VARCHAR(100),
    usuario VARCHAR(50),
    senha VARCHAR(50)
);