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
    id INT PRIMARY KEY,
    titulo VARCHAR(255),
    fecha DATE,
    importante BOOLEAN,
    completado BOOLEAN
);