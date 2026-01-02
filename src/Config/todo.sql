create database todo_app;
use todo_app;

create table tareas (
    id int primary key,
    titulo varchar(255),
    fecha date,
    importante boolean,
    completado boolean
)

CREATE TABLE tareas (
    id INT AUTO_INCREMENT PRIMARY KEY ,
    titulo VARCHAR(255),
    completado BOOLEAN
);