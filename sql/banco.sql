drop database tcc;

create database tcc ;

use tcc ;

CREATE TABLE usuario (

    usuario_id int NOT NULL AUTO_INCREMENT,
    nome varchar (50) NOT NULL,
    email varchar (255) NOT NULL,
    telefone varchar (12) NOT NULL,
    senha varchar (60) NOT NULL,
    data_criacao datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (usuario_id)
);

create table mercado 
(
	id_mercado			int 			not null auto_increment,
    nome_mercado		varchar(100) 	not null,
    rua					varchar(50) 	not null,
    bairro				varchar(50) 	not null,
    cidade				varchar(50) 	not null,
    estado				varchar(02) 	not null,
    cnpj                varchar(20)     not null,
    foto_blob           blob,
    foto_nome           varchar(100),
    
    primary key(id_mercado)
);

create table compra
(
	id_compra			int				not null auto_increment,
    titulo       		varchar(100)    not null,
	descricao			varchar(300) 	not null,
	local_nome          varchar(100)    not null,
	valor_compra 		varchar(30)		not null,
	nota_fiscal_foto 	blob 			,
    foto_nome           varchar(100),
	data_criacao 		datetime 		NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data_postagem 		datetime 		NOT NULL,
    usuario_id          int   			NOT NULL,	
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
    data_postagem       datetime NOT NULL,
    qtd_produtos   		int   			not null,
    itens				text   not null,	
    usuario_id 					int 			NOT NULL ,
    primary key(id_lista)
);

select * from compra;