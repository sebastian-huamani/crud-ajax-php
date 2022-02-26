create database p1;
use p1;

create table usuario(
    id int auto_increment not null,
    nombre varchar(40),
    apellido varchar(40),
    valor decimal(6,2),
    cuotas int,
    primary key(id)
);