create database d_social;

use d_social;

create table usuarios(
	id int not null primary key auto_increment,
	usuario varchar(50),
	email varchar(100) not null,
	senha varchar(32) not null
);

create table post(
	id_post int not null primary key auto_increment,
	id_usuario int not null,
	post varchar(300) not null,
	data_inclusao datetime default current_timestamp
);

create table usuarios_seguidores(
	id_usuario_seguidor int not null primary key auto_increment,
	id_usuario int not null,
	seguindo_id_usuario int not null,
	data_registro datetime default current_timestamp
);