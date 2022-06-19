create database sistemageneral;
use sistemageneral;
create table empresa (
    id_empresa int primary key auto_increment,
    nombre varchar(30)
);

create table zona (
    id_zona int primary key auto_increment,
    nombre varchar(30)
);

create table cliente (
    id_cliente int primary key auto_increment,
    id_empresa int,
    id_zona int,
    cuit varchar(11),
    nombre varchar(30),
    apellido varchar(30),
    email varchar(40),
    foreign key(id_empresa) references empresa(id_empresa),
    foreign key(id_zona) references zona(id_zona)
);

create table proveedor (
	id_proveedor int primary key auto_increment,
	id_empresa int,
	cuit varchar(11),
	nombre varchar(30),
	apellido varchar(30),
    foreign key(id_empresa) references empresa(id_empresa)
);

create table producto (
    id_producto int primary key auto_increment,
    id_proveedor int,
    nombre varchar(50),
    precio decimal(9,2),
    foreign key(id_proveedor) references proveedor(id_proveedor)
);

create table venta (
	id_venta int primary key auto_increment,
	id_producto int,
	id_cliente int,
	cantidad_producto int,
    foreign key(id_producto) references producto(id_producto),
    foreign key(id_cliente) references cliente(id_cliente)
);