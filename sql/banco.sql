drop database tcc;

create database tcc ;

use tcc ;

CREATE TABLE usuario (

    usuario_id 		int 			NOT NULL AUTO_INCREMENT,
    nome 			varchar (50) 	NOT NULL,
    email 			varchar (255) 	NOT NULL,
    telefone 		varchar (12) 	NOT NULL,
    data_criacao    date,    
    senha 			varchar (60) 	NOT NULL,
    adm 			tinyint 		NOT NULL DEFAULT '0',
    PRIMARY KEY (usuario_id)
);

create table mercado 
(
	id_mercado			int 			not null auto_increment,
    nome_mercado		varchar(100) 	not null,
    email_mercado		varchar (255) 	NOT NULL,
    endereco			varchar(255) 	not null,
    cnpj                varchar(20)     not null,
	senha_mercado 		varchar (60) 	NOT NULL,
    foto_nome           varchar(100),
    ativo 				tinyint 		NOT NULL DEFAULT '0',
    
    primary key(id_mercado)
);

create table compras
(
	id_compra			int				not null auto_increment,
    titulo       		varchar(100)    not null,
	descricao			varchar(300) 	not null,
	local_nome          varchar(100)    not null,
	valor_compra 		varchar(30)		not null,
    foto_nome           varchar(100),
    data_postagem 		datetime 		NOT NULL,
    usuario_id          int   			NOT NULL,
    primary key(id_compra)
);


create table produto 
(
    id_produto  		int 			not null auto_increment,
	nome_produto		varchar(100) 	not null,
	data_final			date 			not null ,
    valor 				double			not null,
    quantidade   		int 			not null,
    marca 				varchar(50)		not null,
    foto_nome           varchar(100),
	nome_mercado		varchar(100) 	not null,
	usuario_id          int   			NOT NULL,	
    primary key(id_produto)
);

create table listas
(
	id_lista			int 			not null auto_increment,
    nome_lista			varchar(100) 	not null,
    data_postagem       datetime 		NOT NULL,
    qtd_produtos   		int   			not null,
    itens				varchar(100)  	not null,
    usuario_id          int   			NOT NULL,	
    primary key(id_lista)
);


select * from usuario;

select * from listas;