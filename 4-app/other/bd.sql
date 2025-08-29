CREATE DATABASE IF NOT EXISTS pokecardsystem;
USE pokecardsystem;

CREATE TABLE IF NOT EXISTS usuario (
    ci VARCHAR(10) NOT NULL PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    user_name VARCHAR(30) NOT NULL,
    pass VARCHAR(30) NOT NULL,
    puntaje INT NULL
);

INSERT INTO usuario (ci, nombre, apellido, user_name, pass, puntaje) VALUES ('11111111', 'Prueba', 'Prueba', 'prueba', '1234', 0);