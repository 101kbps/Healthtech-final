CREATE SCHEMA healthtech;

USE healthtech;

CREATE TABLE tb_admin (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE tb_cliente (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cpf VARCHAR(11) NOT NULL,
  nome VARCHAR(45) NULL,
  data_nascimento VARCHAR(45) NULL,
  telefone VARCHAR(45) NULL,
  endereco VARCHAR(200) NULL,
  cep VARCHAR(11) NULL,
  plano VARCHAR(15) NOT NULL,
        senha VARCHAR(50) NULL,
  email VARCHAR(50) NOT NULL,
  PRIMARY KEY(id, cpf)
);

CREATE TABLE tb_funcionario (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(45) NULL,
  cpf VARCHAR(11) NOT NULL,
  data_nascimento VARCHAR(45) NULL,
  telefone VARCHAR(45) NULL,
  email VARCHAR(50) NULL,
  admissao VARCHAR(40) NULL,
  demissao VARCHAR(40) NULL,
  contrato VARCHAR(40) NULL, 
  salario DECIMAL(10,2)NULL,
  cargo INTEGER NULL,
  senha VARCHAR(50) NULL,
  modalidade VARCHAR(100)NULL,
  endereco VARCHAR(200) NULL,
  cep VARCHAR(11) NULL,
  id_admin INTEGER UNSIGNED NULL,
  PRIMARY KEY(id, cpf),
  FOREIGN KEY(id_admin) REFERENCES tb_admin(id)
);

CREATE TABLE tb_login (
  id_login INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tb_cliente_cpf VARCHAR(11) NOT NULL,
  tb_cliente_id INTEGER UNSIGNED NOT NULL,
  tb_funcionario_id INTEGER UNSIGNED NOT NULL,
  tb_funcionario_cpf VARCHAR(11) NOT NULL,
  senha INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(id_login, tb_cliente_cpf, tb_cliente_id, tb_funcionario_id, tb_funcionario_cpf),
  INDEX tb_login_FKIndex1(tb_cliente_id, tb_cliente_cpf),
  INDEX tb_login_FKIndex2(tb_funcionario_id, tb_funcionario_cpf),
  FOREIGN KEY(tb_cliente_id, tb_cliente_cpf) REFERENCES tb_cliente(id, cpf),
  FOREIGN KEY(tb_funcionario_id, tb_funcionario_cpf) REFERENCES tb_funcionario(id, cpf)
);

CREATE TABLE tb_repositorio (
  id_repositorio INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(id_repositorio)
);


INSERT INTO tb_cliente (cpf, nome, data_nascimento, telefone, endereco, cep, plano,senha, email)
VALUES ('12345678900', 'John Doe', '06/12/1988','12345678', '123 Main St', '12345', 'Gold', '123@mudar','johndoe@example.com');


INSERT INTO tb_funcionario (nome, cpf, data_nascimento, telefone, email,admissao, demissao,contrato,salario,cargo,senha,modalidade, endereco, cep)
VALUES ('Jane Doe', '12345678901', '12/03/1990', '12345698', 'janedoe@example.com', '15/06/2021','','CLT', 2800.45,'2','mudar@123','pilates','123 Main St', '12345');




INSERT INTO tb_funcionario (nome, cpf, data_nascimento, telefone, email,admissao, demissao,contrato,salario,cargo,senha,modalidade, endereco, cep)
VALUES ('Carol Abreu', '12345678901', '12/03/1990', '12345698', 'carol@example.com', '15/04/2022','','CLT', 2800.45,'1','mudar@123','pilates','123 Main St', '12345');

