create database db_locadora_93;
use db_locadora_93;

create table classificacao(
cod_classificacao int not null auto_increment,
classificacoes char(2) not null,
primary key(cod_classificacao));

create table genero(
cod_genero int not null auto_increment,
tipo varchar(20) not null,
primary key(cod_genero));

create table elenco(
cod_elenco int not null auto_increment,
atores varchar(50) not null,
primary key(cod_elenco));

create table direcao(
cod_direcao int not null auto_increment,
diretores varchar(50) not null,
primary key(cod_direcao));

create table idioma(
cod_idioma int not null auto_increment,
idiomas varchar(20) not null,
primary key(cod_idioma));

create table legenda(
cod_legenda int not null auto_increment,
legendas varchar(20) not null,
primary key(cod_legenda));

create table filme(
cod_filme int not null auto_increment,
titulo varchar(100) not null,
sinopse text not null,
lancamento year not null,
pais_origem varchar(30) not null,
duracao int not null,
preco decimal(4,2) not null,
cod_classificacao int,
primary key(cod_filme),
foreign key(cod_classificacao) references classificacao(cod_classificacao));

create table filme_genero(
cod_fil_gen int not null auto_increment,
cod_filme int,
cod_genero int,
primary key(cod_fil_gen),
foreign key(cod_filme) references filme(cod_filme),
foreign key(cod_genero) references genero(cod_genero));

create table filme_elenco(
cod_fil_ele int not null auto_increment,
cod_filme int,
cod_elenco int,
primary key(cod_fil_ele),
foreign key(cod_filme) references filme(cod_filme),
foreign key(cod_elenco) references elenco(cod_elenco));

create table filme_direcao(
cod_fil_dir int not null auto_increment,
cod_filme int,
cod_direcao int,
primary key(cod_fil_dir),
foreign key(cod_filme) references filme(cod_filme),
foreign key(cod_direcao) references direcao(cod_direcao));

create table filme_idioma(
cod_fil_idi int not null auto_increment,
cod_filme int,
cod_idioma int,
primary key(cod_fil_idi),
foreign key(cod_filme) references filme(cod_filme),
foreign key(cod_idioma) references idioma(cod_idioma));

create table filme_legenda(
cod_fil_leg int not null auto_increment,
cod_filme int,
cod_legenda int,
primary key(cod_fil_leg),
foreign key(cod_filme) references filme(cod_filme),
foreign key(cod_legenda) references legenda(cod_legenda));

create table funcionario(
cod_func int not null auto_increment,
nome varchar(50),
cpf varchar(11) not null unique,
cargo varchar(20) not null,
escala varchar(40) not null,
turno varchar(20) not null,
admissao date not null,
demissao date,
salario decimal(6,2) not null,
vt decimal(5,2),
vr decimal(5,2),
va decimal(5,2),
primary key(cod_func));

create table cliente(
cod_cliente int not null auto_increment,
nome varchar(50) not null,
cpf varchar(11) not null,
primary key(cod_cliente));

create table cartao(
cod_cartao int not null auto_increment,
num_cartao varchar(16) not null,
validade varchar(5) not null,
cvv varchar(3) not null,
tipo varchar(15) not null,
cod_cliente int,
primary key(cod_cartao),
foreign key(cod_cliente) references cliente(cod_cliente));

create table endereco(
cod_endereco int not null auto_increment,
logradouro varchar(50) not null,
num varchar(5) not null,
bairro varchar(20) not null,
cidade varchar(20) not null,
uf char(2) not null,
cep varchar(8) not null,
complemento varchar(15),
tipo varchar(15) not null,
primary key(cod_endereco));

create table email(
cod_email int not null auto_increment,
email varchar(60) not null,
primary key(cod_email));

create table telefone(
cod_telefone int not null auto_increment,
telefone varchar(11) not null,
tipo varchar(15) not null,
primary key(cod_telefone));

create table lig_func_end(
cod_lig_func_end int not null auto_increment,
cod_func int,
cod_endereco int,
primary key(cod_lig_func_end),
foreign key(cod_func) references funcionario(cod_func),
foreign key(cod_endereco) references endereco(cod_endereco));

create table lig_func_email(
cod_lig_func_email int not null auto_increment,
cod_func int,
cod_email int,
primary key(cod_lig_func_email),
foreign key(cod_func) references funcionario(cod_func),
foreign key(cod_email) references email(cod_email));

create table lig_func_tel(
cod_lig_func_tel int not null auto_increment,
cod_func int,
cod_telefone int,
primary key(cod_lig_func_tel),
foreign key(cod_func) references funcionario(cod_func),
foreign key(cod_telefone) references telefone(cod_telefone));

create table lig_cli_end(
cod_lig_cli_end int not null auto_increment,
cod_cliente int,
cod_endereco int,
primary key(cod_lig_cli_end),
foreign key(cod_cliente) references cliente(cod_cliente),
foreign key(cod_endereco) references endereco(cod_endereco));

create table lig_cli_email(
cod_lig_cli_email int not null auto_increment,
cod_cliente int,
cod_email int,
primary key(cod_lig_cli_email),
foreign key(cod_cliente) references cliente(cod_cliente),
foreign key(cod_email) references email(cod_email));

create table lig_cli_tel(
cod_lig_cli_tel int not null auto_increment,
cod_cliente int,
cod_telefone int,
primary key(cod_lig_cli_tel),
foreign key(cod_cliente) references cliente(cod_cliente),
foreign key(cod_telefone) references telefone(cod_telefone));

create table locacao(
cod_locacao int not null auto_increment,
retirada datetime,
devolucao datetime,
multa decimal(4,2) not null,
forma_pagamento varchar(20) not null,
cod_func int not null,
cod_cliente int not null,
primary key(cod_locacao),
foreign key(cod_func) references funcionario(cod_func),
foreign key(cod_cliente) references cliente(cod_cliente));

create table item_locacao(
cod_item_locacao int not null auto_increment,
cod_filme int not null,
valor decimal(4,2) not null,
cod_locacao int not null,
primary key(cod_item_locacao),
foreign key(cod_filme) references filme(cod_filme),
foreign key(cod_locacao) references locacao(cod_locacao));


desc classificacao;
desc genero;
desc elenco;
desc direcao;
desc idioma;
desc legenda;
desc filme;
desc filme_genero;
desc filme_elenco;
desc filme_direcao;
desc filme_idioma;
desc filme_legenda;

desc funcionario;

desc cliente;
desc cartao;

desc endereco;
desc email;
desc telefone;

desc lig_func_end;
desc lig_func_email;
desc lig_func_tel;

desc lig_cli_end;
desc lig_cli_email;
desc lig_cli_tel;

desc locacao;
desc item_locacao;
