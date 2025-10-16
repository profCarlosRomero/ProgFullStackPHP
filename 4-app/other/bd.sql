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
INSERT INTO usuario (ci, nombre, apellido, user_name, pass, puntaje) VALUES ('1234567', 'Pedro', 'Rodríguez', 'pedrito', '1234', 0);

CREATE TABLE IF NOT EXISTS partida (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS partidaUsuario (
    id INT NOT NULL,
    ci VARCHAR(10) NOT NULL,
    PRIMARY KEY (id, ci)
    -- FOREIGN KEY (id) REFERENCES partida(id),
    -- FOREIGN KEY (ci) REFERENCES usuario(ci)
);

CREATE TABLE IF NOT EXISTS partidaUsuarioCard (
    id INT NOT NULL,
    ci VARCHAR(10) NOT NULL,
    turno INT NOT NULL,
    pokemon JSON,
    PRIMARY KEY (id, ci, turno)
    -- FOREIGN KEY (id) REFERENCES partida(id),
    -- FOREIGN KEY (ci) REFERENCES usuario(ci)
);