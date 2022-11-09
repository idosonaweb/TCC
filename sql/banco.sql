drop database tcc;

create database tcc ;

use tcc ;

CREATE TABLE usuario (

    id int NOT NULL AUTO_INCREMENT,
    nome varchar (50) NOT NULL,
    email varchar (255) NOT NULL,
    telefone varchar (12) NOT NULL,
    senha varchar (60) NOT NULL,
    data_criacao datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

create table mercado 
(
	id_mercado			int 			not null auto_increment,
    nome_mercado		varchar(100) 	not null,
    rua					varchar(50) 	not null,
    bairro				varchar(50) 	not null,
    cidade				varchar(50) 	not null,
    estado				varchar(02) 	not null,
    cep					varchar(10) 	not null,
    foto_blob           blob,
    foto_nome           varchar(100),
    
    primary key(id_mercado)
);

create table compra
(
	id_compra			int				not null auto_increment,
    titulo_compra       varchar(100)    not null,
	data_compra 		datetime 		NOT NULL,
	descricao_compra	varchar(300) 	not null,
	local_nome          varchar(100)    not null,
	valor_compra 		varchar(30)			not null,
	nota_fiscal_foto 	blob 			not null,
    primary key(id_compra)
);

create table produto 
(
	data_inicial		date 			not null ,
	data_final			date 			not null ,
    valor 				double			not null,
    quantidade   		int 			not null,
    marca 				varchar(50)		not null,
    primary key(data_inicial, data_final)
);

create table listas
(
	id_lista			int 			not null auto_increment,
    nome_lista			varchar(100) 	not null,
    data_criacao 		datetime 		NOT NULL DEFAULT CURRENT_TIMESTAMP,
    qtd_produtos   		int   			not null, -- será feito a partir de um script que contará a quantidade de produtos que a lista contém. 
    primary key(id_lista)
);