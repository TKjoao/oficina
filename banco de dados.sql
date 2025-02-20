/*create database oficina;

use oficina;

create table produtos
(
	id int primary key auto_increment,
    nome text,
    quantidade int,
    valor decimal(10,2)
);



create table clientes
(

	id int primary key auto_increment,
    
	nome text,
    
	cidade text,
   
	idade int

);

create table pedidos
(
	
	id int primary key auto_increment,
    
	fk_cliente int,
    
	apelido text

);



create table pedido_itens
(
	
	id int primary key auto_increment,
    
	fk_pedido int,
    
	fk_produto int

);
*/