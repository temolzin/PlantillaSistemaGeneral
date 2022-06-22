drop database sistemageneral;
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
    imagen varchar(255),
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

create table usuario (
    id_usuario int primary key auto_increment,
    id_empresa int,
    cuit varchar(11),
    nombre varchar(30),
    apellido varchar(30),
    email varchar(40) unique,
    password varchar(50),
    foreign key(id_empresa) references empresa(id_empresa)
);


/***********************************INSERTS*****************************/
INSERT INTO `empresa`(`id_empresa`, `nombre`) VALUES (1, 'DIPREM');

INSERT INTO `zona`(`id_zona`, `nombre`) VALUES (1, 'Norte');
INSERT INTO `zona`(`id_zona`, `nombre`) VALUES (2, 'Sur');
INSERT INTO `zona`(`id_zona`, `nombre`) VALUES (3, 'Este');
INSERT INTO `zona`(`id_zona`, `nombre`) VALUES (4, 'Oeste');

INSERT INTO `cliente`(`id_cliente`, `id_empresa`, `id_zona`, `imagen`, `cuit`, `nombre`, `apellido`, `email`) VALUES (1,1,1,'generica.png','AS3245OP901','Monserratt','Montaño', 'monse@gmail.com');


INSERT INTO `proveedor`(`id_proveedor`, `id_empresa`, `cuit`, `nombre`, `apellido`) VALUES (1, 1, 'UI8319290OP','Francisco', 'Ramírez');
INSERT INTO `proveedor`(`id_proveedor`, `id_empresa`, `cuit`, `nombre`, `apellido`) VALUES (2, 1, 'HG1928308LI','Mario', 'Gonzalez');

INSERT INTO `producto`(`id_producto`, `id_proveedor`, `nombre`, `precio`) VALUES (1, 1, 'Servicio consultoria de TI', 5800.90);
INSERT INTO `producto`(`id_producto`, `id_proveedor`, `nombre`, `precio`) VALUES (2, 2, 'Reclutamiento personal básico', 16050.00);


INSERT INTO `usuario`(`id_usuario`, `id_empresa`, `cuit`, `nombre`, `apellido`, `email`, `password`) VALUES (1, 1, 'KS7893029TR', 'Temolzin', 'Roldan', 'temolzin@hotmail.com', AES_ENCRYPT('root', 'diprem'));
