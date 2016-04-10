CREATE TABLE IF NOT EXISTS usuario(
	idUsuario int primary key auto_increment,
	nombre varchar(50) not null,
	apellido varchar(50) not null,
	direccion varchar(100) not null,
	telefono varchar(9),
	email varchar(50) not null unique,
	clave varchar(50) not null,
	usuario varchar(50) not null unique,
	fecha_creacion timestamp DEFAULT 0,
	fecha_mod timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS categoria(
	idCategoria int primary key auto_increment,
	nombre varchar(50) not null,
	descripcion text not null,
	fecha_creacion timestamp DEFAULT 0,
	fecha_mod timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS producto(
	idProducto int primary key auto_increment,
	nombre varchar(50) not null,
	precio decimal(8,2) not null DEFAULT 0,
	idCategoria int not null,
	cantidad int(9) not null DEFAULT 0,
	fecha_creacion timestamp DEFAULT 0,
	fecha_mod timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS venta(
	idVenta int primary key auto_increment,
	idUsuario int not null, 
	fecha timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS detalleVenta(
	idDetalleVenta int primary key auto_increment,
	idVenta int not null,
	idProducto int not null,
	precio decimal(8,2) not null,
	cantida int not null,
	fecha timestamp DEFAULT CURRENT_TIMESTAMP
);


alter table producto add constraint categoria_prod foreign key (idCategoria) 
references categoria(idCategoria) on update cascade on delete cascade;
alter table venta add constraint usuario_venta foreign key (idUsuario) 
references usuario(idUsuario) on update cascade on delete cascade;
alter table detalleVenta add constraint venta_detalleV foreign key (idVenta) 
references venta(idVenta) on update cascade on delete cascade; 
alter table detalleVenta add constraint producto_detalleV foreign key (idProducto)
references producto(idProducto) on update cascade on delete cascade;