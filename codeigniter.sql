create database codeigniter;
use codeigniter;

create table personas(
	id serial primary key,
	nombre varchar(200) not null,
	correo varchar(200) not null,
	telefono varchar(30) default null,
	fecha datetime
)engine=innodb collate=utf8_spanish_ci default charset=utf8;

insert into `personas` values
(null,'jonathan','blonder413@outlook.com','123456789',now()),
(null,'juan','juan@outlook.com','123456789',now());

create table direccion_persona(
	id serial primary key,
	id_persona bigint unsigned,
	calle varchar(200),
	direccion text,
	ciudad varchar(100),
	index fk_persona_dir(id_persona),
	CONSTRAINT id_persona
	FOREIGN KEY (id_persona)
	REFERENCES personas(id)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION
)engine=innodb collate=utf8_spanish_ci default charset=utf8;

insert into direccion_persona values
(null,1,'calle 4','Centro','La Dorada'),
(null,4,'calle 1','Variante','Colombia');